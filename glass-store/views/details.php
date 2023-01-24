<?php

$glass = new Table_Handler("items");
$glass_arr = $glass->select_record_by_id($glass_id);

var_dump($glass)
?>

<html>


  <h2> <?php echo $glass_arr["product_name"]  ?> </h2>

  <img src="images/<?php echo $glass_arr["Photo"] ?>" alt="">

</html>