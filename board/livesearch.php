<?php

	include("db_conn.php");
	if(isset($_POST['input'])){

		$input = $_POST['input'];

		$query = "SELECT * FROM b_reciving WHERE board_serail LIKE '{$input}%' OR tag_no LIKE '{$input}%' OR Date LIKE '{$input}%' ";

		$result = mysqli_query($conn,$query);

		if(mysqli_num_rows($result) > 0){?>

			<table class="table table-bordered table-striped mt-4">
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
                    
                    while($row = mysqli_fetch_assoc($result)){

                        $id = $row['id'];
                        $stock_id = $row['stock_id'];
                        $tag_no = $row['tag_no'];
                        $Date = $row['Date'];
                        $Remark = $row['Remark'];
                        
                        ?>
                        <tr>
                            <td><?php echo $id;?></td>
                            <td><?php echo $stock_id;?></td>                            
                            <td><?php echo $Date;?></td>
                            <td><?php echo $Remark;?></td>
                            
                            <td>
                                <a href="edit.php?id=<?php echo $id; ?>" class="btn btn-warning">Edit</a>
                                <a href="delete.php?id=<?php echo $id; ?>" class="btn btn-danger">Delete</a>
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