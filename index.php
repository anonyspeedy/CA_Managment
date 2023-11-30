<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <title>Home</title>
  <style>
    .button-container {
      margin-top: 20px;
      margin-left: 25%;
    }
   
    .circle-button {
      width: 200px;
      height: 200px;
      border-radius: 50%;
      border: 2px solid gray;
      background-color: white;
      color: #000000;
      font-size: 24px;
      text-align: center;
      text-decoration: none;
      display: flex; /* Use flex display to arrange buttons horizontally */
      align-items: center; /* Center content vertically */
      justify-content: center; /* Center content horizontally */
      margin-right: 20px; /* Adjust the horizontal spacing between buttons */
      transition: all 0.3s ease;
      cursor: pointer;
    }

    .circle-button:hover {
      box-shadow: 0 8px 16px gray;
      border-color: #3498db;
      background-color: #3498db;
      color: white;
    }

    .circle-button img {
      max-width: 100%;
      max-height: 100%;
      border-radius: 50%;
    }
   
  </style>
</head>
<body>

<?php include("header_footer/header.php"); ?>


<div class="button-container">
  <div class="d-flex">
    <div class="mr-3">
        <a href="Add.php" class="circle-link">
          <button class="circle-button">
            <img src="./img/CardReader.png" alt="CardReader"/>
          </button>
      </a>
    </div>
    <div class="mr-3">
      <button class="circle-button">
        <img src="./img/Shutter.png" alt="Shutter">
      </button>
    </div>
    <div class="mr-3">
      <button class="circle-button">
        <img src="./img/Chipset.png" alt="Chipset">
      </button>
    </div>
    <div>
      <button class="circle-button">
        <img src="./img/Board.png" alt="Board">
      </button>
    </div>
  </div>
</div>

</body>
</html>
