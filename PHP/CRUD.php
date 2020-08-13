<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    include_once("./db.php");
    include_once("./tabel/projekt.php");

    class crud{  
        public function get(){
            
        }
        
        public function getById($id, $table, $rows){
            
        }
        
        public function post($table, $rows, $values){
            $arrayRows = "";
            $arrayValues = "";
            $db = new DB();
            
            $antalValues = count($values);
            for($i = 0; $i < $antalValues; $i++){
                $arrayRows .= $rows[$i] . ",";
                $arrayValues .= $values[$i] . ",";
            }
            $arrayRows = rtrim($arrayRows, ",");
            $arrayValues = rtrim($arrayValues, ",");
            
            $stmt = $db->conn->prepare("INSERT INTO projekt (" . $arrayRows . ") VALUES (?, ?, ?)");
            
            $stmt->bind_param("sss", /*$table, $arrayRows, $arrayRows,*/ $values[0], $values[1],$values[2]);
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
        
        public function put(){
            
        }
        
        public function delect(){
            
        }
    }

?>