<?php
include "db.php"; 
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blackoffer</title>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
</head>

<body>
    <h2 class="text-center mt-4">Import Csv file to store into database</h2>
    <div class="d-flex justify-content-center my-4">
        <form action="import.php" name="importform" method="post" enctype="multipart/form-data">
            <input type="file" class="border" name="file">
            <button type="submit" class="btn btn-success" name="import">Import</button>
        </form>
    </div>
    <div class="container">
        <table class="table">
            <th>Year<select name="year" value="" id="year" class="common_selector">
                    <option value="">Select Year</option>
                    <?php 
                $sql = "SELECT DISTINCT year FROM data";
                $query = mysqli_query($conn , $sql);
                foreach($query as $year){;?>
                    <option  value="<?php echo $year['year'] ;?>">
                        <?php echo $year['year'] ;?>
                    </option>
                    <?php
                }
                 ?>
                </select></th>
            <th>Name<select name="name" id="name" class="common_selector">
                    <option value="">Select Name</option>
                    <?php 
                $sql = "SELECT DISTINCT name FROM data";
                $query = mysqli_query($conn , $sql);
                foreach($query as $name){;?>
                    <option  value="<?php echo $name['name'] ;?>">
                        <?php echo $name['name'] ;?>
                    </option>
                    <?php
                }
                 ?>


                </select></th>

        </table>
    </div>

    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th>Years</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Number</th>
                </tr>
            </thead>
            <tbody id="tableData">
           

            </tbody>
        </table>
        <div id="ajaxData"></div>
    </div>
    <script>
        $(document).ready(function () {
            filter_data();

            function filter_data() {
               var year =  get_filter("year");
               var name = get_filter("name");
                $.ajax({
                    url: "filter_data.php",
                    method: "POST",
                    data: { year: year, name: name },
                    success: function (res) {
                        $('#tableData').html(res);
                                            
                    }

                })
            }


            function get_filter(filter_id) {
               var filter_value = $('#'+filter_id+'').find(":selected").val();    
                return filter_value;
            }

            $('.common_selector').on("change", function () {
                filter_data();
            });

        })
    </script>
</body>

</html>