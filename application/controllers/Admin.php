<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    protected $data = array();
    protected $errorMsg = array(
		"required" => "A %s mező kitöltése kötelező!",
		"valid_email" => "A %s mező nem érvényes e-mail cím! Adj meg másikat!",
		"is_unique" => "A %s már használatban van!",
		"min_length" => "A {field} mezőnek legalább {param} karakterből kell állnia!",
		"max_length" => "A {field} mezőnek legalább {param} karakterből kell állnia!",
		"matches" => "A {field} mező nem egyezik meg a {param} mezővel!"
	);
    private function protect($perm)
    {
        $this->User->protect();
        if($this->User->isAdmin() && $this->User->getPerm() < $perm) { redirect('dashboard'); };
    }

    public function newbies()
    {
        $this->protect(2);
        
        $this->data['m'] = "a_newbies";
        $this->load->view('sportbiro/index', $this->data);
    }
    public function users()
    {
        $this->protect(3);
        $this->data['m'] = 'a_users';
        $this->load->view('sportbiro/index', $this->data);
    }
    public function user($id)
    {
        $this->protect(3);
        $this->data['m'] = 'a_user';
        $this->data['u'] = $this->User->getById($id);
        $this->load->view('sportbiro/index', $this->data);
    }

    public function events($f = "list", $id = -1, $uid = -1)
    {
        if($f == "list" && $id == -1)
        {
            $this->data['m'] = "a_events";
            $this->data['e'] = $this->Events->getAll("ORDER BY startDate DESC");
            $this->load->view('sportbiro/index', $this->data);
        }
        elseif($f == "new" && $id == -1)
        {
            $this->form_validation->set_rules("name","Név","trim|required", $this->errorMsg);
            $this->form_validation->set_rules("location","Helyszín","trim|required", $this->errorMsg);
            $this->form_validation->set_rules("startDate","Esemény kezdete","trim|required", $this->errorMsg);
            $this->form_validation->set_rules("joinDate","Jelentkezési határidő","trim|required", $this->errorMsg);
            $this->form_validation->set_rules("description","Leírás","trim|required", $this->errorMsg);
            $this->form_validation->set_rules("image","Kép","trim", $this->errorMsg);
            if($this->form_validation->run() == false){
                $this->data['m'] = "a_events_new";
                $this->load->view('sportbiro/index', $this->data);
            }else{
                $this->Events->add($this->input->post());
            }
        }
        elseif($f == "edit" && $id > 0)
        {
            $this->data['e'] = $this->Events->getAll("WHERE id='".$id."'")[0];
            $this->form_validation->set_rules("name","Név","trim|required", $this->errorMsg);
            $this->form_validation->set_rules("location","Helyszín","trim|required", $this->errorMsg);
            $this->form_validation->set_rules("startDate","Esemény kezdete","trim|required", $this->errorMsg);
            $this->form_validation->set_rules("joinDate","Jelentkezési határidő","trim|required", $this->errorMsg);
            $this->form_validation->set_rules("description","Leírás","trim|required", $this->errorMsg);
            if($this->form_validation->run() == false){
                $this->data['m'] = "a_events_new";
                $this->load->view('sportbiro/index', $this->data);
            }else{
                $this->Events->edit($this->input->post(), $id);
            }
        }
        elseif($f == "open" && $id > 0)
        {
            $this->data['e'] = $this->Events->getAll("WHERE id='".$id."'")[0];
            $this->data['m'] = "a_events_open";
            $this->load->view('sportbiro/index', $this->data);
        }
        elseif($f == "rem" && $id > 0)
        {
            $this->Events->delete($id);
        }
        elseif($f == "joins" && $id > 0)
        {
            $this->data['e'] = $this->Events->getAll("WHERE id='".$id."'")[0];
            $this->data['u'] = $this->Db->sqla("event_joins","*","
                INNER JOIN user_profile ON user_profile.id = event_joins.credentialsID
                INNER JOIN user_cars ON user_cars.id = event_joins.carID 
                WHERE event_joins.eventID = '".$id."'
            ");
            $this->data['m'] = "a_events_joins";
            $this->load->view('sportbiro/index', $this->data);
        }
        elseif($f == "approve" && $id > 0 && $uid > 0)
        {
            $this->Db->update("event_joins",array("status"=>"approved"),"WHERE eventID='".$id."' AND credentialsID='".$uid."'");
            $this->Msg->set("Elfogadtad a jelentkezést","","success");
            redirect('admin/events/joins/' . $id);
        }
        elseif($f == "deny" && $id > 0 && $uid > 0)
        {
            $this->Db->update("event_joins",array("status"=>"deny"),"WHERE eventID='".$id."' AND credentialsID='".$uid."'");
            $this->Msg->set("Elutasítottad a jelentkezést","","success");
            redirect('admin/events/joins/' . $id);
        }
        elseif($f == "infos" && $id > 0)
        {
            echo("OK");
        }
        elseif($f == "schedule" && $id > 0)
        {
            $this->form_validation->set_rules('type','Típus','trim');

            if(!$this->form_validation->run()){
                $this->data['s'] = $this->Db->sqla("event_schedule","*","WHERE eventID='".$id."'");
                $this->data['m'] = "event_schedule";
                $this->load->view('sportbiro/index', $this->data);
            }else{
                $p = $this->input->post();
                $a = array(
                    "eventID" => $id,
                    "point" => $p['point_lat'].",".$p['point_lon'],
                    "type" => $p['type'],
                    "description" => $p['description']
                );
                if($p['ftype'] == "edit"){
                    $this->Db->update("event_schedule",$a,"WHERE id='".$p['fID']."'");
                    $this->Msg->set("Sor módosítva: #" . $p['fID']."'","","success");
                    redirect('admin/events/schedule/' . $id);
                }else{
                    $this->Db->insert("event_schedule",$a);
                    $this->Msg->set("Új sor hozzáadva","","success");
                    redirect('admin/events/schedule/' . $id);
                };
            }
        }
    }
    
    public function allowUser($id)
    {
        $this->protect(2);
        $this->Db->update("credentials",array("active"=>1),"WHERE id='".$id."'");
        $this->Msg->set("Sikeres művelet!","Üzenet","success");
        redirect('/admin/newbies');
    }
    public function denyUser($id)
    {
        $this->protect(2);
        $this->Db->delete("credentials","WHERE id='".$id."'");
        $this->Db->delete("user_profile","WHERE credentialsID='".$id."'");
        $this->Msg->set("Sikeres művelet!","Üzenet","success");
        redirect('/admin/newbies');
    }
};