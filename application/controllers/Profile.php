<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
    public function __construct()
    {
        parent::__construct();

        verify_session();

        $this->load->model(['profile_model' => 'profile']);
        $this->load->library('form_validation');
    }

    public function index()
    {
        $id = get_current_user_id();
        $profile = $this->profile->user_profile();
        $profile->flash = $this->session->flashdata('profile');
        $show_tab = $this->session->flashdata('show_tab');

        get_header($profile->name);
        get_template_part('profile', $profile);
        get_footer(['current_section' => 'profile', 'flash' => $profile->flash, 'tab' => $show_tab]);
    }

    public function edit_name()
    {
        $this->form_validation->set_rules('name', 'Nama lengkap', 'required|max_length[32]|min_length[4]');

        if ($this->form_validation->run() === FALSE)
        {
            $this->index();
        }
        else
        {
            $data = new stdClass();

            $data->name = $this->input->post('name');
            $profile = $this->profile->user_profile();
            $old_profile = $profile->profile_picture;

            if (isset($_FILES) && @$_FILES['file']['error'] == '0') {
                $config['upload_path'] = './assets/uploads/static/';
                $config['allowed_types'] = 'jpg|png';
                $config['max_size'] = 2048;
                
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('file'))
                {
                    if ($old_profile)
                    {
                        unlink('./assets/uploads/static/'. $old_profile);
                    }

                    $file_data = $this->upload->data();
                    $data->profile_picture = $file_data['file_name'];
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

            $flash_message = ($this->profile->update($data)) ? 'Profil berhasil diperbarui!' : 'Terjadi kesalahan';
            
            $this->session->set_flashdata('profile', $flash_message);
            redirect('profile');
        }
    }

    public function edit_account()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|max_length[16]|min_length[4]');
        $this->form_validation->set_rules('password', 'Password', 'min_length[4]');

        if ($this->form_validation->run() === FALSE)
        {
            $this->index();
        }
        else
        {
            $data = new stdClass();

            $data->username = $this->input->post('username');
            $data->password = password_hash($this->input->post('password'), PASSWORD_BCRYPT);

            $flash_message = ($this->profile->update($data)) ? 'Akun berhasil diperbarui' : 'Terjadi kesalahan';
            
            $this->session->set_flashdata('profile', $flash_message);
            $this->session->set_flashdata('show_tab', 'akun');

            redirect('profile');
        }
    }

    public function edit_email()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|max_length[32]|min_length[10]');

        if ($this->form_validation->run() === FALSE)
        {
            $this->index();
        }
        else
        {
            $data = new stdClass();

            $data->email = $this->input->post('email');
            $flash_message = ($this->profile->update($data)) ? 'Email berhasil diperbarui' : 'Terjadi kesalahan';
            
            $this->session->set_flashdata('profile', $flash_message);
            $this->session->set_flashdata('show_tab', 'email');

            redirect('profile');
        }
    }

}