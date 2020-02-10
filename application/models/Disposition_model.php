<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Disposition_model extends CI_Model {
    protected $characteristic_id;

    public function __construct()
    {
        parent::__construct();
    }

    public function total_dispositions()
    {
        return $this->db
            ->get('dispositions')
            ->num_rows();
    }

    public function list_all_dispositions()
    {
        $data = $this->db
            ->select('m.meta_content as characteristic, d.id, d.content, d.to, d.date_limit, dm.mail_id, i.number as mail_number, i.subject as mail_subject')
            ->from('dispositions d')
            ->join('site_meta m', 'm.id = d.characteristic', 'left')
            ->join('dispositions_mail dm', 'dm.disposition_id = d.id', 'left')
            ->join('incoming_mail i', 'i.id = dm.mail_id', 'left')
            ->order_by('d.created_at', 'ASC')
            ->get()
            ->result();

        return $data;
    }

    public function add_disposition($data)
    {
        $this->db
            ->insert('dispositions', $data);

        return $this->db
            ->insert_id();
    }

    public function edit_disposition($id, $data)
    {
        return $this->db
            ->where('id', $id)
            ->update('dispositions', $data);
    }

    public function add_disposition_mails($mail_id, $dispostion_id)
    {
        $data = [
            'disposition_id' => $dispostion_id,
            'mail_id' => $mail_id
        ];

        return $this->db
            ->insert('dispositions_mail', $data);
    }

    public function disposition_data($id)
    {
        //Single disposition data
        $data = $this->db
            ->select('m.meta_content as characteristic, d.id, d.content, d.to, d.note, d.date_limit, dm.mail_id, i.resume as mail_resume, i.number as mail_number, i.subject as mail_subject')
            ->from('dispositions d')
            ->join('site_meta m', 'm.id = d.characteristic')
            ->join('dispositions_mail dm', 'dm.disposition_id = d.id')
            ->join('incoming_mail i', 'i.id = dm.mail_id')
            ->where('d.id', $id)
            ->order_by('d.created_at', 'ASC')
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

    public function delete_disposition($id)
    {
        return $this->db
            ->where('id', $id)
            ->delete('dispositions');
    }

    //Start:: Single mail disposition

    public function get_mail_dispositions($mail_id)
    {
        $data = $this->db
            ->select('dm.disposition_id as id, i.number, i.subject, d.to, d.content, d.date_limit, m.meta_content as sifat')
            ->from('dispositions_mail dm')
            ->where('dm.mail_id', $mail_id)
            ->join('incoming_mail i', 'i.id = dm.mail_id', 'left')
            ->join('dispositions d', 'd.id = dm.disposition_id')
            ->join('site_meta m', 'm.id = d.characteristic')
            ->get()
            ->result();

        return $data;
    }

    //End

    public function list_all_characteristics()
    {
        $characteristics = $this->db
            ->where('meta_group', 'disposition_characteristic')
            ->order_by('meta_content', 'ASC')
            ->get('site_meta')
            ->result();

        return $characteristics;
    }

    public function add_characteristic($name)
    {
        $data = [
            'meta_group' => 'disposition_characteristic',
            'meta_content' => $name
        ];

        return $this->db
            ->insert('site_meta', $data);
    }

    public function characteristic_data($id)
    {
        $this->characteristic_id = $id;
        $data = $this->db
            ->where('id', $id)
            ->get('site_meta');

        if ($data->num_rows() > 0)
        {
            return $data->row();
        }
        else
        {
            show_404();
        }
    }

    public function edit_characteristic($name)
    {
        $data = [ 'meta_content' => $name ];

        return $this->db
            ->where('id', $this->characteristic_id)
            ->update('site_meta', $data);
    }

    public function delete_characteristic()
    {
        return $this->db
            ->where('id', $this->characteristic_id)
            ->delete('site_meta');
    }
}