<?php

class CitiesC extends CI_Controller
{
	public function construct()
	{
		parent::__construct();
	}

	function index()
	{
		$global['title'] = "TAMMS | Cities";
		$global['main'] = 'cities';
		$global['cities'] = $this->Cities->getAllCities();

		$this->load->view('templates/dashboard_template', $global);
	}

	function addCity()
	{
		if ($this->input->post('addCity'))
		{
			$this->Cities->insertCity();
			redirect(base_url().'citiesc/', 'refresh');
		}
		else
		{
			$global['title'] = "TAMMS | Add New City";
			$global['main'] = "users_only/addcity";

			$this->load->view('templates/dashboard_template', $global);
		}
	}

	function editCity()
	{
		if ($this->input->post('editCity'))
		{
			$this->Cities->updateCity($cityID);
			redirect(base_url().'citiesc/', 'refresh');
		}
		else
		{
			$global['title'] = "TAMMS | Edit City";
			$global['main'] = "users_only/editcity";
			// $global['city'] = $this->Cities->getCity($cityID);

			$this->load->view('templates/dashboard_template', $global);
		}
	}

	function deleteCity($cityID)
	{
		$this->Cities->deleteCity($cityID);
		redirect(base_url().'citiesc/', 'refresh');
	}
}

?>