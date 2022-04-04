<?php

if(isset($_POST['submit'])){

    $fileName=$_POST['filename'];
    $message=$_POST['message'];
    $task=$_POST['task'];

    
    if($fileName != null ){
      switch($task){

        case "write":

            if(file_exists($fileName)){
              
               $file = fopen($fileName,"w+");
               fwrite($file,$message);

            
            }
            else{
               $file = fopen($fileName,"w+");
               fwrite($file,$message);

            }
            
            break;


       case "read":

        if(file_exists($fileName)){

            // readfile($fileName);
           $file= fopen($fileName,"r");
           echo fread($file,filesize($fileName));
        }
        else{
            
            echo "File Doesn't exists";
        }
        break;

      

      case "append":

                if(file_exists($fileName)){

                    $file = fopen($fileName,"r+");
                    echo fread($file,filesize($fileName));
                }
                else{

                    echo "File Doesn't exists";
 
                }
                break;

        default:

           echo 'select valid permission';

    }


    }
    else{
        echo 'Please fill all fields';
    }


 }



?>