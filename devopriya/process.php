<?php

if(isset($_POST['submit'])){
	$category = $_POST['categories'];
	$sub_category = $_POST['sub_categories'];
	$comment = $_POST['comment'];
	$ingestion_time = date("Y/m/d h:m:s");
	
	//echo "$category";
	//echo "<br>";
	//echo "$sub_category";
	//echo "<br>";
	//echo "$comment";
	//echo "<br>";
	//echo "$ingestion_time";
	
	set_time_limit(0);
	
	$conn  = new mysqli("db-mysql-blr1-82262-do-user-13433417-0.i.db.ondigitalocean.com:25060","doadmin","AVNS_8JrUC6kgyaIWXPq5GNC","defaultdb");
	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	//echo "<br>";
	//echo "Connected successfully";
	//echo "<br>";
	//echo "<br>";
	
	$conn->query("INSERT INTO response_for_chatbot (categories, sub_categories, prompt, ingestion_time) VALUES ('$category', '$sub_category', '$comment', '$ingestion_time')");
	
	//echo "Inserted the data!!!";
	//echo "<br>";
	
	
	$python_script = 'myscript.py';
	
	exec("python $python_script 2>&1", $output_array);
	
	$output = implode("\n", $output_array);
	
	echo "$output";
	

}

else{
	echo "error";
}




?>