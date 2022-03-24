$(document).ready(function(){
     alert(";;;;;"); 
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
              data:{mid:id},//parameter values
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