<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Carbon - Admin Template</title>
    <link rel="stylesheet" href="./static/vendor/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="./static/vendor/font-awesome/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="./static/css/styles.css">
</head>
<body>
<div class="page-wrapper flex-row align-items-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
            <form action="{{ url('do_login_admin') }}"  method="post">
            @csrf
                <div class="card p-4">
                    <div class="card-header text-center text-uppercase h4 font-weight-light">
                        登录
                    </div>
                    <div class="card-body py-5">
                        <div class="form-group">
                            <label class="form-control-label">电子邮箱 :</label>
                            <input type="text" name="name" class="form-control">
                        </div>

                        <div class="form-group">
                            <label class="form-control-label">密码 :</label>
                            <input type="text" name="pwd" class="form-control">
                        </div>
                    </div>

                    <div class="card-footer">
                        <div class="row">
                            <div class="col-6">
                                <button type="submit" class="btn btn-primary px-5">登录</button>
                            </div>
                        </div>
                    </div>
                </div>
            <form>
            </div>
        </div>
    </div>
</div>
<script src="./static/vendor/jquery/jquery.min.js"></script>
<script src="./static/vendor/popper.js/popper.min.js"></script>
<script src="./static/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="./static/vendor/chart.js/chart.min.js"></script>
<script src="./static/js/carbon.js"></script>
<script src="./static/js/demo.js"></script>
</body>
</html>
