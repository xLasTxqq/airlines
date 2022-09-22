<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Авиабилеты</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="shortcut icon" href="Logo.png" type="image/png">
</head>
<body>
	<header class="header">
		<div class="header-logo">
			<img class="logo-image" src="Logo.png">
			<h1 class="logo-text">Lines</h1>
		</div>
		<div class="header-auth">
		    <a href="download/AirLines.apk" download>Скачать приложение</a>
		    <?php if($_SESSION['Admin']==1){echo "<a class=add href=createflight_form.php>Добавить рейс</a>";}
            if(!isset($_SESSION['login_user'])||!isset($_SESSION['id_user'])){ 
			    echo "<a class=aut href=authorization_form.php>Авторизироваться</a>
				<a class=reg href=registration_form.php>Зарегистрироваться</a>";
			} 
			else { 
			    echo "<a class=cabinet href=profile.php> Личный кабинет</a>
				<a class=out href=exit.php>Выход</a>";
			} ?>
		</div>
	</header>	
	<main class="main">
		<form class=main-filter action="filter.php" method="POST">
			<div class="group" style="margin-bottom: 5vh;">      
                <input type="number" class="filterinput" value=1 name="humans" placeholder=" " min=1>
                <span class="bar"></span>
                <label>Количество человек</label>
            </div>
			<h2>Откуда:</h2>
			<div class="group">      
                <input type="text" class="filterinput" name="from_country" placeholder=" ">
                <span class="bar"></span>
                <label>Страна вылета</label>
            </div>
            <div class="group">      
                <input type="text" class="filterinput" name="from_city" placeholder=" ">
                <span class="bar"></span>
                <label>Город вылета</label>
            </div>
            <div class="group" style="margin-bottom: 5vh;">      
                <input type="text" class="filterinput" name="from_airport" placeholder=" ">
                <span class="bar"></span>
                <label>Аэропорт вылета</label>
            </div>
            <h2>Куда:</h2>
            <div class="group">      
                <input type="text" class="filterinput" name="to_country" placeholder=" ">
                <span class="bar"></span>
                <label>Страна прилёта</label>
            </div>
            <div class="group">      
                <input type="text" class="filterinput" name="to_city" placeholder=" ">
                <span class="bar"></span>
                <label>Город прилёта</label>
            </div>
            <div class="group" style="margin-bottom: 5vh;">      
                <input type="text" class="filterinput" name="to_airport" placeholder=" ">
                <span class="bar"></span>
                <label>Аэропорт прилёта</label>
            </div>
			<h2>Цена:</h2>
			<div class="group">      
                <input type="number" class="filterinput" name="money_from" placeholder=" " min="0">
                <span class="bar"></span>
                <label>От...</label>
            </div>
            <div class="group" style="margin-bottom: 5vh;">      
                <input type="number" class="filterinput" name="money_to" placeholder=" " min="1">
                <span class="bar"></span>
                <label>До...</label>
            </div>
            <h2>Дата вылета</h2>
            <?php $today = date("Y-m-d");
            echo "<input class=filterinput-date type=date name=date min=$today>"?>
			<h2>Класс</h2>
			<div class=chooseclass>
    			<input type="radio" id=rad1  value="eco" name="class" checked="">
    			<label class=radiolabel for="rad1">Эконом-класс</label>
    			<input type="radio" id=rad2 value="bus" name="class">	
    			<label class=radiolabel for="rad2">Бизнес-класс</label>
			</div>
			<input type="submit" class="sub" name="subm2" value="Найти">
		</form>
		<div class="main-flights">
        <?php 
		  if(isset($_SESSION['filter'])){
		      $humans=$_SESSION['humans'];
		      $mass=$_SESSION['filter'];
		      for($i=0;$i<count($mass);$i++){
		          $_SESSION['class_flight']=='bus' ? $price=$mass[$i][3] : $price=$mass[$i][1];
		          $summ=$price*$humans;
		          echo "<div class=filblock>";
		          echo "<h1 class=namecompany>Компания: {$mass[$i][2]}</h1>
            	    <div class=cenflex>
            		<div class=left>
            			<h2>Вылет: {$mass[$i][13]}, {$mass[$i][15]}</h2>
            			<h2>Откуда: {$mass[$i][8]}, {$mass[$i][12]}</h2>
            			<h2>Аэропорт: {$mass[$i][10]}</h2>
            		</div>
            		<div class=center>
            			<h2>Время полета: {$mass[$i][6]}</h2>
            		</div>
            		<div class=right>
            			<h2>Прилет: {$mass[$i][14]}, {$mass[$i][16]}</h2>
            			<h2>Куда: {$mass[$i][7]}, {$mass[$i][11]}</h2>
            			<h2>Аэропорт: {$mass[$i][9]}</h2>
            		</div>
            	</div>
            	    <h1 class=weight>Допустимый вес ручной клади: {$mass[$i][17]} кг</h1>
            	    <form action=buy.php method=post class=priceform>
	                <h2>Цена за человека: $price р</h2>
            		<input value={$mass[$i][0]} name=id_flight hidden>
            		<input class=buy-submit type=submit name=sub2 value='Купить за $summ р' >
	                </form>
		            </div>";
		      }
        }
        else echo "<center><h1>Ничего не найдено, попробуйте изменить параметры в фильтре</h1></center>";?>
		</div>
	</main>
</body>
</html>