<?php if(!class_exists('raintpl')){exit;}?><!DOCTYPE html>
<html>
<head>
	<title>ITC Compliance</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="Resource-type" content="Document" />
	<style>
		body{color: #fff;font-family: cambria;}
		h2{color: #ffa735;}
		.products h1{font-family: cambria; font-size: 40px; color: #fff; text-align: center;}
		.products{background-color: #1f1f1f;padding: 40px;max-width: 960px;border-radius: 5px;margin-left: auto;margin-right: auto;margin-top: 20px;}
		.error{color: red;}
	</style>
</head>

<body>
<section id="home">
	<div class="products">
		<h1>List of available Products</h1>
		<?php $counter1=-1; if( isset($info) && is_array($info) && sizeof($info) ) foreach( $info as $key1 => $value1 ){ $counter1++; ?>
			<?php if( $key1!=='error' ){ ?>
				<h2>Product ID: <?php echo $key1;?></h2>
				<?php $counter2=-1; if( isset($value1) && is_array($value1) && sizeof($value1) ) foreach( $value1 as $key2 => $value2 ){ $counter2++; ?>
					<li><?php echo $key2;?>: <?php echo $value2;?></li>
				<?php } ?>

			<?php }else{ ?>	
				<h2><span class="error">Errors: </span></h2>
				<?php $counter2=-1; if( isset($value1) && is_array($value1) && sizeof($value1) ) foreach( $value1 as $key2 => $value2 ){ $counter2++; ?>
					<li><?php echo $key2;?>: <?php echo $value2;?></li>
				<?php } ?>
			<?php } ?>	
		<?php } ?>
	</div>
</section>		
</body>
</html>