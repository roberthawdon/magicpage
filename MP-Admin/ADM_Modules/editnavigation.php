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

$query = "SELECT id, label, link_url, parent_id FROM " . $dbprefix . "navigation ORDER BY ID ASC"; 
$result = $con->query($query);

while ($row = $result->fetch(PDO::FETCH_ASSOC))
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
$query = "SELECT ID, label FROM " . $dbprefix . "navigation WHERE ID='" . $row['parent_id'] . "'";
$result = $con->query($query);
while ($parentname = $result->fetch(PDO::FETCH_ASSOC))
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