<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GeniusOcean - Script Installer</title>

    <!-- Website Font style -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>
    <!-- Website CSS style -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="install.css" rel="stylesheet">

</head>
<body>
<div id="loading"></div>

<div class="container">
    <div class="row main">
        <div class="main-login main-center">
            <h3 class="text-center">GeniusOcean Project Installer</h3>
            <hr>
            <div class="row">

                <div class="col-lg-8 col-lg-offset-2">
                    <form class="" id="installer" method="post">

                        <div class="form-group">
                            <label for="name" class="cols-sm-2 control-label">Website Name</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-globe fa" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="web_name" id="name"  placeholder="Enter Website Name"/>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="cols-sm-2 control-label">Website URL</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-link" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="web_url" id="name"  placeholder="Enter Website URL"/>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="cols-sm-2 control-label">Database Host</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-globe fa" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="database_host" id="email1"  placeholder="Database Host"/>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="cols-sm-2 control-label">Database Name</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                    <input type="text" class="form-control" name="database_name" id="email2"  placeholder="Database Name"/>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="username" class="cols-sm-2 control-label">Database Username</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="database_username" id="username"  placeholder="Enter Database Username"/>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="cols-sm-2 control-label">Database Password</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="database_password" id="password"  placeholder="Enter Database Password"/>
                                </div>
                            </div>
                        </div>

                        <div class="form-group ">
                            <button type="button" id="the_button" class="btn btn-default btn-lg btn-block login-button">Install >></button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content text-center">
            <div class="modal-header">
                <h3 class="modal-title" id="info_head"></h3>
            </div>
            <div class="modal-body">
                <h4 id="info_body"></h4>
            </div>
            <div class="modal-footer" id="info_button">

            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div id="installingModal" class="modal fade">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content text-center">
            <div class="modal-header">
                <h3 class="modal-title"><i class="fa fa-cog"></i> Installing...</h3>
            </div>
            <div class="modal-body">
                <div class="progress" id="insprogress">
                    <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="../assets/js/jquery.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
<script src="install.js"></script>
<script>
    var domain_URL = "<?php echo str_replace('/install/','',$_SERVER['REQUEST_URI'])?>";
</script>
</body>
</html>