<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    class validering{
        /*************************************************/
        /*               Om pladsen findes               */
        /*************************************************/
        public function pladsFindes($values){
            $tal = 0;
            
            // for at finde ud af om alle pladser bliver brugt
            $antal = count($values); // for at finde antallet
            for($i = 0; $i < $antal; $i++){
                if(isset($values[$i])){
                    $tal++;
                }
            }
            
            // besked tilbage
            if($tal == $antal){
                return true;
            }
            else{
                return false;
            }
        }
        
        /*************************************************/
        /*              Om der er en værdi               */
        /*************************************************/
        public function notEmpty($values){
            $tal = 0;
            
            // for at finde ud af om alle har en værdi
            $antal = count($values);// for at finde antallet
            for($i = 0; $i < $antal; $i++){
                if(!empty($values[$i])){
                    $tal++;
                }
            }
            
            // besked tilbage
            if($tal == $antal){
                return true;
            }
            else{
                return false;
            }
        }
        
        /*************************************************/
        /*         Om det er numerisk(tal) værdi         */
        /*************************************************/
        public function isNumeric($values){
            $tal = 0;
            
            // for at finde ud af op alle værdierne er et tal
            $antal = count($values);
            for($i = 0; $i < $antal; $i++){
                if(is_numeric($values[$i])){
                    $tal++;
                }
            }
            
            // besked tilbage
            if($tal == $antal){
                return true;
            }
            else{
                return false;
            }
        }
        
    }
?>