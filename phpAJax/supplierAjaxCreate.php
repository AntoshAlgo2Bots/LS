<?php
$conn=mysqli_connect("localhost","root","Algo@123","vivek") or die("connection failed");


if(isset($_REQUEST['oraganigation_name'])){
    $db=$conn->query("insert into supplier_organization_details_tbl(oraganigation_name,oraganigation_type, gst_number,supplier_code,supplier_name,supplier_type,sub_supplier_type,supplier_status,starting_date,ending_date,person_name,person_email,person_number)values('{$_REQUEST['oraganigation_name']}','{$_REQUEST['oraganigation_type']}','{$_REQUEST['gst_number']}','{$_REQUEST['supplier_code']}','{$_REQUEST['supplier_name']}','{$_REQUEST['supplier_type']}','{$_REQUEST['sub_supplier_type']}','{$_REQUEST['supplier_status']}','{$_REQUEST['starting_date']}','{$_REQUEST['ending_date']}','{$_REQUEST['person_name']}','{$_REQUEST['person_email']}','{$_REQUEST['person_number']}') ");


    if($db){
        $response["success"]=true;
        $response["message"]= "user created success fully";
        $response['inserted_id']=mysqli_insert_id($conn);
    }else{
        $response['success']= false;
        $response['message'] = 'something went wrong please try again';
        $response['sql_error'] = mysqli_error($conn);
    }
}   


if(isset($_REQUEST['site_code'])){
    $db=$conn->query("insert into supplier_address_details_tbl(site_code,site_name,site_description,address_line_1,address_line_2,postal_code,city,state,country,person_name,person_email,person_number)values('{$_REQUEST['site_code']}','{$_REQUEST['site_name']}','{$_REQUEST['site_description']}','{$_REQUEST['address_line_1']}','{$_REQUEST['address_line_2']}','{$_REQUEST['postal_code']}','{$_REQUEST['city']}','{$_REQUEST['state']}','{$_REQUEST['country']}','{$_REQUEST['person_name']}','{$_REQUEST['person_email']}' ,'{$_REQUEST['person_number']}')");


    if($db){
        $response["success"]=true;
        $response["message"]= "user created success fully";
        $response['inserted_id']=mysqli_insert_id($conn);
    }else{
        $response['success']=false;
        $response['message'] = 'something went wrong please try again';
        $response['sql_error'] = mysqli_error($conn);
    }
}

if(isset($_REQUEST['site_code'])){
    $db=$conn->query("insert into supplier_banking_details_tbl(site_code,branch_name_,brach_number,brach_type,bank_name,bank_number,bank_type,account_name,account_number,account_type,ifsc_code)values('{$_REQUEST['site_code']}','{$_REQUEST['branch_name_']}','{$_REQUEST['brach_number']}','{$_REQUEST['brach_type']}','{$_REQUEST['bank_name']}','{$_REQUEST['bank_number']}','{$_REQUEST['bank_type']}','{$_REQUEST['account_name']}','{$_REQUEST['account_number']}','{$_REQUEST['account_type']}','{$_REQUEST['ifsc_code']}')");


    if($db){
        $response["success"]=true;
        $response["message"]= "use created success fully";
        $response['inserted_id']=mysqli_insert_id($conn);
    }else{
        $response['success']=false;
        $response['message'] = 'something went wrong please try again';
        $response['sql_error'] = mysqli_error($conn);
    }
}
echo json_encode($response);
?>