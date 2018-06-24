<?php require __DIR__ . '/head.php'; ?>
<?php 
		$row = new AcmeOrder(intval($_GET['order_id']));
?><h2>Customer <?php echo $row->getOrderCustomer()->getFullName(); ?> | Order <?php echo $row->order_id; ?></h2><div class="well">
<?php
$format = '<table style="width:100%%;" border="1">
	<tr><th colspan="2">%s</th></tr>
	<tr><th>%s</th><td>%s</td></tr>
	<tr><th>%s</th><td>%s</td></tr>
	<tr><th>%s</th><td>%s</td></tr>
	<tr><th>%s</th><td>%s</td></tr>
<tr><th>%s</th><td>%s</td></tr>
<tr><th>%s</th><td>%s</td></tr>
<tr><th>%s</th><td>%s</td></tr>
<tr><th>%s</th><td>%s</td></tr>
<tr><th>%s</th><td>%s</td></tr>
<tr><th>%s</th><td>%s</td></tr>
<tr><th>%s</th><td>%s</td></tr>
</table>';

echo sprintf($format,
'Order ' . $row->order_id,
'Order Date', $row->getOrderCreated(),
'Order Updated', date(DateTime::RFC822, strtotime($row->order_updated)),
'Fulfillment Status', $row->order_fulfillment_status,
'Ship Date', date(DateTime::RFC822, strtotime($row->order_ship_date)),
'Payment Status', $row->order_payment_status,		    
'Product Total', $row->order_product_total,
'Discount', $row->order_discount,
'Shipping Cost', $row->order_shipping_total,
'Taxable', $row->order_taxable_total,
'Tax', $row->order_tax_total,
'Order Grand Total', $row->order_grand_total)
; 
?>
</div>
<?php require __DIR__ . '/foot.php';
