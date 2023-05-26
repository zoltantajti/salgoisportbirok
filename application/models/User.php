<?php
class User extends CI_Model
{
    protected $salt = "SALGO#MARSHAL#2023#?";
    public function __construct() { parent::__construct(); }
    public function protect() { if(!isset($_SESSION['login']) || $_SESSION['login'] == false) { redirect('index'); }; }
    public function isGuest() { if(!isset($_SESSION['login']) || $_SESSION['login'] == false) { return true; }else{ return false; }; }
    public function isLogin() { if(isset($_SESSION['login']) && $_SESSION['login'] == true) { return true; }else{ return false; }; }
    public function isAdmin() { if($this->isLogin() && $_SESSION['user']['permission'] >= 2) { return true; }else{ return false; }; }
    public function getPerm() { return $_SESSION['user']['permission']; }

    public function registerExec($p)
    {
        unset($p['password_rep']);
        $p['password'] = $this->hash($p['password']);
        $p['permissionID'] = 1;
        $p['active'] = 0;
        $credentials = array(
            "email" => $p['email'],
            "password" => $p['password'],
            "permissionID" => $p['permissionID'],
            "active" => $p['active']
        );
        $this->Db->insert("credentials", $credentials);
        $id = $this->Db->sqla("credentials", "id", "WHERE email='".$p['email']."' AND password ='".$p['password']."'")[0]['id'];
        $profile = array(
            "credentialsID" => $id,
            "fullName" => $p['name'],
            "marshalCardNo" => $p['marshalCardNo']
        );
        $this->Db->insert("user_profile", $profile);
        $this->Msg->set("Sikeres regisztráció! Kérlek várj, amíg a vezetőbíró, vagy egy admin elfogadja a regisztrációd!","","success");
        redirect('index');
    }
    public function loginExec($p)
    {
        $p['password'] = $this->hash($p['password']);
        if($this->Db->sqln("credentials","id","WHERE email='".$p['email']."'") == 1)
        {
            if($this->Db->sqln("credentials","id","WHERE email='".$p['email']."' && password='".$p['password']."'") == 1)
            {
                if($this->Db->sqln("credentials","id","WHERE email='".$p['email']."' && password='".$p['password']."' AND active='1'") == 1)
                {
                    $c = $this->Db->sqla("credentials","id,email,permissionID","WHERE email='".$p['email']."' && password='".$p['password']."' AND active='1'")[0];
                    $p = $this->Db->sqla("permissions","id,name,perm","WHERE id='".$c['permissionID']."'")[0];
                    $u = $this->Db->sqla("user_profile","*","WHERE credentialsID='".$c['id']."'")[0];

                    $user = array(
                        "ID" => $c['id'],
                        "permID" => $p['id'],
                        "permName" => $p['name'],
                        "permission" => $p['perm'],
                        "fullName" => $u['fullName']
                    );
                    
                    $_SESSION['login'] = true;
                    $_SESSION['user'] = $user;

                    redirect('dashboard');
                }
                else
                {
                    $this->Msg->set("A fiókod még nem aktív!", "", "danger");
                    redirect('index');
                }
            }
            else
            {
                $this->Msg->set("Hibás jelszó!", "", "danger");
                redirect('index');
            };
        }
        else
        {
            $this->Msg->set("Hibás e-mail cím!", "", "danger");
            redirect('index');
        };
    }

    public function checkProfile()
    {
        $p = $this->Db->sqla("user_profile", "*", "WHERE credentialsId='".$_SESSION['user']['ID']."'")[0];
        if($p['idcardno'] == "" || $p['borndate'] == "" || $p['bornplace'] == "" || $p['postcode'] == "" || $p['city'] == "" || 
        $p['address'] == "" || $p['phoneNo'] == "" || $p['vatNo'] == "" || $p['tajNo'] == "") {
            return false;
        }else{
            return true;
        };
    }
    public function checkCars()
    {
        if($this->Db->sqln("user_cars","*","WHERE credentialsID='".$_SESSION['user']['ID']."'") == 0)
        {
            return false;
        }else return true;
    }
    public function UpdateProfile($p)
    {
        $p['borndate'] = $p['borndate_y']."-".$p['borndate_m']."-".$p['borndate_d'];
        unset($p['borndate_y'],$p['borndate_m'],$p['borndate_d']);
        $this->Db->update("user_profile",$p,"WHERE credentialsId='".$_SESSION['user']['ID']."'");
        $this->Msg->set("A profil mentése sikeres", "", "success");
        redirect('my-profile');
    }

    public function getNew()
    {
        return $this->Db->sqla("credentials","*","INNER JOIN user_profile ON credentials.id = user_profile.credentialsID WHERE active='0'");
    }
    public function countNew()
    {
        return $this->Db->sqln("credentials","*","WHERE active='0'");
    }
    public function getAll()
    {
        return $this->Db->sqla("credentials","*","INNER JOIN user_profile ON credentials.id = user_profile.credentialsID WHERE active='1'");
    }
    public function getById($id)
    {
        return $this->Db->sqla("credentials","*","INNER JOIN user_profile ON credentials.id = user_profile.credentialsID WHERE credentials.id='".$id."'")[0];
    }

    //Private
    private function hash($string)
    {
        $pw = hash("SHA512", $this->salt . $string);
        return $pw;
    }
    private function makeAvatar($string)
    {
        $path = "./assets/img/avatars/" . time() . ".png";
        $image = imagecreate(200,200);
        $red = rand(0,255);
        $blue = rand(0,255);
        $green = rand(0,255);
        imagecolorallocate($image, $red, $green, $blue);
        $textcolor = imagecolorallocate($image, 255, 255, 255);
        $font = dirname(__FILE__) . "\\arial.ttf";
        imagettftext($image, 100, 0, 55, 150, $textcolor, $font, strtoupper($string));
        imagepng($image, $path);
        imagedestroy($image);
        return $path;
    }

};