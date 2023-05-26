<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	protected $data = array();
	protected $errorMsg = array(
		"required" => "A %s mező kitöltése kötelező!",
		"valid_email" => "A %s mező nem érvényes e-mail cím! Adj meg másikat!",
		"is_unique" => "A %s már használatban van!",
		"min_length" => "A {field} mezőnek legalább {param} karakterből kell állnia!",
		"max_length" => "A {field} mezőnek legalább {param} karakterből kell állnia!",
		"matches" => "A {field} mező nem egyezik meg a {param} mezővel!"
	);
	public function __construct()
	{
		parent::__construct();
		if(!isset($_SESSION['login'])){
			$_SESSION['login'] = false;
			redirect('index');
		};
	}
	public function index()
	{
		if($this->User->isGuest() == false){ redirect('dashboard'); };
		$this->form_validation->set_rules("email","E-mail cím","trim|valid_email|required", $this->errorMsg);
		$this->form_validation->set_rules("password","Jelszó","trim|required|min_length[6]", $this->errorMsg);
		if($this->form_validation->run() == false){
			$this->data['m'] = "login";
			$this->load->view('sportbiro/index', $this->data);
		}else{
			$this->User->loginExec($this->input->post());
		}
	}
	public function register()
	{
		if($this->User->isGuest() == false){ redirect('dashboard'); };
		$this->form_validation->set_rules("email","E-mail cím","trim|valid_email|required|is_unique[credentials.email]", $this->errorMsg);
		$this->form_validation->set_rules("password","Jelszó","trim|required|min_length[6]", $this->errorMsg);
		$this->form_validation->set_rules("password_rep","Jelszó megerősítése","trim|required|min_length[6]|matches[password]", $this->errorMsg);
		$this->form_validation->set_rules("name","Teljes név","trim|required", $this->errorMsg);
		$this->form_validation->set_rules("marshalCardNo","Sportbírói ig. száma","trim|required|min_length[4]|max_length[4]|is_unique[user_profile.marshalCardNo]", $this->errorMsg);
		if($this->form_validation->run() == false){
			$this->data['m'] = "register";
			$this->load->view('sportbiro/index', $this->data);
		}else{
			$this->User->registerExec($this->input->post());
		}
	}
	public function logout()
	{
		$this->User->protect();
		$_SESSION['login'] = false;
		unset($_SESSION['user']);
		redirect('index');
	}
	public function dashboard()
	{
		$this->User->protect();
		$this->data['m'] = "dashboard";
		$this->load->view('sportbiro/index', $this->data);
	}
	public function myprofile()
	{
		$this->User->protect();
		$this->form_validation->set_rules("fullName","Teljes név","trim|required", $this->errorMsg);
		$this->form_validation->set_rules("idcardno","Személyi ig. szám","trim|required", $this->errorMsg);
		$this->form_validation->set_rules("bornplace","Születési hely","trim|required", $this->errorMsg);
		$this->form_validation->set_rules("borndate_y","Születési idő (év)","trim|required", $this->errorMsg);
		$this->form_validation->set_rules("borndate_m","Születési idő (hó)","trim|required", $this->errorMsg);
		$this->form_validation->set_rules("borndate_d","Születési idő (nap)","trim|required", $this->errorMsg);

		$this->form_validation->set_rules("postcode","Irányítószám","trim|required", $this->errorMsg);
		$this->form_validation->set_rules("city","Város","trim|required", $this->errorMsg);
		$this->form_validation->set_rules("address","Utca, házszám, emelet, ajtó","trim|required", $this->errorMsg);
		$this->form_validation->set_rules("phoneNo","Telefonszám","trim|required", $this->errorMsg);

		$this->form_validation->set_rules("vatNo","Adószám","trim|required", $this->errorMsg);
		$this->form_validation->set_rules("tajNo","TAJ szám","trim|required", $this->errorMsg);

		if($this->form_validation->run() == false){
			$profile = $this->Db->sqla("user_profile","*","WHERE credentialsID='".$_SESSION['user']['ID']."'")[0];
			$this->data['p'] = $profile;
			$user = $this->Db->sqla("credentials","email","WHERE id='".$_SESSION['user']['ID']."'")[0];
			$this->data['u'] = $user;
			$this->data['m'] = "myprofile";
			$this->load->view('sportbiro/index', $this->data);
		}else{
			$this->User->UpdateProfile($this->input->post());
		}
	}
	public function mycars($m = "list", $id = -1)
	{
		if($m == "list")
		{
			$this->data['c'] = $this->Cars->listmycars();
			$this->data['m'] = "mycars_list";
			$this->load->view('sportbiro/index', $this->data);
		}elseif($m == "add")
		{
			$this->form_validation->set_rules('carRegLetter','Országkód','trim|min_length[1]|max_length[3]|required',$this->errorMsg);
			$this->form_validation->set_rules('licensePlate','Rendszám','trim|required|is_unique[user_cars.licensePlate]',$this->errorMsg);
			$this->form_validation->set_rules('carManufacturer','Gyártó','trim|required',$this->errorMsg);
			$this->form_validation->set_rules('carType','Típus','trim|required',$this->errorMsg);
			if($this->form_validation->run() == false)
			{
				$this->data['m'] = "mycars_form";
				$this->data['f'] = 'new';
				$this->data['c'] = array();
				$this->load->view('sportbiro/index', $this->data);
			}else{
				$this->Cars->newcar($this->input->post());
			}
		}elseif($m == "edit" && $id > 0) {
			$this->form_validation->set_rules('carRegLetter','Országkód','trim|min_length[1]|max_length[3]|required',$this->errorMsg);
			$this->form_validation->set_rules('licensePlate','Rendszám','trim|required',$this->errorMsg);
			$this->form_validation->set_rules('carManufacturer','Gyártó','trim|required',$this->errorMsg);
			$this->form_validation->set_rules('carType','Típus','trim|required',$this->errorMsg);
			if($this->form_validation->run() == false)
			{
				$this->data['m'] = "mycars_form";
				$this->data['f'] = 'edit';
				$this->data['c'] = $this->Cars->getCarById($id);
				$this->load->view('sportbiro/index', $this->data);
			}else{
				$this->Cars->editCar($this->input->post(), $id);
			}
		}elseif($m == "rem" && $id > 0){
			$this->Cars->remove($id);
		}elseif($m == "noCar"){
			$a = array(
				"credentialsID" => $_SESSION['user']['ID'],
				"haventCar" => "1"
			);
			$this->Db->insert("user_cars",$a);
			$this->Msg->set("Adatrögzítés sikeres: Nem rendelkezel autóval!","","success");
			redirect('my-cars/list');
		}
		elseif($m == "haveCar")
		{
			$this->Db->delete("user_cars","WHERE credentialsID='".$_SESSION['user']['ID']."'");
			redirect('my-cars/add');
		}
	}
	
	public function calendar()
	{
		$this->data['e'] = $this->Events->getUpcomming();
		$this->data['m'] = "calendar";
		$this->load->view('sportbiro/index', $this->data);
	}
	public function event($id, $f = "open")
	{
		if($f == "open"){
			$this->data['e'] = $this->Events->getAll("WHERE id='".$id."'")[0];
        	$this->data['m'] = "a_events_open";
        	$this->load->view('sportbiro/index', $this->data);
		}elseif($f == "join"){
			$this->form_validation->set_rules('carID','Autó','trim|required',$this->errorMsg);
			if($this->form_validation->run() == false){
				$this->data['e'] = $this->Events->getAll("WHERE id='".$id."'")[0];
        		$this->data['m'] = "a_event_join";
        		$this->load->view('sportbiro/index', $this->data);
			}else{
				$this->Events->join($this->input->post(), $id);
			}
		}
	}
	public function myEvents()
	{
		$this->data['e'] = $this->Events->getJoinedEventByUserId($_SESSION['user']['ID']);
        $this->data['m'] = "myEvents";
        $this->load->view('sportbiro/index', $this->data);
	}
}
