<?php

class Minggu4 extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("user_model");
        //$this->load->library('form_validation');
        $this->load->library('unit_test');
        // $this->output->enable_profiler(TRUE);
    }

    public function index()
    {
        //template
        $str = '
            <table border="0" cellpadding="4" cellspacing="1">
            {rows}
                    <tr>
                            <td>{item}</td>
                            <td>{result}</td>
                    </tr>
            {/rows}
            </table>';
        //$this->unit->set_template($str);
        $true = true;
        $expected = true;
        $test_name = 'uji coba assert';

        //test url
        //$output = $this->request('GET',['Login','test']);
        $expect = '{"foo":"bar"}';

        //$this->unit->run($output,$expect,$test_name);
        $this->unit->run($true,$expected,$test_name);

        $test_name = 'tes if else';
        $this->unit->run($this->ifelse('tes','halo'),'tes',$test_name);

        $test_name = 'tes loop 2';
        $arr = array(0,1,2,3,4);
        $this->unit->run($this->loop2($arr),4,$test_name);

        //IFELSE
        $judul = 'Pengujian If Else namachief null namarm null';
        $expected = 'Something wrong. Please contact US';
        $this->unit->run($this->ifelse(null,null),$expected,$judul);

        $judul = 'Pengujian If Else val namarm null';
        $result = $this->ifelse("Val", null);
        $expected = 'tan';
        $this->unit->run($result, $expected, $judul);

        $judul = 'Pengujian If Else val namarm tan';
        $result = $this->ifelse("Val", "tan");
        $expected = 'tan';
        $this->unit->run($result, $expected, $judul);

        $judul = 'Pengujian If Else null namarm tan';
        $result = $this->ifelse(null, "tan");
        $expected = 'tan';
        $this->unit->run($result, $expected, $judul);

        //IFELSE2
        $judul = 'Pengujian If Else2 null';
        $expected = 'dia bukan teman saya';
        $this->unit->run($this->ifelse2(null),$expected,$judul);

        $judul = 'Pengujian If Else2 andi';
        $result = $this->ifelse2("andi");
        $expected = 'dia bukan teman saya';
        $this->unit->run($result, $expected, $judul);

        $judul = 'Pengujian If Else2 val';
        $result = $this->ifelse2("val");
        $expected = 'dia bukan teman saya';
        $this->unit->run($result, $expected, $judul);


        //IFELSE3 
        $judul = 'Pengujian If Else3 1';
        $expected = 'Something wrong. Please contact US';
        $this->unit->run($this->ifelse3(null,null,null),$expected,$judul);
        
        $judul = 'Pengujian If Else3 2';
        $result = $this->ifelse3("Val", null, null);
        $expected = 'Val';
        $this->unit->run($result,$expected, $judul);
        
        $judul = 'Pengujian If Else3 3';
        $result = $this->ifelse3(null, "Val", null);
        $expected = 'Val';
        $this->unit->run($result, $expected, $judul);
        
        $judul = 'Pengujian If Else3 4';
        $result = $this->ifelse3(null, null, "Val");
        $expected = 'Val';
        $this->unit->run($result, $expected, $judul);

        $judul = 'Pengujian If Else3 5';
        $result = $this->ifelse3("Val", "Tan", null);
        $expected = 'Val';
        $this->unit->run($result, $expected, $judul);

        $judul = 'Pengujian If Else3 6';
        $result = $this->ifelse3("Val", "Tan", "Nes");
        $expected = 'Val';
        $this->unit->run($result, $expected, $judul);
        
        $judul = 'Pengujian If Else3 7';
        $result = $this->ifelse3(null, "Val", "Tan");
        $expected = 'Val';
        $this->unit->run($result, $expected, $judul);
        
        $judul = 'Pengujian If Else3 8';
        $result = $this->ifelse3("Val", null, "Tan");
        $expected = 'Val';
        $this->unit->run($result, $expected, $judul);
        
        //IFELSE4
        $judul = 'Pengujian If Else4 1';
        $result = $this->ifelse4();
        $expected = 'Have a nice Tuesday!';
        $this->unit->run($result, $expected, $judul);

        $judul = 'Pengujian If Else4 2';
        $result = $this->ifelse4();
        $expected = 'Have a nice weekend!';
        $this->unit->run($result, $expected, $judul);

        $judul = 'Pengujian If Else4 3';
        $result = $this->ifelse4();
        $expected = 'Have a nice Monday!';
        $this->unit->run($result, $expected, $judul);

        $judul = 'Pengujian If Else4 4';
        $result = $this->ifelse4();
        $expected = 'Have a nice Wednesday!';
        $this->unit->run($result, $expected, $judul);

        $judul = 'Pengujian If Else4 5';
        $result = $this->ifelse4();
        $expected = 'Have a nice Thursday!';
        $this->unit->run($result, $expected, $judul);

        $judul = 'Pengujian If Else4 6';
        $result = $this->ifelse4();
        $expected = 'Have a nice Weekend!';
        $this->unit->run($result, $expected, $judul);

        //loop1
        $judul = 'Pengujian LOOP1 1';
        $this->unit->run($this->loop1('1'),'2048',$judul);

        $judul = 'Pengujian LOOP1 2';
        $this->unit->run($this->loop1(null),null,$judul);

        //loop2
        $judul = 'Pengujian LOOP2 1';
        $arr = array(0,1,2,3,4);
        $this->unit->run($this->loop2($arr),4,$judul);

        $judul = 'Pengujian LOOP2 2';
        $arr = array(null);
        $this->unit->run($this->loop2($arr),0,$judul);

        $judul = 'Pengujian LOOP2 3';
        $arr = array(1,1,1,1);
        $this->unit->run($this->loop2($arr),2,$judul);

        $judul = 'Pengujian LOOP2 4';
        $arr = array();
        $this->unit->run($this->loop2($arr),'tes',$judul);

        $judul = 'Pengujian LOOP2 5';
        $arr = array();
        $this->unit->run($this->loop2($arr),0,$judul);

        //loop3
        $judul = 'Pengujian LOOP3 1';
        $this->unit->run($this->loop3('1'),'2048',$judul);

        $judul = 'Pengujian LOOP3 2';
        $this->unit->run($this->loop3(null),null,$judul);

        echo $this->unit->report();
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(site_url('admin/login'));
    }

    public function test()
    {
        $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode(array('foo' => 'bar')));
    }

    //minggu 3
    public function ifelse($namachief = null,$namarm = null){
        $tmp = '';
        if($namachief != NULL){
            $tmp = $namachief;
        }
        else if ($namarm != NULL){
           $tmp = $namarm;
        }
        else{
            $tmp = "Something wrong. Please contact US";
        }
        return $tmp;
    }

    public function ifelse2($teman){
        $tmp = '';
        if($teman == "andi"){
            $tmp = "dia adalah teman saya";
        }else{
            $tmp = "dia bukan teman saya";
        }
        return $tmp;
    }

    public function ifelse3($namachief = null, $namarm = null, $namamhs){
        $tmp = '';
        if($namachief != NULL){
            $tmp = $namachief;
        }
        else if ($namarm != NULL){
            $tmp = $namarm;
        }
        else if ($namamhs != NULL){
            $tmp = $namamhs;
         }
        else{
            $tmp = "Something wrong. Please contact US";
        }
        return $tmp;
    }

    public function ifelse4($inputtgl = 'D'){
        $tmp = '';
        $d = date($inputtgl);
        if($d == "Fri"){
            $tmp = "Have a nice weekend!";
        }elseif($d == "Sun"){
            $tmp = "Have a nice weekend!";
        }elseif($d == "Mon"){
            $tmp = "Have a nice Monday!";
        }elseif($d == "Tue"){
            $tmp = "Have a nice Tuesday!";
        }elseif($d == "Wed"){
            $tmp = "Have a nice Wednesday!";
        }elseif($d == "Thu"){
            $tmp = "Have a nice Thursday!";
        }elseif($d == "Sat"){
            $tmp = "Have a nice Weekend!";
        }
        return $tmp;
    }

    public function loop1($var){
        for ($i=0; $i <= 10; $i++) { 
            $var+=$var; // variabel kiri untuk nyimpan
        }
        return $var;
    }

    public function loop2($arr){
        $result = '';
        foreach ($arr as $key => $value) {
            if($key % 2 == 1){
                $value+=$value;
            }
            $result = $value;
        }
        return $result;
    }

    public function loop3($var){
        $a=0;
        while ($a <= 10) {
            $var += $var;
            $a++;
        }
        return $var;
    }
}
