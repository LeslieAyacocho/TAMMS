<?php

class Requests extends CI_Model
{
	public function construct()
	{
		parent::__construct();
	}

	function getAllAccountRequests()
	{
		$requests = array();
		$this->db->where('request_status', 'Pending');
		$query = $this->db->get('Account_Requests');

		if ($query->num_rows() > 0)
		{
			foreach ($query->result_array() as $row)
			{
				$requests[] = $row;
			}
		}
		return $requests;
	}

	function insertRequest($tempUserID)
	{
		$insertQuery = "INSERT INTO Requests(temp_user_id, request_date, request_status) VALUES(".$tempUserID.", CURRENT_TIMESTAMP, \"Pending\")";
		$this->db->query($insertQuery);
	}

	function updateRequest($requestID, $status)
	{
		$updates = array('request_status'=>$status);
		$this->db->where('request_id', $requestID);
		$this->db->update('Requests', $updates);
	}
}

?>