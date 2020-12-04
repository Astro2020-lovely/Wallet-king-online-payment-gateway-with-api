<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <meta name="description" content="Simple Documentation for project NewsOcean.">
    <meta name="author" content="GeniusOcean">

    <title>Lawyer Directory - Admin Panel</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{ URL::asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ URL::asset('assets/css/genius-admin.css')}}" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>

<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="form-wrap">
                    <h1>Admin Panel Log in</h1>
                    <hr>
                    <div class="text-center" id="res" style="display: none;"></div>
                    <form role="form" action="auth_process.php" method="post" id="admin_form" autocomplete="off">
                        <div class="form-group">
                            <label for="username" class="sr-only">Email</label>
                            <input type="text" name="username" class="form-control" placeholder="Username">
                        </div>
                        <div class="form-group">
                            <label for="username" class="sr-only">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Password">
                        </div>
                        <input type="submit" id="admin_btn" class="btn btn-custom btn-lg btn-block" value="Log in">
                    </form>
                    <!-- <a href="javascript:;" class="forget" data-toggle="modal" data-target=".forget-modal">Forgot your password?</a> -->
                    <hr>
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>

<div class="modal fade forget-modal" tabindex="-1" role="dialog" aria-labelledby="myForgetModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                    <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title">Recovery password</h4>
            </div>
            <div class="modal-body">
                <p>Type your email account</p>
                <input type="email" name="recovery-email" id="recovery-email" class="form-control" autocomplete="off">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-custom">Recovery</button>
            </div>
        </div> <!-- /.modal-content -->
    </div> <!-- /.modal-dialog -->
</div> <!-- /.modal -->


<footer id="footer">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <p>2017 Powered by <strong><a href="http://projects.geniusocean.com/newsocean/" target="_blank">Lawyer Directory</a></strong></p>
            </div>
        </div>
    </div>
</footer>
</body>
</html>