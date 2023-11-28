<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <title>Bootstrap Image Grid</title>
  <style>
    .circle {
      border-radius: 20px; /* Adjust the border-radius value as needed */
    }
    
    .mb-4 img {
      object-fit: cover;
      width: 100%;
      height: 100%;
    }
  </style>
</head>
<body>

<?php include("header_footer/header.php"); ?>

<div class="container mt-4 circle"> <!-- Apply the "circle" class here -->
  <div class="row">
    <div class="col-lg-4 col-md-6 mb-4">
        <a href="Add.php">
            <img src="img/CardReader.jpg" class="img-fluid" alt="Image 1">
        </a>
    </div>
    <div class="col-lg-4 col-md-6 mb-4">
      <img src="img/Chipset.jpg" class="img-fluid" alt="Image 2">
    </div>
    <div class="col-lg-4 col-md-6 mb-4">
      <img src="img/Shutter.jpg" class="img-fluid" alt="Image 3">
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
