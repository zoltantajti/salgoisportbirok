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

    public function events($f = "list", $id = -1)
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

            if($this->form_validation->run() == false){
                $this->data['m'] = "a_events_new";
                $this->load->view('sportbiro/index', $this->data);
            }else{
                $this->Events->add($this->input->post());
            }
        }elseif($f == "edit" && $id > 0)
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
        }elseif($f == "open" && $id > 0)
        {
            $this->data['e'] = $this->Events->getAll("WHERE id='".$id."'")[0];
            $this->data['m'] = "a_events_open";
            $this->load->view('sportbiro/index', $this->data);
        }elseif($f == "rem" && $id > 0)
        {
            $this->Events->delete($id);
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