<?Php
class Events extends CI_Model
{
    public function getAll($cond = "")
    {
        return $this->Db->sqla("events","*",$cond);
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
}
?>