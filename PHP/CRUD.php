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
            $db = new DB();
            
           // $stmt = $
            
        }
        
        /**********************************************************************/
        /*      for at se de forskellige ting i databasen med bestem id       */
        /**********************************************************************/
        public function getById($id, $table, $rows){
            
        }
        
        /***********************************************/
        /*      for at oprette ting til databasen      */
        /***********************************************/
        public function post($table, $rows, $values){
            $arrayRows = "";
            $db = new DB();
            
            $arrayRows = $this->putInOrder($rows);
            
            $stmt = $db->conn->prepare("INSERT INTO projekt (" . $arrayRows . ") VALUES (?, ?, ?)");
            
            $stmt->bind_param("sss", /* $table, $arrayRows, $arrayRows, */ $values[0], $values[1],$values[2]);
            $stmt->execute();
            $stmt->get_result();
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
        }
        
        /***********************************************/
        /*      for at kunne rediger i databasen       */
        /***********************************************/
        public function put(){
            
        }
        
        /***********************************************/
        /*      for at kunne slette i databasen        */
        /***********************************************/
        public function delect(){
            
        }
        
        private function putInOrder($order){
            $arrayOrder = "";
            
            $antalOrder = count($order);
            for($i = 0; $i < $antalOrder; $i++){
                $arrayOrder .= $order[$i] . ",";
            }
            $arrayOrder = rtrim($arrayOrder, ",");
            
            return $arrayOrder;
        }
    }

?>