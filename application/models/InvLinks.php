<?php
class InvLinks extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function generate()
    {
        $key = $this->generateAuthKey();
        $exp = $this->generateExpired();
        $a = array(
            "marshalID" => $_SESSION['user']['ID'],
            "authKey" => $key,
            "expiredDate" => $exp,
            "used" => 0
        );
        $this->Db->insert("persons_invitekeys", $a);
        $keyID = $this->Db->sqla("persons_invitekeys","id","WHERE authKey='".$key."'")[0];
        redirect('invlinks/open/'. $keyID['id']);
    }
    public function Remove($id)
    {
        $this->Db->delete("persons_invitekeys", "WHERE id='".$id."' AND marshalID='".$_SESSION['user']['ID']."'");
        $this->Msg->set("Sikeresen törölted a linket","","success");
        redirect('invlinks');
    }
    public function getById($id)
    {
        $key = $this->Db->sqla("persons_invitekeys","authKey,expiredDate","WHERE id='".$id."'")[0];
        return $key;
    }
    public function getMy()
    {
        $key = $this->Db->sqla("persons_invitekeys","id,expiredDate,used","WHERE marshalID='".$_SESSION['user']['ID']."'");
        return $key;
    }

    private function generateExpired() { $date = date("Y-m-d H:i:s"); return date("Y-m-d H:i:s", strtotime($date . ' + 2 days')); }
    private function generateAuthKey(){ $key = date("Y-m-d H:i:s") .";". $_SERVER['REMOTE_ADDR'] .";". $_SESSION['user']['ID'] .";". $_SESSION['user']['fullName']; return $this->makeHash($key); }
    private function makeHash($key, $algo = "SHA512") { return hash($algo, $key); }


    public function validate($link)
    {
        if($this->Db->sqln("persons_invitekeys","id","WHERE authKey='".$link."'") == 1)
        {
            $key = $this->Db->sqla("persons_invitekeys","*","WHERE authKey='".$link."'")[0];
            if($key['expiredDate'] <= date("Y-m-d H:i:s")){
                return array("valid" => "invalid", "error" => "expiredkey");
            }else{
                return array("valid" => "valid", "error" => "", "marshal" => $key['marshalID']);
            }
        }
        else
        {
            return array("valid" => "invalid", "error" => "invalidkey");
        }
    }

    public function auth($p,$authKey)
    {
        $this->Db->update("persons_invitekeys",array("used"=>"1"),"WHERE authKey = '".$authKey."'");
        $this->Db->insert("persons",$p);
        $this->Msg->set("Sikeres regisztráció","","success");
        redirect('invite/success');
    }
}