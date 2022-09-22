<?php 
if(isset($_POST['surname'])&&isset($_POST['name'])&&isset($_POST['patronymic'])&&isset($_POST['login'])&&isset($_POST['gender'])&&isset($_POST['number'])&&isset($_POST['password'])&&isset($_POST['repeat_password'])){
	$surname=$_POST['surname'];
	$name=$_POST['name'];
	$patronymic=$_POST['patronymic'];
	$login=$_POST['login'];
	$gender=$_POST['gender'];
	$number=$_POST['number'];
	$password=$_POST['password'];

	$options = ['cost' => 10];
	$hash=password_hash($password, PASSWORD_BCRYPT, $options);

	$db=@mysqli_connect('localhost','id17713506_mysql','4e~kkV~hTdf7hr)8','id17713506_test') or die(mysqli_connect_error());
	//Проверка
	
	    $sqllogin="SELECT id FROM Users WHERE login='$login'";
	    $check=mysqli_fetch_array(mysqli_query($db,$sqllogin));
	    if(count($check)>0)
    	if(($_SERVER['REQUEST_METHOD'] == 'POST') && isset($_POST['sub4']) && (!empty($_POST['sub4']))){
    	$content = http_build_query(array('login' => 'false'));
        header("location:registration_form.php?".$content);
        exit();
        
    	}
    	else {
    	    echo json_encode(false); 
    	    exit();
    	}
	//
	$result=mysqli_query($db,"INSERT INTO `Users` (id,Surname,Name,Patronymic,Login,Gender,Number,Password) VALUES (NULL, '$surname', '$name', '$patronymic', '$login','$gender','$number','$hash')");
	$sql2="SELECT * FROM Users WHERE Login='$login'";
	    $result2=mysqli_fetch_array(mysqli_query($db,$sql2));
	
	if(($_SERVER['REQUEST_METHOD'] == 'POST') && isset($_POST['sub4']) && (!empty($_POST['sub4']))){
	    
	    $id = $result2['id'];
	    $admin=$result2['Admin'];
	    session_start();
        $_SESSION['login_user']=$login;
        $_SESSION['id_user']=$id;
        $_SESSION['Admin']=$admin;
        $db->close();
        header("location: profile.php");
	   // header('Location: ' . $_SERVER['HTTP_REFERER']);
	}
	else {
	    $db->close();
	    echo json_encode($result2);
	}
	
}

?>