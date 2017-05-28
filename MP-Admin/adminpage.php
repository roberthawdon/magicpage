<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>

<?php
/** Load Module Loader **/

include("ADM_Modules/module_loader.php");

/** Get Arguments from URL **/

$action = $_GET['action'];
$viewpage = $_GET['page'];
# $logincookie = $_COOKIE['mplogin'];
# $loggedinuser = $_COOKIE['mpuser'];

$authuser = $_SESSION['username'];
$authenticated = $_SESSION['authenticated'];

?>
    <title>MagicPage: Admin Panel</title>
	<link href="MP-Admin/admin.css" rel="stylesheet" type="text/css" media="screen" /> 
<!-- TinyMCE -->

</head>
<body>
<h1 class="titlebar">MagicPage Admin</h1>
<div id="menu"> 
<h2>Admin Menu</h2> 
<?php include("ADM_Modules/navigation.php"); ?>
</div> 

<div id="content"> 
<?php
if ( $authenticated != "true" AND $action != 'checkuser') {
echo mpadmin('login');
} else {
echo mpadmin($action);}
?>
</div>
<p align="right">MagicPage Version: <?php echo $mpversion; ?> <a href="https://github.com/roberthawdon/magicpage"><img src="MP-Admin/images/magicpage.png" srcset="MP-Admin/images/magicpage_2x.png 2x" alt="Powered by MagicPage" title="Powered by MagicPage"></a></p>
</body>
</html>