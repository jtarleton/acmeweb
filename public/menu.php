<div id="mainmenu" style="width:100%;margin-left:0; padding:0;">
<ul style="margin-top:2px;margin-left:1px;width:100%;list-style-type:none;">
<?php foreach(array(
	'index.php'=>'Home',
	'admin.php'=>'Admin',
'customer.php'=>'Customer'
) as $href => $link):
 ?>
<li style="
  display: inline;
  list-style-type: none;
  padding-right:1px;
  float: left;
"><div style="width:60px; border:1px solid #CCC; text-align:center; padding:15px; background-color:whitesmoke;"><?php echo sprintf('<a href="%s">%s</a>', $href, $link); ?></div></li>
<?php endforeach; ?>
</ul>
<div style="clear:both;"></div>
</div>
