<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile_model extends CI_Model {
    private $user_id;

    public function __construct()
    {
        parent::__construct();

        $this->user_id = get_current_user_id();
    }

    public function user_profile()
    {
        $id = $this->user_id;

        $profile = $this->db
            ->select('id, username, name, email, profile_picture')
            ->where('id', $id)
            ->get('users')
            ->row();

        return $profile;
    }

    public function update($data)
    {
        return $this->db
            ->where('id', $this->user_id)
            ->update('users', $data);
    }

    public function save_profile_picture($file)
    {
        $this->db->insert('files', $file);

        return $this->db->insert_id();
    }
}