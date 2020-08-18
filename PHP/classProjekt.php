<?php
	error_reporting(E_ALL);
	ini_set('display_errors', 1);

	include_once("./db.php");
    include_once("./tabel/projekt.php");
    include_once("./classMTTP.php");
    include_once("./classMTKP.php");
    include_once("./classMTBP.php");
    include_once("./CRUD.php");

	class projekter{
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
                        array_push($row, "Navn");
                        break;
                    case 2:
                        array_push($row, "dato");
                        break;
                    case 3:
                        array_push($row, "teskt");
                        break;
                }   
            }
            
            return $row;
        }
        
        /******************************************************************************************************/
        /*                                    til alminelig crud                                              */
        /******************************************************************************************************/
        
        /***********************************************/
        /*              create projekter               */
        /***********************************************/
        public function postProjekter($navn, $dato, $tekst){
            /*$crud = new crud();
            
            // for at få de rækker man skal bruge fra databasen
            $tal = "1,2,3";
            
            $row = $this->getRows($tal);
            
            $values = array($navn, $dato, $tekst);
            
            
            
             
            $result = $crud->post("projekt", $row, $values);
            */ // når jeg har fået crud til at virke
            $db = new DB();
            
            $stmt = $db->conn->prepare("INSERT INTO projekt (Navn, dato, teskt) VALUES (?, ?, ?)");
            
            $stmt->bind_param("sss", $navn, $dato, $tekst);
            $stmt->execute();
            $result = $stmt->affected_rows;
            
            if($result === 1 ){
                http_response_code(201);
                $finish = "oprettet"; 
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
        /*              update projekter               */
        /***********************************************/
        public function updateProjekt(){
            
        }
        
        /***********************************************/
        /*              delete projekter               */
        /***********************************************/
        public function delecteProjekt($id){
            $db = new DB();
            
            $stmt = $db->conn->prepare("DELETE FROM projekt WHERE id = ?");
            
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
        /*              get all projekter              */
        /***********************************************/
        public function getAllProjekter(){
            $db = new DB();
            $projekter = array();
            
            $sql = "SELECT projekt.id, projekt.Navn, projekt.dato, projekt.teskt FROM billeder_has_projekt INNER JOIN projekt ON projekt.id = billeder_has_projekt.idProjekt";
            
            $result = $db->conn->query($sql);
            
            while($row = $result->fetch_object()){
                $projekter[] = new Projekt($row->id, $row->Navn, $row->dato, $row->teskt);
            }
            $db->conn->close();
            return $projekter;
        }
        
        /******************************************************************************************************/
        /*                           til andet der kunne være udover (alm)crud                                */
        /******************************************************************************************************/
        
        /***********************************************/
        /*        kun til når der kommer med et tal    */
        /***********************************************/
        public function getKunRentOpgave($id){
			$pro = array();
			$db = new DB();
			
            // For at få fat i proejtker
			$stmt = $db->conn->prepare("SELECT projekt.Navn, projekt.dato, projekt.teskt FROM projekttype_has_projekt INNER JOIN projekt ON projekt.id = projekttype_has_projekt.idProjekt WHERE idProjektType = ?");
			
			$stmt->bind_param("i", $id);
			$stmt->execute();
			$result = $stmt->get_result();
			
            // Hvis $result har værdier
            if($result != false){
                while($row = $result->fetch_object()){
                    $pro[] = $row->Navn . "'" . $row->dato . "'" . $row->teskt . "£";
                }
            }
            else{
                $pro[0] = "Der er ingen tilgængelig match, fra det vælgte søgresultat";
            }
			
			return $pro;
		}
		
        /*****************************************************/
        /*    til at få værdier til getprojekttoalene...     */
        /*****************************************************/
		public function getIdToAleneAndGruppe($ProId, $TypeId){
			$projektID = array();
			$typeIdPro = array();
			$resultId = array();
			$db = new DB();
			
            // for at få projekts id'erne fra projekttype_has_projekt med $proid
			$stmtProId = $db->conn->prepare("SELECT idProjekt FROM projekttype_has_projekt INNER JOIN projekt ON projekt.id = projekttype_has_projekt.idProjekt WHERE idProjektType = ?");
			
			$stmtProId->bind_param("i", $ProId);
			$stmtProId->execute();
			$resultProId = $stmtProId->get_result();
			
            // Hvis $resultProId har fået en værdi
            if($resultProId != false){
                while($row = $resultProId->fetch_object()){
                    $projektID[] = $row->idProjekt;
                }
                
                // for at få projekt's id'erne fra projekttype_has_projekt med $typeid
                $stmtProType = $db->conn->prepare("SELECT idProjekt FROM projekttype_has_projekt INNER JOIN projekt ON projekt.id = projekttype_has_projekt.idProjekt WHERE idProjektType = ?");

                $stmtProType->bind_param("i", $TypeId);
                $stmtProType->execute();
                $resultProType = $stmtProType->get_result();
                
                // Hvis $resultProType har fået en værdi
                if($resultProType != false){
                    while($rows = $resultProType->fetch_object()){
                        $typeIdPro[] = $rows->idProjekt; 
                    }
                    
                    // valider 
                    // for at se om $typeIdpro og $projektid har de samme værdier
                    $antalI = count($projektID);
                    $antalJ = count($typeIdPro);
                    for($i = 0; $i < $antalI; $i++){
                        for($j = 0; $j < $antalJ; $j++){
                            if($projektID[$i] == $typeIdPro[$j]){
                                $resultId[] = $projektID[$i];
                            }
                        }
                    }
                    // der ikke kom nogle af de samme værdier
                    if($resultId == false){
                        $resultId[0] = "Der er ingen tilgængelig match, fra det vælgte søgresultat";
                    }
                }
                else{
                    $resultId[0] = "Der er ingen tilgængelig match, fra det vælgte søgresultat";
                }
                
            }
            else{
                $resultId[0] = "Der er ingen tilgængelig match, fra det vælgte søgresultat";
            }
			return $resultId;
		}
		
        /***********************************************/
        /*         når man kun har ngoet fra typer     */
        /***********************************************/
		public function getProjektFromAleneAndGruppe($ProId, $TypeId){
			$pro = array();
			$db = new DB();
			
            // for at få de værdier man skal bruge
			$getProId = $this->getIdToAleneAndGruppe($ProId, $TypeId);

            // Hvis man har fået værdier med tilbage
            if($getProId[0] != "Der er ingen tilgængelig match, fra det vælgte søgresultat"){
                // for at få projekter
                $stmt = $db->conn->prepare("SELECT Navn, dato, teskt FROM projekt WHERE id = ?");
                
                $antal = count($getProId);
                for($i = 0; $i < $antal; $i++){
                    $stmt->bind_param("i", $getProId[$i]);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    
                    // Hvis man har fået en værdi i $result 
                    if($result != false){
                        while($opgaver = $result->fetch_object()){
                            $pro[] = $opgaver->Navn . "'" . $opgaver->dato . "'" . $opgaver->teskt . "£";
                        }   
                    }
                    else{
                        $pro[0] = "Der er ingen tilgængelig match, fra det vælgte søgresultat";
                    }
                }   
            }
            else{
                $pro = $getProId;
            }
			return $pro;
		}
		
        /***********************************************/
        /*      kun til forsiden pga. skal kun have 3  */
        /***********************************************/
		public function kun3Opgaver(){
			$pro = array();
			$db = new DB();
		
            // For at få projekter
			$sql = "SELECT projekt.Navn, projekt.dato, projekt.teskt FROM billeder_has_projekt INNER JOIN projekt ON projekt.id = billeder_has_projekt.idProjekt LIMIT 3";
			
			$result = $db->conn->query($sql);
			
			while($row = $result->fetch_object()){
				$pro[] = $row->Navn . "'" . $row->dato . "'" . $row->teskt ."£";
			}
			return $pro;
		}
        
        /***********************************************/
        /*       til alle andre i opgaver sidne        */
        /***********************************************/
        public function test($tekst){
            $opgaver = array();
            $finish = array();
            $db = new DB();
            
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
            if($valg != "1" && $valg != "2" && $valg != "3" && $valg != "4"){
                if(count($sprog) == 0){
                    $array = explode(",", $valg);
                
                    // Hvis array[0] er ligemed 1 eller 2
                    if($array[0] == "1" || $array[0] == "2"){
                        $getProId = $this->getIdToAleneAndGruppe($array[0], $array[1]); 
                    } 
                    else{
                        $getProId = $this->getIdToAleneAndGruppe($array[1], $array[0]);
                    }

                    $gennemgang = true;
                }
                else{
                    if(!empty($valg)){
                        $array = explode(",", $valg);
                        
                        if($array[0] == "1" || $array[0] == "2"){
                           $getProId = $this->getIdToAleneAndGruppe($array[0], $array[1]); 
                        } 
                        else{
                           $getProId = $this->getIdToAleneAndGruppe($array[1], $array[0]);
                        }
                        $gennemgang = true;
                    }
                }
                
                
            }
            // hvis der kun er et tal
            else if($valg == "1" || $valg == "2" || $valg == "3" || $valg == "4"){
                $gennemgang = true;
                $kunEtTal = true;
            }
            
            // Til hvis man har tal og sprog
            $antalSprog = count($sprog);
            if($gennemgang == true){
                $gennemgang = false;
                // hvis der er flere end 0 sprog
                if($antalSprog <= 1){
                    // For at få en værdi til validering af hvilke opgaver vi har med kategori
                    $pro = $this->getNavnFromProjektWithKategori($sprog, true);
                    
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
                                        $opgaver[] = $getProId[$j];
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
                            $stmt = $db->conn->prepare("SELECT Navn, dato, teskt FROM projekt WHERE id = ?");

                            $antalOpgaver = count($opgaver);
                            for($i = 0; $i < $antalOpgaver; $i++){
                                $stmt->bind_param("i", $opgaver[$i]);
                                $stmt->execute();
                                $resultFinish = $stmt->get_result();
                                
                                // Tjekker om $resultFinish får en værdi
                                if($resultFinish != false){
                                    while($row = $resultFinish->fetch_object()){
                                        $finish[] = $row->Navn . "'" . $row->dato . "'" . $row->teskt . "£";
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
                         $finish[0] = "Der er ingen tilgængelig match, fra det vælgte søgresultat" ;
                    }
                    $gennemgang = true;
                }
            }
            
            // Til hvis man har kun Sprog
            if($gennemgang == false){
                // For at få en værdi til validering af hvilke opgaver vi har med kategori
                $pro = $this->getNavnFromProjektWithKategori($sprog, false);
                
                $firstStep = false;
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
                        $stmt1 = $db->conn->prepare("SELECT Navn, dato, teskt FROM projekt WHERE Navn = ?");

                        $antalJ = count($testArray);
                        
                        for($j = 0; $j < $antalJ; $j++){
                            $stmt1->bind_param("s", $testArray[$j]);
                            $stmt1->execute();
                            $resultFinish = $stmt1->get_result();

                            // Hvis $resultFinish har fået en værdi
                            if($resultFinish != false){
                                
                                 while($row = $resultFinish->fetch_object()){
                                    $finish[] = $row->Navn . "'" . $row->dato . "'" . $row->teskt . "£";
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
        
        /*******************************************************/
        /*     for at få fat i enden projekt's id eller navn   */
        /*******************************************************/
        private function getNavnFromProjektWithKategori($sprog, $afgang){
            $pro = array();
            $db = new DB();
            
            $antalSprog = count($sprog);
            
            // For at få projekter's id eller navn
            $stmt = $db->conn->prepare("SELECT projekt.id, projekt.Navn FROM ((kategori_has_projekt INNER JOIN projekt ON projekt.id = kategori_has_projekt.idProjekt)INNER JOIN kategori ON kategori.id = kategori_has_projekt.idKategori) WHERE kategori.kategori = ?");
                
            for($i = 0; $i < $antalSprog; $i++){
                $stmt->bind_param("s", $sprog[$i]);
                $stmt->execute();
                $result = $stmt ->get_result();
                
                // Hvis man har fået en værdi
                if($result != false){
                    if($afgang == true){
                        while($row = $result->fetch_object()){
                            $pro[] = $row->id;
                        }
                    }
                    else{
                        while($row = $result->fetch_object()){
                            $pro[] = $row->Navn;
                        }
                    }
                }
            }
            return $pro;
        }
        
        /*********************************************************/
        /*   for at komme hen til getNavnFromProjektWithKategori */
        /*********************************************************/
        public function getToNavnFromProjektAndMore($sprog, $afgang){
            // For at få adgang til getNavnFromProjektWithKategori
            $pro =  $this->getNavnFromProjektWithKategori($sprog, $afgang);
            return $pro; // Sender værdierne/fjelbesked tilbage 
        }
        
	}
?>