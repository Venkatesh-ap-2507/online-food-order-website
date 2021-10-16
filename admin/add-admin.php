<?php include('partials/menu.php')?>

<div class="main-content">
   <div class="wrapper">
       <h1>Add Admin</h1>

       <br/><br/>
       <?php 
            if(isset($_SESSION['add'])) //Checking whether the SEssion is Set of Not
            {
                echo $_SESSION['add']; //Display the SEssion Message if SEt
                unset($_SESSION['add']); //Remove Session Message
            }
        ?>

    <form action="" method="POST">
    <table class="tbl-half">
        <tr>
            <td>Fullname:</td>
            <td>
                <input type="text" name="full_name" placeholder="Enter Your name">
            </td>
        </tr>
        <tr>
            <td>Username:</td>
            <td>
                <input type="text"name="username" placeholder="Enter your username">
            </td>
        </tr>
        <tr>
            <td>Password</td>
            <td>
                <input type="password"name="password" placeholder="please enter your password">
            </td>
        </tr>

        <tr>
            <td colspan="2">
                <input type="submit"name="submit"value="Add admin" class="btn-secondary">
            </td>
        </tr>
    </table>
 </form>
 </div>
</div>
<?php include('partials/footer.php')
?>

<?php
   //process the value from form and save it in database
 
   //check whether the submit button is clicked or not 
   
   if(isset($_POST['submit']))
   {
       //Button clicked
       //echo"Button clicked";
       //1. Get the data from form
      $full_name=$_POST['full_name'];
      $username=$_POST['username'];
      $password=md5($_POST['password']); //Password Encryption with MD5

      //2. SQl Query to save the data into database
      $sql = "INSERT INTO tbl_admin SET
         full_name='$full_name',
         username='$username',
         password='$password'
      ";
    //3.Execute Query and save data in database
   

    $res = mysqli_query($conn,$sql);
    //4. Check whether the (Query is Executed) data is inserted or not and display appropriate message
    if($res==TRUE)
        {
            //Data Inserted
            //echo "Data Inserted";
            //Create a Session Variable to Display Message
            $_SESSION['add'] = "<div class='success'>Admin Added Successfully.</div>";
            //Redirect Page to Manage Admin
            header("location:".SITEURL.'admin/manage-admin.php');
        }
        else
        {
            //Failed to insert
            //echo "Faile to Insert Data";
            //Create a Session Variable to Display Message
            $_SESSION['add'] = "<div class='error'>Failed to Add Admin.</div>";
            //Redirect Page to Add Admin
            header("location:".SITEURL.'admin/add-admin.php');
        }
    }
?>