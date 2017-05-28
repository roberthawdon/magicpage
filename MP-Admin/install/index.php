<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
    <title>MagicPage: First Run Setup</title>
	<link href="firstrun.css" rel="stylesheet" type="text/css" media="screen" /> 
<!-- TinyMCE -->

</head>
<body>
<h1 class="titlebar">OP-EZY MagicPage - First Run Setup</h1>
<div id="menu"> 
<h2>Admin Menu</h2> 

</div> 

<div id="content"> 
<?php
if ($firstrun != 'true') {
echo "<h1>MagicPage reports that it is already installed</h1>";
} else {
echo "<h1>Welcome to MagicPage</h1>
<p>The easy installer will now guide you through the rest of the setup process...</p>";}
?>
</div>
<p align="right">OP-EZY MagicPage Version: <?php echo $mpversion; ?> <a href="http://www.op-ezy.co.uk/MagicPage/"><img src="MP-Admin/images/magicpage.png" alt="Powered by OP-EZY MagicPage" title="Powered by OP-EZY MagicPage"></a></p>
</body>
</html>