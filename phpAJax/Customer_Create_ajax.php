<?php
$conn=mysqli_connect("localhost","root","Algo@123","vivek") or die("connection failed");


if(isset($_REQUEST['organization_name'])){
    $db=$conn->query("insert into organization_details_tbl(organization_name,organigation_type, gst_number,customer_name,customer_type,sub_cutomer,customer_status,starting_date,ending_date,contact_person_name,contact_person,contact_person_no)values
    ('{$_REQUEST['organization_name']}','{$_REQUEST['organigation_type']}','{$_REQUEST['gst_number']}','{$_REQUEST['customer_name']}','{$_REQUEST['customer_type']}','{$_REQUEST['sub_cutomer']}','{$_REQUEST['customer_status']}','{$_REQUEST['starting_date']}','{$_REQUEST['ending_date']}','{$_REQUEST['contact_person_name']}','{$_REQUEST['contact_person']}','{$_REQUEST['contact_person_no']}') ");


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
    $db=$conn->query("insert into address_details_tbl( site_code, site_name, site_description, add_line1,add_line2,postal_code, city_name,state,country,contact_preson_name,contact_person,contact_person_no)values('{$_REQUEST['site_code']}','{$_REQUEST['site_name']}','{$_REQUEST['site_description']}','{$_REQUEST['add_line1']}','{$_REQUEST['add_line2']}','{$_REQUEST['postal_code']}','{$_REQUEST['city_name']}','{$_REQUEST['state']}','{$_REQUEST['country']}','{$_REQUEST['contact_person_name']}','{$_REQUEST['contact_person']}','{$_REQUEST['contact_person_no']}') ");


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
    $db=$conn->query("insert into banking_details_tbl(site_code,branch_name,branch_no,branch_type,bank_name,bank_no,bank_type,account_name,account_no,account_type,ifsc_code)values('{$_REQUEST['site_code']}','{$_REQUEST['branch_name']}','{$_REQUEST['branch_no']}','{$_REQUEST['branch_type']}','{$_REQUEST['bank_name']}','{$_REQUEST['bank_no']}','{$_REQUEST['bank_type']}','{$_REQUEST['account_name']}','{$_REQUEST['account_no']}','{$_REQUEST['account_type']}','{$_REQUEST['ifsc_code']}') ");


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