<?php
include("./dbconnection/db.php");
include("./navForLogged.php");


 if(isset($_REQUEST['srch'])){

    $searchData=$_REQUEST['srch'];

    $db= $con->query("SELECT * FROM organization_details_tbl a  

JOIN address_details_tbl b ON a.customer_id=b.customer_id

JOIN banking_details_tbl c ON a.customer_id=c.customer_id where a.customer_id = $searchData");
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