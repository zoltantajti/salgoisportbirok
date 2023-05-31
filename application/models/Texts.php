<?php
class Texts extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getByAlias($a)
    {
        return $this->Db->sqla("texts","content","WHERE alias='".$a."'")[0]['content'];
    }
}