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
 if(isset($_GET['cid_to_delete'])){
    $delete_id =$_GET['cid_to_delete'];
    $ok = "DELETE FROM catalog WHERE id=$delete_id";
    $resude=mysqli_query($con,$ok);
    if($resude){
      echo "<script> alert('Successfully Deleted');</script>";
    }
    else{
      die ('Error'. mysqli_error($con));
    }
 }
?>
<?php 
if(isset($_POST['ubtn'])){
    $uid=$_POST['uid'];
    $utitle = $_POST['utitle'];

    $query="UPDATE catalog SET title='$utitle' WHERE id=$uid";
    $result=mysqli_query($con,$query);
    if($result)
    {
        echo"<script> alert('UPdated');
        </script>";
    }

 
 }
 
?>
<?php  

$update_form = false;

              if(isset($_GET['cid_to_update'])){
                $update_form = true;
                $cid=$_GET['cid_to_update'];
                $cquery="SELECT * FROM catalog WHERE id=$cid";
                $result=mysqli_query($con,$cquery);
                if($result){
                $cupdate=  mysqli_fetch_assoc($result);
  
              }
            }
        



?>
<!--cretecatalog-->
<?php

            if(isset($_POST['updatebtn'])){
                      
             
               $newid =$_POST['id'];
               $new_title =$_POST['update'];
               
                if(!empty($new_title) && !empty($newid)){
                  $sql ="INSERT INTO catalog(title) VALUES ('$new_title')";
                  $re= mysqli_query($con,$sql);
                     if($re){
                     echo "<script> alert ('One Catalog is successfully inserted');</script>";
                     }
              
                }
                else{
                  "error";
                }
               
            }

             ?>

<body class=" container mx-auto flex  space-x-16 mt-7 bg-pink-200" ></body> 
  
   <form action="admin.php" method="post">
        <div class=" w-64 hover:scale-105 duration-1000 shadow-2xl p-6 border-red-500  rounded-2xl">
          <h1 class=" text-center font-bold font-serif mb-3 text-xl">Add New Catalog</h1>
         
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
      <div>
       <?php
        if($update_form==true){?>

          <form action="admin.php" method="post">
          <div class="w-64 shadow-2xl hover:scale-105 duration-1000 p-6 border-red-500  rounded-2xl">
          <h1 class="mb-2 text-center font-bold font-serif mb-3 text-2xl">UPdate</h1>
          <input name='uid' value=$cupdate[id] class="border p-2 mb-3 rounded-lg border-red-800  w-full" type="text" placeholder="Enter  your email"  >
            <input name='utitle' value=$cupdate[title] class="border p-2 mb-6 rounded-lg  border-red-800  w-full" type="text" placeholder="Enter  your email"  >
            <button name='ubtn' class="border-red-900  bg-red-700 text-white mb-3 rounded-xl flex justify-center border p-2 w-full space-x-7 "> update</button>
           
            </div>
            
        </div>
          </form>
       <?php  }

       ?>
      </div>
      
</div>

<div> <table class=" w-96 border-2 border-pink-200 font-[popin] shadow-8xl">
    <thead class="">
      <tr class="text-black">
        <th class=" py-1 bg-pink-300">Id</th>
        <th class=" py-1 bg-pink-300">title</th>
       
        <th class=" py-1 bg-pink-300">update</th>
        <th class=" py-1 bg-pink-300">delete</th>
      </tr>
    </thead>
   
    <?php 
      foreach ($result as $res){
        echo"
        <tbody class='p-7'>
        <tr class='text-black text-black text-center bg-pink-300'>
        <td class='py-1 '> $res[id]</td>
        <td class=' py-1 '>$res[title]</td>
   
        <td><a href='admin.php?cid_to_update=$res[id]' class='bg-red-400 rounded-lg p-1 text-xs hover:bg-red-600 hover:scale-150 duration-1000'> update</a></td>
        <td><a href='admin.php?cid_to_delete=$res[id]' class='bg-red-400 rounded-lg p-1 text-xs hover:bg-red-600 hover:scale-150 duration-1000'> delete</a></td>
        </tr>
        </tbody>
        ";
      }

            ?>
          
</table></div>


<div>
 <div>
 
      
 </div>
 <div>
  
 </div>
</div>
</div>

</body>
</html>
