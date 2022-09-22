<form action="index.php" method="POST">
<label>Enter User ID:</label><br />
<input type="text" name="user_id" placeholder="Enter User ID" required/>
<br /><br />
<button type="submit" name="submit">Submit</button>
</form>

<?php
if (isset($_POST['user_id']) && $_POST['user_id']!="") {
	$user_id = $_POST['user_id'];
	$url = "http://localhost/test/api.php?user_id=".$user_id;
	
	$client = curl_init($url);
	curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
	$response = curl_exec($client);
	
	$result = json_decode($response);
	
	echo "<table>";
	echo "<tr><td>User ID:</td><td>$result->user_id</td></tr>";
	echo "<tr><td>Name:</td><td>$result->name</td></tr>";
    echo "<tr><td>Age:</td><td>$result->age</td></tr>";
	echo "<tr><td>Response Code:</td><td>$result->response_code</td></tr>";
	echo "<tr><td>Response Message:</td><td>$result->response_message</td></tr>";
	echo "</table>";
}
    ?>