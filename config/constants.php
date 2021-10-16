<?php 
    session_start();
     //Create Constants to Store Non Repeating Values
     define('SITEURL', 'http://localhost/food-order/');
    # define('LOCALHOST','localhost');
     #define('DB_USERNAME','root');
    # define('DB_PASSWORD','');
     #define('DB_NAME','foodorder');

    

  #  $conn = mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD);
    $conn = mysqli_connect('localhost','root','','foodorder1');  //Database Connection
    //Selecting database
    # if($conn)
      #{
     #     echo'yes';

     # }
     # else
     # {
     #     echo'no';
      #}

?>