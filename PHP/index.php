<?php
	error_reporting(E_ALL);
	ini_set('display_errors', 1);

	//$choice = explode("=", parse_url($_SERVER['QUERY_STRING'])["path"]);
	//$choice = explode("=", parse_url($_SERVER['QUERY_STRING'])["path"]);

	$choice = array();
	parse_str($_SERVER["QUERY_STRING"], $choice);

	var_dump($choice);
	exit(0);

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
			
			$resultPro = $projekt->getKunRentOpgave(1);
			
			$alt = "";
			$antal = count($resultPro);
			for($i = 0; $i < $antal; $i++){
				$resultBil = $billede->getKenRentImg(1);
				
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
			
			$resultPro = $projekt->getKunRentOpgave(2);
			
			$alt = "";
			$antal = count($resultPro);
			for($i = 0; $i < $antal; $i++){
				$resultBil = $billede->getKenRentImg(2);
				
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
			
			$resultPro = $projekt->getKunRentOpgave(3);
			
			$alt = "";
			$antal = count($resultPro);
			for($i = 0; $i < $antal; $i++){
				$resultBil = $billede->getKenRentImg(3);
				
				$alt .= $resultBil[$i] . $resultPro[$i];
			}
			$tilsidst = rtrim($alt, "£");
			echo $tilsidst;
			break;
		case "AlleOpgaverGruppe":
			include_once("./classProjekt.php");
			include_once("./classBilleder.php");
			
			$projekt = new projekter();
			$billede = new Billeder();
			
			$resultPro = $projekt->getKunRentOpgave(4);
			
			$alt = "";
			$antal = count($resultPro);
			for($i = 0; $i < $antal; $i++){
				$resultBil = $billede->getKenRentImg(4);
				
				$alt .= $resultBil[$i] . $resultPro[$i];
			}
			$tilsidst = rtrim($alt, "£");
			echo $tilsidst;
			break;
		case "AleneHjem":
			include_once("./classProjekt.php");
			include_once("./classBilleder.php");
			
			$projekt = new projekter();
			$billede = new Billeder();
			
			$resultPro = $projekt->getProjektFromAleneAndGruppe(3, 1);
			$alt = "";
			$antal = count($resultPro);
			for($i = 0; $i < $antal; $i++){
				$resultBil = $billede->getImgFromAleneAndGruppe(3, 1);
				
				$alt .= $resultBil[$i] . $resultPro[$i];
			}
			$tilsidst = rtrim($alt, "£");
			echo $tilsidst;
			break;
		case "AleneCSharp":
			include_once("./classProjekt.php");
			include_once("./classBilleder.php");
			
			$projekt = new projekter();
			$billede = new Billeder();
			
			$resultPro = $projekt->getProjektFromAleneAndGruppe(3, 2);
			
			$alt = "";
			$antal = count($resultPro);
			for($i = 0; $i < $antal; $i++){
				$resultBil = $billede->getImgFromAleneAndGruppe(3, 2);
				
				$alt .= $resultBil[$i] . $resultPro[$i];
			}
			$tilsidst = rtrim($alt, "£");
			echo $tilsidst;
			break;
		case "gruppeCSharp":
			include_once("./classProjekt.php");
			include_once("./classBilleder.php");
			
			$projekt = new projekter();
			$billede = new Billeder();
			
			$resultPro = $projekt->getProjektFromAleneAndGruppe(4, 2);
			
			$alt = "";
			$antal = count($resultPro);
			for($i = 0; $i < $antal; $i++){
				$resultBil = $billede->getImgFromAleneAndGruppe(4, 2);
				
				$alt .= $resultBil[$i] . $resultPro[$i];
			}
			$tilsidst = rtrim($alt, "£");
			echo $tilsidst;
			break;
		case "gruppeHjem":
			include_once("./classProjekt.php");
			include_once("./classBilleder.php");
			
			$projekt = new projekter();
			$billede = new Billeder();
			
			$resultPro = $projekt->getProjektFromAleneAndGruppe(4, 1);
			
			$alt = "";
			$antal = count($resultPro);
			for($i = 0; $i < $antal; $i++){
				$resultBil = $billede->getImgFromAleneAndGruppe(4, 1);
				
				$alt .= $resultBil[$i] . $resultPro[$i];
			}
			$tilsidst = rtrim($alt, "£");
			echo $tilsidst;
			break;
		case "sprogBox0":
			include_once("./classProjekt.php");
			include_once("./classBilleder.php");
			
			$projekt = new projekter();
			$billede = new Billeder();
			
			$antalChoice = count($choice);
			$sqlTekst = "";
			for($i = 2; $i < $antalChoice; $i++){
				$sqlTekst .= $choice[i] . ", ";
			}
			$tilsidst = rtrim($sqlTekst, ", ");
			var_dump($tilsidst);
			exit();
			$resultPro = $projekt->test($sqlTekst);
			break;
	}
?>