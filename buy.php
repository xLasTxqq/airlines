<?php
session_start();
if(($_SERVER['REQUEST_METHOD'] == 'POST') && isset($_POST['sub2']) && (!empty($_POST['sub2'])))
if(!isset($_SESSION['login_user'])||!isset($_SESSION['id_user']))
echo '<script>alert("Чтобы купить билет - авторизируйтесь!");function goBack() {window.history.back();} goBack();</script>';
if(isset($_POST['id_flight'])&&
    (isset($_SESSION['class_flight'])||isset($_POST['class_flight']))&&
    (isset($_SESSION['id_user'])||isset($_POST['id_user']))&&
    (isset($_SESSION['humans'])||isset($_POST['humans']))){

$humans=$_POST['humans'] ?? $_SESSION['humans'];
$id_flight=$_POST['id_flight'];
$class_flight=$_POST['class_flight'] ?? $_SESSION['class_flight'];
$id_user=$_POST['id_user'] ?? $_SESSION['id_user'];
$db=@mysqli_connect('localhost','id17713506_mysql','4e~kkV~hTdf7hr)8','id17713506_test') or die(mysqli_connect_error());
$class_flight=='bus' ? $sql="SELECT Business_Class_Price,Remaining_passengers FROM Flights WHERE id=$id_flight" : $sql="SELECT Price,Remaining_passengers FROM Flights WHERE id=$id_flight";
$result=mysqli_fetch_array(mysqli_query($db,$sql));
$price=$result[0];
$remaining_passengers=$result[1];

if((int)$humans<=(int)$remaining_passengers){
$result1=mysqli_query($db,"INSERT INTO `Tickets` (Quantity,id_user,id_flight,Price) VALUES ('$humans','$id_user','$id_flight','$price')");

$result2=mysqli_query($db,"UPDATE Flights SET Now_Passengers=(select sum(Quantity) from Tickets where id_flight=$id_flight) where id=$id_flight");
}
else echo "<center><h1>Мест в самолете не хватает</h1></center>";
if($result1&&$result2)
(($_SERVER['REQUEST_METHOD'] == 'POST') && isset($_POST['sub2']) && (!empty($_POST['sub2']))) ? 
header("location:profile.php") : print(json_encode(true));
else echo "<center><h1>Произошла ошибка!</h1></center>";

$db->close();
}

?>