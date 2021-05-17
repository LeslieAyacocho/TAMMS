<?php

class UsersC extends CI_Controller
{
	public function construct()
	{
		parent::__construct();

		session_start();
		$_SESSION['userID'] = 0;
		$_SESSION['emailAddress'] = "";
		$_SESSION['fullName'] = "";
		$_SESSION['userFrom'] = 0;
		$_SESSION['displayPicture'] = "";
	}	

	function index()
	{
		$global['title'] = "TAMMS |".$_SESSION['fullName'];
		$global['main'] = 'users_only/users';
		$global['users'] = $this->Users->getAllUsers();
		$global['requests'] = $this->Requests->getAllAccountRequests();

		$this->load->view('templates/dashboard_template', $global);
	}

	function login()
	{
		if ($this->input->post('login'))
		{
			$emailAddress = $this->input->post('emailAddress');
			$password = $this->input->post('password');

			$result = $this->Users->verifyUser($emailAddress, $password);
			
			if (sizeof($result) > 0) //checks if the database query result returned an empty set
			{
				$_SESSION['emailAddress'] = $result['email_address'];
				$_SESSION['fullName'] = $result['full_name'];
				$_SESSION['userFrom'] = $result['user_from'];
				$_SESSION['displayPicture'] = $result['display_picture'];
				
				foreach ($result as $key=>$value)
				{
					if ($key=='user_id')
					{
						$_SESSION['userID'] = $result['user_id'];
						redirect(base_url().'dashboard', 'refresh');
					}
					elseif ($key=='temp_user_id')
					{
						$_SESSION['userID'] = $result['temp_user_id'];
						redirect(base_url().'usersc/verifynewaccount', 'refresh');
					}
				}
			}
			else
			{
				redirect(base_url().'usersc/login', 'refresh');
			}
		}

		else
		{
			$global['title'] = "TAMMS | Login";
			$global['main'] = 'users_only/login';
			$this->load->view('templates/login_template', $global);
		}
	}

	function logout()
	{
		session_destroy();
		redirect(base_url().'usersc/login');
	}

	function signup()
	{
		$global['title'] = "TAMMS | Signup";

		if ($this->input->post('signup'))
		{
			$global['main'] = "users_only/signupmessage";
			$this->Users->insertTempUser();
			$this->Requests->insertRequest($_SESSION['userID']);
			$this->load->view('templates/login_template', $global);
		}
		
		else
		{
			$global['main'] = "users_only/signup";
			$global['cities'] = $this->Cities->getAllCities();

			$nextID = $this->Users->getNextID();
			$_SESSION['userID'] = $nextID;

			$this->load->view('templates/login_template', $global);
		}
	}

	function verifyNewAccount()
	{
		if ($this->input->post('verifyAccount'))
		{
			$isVerified = $this->Users->verifyNewAccount($this->input->post('requestID'));

			if ($isVerified == true)
			{
				redirect(base_url().'usersc/adduser', 'refresh');
			}
			else
			{
				redirect(base_url().'usersc/signup', 'refresh');
			}
		}
		else
		{
			$global['title'] = "TAMMS | Verify My Account";
			$global['main'] = 'users_only/verification';
			$this->load->view('templates/login_template', $global);
		}
		
	}

	function approveAccount($requestID=0, $emailAddress=0)
	{
		$global['verificationCode'] = $this->Verifications->generateCode();
		$global['requestID'] = $requestID;
		$global['emailAddress'] = $emailAddress;

		$this->Requests->updateRequest($requestID, "Approved");
		$this->Verifications->insertVerification($requestID, $global['verificationCode'], $_SESSION['userID']);
		$this->load->view('users_only/verificationmessage', $global);
	}

	/*
	addUser() function
	*/
	function addUser()
	{
		if ($this->input->post('addUser'))
		{
			$newUser = $this->Users->insertUser();

			if (sizeof($newUser)!=0)
			{
				$_SESSION['userID'] = $newUser['user_id'];
				$_SESSION['emailAddress'] = $newUser['email_address'];
				$_SESSION['fullName'] = $newUser['full_name'];
				$_SESSION['displayPicture'] = $newUser['display_picture'];

				redirect(base_url().'dashboard', 'refresh');
			}
		}
		else
		{
			$global['title'] = "TAMMS | Add New User";
			$global['main'] = 'users_only/adduser';
			$global['tempUser'] = $this->Users->getTempUser($_SESSION['userID']);
			$this->load->view('templates/login_template', $global);
		}
	}

	/*
	editUser() function
	*/
	function editUser($userID)
	{
		if ($this->input->post('editUser'))
		{
			$this->Users->editUser($userID);
			redirect(base_url().'usersc/', 'refresh');
		}
		else
		{
			$global['title'] = "TAMMS | Edit User";
			$global['main'] = 'users_only/edituser';
			$global['user'] = $this->Users->getUser($userID);

			$this->load->view('template', $global);
		}
	}

	/*
	deleteUser() function
	*/
	function deleteUser($userID)
	{
		$this->Users->deleteUser($userID);
		redirect(base_url().'usersc/', 'refresh');
	}

	function sendMail()
	{
		$this->load->view('users_only/verificationmessage');
	}
}

?>