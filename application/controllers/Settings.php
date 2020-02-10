<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller {
    public function __construct()
    {
        parent::__construct();

        verify_session();
        $this->load->library('form_validation');
        $this->load->model('settings_model', 'settings');
    }

    public function index()
    {
        $params['max_size'] = ini_get_all()['upload_max_filesize']['global_value'];
        $params['max_size_kb'] = $this->_max_kb($params['max_size']);
        $params['flash'] = $this->session->flashdata('settings');
        
        get_header('Pengaturan', 'settings');
        get_template_part('settings', $params);
        get_footer(['current_section' => 'settings']);
    }

    public function edit_sites()
    {
        $this->form_validation->set_rules('name', 'Nama situs', 'required');

        if ($this->form_validation->run() === FALSE)
        {
            $this->index();
        }
        else
        {
            $data['key'] = 'site_name';
            $data['content'] = $this->input->post('name');
            $flash_message = ($this->settings->update($data)) ? 'Pengaturan berhasil diperbarui!' : 'Terjadi kesalahan';

            $old_logo = get_settings('site_logo');

            if (isset($_FILES) && @$_FILES['file']['error'] == '0') {
                $config['upload_path'] = './assets/uploads/static/';
                $config['allowed_types'] = 'jpg|png';
                $config['max_size'] = 1024;
                
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('file'))
                {
                    if ($old_logo)
                    {
                        unlink('./assets/uploads/static/'. $old_logo);
                    }

                    $file_data = $this->upload->data();
                    $data['key'] = 'site_logo';
                    $data['content'] = $file_data['file_name'];

                    $this->settings->update($data);
                }
                else
                {
                    $errors = $this->upload->display_errors();
                    $errors .= '<p>';
                    $errors .= anchor('profile', '&laquo; Kembali');
                    $errors .= '</p>';

                    show_error($errors);
                }
            }
            
            $this->session->set_flashdata('settings', $flash_message);
            redirect('settings');
        }
    }

    public function edit_upload()
    {
        $settings = $this->input->post('settings');

        if ( count($settings) > 0)
        {
            foreach ($settings as $key => $val)
            {
                $data['key'] = $key;
                $data['content'] = $val;

                $this->settings->update($data);
            }

            $this->session->set_flashdata('settings', 'Pengaturan berhasil diperbarui!');
            redirect('settings');
        }
        else
        {
            $this->session->set_flashdata('settings', 'Akses tidak sah!');
            redirect('settings');
        }
    }

    public function edit_mail()
    {
        $settings = $this->input->post('settings');

        if (isset($_FILES) && @$_FILES['logo_1']['error'] == '0') {
            $config['upload_path'] = './assets/uploads/static/';
            $config['allowed_types'] = 'jpg|png';
            $config['max_size'] = 1024;
                
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('logo_1'))
            {
                $file_data = $this->upload->data();
                $file = new stdClass();

                $file->name = $file_data['raw_name'];
                $file->collection_name = 'logo_kop_surat_1';
                $file->file_name = $file_data['file_name'];
                $file->mime_type = $file_data['file_type'];
                $file->size = $file_data['file_size'];
                    
                $file_id = $this->settings->add_file($file);

                $data['key'] = 'kop_logo_1';
                $data['content'] = $file_data['file_name'];

                $this->settings->update($data);
            }
            else
            {
                $errors = $this->upload->display_errors();
                $errors .= '<p>';
                $errors .= anchor('settings', '&laquo; Kembali');
                $errors .= '</p>';

                show_error($errors);
            }
        }

        if (isset($_FILES) && @$_FILES['logo_2']['error'] == '0') {
            $config['upload_path'] = './assets/uploads/static/';
            $config['allowed_types'] = 'jpg|png';
            $config['max_size'] = 1024;
                
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('logo_2'))
            {
                $file_data = $this->upload->data();
                $file = new stdClass();

                $file->name = $file_data['raw_name'];
                $file->collection_name = 'logo_kop_surat_2';
                $file->file_name = $file_data['file_name'];
                $file->mime_type = $file_data['file_type'];
                $file->size = $file_data['file_size'];
                    
                $file_id = $this->settings->add_file($file);

                $data['key'] = 'kop_logo_2';
                $data['content'] = $file_data['file_name'];

                $this->settings->update($data);
            }
            else
            {
                $errors = $this->upload->display_errors();
                $errors .= '<p>';
                $errors .= anchor('settings', '&laquo; Kembali');
                $errors .= '</p>';

                show_error($errors);
            }
        }

        if ( count($settings) > 0)
        {
            foreach ($settings as $key => $val)
            {
                $data['key'] = $key;
                $data['content'] = $val;

                $this->settings->update($data);
            }

            $this->session->set_flashdata('settings', 'Pengaturan berhasil diperbarui!');
            redirect('settings');
        }
        else
        {
            $this->session->set_flashdata('settings', 'Akses tidak sah!');
            redirect('settings');
        }
    }

    protected function _max_kb($mb)
    {
        $mb = substr($mb, 0, -1);
        $kb = $mb * 1024;

        return $kb;
    }
}