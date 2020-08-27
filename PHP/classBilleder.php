<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

	include_once("./db.php");
	include_once("./tabel/billeder.php");

	class Billeder{
        /***********************************************/
        /*       få fat i rækkernes navne i tablen     */
        /***********************************************/
        private function getRows($tal){
            $tallet = explode(",", $tal);
            $row = array();
            
            $antal = count($tallet);
            for($i = 0; $i < $antal; $i++){
                switch($tallet[$i]){
                    case 0:
                        array_push($row, "id");
                        break;
                    case 1:
                        array_push($row, "img");
                        break;
                    case 2:
                        array_push($row, "imgTekst");
                        break;
                }   
            }
            
            return $row;
        }
        
        /******************************************************************************************************/
        /*                                    til alminelig crud                                              */
        /******************************************************************************************************/
        
        /***********************************************/
        /*              create billeder                */
        /***********************************************/
        public function postBilleder($billedet, $tekst){
            $db = new DB();
            
            $stmt = $db->conn->prepare("INSERT INTO billeder (img, imgTekst) VALUES (?, ?)");
            
            
            
            $stmt->bind_param("ss", $billedet, $tekst);
            $stmt->execute();
            $result = $stmt->affected_rows;
            
            if($result === 1){
                http_response_code(201);
                $finish = "oprettet";
            }
            else{
                http_response_code(404);
                die("Det blic ikke oprettet");
            }
            $stmt->close();
            $db->conn->close();
            echo $finish;
        }
        
        /***********************************************/
        /*              put billeder                   */
        /***********************************************/
        public function putBilleder(){
            
        }
        
        /***********************************************/
        /*              patch billeder                 */
        /***********************************************/
        public function patchBilleder(){
            
            
        }
        
        /***********************************************/
        /*              delete billeder                */
        /***********************************************/
        public function deletebilleder($id){
             $db = new DB();
            
            $stmt = $db->conn->prepare("DELETE FROM billeder WHERE id = ?");
            
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->affected_rows;
            
            if($result === 1){
                http_response_code(200);
                $finish = "slettet";
            }
            else{
                http_response_code(404);
                die("Det bliv ikke oprettet");
            }
            $stmt->close();
            $db->conn->close();
            echo $finish;
        }
        
        /***********************************************/
        /*              get all billeder               */
        /***********************************************/
        public function getAllBilleder(){
            $db = new DB();
            $billeder = array();
            
            $stmt = $db->conn->prepare("SELECT id, img, imgTekst FROM billeder");
            
            $stmt->execute();
            $result = $stmt->get_result();
            
            if($result != false){
                while($row = $result->fetch_object()){
                    $billeder[] = new billed($row->id, $row->img, $row->imgTekst);
                } 
            }
            else{
                http_response_code(404);
                die("Det bliv ikke fundet");
            }
            $stmt->close();
            $db->conn->close();
            return $billeder;
        }
        
        /******************************************************************************************************/
        /*                           til andet der kunne være udover crud                                     */
        /******************************************************************************************************/
        
        /***********************************************/
        /*        kun til når der kommer med et tal    */
        /***********************************************/
		public function getKenRentImg($id){
			$proId = array();
			$img = array();
			$db = new DB();
			
            // For at få fat i proejkternes id 
			$stmt = $db->conn->prepare("SELECT idProjekt FROM projekttype_has_projekt WHERE idProjektType = ?");
			
			$stmt->bind_param("i", $id);
			$stmt->execute();
			$resultProId = $stmt->get_result();
            
            // Hvis der er et resultat i $resultProId
            if($resultProId != false){
                while($row = $resultProId->fetch_object()){
                    $proId[] = $row->idProjekt;
                }

                // For at få projekterne frem
                $stmt = $db->conn->prepare("SELECT billeder.img, billeder.imgTekst FROM billeder_has_projekt INNER JOIN billeder ON billeder.id = billeder_has_projekt.idBilleder WHERE idProjekt = ?");

                $antal = count($proId);
                for($i = 0; $i < $antal; $i++){
                    $stmt->bind_param("i", $proId[$i]);
                    $stmt->execute();
                    $resultImg = $stmt->get_result();
                    
                    // Hvis der er et resultat i $resultIMG
                    if($resultImg != false){
                        while($row = $resultImg->fetch_object()){
                            $img[] = $row->img . "'" . $row->imgTekst. "'";	
                        }   
                    }
                    else{
                        $img = "Der er ingen tilgængelig match, fra det vælgte søgresultat";
                    }
                }
            }
            else{
                $img = "Der er ingen tilgængelig match, fra det vælgte søgresultat";
            }
			
			return $img;
		}
		
        /***********************************************/
        /*         når man kun har ngoet fra typer     */
        /***********************************************/
		public function getImgFromAleneAndGruppe($ProId, $TypeId){
			include_once("./classProjekt.php");
			$img = array();
			$db = new DB();
			
			$projekt = new projekter();
			
            //  går til class projekter for at få de rigtige id'er
			$getProId = $projekt->getIdToAleneAndGruppe($ProId, $TypeId);
			
            //  for at se om vi har fået nogle id'er med
            if($getProId[0] != "Der er ingen tilgængelig match, fra det vælgte søgresultat"){
                // for at få projekterne frem
                $stmt = $db->conn->prepare("SELECT billeder.img, billeder.imgTekst FROM billeder_has_projekt INNER JOIN billeder ON billeder.id = billeder_has_projekt.idBilleder WHERE idProjekt = ?");
			
                $antal = count($getProId);
                for($i = 0; $i < $antal; $i++){
                    $stmt->bind_param("i", $getProId[$i]);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    
                    // Hvis $result har fået varedier
                    if($result != false){
                       while($row = $result->fetch_object()){
                            $img[] = $row->img . "'" . $row->imgTekst . "'";
                        } 
                    }
                    else{
                        $img = "Der er ingen tilgængelig match, fra det vælgte søgresultat";
                    }
                }
            }
            else{
                $img = $getProId;
            }
			
			return $img;
		}
		
        /***********************************************/
        /*      kun til forsiden pga. skal kun have 3  */
        /***********************************************/
		public function kun3OpgaverImg(){
			$img = array();
			$proId = array();
			$db = new DB();
			
            // For at få projekt id'erne men kun 3
			$sql = "SELECT projekt.id FROM billeder_has_projekt INNER JOIN projekt ON projekt.id = billeder_has_projekt.idProjekt LIMIT 3";
			
			$resultProId = $db->conn->query($sql);
			
			while($getId = $resultProId->fetch_object()){
				$proId[] = $getId->id;
			}
			
            // for at få projekter frem
			$stmt = $db->conn->prepare("SELECT billeder.img, billeder.imgTekst FROM ((billeder_has_projekt INNER JOIN projekt ON projekt.id = billeder_has_projekt.idProjekt)INNER JOIN billeder ON billeder.id = billeder_has_projekt.idBilleder) WHERE projekt.id = ?");
			
			$antal = count($proId);
			for($i = 0; $i < $antal; $i++){
				$stmt->bind_param("i", $proId[$i]);
				$stmt->execute();
				$result = $stmt->get_result();
				
				while($row = $result->fetch_object()){
					$img[] = $row->img . "'" . $row->imgTekst . "'";
				}
			}
			return $img;
		}
        
        /***********************************************/
        /*       til alle andre i opgaver sidne        */
        /***********************************************/
        public function test1($tekst){
            $opgaver = array();
            $finish = array();
            $db = new DB();
            
            $projekt = new projekter();
            
            $variabel = explode(",", $tekst);
            $valg = "";
            $sprog = "";
            $gennemgang = false;
            $kunEtTal = false;
            
            // Finde ud af hvilke tal og sprog vi arbejder med
            $antal = count($variabel);
            for($i = 0; $i < $antal; $i++){
                if($variabel[$i] == "1"){
                    $valg .= "1,";
                }
                else if($variabel[$i] == "2"){
                    $valg .= "2,";
                }
                else if($variabel[$i] == "3"){
                    $valg .= "3,";
                }
                else if($variabel[$i] == "4"){
                    $valg .= "4,";
                }
                else{
                    $sprog .= $variabel[$i] . ",";
                }
            }
            $valg = rtrim($valg, ",");
            $sprog = rtrim($sprog, ",");
            $sprog = explode(",", $sprog);
            
            // Om der er flere tal i $valg
            if($valg != "1" && $valg != "2" && $valg != "3" && $valg != "4" && count($sprog) == 0){
                $array = explode(",", $valg);
                
                // Hvis array[0] er ligemed 1 eller 2
                if($array[0] == "1" || $array[0] == "2"){
                    $getProId = $projekt->getIdToAleneAndGruppe($array[0], $array[1]); 
                } 
                else{
                    $getProId = $projekt->getIdToAleneAndGruppe($array[1], $array[0]);
                }
                
                $gennemgang = true;
            }
            // hvis der kun er et tal
            else if($valg == "1" || $valg == "2" || $valg == "3" || $valg == "4"){
                $gennemgang = true;
                $kunEtTal = true;
            }
            
            // Til hvis man her tal og sprog
            $antalSprog = count($sprog);
            if($gennemgang == true){
                $gennemgang = false;
                // hvis der er flere end 0 sprog
                if($antalSprog <= 1){
                    // For at få en værdi til validering af hvilke opgaver vi har med kategori
                    $pro = $projekt->getToNavnFromProjektAndMore($sprog, true);
                    
                    
                    // Hvis $pro[0] indholder noget
                    if(!empty($pro[0])){
                        
                             if($kunEtTal == false){
                            // validering
                            $antalI = count($pro);
                            $antalJ = count($getProId);
                            for($i = 0; $i < $antalI; $i++){
                                for($j = 0; $j < $antalJ; $j++){
                                    // Tjekker om $pro og $getProId har samme værdi
                                    if($pro[$i] == $getProId[$j]){
                                        $opgaver = $getProId[$j];
                                    }
                                }
                            }
                        }
                        else{
                            $antalPro = count($pro);
                            $arrayVali = [];
                            // validering
                            $stmt1 = $db->conn->prepare("SELECT projekt.id FROM ((projekttype_has_projekt INNER JOIN projekt ON projekt.id = projekttype_has_projekt.idProjekt)INNER JOIN projekttype ON projekttype.id = projekttype_has_projekt.idProjektType) WHERE projekttype.id = ?");
                            for($i = 0; $i < $antalPro; $i++){
                                $stmt1->bind_param("i", $valg);
                                $stmt1->execute();
                                $resultVali = $stmt1->get_result();
                                
                                while($row = $resultVali->fetch_object()){
                                    $arrayVali[] = $row->id;
                                }
                            }
                            
                            $antalVali = count($arrayVali);
                            for($i = 0; $i < $antalPro; $i++){
                                for($j = 0; $j < $antalVali; $j++){
                                    if($pro[$i] == $arrayVali[$j]){
                                        
                                        $opgaver[] = $pro[$i];
                                    }
                                }
                            }
                        }
                        
                        // Hvis $antalOpgaver har en værdi
                        if(!empty($opgaver)){
                            $stmt = $db->conn->prepare("SELECT billeder.img, billeder.imgTekst FROM ((billeder_has_projekt INNER JOIN billeder ON billeder.id = billeder_has_projekt.idbilleder) INNER JOIN projekt ON projekt.id = billeder_has_projekt.idProjekt) WHERE projekt.id = ?");
                            $antalOpgaver = count($opgaver);
                            for($i = 0; $i < $antalOpgaver; $i++){
                                $stmt->bind_param("i", $opgaver[$i]);
                                $stmt->execute();
                                $resultFinish = $stmt->get_result();
                                
                                // Tjekker om $resultFinish får en værdi
                                if($resultFinish != false){
                                    while($row = $resultFinish->fetch_object()){
                                        $finish[] = $row->img. "'" . $row->imgTekst . "'";
                                    }   
                                }
                                // Hvis ikke får en værdi
                                else{
                                    $finish[0] = "Der er ingen tilgængelig match, fra det vælgte søgresultat";
                                }
                            }
                        }
                        else{
                            $finish[0] = "Der er ingen tilgængelig match, fra det vælgte søgresultat";
                        }   
                    }
                    else{
                         $finish[0] = "Der er ingen tilgængelig match, fra det vælgte søgresultat";
                    }
                    $gennemgang = true;
                }
            }
            
            // Til hvis man har kun Sprog
            if($gennemgang == false){
                // For at få en værdi til validering af hvilke opgaver vi har med kategori
                $pro = $projekt->getToNavnFromProjektAndMore($sprog, false);
                
                // Hvis $pro har en værdi
                if(!empty($pro[0])){
                    // validering
                    $antalI = count($pro);
                    $testArray = array();
                    for($i = 0; $i < $antalI; $i++){
                        if($firstStep = false){
                            $testArray[] = $pro[$i];
                            $firstStep = true;
                        }
                        else{
                            if(in_array($pro[$i], $testArray) == false){
                                $testArray[] = $pro[$i];
                            }  
                        }
                        
                    }
                    
                    // hvis $testArray har en værdi
                    if(!empty($testArray[0])){
                        $stmt1 = $db->conn->prepare("SELECT billeder.img, billeder.imgTekst FROM ((billeder_has_projekt INNER JOIN billeder ON billeder.id = billeder_has_projekt.idbilleder)INNER JOIN projekt ON projekt.id = billeder_has_projekt.idProjekt) WHERE projekt.Navn = ?");

                        $antalJ = count($testArray);
                        for($j = 0; $j < $antalJ; $j++){
                            $stmt1->bind_param("s", $testArray[$j]);
                            $stmt1->execute();
                            $resultFinish = $stmt1->get_result();

                            // Hvis $resultFinish har fået en værdi
                            if($resultFinish != false){
                                 while($row = $resultFinish->fetch_object()){
                                    $finish[] = $row->img. "'" . $row->imgTekst . "'";
                                }   
                            }
                            else{
                                $finish[0] = "Der er ingen tilgængelig match, fra det vælgte søgresultat";
                            }
                        }
                    }
                    else{
                        $finish[0] = "Der er ingen tilgængelig match, fra det vælgte søgresultat";
                    }
                }
                else{
                    
                    $finish[0] = "Der er ingen tilgængelig match, fra det vælgte søgresultat";
                }                
            }
            return $finish;
        }
		
	}
?> 