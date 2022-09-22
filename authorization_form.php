<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Авторизация</title>
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
            cursor=default;
           transform: translateY(-5vw);
           margin-left: -1vw;
           font-size: 1.1vw;
           font-weight: 400;
           outline: 0;
           border-color: #4a90e2;
           color: #4a90e2;
        }
        .reg{
            font-size: 2vw;
            cursor: pointer;
            margin-bottom: 2vw;
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
	</style>
</head>
<body>
<a class=backtomain href=index.php>Назад на главную</a>

    <form action="authorization.php" method="POST">
        <h1 class=center>Авторизация</h1>
        <div class="form-row">
    	<input class=inp type="text" pattern="^[0-9-.A-Za-z]+$" placeholder=" " name="login" autofocus required="" id=login /><label for=login>Логин</label>
    	</div>
    	<div class="form-row">
    	<input class=inp type="password" name="password" placeholder=" " required="" id=password /><label for=password>Пароль</label>
    	</div>
    	<?php if(isset($_GET['auth'])&&$_GET['auth']=='false') echo "<h2>Не правильный логин или пароль!</h2>"; ?>
    	<input type="submit" name="subm" value="Войти">
    </form>
    <a class="center reg" href=registration_form.php>Зарегистрироваться</a>
</body>
</html>