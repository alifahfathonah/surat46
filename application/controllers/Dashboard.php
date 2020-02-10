<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    public function __construct()
    {
        parent::__construct();

        verify_session();
        $this->load->model([
            'inbox_model' => 'inbox',
            'outbox_model' => 'outbox',
            'classifications_model' => 'classifications',
            'Disposition_model' => 'disposition',
            'Dashboard_model' => 'dashboard'
        ]);

        $this->load->helper('text');
    }

    public function index()
    {
        $total['inbox'] = $this->inbox->total_inbox();
        $total['outbox'] = $this->outbox->total_outbox();
        $total['classifications'] = $this->classifications->total_classifications();
        $total['dispositions'] = $this->disposition->total_dispositions();
        $total['mail_this_week'] = $this->dashboard->mail_this_week();
        $total['mail_this_month'] = $this->dashboard->mail_this_month();
        $latest['inbox'] = $this->inbox->last_five_inbox();
        $latest['outbox'] = $this->outbox->last_five_outbox();

        $params['total'] = $total;
        $params['latest'] = $latest;

        get_header('Selamat Datang di Aplikasi Manajemen Surat:: Surat 46', 'dashboard');
        get_template_part('home', $params);
        get_footer(['current_section' => 'dasbor', $total]);
    }
}