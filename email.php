<?php

 if(isset($_POST['email'])){

  $email = $_POST['email']."\r\n";


  $handler = fopen('email_list.txt','a');
  if(fwrite($handler,$email)){
    echo "success";
  }

  }


 ?>