<?php

class Users extends CI_Model
{
	public function construct()
	{
		parent::__construct();
	}

	function verifyUser($emailAddress, $password)
	{
		$user = array();

		$this->db->where('email_address', $emailAddress);
		$this->db->where('password', sha1($password));

		$query = $this->db->get('Users');

		if ($query->num_rows() > 0)
		{
			$user = $query->row_array();
		}
		else
		{
			$this->db->where('email_address', $emailAddress);
			$this->db->where('password', sha1($password));
			$this->db->where('is_active', "Yes");
			$query = $this->db->get('Temporary_Users');

			if ($query->num_rows() > 0)
			{
				$user = $query->row_array();
			}
		}

		return $user;
	}

	function getAllUsers()
	{
		$users = array();
		$query = $this->db->get('City_Users');

		if ($query->num_rows() > 0)
		{
			foreach ($query->result_array() as $row)
			{
				$users[] = $row;
			}
		}
		return $users;
	}

	function getTempUser($tempUserID)
	{
		$user = array();
		$this->db->where('temp_user_id', $tempUserID);
		$query = $this->db->get('Temporary_Users');

		if ($query->num_rows() > 0)
		{
			$user = $query->row_array();
		}
		return $user;
	}

	function getNextID()
	{
		$row = array();
		$readQuery = "SELECT MAX(temp_user_id) AS \"next_id\" FROM Temporary_Users";
		$result = $this->db->query($readQuery);

		if ($result->num_rows() > 0)
		{
			$row = $result->row_array();

			if ($row['next_id']==NULL)
			{
				$nextID = 1;
			}
			else
			{
				$nextID = $row['next_id']+1;
			}
		}
		return $nextID;
	}

	function verifyNewAccount($requestID)
	{	
		$isVerified = false;
		$verification = array();

		$this->db->where('request_id', $requestID);
		$query = $this->db->get('User_Verifications_Details');

		$timestampQuery = $this->db->query("SELECT CURRENT_TIMESTAMP AS 'current_timestamp'");
		$timestamp = $timestampQuery->row();

		if ($query->num_rows() > 0)
		{
			$verification = $query->row_array();

			if ($verification['verification_code'] == $_POST['verificationCode'] && 
				$timestamp->current_timestamp < $verification['lease_expiry_date'])
			{
				$isVerified = true;
			}
			else
			{
				$isVerified = false;
			}
		}
		else
		{
			$isVerified = false;
		}
		return $isVerified;
	}

	function uploadImage($displayPicture)
	{
		$config['upload_path'] = './images/users_display_pictures/';
		$config['allowed_types'] = 'jpg|png';
		$config['overwrite'] = false;
		$config['max_size'] = '2048';
		$config['min_width'] ='0';
		$config['max_width'] = '0';
		$config['min_height'] = '0';
		$config['max_height'] = '0';
		$config['max_filename'] = '255';
		$config['remove_spaces'] = true;

		$this->load->library('upload', $config);
		$this->upload->do_upload($displayPicture);
	}

	function insertTempUser()
	{
		$inserts = array(
			'first_name'=>$_POST['firstName'],
			'middle_name'=>$_POST['middleName'],
			'surname'=>$_POST['surname'],
			'full_name'=>$_POST['firstName']." ".$_POST['middleName']." ".$_POST['surname'],
			'email_address'=>$_POST['emailAddress'],
			'password'=>sha1($_POST['password']),
			'user_from'=>$_POST['userFrom'],
			'is_active'=>"Yes"
		);

		$this->db->insert('Temporary_Users', $inserts);
	}

	function insertUser()
	{
		$newUser = array();
		$inserts = array(
			'first_name'=>$_POST['firstName'],
			'middle_name'=>$_POST['middleName'],
			'surname'=>$_POST['surname'],
			'full_name'=>$_POST['firstName']." ".$_POST['middleName']." ".$_POST['surname'],
			'email_address'=>$_POST['emailAddress'],
			'password'=>sha1($_POST['password']),
			'user_from'=>$_POST['userFrom']
		);

		$this->uploadImage('displayPicture');
		$displayPicture = $this->upload->data();

		if ($displayPicture['file_name'])
		{
			$inserts['display_picture'] = "../images/users_display_pictures/".$displayPicture['file_name'];
		}
		else
		{
			$inserts['display_picture'] = "../images/users_display_pictures/default.png";
		}
		
		$updates = array('is_active'=>"No");
		$this->db->where('temp_user_id', $_POST['tempUserID']);
		$this->db->update('Temporary_Users',$updates);

		$this->db->insert('Users', $inserts);
		$newUser = $this->verifyUser($_POST['emailAddress'], $_POST['password']);
		return $newUser;
	}
}

?>