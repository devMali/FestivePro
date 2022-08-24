<?php
require_once "db.php";
require_once "functions.php";
require_once "functions/functions.php";
// Here the user id is harcoded.
// You can integrate your authentication code here to get the logged in user id
$userId = user();
$pro_id=$_GET['pro_id'];
$query = "SELECT * FROM product where pro_id=$pro_id";
$result = mysqli_query($conn, $query);

$outputString = '';

foreach ($result as $row) {
    $userRating = userRating($userId, $row['pro_id'], $conn);
    $totalRating = totalRating($row['pro_id'], $conn);
    $outputString .= '
        <div class="row-item">
 <div class="row-title">' . $row['pro_name'] . '</div> <div class="response" id="response-' . $row['pro_id'] . '"></div>
 <ul class="list-inline"  onMouseLeave="mouseOutRating(' . $row['pro_id'] . ',' . $userRating . ');"> ';
    
    for ($count = 1; $count <= 5; $count ++) {
        $starRatingId = $row['pro_id'] . '_' . $count;
        
        if ($count <= $userRating) {
            
            $outputString .= '<li value="' . $count . '" pro_id="' . $starRatingId . '" class="star selected">&#9733;</li>';
        } else {
            $outputString .= '<li value="' . $count . '"  pro_id="' . $starRatingId . '" class="star" onclick="addRating(' . $row['pro_id'] . ',' . $count . ');" onMouseOver="mouseOverRating(' . $row['pro_id'] . ',' . $count . ');">&#9733;</li>';
        }
    } // endFor
    
    $outputString .= '
 </ul>
 
 <p class="review-note">Total Reviews: ' . $totalRating . '</p>

</div>
 ';
}
echo $outputString;
?>