r<?php include('partials-front/menu.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Feedback From</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>


<div class="container">
    <h3>Feedback From</h3>
    <form action="feedback.php" method="POST">
        <div class="form-group">
            <label>Name:</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Email:</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Message:</label>
            <textarea class="form-control" name="message" required></textarea>
        </div>
        <div class="form-group">
            <button class="btn btn-success" type="submit"name="btn-submit">Submit</button>
        </div>
    </form>
</div>
<?php

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  } 
  if(isset($_POST['btn-submit']))
{

$name =  $_POST['name'];
$mail =  $_POST['email'];
$msg = $_POST['message'];

$sql = "INSERT INTO `tbl_feedback`(`name`, `email`, `message`) VALUES('$name','$mail','$msg')";


if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}
  $conn->close();

?>

</body>
</html>
<?php include('partials-front/footer.php'); ?>