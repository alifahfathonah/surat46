<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mails extends CI_Controller {
    public function __construct()
    {
        parent::__construct();

        verify_session();

        $this->load->library('form_validation');
        $this->load->model([
            'outbox_model' => 'outbox',
            'classifications_model' => 'classifications'
        ]);
    }

    public function index()
    {

    }

    public function write()
    {
        $params['flash'] = $this->session->flashdata('template_flash');

        get_header('Tulis Surat Baru', 'mails', 'add_mail');
        get_template_part('mails/writes', $params);
        get_footer(array('current_section' => 'add_mail'));
    }

    public function write_borrowing_mail()
    {
        $params['flash'] = $this->session->flashdata('template_flash');
        $params['classifications'] = $this->classifications->get_all_classifications();
        $params['last_agenda'] = $this->outbox->get_last_agenda_number();

        get_header('Tulis Surat Peminjaman', 'add_mail', 'add_mail');
        get_template_part('mails/borrowing', $params);
        get_footer(array('current_section' => 'add_mail'));
    }

    public function write_invitation_mail()
    {
        $params['flash'] = $this->session->flashdata('template_flash');
        $params['classifications'] = $this->classifications->get_all_classifications();
        $params['last_agenda'] = $this->outbox->get_last_agenda_number();

        get_header('Tulis Surat Undangan', 'add_mail', 'add_mail');
        get_template_part('mails/invitation', $params);
        get_footer(array('current_section' => 'add_mail'));
    }

    public function write_permission_mail()
    {
        $params['flash'] = $this->session->flashdata('template_flash');
        $params['classifications'] = $this->classifications->get_all_classifications();
        $params['last_agenda'] = $this->outbox->get_last_agenda_number();

        get_header('Tulis Surat Undangan', 'add_mail', 'add_mail');
        get_template_part('mails/permission', $params);
        get_footer(array('current_section' => 'add_mail'));
    }

    public function templates()
    {
        get_header('Template Surat', 'mails');
        get_footer();
    }

    public function add_template()
    {
        $params['flash'] = $this->session->flashdata('template_flash');

        get_header('Tambah Template Surat', 'mails');
        get_template_part('mails/add_template', $params);
        get_footer(array('current_section' => 'add_mail_template'));
    }
}