console.log("in script file");
$(document).ready(function(){
    $('.delete') . on('click',function(event){
        var message= confirm('Are u sure to delete');
        console.log(message);
        if(message)
        {
          var id = $(this).parents('td').attr('id');//get id
          console.log(id);
          $.ajax({
              //link
              url:"mechanic_delete.php",//link
              type:"post",//method type
              data:{cid:id},//parameter values
              error:function()
              {
                alert('Fail to delete');//error message
              },
              success:function(result)
              {
                 $('#tbody').html(result);
              }
          });
        }
    });
    $('.deptdelete') . on('click',function(event){
      var message= confirm('Are u sure to delete');
      console.log(message);
      if(message)
      {
        var id = $(this).parents('td').attr('id');//get id
        console.log(id);
        $.ajax({
            //link
            url:"deptDelete.php",//link
            type:"post",//method type
            data:{did:id},//parameter values
            error:function()
            {
              alert('Fail to delete');//error message
            },
            success:function(result)
            {
               $('#tbody').html(result);
            }
        });
      }
  });
  


  });
  
