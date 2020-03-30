<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Inbox extends CI_Controller {
    public function __construct()
    {
        parent::__construct();

        verify_session();
        $this->load->library(['form_validation']);
        $this->load->model([
            'inbox_model' => 'inbox',
            'classifications_model' => 'classifications'
        ]);
    }

    public function index()
    {
        $config['base_url'] = site_url('inbox/index');
        $config['total_rows'] = $this->inbox->total_inbox();
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

        $params['inbox'] = $this->inbox->show_inbox($config['per_page'], $offset);
        $params['pagination'] = $pagination;
        
        get_header('Surat Masuk', 'inbox', 'inbox');
        get_template_part('inbox/inbox', $params);
        get_footer(['current_section' => 'inbox']);
    }

    public function add()
    {
        $params['flash'] = $this->session->flashdata('add_flash');
        $params['classifications'] = $this->classifications->get_all_classifications();
        $params['last_agenda'] = $this->inbox->get_last_agenda_number();

        get_header('Catat Surat Keluar Baru', 'inbox', 'add_inbox');
        get_template_part('inbox/add', $params);
        get_footer(['current_section' => 'add_inbox']);
    }

    public function add_inbox()
    {
        $this->form_validation->set_error_delimiters('<div class="text-danger font-weight-bold">', '</div>');

        $this->form_validation->set_rules('agenda_number', 'Nomor Agenda', 'required|callback_minimum|numeric', [
            'required' => 'Kolom nomor agenda harus diisi',
            'minimum' => 'Nomor agenda tidak boleh lebih kecil dari <b>1</b>',
            'numeric' => 'Nomor agenda hanya berupa angka'
        ]);
        $this->form_validation->set_rules('file_index', 'Index file', 'numeric|callback_minimum', [
            'numeric' => 'Indeks file hanya berupa angka',
            'minimum' => 'Indeks file tidak boleh lebih kecil dari <b>1</b>'
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
        $this->form_validation->set_rules('src', 'Asal surat', 'required|min_length[6]|max_length[255]', [
            'required' => 'Kolom subjek surat harus diisi',
            'min_length' => 'Asal surat minimal 6 karakter',
            'max_length' => 'Asal surat maksimal 255 karakter'
        ]);
        $this->form_validation->set_rules('number', 'Nomor surat', 'required|min_length[6]|max_length[255]', [
            'required' => 'Kolom subjek surat harus diisi',
            'min_length' => 'Nomor surat minimal 6 karakter',
            'max_length' => 'Nomor surat maksimal 255 karakter'
        ]);
        $this->form_validation->set_rules('mail_date', 'Tanggal surat', 'required', [
            'required' => 'Kolom sTanggal surat harus diisi',
            
        ]);
        $this->form_validation->set_rules('accepted_date', 'Tanggal diterima', 'required', [
            'required' => 'Kolom Tanggal diterima harus diisi',
            
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
            $data->file_index = $this->input->post('file_index');
            $data->classification_code = $this->input->post('classification_id');
            $data->description = $this->input->post('desc');
            $data->subject = $this->input->post('subject');
            $data->from = $this->input->post('src');
            $data->number = $this->input->post('number');
            $data->date = $this->input->post('mail_date');
            $data->accepted_date = $this->input->post('accepted_date');
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
                    $file->collection_name = 'inbox_file';
                    $file->file_name = $file_data['file_name'];
                    $file->mime_type = $file_data['file_type'];
                    $file->size = $file_data['file_size'];
                    
                    $file_id = $this->inbox->add_file($file);
                    $data->file_id = $file_id;
                }
                else
                {
                    $errors = $this->upload->display_errors();
                    $errors .= '<p>';
                    $errors .= anchor('inbox/add', '&laquo; Kembali');
                    $errors .= '</p>';

                    show_error($errors);
                }
            }

            $add = $this->inbox->add_inbox($data);
            $flash_message = ($add) ? 'Data berhasil ditambahkan' : 'Terjadi kesalahan saat menambahkan data. Silahkan ulangi kembali';
            
            $this->session->set_flashdata('add_flash', $flash_message);

            redirect('inbox/add');
        }
    }

    public function minimum($str)
    {
        return ($str < 1) ? FALSE : TRUE;
    }

    public function edit($id = 0)
    {
        $data = $this->inbox->data($id);

        $params['flash'] = $this->session->flashdata('edit_flash');
        $params['classifications'] = $this->classifications->get_all_classifications();
        $params['data'] = $data;

        get_header('Edit Data Surat '. $data->number, 'inbox', 'add_inbox');
        get_template_part('inbox/edit', $params);
        get_footer(['current_section' => 'edit_inbox']);
    }

    public function edit_inbox()
    {
        $this->form_validation->set_error_delimiters('<div class="text-danger font-weight-bold">', '</div>');

        $this->form_validation->set_rules('agenda_number', 'Nomor Agenda', 'required|callback_minimum|numeric', [
            'required' => 'Kolom nomor agenda harus diisi',
            'minimum' => 'Nomor agenda tidak boleh lebih kecil dari <b>1</b>',
            'numeric' => 'Nomor agenda hanya berupa angka'
        ]);
        $this->form_validation->set_rules('file_index', 'Index file', 'numeric|callback_minimum', [
            'numeric' => 'Indeks file hanya berupa angka',
            'minimum' => 'Indeks file tidak boleh lebih kecil dari <b>1</b>'
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
        $this->form_validation->set_rules('src', 'Asal surat', 'required|min_length[6]|max_length[255]', [
            'required' => 'Kolom subjek surat harus diisi',
            'min_length' => 'Asal surat minimal 6 karakter',
            'max_length' => 'Asal surat maksimal 255 karakter'
        ]);
        $this->form_validation->set_rules('number', 'Nomor surat', 'required|min_length[6]|max_length[255]', [
            'required' => 'Kolom sNomor surat harus diisi',
            'min_length' => 'Nomor surat minimal 6 karakter',
            'max_length' => 'Nomor surat maksimal 255 karakter'
        ]);
        $this->form_validation->set_rules('mail_date', 'Tanggal surat', 'required', [
            'required' => 'Kolom sTanggal surat harus diisi',
            
        ]);
        $this->form_validation->set_rules('accepted_date', 'Tanggal diterima', 'required', [
            'required' => 'Kolom Tanggal diterima harus diisi',
            
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
            $mail_data = $this->inbox->data($id);
            $current_file_id = $mail_data->file_id;

            $data->agenda_number = $this->input->post('agenda_number');
            $data->file_index = $this->input->post('file_index');
            $data->classification_code = $this->input->post('classification_id');
            $data->description = $this->input->post('desc');
            $data->subject = $this->input->post('subject');
            $data->from = $this->input->post('src');
            $data->number = $this->input->post('number');
            $data->date = $this->input->post('mail_date');
            $data->accepted_date = $this->input->post('accepted_date');
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
                    $file->collection_name = 'inbox_file';
                    $file->file_name = $file_data['file_name'];
                    $file->mime_type = $file_data['file_type'];
                    $file->size = $file_data['file_size'];
                    
                    $this->inbox->delete_mail_file($current_file_id);
                    $file_id = $this->inbox->add_file($file);
                    $data->file_id = $file_id;                }
                else
                {
                    $errors = $this->upload->display_errors();
                    $errors .= '<p>';
                    $errors .= anchor('inbox/add', '&laquo; Kembali');
                    $errors .= '</p>';

                    show_error($errors);
                }
            }

            $add = $this->inbox->edit_inbox($id, $data);
            $flash_message = ($add) ? 'Data berhasil perbarui' : 'Terjadi kesalahan saat memperbarui data. Silahkan ulangi kembali';
            
            $this->session->set_flashdata('edit_flash', $flash_message);

            redirect('inbox/edit/'. $id);
        }
    }

    public function view($id = 0)
    {
        $data = $this->inbox->data($id);
        $disps = $this->inbox->dispositions_list();

        $params['data'] = $data;
        $params['disps'] = $disps;

        get_header('Surat '. $data->number .' '. $data->subject, 'inbox', 'view_inbox');
        get_template_part('inbox/view', $params);
        get_footer(['current_section' => 'view_inbox']);
    }

    public function print()
    {
        $id = $this->input->post('id');

        $data = $this->inbox->data($id);
        $disps = $this->inbox->dispositions_list();

        $params['mail'] = $data;
        $params['disps'] = $disps;

        get_header('Surat '. $data->number .' '. $data->subject, 'inbox', 'print');
        get_template_part('inbox/print', $params);
        get_footer(['current_section' => 'print']);
    }

    public function delete_file()
    {
        $id = $this->input->post('id');
        $data = $this->inbox->data($id);
        $file_id = $data->file_id;

        $del = $this->inbox->delete_mail_file($file_id);

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

    public function delete()
    {
        $id = $this->input->post('id');
        $data = $this->inbox->data($id);
        $is_have_file = ($data->file_id == NULL) ? FALSE : TRUE;

        $delete = $this->inbox->delete($id);
        $delete_file = ($is_have_file) ? $this->inbox->delete_mail_file($data->file_id) : FALSE;

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

    public function search()
    {
        $query = html_escape($this->input->get('query'));

        $config['base_url'] = site_url('inbox/search');
        $config['total_rows'] = $this->inbox->search_total_inbox($query);
        $config['per_page'] = 10;
        $config['uri_segment'] = 3;
        $config['num_links'] = 2;
        $config['reuse_query_string'] = TRUE;

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

        $params['inbox'] = $this->inbox->search_show_inbox($query, $config['per_page'], $offset);
        $params['pagination'] = $pagination;
        $params['query'] = $query;
         
        get_header('Cari "'. $query .'"', NULL, 'inbox');
        get_template_part('inbox/search', $params);
        get_footer(['current_section' => 'inbox']);
    }

    public function overview()
    {
        $config['base_url'] = site_url('inbox/overview');
        $config['total_rows'] = $this->inbox->total_inbox();
        $config['per_page'] = 50;
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

        $params['inbox'] = $this->inbox->show_inbox($config['per_page'], $offset);
        $params['pagination'] = $pagination;
        
        get_header('Ringkasan Surat Masuk', 'inbox', 'inbox');
        get_template_part('inbox/overview', $params);
        get_footer(['current_section' => 'inbox']);
    }

    public function download_excel() {
        $mails = $this->inbox->all_inbox();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $styleArray = array(
            'borders' => array(
                'outline' => array(
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                    'color' => array('argb' => '00000000'),
                ),
            ),
            'font'  => array(
            'bold'  => true,
            'color' => array('rgb' => '000000'),
            'size'  => 12,
            'name'  => 'Times New Roman'
        ));

        $sheet->getStyle('A3:E3')->applyFromArray($styleArray);
        $sheet->getStyle('A3:E3')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('ffff00');

        for ($i = 'A'; $i <= 'E'; $i++) {
            $sheet->getColumnDimension($i)->setAutoSize(TRUE);
        }

        $sheet->setCellValue('B1', 'Laporan Surat Masuk');
        $styleArray2 = array(
            'font'  => array(
                'bold' => TRUE,
                'color' => array('rgb' => '000000'),
                'size'  => 12,
                'name'  => 'Times New Roman'
        ));

        $sheet->getStyle('B1')->applyFromArray($styleArray2);

        $sheet->setCellValue('A3', 'No.');
        $sheet->setCellValue('B3', 'No. Surat');
        $sheet->setCellValue('C3', 'Perihal');
        $sheet->setCellValue('D3', 'Tanggal Surat');
        $sheet->setCellValue('E3', 'Asal Surat');

        $i = 1;
        foreach ($mails as $d)
        {
            $n = $i + 3;
            $sheet->setCellValue('A'. $n, $i);
            $sheet->setCellValue('B'. $n, $d->number);
            $sheet->setCellValue('C'. $n, $d->subject);
            $sheet->setCellValue('D'. $n, get_formatted_date($d->date));
            $sheet->setCellValue('E'. $n, $d->from);

            $i++;
        }

        $styleArray = array(
            'font'  => array(
                'color' => array('rgb' => '000000'),
                'size'  => 12,
                'name'  => 'Times New Roman'
            )
        );

        $last = $i+2;
        $sheet->getStyle('A3:E'. $last)->applyFromArray($styleArray);


        $filename =  'Surat Masuk - '. time();

        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment; filename="'. $filename .'.xlsx"'); 
        header('Cache-Control: max-age=0');
        
        $writer->save('php://output');
    }
}