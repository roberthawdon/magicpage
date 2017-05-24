<h1>User Settings</h1>
<table border="1">
<tr>
<td>User Name</td>
<td>Admin</td>
</tr>
<?php 

$query = "SELECT ID, first_name, middle_names, last_name, user_login, user_email, admin, user_registered FROM " . $dbprefix . "users ORDER BY ID ASC"; 
$result = $con->query($query);

while ($row = $result->fetch(PDO::FETCH_ASSOC))
  {
  echo "<tr>
	      <td><a href=\"?adm=go&action=edituser&user=" . $row['user_login'] . "\">" . $row['user_login'] . "</a></td>
	      <td>";
if ($row['admin'] == "1") {
echo "Yes";
} else {
echo "No";
}
echo "</td>
	</tr>";
  }

?>
<tr>
<td>&nbsp;</td>
<td><a href="/?adm=go&action=edituser&new=true">New User</a></td>
</tr>

</table>