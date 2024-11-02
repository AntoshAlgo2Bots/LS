<?php
include('./dbconnection/db.php');


 if(isset($_REQUEST['srch'])){

    $searchData=$_REQUEST['srch'];

    $db= $con->query("SELECT * FROM lead_gen_attributes WHERE s_no = $searchData");
   $data=mysqli_fetch_assoc($db);

   if($data){
     $response["success"]=true;
     $response["message"]="user created success fully";
     $response['data']=$data;

   } else{
    $response['success']=false;
    $response['message']="This Serial Number is empty";
    $response['sql_error']= mysqli_error($con);
   }
 }






 echo  json_encode($response);
?>