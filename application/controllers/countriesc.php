<?php

class CountriesC extends CI_Controller
{	
	public function construct()
	{
		parent::__construct();
	}

	function index()
	{
		$global['title'] = "TAMMS | Countries";
		$global['main'] = "countries";
		$global['countries'] = $this->Countries->getAllCountries();

		$this->load->view('templates/dashboard_template', $global);
	}

	function addCountry()
	{
		if ($this->input->post('addCountry'))
		{
			$this->Countries->insertCountry();
			redirect(base_url().'countriesc/', 'refresh');
		}
		else
		{
			$global['title'] = "TAMMS | Add Country";
			$global['main'] = 'users_only/addcountry';

			$this->load->view('templates/dashboard_template', $global);
		}
	}

	function editCountry($countryID=0)
	{
		if ($this->input->post('editCountry'))
		{
			$this->Countries->updateCountry($countryID);
			redirect(base_url().'countriesc/', 'refresh');
		}
		else
		{
			$global['title'] = "TAMMS | Add Country";
			$global['main'] = 'users_only/editcountry';
			$global['country'] = $this->Countries->getCountry($countryID);

			$this->load->view('template', $global);
		}
	}

	function deleteCountry($countryID)
	{
		$this->Countries->deleteCountry($countryID);
		redirect(base_url().'countriesc/', 'refresh');
	}

}

?>