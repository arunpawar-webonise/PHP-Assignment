<?php

  if(isset($_POST['upload'])){
      
      $selectFile=$_FILES['selectFile'];
      $inputName=$_POST['fileName'];
     
    


      if($selectFile && $inputName){

      $file_name = $selectFile['name'];
      $file_size = $selectFile['size'];
      $file_tmp = $selectFile['tmp_name'];
      $file_type = $selectFile['type'];


      if($file_type!="image/png" && $file_type!="image/jpeg"){

          echo '<script> alert("Only png and jpeg type allowed") </script>';
      
    }
    else{

        if($file_size<=2000000){

         
            if(move_uploaded_file($file_tmp,"upload_data/".$file_name)){
  
              echo '<script> alert("Successfully Uploaded") </script>';
            }
            else{
              echo '<script> alert("Failed to  Uploaded") </script>';
  
            }
        }
        else{
  
            echo '<script> alert("File Size to large") </script>';
        }
    
       }
}
   
    else{
        
        echo '<script> alert("Enter File name or choose file") </script>';
        
    }


  }

?>