<?php 
//	Create connection to  database
        $con = mysqli_connect('localhost','root','','emp_card');
        if(!$con)
        {
            die (' Please Your Connection '.mysqli_error());
        }

?>