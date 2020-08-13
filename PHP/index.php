<?php
	error_reporting(E_ALL);
	ini_set('display_errors', 1);

	$choice = explode("=", parse_url($_SERVER['QUERY_STRING'])["path"]);

	$choiceTwo = $_GET["choice"];
    
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
            
            $result = $rounting->routing($tekst);
            
            echo $result;
            break;
	}
?>