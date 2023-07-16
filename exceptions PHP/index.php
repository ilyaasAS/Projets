<?php

function division($x, $y){
     if( $y == 0 ){
          throw new Exception("division par zéro");
     }
     

     return $x/$y;
}



try{
     echo division(2, 0);
}catch(Exception $e){
     echo $e->getMessage();
}

echo "<br>";
echo "FIN";