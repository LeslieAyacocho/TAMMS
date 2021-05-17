<?php

class Dashboard extends CI_Controller
{
	
	public function construct()
	{
		parent::__construct();
	}

	function index()
	{
		// $prevYear = date("Y");
		// $prevYear2 = date("Y")-1;
		// $nextYear1 = date("Y");
		// $nextYear2 = date("Y")+1;

		//Year is set due to the year date in the database example
		$prevYear = 2019; 
		$prevYear2 = 2018;
		$nextYear1 = 2021;
		$nextYear2 = 2022;

		$localTotal = $this->Graphdata->getLocalTotal($prevYear);
		$foreignTotal = $this->Graphdata->getForeignTotal($prevYear);
		$visitorsTotal = $this->Graphdata->getVisitorsTotal($prevYear);
		$visitorsTotal2 = $this->Graphdata->getVisitorsTotal($prevYear2);
		$currentIncrease = round((($visitorsTotal-$visitorsTotal2)/$visitorsTotal2)*100, 2);

		$global['title'] = "TAMMS | ".$_SESSION['fullName'];
		$global['main'] = 'main';
		$global['curYear'] = date("Y");
		$global['prevYear1'] = $prevYear;
		$global['prevYear2'] = $prevYear2;
		$global['nextYear1'] = $nextYear1;
		$global['nextYear2'] = $nextYear2;
		$global['previousYearData'] = $this->Graphdata->getPreviousYearData($prevYear);
		$global['leastVisitorsData'] = $this->Graphdata->getLeastVisitorsData($prevYear);
		$global['monthlyAverage'] = $this->Graphdata->getMonthlyAverage();
		$global['localPercent'] = round(($localTotal/$visitorsTotal) * 100, 2);
		$global['foreignPercent'] = round(($foreignTotal/$visitorsTotal) * 100, 2);
		$global['prevYear1Total'] = $this->Graphdata->getVisitorsTotal($prevYear);
		$global['prevYear2Total'] = $this->Graphdata->getVisitorsTotal($prevYear2);
		$global['forecast1'] = round($visitorsTotal = $this->Graphdata->getVisitorsTotal($prevYear) + (1+$currentIncrease));
		$global['forecast2'] = round($global['forecast1'] + (1+$currentIncrease));
		$global['forecast3'] = round($global['forecast2'] + (1+$currentIncrease));
		
		$this->load->view('templates/dashboard_template', $global);
		var_dump($currentIncrease);
	}
}

?>