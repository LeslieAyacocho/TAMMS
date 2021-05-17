<?php

class LandmarksC extends CI_Controller
{
	public function construct()
	{
		parent::__construct();
	}

	function index()
	{
		$global['title'] = "TAMMS | Landmarks";
		$global['main'] = 'landmarks';
		$global['landmarks'] = $this->Landmarks->getAllLandmarks();
		$this->load->view('templates/dashboard_template', $global);
	}

	function viewLandmark($landmarkID)
	{
		$year = date("Y")-1;

		$global['landmark'] = $this->Landmarks->getLandmark($landmarkID);
		$global['title'] = "TAMMS | ".$global['landmark']['landmark_name'];
		$global['main'] = "viewlandmark";
		$global['countries'] = $this->Countries->getAllCountries();
		$global['year'] = $year;
		$global['previousYearData'] = $this->Graphdata->getLandmarkVisitors($landmarkID, $year);

		$this->load->view('templates/dashboard_template', $global);
	}

	function addLandmark()
	{
		if ($this->input->post('addLandmark'))
		{
			$this->Landmarks->insertLandmark();
			redirect(base_url().'landmarksc/', 'refresh');
		}
		else
		{
			$global['title'] = "TAMMS | Add New Landmark";
			$global['main'] = 'users_only/addlandmark';
			$global['cities'] = $this->Cities->getAllCities();

			$this->load->view('templates/dashboard_template', $global);
		}
	}

	function editLandmark($landmarkID=0)
	{
		if ($this->input->post('editLandmark'))
		{
			$this->Landmarks->updateLandmark($this->input->post('landmarkID'));
			redirect(base_url().'landmarksc/', 'refresh');
		}
		else
		{
			$global['title'] = "TAMMS | Edit Landmark";
			$global['main'] = 'users_only/editlandmark';
			$global['landmark'] = $this->Landmarks->getLandmark($landmarkID);
			$global['cities'] = $this->Cities->getAllCities();

			$this->load->view('templates/dashboard_template', $global);
		}
	}

	function deleteLandmark($landmarkID)
	{
		$this->Landmarks->deleteLandmark($landmarkID);
		redirect(base_url().'landmarksc/', 'refresh');
	}
}

?>