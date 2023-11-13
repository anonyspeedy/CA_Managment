<?php

	include("db_conn.php");
	if(isset($_POST['input'])){

		$input = $_POST['input'];

		$query = "SELECT * FROM reciving WHERE serial_no LIKE '{$input}%' OR tag_no LIKE '{$input}%' OR Date LIKE '{$input}%' ";

		$result = mysqli_query($conn,$query);

		if(mysqli_num_rows($result) > 0){?>

			<table class="table table-bordered table-striped mt-4">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Stock ID</th>
                        <th>Tag NO</th>
                        <th>Serial NO</th>
                        <th>Shutter</th>
                        <th>Chipset</th>
                        <th>Roller</th>
                        <th>Track</th>
                        <th>Prehead</th>
                        <th>Motor</th>
                        <th>P_Cover</th>
                        <th>Date</th>
                        <th>Checked BY</th>
                        <th>Remark</th>
                        
                    </tr>
                </thead>

                <tbody>
                    <?php
                    
                    while($row = mysqli_fetch_assoc($result)){

                        $id = $row['id'];
                        $stock_id = $row['stock_id'];
                        $tag_no = $row['tag_no'];
                        $serial_no = $row['serial_no'];
                        $Shutter = $row['Shutter'];
                        $Chipset = $row['Chipset'];
                        $Roller = $row['Roller'];
                        $Track = $row['Track'];
                        $Prehead = $row['Prehead'];
                        $Motor = $row['Motor'];
                        $plastic_cover = $row['plastic_cover'];
                        $Date = $row['Date'];
                        $checked_by = $row['checked_by'];
                        $Remark = $row['Remark'];
                        
                        ?>
                        <tr>
                            <td><?php echo $id;?></td>
                            <td><?php echo $stock_id;?></td>
                            <td><?php echo $tag_no;?></td>
                            <td><?php echo $serial_no;?></td>
                            <td><?php echo $Shutter; ?></td>
                            <td><?php echo $Chipset; ?></td>
                            <td><?php echo $Roller; ?></td>
                            <td><?php echo $Track; ?></td>
                            <td><?php echo $Prehead; ?></td>
                            <td><?php echo $Motor; ?></td>
                            <td><?php echo $plastic_cover; ?></td>
                            <td><?php echo $Date;?></td>
                            <td><?php echo $checked_by;?></td>
                            <td><?php echo $Remark;?></td>
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
        <?php
		}else{

			echo"<h6 class='text-danger text-center t-3'>No data Found</h6>";
		}
	}


?>