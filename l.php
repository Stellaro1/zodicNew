<?php

$con = mysqli_connect('localhost','root','','zodic');

$select ="SELECT * FROM catalog";


$projects = array();
$resul= mysqli_query($con,$select);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-pink-200">
<form action="learning.php" method="post">
    <div class="container mx-auto mt-16 ">
    <div class=" flex justify-center h-screen item-center ml-16 flex-wrap  space-x-24 ">
    <?php
    
      
      foreach( $resul as $a){
        echo " <div name='first' class=' flex-row w-64 h-64 rounded-xl p-7 shadow-2xl duration-1000 hover:scale-105 hover:border-red-900 hover:bg-purple-300'>
        <img class='mb-4 rounded-xl' src='data:image/png;base64,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' />
        <h1 class='font mb-2 ml-11 font-bold'>
          $a[title]</h1></h1>
        <button class='mb-3 w-full rounded-full bg-red-300 p-3 px-4 text-xs font-bold hover:scale-105 hover:bg-purple-500 hover:text-white'>ကြည့်ရန်</button>
      </div>";

      }
   
       ?>
    </div>
       


     </div>
      
       
      </div>

      </form>
   
      
</body>
</html>