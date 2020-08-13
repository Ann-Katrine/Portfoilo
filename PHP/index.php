<?php
	error_reporting(E_ALL);
	ini_set('display_errors', 1);

	$choice = explode("=", parse_url($_SERVER['QUERY_STRING'])["path"]);

	switch($choice[1]){
		case "overskiftType":
			include_once("./classType.php");
			
			$type = new proType();
			
			$result = $type->getHighestType();
			
			$alt = "";
			$antal = count($result);
			
			for($i = 0; $i < $antal; $i++){
				$alt .= $result[$i];
			}
			
			$tilsidst = rtrim($alt, "£");
			echo $tilsidst;
			break;
		case "projektType":
			include_once("./classType.php");
			
			$type = new proType();
			
			$result = $type->getProjektType();
			
			$alt = "";
			$antal = count($result);
			
			for($i = 0; $i < $antal; $i++){
				$alt .= $result[$i];
			}
			
			$tilsidst = rtrim($alt, "£");
			echo $tilsidst;
			break;
		case "Sprog":
			include_once("./classKategori.php");
			
			$kategori = new kateg();
			
			$result = $kategori->getKateori();
			
			$alt = "";
			$antal = count($result);
			for($i = 0; $i < $antal; $i++){
				$alt .= $result[$i];
			}
			$tilsidst = rtrim($alt, "£");
			echo $tilsidst;
			break;
		case "hjemmesideOpgaver":
			include_once("./classProjekt.php");
			include_once("./classBilleder.php");
			
			$projekt = new projekter();
			$billede = new Billeder();
			
			$resultPro = $projekt->getHjemmesideOpgaver();
			
			$alt = "";
			$antal = count($resultPro);
			for($i = 0; $i < $antal; $i++){
				$resultBil = $billede->hjemmesideImg($i);
				
				$alt .= $resultBil[$i] . $resultPro[$i];
			}
			$tilsidst = rtrim($alt, "£");
			echo $tilsidst;
			break;
		case "cSharpOpgaver":
			include_once("./classProjekt.php");
			include_once("./classBilleder.php");
			
			$projekt = new projekter();
			$billede = new Billeder();
			
			$resultPro = $projekt->getCSharpOpgaver();
			
			$alt = "";
			$antal = count($resultPro);
			for($i = 0; $i < $antal; $i++){
				$resultBil = $billede->cSharpImg($i);
				
				$alt .= $resultBil[$i] . $resultPro[$i];
			}
			$tilsidst = rtrim($alt, "£");
			echo $tilsidst;
			break;
		case "AlleOpgaverAlene":
			include_once("./classProjekt.php");
			include_once("./classBilleder.php");
			
			$projekt = new projekter();
			$billede = new Billeder();
			
			$resultPro = $projekt->getAllAleneOpgaver();
			
			$alt = "";
			$antal = count($resultPro);
			for($i = 0; $i < $antal; $i++){
				$resultBil = $billede->getImagesToOpgaver($i);
				
				$alt .= $resultBil[$i] . $resultPro[$i];
			}
			$tilsidst = rtrim($alt, "£");
			echo $tilsidst;
			break;
	}
?>