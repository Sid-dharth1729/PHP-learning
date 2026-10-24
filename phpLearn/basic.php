<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Learning php </title>
</head>
<body>
    <div class="container">
        This is made up of php
        <!-- run this to seee http://localhost/phpLearn/  but first fix xampp -->

        <h2>Variabe</h2>

        <?php
        //variables
            $num = 3;
            echo $num;
            echo "<br>";

            $num2 = 3.6;
            echo $num2;
           echo "<br>";
           
           $word = "sid";
           echo $word;
           echo "<br>";

            //array
            echo "<h2>Array</h2> <br>";

            $arr = array("sun", "mon", "tues");
            $arrLen = count($arr); //count() func for array length
            echo "count of arr :";
            echo "$arrLen";
             echo "<br>";
            echo $arr[2];
             echo "<br>";

            //string 
            echo "<h2>String</h2> <br>";

            $line = "this is a line";
            echo "$line ";
            echo "<br>";

            //string contactination by "."
            $lenn = strlen($line);  //string length
            echo "hey all " . $lenn . " is the str len <br>";
           
            //word count
            $wrdCnt = str_word_count($line);  //str_word-count
            echo "Word count: " . $wrdCnt . "<br>";
  
            //string replace
            echo "Actual string : " . $line;
            echo "<br> After replscement : " . str_replace("line", "String", $line). "<br>";
            //String Reverse
            echo "Reverse String : " . strrev($line);
            //String word position (first acuurance)
            echo "<br> word position : " . strpos($line, "a");  
        ?>
    </div>
</body>
</html>