<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>

	<style type="text/css">
		table {
			  font-family: arial, sans-serif;
			  border-collapse: collapse;
			  width: 100%;
			}

			td, th {
			  border: 1px solid #dddddd;
			  text-align: left;
			  padding: 8px;
			}

			tr:nth-child(even) {
			  background-color: #dddddd;
			}
			img{
				max-width: 50px; height: auto; display: block;
			}
	</style>
</head>
<body>

<div id="container">
	<h1>n'gel Brow & Beauty</h1>

	<div id="body">
		
		<table >
			<tr>
				<th>no</th>
				<th>product name</th>
				<th>quantity</th>
				<th>Product price</th>
				<th>Total price</th>
			</tr>
			<tbody>
				<?php foreach ($invoiceData as $invoiceDataRow) {?>
					<tr>	
							<td><?= $invoiceDataRow['order_number'];?></td>
							<td><?= $invoiceDataRow['product_name'];?></td>
							<td><?= $invoiceDataRow['total_quantity'];?></td>
							<td><?= $invoiceDataRow['product_price'];?></td>
							<td><?= $invoiceDataRow['total_price'];?></td>
					</tr>	
				<?php } ?>
			</tbody>
		</table>

</div>

</body>
</html>
