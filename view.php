<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Book Details</title>
    <style>
       
        .book-details{
            background-color:#f5f5f5;
        }
        .checkbox-container {
            display: flex;
            flex-wrap: wrap;
        }
    </style>
</head>
<body>
    <div class="container my-4">
        <header class="d-flex justify-content-between my-4">
            <h1>Reciving Card Reader Details</h1>
            <div>
                <a href="index.php" class="btn btn-primary">Back</a>
            </div>
        </header>
        <div class="book-details p-5 my-4">
            <?php
            include("db_conn.php");
            $id = $_GET['id'];
            if ($id) {
                // Using prepared statements to prevent SQL injection
                $sql = "SELECT * FROM reciving WHERE id = ?";
                $stmt = mysqli_prepare($conn, $sql);
                mysqli_stmt_bind_param($stmt, "i", $id);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);

                while ($row = mysqli_fetch_array($result)) {
                    ?>
                 <div class="container">   
                    <label>Shutter:</label>
                    <p><?php echo $row["Shutter"]; ?></p>
                    <h3>Chipset:</h3>
                    <p><?php echo $row["Chipset"]; ?></p>
                    <h3>Roller:</h3>
                    <p><?php echo $row["Roller"]; ?></p>
                    <h3>Track:</h3>
                    <p><?php echo $row["Track"]; ?></p>
                    <h3>Prehead:</h3>
                    <p><?php echo $row["Prehead"]; ?></p>
                    <h3>Motor:</h3>
                    <p><?php echo $row["Motor"]; ?></p>
                    <h3>Cover:</h3>
                    <p><?php echo $row["plastic_cover"]; ?></p>
                    <h3>Board Serial Number:</h3>
                    <p><?php echo $row["board_serial"]; ?></p>
                    
                 </div> 
                    <?php
                }

                // Close the statement
                mysqli_stmt_close($stmt);
            } else {
                echo "<h3>No Card Reader found</h3>";
            }
            ?>
        </div>
    </div>
</body>
</html>
