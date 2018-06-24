<?php require __DIR__ . '/head.php'; ?>
<h2>Admin</h2>
<div style="float:left;width:50%;">
<div class="well"><?php  

?><table border="1" style="width:100%;"><thead><tr><th>All Customers</th></tr></thead><?php
foreach(AcmeCustomer::getAll() as $row): ?>
<tr><td>
<?php echo sprintf('<a href="customer.php?customer_id=%s">%s</a>', $row->customer_id, $row->getFullName() );
?>
</td></tr>
<?php endforeach; ?></table>
</div>
</div>
<div style="float:left;width:50%;">
<div class="well"><?php
$rows = $pdo->query("SELECT * FROM acme_order ORDER BY order_created DESC LIMIT 15");
?><table border="1" style="width:100%;"><thead><tr><th>All Orders</th></tr></thead><?php
foreach($rows as $row): ?>
<tr><td>
<?php echo sprintf('<a href="orderdetail.php?order_id=%s">%s</a>', $row['order_id'], $row['order_id']); 
?>
</td></tr>
<?php endforeach; ?></table>
</div>
</div>
<div style="clear:both;"></div>
<?php
require __DIR__ . '/foot.php';
