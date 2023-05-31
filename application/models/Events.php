<?Php
class Events extends CI_Model
{
    public function getAll($cond = "")
    {
        return $this->Db->sqla("events","*",$cond);
    }
    public function getUpcomming($limit = 3)
    {
        return $this->Db->sqla("events","*","WHERE startDate >= '" . date("Y-m-d") . "' ORDER BY startDate LIMIT " . $limit);
    }
    public function Add($p)
    {
        $config['upload_path'] = './assets/img/events/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 100;
        $this->load->library('upload', $config);
        $this->upload->do_upload('image');
        $data = array('upload_data' => $this->upload->data());
        $p['image'] = $config['upload_path'] . $data['upload_data']['file_name'];
        $this->Db->insert("events",$p);
        $this->Msg->set("Mentés sikeres","Üzenet","success");
        redirect('admin/events');
    }
    public function edit($p, $id)
    {
        $this->Db->update("events", $p, "WHERE id='".$id."'");
        $this->Msg->set("Mentés sikeres","Üzenet","success");
        redirect('admin/events');
    }
    public function delete($id)
    {
        $this->Db->delete("events", "WHERE id='".$id."'");
        $this->Msg->set("Törlés sikeres","Üzenet","success");
        redirect('admin/events');
    }
    public function join($p, $eID)
    {
        $persons = array();
        foreach($p['person'] as $k=>$v){
            $person = $this->Db->sqla("persons","fullName","WHERE id='".$v."'")[0]['fullName'];
            array_push($persons, array("id"=>$v, "fullName" => $person));
        };
        $a = array(
            "credentialsID" => $_SESSION['user']['ID'],
            "eventID" => $eID,
            "approved" => 0,
            "joinDate" => date("Y-m-d H:i:s"),
            "carID" => $p['carID'],
            "persons" => json_encode($persons),
            "status" => "pending"
        );
        $this->Db->insert("event_joins", $a);
        $this->Msg->set("Sikeresen jelenteztél az eseményre","Üzenet","success");
        redirect('event/'.$eID);
    }
    public function getJoinedEventByUserId($id)
    {
        $data = $this->Db->sqla("event_joins","*","
        INNER JOIN user_profile ON event_joins.credentialsID = user_profile.credentialsID 
        INNER JOIN user_cars ON event_joins.carID = user_cars.id 
        INNER JOIN events ON event_joins.eventID = events.id
        WHERE event_joins.credentialsID = '".$id."' 
        ORDER BY events.startDate DESC
        ");
        return $data;
    }
    public function hasEventByUserId($id, $eID)
    {
        $data = $this->Db->sqln("event_joins","*","
        INNER JOIN events ON event_joins.eventID = events.id
        WHERE event_joins.credentialsID = '".$id."' AND 
        events.id = '".$eID."'
        ");
        return ($data == 1) ? true : false;
    }
}
?>