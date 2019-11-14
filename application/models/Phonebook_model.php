<?php

class Phonebook_model extends CI_Model
{
    //create a new contact
    public function create($data)
	{
        $this->first_name = $data['first_name']; // please read the below note
        $this->last_name = $data['last_name'];
		$this->db->insert('contact', $this);
		$contactID = $this->db->insert_id();
        unset($this->first_name);
        unset($this->last_name);
        //save phone number addresses.
        if (count($data['phoneNumbers']) > 0 && !empty($data['phoneNumbers'][0])) {
            $phoneData = array();
            foreach ($data['phoneNumbers'] as $key => $phoneNumber) {
                //populate phone number and corresponding key.
                $phoneData[] = array('contact_id' => $contactID, 'phone_number' => $phoneNumber, 'phone_number_type' => $data['phoneTypes'][$key]);
            }
            $this->db->insert_batch('phone_number', $phoneData);
        }
        //save email addresses.
        if (count($data['emails']) > 0 && !empty($data['emails'][0])) {
            $emailData = array();
            foreach ($data['emails'] as $key => $emails) {
                //populate phone number and corresponding key.
                $emailData[] = array('contact_id' => $contactID, 'email' => $emails, 'email_type' => $data['emailTypes'][$key]);
            }
            $this->db->insert_batch('email', $emailData);
        }
		return  $contactID;
    }
    //update contact and corresponding phone numbers and emails where applicable
    public function update($contact_id, $data)
    {
        $this->first_name = $data['first_name']; // please read the below note
        $this->last_name = $data['last_name'];
        $this->db->where('contact_id', $contact_id);
		$this->db->update('contact', $this);
        unset($this->first_name);
        unset($this->last_name);
        //save new phone numbers by removing old ones first. 
        $this->db->where('contact_id', $contact_id);
        $this->db->delete('phone_number');
        if (count($data['phoneNumbers']) > 0 && !empty($data['phoneNumbers'][0])) {
            $phoneData = array();
            foreach ($data['phoneNumbers'] as $key => $phoneNumber) {
                //populate phone number and corresponding key.
                $phoneData[] = array('contact_id' => $contact_id, 'phone_number' => $phoneNumber, 'phone_number_type' => $data['phoneTypes'][$key]);
            }
            $this->db->insert_batch('phone_number', $phoneData, 'contact_id');
        }
        //save new emails by deleting old ones first.
        $this->db->where('contact_id', $contact_id);
        $this->db->delete('email');
        if (count($data['emails']) > 0 && !empty($data['emails'][0])) {
            $emailData = array();
            foreach ($data['emails'] as $key => $emails) {
                //populate phone number and corresponding key.
                $emailData[] = array('contact_id' => $contact_id, 'email' => $emails, 'email_type' => $data['emailTypes'][$key]);
            }
            $this->db->insert_batch('email', $emailData, 'contact_id');
        }
		return  $contactID;
    }

    //delete contact
    public function delete($contact_id)
    {
        $this->db->where('contact_id', $contact_id);
        $this->db->delete('contact');

        return (bool) $this->db->affected_rows();
    }
    //get single contact
    public function get($contact_id)
    {
        $this->db->select('contact.contact_id, contact.first_name, contact.last_name, 
        GROUP_CONCAT(DISTINCT phone_number.phone_number SEPARATOR ",") as phone_numbers, 
        GROUP_CONCAT(DISTINCT  phone_number.phone_number_type SEPARATOR ",") as phone_number_types,
        GROUP_CONCAT(DISTINCT  email.email SEPARATOR ",") as emails, 
        GROUP_CONCAT(DISTINCT  email.email_type SEPARATOR ",") as email_types');
        
		$this->db->from('contact');
        $this->db->join('phone_number', 'phone_number.contact_id = contact.contact_id', 'left');
        $this->db->join('email', 'email.contact_id = contact.contact_id', 'left');
        $this->db->group_by('contact.contact_id');
        $this->db->where('contact.contact_id', $contact_id);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $record = $query->row();
            $phoneData = array();
            $emailData = array();
            $phone_numbers = explode(',', $record->phone_numbers);
            $phone_number_types = explode(',', $record->phone_number_types);

            foreach ($phone_numbers as $key => $phone_number) {
                //populate phone number and corresponding key.
                $phoneData[] = array('phone_number' => $phone_number, 'phone_number_type' => $phone_number_types[$key]);
            }

            $emails = explode(',', $record->emails);
            $email_types = explode(',', $record->email_types);
            foreach ($emails as $key => $email) {
                //populate email and corresponding key.
                $emailData[] = array('email' => $email, 'email_type' => $email_types[$key]);
            }
            $record->phone_numbers = $phoneData;
            $record->emails = $emailData;
            unset($record->phone_number_types);
            unset($record->email_types);
            return $record;
        }

        return false;
    }

    //Get contact books pagingated for index page either as is or filtered by a search term.
    public function getPhonebooks($limit, $start, $search_term = null)
	{
        $this->db->select('contact.contact_id, contact.first_name, contact.last_name, GROUP_CONCAT(DISTINCT phone_number.phone_number SEPARATOR ",") as phone_number, GROUP_CONCAT(DISTINCT email.email SEPARATOR ",") as email');
		$this->db->from('contact');
        $this->db->join('phone_number', 'phone_number.contact_id = contact.contact_id', 'left');
        $this->db->join('email', 'email.contact_id = contact.contact_id', 'left');
        $this->db->group_by('contact.contact_id');
        if (isset($search_term)) {
            $this->db->like('contact.first_name', $search_term);
            $this->db->or_like('contact.last_name', $search_term);
            $this->db->or_like('email.email', $search_term);
            $this->db->or_like('phone_number.phone_number', $search_term);
        }
        $this->db->limit($limit, $start);
        $query = $this->db->get();
		return $query;
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