<?php
include 'conn.php';
  // html form se data get 
  $name = $_POST['name'];
  $email = $_POST['email'];
  // insert query 
  $sql ="INSERT INTO mytable (name, email) VALUES ('$name , $email')";
  // check insertion 
  if($conn->query($sql) === TRUE) {
    echo "Data Inserted Successfully";
  } else {
      echo "There is an Error !";
  }

  //Reading / fetching data from database
  $read = "SELECT * FROM mytable";
  $result =  $conn->query($read);

  echo "
  <table border='1' style='width:50%; margin:auto; border-collapse:collapse; text-align:center;'>
   <tr>
       <td> ID </td>
       <td> Name </td>
       <td> Email </td>
       <td> actions </td>
   </tr>    

  ";
 
  //Check if there are rows and fetch data
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      // . is used to concatenate (jorne)
      echo "
           <tr>
                <td>" . $row['id'] .  "</td>
                <td>" . $row['name'] . "</td> 
                <td>" . $row['email'] . "</td> 
                <td> <a href = 'update.php '>   update </a>  </td>  
          </tr>      
 ";
    }
  } else {
    echo "
    <tr>
        <td colspan='3'> No data available</td>
    </tr>
";
}
echo "</table>";
$conn->close();
  ?>