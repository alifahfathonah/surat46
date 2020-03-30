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

        get_header('Tulis Surat Izin Rektorat', 'add_mail', 'add_mail');
        get_template_part('mails/rektorat', $params);
        get_footer(array('current_section' => 'add_mail'));
    }

    public function surat_aktif() {
        $params['flash'] = $this->session->flashdata('template_flash');
        $params['classifications'] = $this->classifications->get_all_classifications();
        $params['last_agenda'] = $this->outbox->get_last_agenda_number();

        get_header('Tulis Surat Keterangan Aktif', 'add_mail', 'add_mail');
        get_template_part('mails/surat_aktif', $params);
        get_footer(array('current_section' => 'add_mail'));
    }

    public function surat_mandat() {

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

    public function export_pdf()
    {
        if ( $this->input->is_ajax_request()) {
            $type = $this->input->get('type');

            $params['type'] = $type;
            $params['number'] = $this->input->get('number');
            $params['subject'] = $this->input->get('subject');
            $params['date'] = $this->input->get('date');
            $params['mail_to'] = $this->input->get('mail_to');
            $params['mail_to_place'] = $this->input->get('mail_to_place');
            $params['event_name'] = strip_tags($this->input->get('event_name'));
            $params['event_date'] = $this->input->get('event_date');
            $params['event_time'] = $this->input->get('event_time');
            $params['event_location'] = $this->input->get('event_location');
            $params['borrowing_item'] = $this->input->get('borrowing_item');
            $params['leader_text_one'] = $this->input->get('leader_text_one');
            $params['leader_text_second'] = $this->input->get('leader_text_second');
            $params['leader_item_one'] = $this->input->get('leader_item_one');
            $params['leader_item_second'] = $this->input->get('leader_item_second');
            $params['leader_number_one'] = $this->input->get('leader_number_one');
            $params['leader_number_second'] = $this->input->get('leader_number_second');
            $params['co_leader_co_text'] = $this->input->get('co_leader_co_text');
            $params['co_leader_text'] = $this->input->get('co_leader_text');
            $params['co_leader_name'] = $this->input->get('co_leader_name');
            $params['co_leader_number'] = $this->input->get('co_leader_number');

            $mpdf = new \Mpdf\Mpdf();
            $time = time(); 

            $data = $this->load->view('themes/adminlte/mails/mpdf', $params, true);
            $file = 'assets/uploads/_temp/'. $time .'.pdf';

            $mpdf->WriteHTML($data);
            $mpdf->Output($file);
        
            $res = array(
                'success' => TRUE,
                'time' => $time,
                'file_location' => 'assets/uploads/_temp/'. $time .'.pdf',
                'params' => $params
            );

            $this->output->set_content_type('application/json')
                ->set_output(json_encode($res));
        }
        else {
            show_error('Akses tidak sah!');
        }
    }

    public function export_pdf_surat_aktif() {
        if ( $this->input->is_ajax_request()) {

            $params['number'] = $this->input->get('number');
            $params['subject'] = $this->input->get('subject');
            $params['date'] = $this->input->get('date');
            $params['k_name'] = $this->input->get('k_name');
            $params['k_npm'] = $this->input->get('k_npm');
            $params['k_prodi'] = $this->input->get('k_prodi');
            $params['k_jabatan'] = $this->input->get('k_jabatan');
            $params['k_organisasi'] = $this->input->get('k_organisasi');
            $params['a_name'] = $this->input->get('a_name');
            $params['a_npm'] = $this->input->get('a_npm');
            $params['a_prodi'] = $this->input->get('a_prodi');
            $params['a_jabatan'] = $this->input->get('a_jabatan');
            $params['a_organisasi'] = $this->input->get('a_organisasi');
            $params['ketum_txt'] = $this->input->get('ketum_txt');
            $params['ketum_organisasi'] = $this->input->get('ketum_organisasi');
            $params['ketum_name'] = $this->input->get('ketum_name');
            $params['ketum_npm'] = $this->input->get('ketum_npm');

            $mpdf = new \Mpdf\Mpdf();
            $time = time(); 

            $data = $this->load->view('themes/adminlte/mails/mpdf_surat_aktif', $params, true);
            $file = 'assets/uploads/_temp/'. $time .'.pdf';

            $mpdf->WriteHTML($data);
            $mpdf->Output($file);
        
            $res = array(
                'success' => TRUE,
                'time' => $time,
                'file_location' => 'assets/uploads/_temp/'. $time .'.pdf',
                'params' => $params
            );

            $this->output->set_content_type('application/json')
                ->set_output(json_encode($res));
        }
        else {
            show_error('Akses tidak sah!');
        }
    }

    public function convert_date()
    {
        if ( $this->input->is_ajax_request())
        {
            $date = $this->input->get('date');

            $date = get_formatted_date($date);

            $this->output->set_content_type('application/json')
                ->set_output(json_encode(array('day' => $date)));
        }
        else
        {
            show_error('Akses tidak sah!');
        }
    }

}