<?php 

    require_once('connection.php');

    // Insert Record Function
    function InsertRecord()
    {
        global $con;

        $FullName = $_POST['FullName'];
        $DOB = $_POST['DOB'];
        
        $query = " insert into employee (FullName,DOB) values('$FullName','$DOB')";
        $result= mysqli_query($con,$query);

        if($result)
        {
            echo ' Your Record Has Been Saved in the Database';
        }
        else
        {
            echo ' Please Check Your Query ';
        }
    }

    // Display Data Function
    function display_record()
    {
        global $con;
        $value = "";
        $value = '<table class="table table-bordered table-striped datatable">
                    <tr>
                        <th  > Employee ID </th>
                        <th align="center"> FullName </th>
                        <th align="center"> Age</th>
                        <th align="center"> Edit </th>
                        <th align="center"> Delete </th>
                    </tr>';
        $query = "select EmployeeID,FullName,DOB, TIMESTAMPDIFF(YEAR, DOB, CURDATE()) AS age from employee ";
        $result = mysqli_query($con,$query);
        
        while($row=mysqli_fetch_assoc($result))
        {
            $value.= ' <tr>
                            <td > '.$row['EmployeeID'].' </td>
                            <td align="center"> '.$row['FullName'].' </td>
                            <td align="center"> '.$row['age'].'</td>
                            <td align="center"> <button class="btn btn-success" id="btn_edit" data-id='.$row['EmployeeID'].'><span class="fa fa-edit"></span></button>  </td>
                            <td align="center"> <button class="btn btn-danger" id="btn_delete" data-id1='.$row['EmployeeID'].' >Delete</button> </td>
                        </tr>';
        }
        $value.='</table>';
        echo json_encode(['status'=>'success','html'=>$value]);
    }

    // Get Particular Record
    function get_record()
    {
        global $con;
        $EmployeeID = $_POST['EID'];
        $query = "select * from employee where EmloyeeID='$EmployeeID'";
        $result = mysqli_query($con,$query);

        while($row=mysqli_fetch_assoc($result))
        {
            $User_data = "";
            $User_data[0]=$row['EmployeeID'];
            $User_data[1]=$row['FullName'];
            $User_data[2]=$row['DOB'];
        }
        echo json_encode($User_data);
    }


    // Update Function
    function update_value()
    {
        global $con;
        $Update_ID = $_POST['EID'];
        $UpdateName =$_POST['EName'];
        $UpdateDob = $_POST['Edob'];

        $query = "update employee set FullName='$UpdateName', UserEmail='$UpdateDob' where EmployeeID='$Update_ID '";
        $result = mysqli_query($con,$query);
        if($result)
        {
            echo ' Your Record Has Been Updated ';
        }
        else
        {
            echo ' Please Check Your Query ';
        }
    }

    function delete_record()
    {
        global $con;
        $Del_Id = $_POST['Del_ID'];
        $query = "delete from employee where EmployeeID='$Del_Id' ";
        $result = mysqli_query($con,$query);

        if($result)
        {
            echo ' Your Record Has Been Delete ';
        }
        else
        {
            echo ' Please Check Your Query ';
        }
    }

?>





