<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/myjs.js"></script>
    <title>Rapidventure Business solutions</title>
</head>
<body class="bg-dark">
<div class="container-fluid">
    <div class="row" >
      <div class="col-12" align="center">
          <div class="card mt-5">
              <h1>Employee Informations</h1>
              <div class="col-12">
                <br>
               <div class="col-4">
            <h3>Upcoming birthdays</h3>
          
             <div class="">

      <table class ="table table-bordered table-striped datatable" border="1" align="center" cellpadding="10" cellspacing="0">
      <thead class = "thead-dark"bgcolor="#355C7D">
        <tr>
          <th data-align="center" data-sortable="true" data-field="column1">Name</th>
          <th data-align="center" data-sortable="true" data-field="column1">Birth Day</th>
        </tr>
      </thead>

      <tbody>
        <?php 
         require_once('birthdayorder.php');
        while($row=mysqli_fetch_array($fire)):
        ?>
        <tr>
          <td><?php echo $row['FullName'];?></td>
          <td> <?php echo $row['DOB'];?></td>
        </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </div>
  </div>
     </div>

            <div class="col-6">
              <!--Registration Button--> 
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Registration">Add New User </button>
            </div>
            <div class="col-12">
              <h3>Employee Records</h3>
            <div class="col-3"></div>
            <div class="col-8" align="center">
            <p id="delete-message" class="text-dark"></p>
              <div id="table"></div>
            </div>
            <div class="col-3"></div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!--Registration Modal-->
    <div class="modal" id="Registration">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="text-dark">Registration Form</h3>
          </div>
          <div class="modal-body">
          <p id="message" class="text-dark"></p>

            <form method="post" action="insert1.php">
              <input type="text" name="FullName" class="form-control my-2" placeholder="Employee Name" id="FullName">
              <input type="date" name="DOB" class="form-control my-2" placeholder="Date of birth" id="DOB">
            
         
          <div class="modal-footer">
            <input type="submit" class="btn btn-primary" name="add" value="Create new" /> 
            <button type="button" class="btn btn-danger" data-dismiss="modal" id="btn_close">Close</button>

        </form>
        </div>
        </div>
        </div>
      </div>
    </div>


      <div class="modal" id="update">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="text-dark">Update Form</h3>
          </div>
          <div class="modal-body">
          <p id="up-message" class="text-dark"></p>
            <form>
              <input type="hidden" class="form-control my-2" placeholder="Employee Name" id="Up_ID">
              <input type="text" class="form-control my-2" placeholder="User Name" id="Up_Name">
              <input type="email" class="form-control my-2" placeholder="User Email" id="Up_Dob">
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-success" id="btn_update">Update Now</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal" id="btn_close">Close</button>
          </div>
        </div>
      </div>
    </div>
    <!--Delete Modal-->
    <!--Update Modal-->
    <div class="modal" id="delete">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="text-dark">Delete Record</h3>
          </div>
          <div class="modal-body">
            <p> Do You Want to Delete the Record ?</p>
            <button type="button" class="btn btn-success" id="btn_delete_record">Delete Now</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal" id="btn_close">Close</button>
          </div>
        </div>
      </div>
    </div>
   
   
</body>
</html>