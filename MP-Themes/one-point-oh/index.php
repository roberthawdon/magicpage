<!-- MagicPage V<?php echo $mpversion; ?> Web 1.0 (OnePointOh) Theme -->

<!DOCTYPE html> 
<html> 
<head>
<title><?php echo mpimport("sitename"); ?></title> 
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /> 
<meta name="keywords" content="<?php echo mpimport("keywords"); ?>" />
<meta name="description" content="<?php echo mpimport("description"); ?>" />
</head>

<body> 

<h1><?php echo mpimport("sitename"); ?></h1>
<p><i><?php echo mpimport("sitetagline"); ?></i></p>

<div><?php include("" . $common . "/navigation.php"); ?></div>

<hr />

<h1><?php echo mpimport("title"); ?></h1>

<div><?php echo mpimport("content"); ?></div>

<hr />

<div><?php echo mpimport("sideboard"); ?></div>

</body>
</html>
