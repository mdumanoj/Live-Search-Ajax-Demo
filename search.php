<?php 
	include 'dbconnect.php';
	if($_POST) {
		$q = $_POST['search'];
		$query = "select name,rollno from search where name like '%$q%' or rollno like '%$q%' order by rollno";
		$result = $con -> query($query);
		while($row = $result -> fetch_array(MYSQLI_ASSOC)) {
			$name = $row['name'];
			$rollno = $row['rollno'];
			$b_name = '<strong>'.$q.'</strong>';
			$b_rollno = '<strong>'.$q.'</strong>';
			$final_name = str_ireplace($q,$b_name,$name);
			$final_rollno = str_ireplace($q,$b_rollno,$rollno);
?>
				<div class='show'>
					<ul>
						<li class='name'><?php echo $final_name; ?></li>
						<li class='name'><?php echo $final_rollno; ?></li>
					</ul>
				</div>
<?php
		}
	}
?>