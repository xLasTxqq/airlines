<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Личный кабинет</title>
	<style>
	    div a[target="_blank"]{
    	display: none;
        }
    	body,html{
    	    width: 100%;
    	    margin: 0;
    	    font-family: 'Roboto', sans-serif;
    	    background: lightgrey;
    	    text-align: center;
    	}
    	h1{
	    font-size: 3vw;
	    }
	    table {
        font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
        font-size: 1vw;
        border-collapse: collapse;
        text-align: center;
        margin: 0 auto 2vw auto;
        /*margin-bottom: 2vw;*/
        }
        th, td:first-child {
        background: #AFCDE7;
        color: white;
        padding: 1vw 2vw;
        }
        th, td {
        border-style: solid;
        border-width: 0 1px 1px 0;
        border-color: white;
        }
        td {
        background: #D8E6F3;
        }
        th:first-child, td:first-child {
        text-align: left;
        }
        .backtomain{
	        display: block;
	        padding: 10px 0;
	        box-sizing: border-box;
            background: rgba(255, 255, 255, 0.7);
            text-align: center;
            box-shadow: 1px 0 3px rgb(0 0 0 / 30%);
            
            text-decoration: none;
            outline: none;
            font-size: 1.5vw;
            text-transform: uppercase;
            font-family: Cambria, Georgia, serif;
            letter-spacing: 1px;
            color: #333;
            font-weight: 700;
            transition: all .2s ease;
	    }
	    .backtomain:hover{
	        background: #686868b3;
	    }
	</style>
</head>
<body>
    <a class=backtomain href=index.php>Назад на главную</a>
    <!--<center>-->
<?php
if(isset($_SESSION['id_user'])&&isset($_SESSION['login_user'])){
$login=$_SESSION['login_user'];
$id=$_SESSION['id_user'];
// $sql="SELECT * FROM Users WHERE Login='$login'";
$sql="SELECT Company,Departure_Date,Departure_Time,Quantity,t.Price*Quantity FROM Tickets AS t INNER JOIN Users AS u on u.id=t.id_user INNER JOIN Flights AS f on f.id=t.id_flight WHERE u.id=$id";
$db=@mysqli_connect('localhost','id17713506_mysql','4e~kkV~hTdf7hr)8','id17713506_test') or die(mysqli_connect_error());
$result=mysqli_query($db,$sql);
$db->close();


while($row=mysqli_fetch_array($result)){
$mass[]=$row;
}

// print_r($mass);
// print_r(count($mass));
if(count($mass)>0){
?>
    <h1>Личный кабинет</h1>
    <table border="1">
   <caption>Купленные билеты</caption>
   <tr>
    <th>Компания</th>
    <th>Дата вылета</th>
    <th>Время вылета</th>
    <th>Кол-во человек</th>
    <th>Цена</th>
   </tr>
    <?php
    for($j=0; $j<count($mass);$j++){
    echo "<tr>";
    for($i=0; $i<(count($mass[$j])/2); $i++){
        echo "<td>{$mass[$j][$i]}</td>";
    }
    echo "</tr>";
    }
    ?>  
    </table>
<?php } else echo "<h1>У вас нет купленных билетов</h1>"; ?>
<?php } else echo "<h1>Авторизируйтесь, чтобы пользоваться личным кабинетом</h1>"; ?>
    <!--<a href="index.php">Назад</a>-->
    <!--</center>-->
</body>
</html>
