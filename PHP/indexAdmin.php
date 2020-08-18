<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    include_once("./classProjekt.php");
    include_once("./classBilleder.php");
    include_once("./classKategori.php");
    include_once("./classType.php");
    include_once("./classMTTP.php");
    include_once("./classMTKP.php");
    include_once("./classMTBP.php");
    include_once("./validering.php");

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

    $vali = new validering();
    
    $array = array();
    $antal = count($uri); 

    /*************************************************/
    /*                       stien                   */
    /*************************************************/
    //finder ud af hvilken HTTP requsts man bruger
    switch($httpMethod){
        
        case 'GET': // hent værdier så kan kun ses
            if($uri[1] === "show"){
                if($antal === 3){
                    if($uri[2] === "projekter"){
                        $projekterne = new projekter();
                        $billeder = new Billeder();
                        //$AllProjekt = new Projekt();
                        
                        $resultPro = $projekterne->getAllProjekter();
                        $resultBill = $billeder->getAllBilleder();
                        
                        $antalPro = count($resultPro);
                        for($i = 0; $i < $antalPro; $i++){
                            //$result = $AllProjekt;
                        }
//                        var_dump($resultPro);
//                        exit();
                        echo json_encode($resultPro);
                    }
                    /*else if($uri[2] === "projekttype"){
                        
                    }
                    else if($uri[2] === "kategori"){
                        
                    }
                    else if($uri[2] === "billeder"){
                        
                    }*/
                    else{
                        http_response_code(404);
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
                        http_response_code(404);
                        die("Det blev ikke fundet.");
                    }
                    
                }
                else{
                    http_response_code(404);
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
                    
                    // for at få fat i værdierne
                    $navn = $_POST["Navn"];
                    $dato = $_POST["Dato"];
                    $tekst = $_POST["tekst"];
                    
                    array_push($array, $navn , $dato, $tekst);
                    
                    // Om besked tilbage
                    $result = $vali->pladsFindes($array);
                    
                    if($result == true){
                        // Om der er en værdi
                        $result = $vali->notEmpty($array);
                        if($result == true){
                            $projekterne = new projekter();
                            
                            $result = $projekterne->postProjekter($navn, $dato, $tekst);
                        }
                        else{
                            http_response_code(404);
                            die("Der var noget der ikke blev fundet");
                        }
                    }
                    else{
                        http_response_code(404);
                        die("Der var noget der ikke blev fundet.");
                    }
                }
                else if($uri[2] === "type"){
                    
                    // for at få fat i værdierne
                    $type = $_POST["Type"];
                    
                    array_push($array, $type);
                    // Om besked tilbage
                    $result = $vali->pladsFindes($array);
                    
                    if($result == true){
                        // Om der er en værdi
                        $result = $vali->notEmpty($array);
                        if($result == true){
                            $type = new ProType();
                            
                            $result = $type->postTyper($type);
                        }
                        else{
                            http_response_code(404);
                            die("Det blev ikke fundet.");
                        }
                    }
                    else{
                        http_response_code(404);
                        die("Det blev ikke fundet.");
                    }
                }
                /*else if($uri[2] === "kategori"){
                    
                }
                else if($uri[2] === "billeder"){
                    
                }*/
                else{
                    http_response_code(404);
                    die("Det blev ikke fundet.");
                }
            }
            else{
                http_response_code(404);
                die("Det blev ikke fundet.");
            }
            break;
        case 'PUT': // updater værdierne i databasen
            if($uri[1] === "update"){
                if($uri[2] === "projekt"){
                    $projekterne = new projekter();
                    
                    //$result = $projekterne->
                }
                /*else if($uri[2] === "projekttype"){
                        
                }
                else if($uri[2] === "kategori"){

                }
                else if($uri[2] === "billeder"){

                }*/
                else{
                    http_response_code(404);
                    die("Det blev ikke fundet.");
                }
            }
            else{
                http_response_code(404);
                die("Det blev ikke fundet.");
            }
            break;
        case 'DELETE':  // hvis man vil slette en værdi
            if($uri[1] === "delete"){
                if($uri[2] === "projekt"){
                    array_push($array, $id);
                    
                    // Om det er et tal
                    $result = $vali->isNumeric($array);
                    
                    if($result == true){
                        $projekterne = new projekter();
                        $mTTP = new mangeTableTP();
                        $mTBP = new mangeTableBP();
                        $mTKP = new mangeTableKP();

                        $id = $uri[3];

                        $resultMTTP = $mTTP->getMangeTableTP($id, 1);
                        $resultMTKP = $mTKP->getMangeTableKP($id, 1);
                        $resultMTBP = $mTBP->getMangeTableBP($id, 1);


                        if($resultMTTP == true){
                            $resultMTTP = $mTTP->deleteMangeTableTP($id, 1);
                        }
                        if($resultMTKP == true){
                            $resultMTKP = $mTKP->deleteMangeTableKP($id, 1);
                        }
                        if($resultMTBP == true){
                            $resultMTBP = $mTBP->deleteMangeTableBP($id, 1);
                        }

                        $result = $projekterne->delecteProjekt($id);
                    }
                    else{
                        http_response_code(404);
                        die("Det blev ikke fundet.");
                    }
                }
                else if($uri[2] === "projekttype"){
                    array_push($array, $id);
                    
                    // Om det er et tal
                    $result = $vali->isNumeric($array);
                    
                    if($result == true){
                        $type = new ProType();
                        $mTTP = new mangeTableTP();
                        
                        $id = $uri[3];
                        
                        $resultMTTP = $mTTP->getMangeTableTP($id, 0);
                        
                        if($resultMTTP == true){
                            $resultMTTP = $mTTP->deleteMangeTableTP($id, 0);
                        }
                        
                        $result = $type->deleteTyper($id);
                    }
                    else{
                        http_response_code(404);
                        die("Det blev ikke fundet.");
                    }
                }
                else if($uri[2] === "kategori"){
                    array_push($array, $id);
                    
                    // Om det er et tal
                    $result = $vali->isNumeric($array);
                    
                    if($result == true){
                        $sprog = new kateg();
                        $mTKP = new mangeTableKP();
                        
                        $id = $uri[3];
                        
                        $resultMTKP = $mTKP->getMangeTableKP($id, 0);
                        
                        if($resultMTKP == true){
                            $resultMTKP = $mTKP->deleteMangeTableKP($id, 0);
                        }
                        
                        $result = $sprog->deleteKategori($id);
                    }
                    else{
                        http_response_code(404);
                        die("Det blev ikke fundet.");
                    }
                }
                else if($uri[2] === "billeder"){
                    $id = $uri[3];
                    array_push($array, $id);
                    
                    // Om det er et tal
                    $result = $vali->isNumeric($array);
                    
                    if($result == true){
                        $img = new Billeder();
                        $mTBP = new mangeTableBP();
                        
                        $resultMTBP = $mTBP->getMangeTableBP($id, 0);
                        
                        if($resultMTBP == true){
                            $resultMTBP = $mTBP->deleteMangeTableBP($id, 0);
                        }
                        
                        $result = $img->deletebilleder($id);
                    }
                    else{
                        http_response_code(404);
                        die("Det blev ikke fundet.");
                    }
                }
                else{
                    http_response_code(404);
                    die("Det blev ikke fundet.");
                }
            }
            else{
                http_response_code(404);
                die("Det blev ikke fundet.");
            }
            break;
        default:
            http_response_code(405);
            echo '405 - bad request method!';
            break;
    }
?>