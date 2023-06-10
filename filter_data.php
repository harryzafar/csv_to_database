<?php
include "db.php";

    $year = $_POST['year'];
    $name = $_POST['name'];
    $query = "SELECT * FROM data where status = 1";
    if($_POST["year"]!=""){
        $query .= " AND year = {$year}";
       
    }
    if($_POST['name']!==""){
        $query.= " AND name = '".$name."'";
    }

    $result = mysqli_query($conn , $query);
     if(mysqli_num_rows($result)> 0){
        foreach($result as $rows){;?>
            <tr>
             
                <td>
                    <?php echo $rows['year'] ?>
                </td>
                <td>
                    <?php echo $rows['name'] ?>
                </td>
                <td>
                    <?php echo $rows['email'] ?>
                </td>
                <td>
                    <?php echo $rows['number'] ?>
                </td>
               
            </tr>
            <?php }

     }
     else{;?>
        <tr>
            <td colspan="6" class="text-center"><?php echo "No data found"; ?></td>
        </tr>
     <?php }
   
 
    

    // if(isset($year)){
    //     $query 
    // }

?>
