<?php
    error_reporting(E_ALL);
	ini_set('display_errors', 1);
    
    class miniRouting{
         
        /*********************************************************************/
        /*    Mini routing til værdierne i url'en/uri'en bliver lavet om     */
        /*********************************************************************/
        public function routing($uri){
            $antal = "";
            $replace = str_replace("sharp", "#", $uri);
            $replace1 = str_replace("hjemmesideOpgaver", "hjemmeside", $replace);
            $replace2 = str_replace("c#Opgaver", "c#", $replace1);
            $replace3 = str_replace("aleneOpgaver", "alene", $replace2);
            $replace4 = str_replace("gruppeOpgaver", "gruppe", $replace3);
            $tekst = $replace4;
            
            if($tekst == "alene,hjemmeside" || $tekst == "hjemmeside,alene"){
                $tekst = "3,1";
            }
            else if($tekst == "alene,C#" || $tekst == "C#,alene"){
                $tekst = "3,2";
            }
            /*var_dump($tekst);
            exit();*/
            // Kommer hen til en private metode
            echo $this->helloder($tekst);
        }
        
        /*********************************************************************/
        /*     Grene ud til hvilke steder man skal have projekter fra        */
        /*********************************************************************/
        private function helloder($tekst){
            $hej = "hej";
            
            // switch til hvilke opgavr man har med at gøre
            switch($tekst){
                case "hjemmeside":
                    include_once("./classProjekt.php");
                    include_once("./classBilleder.php");

                    $projekt = new projekter();
                    $billede = new Billeder();

                    $resultPro = $projekt->getKunRentOpgave(1);

                    $alt = "";
                    $antal = count($resultPro);
                    for($i = 0; $i < $antal; $i++){
                        $resultBil = $billede->getKenRentImg(1);

                        $alt .= $resultBil[$i] . $resultPro[$i];
                    }
                    $tilsidst = rtrim($alt, "£");
                    echo $tilsidst;
                    //$this->getValueTooProjekt(3);
                    break;
                case "c#":
                    include_once("./classProjekt.php");
                    include_once("./classBilleder.php");

                    $projekt = new projekter();
                    $billede = new Billeder();

                    $resultPro = $projekt->getKunRentOpgave(2);

                    $alt = "";
                    $antal = count($resultPro);
                    for($i = 0; $i < $antal; $i++){
                        $resultBil = $billede->getKenRentImg(2);

                        $alt .= $resultBil[$i] . $resultPro[$i];
                    }
                    $tilsidst = rtrim($alt, "£");
                    echo $tilsidst;
                    //$this->getValueTooProjekt(3);
                    break;
                case "alene":
                    include_once("./classProjekt.php");
                    include_once("./classBilleder.php");

                    $projekt = new projekter();
                    $billede = new Billeder();

                    $resultPro = $projekt->getKunRentOpgave(3);

                    $alt = "";
                    $antal = count($resultPro);
                    for($i = 0; $i < $antal; $i++){
                        $resultBil = $billede->getKenRentImg(3);

                        $alt .= $resultBil[$i] . $resultPro[$i];
                    }
                    $tilsidst = rtrim($alt, "£");
                    echo $tilsidst;
                    //$this->getValueTooProjekt(3);
                    break;
                case "gruppe":
                    include_once("./classProjekt.php");
                    include_once("./classBilleder.php");

                    $projekt = new projekter();
                    $billede = new Billeder();

                    $resultPro = $projekt->getKunRentOpgave(4);

                    $alt = "";
                    $antal = count($resultPro);
                    for($i = 0; $i < $antal; $i++){
                        $resultBil = $billede->getKenRentImg(4);

                        $alt .= $resultBil[$i] . $resultPro[$i];
                    }
                    $tilsidst = rtrim($alt, "£");
                    echo $tilsidst;
                    break;
                case "3,1":
                    include_once("./classProjekt.php");
                    include_once("./classBilleder.php");

                    $projekt = new projekter();
                    $billede = new Billeder();

                    $tekst = explode(",", $tekst); // deler teksten op efter hver ","
                    
                    $resultPro = $projekt->getProjektFromAleneAndGruppe($tekst[0], $tekst[1]);
                    $alt = "";
                    $antal = count($resultPro);
                    for($i = 0; $i < $antal; $i++){
                        $resultBil = $billede->getImgFromAleneAndGruppe($tekst[0], $tekst[1]);

                        $alt .= $resultBil[$i] . $resultPro[$i];
                    }
                    $tilsidst = rtrim($alt, "£");
                    echo $tilsidst;
                    break;
                case "3,2":
                    include_once("./classProjekt.php");
                    include_once("./classBilleder.php");

                    $projekt = new projekter();
                    $billede = new Billeder();

                    $tekst = explode(",", $tekst); // deler teksten op efter hver ","
                    
                    $resultPro = $projekt->getProjektFromAleneAndGruppe($tekst[0], $tekst[1]);
                    $alt = "";
                    $antal = count($resultPro);
                    for($i = 0; $i < $antal; $i++){
                        $resultBil = $billede->getImgFromAleneAndGruppe($tekst[0], $tekst[1]);

                        $alt .= $resultBil[$i] . $resultPro[$i];
                    }
                    $tilsidst = rtrim($alt, "£");
                    echo $tilsidst;
                    break;
                default:
                    include_once("./classProjekt.php");
                    include_once("./classBilleder.php");

                    $projekt = new projekter();
                    $billede = new Billeder();
                    
                    $array = explode(",", $tekst);  // deler teksten op efter hver ","
                    $antal = count($array);
                    
                    $hello = "";
                    
                    // Laver nogle af navnene om til tal 
                    for($i = 0; $i < $antal; $i++){
                        if($array[$i] == "alene"){
                            $tal = array_search('alene', $array);
                            $array[$tal] = "3";
                        }
                        else if($array[$i] == "gruppe"){
                            $tal = array_search('gruppe', $array);
                            $array[$tal] = "4";
                        }
                        else if($array[$i] == "hjemmeside"){
                            $tal = array_search('hjemmeside', $array);
                            $array[$tal] = "1";
                        }
                        else if($array[$i] == "c#"){
                            $tal = array_search('c#', $array);
                            $array[$tal] = "2";
                        }
                        
                        $hello .= $array[$i] . ",";
                    }
                    $hello = rtrim($hello, ",");
                    
                    $tekst = str_replace("CCSharp", "C#", $hello);
                    
                    $resultPro = $projekt->test($tekst);
                    
                    
                    // Hvis man for et resultat fra databasen 
                    if(!in_array('Der er ingen tilgængelig match, fra det vælgte søgresultat', $resultPro)){
                        $alt = "";
                        $antal = count($resultPro);
                        for($i = 0; $i < $antal; $i++){
                            $resultBil = $billede->test1($tekst);

                            if(array_search('Der er ingen tilgængelig match, fra det vælgte søgresultat', $resultBil) == false){
                                $alt .= $resultBil[$i] . $resultPro[$i];   
                            }
                            else{
                                $tilsidst = $resultPro[0];
                            }
                        }
                        $tilsidst = rtrim($alt, "£");
                    }
                    // Hvis man ikke får et resultat fra databasen
                    else{
                        $tilsidst = $resultPro[0];
                    }
                    echo $tilsidst;
                    break;
            }
        }
        
        /***************************************/
        /*        test til mindre kode         */
        /***************************************/
        private function getValueTooProjekt($funTal){
            include_once("./classProjekt.php");
            include_once("./classBilleder.php");

            $projekt = new projekter();
            $billede = new Billeder();
            
            $resultPro = /* her */

            $alt = "";
            $antal = count($resultPro);
            for($i = 0; $i < $antal; $i++){
                $resultBil = /* her */

                $alt .= $resultBil[$i] . $resultPro[$i];
            }
            $tilsidst = rtrim($alt, "£");
            echo $tilsidst;
        }
        
    }

?>