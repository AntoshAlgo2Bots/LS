<?php
include('./dbconnection/db.php');


 if(isset($_REQUEST['srch'])){

    $searchData=$_REQUEST['srch'];

    $db= $con->query("SELECT * FROM gate_exit_tbl WHERE s_no = $searchData");
   $data=mysqli_fetch_assoc($db);

   if($data){
     $response["success"]=true;
     $response["message"]="user created success fully";
     $response['data']=$data;

   } else{
    $response['success']=false;
    $response['message']="something went wrong please try again";
    $response['sql_error']= mysqli_error($con);
   }
 }
 echo  json_encode($response);
?>