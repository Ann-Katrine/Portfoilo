<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    include_once("./classProjekt.php");

    // for at finde ud af hvilken medtode man bruge for at sende request'et, som det var get,post,put,delete, mm.
    $httpMethod = $_SERVER['REQUEST_METHOD'];

    // REQUEST_URI, kommer med alt der er i uri'en. Altså den kommer med alt der er i "QUERY_STRING" plus det, der er inden.
    $uri = $_SERVER['REQUEST_URI'];

    $tempUri = explode("/", $uri);  // deler "$getUri" op efter være "/", så det bliver til et array 

    $antalUri = count($tempUri);
    //går at man går igennem alle index'ene i array'et og gør dem unset(sletter) i array'et, endtil man når til "PHP" så stopper den ved at bruge break
    for($i = 0; $i < $antalUri; $i++){
        if($tempUri[$i] == "api"){
            break;
        }
         unset($tempUri[$i]);
    }

    // gemmer de nye værdier, der ikke er blevet sat til unset
    $uri = array_values($tempUri);
    
    /*************************************************/
    /*                       stien                   */
    /*************************************************/
    //finder ud af hvilken HTTP requsts man bruger
    switch($httpMethod){
        case 'GET': // hent værdier så kan kun ses
            $antal = count($uri); 
            if($uri[1] === "show"){
                if($antal === 3){
                    if($uri[2] === "projekt"){
                        $projekt = new projekter();
                        
                        //$result = $projekt->
                    }
                    /*else if($uri[2] === "projekttype"){
                        
                    }
                    else if($uri[2] === "kategori"){
                        
                    }
                    else if($uri[2] === "billeder"){
                        
                    }*/
                    else{
                        http_response_code(401);
                        die("Det blev ikke fundet.");
                    }
                }
                else if($antal > 3){
                    if($uri[2] === "projekt"){
                        
                    }
                    /*else if($uri[2] === "projekttype"){
                        
                    }
                    else if($uri[2] === "kategori"){
                        
                    }
                    else if($uri[2] === "billeder"){
                        
                    }*/
                    else{
                        http_response_code(401);
                        die("Det blev ikke fundet.");
                    }
                    
                }
                else{
                    http_response_code(401);
                    die("Det blev ikke fundet.");
                }
            }
            else{
                http_response_code(401);
                die("Det blev ikke fundet.");
            }
            break;
        case 'POST':    // create værdier til database
            if($uri[1] === "create"){
                if($uri[2] === "projekt"){
                    if(isset($_POST["Navn"]) && isset($_POST["Dato"]) && isset($_POST["tekst"])){
                        
                        // for at få fat i værdierne
                        $navn = $_POST["Navn"];
                        $dato = $_POST["Dato"];
                        $tekst = $_POST["tekst"];
                        
                        if(!empty($navn) && !empty($dato) && !empty($tekst)){
                            $projekt = new projekter();
                            
                            $result = $projekt->postProjekter($navn, $dato, $tekst);
                        }
                        else{
                            http_response_code(401);
                            die("Der var noget der ikke blev fundet");
                        }
                    }
                    else{
                        http_response_code(404);
                        die("Der var noget der ikke blev fundet.");
                    }
                }
                /*else if($uri[2] === "billeder"){
                    
                }
                else if($uri[2] === "kategori"){
                    
                }
                else if($uri[2] === "type"){
                    
                }*/
                else{
                    http_response_code(401);
                    die("Det blev ikke fundet.");
                }
            }
            else{
                http_response_code(401);
                die("Det blev ikke fundet.");
            }
            break;
        case 'PUT': // updater værdierne i databasen

            break;
        case 'DELETE':  // hvis man vil slette en værdi

            break;
    }

?>