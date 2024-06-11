
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <style>
        table{
            margin-top : 25px;
        }
    </style>
  </head>
  <body>
    <table id="main" border="0" cellspacing="0">
      <tr>
        <td id="header">
          <h1>Add Records with PHP & AJAX</h1>
        </td>
      </tr>
      <tr>
        <td id="table-load" class="m-5">
         <form id="addform">     
            First Name : <input type="text"  id="fname">&nbsp;&nbsp;&nbsp;&nbsp;
            Last Name : <input type="text"  id="lname">&nbsp;&nbsp;
          <input type="submit" id="save-button" value="Save" />
          </form>
        </td>
      </tr>
      <tr>
        <td id="table-data">
        </td>
      </tr>
    </table>
        

    <script type="text/javascript">
            $(document).ready(function(){
               function loadtable(){
                    $.ajax({
                    url: "load.php",
                    type: "POST",
                    success: function (data) {
                    $("#table-data").html(data);
                    },
                })
               }
               loadtable();


               $('#save-button').on("click", function(event){
                event.preventDefault();

                var fname  = $("#fname").val();
                var lname  = $("#lname").val();
              

                $.ajax({
                    url  : "Ajaxinsert.php",
                    type : "POST",
                    data : {firstname:fname, lastname:lname},
                    success : function(data){
                        if(data == 1){
                            loadtable();
                            $("#addform").trigger("reset")
                        }else{
                            alert("Can't Save Records")
                        }    
                    }
                })
               })


            })
    </script>
  </body>
</html>
