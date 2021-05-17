<?php

class EventsC extends CI_Controller
{
	public function construct()
	{
		parent::__construct();
	}

	function index()
	{
		$global['title'] = "TAMMS | Events";
		$global['main'] = 'events';
		// $global['events'] = $this->Events->getAllEvents();

		$this->load->view('templates/dashboard_template', $global);
	}

	function addEvent()
	{
		if ($this->input->post('addEvent'))
		{
			$this->Events->insertEvent();
			redirect(base_url().'eventsc/', 'refresh');
		}
		else
		{
			$global['title'] = "TAMMS | Add New Event";
			$global['main'] = 'users_only/addevent';

			$this->load->view('templates/dashboard_template', $global);	
		}
	}

	function editEvent($eventID=0)
	{
		if ($this->input->post('editEvent'))
		{
			$this->Events->updateEvent($this->input->post('eventID'));
			redirect(base_url().'eventsc/', 'refresh');
		}
		else
		{
			$global['title'] = "TAMMS | Edit Event Details";
			$global['main'] = "users_only/editevent";
			// $global['event'] = $this->Events->getEvent($eventID);

			$this->load->view('templates/dashboard_template', $global);
		}
	}

	function deleteEvent($eventID)
	{
		$this->Events->deleteEvent($eventID);
		redirect(base_url().'eventsc/', 'refresh');
	}
}

?>