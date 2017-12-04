<!DOCTYPE html>
<html>

<body>

<?php
$q = ($_GET['q']);
# Connet to DB
$db = new mysqli('localhost', 'root', '', 'Travel');
if ($db->connect_error):
  die ("Could not connect to db: " . $db->connect_error);
endif;

$sql="SELECT * FROM Destinations WHERE Country = '".$q."' ";
$result = mysqli_query($db,$sql);


echo "<table>
<tr>
<th>Country</th>
<th>Location</th>
<th>Price</th>
<th>Description</th>
</tr>";
while($row = mysqli_fetch_array($result)){
// while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['Country'] . "</td>";
    echo "<td>" . $row['Location'] . "</td>";
    echo "<td>" . $row['Price'] . "</td>";
    echo "<td>" . $row['Description'] . "</td>";
    echo "</tr>";
}
echo "</table>";
mysqli_close($db);
?>
</body>
</html>
