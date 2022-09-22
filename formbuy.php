<?php
	session_start();
	if(!isset($_SESSION['login'])) echo "<center><h1>Чтобы купить билет - зарегистрируйтесь!</h1></center>";
	else
	if(isset($_POST['id_flight'])&&isset($_SESSION['class_flight'])){
		$id_flight=$_SESSION['id_flight'];
		$id_flight=$_POST['id_flight'];
		$db=@mysqli_connect('localhost','id17713506_mysql','4e~kkV~hTdf7hr)8','id17713506_test') or die(mysqli_connect_error());
		$_SESSION['class_flight']=='bus' ? $sql="SELECT Business_Class_Price,Remaining_passengers FROM Flights WHERE id=$id_flight" : $sql="SELECT Price,Remaining_passengers FROM Flights WHERE id=$id_flight";
		$result=mysqli_fetch_array(mysqli_query($db,$sql));
		$price=$result[0];
		$remaining_passengers=$result[1];
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Покупка билета</title>
	<style>
	    html,body{
	        width: 100%;
	        height: 100%;
	        /*margin: 0;*/
	        /*padding: 0;*/
	        text-align:center;
	    }
	</style>
</head>
<body>
    <h1><?php echo "Цена за человека <span id=price>$price</span>"."р"; ?></h1>
    <form action=buy.php method=post>
    <h1>Количество человек:</h1>
    <input type=number min=1 max="<?php echo $remaining_passengers; ?>" id=quantity onChange=sum(Number(this.value),Number(this.max)) name=quantity value=1>
    <br>
    <input type=submit id=sub value=Оплатить>
<script type="text/javascript">
	let price = document.getElementById('price').innerHTML;
	let sub = document.getElementById('sub');
	let inp = document.getElementById('quantity');
	function sum(val,max){
	    if(val > max){inp.value=max;
	    sub.value="Оплатить "+max*price+"р"
	    }
	    else
	    sub.value="Оплатить "+val*price+"р"
	}
	sum(1);
</script>
</body>
</html>
<?php
}
?>