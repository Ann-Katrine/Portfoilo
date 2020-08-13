<?php
	error_reporting(E_ALL);
	ini_set('display_errors', 1);

	$choice = explode("=", parse_url($_SERVER['QUERY_STRING'])["path"]);

	$choiceTwo = $_GET["choice"];
    

/************************************************************************* videre her!
/*	$choice = array();
	parse_str($_SERVER["QUERY_STRING"], $choice);

	var_dump($choice);
	exit(0);
*/
	switch($choiceTwo){
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
		case "sprogBox":
			include_once("./classProjekt.php");
			include_once("./classBilleder.php");
			
			$query = $_GET["q"];
			
			$replace = str_replace("Sharp", "#", $query);
			$hej = explode(",", $replace);
			
			$antalHej = count($hej);
			$tekst = "";
			for($i = 0; $i < $antalHej; $i++){
				$tekst .=  "" . $hej[$i] . ",";
			}
			$tekst = rtrim($tekst, ",");
			
			$projekt = new projekter();
			$billede = new Billeder();
			
			$resultPro = $projekt->getProjektWithSprog($tekst);
			
			$alt = "";
			$antal = count($resultPro);
			for($i = 0; $i < $antal; $i++){
				$resultBil = $billede->test($tekst);
				
				$alt .= $resultBil[$i] . $resultPro[$i];
			}
			$alt = rtrim($alt, "£");
			echo $alt;
			break;
		case "kun3Opgaver":
			include_once("./classProjekt.php");
			include_once("./classBilleder.php");
			
			$projekt = new projekter();
			$billede = new Billeder();
			
			$resultPro = $projekt->kun3Opgaver();
			$alt = "";
			$antal = count($resultPro);
			for($i = 0; $i < $antal; $i++){
				$resultBil = $billede->kun3OpgaverImg();
				
				$alt .= $resultBil[$i] . $resultPro[$i];
			}
			$tilsidst = rtrim($alt, "£");
			echo $tilsidst;
			break;
        case "test":
            include_once("./miniRouting.php");
            
            $rounting = new miniRouting();
            $query = $_GET["q"];
            $array = explode(",", $query);
            
            $antal = count($array);
            $tekst = "";
            for($i = 0; $i < $antal; $i++){
				$tekst .=  "" . $array[$i] . ",";
			}
            $tekst = rtrim($tekst, ",");
            
//            var_dump($tekst);
            
            $result = $rounting->routing($tekst);
           
//            var_dump($result);
            
            echo $result;
            break;
	}
?>