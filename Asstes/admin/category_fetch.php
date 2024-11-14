<?php
	include 'includes/session.php';

	$output = '';

	$conn = $pdo->open();

	$query = $conn->prepare("SELECT * FROM category");
	$query->execute();

	foreach($query as $row){
		$output .= "
			<option value='".$row['id']."' class='append_items'>".$row['name']."</option>
		";
	}

	$pdo->close();
	echo json_encode($output);


?>