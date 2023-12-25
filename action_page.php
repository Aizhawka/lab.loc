<?php 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bd";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $country = $_POST['country'];
    $subject = $_POST['subject'];
   // if (empty($name)) {
   //   echo "Name is empty";
    //} else {
   //   echo $name;
   // }
   $sql = "INSERT INTO myuser (firstname,lastname,country,subject1) VALUES ('$firstname','$lastname','$country','$subject')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully <a href='http://lab.loc/'>Главная стра....</a>";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
  }





$conn->close();

?>







