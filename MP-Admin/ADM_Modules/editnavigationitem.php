<?php

$itemid = $_GET['itemid'];

mysql_select_db($dbdatabase , $con);

$result = mysql_query("SELECT * FROM " . $dbprefix . "navigation WHERE id='" . $itemid . "'");
$parents = mysql_query("SELECT * FROM " . $dbprefix . "navigation WHERE parent_id='0'");
$pages = mysql_query("SELECT * FROM " .$dbprefix . "pages");

if ($itemid == "new") {
$label = "";
$linkto = "";
$childof = "";
} else {
while($row = mysql_fetch_array($result)) 
{
$label = $row['label'];
$linkto = $row['link_url'];
$childof = $row['parent_id'];
}
}

?>

<form action="/?adm=go&action=submititem&itemid=<?php echo $itemid;?>" name="navigationitem" method="post">
<input type="hidden" value="<?php echo $itemid; ?>" name="itemid" />
Label: <input type="text" value="<?php echo $label;?>" name="label" style="width: 180px;" /><br/>
Link: <select name="mplink">
<?php
while($row = mysql_fetch_array($pages))
{
if ("/" . $row['urlfolder'] . "/" == $linkto){
echo "<option value=\"/" . $row['urlfolder'] . "/\" selected>" . $row['title'] . "</option>
";
$selected = "true";
$linkbox = "";
} else {
echo "<option value=\"/" . $row['urlfolder'] . "/\">" . $row['title'] . "</option>
";
}
}
if ($selected != "true"){
echo "<option value=\"other\" selected>Other</option>
";
$linkbox = $linkto;
} else {
echo "<option value=\"other\">Other</option>
";
}
?>
</select>
<input type="text" value="<?php echo $linkbox;?>" name="linkbox" style="width: 180px;" /><br />
Child of: <select name="parent">
<option value="0">Is Parent</option>
<?php while($row = mysql_fetch_array($parents))
{ 
if ($row['id'] == $childof){
echo "<option value=\"" . $row['id'] . "\" selected>" . $row['label'] . "</option>
";
} else {
echo "<option value=\"" . $row['id'] . "\">" . $row['label'] . "</option>
"; 
}
} ?>
</select><br />
<button name="go">Submit</button>
<?php if ($itemid != "new") {
echo "<button name=\"delete\" value=\"true\">Delete</button>";
} ?>
</form>