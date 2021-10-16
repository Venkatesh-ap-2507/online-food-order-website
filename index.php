<?php include('./config/constants.php');?>
<?php 
$msg = "";
if (isset($_POST['btn-submit1'])) {
    $mail = $_POST["mail"];
    $password = md5($_POST["pass"]);
	 if ($mail == '' || $password == '') {
        $msg = "You must enter all fields";
    } else {
        $sql = "SELECT * FROM `tbl_usr` WHERE `mail`= '$mail' AND `password` = '$password'";
        
        $query = mysqli_query($conn,$sql);

        if ($query === false) {
            echo "Could not successfully run query ($sql) from DB: " . mysqli_error($conn);
            exit;
        }

        if (mysqli_num_rows($query) > 0) {
         
            header('Location: home.php');
            exit;
        }

        $msg = "Username and password do not match";
    }
}
?>
<html>

<head>
    <title>User Login - Food Order System</title>
    <link rel="stylesheet" href="./css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>

    <div class="login">
        <div class="container">
            <div class="row">
                <div class="col">
                    <img src="./images/sideimg.jpg" alt="welcome image" class="sideimg">
                </div>
                <div class="col">
                    <div id="loginbox" style="margin-top:50px;" class="mainbox ">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <div class="panel-title">
                                    <h3>Sign In</h3>
                                    <?php echo $msg; ?>
                                </div>
                            </div>
                            <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                            <form class="row g-3 form-horizontal" id="loginform" role="form" action="home.php" method="post" >
                                <div class="mb-3">
                                    <label for="mail" class="form-label">Email address</label>
                                    <input type="email" class="form-control" name="mail" id="mail"
                                        aria-describedby="emailHelp">
                                    <div id="emailHelp" class="form-text">We'll never share your email with anyone
                                        else.</div>
                                </div>
                                <div class="mb-3">
                                    <label for="pass" class="form-label">Password</label>
                                    <input type="password" class="form-control" name="pass" id="pass">
                                </div>
                                <div class="mb-3 form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                </div>
                                <button type="submit" class="btn btn-primary" name="btn-submit1">Submit</button>
                            </form>
                            <p class="text-center">Dont have an account?<a id="signinlink" href="#"
                                    onclick="$('#loginbox').hide(); $('#signupbox').show()">Create New Account</a>
                            </p>
                        </div>
                    </div>

                    <div id="signupbox" style="margin-top:50px; display:none">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <div class="panel-title">
                                    <h3>Sign Up</h3>
                                </div>
                            </div>
                            <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                            <form class="row g-3 form-horizontal" id="signupform " role="form" method="post" action="index.php" >
                                <div class="col-md-6">
                                    <label for="inputEmail4" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email">
                                </div>
                                <div class="col-md-6">
                                    <label for="inputPassword4" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="pas" name="pas">
                                </div>
                                <div class="col-12">
                                    <label for="inputAddress" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="name"
                                        placeholder="your name" name="name">
                                </div>
                                <div class="col-12">
                                    <label for="inputAddress2" class="form-label">Address</label>
                                    <input type="text" class="form-control" id="add"
                                        placeholder="Apartment, studio, or floor" name="add">
                                </div>
                                <div class="col-md-6">
                                    <label for="inputCity" class="form-label">City</label>
                                    <input type="text" class="form-control" id="city" name="city">
                                </div>
                                <div class="col-md-4">
                                    <label for="inputState" class="form-label">State</label>
                                    <select id="state" class="form-select" name="state">
                                        <option selected>Choose...</option>
                                        <option>pune</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label for="inputZip" class="form-label">Zip</label>
                                    <input type="text" class="form-control" id="zip" name="zip">
                                </div>
                                <div class="col-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="gridCheck">
                                        <label class="form-check-label" for="gridCheck">
                                            I have read terms and condition.
                                        </label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary" name="btn-submit">Sign in</button>
                                </div>
                                <p class="text-center">Already have an account?<a id="signinlink" href="#"
                                    onclick="$('#signupbox').hide(); $('#loginbox').show()">Click here</a>
                            </p>
                            </form>
                        </div>
<?php
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  } 
// Taking all values from the form data(input)
if(isset($_POST['btn-submit']))
{


$mail =  $_POST['email'];
$pass = $_POST['pas'];
$name =  $_POST['name'];
$add = $_POST['add'];
$city = $_POST['city'];
$state = $_POST['state'];
$zip = $_POST['zip']; 
// Performing insert query execution
// here our table name is college
$sql="INSERT INTO `tbl_usr`(`mail`, `password`, `name`, `address`, `city`, `state`, `zip`) VALUES ('$mail', '$pass', '$name', '$add', '$city', '$state', '$zip');";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}
  $conn->close();
?>
                    </div>
                </div>

            </div>
        </div>
    </div>

</body>

</html>