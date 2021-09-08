<?php
$array=[];
$nums_array='';
if (isset($_GET['num'])) {
  if (str_contains($_GET['num'], '?num=')) {

      $array=explode('?num=',$_GET['num']);
  }
   else{
     $array[]=$_GET['num'];
   }
}
?>
<div class="panel bg-info">
  <div class="panel-header bg-info">
    <h1 class="text-dark text-center">Sum of int array</h1>
  </div>
  <div class="panel-body bg-info">
      <label for="int">Add int to array</label>
      <input type="number" name="int" pattern='[0-9]' min='1' id="int" value="">
      <button type="submit" name="add" class="btn btn-primary add-btn">Add</button>
  </div>
  <div class="panel-footer bg-info">
    <p class="font-weigth-bold">
      <?php
    if(count($array)>0){
    echo 'Your numbers are here separate by ","
    </p>
    <strong>';
      $count=count($array);
      for ($i=0; $i < $count ; $i++) {
        if ($i==$count-1) {
          $nums_array.=$array[$i];
        }
        else{
          $nums_array.=$array[$i].',';
        }

        echo $array[$i].', ';
      }
      echo "
      <form action='".BASE_URL."/calculate-sum' method='post'>
         <input type='hidden' name='nums-array' value='".$nums_array."'>
         <button type='submit' name='sum' class='btn btn-primary'>Sum</button>
     </form>

  </strong>";
   }
     if (isset($_SESSION['sum'])) {
       echo '<div class="alert alert-success">
         <strong>Calculate Result is:</strong> '.$_SESSION['sum'].'</div>';
     }

       ?>

  </div>

</div>
