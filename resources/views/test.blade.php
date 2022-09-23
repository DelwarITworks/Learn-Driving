<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - Show Div accordingly radio button yes/no</title>
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css"> -->
<!-- <link rel="stylesheet" href="./style.css"> -->
<style> 

.someData{
            display:none;
        }
        .activeTab{
            display:block;
        }
        </style>

</head>
<body>

        <label>
            <input type="radio" value="" name="anything" class="radioCls" id="bank" checked>Yes
        </label>
        <br>
        <label>
            <input type="radio" value="" name="anything" class="radioCls" id="card">No
        </label>
<div class="someData" id="first">
q
</div>
<div class="someData " id="second">
w
</div>

<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.1/jquery.min.js'></script>
  <script>
  $(document).ready(function(){
    //after load will check the checkbox is checked or not
    var check = $("#bank").prop("checked");
    if(check){
        $("#first").addClass("activeTab");
    }
    
    //click on yes
    $("#bank").on("click", function(){
        check = $(this).prop("checked");
        $("#second").removeClass("activeTab");
        $("#first").addClass("activeTab");
        
    })
    //click on No
    $("#card").on("click", function(){
        check = $(this).prop("checked");
        $("#first").removeClass("activeTab");
        $("#second").addClass("activeTab");
        console.log(check);
    })
});
</script>
</body>
</html>
