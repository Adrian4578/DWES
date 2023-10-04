<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    //código con instrucciones php
    require("cabecera.inc.php");
    ?>
    <nav>
        <?php
        //código con instrucciones php
        for ($i=1; $i <=30 ; $i++) { 
           echo "$i ,"  ;
        }
      
   
         function factorial( $num )
         {
            $result=$num;
            echo("<p> $num!=$num");
            for ($i=$num-1; $i >0 ; $i--) { 
               $result*=$i;
               echo(" X $i ");
             }
             echo("= $result </p> ");
         }
         factorial(10)
        ?>
    </nav>
    <?php
    //código con instrucciones php
    require("footer.inc.php");
    ?>
</body>

</html>