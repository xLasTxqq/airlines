<?php
if(isset($_POST['id_user'])&&isset($_POST['login_user'])&&isset($_POST['password_user'])){
$login=$_POST['login_user'];
$id=$_POST['id_user'];
$password=$_POST['password_user'];
$sql="SELECT Company,Departure_Date,Departure_Time,Quantity,t.Price*Quantity FROM Tickets AS t INNER JOIN Users AS u on u.id=t.id_user INNER JOIN Flights AS f on f.id=t.id_flight WHERE u.id='$id' and u.Login='$login' and u.Password='$password'";
$db=@mysqli_connect('localhost','id17713506_mysql','4e~kkV~hTdf7hr)8','id17713506_test') or die(mysqli_connect_error());
$result=mysqli_query($db,$sql);
$db->close();

$mass2=[];
$mass3=[];
while($row=mysqli_fetch_array($result)){
$mass[]=$row;
    for($i=0; $i<count($row)/2; $i++){
        $mass2[]=$row[$i];
    }
    // $mass3[]=$mass2;
    // $mass2=[];
}
if($mass2==[])echo json_encode(null);
else echo json_encode($mass2);

}
