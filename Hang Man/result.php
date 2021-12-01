<?php

function won(){

    global $con;
  
    $con->query("update user set name='' where Id=1");
  
    return "Congratulations You won !!!";
  
  }

  function lost(){

    global $con;

    $con->query("update user set name='' where Id=1");
    
    return "You Lost <br><br>";
  }


?>