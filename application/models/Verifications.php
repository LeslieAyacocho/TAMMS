<?php

class Verifications extends CI_Model
{
	public function construct()
	{
		parent::__construct();
	}

	function getAllVerifications()
	{
		$verifications = array();
		$query = $this->db->get('Verifications');

		if ($query->num_rows() > 0)
		{
			foreach ($query->result_array() as $row)
			{
				$verifications[] = $row;
			}
		}
		return $verifications;
	}

	function getVerification($tempUserID)
	{
		$verification = array();
		$this->db->where('temp_user_id', $tempUserID);
		$query = $this->db->get('User_Verifications_Details');

		if ($query->num_rows() > 0)
		{
			$verification = $query->row_array();
		}
		return $verification;
	}

	function generateCode()
	{
		$isCodeUnique = false;

		while ($isCodeUnique==false)
		{
			$verificationCode = random_string('alnum', 6);

			$this->db->where('verification_code', $verificationCode);
			$query = $this->db->get('Verifications');

			if ($query->num_rows() == 0)
			{
				$isCodeUnique = true;
			}
			else
			{	
				$isCodeUnique = false;
			}
		}
		return $verificationCode;
	}

	function insertVerification($requestID, $verificationCode, $verifierID)
	{
		$insertQuery = "INSERT INTO Verifications(request_id, verification_code, lease_date, lease_expiry_date, verified_by)";
		$insertQuery .= " VALUES(".$requestID.", \"".$verificationCode."\", CURRENT_TIMESTAMP, DATE_ADD(CURRENT_TIMESTAMP, INTERVAL 1 HOUR), ".$verifierID.")";
		$this->db->query($insertQuery);
	}
}

?>