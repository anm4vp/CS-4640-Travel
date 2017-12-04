<?php
$q = ($_GET['q']);
# Connet to DB
$db = new mysqli('localhost', 'root', '', 'Travel');
if ($db->connect_error):
  die ("Could not connect to db: " . $db->connect_error);
endif;

$sql="SELECT * FROM Users WHERE Username = '".$q."' ";
$result = mysqli_query($db,$sql);


echo "<table>
<tr>
<th>UserName</th>
<th>FirstName</th>
<th>LastName</th>
<th>Email</th>
</tr>";
while($row = mysqli_fetch_array($result)){
// while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['Username'] . "</td>";
    echo "<td>" . $row['FirstName'] . "</td>";
    echo "<td>" . $row['LastName'] . "</td>";
    echo "<td>" . $row['Email'] . "</td>";
    echo "</tr>";
}
echo "</table>";
mysqli_close($db);
?>
