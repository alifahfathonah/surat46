<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dispositions extends CI_Controller {
    public function __construct()
    {
        parent::__construct();

        verify_session();

        $this->load->model([
            'disposition_model' => 'disp',
            'inbox_model' => 'inbox'
        ]);
        $this->load->library(['form_validation', 'pagination']);
    }

    public function index()
    {
        $params['dispositions'] = $this->disp->list_all_dispositions();
        $params['characteristics'] = $this->disp->list_all_characteristics();

        get_header('Daftar Disposisi Surat', 'inbox', 'dispositions');
        get_template_part('dispositions/list_all', $params);
        get_footer(['current_section' => 'dispositions']);
    }

    public function add()
    {
        $params['inbox'] = $this->inbox->show_all_inbox();
        $params['charcs'] = $this->disp->list_all_characteristics();
        $params['flash'] = $this->session->flashdata('add_flash');

        get_header('Tambah Disposisi Surat', 'inbox', 'add_disposition');
        get_template_part('dispositions/add', $params);
        get_footer(['current_section' => 'add_disposition']);
    }

    public function add_disposition()
    {
        $this->form_validation->set_error_delimiters('<div class="font-weight-bold text-danger">', '</div>');
        $this->form_validation->set_rules('mail_id', 'Surat', 'required|numeric');
        $this->form_validation->set_rules('to', 'Tujuan disposisi', 'required|max_length[128]');
        $this->form_validation->set_rules('content', 'Isi disposisi', 'required|max_length[255]');
        $this->form_validation->set_rules('sifat', 'Sifat disposisi', 'required|numeric');
        $this->form_validation->set_rules('note', 'Catatan', 'max_length[255]');
        if ($this->form_validation->run() === FALSE)
        {
            $this->add();
        }
        else
        {
            $mail_id = $this->input->post('mail_id');

            $to = $this->input->post('to');
            $content = $this->input->post('content');
            $sifat = $this->input->post('sifat');
            $date_limit = $this->input->post('date_limit');
            $note = $this->input->post('note');

            $data = new stdClass();

            $data->to = $to;
            $data->content = $content;
            $data->characteristic = $sifat;
            $data->date_limit = $date_limit;
            $data->note = $note;

            $add = $this->disp->add_disposition($data);
            $this->disp->add_disposition_mails($mail_id, $add);

            $flash_message = ($add) ? 'Data disposisi berhasil ditambahkan' : 'Terjadi kesalahan saat menambahkan data. Harap ulangi kembali';

            $this->session->set_flashdata('add_flash', $flash_message);
            redirect('dispositions/mail/'. $mail_id);
        }
    }

    public function add_mail($id)
    {
        $mail = $this->inbox->data($id);

        $params['mail'] = $mail;
        $params['charcs'] = $this->disp->list_all_characteristics();
        $params['flash'] = $this->session->flashdata('add_flash');

        get_header('Tambah Disposisi Surat '. $mail->number, 'inbox', 'add_disposition');
        get_template_part('dispositions/add_mail', $params);
        get_footer(['current_section' => 'add_disposition']);
    }

    public function edit($id = 0)
    {
        $data = $this->disp->disposition_data($id);

        $params['inbox'] = $this->inbox->show_all_inbox();
        $params['charcs'] = $this->disp->list_all_characteristics();
        $params['flash'] = $this->session->flashdata('edit_flash');
        $params['data'] = $data;

        get_header('Edit Disposisi Surat', 'inbox', 'add_disposition');
        get_template_part('dispositions/edit', $params);
        get_footer(['current_section' => 'add_disposition']);
    }

    public function edit_disposition()
    {
        $this->form_validation->set_error_delimiters('<div class="font-weight-bold text-danger">', '</div>');
        $this->form_validation->set_rules('to', 'Tujuan disposisi', 'required|max_length[128]');
        $this->form_validation->set_rules('content', 'Isi disposisi', 'required|max_length[255]');
        $this->form_validation->set_rules('sifat', 'Sifat disposisi', 'required|numeric');
        $this->form_validation->set_rules('note', 'Catatan', 'max_length[255]');
        if ($this->form_validation->run() === FALSE)
        {
            $id = $this->input->post('id');
            $this->edit($id);
        }
        else
        {
            $id = $this->input->post('id');
            $to = $this->input->post('to');
            $content = $this->input->post('content');
            $sifat = $this->input->post('sifat');
            $date_limit = $this->input->post('date_limit');
            $note = $this->input->post('note');

            $data = new stdClass();

            $data->to = $to;
            $data->content = $content;
            $data->characteristic = $sifat;
            $data->date_limit = $date_limit;
            $data->note = $note;

            $add = $this->disp->edit_disposition($id, $data);
            $flash_message = ($add) ? 'Data disposisi berhasil diperbarui' : 'Terjadi kesalahan saat memperbarui data. Harap ulangi kembali';

            $this->session->set_flashdata('edit_flash', $flash_message);
            redirect('dispositions/edit/'. $id);
        }
    }

    public function delete()
    {
        if ($this->input->is_ajax_request())
        {
            $id = $this->input->post('id');
            $data = $this->disp->disposition_data($id);
            $delete = $this->disp->delete_disposition($id);

            if ($delete)
            {
                $res = [
                    'success' => TRUE,
                    'message' => 'Data berhasil dihapus'
                ];
            }
            else
            {
                $res = [
                    'errors' => TRUE,
                    'message' => 'Terjadi kesalahan'
                ];
            }

            return $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($res));
        }
        else
        {
            show_error('Akses tidak diizinkan', 405);
        }
    }

    public function mail($id = 0)
    {
        $data = $this->disp->get_mail_dispositions($id);
        $mail = $this->inbox->data($id);

        $params['dispositions'] = $data;
        $params['mail'] = $mail;
        $params['flash'] = $this->session->flashdata('add_flash');
        
        get_header('Disposisi Surat '. $mail->number .' '. $mail->subject, 'inbox', 'disposition_mail');
        get_template_part('dispositions/list', $params);
        get_footer(['current_section' => 'disposition_mail']);
    }

    public function characteristics()
    {
        $params['characteristics'] = $this->disp->list_all_characteristics();
        $params['flash'] = $this->session->flashdata('flash');
        $params['edit_flash'] = $this->session->flashdata('edit_flash');

        $show_card = $this->session->flashdata('show_edit_card');

        get_header('Sifat Disposisi Surat', 'inbox');
        get_template_part('dispositions/characteristics/characteristics', $params);
        get_footer([
            'current_section' => 'characteristics',
            'show_edit_card' => $show_card
        ]);
    }

    public function characteristics_add()
    {
        $this->form_validation->set_rules('name', 'Sifat disposisi', 'required', ['required' => 'Sifat disposisi harus diisi']);

        if ($this->form_validation->run() === FALSE)
        {
            $this->characteristics();
        }
        else
        {
            $name = $this->input->post('name');
            $add = $this->disp->add_characteristic($name);
            $flash_message = ($add) ? 'Data sifat disposisi berhasil ditambahkan' : 'Terjadi kesalahan saat menambahkan data. Harap ulangi kembali';

            $this->session->set_flashdata('flash', $flash_message);
            redirect('dispositions/characteristics');
        }
    }

    public function characteristics_data()
    {
        if ($this->input->is_ajax_request())
        {
            $id = $this->input->get('id');
            $data = $this->disp->characteristic_data($id);

            return $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($data));
        }
        else
        {
            show_error('Akses tidak diizinkan', 405);
        }
    }

    public function characteristics_edit()
    {
        $this->form_validation->set_error_delimiters('<div class="text-danger font-weight-bold">', '</div>');
        $this->form_validation->set_rules('edit_name', 'Sifat disposisi', 'required', ['required' => 'Sifat disposisi harus diisi']);

        if ($this->form_validation->run() === FALSE)
        {
            $this->session->set_flashdata('show_edit_card', TRUE);
            $this->characteristics();
        }
        else
        {
            $id = $this->input->post('id');
            $this->disp->characteristic_data($id);
            $name = $this->input->post('edit_name');
            $edit = $this->disp->edit_characteristic($name);
            $this->session->set_flashdata('show_edit_card', TRUE);
            $flash_message = ($edit) ? 'Data sifat disposisi berhasil diperbarui' : 'Terjadi kesalahan saat memperbarui data. Harap ulangi kembali';

            $this->session->set_flashdata('edit_flash', $flash_message);
            redirect('dispositions/characteristics');
        }
    }

    public function characteristics_delete()
    {
        $id = $this->input->post('id');
        $this->disp->characteristic_data($id);
        $this->disp->delete_characteristic();

        $this->session->set_flashdata('flash', 'Data berhasil dihapus');
        redirect('dispositions/characteristics');
    }
}