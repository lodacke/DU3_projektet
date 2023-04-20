<?php 

ini_set("display_errors", 1);

if($_SERVER["REQUEST_METHOD"] === "POST"){
    
    $fileName = "users.json";
    $users = [];

    if(file_exists($fileName)){
        $JSONusers = file_get_contents($fileName);
        $users = json_decode($JSONusers, true);   
    } else { 
        file_put_contents($fileName, $users);
    }

    $jsonREQUEST = file_get_contents("php://input");
    $dataREQUEST = json_decode($jsonREQUEST, true);

    $username = $dataREQUEST["username"];
    $password = $dataREQUEST["password"];
    $age = $dataREQUEST["age"];
    $gender = $dataREQUEST["gender"];
    //$image = $dataREQUEST["image"];

   // for($i = 0; $i < count($users); $i++){
   //  if($username == $users[$i]["username"]){        
   //      header("Content-type: application/json");
   //      http_response_code(409);
   //      $message = "The username is already taken";
   //      json_encode($message);
   //      echo $message;
   //      exit();  
   //  }  
   //}  
             
     if(!$username == "" && $password == "" && $age == "" && $gender == "" && $image == ""){
     
        $newUser = [
          "username" => $username,
          "password" => $password,
          "age" => $age,
          "gender" => $gender,
          "image" => $image,
          ];
          array_push($users, $newUser);

        $data = json_encode($users, JSON_PRETTY_PRINT);
        file_put_contents($fileName, $data);
                  
         header("Content-type: application/json");
         http_response_code(200);
         $message = "A new user have been added!";
         json_encode($message);
         echo $message;
         exit();  


         } else {
            header("Content-type: application/json");
            http_response_code(401);
            $message = "You need to fill in all the fields before you proceed";
            json_encode($message);
            echo $message;
            exit();  
         }

};

?>