<?php

class Countries extends CI_Model
{
	public function construct()
	{
		parent::__construct();
	}

	function getAllCountries()
	{
		$countries = array();
		$this->db->order_by('country_code', 'ASC');
		$query = $this->db->get('Countries');

		if ($query->num_rows() > 0)
		{
			foreach ($query->result_array() as $row)
			{
				$countries[] = $row;
			}
		}
		return $countries;
	}

	function insertCountry()
	{
		$countries = $this->getAllCountries();

		foreach ($countries as $country=>$row)
		{
			if (!$country['country_code'] == $_POST['countryCode'])
			{
				$isUniqueCode = true;
			}
		}

		if ($isUniqueCode == true)
		{
			$inserts = array(	
				'country_code'=>strtoupper($_POST['countryCode']),
				'country_name'=>$_POST['countryName'],
				'continent'=>$_POST['continent']
			);
			$this->db->insert('Countries', $inserts);
		}
	}

	function deleteCountry($countryID)
	{
		$this->db->where('country_id', $countryID);
		$this->db->delete('Countries');
	}
}

?>