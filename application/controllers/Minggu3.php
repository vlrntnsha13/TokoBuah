<?php

class Minggu3 extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('unit_test'); // import library/model
    }

    public function index(){
        //pengujian ifelse
        $judul = 'Pengujian If Else namachief null namarm null';
        $expected = 'Something wrong. Please contact us';
        $this->unit->run($this->ifelse(null,null),$expected,$judul);

        $judul = 'Pengujian If Else val namarm null';
        $result = $this->ifelse("Val", null);
        $expected = 'Val';
        $this->unit->run($result, "Val", $judul);

        $judul = 'Pengujian If Else val namarm tan';
        $result = $this->ifelse("Val", "tan");
        $expected = 'Val';
        $this->unit->run($result, "Val", $judul);

        $judul = 'Pengujian If Else null namarm tan';
        $result = $this->ifelse(null, "tan");
        $expected = 'Val';
        $this->unit->run($result, "tan", $judul);

        echo $this->unit->report();
    }

    public function ifelse($namachief = null, $namarm = null){ // null = default parameter
        $tmp = '';
        if($namachief != NULL){
            $tmp = $namachief;
        }
        else if($namarm != NULL){
            $tmp = $namarm;
        }
        else{
            $tmp = "Something wrong. Please contact us";
        }
        return $tmp;
    }
}