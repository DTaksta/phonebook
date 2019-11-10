<?php

class Phonebook_model extends CI_Model
{
	public function create($data)
	{
		$this->db->insert('contact', $data);
		return $this->db->insert_id();
	}

    public function update($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('contact', $data);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('contact');

        return (bool) $this->db->affected_rows();
    }

    public function get($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('contact');

        if ($query->num_rows() > 0) {
            return $query;
        }

        return false;
    }

	public function getPhonebooks($limit, $start)
	{
        $this->db->limit($limit, $start);
		return $this->db->get('contact');
	}

	public function countAll()
	{
		return $this->db->count_all('contact');
	}

	public function truncate()
	{
        $this->db->truncate('contact');
	}
}