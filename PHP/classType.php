<?php
	include_once("./db.php");
	include_once("./tabel/type.php");
	
	class ProType{
        /***********************************************/
        /*       få fat i rækkernes navne i tablen     */
        /***********************************************/
		public function getRows($tal){
            $tallet = explode(",", $tal);
            $row = array();
            
            $antal = count($tallet);
            for($i = 0; $i < $antal; $i++){
                switch($tallet[$i]){
                    case 0:
                        array_push($row, "id");
                        break;
                    case 1:
                        array_push($row, "type");
                        break;
                }
            }
            
            return $row;
        }
        
        /******************************************************************************************************/
        /*                                    til alminelig crud                                              */
        /******************************************************************************************************/
        
        /***********************************************/
        /*                  create typer               */
        /***********************************************/
        public function postTyper($type){
            /*$crud = new crud();
            
            // for at få de rækker man skal bruge fra databasen
            $tal = "1";
            
            $row = $this->getRows($tal);
            
            $values = array($type);
            
            $result = $crud->post("projekttype", $row, $values);
            echo $result;  */
            $db = new DB();
            
            $stmt = $db->conn->prepare("INSERT INTO projekttype (type) VALUES (?)");
            
            $stmt->bind_param("s", $type);
            $stmt->execute();
            $result = $stmt->a
        }
        
        /***********************************************/
        /*              update typer                   */
        /***********************************************/
        public function updateTyper(){
            
        }
        
        /***********************************************/
        /*              delete typer                   */
        /***********************************************/
        public function deleteTyper($id){
            $db = new DB();
            
            $stmt = $db->conn->prepare("DELETE FROM projekttype WHERE id = ?");
            
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
        /*              get all typer                  */
        /***********************************************/
        public function getTyper(){
            
        }
        /******************************************************************************************************/
        /*                           til andet der kunne være udover (alm)crud                                */
        /******************************************************************************************************/
        
        /***********************************************/
        /*       for at få de to første værdier        */
        /***********************************************/
		public function getHighestType(){
			$proType = array();
			$db = new DB();
			
			$sql = "SELECT type FROM projekttype WHERE id BETWEEN 1 AND 2";
			
			$result = $db->conn->query($sql);
			
			while($row = $result->fetch_object()){
				$proType[] = $row->type . "£";
			}
            
			return $proType;
		}
		
        /***********************************************/
        /*       for at få de to sidste værdier        */
        /***********************************************/
		public function getProjektType(){
			$proType = array();
			$db = new DB();
			
			$sql = "SELECT type FROM projekttype WHERE id BETWEEN 3 AND 4";
			
			$result = $db->conn->query($sql);
			
			while($row = $result->fetch_object()){
				$proType[] = $row->type . "£";
			}
			return $proType;
		}
	}
?>