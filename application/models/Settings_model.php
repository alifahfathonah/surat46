<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings_model extends CI_Model {
    public function __construct()
    {
        parent::__construct();
    }

    public function update($data)
    {
        return $this->db
            ->where('key', $data['key'])
            ->update('settings', $data);
    }

    public function add_file($data)
    {
        $add_file = $this->db
            ->insert('files', $data);

        return $this->db
            ->insert_id();
    }
}