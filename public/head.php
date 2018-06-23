<?php require __DIR__ . '/pre.php'; ?>
<!DOCTYPE html>
<head>
<title>Welcome to Acme</title>
<style type="text/css">* { margin:0; padding:0 } .well { background-color:#FFEFD5;} .flash_msg_info { text-align:center;padding:10px 0; margin:0; width:auto;background-color:lightblue;border:1px solid navy; }</style>
</head>
<body style="width:78em;margin:10px auto;">
<div style="text-align:right; width:100%; margin:0; height:auto; padding:10px 0; border:1px solid #CCC; background-color:#F0F0F0;">
<div style="padding:5px;float:left;"><h1><a href="http://acme.jamestarleton.com/">Acme</a></h1></div>
<div style="padding:5px;text-align:right;">
<ul style="display:inline-block;">
<?php foreach ($_SESSION['cart'] as $pid => $item): ?>
<li><?php echo $pid; ?> (Qty: <?php echo $item['qty']; ?>)</li>
<?php endforeach; ?>
</ul>
<p><a href="cart_edit.php">Cart</a></p>
</div>
<div style="clear:both;"></div>
</div>
<?php if(!empty($flash_msgs)): ?>
<div style="width:78em;" class="flash_msg_info"> <?php echo $flash_msgs; ?></div>

<?php endif; ?>
<div style="width:100%; text-align:justify; padding:0;">
<?php require __DIR__ . '/menu.php';
