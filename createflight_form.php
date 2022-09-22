<?php 
session_start();
?>
<html>
  <head>
  	<meta charset="utf-8">
  	<title>Добавить рейс</title>
  	<style>
  	    div a[target="_blank"]{
    	display: none;
        }
    	body,html{
    	    scroll-behavior: smooth;
    	    width: 100%;
    	    margin: 0;
    	    font-family: 'Roboto', sans-serif;
    	    background: lightgrey;
    	}
    	h1{
	    font-size: 3vw;
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
	    input {
	        text-align:center;
            font-size: 1.5vw;
           display: block;
           width: 30vw;
           padding: 0;
           line-height: 4vw;
           font-family: 'Roboto', sans-serif;
           background: none;
           border-width: 0;
           border-bottom: 2px solid #4a90e2;
           transition: all 0.2s ease;
        }
        input:focus {
           outline: 0;
           border-color: #4a90e2;
            }
            .form-row {
            position: relative;
            margin-bottom: 3vw;
        }
        input[type="submit"] {
           width: 100%;
           padding: 0;
           line-height: 3.5vw;
           background: #4a90e2;
           border-width: 0;
           color: white;
           font-size: 2vw;
           cursor: pointer;
           transition: all .2s ease;
        }
        input[type="submit"]:hover {
           background: #a5ceff;
        }
	    </style>
  </head>
  <body>
      <a class=backtomain href=index.php>Назад на главную</a>
      <?php if($_SESSION['Admin']==1){ ?>
      <center>
  		<h1>Добавление нового рейса</h1>
  	<form action="createflights.php" method="post">
  		<h2>Введите название компании</h2>
  		<input type="text" name="Company" placeholder="Компания" required="">
  		<h2>Введите цену билета эконом класса</h2>
  		<input type="text" name="Price" placeholder="Цена билета эконом класса" min="0" required="">
  		<h2>Введите цену билета бизнес класса (при наличии)</h2>
  		<input type="text" placeholder="Цена билета бизнес класса" min="0" name="Business_Class_Price"> 		
  		<h2>Введите максимальное кол-во пассажиров</h2>
  		<input type="number" placeholder="Кол-во пассажиров" min="0" name="Max_Passengers" required="">
  		<h2>Введите время полета</h2>
  		<input type="time" placeholder="Время полета"name="Flight_Time" required="">
  		<h2>Введите страну прибытия</h2>
  		<input type="text" placeholder="Страна прибытия" name="Arrival_Country" required="">
  		<h2>Введите страну вылета</h2>
  		<input type="text" placeholder="Страна вылета" name="Departure_Country" required="">
  		<h2>Введите аэропорт прибытия</h2>
  		<input type="text" placeholder="Аэропорт прибытия" name="Arrival_Airport" required="">
  		<h2>Введите аэропорт вылета</h2>
  		<input type="text" placeholder="Аэропорт вылета" name="Departure_Airport" required="">
  		<h2>Введите город прибытия</h2>
  		<input type="text" placeholder="Город прибытия" name="Arrival_City" required="">
  		<h2>Введите город вылета</h2>
  		<input type="text" placeholder="Город вылета" name="Departure_City" required="">
  		<h2>Введите дату вылета</h2>
  		<input type="date" name="Departure_Date" required="">
  		<h2>Введите дату прибытия</h2>
  		<input type="date" name="Arrival_Date" required="">
  		<h2>Введите время вылета</h2>
  		<input type="time" name="Departure_Time" required="">
  		<h2>Введите время прибытия</h2>
  		<input type="time" name="Arrival_Time" required="">
  		<h2>Введите максимальный вес ручной клади</h2>
  		<input type="number" placeholder="Вес ручной клади" name="Hand_Luggage_Weight" required="" min="0">
  		<br><br>
  		<input type="submit" name="sub3">
  	</form>
  	</center>
  	<?php } else echo "<center><h1>У вас не достаточно прав</h1></center>"?>
  </body>
  </html>