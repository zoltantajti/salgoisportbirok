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
        $a = array(
            "credentialsID" => $_SESSION['user']['ID'],
            "eventID" => $eID,
            "approved" => 0,
            "joinDate" => date("Y-m-d H:i:s"),
            "carID" => $p['carID']
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
}
?>