<!-- edit.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Edit Reciving Card Reader</title>

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
    <?php include("header_footer/header.php"); ?>
    
             <?php
                    if (isset($_SESSION["update"])) {
                        ?>
                        <div class="alert alert-success">
                            <?php
                            echo $_SESSION["update"];
                            ?>
                        </div>
                        <?php
                        unset($_SESSION["update"]);
                    }
                ?>


    
    <div class="container my-5">
        <header class="d-flex justify-content-between my-4">
            <h1>Edit Reciving Card Reader</h1>
            <div>
                <a href="display.php" class="btn btn-primary">Back</a>
            </div>
        </header>

        <?php
        

        if (isset($_GET['id'])) {
            include "db_conn.php";
            $id = $_GET['id'];
            $sql = "SELECT * FROM reciving WHERE id=$id";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                $data = mysqli_fetch_assoc($result);

                
                ?>

                <?php
                        if (isset($_SESSION["update"])) {
                        ?>
                        <div class="alert alert-success">
                            <?php 
                            echo $_SESSION["update"];
                            ?>
                        </div>
                        <?php
                        unset($_SESSION["update"]);
                        }
                        ?>
                <form action="php/create.php" method="post">
                    <!-- Your existing form fields -->
                    <div class="form-element my-4">
                        <label>Stock ID</label>
                        <select name="stock_id" class="form-control">
                            
                            <option value="" >Select Stock ID:</option>
                            <option value="37" <?php if ($data['stock_id'] == 37) echo 'selected'; ?>>Card Reader: 37</option>
                            <option value="34" <?php if ($data['stock_id'] == 34) echo 'selected'; ?>>Chipset: 34</option>
                            <option value="128"<?php if ($data['stock_id'] == 128) echo 'selected'; ?>>Board: 128</option>
                            <option value="420"<?php if ($data['stock_id'] == 428) echo 'selected'; ?>>Shutter: 420</option>
                            <!-- Add other options based on your needs -->
                        </select>
                    </div>

                    <div class="form-elemnt my-4">
                        <label>Tag Number</label>
                        <input type="text" class="form-control" name="tag_no" placeholder="Tag Number:" value="<?php echo $data['tag_no']; ?>">
                    </div>
                    <input type="hidden" class="form-control" name="id" value="<?php echo $data['id']; ?>">
                   
                    <div class="form-elemnt my-4">
                        <label>Serial Number</label>
                        <input type="text" class="form-control" name="serial_no" placeholder="Serial Number:" value="<?php echo $data['serial_no']; ?>">
                    </div>
                <div class="checkbox-container">  
                    <div class="form-check">
                        <input class="form-check-input myCheckbox" type="checkbox" name="Shutter" <?php echo ($data['Shutter'] == 'Yes') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="shutter">
                            Shutter
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input myCheckbox" type="checkbox" name="Chipset" <?php echo ($data['Chipset'] == 'Yes') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="chipset">
                            Chipset
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input myCheckbox" type="checkbox" name="Roller" <?php echo ($data['Roller'] == 'Yes') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="roller">
                            Roller
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input myCheckbox" type="checkbox" name="Track" <?php echo ($data['Track'] == 'Yes') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="track">
                            Track
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input myCheckbox" type="checkbox" name="Prehead" <?php echo ($data['Prehead'] == 'Yes') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="prehead">
                            Prehead
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input myCheckbox" type="checkbox" name="Motor" <?php echo ($data['Motor'] == 'Yes') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="motor">
                            Motor
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input myCheckbox" type="checkbox" name="plastic_cover" <?php echo ($data['plastic_cover'] == 'Yes') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="plastic_cover">
                            Plastic Cover
                        </label>
                    </div>

                    <button type="button" class="btn btn-primary mt-3" onclick="selectAll()">Select All</button>
                    <button type="button" class="btn btn-secondary mt-3" onclick="deselectAll()">Deselect All</button>

                    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
                    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
                    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

                    <script>
                        function selectAll() {
                            var checkboxes = document.querySelectorAll('.myCheckbox');
                            checkboxes.forEach(function(checkbox) {
                                checkbox.checked = true;
                            });
                        }

                        function deselectAll() {
                            var checkboxes = document.querySelectorAll('.myCheckbox');
                            checkboxes.forEach(function(checkbox) {
                                checkbox.checked = false;
                            });
                        }
                    </script>
                </div>

                    <div class="form-elemnt my-4">
                        <label>Board Serial</label>
                        <input type="text" class="form-control" name="board_serial" placeholder="Serial Number:" value="<?php echo $data['board_serial']; ?>">
                    </div>

                    <div class="form-elemnt my-4">
                        <label>Remark</label>
                        <input type="text" class="form-control" name="Remark" placeholder="Remark:" value="<?php echo $data['Remark']; ?>">
                    </div>

                    <div class="form-elemnt my-4">
                        <label>Date</label>
                        <input type="text" class="form-control" name="Date" " value="<?php echo $data['Date']; ?>">
                    </div> 

                    <div class="form-element my-4">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="update" value="Update" class="btn btn-primary">
                    </div>
                    
                </form>
                <?php
            } else {
                echo "Error fetching data: " . mysqli_error($conn);
            }
        } else {
            echo "Invalid request!";
        }

      
        ?>
    </div>
</body>
</html>
