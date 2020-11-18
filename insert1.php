          <?php 

          // require_once('includes/connection.php');
            // InsertRecord();
            $con = mysqli_connect("localhost", "root", "", "emp_card");
              if(isset($_POST['add'])) {
                $FullName = $_POST['FullName'];
               $DOB = $_POST['DOB'];
               $sql = "INSERT INTO employee(FullName,DOB) VALUES('$FullName','$DOB')";
               if(!mysqli_query($con, $sql)){
                   echo'Not Inserted';
               }
               else{
                  echo'Inserted Successfully'; 
               }    

    //redirecting to the display page (index.php in our case)
    header("Location:index.php");

}
 ?>