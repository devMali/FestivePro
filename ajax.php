<?php
    include 'include/connection.php';

    if (isset($_POST['city_id'])) {
	 
 
        //$query = "SELECT * FROM area where city_id=".$_POST['city_id'];
        //$result = $db->query($query);
        $q =mysqli_query($con,"SELECT * FROM area where city_id=".$_POST['city_id']);
        if (mysqli_num_rows($q) > 0 ) {
                //echo '<option value="" selected>Select Area</option>';
                while($row=mysqli_fetch_array($q))
                {
                ?>
                <option value="<?php echo $row['area_id']; ?>"><?php echo $row["area_name"] ?></option>
                <?php
                }
        }else{
    
            echo '<option>No area Found!</option>';
        } 
      /*   $q =mysqli_query($con,"SELECT * FROM area where city_id=".$_POST['city_id']);
        while($row=mysqli_fetch_array($q))
			{
			?>
			<option value="<?php echo $row['area_id']; ?>"><?php echo $row["area_name"] ?></option>
			<?php
			} */
    
    }
    
?>