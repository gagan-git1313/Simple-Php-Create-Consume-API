<?php
header("Content-Type:application/json");
if (isset($_GET['user_id']) && $_GET['user_id']!="") {
	include('db.php');
	$user_id = $_GET['user_id'];
	$result = mysqli_query(
	$con,
	"SELECT * FROM `user` WHERE id=$user_id");
	if(mysqli_num_rows($result)>0){
	$row = mysqli_fetch_array($result);
	$name = $row['name'];
	$age = $row['age'];
	response($user_id, $name, $age);
	mysqli_close($con);
	}else{
		response(NULL, NULL, NULL,200,"No Record Found");
		}
}else{
	response(NULL, NULL, NULL,400,"Invalid Request");
	}

function response($user_id,$name,$age){
	$response['user_id'] = $user_id;
	$response['name'] = $name;
	$response['age'] = $age;
    $response['response_code'] = 200;
	$response['response_message'] = "found";
	$json_response = json_encode($response);
	echo $json_response;
}
?>