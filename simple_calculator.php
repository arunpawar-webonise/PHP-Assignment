<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Calculator</title>
</head>
<body>
    <form method="POST">
        <input type="text" name="number1" placeholder="enter first number"><br><br>
        <input type="text" name="number2" placeholder="enter second number"><br><br>

         <select name="operation">
            <option value="addition">+</option>
            <option value="substraction">-</option>
            <option value="multiplication">*</option>
            <option value="division">/</option>
            <option value="modulus">%</option>
        </select>
        &nbsp;&nbsp;&nbsp; 
        
        <select name="isfloat">
            <option value="integer">Integer</option>
            <option value="float">Float</option>
        </select>
       
        <button name="result">Result</button>
        <br><br>
         
    </form>
        
<?php
         if(isset($_POST['result'])){
        

             $number1=$_POST['number1'];
             $number2=$_POST['number2'];
             $operation=$_POST['operation'];
             $isfloat=$_POST['isfloat'];
             $flag =true;
             
             if($number1==null || $number2==null ){
                 echo "Please fill the fields";
             }
             else if(is_numeric($number1)==null || is_numeric($number2)==null){
                 echo 'enter only digits';
                 $flag=false;
             }
             
            
            
            if($flag){
                if($isfloat=='float'){

                    switch($operation){

                        case 'addition':
                           $addition=$number1+$number2;
                           echo "Addition is ",$addition;
                           break;
                           
                        case 'substraction':
                           $substraction=$number1-$number2;
                           echo "Substraction is ",$substraction;
                           break;
       
                        case 'multiplication':
                           $multiplication=$number1*$number2;
                           echo "Multiplication is ",$multiplication;
                           break;
       
                        case 'division':
                           $division=$number1/$number2;
                           echo "Division is ",$division;
                           break;
       
                        case 'modulus':
                           $modulus=$number1%$number2;
                           echo "Modulus is ",$modulus;
                           break;
                       default :
                           echo 'choice does not exist';
                    }
                }
                else{
                    switch($operation){
    
                        case 'addition':
                           $addition=$number1+$number2;
                           echo "Addition is ",(int)$addition;
                           break;
                           
                        case 'substraction':
                           $substraction=$number1-$number2;
                           echo "Substraction is ",(int)$substraction;
                           break;
       
                        case 'multiplication':
                           $multiplication=$number1*$number2;
                           echo "Multiplication is ",(int)$multiplication;
                           break;
       
                        case 'division':
                           $division=$number1/$number2;
                           echo "Division is ",(int)$division;
                           break;
       
                        case 'modulus':
                           $modulus=$number1%$number2;
                           echo "Remainder is ",(int)$modulus;
                           break;
                       default :
                           echo 'choice does not exist';
                }
            }
                
        }
            
    }

           
?>

</body>
</html>