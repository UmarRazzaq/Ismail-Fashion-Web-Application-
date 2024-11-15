<?php
	include 'includes/session.php';

	$id = $_POST['id'];

	$conn = $pdo->open();

	$output = array('list'=>'');

    $query = $conn->prepare("SELECT *, sales.id AS salesid FROM sales LEFT JOIN users ON users.id=sales.user_id ORDER BY sales_date DESC");
    $query->execute();
    foreach ($query as $row){
        $output['contact'] = $row['contact_info'];
        $output['address'] = $row['address'];
    }

	$stmt = $conn->prepare("SELECT * FROM details LEFT JOIN products ON products.id=details.product_id LEFT JOIN sales ON sales.id=details.sales_id WHERE details.sales_id=:id");
	$stmt->execute(['id'=>$id]);

	$total = 0;
	foreach($stmt as $row){
		$output['transaction'] = $row['pay_id'];
		$output['date'] = date('M d, Y', strtotime($row['sales_date']));
		$subtotal = $row['price']*$row['quantity'];
		$total += $subtotal;
		$output['list'] .= "
			<tr class='prepend_items'>
				<td>".$row['name']."</td>
				<td>PKR ".number_format($row['price'], 2)."</td>
				<td>".$row['quantity']."</td>
				<td>PKR ".number_format($subtotal, 2)."</td>
			</tr>
		";
	}
	
	$output['total'] = '<b>PKR '.number_format($total, 2).'<b>';
	$pdo->close();
	echo json_encode($output);

?>