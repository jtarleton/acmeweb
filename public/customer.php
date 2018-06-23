<?php require __DIR__ . '/head.php';
$cid = (isset($_GET['customer_id'])) 
		? intval($_GET['customer_id']) 
		: intval($_SESSION['logged_in_customer_id']);
$rows = $pdo->query(sprintf("SELECT * 
	FROM acme_customer 
	WHERE customer_id = %s", 
$cid));
$row=$rows->fetch(PDO::FETCH_ASSOC); ?>
<h2>Customer <?php echo $cid; ?></h2>
<div class="well">
<?php
$format = '<table border="1" style="table-layout:fixed;width:100%%;">
	<tr><th colspan="2">Customer %s</th></tr>
<tr><th>%s</th><td>%s</td></tr>
<tr><th>%s</th><td>%s</td></tr>
</table><table border="1" style="table-layout:fixed;width:100%%;"><tr>
<th colspan="2">Customer Activity</th></tr>
<tr><th>%s</th><td>%s</td></tr>
<tr><th>%s</th><td>%s</td></tr>
</table>';

echo sprintf($format,
	$row['customer_id'],
	'Name',    $row['customer_first_name'],
	'',   $row['customer_last_name'], 
	   'Created:', date(DateTime::RFC822, strtotime($row['customer_created'])),
	      'Last Updated:',  date(DateTime::RFC822, strtotime($row['customer_updated']))); ?>
</div>
<?php require __DIR__ . '/orders.php'; ?>
<?php
require __DIR__ . '/foot.php';
