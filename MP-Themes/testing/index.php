<!-- MagicPage V<?php echo $mpversion; ?> Testing Theme -->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head>
<title><?php echo mpimport("sitename"); ?></title> 
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /> 
<meta name="keywords" content="<?php echo mpimport("keywords"); ?>" />
<meta name="description" content="<?php echo mpimport("description"); ?>" />
</head>

<body> 

<h1><?php echo mpimport("title"); ?></h1>
<p><i><?php echo mpimport("sitetagline"); ?></i></p>

<div><?php include("" . $common . "/navigation.php"); ?></div>

<div><?php echo mpimport("content"); ?></div>

<hr />

<div><?php echo mpimport("sideboard"); ?></div>

</body>
</html>