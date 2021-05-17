<?php

class Landmarks extends CI_Model
{
	public function construct()
	{
		parent::__construct();
	}

	function getAllLandmarks()
	{
		$landmarks = array();
		$query = $this->db->get('Landmark_Details');

		if ($query->num_rows() > 0)
		{
			foreach ($query->result_array() as $row)
			{
				$landmarks[] = $row;
			}
		}
		return $landmarks;
	}

	function getLandmark($landmarkID)
	{
		$landmark = array();
		$this->db->where('landmark_id', $landmarkID);
		$query = $this->db->get('Landmark_Details');

		if ($query->num_rows() > 0)
		{
			$landmark = $query->row_array();
		}
		return $landmark;
	}

	function uploadImage($landmarkImage)
	{
		$config['upload_path'] = './images/landmark_images/';
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
		$this->upload->do_upload($landmarkImage);
	}

	function insertLandmark()
	{
		$inserts = array(
			'landmark_name'=>$_POST['landmarkName'],
			'address'=>$_POST['address'],
			'managing_office'=>$_POST['managingOffice'],
			'located_at'=>$_POST['location']
		);

		$this->uploadImage('landmarkImage');
		$landmarkImage = $this->upload->data();

		if ($landmarkImage['file_name'])
		{
			$inserts['landmark_image'] = "../images/landmark_images/".$landmarkImage['file_name'];
		}

		$this->db->insert('Landmarks', $inserts);
	}

	function updateLandmark($landmarkID)
	{
		$updates = array(
			'landmark_name'=>$_POST['landmarkName'],
			'address'=>$_POST['address'],
			'managing_office'=>$_POST['managingOffice'],
			'located_at'=>$_POST['location']
		);

		if (isset($_POST['retainImage']))
		{
			$this->db->where('landmark_id', $landmarkID);
			$this->db->update('Landmarks', $updates);
		}
		else
		{
			$this->uploadImage('landmarkImage');
			$landmarkImage = $this->upload->data();

			if ($landmarkImage['file_name'])
			{
				$uploads['landmark_image'] = "../images/landmark_images/".$landmarkImage['file_name'];
				$this->db->where('landmark_id', $landmarkID);
				$this->db->update('Landmarks', $updates);
			}
		}
	}

	function deleteLandmark($landmarkID)
	{
		$this->db->where('landmark_id', $landmarkID);
		$this->db->delete('Landmarks');
	}
}

?>