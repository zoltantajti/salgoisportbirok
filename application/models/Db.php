<?php
class Db extends CI_Model {
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    private function qry($sql){
        return $this->db->query($sql);
    }
    public function sqla($tabla, $mit = "*", $cond = ""){
        $res = $this->qry("SELECT " . $mit . " FROM `" . $tabla . "` " . $cond);
        $ret = array();
        foreach($res->result_array() as $k=>$v){
            array_push($ret, $v);
        };
        return $ret;
    }
    public function sqln($tabla, $mit = "*", $cond = ""){
        $res = $this->qry("SELECT " . $mit . " FROM `" . $tabla . "` " . $cond);
        $ret = $res->num_rows();
        return $ret;
    }
    public function insert($tabla, $array){
        $str = "INSERT INTO `" . $tabla . "` SET ";
        $sep = ", "; $i = 0;
        foreach($array as $k=>$v){
            $str .= (($i == 0) ? "" : ", ") . $k . "='" . $v . "'"; $i++;
        };
        $this->qry($str);
        return true;
    }
    public function update($tabla, $array, $cond){
        $str = "UPDATE `" . $tabla . "` SET ";
        $sep = ", "; $i = 0;
        foreach($array as $k=>$v){
            $str .= (($i == 0) ? "" : ", ") . $k . "='" . $v . "'"; $i++;
        };
        $str .= " " . $cond;
        $this->qry($str);
        return true;
    }
    public function delete($tabla, $cond){
        $this->qry("DELETE FROM `" . $tabla . "` " . $cond);
    }
}