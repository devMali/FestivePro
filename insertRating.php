<?php
require_once ('db.php');
require_once "functions/functions.php";
// Here the user id is harcoded.
// You can integrate your authentication code here to get the logged in user id
$userId = user();

if (isset($_POST["index"], $_POST["restaurant_id"])) {
    
    $restaurantId = $_POST["restaurant_id"];
    $rating = $_POST["index"];
    
    $checkIfExistQuery = "select * from rating where username = '" . $userId . "' and pro_id = '" . $restaurantId . "'";
    if ($result = mysqli_query($conn, $checkIfExistQuery)) {
        $rowcount = mysqli_num_rows($result);
    }
    
    if ($rowcount == 0) {
        $insertQuery = "INSERT INTO rating(username,restaurant_id, rate) VALUES ('" . $userId . "','" . $restaurantId . "','" . $rating . "') ";
        $result = mysqli_query($conn, $insertQuery);
        echo "success";
    } else {
        echo "Already Voted!";
    }
}
