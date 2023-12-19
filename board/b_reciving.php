<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Add Reciving Card Reader</title>

    <style>
    .checkbox-container {
      display: flex;
      flex-wrap: wrap;
    }
    .form-check {
      margin-right: 50px; /* Adjust as needed for spacing */
    }
  </style>


</head>
<body>
<?php include("../header_footer/header.php"); ?>
<div class="container my-5">
    <header class="d-flex justify-content-between my-4">
    <?php
        session_start();
        if (isset($_SESSION["create"])) {
        ?>
        <div class="alert alert-success">
            <?php 
            echo $_SESSION["create"];
            ?>
        </div>
        <?php
        unset($_SESSION["create"]);
        }
        ?>
            <h1>Add Reciving Card Reader</h1>
            <div>
            <a href="b_display.php" class="btn btn-primary">Back</a>
            </div>
        </header>
        
        <form action="b_add.php" name="Add" method="post">
            <div class="form-elemnt my-4">
                <lable> Stock ID</lable>
                <select name="stock_id" class="form-control">

                    <option value="128">Board: 128</option>
                    
                </select>
            </div>
            <div class="form-elemnt my-4">
                <lable> Tag Number</lable>
                <input type="text" class="form-control" name="tag_no" placeholder="Tag Number:">
            </div>
            
            <div class="form-elemnt my-4">
                <lable> Borad Serial Number</lable>
                <input type="text" class="form-control" name="board_serial" placeholder="Board Serial Number:">
            </div>


            <div class="form-elemnt my-4">
                <lable> Date</lable>
                <input type="date" class="form-control" name="Date" placeholder="Date:">
            </div>

            <div class="form-element my-4">
                    <label>Remark</label>
                    <textarea name="Remark" class="form-control" placeholder="Card Reader Description:"></textarea>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="radio" name="status" id="radioMaintainable" value="maintainable">
                <label class="form-check-label" for="radioMaintainable">
                    Maintainable
                </label>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="radio" name="status" id="radioDamage" value="damage" checked>
                <label class="form-check-label" for="radioDamage">
                    Damage
                </label>
            </div>

            <div class="form-element my-4">
                <input type="submit" name="Add" value="ADD" class="btn btn-primary">
            </div>

            <mark>
                    <?php if (isset($_GET['error'])){
                        echo $_GET['error'];
                    } ?>
                </mark>
                <?php
                        // Check for error message
                        if (isset($_GET['error'])) {
                            echo '<p style="color: red;">' . $_GET['error'] . '</p>';
                        }

                        // Check for success message
                        if (isset($_GET['success'])) {
                            echo '<p style="color: green;">' . $_GET['success'] . '</p>';
                        }
                        ?>
        </form>
        
        
    </div>
</body>
</html>