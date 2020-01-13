<?php 
	class Pet { // PARENT CLASS...
	
		function __construct() {		

			$this->Db = new Model();

		}
		
		// DASHBOARD PAGE CONTROL HERE...		
		function dashboard(){ 
			$data = array();
			$data['title'] = 'Pupdate Dashboard';
			$data['data'] = $this->Db->dashboard();
			return $data;

		}
		
		// PROFILE PAGE CONTROL HERE...
		function profile($pid){ 
			$data = array();
			$title = $this->Db->pageTitle($pid);			
			$data['title'] = $title.' - Pupdate';
			$data['data'] = $this->Db->profile($pid);
			$data['vacc'] = $this->Db->getVaccinations($pid);
			$data['mark'] = $this->Db->getMarking($pid);
			$data['markfield'] = $this->Db->getMarkingField($pid);
			$data['events'] = $this->Db->getprofileEvents($pid);			
			$data['Playtime'] = $this->Db->lastPlaytime($pid);
			$data['Meal'] = $this->Db->lastMeal($pid);
			$data['Water'] = $this->Db->lastWater($pid);
			$data['Treat'] = $this->Db->lastTreat($pid);
			$data['Pee'] = $this->Db->lastPee($pid);
			$data['Poo'] = $this->Db->lastPoo($pid);
			$data['PeePoo'] = $this->Db->lastPeePoo($pid);
			$data['Bath'] = $this->Db->lastBath($pid);
			$data['Vet Visit'] = $this->Db->lastVetVisit($pid);
			$data['Weight'] = $this->Db->lastWeight($pid);
			$data['Vomit'] = $this->Db->lastVomit($pid);
			$data['Poo-Diarrhea'] = $this->Db->lastPooDiarrhea($pid);
			
			return $data;

		}
		
		
	}	
?>