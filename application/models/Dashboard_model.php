<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model {
    public function __construct()
    {
        parent::__construct();
    }

    public function mail_this_week()
    {
        $inbox = $this->db
            ->query("SELECT * FROM 46_incoming_mail WHERE YEARWEEK(`date`, 1) = YEARWEEK(CURDATE(), 1)")
            ->num_rows();
        $outbox = $this->db
            ->query("SELECT * FROM 46_outbox WHERE YEARWEEK(`date`, 1) = YEARWEEK(CURDATE(), 1)")
            ->num_rows();

        return ($inbox + $outbox);
    }

    public function mail_this_month()
    {
        $inbox = $this->db
            ->query("SELECT *
                FROM 46_incoming_mail
                WHERE MONTH(created_at) = MONTH(CURRENT_DATE())
                AND YEAR(created_at) = YEAR(CURRENT_DATE())")
            ->num_rows();
        $outbox = $this->db
            ->query("SELECT *
                FROM 46_outbox
                WHERE MONTH(created_at) = MONTH(CURRENT_DATE())
                AND YEAR(created_at) = YEAR(CURRENT_DATE())")
            ->num_rows();

        return ($inbox + $outbox);
    }
}