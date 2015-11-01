<h1>Edit Navigation</h1>

<table border="1">

<tr>
<td>Type</td>
<td>Label</td>
<td>Link to</td>
<td>Child Of</td>
<td>&nbsp;</td>
<td colspan="2">Move</td>
</tr>

<?php 

mysql_select_db($dbdatabase , $con);

$sql = "SELECT id, label, link_url, parent_id FROM " . $dbprefix . "navigation ORDER BY ID ASC"; 
$items = mysql_query($sql) or die(mysql_error());

while($row = mysql_fetch_array($items))
  {
  echo "<tr>
	      <td>";
if ($row['parent_id'] == "0") {
echo "Parent";
} else {
echo "&nbsp;";
}
  echo "</td>
	      <td>" . $row['label'] . "</td>
	      <td><a href=\"" . $row['link_url'] . "\" target=\"_blank\">" . $row['link_url'] . "</a></td>
	      <td>";
$parents = mysql_query("SELECT label FROM " . $dbprefix . "navigation WHERE ID='" . $row['parent_id'] . "'");
while($parentname = mysql_fetch_array($parents))
{echo $parentname['label'];}
echo "</td>
	      <td><a href=\"/?adm=go&action=navigationitem&itemid=" . $row['id'] . "\">Edit</a></td>
	      <td>&nbsp;</td>
	      <td>&nbsp;</td>
	</tr>";
  }

?>

<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td><a href="/?adm=go&action=navigationitem&itemid=new">New Link</a></td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>

</table>