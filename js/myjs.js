$(document).ready(function()
{
    Insert_record();
    view_record();
    get_record();
    update_record();
    delete_record();

})

// Insert Record in the Database
function Insert_record()
{
   $(document).on('click','#btn_register',function()
   {
        var FullName = $('#FullName').val();
        var DOB = $('#DOB').val();

        if(FullName == "" || DOB=="")
        {
            $('#message').html('Please Fill in the Blanks ');
        }
        else
        {
            $.ajax(
                {

                    url : 'insert.php',
                    method: 'post',
                    data:{FullName:FullName,DOB:DOB},
                    success: function(data)
                    {
                        $('#message').html(data);
                        $('#Registration').modal('show');
                        $('form').trigger('reset');
                        view_record();
                    }
                })
        }
        
   })

   $(document).on('click','#btn_close',function()
   {
       $('form').trigger('reset');
       $('#message').html('');
   })   
}

// Display Record
function view_record()
{
    $.ajax(
        {
            url: 'view.php',
            method: 'post',
            success: function(data)
            {
                data = $.parseJSON(data);
                if(data.status=='success')
                {
                    $('#table').html(data.html);
                }
            }
        })
}

//Get Particular Record
function get_record()
{
    $(document).on('click','#btn_edit',function()
    {
        var ID = $(this).attr('data-id');
        $.ajax(
            {
                url: 'get_data.php',
                method: 'post',
                data:{UserID:ID},
                dataType: 'JSON',
                success: function(data)
                {
                   $('#Up_ID').val(data[0]);
                   $('#Up_Name').val(data[1]);
                   $('#Up_Dob').val(data[2]);
                   $('#update').modal('show');
                   
                }
                
            })
    })
}

// Update Record 
function update_record()
{
    
    $(document).on('click','#btn_update',function()
    {
        var UpdateID = $('#Up_ID').val();
        var UpdateName = $('#Up_Name').val();
        var UpdateDob = $('#Up_Dob').val();

        if(UpdateUser=="" || UpdateEmail=="")
        {
            $('#up-message').html('please Fill in the Blanks');
            $('#update').modal('show');
        }
        else
        {
            $.ajax(
                {
                    url: 'update.php',
                    method: 'post',
                    data:{EID:UpdateID,EName:UpdateName,Edob:UpdateDob},
                    success: function(data)
                    {
                        $('#up-message').html(data);
                        $('#update').modal('show');
                        view_record();
                    }
                })
        }
        
    })
}

// Delete Function
function delete_record()
{
    $(document).on('click','#btn_delete',function()
    {
        var Delete_ID = $(this).attr('data-id1');
        $('#delete').modal('show');

        $(document).on('click','#btn_delete_record',function()
        {
            $.ajax(
                {
                    url: 'delete.php',
                    method: 'post',
                    data:{Del_ID:Delete_ID},
                    success: function(data)
                    {
                        $('#delete-message').html(data).hide(5000);
                        view_record();
                    }
                })
        })
    })
}




