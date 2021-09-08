<?php
ob_start();
session_start();
$error = ob_get_clean();
?>
    </div>
    <!-- /container -->


<!-- bootstrap JavaScript -->
<script src="./library/js/bootstrap.min.js"></script>
<script src="./library/js/holder.js"></script>
<script>
function comprobar(checkbox)
{
  alert("You go to check a checkbox");
  otro= checkbox.parentNode.querySelector("[type=checkbox]:not(#"+ checkbox.id+")");
  if(otro.checked)
  {
    otro.checked= false;
  }
}

$(document).ready(function()
{

  $("input.star").rating();


//This method insert return to html principal page the int numbers to show
  $('.add-btn').click(function(){
    var input_int=document.getElementById("int").value;
    if (input_int=='') {
      alert('Write a valid number on input please!');
    }
    else{
      var is=Number.isInteger(parseInt(input_int));
      if(is==true){
        window.location.href = window.location.href + "?num=" + parseInt(input_int);
      console.log('True '+input_int+' ',is);
      }
      else{
      alert('The number you try in need be an integer, rewrite it please! This is wrong: '+input_int);
      }
  }
     });


//This method close status message in cart page on app
  $('.close-status-msg').click(function(){
    <?php
    $msg='';
    ?>
    $("#status-msg").css("display", "none");
  });
});
</script>
</body>
</html>
