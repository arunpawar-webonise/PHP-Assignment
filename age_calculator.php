<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Age Calculaotr</title>
</head>
<body>
    <form method="POST">
        
      <input type="text" name="year" placeholder="enter year">&nbsp;&nbsp;&nbsp;
      <input type="text" name="month" placeholder="enter month">&nbsp;&nbsp;&nbsp;
      <input type="text" name="day" placeholder="enter day">&nbsp;&nbsp;&nbsp;
      
      <button name="submit">Submit</button>
    </form>

    <?php

        if(isset($_POST['submit'])){
            $year = $_POST['year'];
            $month = $_POST['month'];
            $day = $_POST['day'];
    
            $cur_day = date('d');
            $cur_month = date('F');
            $cur_year = date('Y');
            
            $months = array('January','February','March','April','May','June','July','August','September','October','November','December');

            if($day=="" || $month=="" || $year==""){
                echo "Please fill all the fields";
            }
            else if(is_numeric($day)==null){
                echo 'enter day in digits';
            }
            else if($day>31){
                echo 'day should be less than 31';
            }
            else if($day==0){
                echo "day should not be 0";
            }
           
            else if(is_numeric($month)!=null){
                echo "enter month in letters";
            }
            else if($year>$cur_year && is_numeric($year)!=null){
                echo "year must be less than current year";
            }
            else if(is_numeric($year)==null){
                echo "enter year in digits";
            }
            else if(strlen($year)!=4){
                echo "enter 4 digits of year";
            }
        else{
           
           $pos_month=0;
           $pos_cur_month=0;
           $flag=false;
           for($i=0;$i<count($months);$i++){
               if(strcasecmp($month,$months[$i])==0){
                   $pos_month=$i+1;
                   $flag=true;
               }
               if(strcasecmp($cur_month,$months[$i])==0){
                   $pos_cur_month=$i+1;
                }
                
            }

            if($flag){
                $year_diff = $cur_year - $year;
                $month_diff = $pos_cur_month - $pos_month;
                $day_diff = $cur_day - $day;
                $flag=true;

        
           
           
           if($day>$cur_day){
              $day_diff = $cur_day;
              $month_diff = $pos_cur_month-$pos_month-1;
        
           }
           if($day<$cur_day){
               $month_diff=$pos_cur_month-$pos_month;
               $day_diff=$cur_day-$day;
           }
           
            if($pos_month>$pos_cur_month && $day>$cur_day){
                $year_diff=$year_diff-1;
                $month_diff=$pos_cur_month;
                $diff=30-$day;
                $day_diff=$cur_day+$diff;
            }
            if($pos_month>$pos_cur_month && $day<$cur_day){
                $year_diff=$year_diff-1;
                $month_diff=$pos_cur_month;
                $day_diff=$cur_day-$day;
            }
            if($pos_month<$pos_cur_month && $day>$cur_day){
                $month_diff=$pos_cur_month-$pos_month-1;
                $diff=30-$day;
                $day_diff=$cur_day+$diff;
            }
            if($pos_month==$pos_cur_month && $day>$cur_day){
                $year_diff-=1;
                $month_diff=$pos_cur_month;
                $diff=30-$day;
                $day_diff=$cur_day+$diff;
            }
            
           
            if($year == $cur_year && $pos_month>=$pos_cur_month && $day>$cur_day){
                echo "you have not born";
                $flag=false;
            }

            if($flag){
                echo "your age is $year_diff year $month_diff months and $day_diff days";
            }
       
            }
            else{
                echo 'enter valid month';
            }
            
           
                   
            
        }
        
    }

        
    
    ?>
    
</body>
</html>