<?php

class Cities extends CI_Model
{
	public function construct()
	{
		parent::__construct();
	}

	function getAllCities()
	{
		$cities = array();
		$query = $this->db->get('Cities');

		if ($query->num_rows() > 0)
		{
			foreach ($query->result_array() as $row)
			{
				$cities[] = $row;
			}
		}
		return $cities;
	}
}

?>