<!-- MagicPage V<?php echo $mpversion; ?> Web 1.0 (OnePointOh) Theme -->

<!DOCTYPE html> 
<html> 
<head>
<title>Salt</title> 
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /> 
<meta name="keywords" content="Salt" />
<meta name="description" content="Salt" />
</head>

<body> 

<p>Session Token:<br />
<?php echo genRandomBase64(128); ?></p>

</body>
</html>
