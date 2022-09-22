<?php 
if(isset($_POST['login'])&&isset($_POST['password'])){
	$login=$_POST['login'];
	$password=$_POST['password'];
	
	$db=@mysqli_connect('localhost','id17713506_mysql','4e~kkV~hTdf7hr)8','id17713506_test') or die(mysqli_connect_error());
	$sql="SELECT * FROM Users WHERE Login='$login'";
	$result=mysqli_fetch_array(mysqli_query($db,$sql));
	$hesh = $result['Password'];
	$id = $result['id'];
	$admin=$result['Admin'];
	$db->close();
	if(password_verify($password, $hesh)){
    if(($_SERVER['REQUEST_METHOD'] == 'POST') && isset($_POST['subm']) && (!empty($_POST['subm']))){
    session_start();
    $_SESSION['login_user']=$login;
    $_SESSION['id_user']=$id;
    $_SESSION['Admin']=$admin;
    header("location:profile.php"); 
    } 
    else echo json_encode($result);
	}
    else {
    if(($_SERVER['REQUEST_METHOD'] == 'POST') && isset($_POST['subm']) && (!empty($_POST['subm']))){
    // echo '<script>alert("Авторизация не прошла");</script>';
    $content = http_build_query(array('auth' => 'false'));
    header("location:authorization_form.php?".$content);
    exit();
    }
    else echo json_encode(false);
    }
}
?>