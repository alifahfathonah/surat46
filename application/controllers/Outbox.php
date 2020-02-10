<?php
defined('BASEPATH') OR exit('No direct script access alalowed');

class Outbox extends CI_Controller {
    public function __construct()
    {
        parent::__construct();

        verify_session();

        $this->load->model([
            'outbox_model' => 'outbox',
            'classifications_model' => 'classifications'
        ]);
        $this->load->library('form_validation');
    }

    public function index()
    {
        $config['base_url'] = site_url('outbox/index');
        $config['total_rows'] = $this->outbox->total_outbox();
        $config['per_page'] = 10;
        $config['uri_segment'] = 3;
        $config['num_links'] = 2;

        $config['first_link'] = '&laquo;';
        $config['prev_link'] = '&lsaquo;';
        $config['next_link'] = '&rsaquo;';
        $config['last_link'] = '&raquo';
        $config['full_tag_open'] = '<nav class="text-center"><ul class="pagination">';
        $config['full_tag_close'] = '</ul></nav>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link">';
        $config['cur_tag_close'] = '</a></li>';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';
        $config['attributes'] = array('class' => 'page-link');

        $offset = $this->uri->segment(3);
        $offset = ($offset == 0 || empty($offset)) ? 0 : $offset;

        $this->load->library('pagination', $config);
        $pagination = $this->pagination->create_links();

        $params['outbox'] = $this->outbox->show_outbox($config['per_page'], $offset);
        $params['pagination'] = $pagination;
        
        get_header('Surat Keluar', 'outbox', 'outbox');
        get_template_part('outbox/outbox', $params);
        get_footer(['current_section' => 'outbox']);
    }

    public function view($id = 0)
    {
        $data = $this->outbox->data($id);

        $params['data'] = $data;

        get_header('Surat '. $data->number .' '. $data->subject, 'outbox', 'view_outbox');
        get_template_part('outbox/view', $params);
        get_footer(['current_section' => 'view_outbox']);
    }

    public function delete()
    {
        $id = $this->input->post('id');
        $data = $this->outbox->data($id);
        $is_have_file = ($data->file_id == NULL) ? FALSE : TRUE;

        $delete = $this->outbox->delete($id);
        $delete_file = ($is_have_file) ? $this->outbox->delete_mail_file($data->file_id) : FALSE;

        if ($delete)
        {
            $res = [
                'success' => TRUE,
                'message' => 'Pesan berhasil dihapus'
            ];
        }
        else
        {
            $res = [
                'errors' => TRUE,
                'message' => 'terjadi kesalahan'
            ];
        }

        return $this->output->set_content_type('application/json')
            ->set_output(json_encode($res));
    }

    public function add()
    {
        $params['flash'] = $this->session->flashdata('add_flash');
        $params['classifications'] = $this->classifications->get_all_classifications();
        $params['last_agenda'] = $this->outbox->get_last_agenda_number();

        get_header('Catat Surat Keluar Baru', 'outbox', 'add_outbox');
        get_template_part('outbox/add', $params);
        get_footer(['current_section' => 'add_outbox']);
    }

    public function add_outbox()
    {
        $this->form_validation->set_error_delimiters('<div class="text-danger font-weight-bold">', '</div>');

        $this->form_validation->set_rules('agenda_number', 'Nomor Agenda', 'required|callback_minimum|numeric', [
            'required' => 'Kolom nomor agenda harus diisi',
            'minimum' => 'Nomor agenda tidak boleh lebih kecil dari <b>1</b>',
            'numeric' => 'Nomor agenda hanya berupa angka'
        ]);
        $this->form_validation->set_rules('classification_id', 'Kode klasifikasi', 'required|numeric', [
            'required' => 'Kolom kode klasifikasi harus diisi',
            'numeric' => 'Input tidak valid!'
        ]);
        $this->form_validation->set_rules('desc', 'Keterangan surat', 'max_length[255]', ['max_length' => 'Keterangan maksimal 255 karakter']);
        $this->form_validation->set_rules('subject', 'Subjek surat', 'required|min_length[6]|max_length[255]', [
            'required' => 'Kolom subjek surat harus diisi',
            'min_length' => 'Subjek surat minimal 6 karakter',
            'max_length' => 'Subjek surat maksimal 255 karakter'
        ]);
        $this->form_validation->set_rules('to', 'Tujuan surat', 'required|min_length[6]|max_length[255]', [
            'required' => 'Kolom subjek surat harus diisi',
            'min_length' => 'Tujuan surat minimal 6 karakter',
            'max_length' => 'Tujuan surat maksimal 255 karakter'
        ]);
        $this->form_validation->set_rules('number', 'Nomor surat', 'required|min_length[6]|max_length[255]', [
            'required' => 'Kolom subjek surat harus diisi',
            'min_length' => 'Nomor surat minimal 6 karakter',
            'max_length' => 'Nomor surat maksimal 255 karakter'
        ]);
        $this->form_validation->set_rules('mail_date', 'Tanggal surat', 'required', [
            'required' => 'Kolom Tanggal surat harus diisi',
            
        ]);
        $this->form_validation->set_rules('out_date', 'Tanggal keluar', 'required', [
            'required' => 'Kolom Tanggal keluar harus diisi',
            
        ]);
        $this->form_validation->set_rules('resume', 'Isi ringkas', 'max_length[512]', ['max_length' => 'Kolom ringkasan isi maksimal 512 karakter']);

        if ($this->form_validation->run() === FALSE)
        {
            $this->add();
        }
        else
        {
            $data = new stdClass();

            $data->agenda_number = $this->input->post('agenda_number');
            $data->classification_code = $this->input->post('classification_id');
            $data->note = $this->input->post('desc');
            $data->subject = $this->input->post('subject');
            $data->to = $this->input->post('to');
            $data->number = $this->input->post('number');
            $data->date = $this->input->post('mail_date');
            $data->out_date = $this->input->post('out_date');
            $data->resume = $this->input->post('resume');

            if (isset($_FILES) && @$_FILES['file']['error'] == '0') {
                $config['upload_path'] = './assets/uploads/userfiles/';
                $config['allowed_types'] = get_settings('allowed_types');
                $config['max_size'] = get_settings('max_mail_file_size');
                
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('file'))
                {
                    $file_data = $this->upload->data();
                    $file = new stdClass();

                    $file->name = $file_data['raw_name'];
                    $file->collection_name = 'outbox_file';
                    $file->file_name = $file_data['file_name'];
                    $file->mime_type = $file_data['file_type'];
                    $file->size = $file_data['file_size'];
                    
                    $file_id = $this->outbox->add_file($file);
                    $data->file_id = $file_id;                }
                else
                {
                    $errors = $this->upload->display_errors();
                    $errors .= '<p>';
                    $errors .= anchor('outbox/add', '&laquo; Kembali');
                    $errors .= '</p>';

                    show_error($errors);
                }
            }

            $add = $this->outbox->add_outbox($data);
            $flash_message = ($add) ? 'Data berhasil ditambahkan' : 'Terjadi kesalahan saat menambahkan data. Silahkan ulangi kembali';
            
            $this->session->set_flashdata('add_flash', $flash_message);

            redirect('outbox/add');
        }
    }

    public function minimum($str)
    {
        return ($str < 1) ? FALSE : TRUE;
    }

    public function edit($id = 0)
    {
        $data = $this->outbox->data($id);

        $params['flash'] = $this->session->flashdata('edit_flash');
        $params['classifications'] = $this->classifications->get_all_classifications();
        $params['data'] = $data;

        get_header('Edit Data Surat '. $data->number, 'outbox', 'add_outbox');
        get_template_part('outbox/edit', $params);
        get_footer(['current_section' => 'edit_outbox']);
    }

    public function edit_outbox()
    {
        $this->form_validation->set_error_delimiters('<div class="text-danger font-weight-bold">', '</div>');

        $this->form_validation->set_rules('agenda_number', 'Nomor Agenda', 'required|callback_minimum|numeric', [
            'required' => 'Kolom nomor agenda harus diisi',
            'minimum' => 'Nomor agenda tidak boleh lebih kecil dari <b>1</b>',
            'numeric' => 'Nomor agenda hanya berupa angka'
        ]);
        $this->form_validation->set_rules('classification_id', 'Kode klasifikasi', 'required|numeric', [
            'required' => 'Kolom kode klasifikasi harus diisi',
            'numeric' => 'Input tidak valid!'
        ]);
        $this->form_validation->set_rules('desc', 'Keterangan surat', 'max_length[255]', ['max_length' => 'Keterangan maksimal 255 karakter']);
        $this->form_validation->set_rules('subject', 'Subjek surat', 'required|min_length[6]|max_length[255]', [
            'required' => 'Kolom subjek surat harus diisi',
            'min_length' => 'Subjek surat minimal 6 karakter',
            'max_length' => 'Subjek surat maksimal 255 karakter'
        ]);
        $this->form_validation->set_rules('to', 'Tujuan surat', 'required|min_length[6]|max_length[255]', [
            'required' => 'Kolom subjek surat harus diisi',
            'min_length' => 'Tujuan surat minimal 6 karakter',
            'max_length' => 'Tujuan surat maksimal 255 karakter'
        ]);
        $this->form_validation->set_rules('number', 'Nomor surat', 'required|min_length[6]|max_length[255]', [
            'required' => 'Kolom subjek surat harus diisi',
            'min_length' => 'Nomor surat minimal 6 karakter',
            'max_length' => 'Nomor surat maksimal 255 karakter'
        ]);
        $this->form_validation->set_rules('mail_date', 'Tanggal surat', 'required', [
            'required' => 'Kolom Tanggal surat harus diisi',
            
        ]);
        $this->form_validation->set_rules('out_date', 'Tanggal keluar', 'required', [
            'required' => 'Kolom Tanggal keluar harus diisi',
            
        ]);
        $this->form_validation->set_rules('resume', 'Isi ringkas', 'max_length[512]', ['max_length' => 'Kolom ringkasan isi maksimal 512 karakter']);

        if ($this->form_validation->run() === FALSE)
        {
            $id = $this->input->post('id');

            $this->edit($id);
        }
        else
        {
            $data = new stdClass();
            $id = $this->input->post('id');
            $mail_data = $this->outbox->data($id);
            $current_file_id = $mail_data->file_id;

            $data->agenda_number = $this->input->post('agenda_number');
            $data->classification_code = $this->input->post('classification_id');
            $data->note = $this->input->post('desc');
            $data->subject = $this->input->post('subject');
            $data->to = $this->input->post('to');
            $data->number = $this->input->post('number');
            $data->date = $this->input->post('mail_date');
            $data->out_date = $this->input->post('out_date');
            $data->resume = $this->input->post('resume');

            if (isset($_FILES) && @$_FILES['file']['error'] == '0') {
                $config['upload_path'] = './assets/uploads/userfiles/';
                $config['allowed_types'] = get_settings('allowed_types');
                $config['max_size'] = get_settings('max_mail_file_size');
                
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('file'))
                {
                    $file_data = $this->upload->data();
                    $file = new stdClass();

                    $file->name = $file_data['raw_name'];
                    $file->collection_name = 'outbox_file';
                    $file->file_name = $file_data['file_name'];
                    $file->mime_type = $file_data['file_type'];
                    $file->size = $file_data['file_size'];
                    
                    $this->outbox->delete_mail_file($current_file_id);
                    $file_id = $this->outbox->add_file($file);
                    $data->file_id = $file_id;                }
                else
                {
                    $errors = $this->upload->display_errors();
                    $errors .= '<p>';
                    $errors .= anchor('outbox/add', '&laquo; Kembali');
                    $errors .= '</p>';

                    show_error($errors);
                }
            }

            $add = $this->outbox->edit_outbox($id, $data);
            $flash_message = ($add) ? 'Data berhasil perbarui' : 'Terjadi kesalahan saat memperbarui data. Silahkan ulangi kembali';
            
            $this->session->set_flashdata('edit_flash', $flash_message);

            redirect('outbox/edit/'. $id);
        }
    }

    public function delete_file()
    {
        $id = $this->input->post('id');
        $data = $this->outbox->data($id);
        $file_id = $data->file_id;

        $del = $this->outbox->delete_mail_file($file_id);

        if ($del)
        {
            $res = [
                'success' => TRUE,
                'message' => 'Berkas berhasil dihapus'
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
}