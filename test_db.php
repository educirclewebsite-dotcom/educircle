<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "educircle";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully\n";

$sql = "ALTER TABLE university_courses MODIFY course_link TEXT";

if ($conn->query($sql) === TRUE) {
  echo "Table university_courses updated successfully\n";
} else {
  echo "Error updating table: " . $conn->error . "\n";
}

$conn->close();
?>
