<?php $cid = (isset($_GET['customer_id'])) 
	? intval($_GET['customer_id']) 
	: intval($_SESSION['logged_in_customer_id']);

$obj = new AcmeCustomer($cid);
?>
<h2>Orders for Customer <?php echo $obj->getFullName(); ?></h2>
<div class="well">
<?php



$rows = $pdo->query(sprintf("SELECT * FROM acme_order 

	WHERE order_customer_id = %s 
	ORDER BY order_id DESC;", 

	$cid

	)
  
); 

?>
<table border="1" style="table-layout:fixed;width:100%;">
<thead><tr><th>Order ID</th><th>Order Date</th></thead><tbody>
<?php foreach($rows as $row): $obj = new AcmeOrder($row['order_id']); ?>
<tr><?php echo sprintf('<tr><th><a href="orderdetail.php?order_id=%s">%s</a></th><td>%s</td></tr>', 
$obj->order_id, 
$obj->getOrderCustomer()->getFullName(),
date(DateTime::RFC822, strtotime($obj->order_created))
); 
?>
<?php endforeach; ?>
</div>
</tbody>
</table>
