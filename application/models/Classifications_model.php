<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Classifications_model extends CI_Model {
    protected $active_id;

    public function __construct()
    {
        parent::__construct();
    }

    public function get_all_classifications()
    {
        $classifications = $this->db
            ->order_by('code', 'ASC')
            ->get('classifications')
            ->result();

        return $classifications;
    }

    public function get_classifications($limit, $offset)
    {
        $classifications = $this->db
            ->order_by('code', 'ASC')
            ->limit($limit, $offset)
            ->get('classifications')
            ->result();

        return $classifications;
    }

    public function total_classifications()
    {
        return $this->db
            ->get('classifications')
            ->num_rows();
    }

    public function add($data)
    {
        return $this->db
            ->insert('classifications', $data);
    }

    public function edit($id, $data)
    {
        return $this->db
            ->where('id', $id)
            ->update('classifications', $data);
    }

    public function delete()
    {
        $id = $this->active_id;

        return $this->db
            ->where('id', $id)
            ->delete('classifications');
    }

    public function find($id)
    {
        $this->active_id = $id;

        $data = $this->db
            ->where('id', $id)
            ->get('classifications');

        if ($data->num_rows() > 0)
        {
            return $data->row();
        }
        else
        {
            show_404();
        }
    }

    public function search_total_classifications($query)
    {
        return $this->db
            ->like('code', $query)
            ->or_like('description', $query)
            ->get('classifications')
            ->num_rows();
    }

    public function get_search_classifications($query, $limit, $offset)
    {
        $classifications = $this->db
            ->like('code', $query)
            ->or_like('description', $query)
            ->order_by('code', 'ASC')
            ->limit($limit, $offset)
            ->get('classifications')
            ->result();

        return $classifications;
    }
}