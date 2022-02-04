<?php

    header("Access-Control-Allow-Origin: http://localhost"); // elérés korlátozás -> feloldva
    header("Content-Type: application/json; charset=UTF-8"); // adat típus

    include_once '../class/Database.php';
    include_once '../class/rating.php';

    $database = New Database();
    $db = $database->getConnection(); // kacsolódás az adatbázishoz
    
    //print_r($db);
   
    $items = new Rating($db);
   

    $result = $items->read();



    if ($result->num_rows > 0){
        // van rekord
        $itemRecords = array(); // üres tömb
        $itemRecords["items"] = array();

        while ($item = $result->fetch_assoc()){
           // print_r($item);
            extract($item); // tömb -> tulajdonság
            $itemDetails = array(
                "Name" => $Name,
                "Email" => $Email,
                "Description" => $Description,
                   
            );
            array_push($itemRecords["items"],$itemDetails);
        }
        http_response_code(200); // OK
        echo json_encode($itemRecords);

    } else {
        // üres a tábla
        http_response_code(404);
        echo json_encode(array("message" => "No item found."));
    }
