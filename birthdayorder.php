<?php
	$con=mysqli_connect('localhost','root','','emp_card');
	

	$query = "SELECT * FROM  employee  WHERE  DATE_ADD(DOB, 
                INTERVAL YEAR(CURDATE())-YEAR(DOB)
                         + IF(DAYOFYEAR(CURDATE()) > DAYOFYEAR(DOB),1,0)
                YEAR) 
            BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 30 DAY) ORDER BY DOB DESC LIMIT 3";
	$fire=mysqli_query($con,$query);
?>
