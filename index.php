<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>CA_Managment</title>
</head>
<body>
    <form action="php/create.php" method="post">
        <fieldset>
            <legend>Reciving Check List For Card Reader</legend>
            <div>
                <label>Stock ID</label>
                <input type="number" name="stock_id">
                <label>Tag No</label>
                <input type="number" name="tag_no">
                <label>Serial No</label>
                <input type="text" name="serial_no">
                <label>Shutter</label>
                <input type="Checkbox" name="Shutter" >
                <label>Chipset</label>
                <input type="Checkbox" name="Chipset" >
                <label>Roller</label>
                <input type="Checkbox" name="Roller" >
                <label>Track</label>
                <input type="Checkbox" name="Track" >
                <label>Prehead</label>
                <input type="Checkbox" name="Prehead" >
                <label>Motor</label>
                <input type="Checkbox" name="Motor" >
                <label>Plastic Cover</label>
                <input type="Checkbox" name="plastic_cover" >
                <label>Date</label>
                <input type="date" name="Date">
                <label>Checked BY</label>
                <input type="text" name="checked_by">
                <label>Board Serial</label>
                <input type="number" name="board_serial" >
                <input type="submit" value="Create">


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
                
            </div>
        </fieldset>
    </form>
</body>
</html>