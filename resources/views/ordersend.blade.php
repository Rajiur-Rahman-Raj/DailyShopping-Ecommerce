
<!DOCTYPE html>
<html>
<head>
	<title>table</title>
	<!-- <link rel="stylesheet" type="text/css" href="table.css"> -->
	<style type="text/css">

table{
	width:500px;
    margin:50px auto;
    text-align:center;
    background:#ddd;
    border-collapse:collapse;
    border:2px solid red;
}
table th, td{
	border-collapse:;
    border:1px solid red;
}
.left{
	text-align:left;
	color:green;
	background:yellow;
}
caption {
    background: #dc8585;
    padding: 5px,0px,5px,0px;
    padding: 7px;
    border-radius: 10px;
    margin-bottom: 8px;
    color: white;
    font-weight: bold;
    font-size: 20px;

}
	</style>
</head>
<body>
	<table  cellpadding="10">
		<caption> Your Order Information </caption>
		<thead>
		<tr>
      <th scope="col">order Id</th>
      <th scope="col">Customer Name</th>
      <th scope="col">Product Name</th>
      <th scope="col">product quantity</th>
      <th scope="col">Product Unit Price</th>
      <th scope="col">Total Pay Amount</th>
		</tr>
		</thead>

    @foreach ($order as  $value)
      <tr>
        <td>#{{ $value->id }}</td>
        <td>{{ $value->customer_name }}</td>
        <td>{{ $value->product_name }}</td>
        <td>{{ $value->product_quantity }}</td>
        <td>{{ $value->product_unit_price }}</td>
        <td>{{ $value->Total_amount }}</td>
      </tr>
    @endforeach

	</table>
</body>
</html>
