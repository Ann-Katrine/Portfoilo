<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

	include_once("./db.php");
	include_once("./tabel/kategori.php");
	include_once("./tabel/kategoriProjekt.php");

	class kateg{
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
                        array_push($row, "kategori");
                        break;
                }   
            }
            
            return $row;
        }
        
        /******************************************************************************************************/
        /*                                    til alminelig crud                                              */
        /******************************************************************************************************/
        
        /***********************************************/
        /*              create kategori                */
        /***********************************************/
        public function postKategori($sprog){
            $db = new DB();
            
            $stmt =  $db->conn->prepare("INSERT INTO kategori (kategori) VALUES (?)");
            
            $stmt->bind_param("s", $sprog);
            $stmt->execute();
            $result = $stmt->affected_rows;
            
            if($result === 1){
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
        /*              update kategori                */
        /***********************************************/
        public function updateKategori(){
            
        }
        
        /***********************************************/
        /*              delete kategori                */
        /***********************************************/
        public function deleteKategori($id){
            $db = new DB();
            
            $stmt = $db->conn->prepare("DELETE FROM kategori WHERE id = ?");
            
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
        /*              get all kategori               */
        /***********************************************/
        public function getKategori(){
            $db = new DB();
            $kategorier = array();
            
            $stmt = $db->conn->prepare("SELECT id, kategori FROM kategori");
            
            $stmt->execute();
            $result = $stmt->get_result();
            
            if($result != false){
                http_response_code(200);
                while($row = $result->fetch_object()){
                    $kategorier[] = new Kategori($row->id, $row->kategori); 
                }
            }
            else{
                http_response_code(404);
                die("Det bliv ikke fundet");
            }
            $stmt->close();
            $db->conn->close();
            return $kategorier;
        }
        
        /******************************************************************************************************/
        /*                           til andet der kunne være udover (alm)crud                                */
        /******************************************************************************************************/
        
		public function getKateori(){
			$kate = array();
			$db = new DB();
			
			$sql = "SELECT kategori FROM kategori";
			
			$result = $db->conn->query($sql);
			
			while($row = $result->fetch_object()){
				$kate[] = $row->kategori . "£";
			}
			return $kate;
		}
	}
?>