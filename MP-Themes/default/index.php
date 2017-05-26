<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="<?php echo mpimport("description"); ?>" />
<meta name="keywords" content="<?php echo mpimport("keywords"); ?>" />
<link rel="stylesheet" type="text/css" href="<?php print $path. "/" .$themes. "/" .$MPTheme ?>/codes/style.css" media="screen" />
<title><?php echo mpimport("sitename"); ?></title>
</head>
<body>


<div id="centerColumn">
	<div id="header">
	<h1><?php echo mpimport("sitename"); ?></h1>
	<h2><?php echo mpimport("sitetagline"); ?></h2>
	</div><!--//end #headern//-->

	<div id="fauxRightColumn">
	<h2>Navigation</h2>
	<?php include($common . "/navigation.php"); ?><hr />
	<?php echo mpimport("sideboard"); ?>
	</div><!--//end #fauxRightColumn//-->


<h2><?php echo mpimport("title"); ?></h2>

<?php echo mpimport("content"); ?>


	<div id="footer">
	<!--<a href="http://validator.w3.org/check?uri=referer" title="W3C XHTML Validation"><img src="<?php print $path. "/" .$themes. "/" .$MPTheme ?>/img/xhtml10.gif" alt="Valid XHTML 1.0" /></a> | 
	<a href="http://jigsaw.w3.org/css-validator/check/referer" title="W3C CSS Validation"><img src="<?php print $path. "/" .$themes. "/" .$MPTheme ?>/img/css.gif" alt="Valid CSS" /></a> | -->
	<a href="https://github.com/roberthawdon/magicpage" title="MagicPage"><img src="<?php print $path. "/" .$themes. "/" .$MPTheme ?>/img/magicpage.png" srcset="<?php print $path. "/" .$themes. "/" .$MPTheme ?>/img/magicpage_2x.png 2x" alt="MagicPage" /></a>
	<p>&copy; <?php echo date("Y");?> <?php echo mpimport("orgname"); ?></p>
	</div>
	<!--//end #footer//-->

</div><!--//end #centerColumn//-->


</body>
</html>
