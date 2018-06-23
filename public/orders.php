<h2>Orders for Customer <?php echo intval($_SESSION['logged_in_customer_id']); ?></h2>
<div class="well">
<?php
$rows = $pdo->query(sprintf("SELECT * FROM acme_order 
WHERE order_customer_id = %s;", 
intval($_SESSION['logged_in_customer_id']) )
); ?>
<table border="1" style="table-layout:fixed;width:100%;">
<thead><tr><th>Order ID</th><th>Order Date</th></thead><tbody>
<?php foreach($rows as $row): ?>
<tr><?php echo sprintf('<tr><th><a href="orderdetail.php?order_id=%s">%s</a></th><td>%s</td></tr>', 
$row['order_id'], 
$row['order_id'],
date(DateTime::RFC822, strtotime($row['order_created']))
); 
?>
<?php endforeach; ?>
</div>
</tbody>
</table>
