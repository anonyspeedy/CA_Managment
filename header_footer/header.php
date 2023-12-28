<!-- header.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8sh+Wy5q+V0TR5Oq7Jq5Lq2rwX6K+xWn2I1S" crossorigin="anonymous">
    <title>Your Website Title</title>
    <style>
        body {padding-top: 56px;}

            .navbar {
            overflow: hidden;
            background-color: #333;
            position: fixed;
            top: 0;
            width: 100%;
            }

            .navbar a {
            float: left;
            display: block;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 17px;
            }

            .navbar a:hover {
            background: #ddd;
            color: black;
            }

            
    </style>
</head>
<body>

    <div class="navbar">
    
      <a href="../CA_Managment/index.php">Home</a>

      <div class="dropdown">
            <a class="dropdown-toggle" href="#" role="button" id="navbarDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Add
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="../CA_Managment/Add.php">Add Card Reader</a>
                <a class="dropdown-item" href="#">Add Board</a>
                <a class="dropdown-item" href="#">Add Shutter</a>
                <a class="dropdown-item" href="#">Add Chipset</a>
            </div>
        </div>
      
      <a href="../CA_Managment/display.php">List</a>
      <a href="#contact">Contact</a>
    </div>
    

<!-- Content starts here -->
</body>
</html>
