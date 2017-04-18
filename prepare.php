$cat =	$_POST['category'];

if(isset($_POST["category"])){


$stmt = $con->prepare("SELECT * FROM categories cat=?");
$stmt->bind_param("s", $_POST['name']);
$stmt->execute();
$result = $stmt->get_result();

$numRows = $result->num_rows;
if($numRows > 0) {
  while($row = $result->fetch_assoc()) {
    $id[] = $row['id'];
    $name[] = $row['name'];
    $age[] = $row['age'];
  }
}
$stmt->close();
