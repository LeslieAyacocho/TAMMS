<?php

class Events extends CI_Model
{
	public function construct()
	{
		parent::__construct();
	}

	function insertEvent()
	{
		$inserts = array(
			'event_name'=>$_POST['eventName'],
			'start_date'=>$_POST['startDate'],
			'end_date'=>$_POST['endDate']
		);

		$this->db->insert('Events', $inserts);
	}

	function updateEvent($eventID)
	{
		$updates = array(
			'event_name'=>$_POST['eventName'],
			'start_date'=>$_POST['startDate'],
			'end_date'=>$_POST['endDate']
		);

		$this->db->where('event_id', $eventID);
		$this->db->update('Events', $updates);
	}

	function deleteEvent($eventID)
	{
		$this->db->where('event_id', $eventID);
		$this->db->delete('Events');
	}

	function getAllEvents()
	{
		$result = array();

		$query = $this->db->get('Events');

		if ($query->num_rows() > 0)
		{
			$result = $query->result_array();
		}

		$this->db->free_result();
		return $result;
	}

	function getEvent($eventID)
	{
		
	}
}

?>