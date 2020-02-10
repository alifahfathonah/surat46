<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inbox_model extends CI_Model {
    protected $active_id;

    public function __construct()
    {
        parent::__construct();
    }

    public function last_five_inbox()
    {
        return $this->db
            ->order_by('created_at', 'ASC')
            ->limit(5)
            ->get('incoming_mail')
            ->result();
    }

    public function get_last_agenda_number()
    {
        $get_last_incoming_mail = $this->db
            ->order_by('created_at', 'DESC')
            ->get('incoming_mail', 1);

        if ($get_last_incoming_mail->num_rows() > 0)
        {
            $last_agenda = ($get_last_incoming_mail->row()
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

    public function add_inbox($data = [])
    {
        return $this->db->insert('incoming_mail', $data);
    }

    public function edit_inbox($id, $data)
    {
        return $this->db->where('id', $id)
            ->update('incoming_mail', $data);
    }

    public function add_file($data)
    {
        $add_file = $this->db
            ->insert('files', $data);

        return $this->db
            ->insert_id();
    }

    public function total_inbox()
    {
        return $this->db
            ->get('incoming_mail')
            ->num_rows();
    }

    public function show_inbox($limit, $offset)
    {
        $inbox = $this->db
            ->select('c.code, c.name, incoming_mail.*, f.file_name')
            ->order_by('accepted_date', 'ASC')
            ->join('classifications c', 'c.id = incoming_mail.classification_code')
            ->join('files f', 'f.id = incoming_mail.file_id', 'left')
            ->limit($limit, $offset)
            ->get('incoming_mail')
            ->result();

        return $inbox;
    }

    public function show_all_inbox()
    {
        $inbox = $this->db
            ->select('c.code, c.name, incoming_mail.*, f.file_name')
            ->order_by('accepted_date', 'ASC')
            ->join('classifications c', 'c.id = incoming_mail.classification_code')
            ->join('files f', 'f.id = incoming_mail.file_id', 'left')
            ->get('incoming_mail')
            ->result();

        return $inbox;
    }

    public function data($id)
    {
        $this->active_id = $id;

        $data = $this->db
            ->select('c.code, c.name, i.*, f.file_name')
            ->from('incoming_mail i')
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

    public function dispositions_list()
    {
        $id = $this->active_id;

        $data = $this->db
            ->select('dm.*, d.date_limit, d.to, d.content, m.meta_content as sifat')
            ->from('dispositions_mail dm')
            ->join('dispositions d', 'd.id = dm.disposition_id')
            ->join('site_meta m', 'm.id = d.characteristic', 'left')
            ->where('dm.mail_id', $id)
            ->get();

        if ($data->num_rows() > 0)
        {
            return $data->result();
        }
        else
        {
            return FALSE;
        }
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
            ->delete('incoming_mail');

        return $delete;
    }

    public function search_total_inbox($query)
    {
        return $this->db
            ->like('subject', $query)
            ->or_like('resume', $query)
            ->or_like('number', $query)
            ->get('incoming_mail')
            ->num_rows();
    }

    public function search_show_inbox($query, $limit, $offset)
    {
        $inbox = $this->db
            ->select('c.code, c.name, incoming_mail.*, f.file_name')
            ->order_by('accepted_date', 'ASC')
            ->join('classifications c', 'c.id = incoming_mail.classification_code')
            ->join('files f', 'f.id = incoming_mail.file_id', 'left')
            ->like('subject', $query)
            ->or_like('resume', $query)
            ->or_like('number', $query)
            ->limit($limit, $offset)
            ->get('incoming_mail')
            ->result();

        return $inbox;
    }

}