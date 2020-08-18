<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    include_once("./db.php");
    include_once("./tabel/projekt.php");

    class crud{  
        /****************************************************/
        /*     for at se de forskellige ting i databasen    */
        /****************************************************/
        public function get($table, $rows){
            $array = array();
            $db = new DB();
            
            $row = $this->putInOrder($rows);
            
            $stmt = $db->conn->prepare("SELECT " . $row . " FROM " . $table);
            $stmt->execute();
            $result = $stmt->get_result();
            
            if($result != false){
                 while($linje = $result->fetch_object()){
                    /*$antal = count($result;)
                    for($i = 0; $i < $antal; $i++){
                        $array[] = $row[$i];
                    }*/
                    $array[] = new projekter($linje->Id, $linje->type);
                }
                http_response_code(200);
            }
            else{
                http_response_code(404);
                die("Det blev ikke fundet");
            }
           
            $stmt->close();
            $db->conn->close();
            
            return $array;
        } // har lavet på
        
        /***********************************************/
        /*     for at vise bestemme ting i databsen    */
        /***********************************************/
        public function getById($table, $rows, $id){
            
        }
        
        /***********************************************/
        /*      for at oprette ting til databasen      */
        /***********************************************/
        public function post($table, $rows, $values){
            $db = new DB();
            
            $arrayRows = $this->putInOrder($rows);
            //$arrayValues = $this->putInOrder($values);
            
            $stmt = $db->conn->prepare("INSERT INTO" . $table .  " (" . $arrayRows . ") VALUES (?, ?, ?)");
            
            $stmt->bind_param("sss", $values[0], $values[1],$values[2]);
            $stmt->execute();
            //$stmt->get_result();
            $result = $stmt->affected_rows;
            
            if($result === 1 ){
                http_response_code(201);
                $finish = "oprettet"; 
                echo $finish;
            }
            else{
                http_response_code(404);
                die("Det bliv ikke oprettet");
            }
            $stmt->close();
            $db->conn->close();
        } // har lavet på
        
        /***********************************************/
        /*      for at kunne rediger i databasen       */
        /***********************************************/
        public function put(){
            
        }
        
        /***********************************************/
        /*      for at kunne slette i databasen        */
        /***********************************************/
        public function delect($table, $rows, $id){
            $db = new DB();
            
            $row = $this->putInOrder($rows);
            
            $stmt = $db->conn->prepare("DELETE FROM " . $table . " WHERE " . $row . " = " . $id);
            $stmt->execute();
            $result = $stmt->affected_rows;
            
            if($result === 1){
                http_response_code(200);
                $finish = "slettet";
            }
            else{
                http_response_code(404);
                die("Det blev ikke slettet");
            }
            $stmt->close();
            $db->conn->close();
        } // har lavet på
        
        /***********************************************/
        /*      for at kunne slette i databasen        */
        /***********************************************/
        private function putInOrder($order){
            $arrayOrder = "";
            
            $antalOrder = count($order);
            for($i = 0; $i < $antalOrder; $i++){
                $arrayOrder .= $order[$i] . ",";
            }
            $arrayOrder = rtrim($arrayOrder, ",");
            
            return $arrayOrder;
        } // har lavet på
    }

?>