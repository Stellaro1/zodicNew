<?php
$con = mysqli_connect('localhost','root','','zodic');
$query = "SELECT * FROM catalog";
$result = mysqli_query($con,$query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<?php
  $iderror ='';
  $terror='';
            if(isset($_POST['updatebtn'])){
                      
             
               $newid =$_POST['id'];
               $new_title =$_POST['update'];
               
                if(!empty($new_title) && !empty($newid)){
                  $sql ="INSERT INTO catalog(title) VALUES ('$new_title')";
                  $re= mysqli_query($con,$sql);
                     if($re){
                     echo "<script> alert ('One Catalog is successfully inserted');</script>";
                     }
                  $newid='';
                  $new_title='';
                }
                else{
                  "error";
                }
               
            }

             ?>

<body class=" container mx-auto flex space-x-36 mt-7 bg-pink-200" ></body> 
  
   <form action="admin.php" method="post">
        <div class=" w-96 shadow-2xl p-6 border-red-500  rounded-2xl">
          <h1 class=" text-center font-bold font-serif mb-3 text-2xl">Update Catalog</h1>
         
          <input name="id" class="border p-2 mb-3 rounded-lg  border-red-800  w-full" type="text" placeholder="create new Id"  >
          <h1 class="text-red-600 mb-3 font-bold italic ml-3">
            <?php 
          
            if(empty($newid)){
              $iderror =" Add new id";
              
            }?></h1> 
          
          <input name="update" class="border p-2 mb-3 rounded-lg  border-red-800  w-full" type="text" placeholder="Enter New Title"  >
          <h1 class="text-red-600 mb-3 font-bold italic ml-3">
          <?php if(empty($new_title)){
                  $terror=" add new title";
                }
            ?></h1>
            
            <button name="updatebtn" class="border-red-900 bg-red-700 text-white mb-3 rounded-xl flex justify-center border p-2 w-full space-x-7 ">Update</button>
            
          
            
        </div>
        </form>
        
</div>
<div> <table class=" w-96 border-2 border-pink-200 font-[popin] shadow-8xl">
    <thead class="">
      <tr class="text-black">
        <th class=" py-1 bg-pink-300">Id</th>
        <th class=" py-1 bg-pink-300">title</th>
      </tr>
    </thead>
   
    <?php 
      foreach($result as $res){
        echo"<tbody class='p-7'>
        <tr class='text-black text-black text-center bg-pink-300'>
        <td class='py-1 '> $res[id]</td>
        <td class=' py-1 '>$res[title]</td>
      </tr>
    </tbody>";
      }
    
    ?>
</table></div>

</div>

</body>
</html>