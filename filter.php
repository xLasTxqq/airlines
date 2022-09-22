<?php 
session_start();
if(isset($_POST['humans'])&&isset($_POST['from_country'])&&isset($_POST['from_city'])&&isset($_POST['from_airport'])&&isset($_POST['to_country'])&&isset($_POST['to_city'])&&isset($_POST['to_airport'])&&
	isset($_POST['money_from'])&&isset($_POST['money_to'])&&isset($_POST['date'])&&isset($_POST['class'])){
	    unset($_SESSION['class_flight']);
	    unset($_SESSION['filter']);
	    unset($_SESSION['humans']);
	trim($_POST['humans'])=='' ? $humans=1 : $humans=trim($_POST['humans']);
	$from_country=trim($_POST['from_country']);
	$from_city=trim($_POST['from_city']);
	$from_airport=trim($_POST['from_airport']);
	$to_country=trim($_POST['to_country']);
	$to_city=trim($_POST['to_city']);
	$to_airport=trim($_POST['to_airport']);
	$money_from=(double)trim($_POST['money_from']);
	$money_to=(double)trim($_POST['money_to']);
	$date=trim($_POST['date']);
	$class=trim($_POST['class']);
	$sql="SELECT * FROM Flights WHERE ";
	if($humans!=''&&$humans!=null)$sql.="(Max_Passengers-Now_Passengers)>='$humans'";
	if($sql[-3]!="N"&&$sql[-2]!="D"&&$sql[-2]!="E"&&$sql[-1]!=" ")$sql.=" AND ";
	if($from_country!=''&&$from_country!=null)$sql.="Departure_Country LIKE '%$from_country%'";
	if($sql[-3]!="N"&&$sql[-2]!="D"&&$sql[-2]!="E"&&$sql[-1]!=" ")$sql.=" AND ";
	if($from_city!=''&&$from_city!=null)$sql.="Departure_City LIKE '%$from_city%'";
	if($sql[-3]!="N"&&$sql[-2]!="D"&&$sql[-2]!="E"&&$sql[-1]!=" ")$sql.=" AND ";
	if($from_airport!=''&&$from_airport!=null)$sql.="Departure_Airport LIKE '%$from_airport%'";
	if($sql[-3]!="N"&&$sql[-2]!="D"&&$sql[-2]!="E"&&$sql[-1]!=" ")$sql.=" AND ";
	if($to_airport!=''&&$to_airport!=null)$sql.="Arrival_Airport LIKE '%$to_airport%'";
	if($sql[-3]!="N"&&$sql[-2]!="D"&&$sql[-2]!="E"&&$sql[-1]!=" ")$sql.=" AND ";
	if($to_city!=''&&$to_city!=null)$sql.="Arrival_City LIKE '%$to_city%'";
	if($sql[-3]!="N"&&$sql[-2]!="D"&&$sql[-2]!="E"&&$sql[-1]!=" ")$sql.=" AND ";
	if($to_country!=''&&$to_country!=null)$sql.="Arrival_Country LIKE '%$to_country%'";
	if($sql[-3]!="N"&&$sql[-2]!="D"&&$sql[-2]!="E"&&$sql[-1]!=" ")$sql.=" AND ";
	if($money_from!=''&&$money_from!=null&&$class=='bus')$sql.="Business_Class_Price > $money_from";
	if($money_from!=''&&$money_from!=null&&$class=='eco')$sql.="Price > $money_from";
	if($sql[-3]!="N"&&$sql[-2]!="D"&&$sql[-2]!="E"&&$sql[-1]!=" ")$sql.=" AND ";
	if($money_to!=''&&$money_to!=null&&$class=='bus')$sql.="Business_Class_Price < $money_to";
	if($money_to!=''&&$money_to!=null&&$class=='eco')$sql.="Price < $money_to";
	if($sql[-3]!="N"&&$sql[-2]!="D"&&$sql[-2]!="E"&&$sql[-1]!=" ")$sql.=" AND ";
	if($date!=''&&$date!=null)$sql.="Departure_Date LIKE '%$date%'";
	if($sql[-3]!="N"&&$sql[-2]!="D"&&$sql[-2]!="E"&&$sql[-1]!=" ")$sql.=" AND ";

	if($class!=''&&$class!=null&&$class=='bus')$sql.="Business_Class_Price IS NOT NULL ORDER BY Business_Class_Price ASC";
	else if($class!=''&&$class!=null&&$class=='eco'){ substr($sql, 0, -4); $sql.="Price IS NOT NULL ORDER BY Price ASC";}
    
	$db=@mysqli_connect('localhost','id17713506_mysql','4e~kkV~hTdf7hr)8','id17713506_test') or die(mysqli_connect_error());
	$result=mysqli_query($db,$sql);
	$db->close();
	
	while($row=mysqli_fetch_array($result)){
    for($i=1; $i<mysqli_num_fields($result)+1; $i++){
    $array1[]=$row[$i-1];
    }
    $array2[]=$row;
    }
	if(($_SERVER['REQUEST_METHOD'] == 'POST') && isset($_POST['subm2']) && (!empty($_POST['subm2']))){
	   $_SESSION['class_flight']=$class;
	   $_SESSION['filter']=$array2;
	   $_SESSION['humans']=$humans;
	   echo "<script>function goBack() {window.history.back();} goBack();</script>";
	// header("location:index.php");
	// header('Location: ' . $_SERVER['HTTP_REFERER']);
    // header("location:index.php?".http_build_query($array1));
    }
    else echo json_encode($array1);
}
?>
