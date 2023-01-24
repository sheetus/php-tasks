<?php
$glass = new Table_Handler("items");
$page_glasses = $glass->select_records($first_record)

?>
<html>
  <body>
  <table>
        <thead>
            <th>
Name
            </th>
            <th>
                Code
                </th>
                <th>
                Image
                </th>
                <th>
                Price
                </th>
                <th>
                Actions
                </th>
        </thead>
       <?php

foreach ($page_glasses as $glass) {?>
       <tr>
       <td>

            <?php

    echo $glass["product_name"]

    ?>

        </td>
        <td>
            <?php
echo $glass["PRODUCT_code"]

    ?>

        </td>
        <td>
            <?php
echo $glass["Photo"]

    ?>

        </td>
        <td>
            <?php
echo $glass["list_price"]

    ?>

        </td>

        <td>
            <?php
echo $glass["product_name"]

    ?>

        </td>
        <td>

        <a href="index.php?view=details&id=<?php echo $glass["id"]; ?>">more</a>



        </td>
       </tr>
       <?php }?>
    </table>
    <h5><a href="<?php echo $prev ?>">Prev</a>|<a href="<?php echo $next ?>">Next</a></h5>
  </body>
</html>