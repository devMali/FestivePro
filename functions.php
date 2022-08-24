<?php

function userRating($userId, $pro_id, $conn)
{
    $average = 0;
    $avgQuery = "SELECT rate FROM rating WHERE username = '" . $userId . "' and pro_id = '" . $pro_id . "'";
    $total_row = 0;
    
    if ($result = mysqli_query($conn, $avgQuery)) {
        // Return the number of rows in result set
        $total_row = mysqli_num_rows($result);
    } // endIf
    
    if ($total_row > 0) {
        foreach ($result as $row) {
            $average = round($row["rate"]);
        } // endForeach
    } // endIf
    return $average;
}
 // endFunction
function totalRating($pro_id, $conn)
{
    $totalVotesQuery = "SELECT * FROM rate WHERE pro_id = '" . $pro_id . "'";
    
    if ($result = mysqli_query($conn, $totalVotesQuery)) {
        // Return the number of rows in result set
        $rowCount = mysqli_num_rows($result);
        // Free result set
        mysqli_free_result($result);
    } // endIf
    
    //return $rowCount;
}//endFunction
