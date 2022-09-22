<?php  
if(isset($_POST['Price'])&&isset($_POST['Company'])&&isset($_POST['Business_Class_Price'])&&isset($_POST['Max_Passengers'])&&isset($_POST['Flight_Time'])&&isset($_POST['Arrival_Country'])&&isset($_POST['Departure_Country'])&&isset($_POST['Arrival_Airport'])&&isset($_POST['Departure_Airport'])&&isset($_POST['Arrival_City'])&&isset($_POST['Departure_City'])&&isset($_POST['Departure_Date'])&&isset($_POST['Arrival_Date'])&&isset($_POST['Departure_Time'])&&isset($_POST['Arrival_Time'])&&isset($_POST['Hand_Luggage_Weight'])){
    
    $Price=(double)$_POST['Price'];
    $Company=$_POST['Company'];
    $_POST['Business_Class_Price']=='' ?  $Business_Class_Price=null : $Business_Class_Price=(double)$_POST['Business_Class_Price'];
    $Max_Passengers=(int)$_POST['Max_Passengers'];
    $Flight_Time=$_POST['Flight_Time'];
    $Arrival_Country=$_POST['Arrival_Country'];
    $Departure_Country=$_POST['Departure_Country'];
    $Arrival_Airport=$_POST['Arrival_Airport'];
    $Departure_Airport=$_POST['Departure_Airport'];
    $Arrival_City=$_POST['Arrival_City'];
    $Departure_City=$_POST['Departure_City'];
    $Departure_Date=$_POST['Departure_Date'];
    $Arrival_Date=$_POST['Arrival_Date'];
    $Departure_Time=$_POST['Departure_Time'];
    $Arrival_Time=$_POST['Arrival_Time'];
    $Hand_Luggage_Weight=(int)$_POST['Hand_Luggage_Weight'];
    
	$db=@mysqli_connect('localhost','id17713506_mysql','4e~kkV~hTdf7hr)8','id17713506_test') or die(mysqli_connect_error());
	$sql="INSERT INTO `Flights` (Price,Company,Business_Class_Price,Max_Passengers,Flight_Time,Arrival_Country,Departure_Country,Arrival_Airport,Departure_Airport,Arrival_City,Departure_City,Departure_Date,Arrival_Date,Departure_Time,Arrival_Time,Hand_Luggage_Weight) VALUES ($Price,'$Company',$Business_Class_Price,$Max_Passengers,'$Flight_Time','$Arrival_Country','$Departure_Country','$Arrival_Airport','$Departure_Airport','$Arrival_City','$Departure_City','$Departure_Date','$Arrival_Date','$Departure_Time','$Arrival_Time',$Hand_Luggage_Weight)";
	$result=mysqli_query($db,$sql);
	$db->close();
	if($result==1)
	if(($_SERVER['REQUEST_METHOD'] == 'POST') && isset($_POST['sub3']) && (!empty($_POST['sub3'])))	
	header("location: index.php");
    else echo json_encode(true);
	else echo "<center><h1>Ошибка</h1></center>";
}
?>