<?php
include "db.php";

if(isset($_POST['import'])){
    $filename = $_FILES["file"]["name"];
    $allwoed_ext = ['csv'];
    $checking = explode('.', $filename);
    $fileExt = end($checking);
    if(in_array($fileExt, $allwoed_ext)){
       if($_FILES['file']['size'] > 0 ){
        $filePath = $_FILES['file']['tmp_name'];
        $file = fopen($filePath, "r");
       $first_row = fgetcsv($file);
       print_r($dummy);
        // while (($getData = fgetcsv($file, 10000, ",")) !== False){
        //     $sql = "INSERT into data(year, name, email, number) values('".$getData[0]."', '".$getData[1]."', '".$getData[2]."', '".$getData[3]."')";
        //     $result = mysqli_query($conn, $sql);

        //     if(!isset($result)){
        //         echo "No result";
        //     }
        //     else{
        //         echo "imported";
        //     }
        // }
        
       }
       else{
        echo "blank file";
       }
    }
    else{
        echo "invalid file";
    }
}

?>