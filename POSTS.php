<?php 
$response = [];
if(isset($_POST['phone'])){
	$post=$_POST['phone'];
	$db=@mysqli_connect('localhost','id17713506_mysql','4e~kkV~hTdf7hr)8','id17713506_test') or die(mysqli_connect_error());
// 	$result=mysqli_query($db,"INSERT INTO `rent` (`id`, `Year`, `Month`, `Size`, `Money`) VALUES (NULL, '765', '867', '987', '87')");
$result=mysqli_query($db,"INSERT INTO rent (id, Year, Month, Size, Money) VALUES (NULL, 765, 867, 987, 87)");
$db->close();
echo json_encode($response);
}
else if(isset($_POST['variableget'])){
	$post=$_POST['variableget'];
	$db=@mysqli_connect('localhost','id17713506_mysql','4e~kkV~hTdf7hr)8','id17713506_test') or die(mysqli_connect_error());
	// $result=mysqli_query($db,"INSERT INTO `rent` (`id`, `Year`, `Month`, `Size`, `Money`) VALUES (NULL, '765', '867', '987', '87')");
	$result=mysqli_query($db,"SELECT * FROM rent");
	while($row = mysqli_fetch_array($result)){
    $response[] = $row['id'];
    $response[] = $row['Year'];
    $response[] = $row['Month'];
    $response[] = $row['Size'];
    $response[] = $row['Money'];
	}

	$db->close();
}
else {
	$response=["success"=>0,"message"=>"Required field(s) is missing"];
}
echo json_encode($response);
?>