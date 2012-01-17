<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
Design by Free CSS Templates
http://www.freecsstemplates.org
Released for free under a Creative Commons Attribution 2.5 License

Name       : Orange Mint 
Description: A two-column, fixed-width design with dark color scheme.
Version    : 1.2
Released   : 20110807

-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Cacao & Vainilla</title>
<?php echo Assets::js('jquery-1.6.2.min')?>
<?php echo Assets::js('jquery-ui-1.8.16.min')?>
<?php echo Assets::js('forms')?>
<?php echo Assets::js('cacao')?>
<?php echo Assets::css()?>
<?php echo Assets::css('jquery-ui')?>
</head>
<body>
<div id="wrapper">
	<div id="header-wrapper">
		<div id="header">
			<div id="logo">
				<h1><a href="#">Cacao & Vainilla</a></h1>
				<p> design by <a href="http://www.freecsstemplates.org/">Free CSS Templates</a></p>
			</div>
			<div id="menu">
				<ul>
					<li <?php echo check_class('inicio') ?>><?php echo anchor('inicio', 'Inicio')?></li>
					<li <?php echo check_class('clientes') ?>><?php echo anchor('clientes', 'Clientes')?></li>
					<li <?php echo check_class('articulos') ?>><?php echo anchor('articulos', 'Articulos')?></li>
					<li <?php echo check_class('pos') ?>><?php echo anchor('pos', 'Ventas')?></li>
					<li <?php echo check_class('insumos') ?>><?php echo anchor('insumos', 'Insumos')?></li>
					<li <?php echo check_class('informes') ?>><?php echo anchor('informes', 'Informes')?></li>
				</ul>
			</div>
		</div>
	</div>
	<!-- end #header -->
	<div id="page">
		<div id="page-bgtop">
			<div id="page-bgbtm">
				<div id="content">
					<div class="post">
                      <?php echo Template::yield()?>
					</div>
				</div>
				<!-- end #content -->
				<div id="sidebar">
					<ul>
						<li>
                          <?php echo Template::block('novedades');?>
						</li>
                      <li>&nbsp;</li>
						<li>
                          <?php echo Template::block('fast');?>
						</li>
					</ul>
				</div>
				<!-- end #sidebar -->
				<div style="clear: both;">&nbsp;</div>
			</div>
		</div>
	</div>
	<!-- end #page -->
</div>
<div id="footer">
	<p>Copyright (c) 2011 Cacao&Vainilla. Design by <a href="#">DnL</a>.</p>
</div>
<!-- end #footer -->
</body>
</html>
