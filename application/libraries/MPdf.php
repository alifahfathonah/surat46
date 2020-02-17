<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MPdf {
    public $param;
    public $pdf;
 
    public function __construct($param = '"en-GB-x", "A4", "", "", 10, 10, 10, 10, 6, 3')
    {
        $this->param = $param;
        $this->pdf = new \Mpdf\Mpdf($this->param);
    }
}