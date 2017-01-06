<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">
    <link rel="shortcut icon" href="#" type="image/png">

    <title>注册</title>

    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>

<body class="login-body">

<div class="container">

    <form class="form-signin" method="post" action="createUser">
        <div class="form-signin-heading text-center">
            <h1 class="sign-title">注册</h1>
            <img src="images/login-logo.png" alt=""/>
        </div>


        <div class="login-wrap">

            <p> 输入用户信息 </p>
            {{csrf_field()}}
            <input name="name" type="text" autofocus="" placeholder="User Name" class="form-control">
            @if($errors->first('name'))
                <div class="alert alert-danger">
                    <li>{{$errors->first('name')}}</li>
                </div>
            @endif
            <input name="password" type="password" placeholder="Password" class="form-control">
            @if($errors->first('password'))
                <div class="alert alert-danger">
                    <li>{{$errors->first('password')}}</li>
                </div>
            @endif
            <input name="password_confirmation" type="password" placeholder="Re-type Password" class="form-control">
            @if($errors->first('password_confirmation'))
                <div class="alert alert-danger">
                    <li>{{$errors->first('password_confirmation')}}</li>
                </div>
            @endif
            <label class="checkbox">
                <input type="checkbox" value="agree this condition">我同意你们网站的协议
            </label>
            <button type="submit" class="btn btn-lg btn-login btn-block">
                <i class="fa fa-check"></i>
            </button>

            <div class="registration">
                已经注册
                <a href="login.html" class="">
                    登录
                </a>
            </div>

        </div>

    </form>

</div>


<!-- Placed js at the end of the document so the pages load faster -->

<!-- Placed js at the end of the document so the pages load faster -->
<script src="js/jquery-1.10.2.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/modernizr.min.js"></script>

</body>
</html>
