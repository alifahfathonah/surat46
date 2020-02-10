<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Classifications extends CI_Controller {
    public function __construct()
    {
        parent::__construct();

        verify_session();
        $this->load->model('classifications_model', 'classification');
        $this->load->library(['pagination', 'form_validation']);
    }

    public function index()
    {
        $config['base_url'] = site_url('classifications/index');
        $config['total_rows'] = $this->classification->total_classifications();
        $config['per_page'] = 10;
        $config['uri_segment'] = 3;
        $config['num_links'] = 2;

        $config['first_link'] = '&laquo;';
        $config['prev_link'] = '&lsaquo;';
        $config['next_link'] = '&rsaquo;';
        $config['last_link'] = '&raquo;';
        $config['full_tag_open'] = '<nav class="text-center"><ul class="pagination">';
        $config['full_tag_close'] = '</ul></nav>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link">';
        $config['cur_tag_close'] = '</a></li>';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';
        $config['attributes'] = array('class' => 'page-link');

        $offset = $this->uri->segment(3);
        $offset = ($offset == 0 || empty($offset)) ? 0 : $offset;

        $this->pagination->initialize($config);
        $pagination = $this->pagination->create_links();

        $params['classifications'] = $this->classification->get_classifications($config['per_page'], $offset);
        $params['pagination'] = $pagination;

        get_header('Klasifikasi Surat', 'classifications', 'classifications');
        get_template_part('classifications/classification', $params);
        get_footer(['current_section' => 'classifications']);
    }

    public function add()
    {
        $params['flash'] = $this->session->flashdata('add_flash');
        $params['excel_flash'] = $this->session->flashdata('excel_flash');

        get_header('Tambah Kode Klasifikasi Baru', NULL, 'classifications');
        get_template_part('classifications/add', $params);
        get_footer();
    }

    public function add_classification()
    {
        $this->form_validation->set_rules('code', 'Kode klasifikasi', 'required', ['required' => 'Kolom kode klasifikasi harus diisi!']);
        $this->form_validation->set_rules('name', 'Nama klasifikasi', 'required|min_length[4]|max_length[255]', [
            'required' => 'Nama klasifikasi harus diisi',
            'min_length' => 'Nama klasifikasi minimal 4 karakter',
            'max_length' => 'Nama klasifikasi maksimal 255 karakter'
        ]);
        $this->form_validation->set_rules('desc', 'Uraian');

        if ($this->form_validation->run() === FALSE)
        {
            $this->add();
        }
        else
        {
            $code = $this->input->post('code');
            $name = $this->input->post('name');
            $desc = $this->input->post('desc');

            $data = new stdClass();
            $data->code = $code;
            $data->name = $name;
            $data->description = $desc;

            $add = $this->classification->add($data);
            $flash_message = ($add) ? 'Klasifikasi baru berhasil ditambahkan' : 'Terjadi kesalahan saat menambahkan data. Silahkan ulangi kembali';

            $this->session->set_flashdata('add_flash', $flash_message);
            redirect('classifications/add');
        }
    }

    public function edit($id = 0)
    {
        $data = $this->classification->find($id);

        $params['flash'] = $this->session->flashdata('add_flash');
        $params['data'] = $data;

        get_header('Edit Kode Klasifikasi', NULL, 'classifications');
        get_template_part('classifications/edit', $params);
        get_footer();
    }

    public function edit_classification()
    {
        $this->form_validation->set_rules('code', 'Kode klasifikasi', 'required', ['required' => 'Kolom kode klasifikasi harus diisi!']);
        $this->form_validation->set_rules('name', 'Nama klasifikasi', 'required|min_length[4]|max_length[255]', [
            'required' => 'Nama klasifikasi harus diisi',
            'min_length' => 'Nama klasifikasi minimal 4 karakter',
            'max_length' => 'Nama klasifikasi maksimal 255 karakter'
        ]);
        $this->form_validation->set_rules('desc', 'Uraian');

        if ($this->form_validation->run() === FALSE)
        {
            $this->add();
        }
        else
        {
            $id = $this->input->post('id');

            $code = $this->input->post('code');
            $name = $this->input->post('name');
            $desc = $this->input->post('desc');

            $data = new stdClass();
            $data->code = $code;
            $data->name = $name;
            $data->description = $desc;

            $add = $this->classification->edit($id, $data);
            $flash_message = ($add) ? 'Klasifikasi baru berhasil diperbarui' : 'Terjadi kesalahan saat memperbarui data. Silahkan ulangi kembali';

            $this->session->set_flashdata('add_flash', $flash_message);
            redirect('classifications/edit/'. $id);
        }
    }

    public function delete()
    {
        if ($this->input->is_ajax_request())
        {
            $id = $this->input->post('id');

            $this->classification->find($id);
            $del = $this->classification->delete();

            if ($del)
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
                    'message' => 'Terjadi kesalahan saat menghapus data. Silahkan ulangi kembali'
                ];
            }

            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($res));
        }
        else
        {
            show_error('Akses tidak diizinkan', 405);
        }
    }

    public function search()
    {
        $query = $this->input->get('query');
        $query = html_escape($query);

        $config['base_url'] = site_url('classifications/search');
        $config['total_rows'] = $this->classification->search_total_classifications($query);
        $config['per_page'] = 2;
        $config['uri_segment'] = 3;
        $config['num_links'] = 2;
        $config['reuse_query_string'] = TRUE;

        $config['first_link'] = '&laquo;';
        $config['prev_link'] = '&lsaquo;';
        $config['next_link'] = '&rsaquo;';
        $config['last_link'] = '&raquo;';
        $config['full_tag_open'] = '<nav class="text-center"><ul class="pagination">';
        $config['full_tag_close'] = '</ul></nav>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link">';
        $config['cur_tag_close'] = '</a></li>';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';
        $config['attributes'] = array('class' => 'page-link');

        $offset = $this->uri->segment(3);
        $offset = ($offset == 0 || empty($offset)) ? 0 : $offset;

        $this->pagination->initialize($config);
        $pagination = $this->pagination->create_links();

        $params['classifications'] = $this->classification->get_search_classifications($query, $config['per_page'], $offset);
        $params['query'] = $query;
        $params['search_total'] = $config['total_rows'];
        $params['pagination'] = $pagination;

        get_header('Cari "'. $query .'"', 'classifications', 'classifications');
        get_template_part('classifications/search', $params);
        get_footer(['current_section' => 'classifications']);
    }
}