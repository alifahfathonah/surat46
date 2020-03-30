<?php
defined('BASEPATH') OR exit('No direct script access alalowed');

class Outbox_model extends CI_Model {
    public function __construct()
    {
        parent::__construct();
    }

    public function get_last_agenda_number()
    {
        $get_last_out_mail = $this->db
            ->order_by('created_at', 'DESC')
            ->get('outbox', 1);

        if ($get_last_out_mail->num_rows() > 0)
        {
            $last_agenda = ($get_last_out_mail->row()
                ->agenda_number) + 1;

            if ($last_agenda < 10)
                $last_agenda = '000'. $last_agenda;
            else if ($last_agenda < 100)
                $last_agenda = '00'. $last_agenda;
            else if ($last_agenda < 1000)
                $last_agenda = '0'. $last_agenda;
        }
        else
        {
            $last_agenda = '0001';
        }

        return $last_agenda;
    }

    public function add_file($data)
    {
        $add_file = $this->db
            ->insert('files', $data);

        return $this->db
            ->insert_id();
    }

    public function add_outbox($data = [])
    {
        return $this->db->insert('outbox', $data);
    }

    public function data($id)
    {
        $this->active_id = $id;

        $data = $this->db
            ->select('c.code, c.name, i.*, f.file_name')
            ->from('outbox i')
            ->where('i.id', $id)
            ->join('classifications c', 'c.id = i.classification_code')
            ->join('files f', 'f.id = i.file_id', 'left')
            ->get();
        
        if ($data->num_rows() > 0)
        {
            return $data->row();
        }
        else
        {
            show_404();
        }
    }

    public function edit_outbox($id, $data)
    {
        return $this->db->where('id', $id)
            ->update('outbox', $data);
    }

    public function total_outbox()
    {
        return $this->db
            ->get('outbox')
            ->num_rows();
    }

    public function show_outbox($limit, $offset)
    {
        $outbox = $this->db
            ->select('c.code, c.name, o.*, f.file_name')
            ->from('outbox o')
            ->order_by('o.date', 'DESC')
            ->join('classifications c', 'c.id = o.classification_code')
            ->join('files f', 'f.id = o.file_id', 'left')
            ->limit($limit, $offset)
            ->get()
            ->result();

        return $outbox;
    }

    public function all_outbox()
    {
        $outbox = $this->db
            ->select('o.*')
            ->from('outbox o')
            ->order_by('date', 'ASC')
            ->get()
            ->result();

        return $outbox;
    }

    public function delete_mail_file($file_id)
    {
        $this->load->helper('file');

        $file_name = $this->db
            ->where('id', $file_id)
            ->get('files')
            ->row()
            ->file_name;

        $delete_db = $this->db->where('id', $file_id)
            ->delete('files');

        $delete_file = unlink('./assets/uploads/userfiles/'. $file_name);

        return ($delete_db && $delete_file) ? TRUE : FALSE;
    }

    public function delete($mail_id)
    {
        $delete = $this->db->where('id', $mail_id)
            ->delete('outbox');

        return $delete;
    }

    public function last_five_outbox()
    {
        return $this->db
            ->order_by('created_at', 'ASC')
            ->limit(5)
            ->get('outbox')
            ->result();
    }
}