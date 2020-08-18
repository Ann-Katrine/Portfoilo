<?php
    error_reporting(E_ALL);
	ini_set('display_errors', 1);
    
    include_once("./db.php");
    include_once("./tabel/billederProjekt.php");
    include_once("./CRUD.php");

    class mangeTableBP{
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
                        array_push($row, "idBilleder");
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
        public function postMangeTableBP(){
            
        }
        
        /***********************************************/
        /*              update projekter               */
        /***********************************************/
        public function updateMangeTableBP(){
            
        }
        
        /***********************************************/
        /*        delete mangetable m. projekt         */
        /***********************************************/
        public function deleteMangeTableBP($id, $tal){
            $db = new DB();
            
            $rows = $this->getRows($tal);
            
            $stmt = $db->conn->prepare("DELETE FROM billeder_has_projekt WHERE " . $rows[0] . " = ?");
            
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->affected_rows;
            
            if($result === 1){
                http_response_code(200);
                $finish = "slettet";
            }
            else{
                http_response_code(404);
                $finish = "Det bliv ikke fundet";
            }
            $stmt->close();
            $db->conn->close();
            return $finish;
        }
        
        /***********************************************/
        /*              get all projekter              */
        /***********************************************/
        public function getMangeTableBP($id, $tal){
            $db = new DB();
            
            $rows = $this->getRows($tal);
            
            $stmt = $db->conn->prepare("SELECT idBilleder, idProjekt FROM billeder_has_projekt WHERE " . $rows[0] . " = ?");
            
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result()->num_rows;
            
            
            if($result === 1){
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