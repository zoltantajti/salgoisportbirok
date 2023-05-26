<?php
class Cars extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function listmycars()
    {
        return $this->Db->sqla("user_cars","*","WHERE credentialsID='".$_SESSION['user']['ID']."'");
    }
    public function getCarById($id)
    {
        return $this->Db->sqla("user_cars","*","WHERE credentialsID='".$_SESSION['user']['ID']."' && id='".$id."'")[0];
    }
    public function listCarsByOwner($id)
    {
        return $this->Db->sqla("user_cars","*","WHERE credentialsID='".$id."'");
    }
    public function newcar($p)
    {
        $p['credentialsID'] = $_SESSION['user']['ID'];
        $p['haventCar'] = 0;
        $this->Db->insert("user_cars", $p);
        $this->Msg->set("Adatrögzítés sikeres: Autó hozzáadva","","success");
        redirect('my-cars/list');
    }
    public function editCar($p, $id)
    {
        $this->Db->update("user_cars", $p, "WHERE id='".$id."'");
        $this->Msg->set("Adatmódosítás sikeres: Autó szerkesztve","","success");
        redirect('my-cars/list');
    }
    public function remove($id)
    {
        $this->Db->delete("user_cars","WHERE id='".$id."' AND credentialsID='".$_SESSION['user']['ID']."'");
        $this->Msg->set("Autó sikeresen törölve","","success");
        redirect('my-cars/list');
    }


    public function drawLicensePlate($regCode, $plate)
    {
        $ret = '<span class="plateFrame"><span class="cCode">' . $regCode . '</span><span class="plate">' . $plate . '</span></span>';
        return $ret;
    }
    
}