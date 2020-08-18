<?php
    error_reporting(E_ALL);
	ini_set('display_errors', 1);
    
    include_once("./db.php");
    include_once("./tabel/kategoriProjekt.php");
    include_once("./CRUD.php");

    class mangeTableKP{
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
                        array_push($row, "idKategori");
                        break;
                    case 1:
                        array_push($row, "idProjekt");
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
        public function postMangeTableKP(){
            
        }
        
        /***********************************************/
        /*              update projekter               */
        /***********************************************/
        public function updateMangeTableKP(){
            
        }
        
        /***********************************************/
        /*              delete projekter               */
        /***********************************************/
        public function deleteMangeTableKP($id, $tal){
            $db = new DB();
            
            $rows = $this->getRows($tal);
            
            $stmt = $db->conn->prepare("DELETE FROM kategori_has_projekt WHERE " . $rows[0] . " = ?");
            
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->affected_rows;
            
            if($result === 1){
                http_response_code(200);
                $finish = "slettet";
            }
            else{
                http_response_code(404);
                $finish = "det bliv ikke fundet";
            }
            $stmt->close();
            $db->conn->close();
            
            return $finish;
        }
        
        /***********************************************/
        /*              get all projekter              */
        /***********************************************/
        public function getMangeTableKP($id, $tal){
            $db = new DB();
            
            $rows = $this->getRows($tal);
            
            $stmt = $db->conn->prepare("SELECT idKategori, idProjekt FROM kategori_has_projekt WHERE " . $rows[0] . " = ?");
            
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();
            
            if($result != false){
                http_response_code(200);
                $finish = true;
            }
            else{
                http_response_code(404);
                $finish = false;
            }
            $stmt->close();
            $db->conn->close();
            
            return $finish;
        }
    }
?>