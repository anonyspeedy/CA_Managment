<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    
    
    <title>Card Reader Chipset List</title>
    <style>
        table  td, table th{
        vertical-align:middle;
        text-align:center;
        padding-top:20px!important;
        padding-bottom: 20px!important;
        padding-left: 0px!important;
        
        }
        table{
            border-radius: 20px; /* You can adjust the value to change the border radius */
            overflow: hidden; /* Ensures that the border-radius is applied to the table */
            width: max-content;
    
        }
        #live_search{
            width: 300px; 
            height: 40px;
            margin-left: 1006px; 
            margin-bottom: 10px;
            display: flexbox;
        }
        .export{
            display: flex;
        }
    </style>
</head>
<body>



<?php 
include("../header_footer/b_header.php"); 
include("../import_export/c_export.php"); // Include the export file

?>
    <div class="container my-4">
        <header class="d-flex justify-content-between my-4">
            <h1>Board List</h1>
            <div>
                <a href="c_reciving.php" class="btn btn-primary">New Reciving Iteam</a>
            </div>
        </header>
        <div class="row">
            <form action="../import_export/c_export.php" method="post" class="export">
            
            <input type="date" class="form-control form-control-sm" placeholder="Search..." name="start_date" style="width: 200px;">

                <?php echo $start_date_error; ?>
            
            <input type="date" class="form-control form-control-sm" placeholder="Search..." name="end_date" style="width: 200px;">

                <?php echo $end_date_error; ?>
            <div class="col-md-2">
            <input type="submit" name="export" value="Export" class="btn btn-info" />
            </div>
            </form>



            <script>

                $(document).ready(function(){
                $('.input-daterange').datepicker({
                todayBtn:'linked',
                format: "yyyy-mm-dd",
                autoclose: true
                });
                });

            </script>
        
                
        <input type="text" class="form-control form-control-sm" id="live_search" autocomplete="off" placeholder="Search...">


          <div id="searchresult"></div>


          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

          <script type="text/javascript">
                $(document).ready(function(){
                  $("#live_search").keyup(function(){

                      var input = $(this).val();

                      if(input != ""){
                        $.ajax({

                            url:"c_livesearch.php",
                            method:"POST",
                            data:{input:input},

                            success:function(data){
                              $("#searchresult").html(data);
                              $(".hide").hide();
                            }
                        });
                      }else{

                        $("#searchresult").html("");
                        $(".hide").show();
                      }
                  });
                });


          </script>
         
        <?php
        if (isset($_SESSION["delete"])) {
        ?>
        <div class="alert alert-success">
            <?php 
            echo $_SESSION["delete"];
            ?>
        </div>
        <?php
        unset($_SESSION["delete"]);
        }
        ?>
        
        <table class="table table-bordered table-striped mt-4 hide">
        <thead>
            <tr>
                <th>NO</th>
                <th>Stock ID</th>
                <th>Tag NO</th>
                <th>Date</th>
                <th>Remark</th>
                
            </tr>
        </thead>
        <tbody>
       
        
        <?php
        include('../db_conn.php');
        $sqlSelect = "SELECT * FROM c_reciving";
        $result = mysqli_query($conn,$sqlSelect);
        while($data = mysqli_fetch_array($result)){
            ?>
            <tr>
                <td><?php echo $data['id']; ?></td>
                <td><?php echo $data['stock_id']; ?></td>
                <td><?php echo $data['tag_no']; ?></td>
                <td id="date"><?php echo date('d-m-Y', strtotime($data['Date'])); ?></td>
                <td><?php echo $data['Remark']; ?></td>
                
                <td>
                    
                    <a href="edit.php?id=<?php echo $data['id']; ?>" class="btn btn-warning">Edit</a>
                    <a href="delete.php?id=<?php echo $data['id']; ?>" class="btn btn-danger">Delete</a>
                </td>
            </tr>
            <?php
        }
        ?>
        </tbody>
        </table>
    </div>
</body>
</html>