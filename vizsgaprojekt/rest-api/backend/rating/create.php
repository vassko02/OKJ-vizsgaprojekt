<?php
    header("Access-Control-Allow-Origin: *"); // elérés korlátozás -> feloldva
    header("Content-Type: application/json; charset=UTF-8"); // adat típus
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Allow-Headers: Content-Type, X-Requested-With, Authorization");
    header("Access-Control-Max-Age: 3600");

    include_once '../class/Database.php';
    include_once '../class/rating.php';

    $database = New Database();
    $db = $database->getConnection(); // kacsolódás az adatbázishoz

    $items = new Rating($db);

    $data = json_decode(file_get_contents("php://input")); // olvassa az elsődleges input
    if (!empty($data->Name) && !empty($data->Description)  && !empty($data->Email)){
        $items->Name = $data->Name;
        $items->Description = $data->Description;
        $items->Email = $data->Email;
      
        if ($items->create()){
            http_response_code(201);
            echo json_encode(array("message" => "Item was created."));
        } else {
            http_response_code(503);
            echo json_encode(array("message" => "Unable to create item."));
        }
    } else {
        http_response_code(400);
        echo json_encode(array("message" => "Unable to create item. Data is incomplete."));
    }

?>