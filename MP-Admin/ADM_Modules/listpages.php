<h1>Page Manager</h1>

<table border="1">

<tr>
<!-- <td>Page ID</td> -->
<td>Title</td>
<td>Page Last Updated</td>
</tr>

<?php 

$query = "SELECT ID, title, date, urlfolder FROM " . $dbprefix . "pages ORDER BY ID ASC"; 
$result = $con->query($query);

while ($row = $result->fetch(PDO::FETCH_ASSOC))
  {
  echo "<tr>
	      <!-- <td>" . $row['ID'] . "</td> -->
	      <td><a href=\"?adm=go&action=edit&page=" . $row['urlfolder'] . "\">" . $row['title'] . "</a></td>
	      <td>" . $row['date'] . "</td>
	</tr>";
  }

?>

<tr>
<!-- <td>&nbsp;</td> -->
<td>

<form action="/?adm=go&action=edit" name="newpage" method="post">
<button name="btnNewPage" value="true">New Page</button>
</form>

<td>&nbsp;</td>

</td>
</tr>

</table>