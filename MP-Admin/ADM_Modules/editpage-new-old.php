<?php 

mysql_select_db($dbdatabase , $con);

$result = mysql_query("SELECT * FROM " . $dbprefix . "pages WHERE urlfolder='" . $viewpage . "'");


while($row = mysql_fetch_array($result))
  {
  $editcontent = "" . $row['content'] . "";
  }


$editcontent = addslashes(preg_replace('`[\r\n]`','',$editcontent));

?>



<form action="/?adm=go&action=submit&page=<?php echo $viewpage; ?>" name="editfrm" method="post">
<input id="varid" type="hidden" name="pagedata" value="">
<script src="MP-Admin/richtext.js" type="text/javascript" language="javascript"></script> 
<!-- Include the Free Rich Text Editor Variables Page --> 
<script src="MP-Admin/config.js" type="text/javascript" language="javascript"></script> 
<!-- Initialise the editor --> 
<script> 
initRTE('<?php echo $editcontent ?>');

function for_submit() {
var newhtml;
newhtml = (getXHTML(trim(document.getElementById(rteFormName).value)));
document.getElementById('varid').value = newhtml;
return true;
}
</script>
<input type="submit" onClick="for_submit()">
</form>

