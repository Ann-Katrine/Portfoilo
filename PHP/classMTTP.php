<?php
    error_reporting(E_ALL);
	ini_set('display_errors', 1);
    
    include_once("./db.php");
    include_once("./tabel/typeProjekt.php");
    include_once("./CRUD.php");

    class mangeTableTP{
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
                        array_push($row, "idProjektType");
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
        public function postMangeTableTP(){
            
        }
        
        /***********************************************/
        /*              update projekter               */
        /***********************************************/
        public function updateMangeTableTP(){
            
        }
        
        /***********************************************/
        /*              delete projekter               */
        /***********************************************/
        public function deleteMangeTableTP($id, $tal){
            $db = new DB();
            
            $rows = $this->getRows($tal);
            
            $stmt = $db->conn->prepare("DELETE FROM projekttype_has_projekt WHERE " . $row[0] . " = ?");
            
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
        public function getMangeTableTP($id, $tal){
            $db = new DB();
            
            $rows = $this->getRows($tal);
            
            $stmt = $db->conn->prepare("SELECT idProjektType, idProjekt FROM projekttype_has_projekt WHERE " . $rows[0] . " = ?");
            
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