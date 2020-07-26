<html>
<head>
 <title> Login</title>
 
 <link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
 
</head>
<body>

    <div class="container">
    <img src="img/user.png"/>
    <form method=post action=anti_inyeccion.php>
    <div class="alert alert-danger" id="alerta" name="alerta">
        <strong>Debe iniciar sesión para ver el maestro detalle.</strong>
    </div>
    <div class="form-input">
    <input type="text" name="tAlias" id="tAlias" placeholder="UserName"  required></input> 
    </div>
    <div class="form-input">
    <input type="password"  name="tClave" id="tClave" placeholder="password" required></input> 
    </div>
    <input type="submit" type="submit" value="LOGIN" class="btn-login"></input> 
    </form>
    <a href="registrar.php" >No tienes cuenta?</a>
    </div>
    

    <style type="text/css">
        body{
        margin: 0 auto;
        background-image: url("img/lobo.jpg");
        background-repeat: no-repeat;
        background-size: 100% 720px;
        }

        .container{
            width: 500px;
            height: 450px;
            text-align: center;
            margin: 0 auto;
            background-color: rgba(44, 62, 80,0.7);
            margin-top: 115px;
            margin-left: 350px;
        }

        .container img{
            width: 150px;
            height: 150px;
            margin-top: -60px;
        }

        input[type="text"],input[type="password"]{
            margin-top: 30px;
            height: 45px;
            width: 300px;
            font-size: 18px;
            margin-bottom: 30px;
            background-color: #fff;
            padding-left: 40px;
        }

        .form-input::before{
            content: "\f007";
            font-family: "FontAwesome";
            padding-left: 07px;
            padding-top: 40px;
            position: absolute;
            font-size: 35px;
            color: #2980b9; 
        }

        .form-input:nth-child(2)::before{
            content: "\f023";
        }

        .btn-login{
            padding: 15px 25px;
            border: none;
            background-color: #27ae60;
            color: #fff;
        }

        a {
            color: #fff;
        }
        .alert {
            color: #ff0000;
        }
    </style>
</body>
</html>
