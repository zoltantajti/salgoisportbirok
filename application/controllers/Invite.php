<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invite extends CI_Controller {
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
	}
    public function success()
    {
        $this->load->view('sportbiro/ext_success');
    }
    public function accept($authKey)
    {
        $result = $this->InvLinks->validate($authKey);
        if($result['valid'])
        {
            $this->form_validation->set_rules("fullName","Teljes név","trim|required", $this->errorMsg);
			$this->form_validation->set_rules("idcardno","Személyi ig. szám","trim|required|is_unique[persons.idcardno]", $this->errorMsg);
			$this->form_validation->set_rules("bornplace","Születési hely","trim|required", $this->errorMsg);
			$this->form_validation->set_rules("borndate","Születési idő","trim|required", $this->errorMsg);

			$this->form_validation->set_rules("postcode","Irányítószám","trim|required", $this->errorMsg);
			$this->form_validation->set_rules("city","Város","trim|required", $this->errorMsg);
			$this->form_validation->set_rules("address","Utca, házszám, emelet, ajtó","trim|required", $this->errorMsg);
			$this->form_validation->set_rules("phoneNo","Telefonszám","trim|required|is_unique[persons.phoneNo]", $this->errorMsg);

			$this->form_validation->set_rules("vatNo","Adószám","trim|required|is_unique[persons.vatNo]", $this->errorMsg);
			$this->form_validation->set_rules("tajNo","TAJ szám","trim|required|is_unique[persons.tajNo]", $this->errorMsg);
			$this->form_validation->set_rules("email","E-mail cím","trim|required|valid_email|is_unique[persons.email]", $this->errorMsg);

            if(!$this->form_validation->run()){
                $this->data['marshal'] = $this->Db->sqla("user_profile","credentialsID,fullName","WHERE credentialsID='".$result['marshal']."'")[0];
                $this->load->view('sportbiro/ext_regPage', $this->data);
            }else{
                $this->InvLinks->auth($this->input->post(), $authKey);
            }
        }
    }

};