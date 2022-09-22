<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Регистрация</title>
	<style>
    	div a[target="_blank"]{
    	display: none;
        }
    	body,html{
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
	    form{
	        max-width: 25vw;
	        padding: 5vw 2vw 2vw;
               margin: 5vw auto 2vw;
               background: white;
	    }
	    .center{
	        display:block;
	        text-align:center;
	        cursor: default;
	    }
	    .auth{
            font-size: 2vw;
            margin-bottom: 2vw;
            cursor: pointer;
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
        .inp {
            font-size: 1.5vw;
           display: block;
           width: 100%;
           padding: 0;
           line-height: 4vw;
           font-family: 'Roboto', sans-serif;
           background: none;
           border-width: 0;
           border-bottom: 2px solid #4a90e2;
           transition: all 0.2s ease;
        }
        label {
           cursor:text;
           position: absolute;
           left: 1vw;
           color: #9d959d;
           font-size: 1.5vw;
           font-weight: 300;
           transform: translateY(-2.5vw);
           transition: all 0.2s ease;
            }
        .inp:focus {
           outline: 0;
           border-color: #4a90e2;
            }
            .form-row {
            position: relative;
            margin-bottom: 3vw;
        }
        .inp:focus+label, .inp:valid+label {
            cursor:default;
           transform: translateY(-5vw);
           margin-left: -1vw;
           font-size: 1.1vw;
           font-weight: 400;
           outline: 0;
           border-color: #4a90e2;
           color: #4a90e2;
        }
        h2{
            text-align:center;
            color: red;
        }
        .inp:not(:placeholder-shown):invalid~label{
         cursor:default;
         transform: translateY(-5vw);
         margin-left: -1vw;
         font-size: 1.1vw;
         font-weight: 400;
         outline: 0;
         border-color: #F77A52;
         color: #F77A52;
	    }
	    .inp:not(:placeholder-shown):invalid{
	        border-color: #F77A52;
	    }
	    
	    
	    .chooseclass input[type=radio]{
		display: none;
	    }
	    .chooseclass .radiolabel{
        left: 0;
        transform: translateY(0);
	    position: relative;
	    background: grey;
	    font-size: 1.2vw;
	    font-weight: 700;
	    /*color: white;*/
	    color: white;
		display: inline-block;
		cursor: pointer;
		padding: 1.5vw 1vw 1.5vw 1vw;
		border: 1px solid white;
		transition: 0.2s ease all;
	    -moz-transition: 0.2s ease all;
	    -webkit-transition: 0.2s ease all;
	    }
	    .chooseclass input[type=radio]:checked+.radiolabel{
		background: #ffffff;
		color: black;
		border-color: #4a90e2;
	    }
	    .chooseclass .radiolabel:hover {
    	transform: scale(0.9);
    	}
    	.chooseclass{
	    /*margin: 2vw 0 5vw 0;*/
	    justify-content: space-evenly;
	    display: flex;
	    }
	    .pol{
	        text-align:center;
	        position: relative;
	        display: block;
	        flex-direction: column;
	        left: 0;
	        margin-bottom: 2vw;
	        transform: translateY(0);

	    }
	</style>
</head>
<body>
    <a class=backtomain href=index.php>Назад на главную</a>


	
<form action="registration.php" method="POST">
    <h1 class=center>Регистрация</h1>
    <div class="form-row">
	<input class=inp type="text" pattern="^[-A-zА-яЁё]+$" placeholder=" " name="surname" autofocus required="" id=surname /><label for=surname>Фамилия</label>
	</div>
	<div class="form-row">
    <input class=inp type="text" pattern="^[-A-zА-яЁё]+$" placeholder=" " name="name" required="" id=name /><label for=name>Имя</label>
    </div>
    <div class="form-row">
    <input class=inp type="text" pattern="^[-A-zА-яЁё]+$" placeholder=" " name="patronymic" required="" id=patronymic /><label for=patronymic>Отчество</label>
    </div>
    <div class="form-row">
    <input class=inp type="text" pattern="^[0-9-.A-Za-z]+$" placeholder=" " name="login" required="" id=login /><label for=login>Логин</label>
    <?php if(isset($_GET['login'])&&$_GET['login']=='false') echo "<h2>Этот логин уже используется!</h2>"; ?>
    </div>
    
    
    <!--<div class="form-row">-->
    <!--<input class=inp type="text" placeholder=" " name="gender" required="" id=gender /><label for=gender>Пол</label>-->
    <!--</div>-->
    <div class="form-row">
    <label class=pol>Выберите пол</label>
    <div class="chooseclass">
    			<input type="radio" id=rad1  value="Мужской" name="gender" checked="">
    			<label class=radiolabel for="rad1">Мужской</label>
    			<input type="radio" id=rad2 value="Женский" name="gender">	
    			<label class=radiolabel for="rad2">Женский</label>
	</div>
	</div>
    
    <div class="form-row">
    <input class=inp type="tel" placeholder=" " pattern="^[ 0-9]+$" name="number" required="" id=number /><label for=number>Телефон</label>
    </div>
    <div class="form-row">
    <input class=inp type="password" placeholder=" " name="password" id="pass" required="" /><label for=pass>Пароль</label>
    </div>
    <div class="form-row">
    <input class=inp type="password" placeholder=" " name="repeat_password" id="passch" required="" /><label for=passch>Повтор пароля</label>
    </div>
    <input type="submit" name="sub4" value="Отправить">
</form>
<a class="center auth" href=authorization_form.php>Авторизироваться</a>

<script type="text/javascript">
	window.onload = function () {
	    document.getElementById("passch").onchange = validate;
	    document.getElementById("pass").onchange = validate;
	}
	function validate() {
		if (document.getElementById('pass').value != document.getElementById('passch').value)
		document.getElementById("passch").setCustomValidity("Пароли не совпадают"); 
		else document.getElementById("passch").setCustomValidity("");
	}
	</script>
</body>
</html>