<!DOCTYPE html>
<html >
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Green River Project Hub</title>
    <base target="_self">
    <meta name="description" content="A Hub for Green River Projects." />
    <meta name="google" value="notranslate">
    <link rel="shortcut icon" href="/images/cp_ico.png">


    <!--stylesheets / link tags loaded here-->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="styles/index.css?<?= (date('l jS \of F Y h:i:s A')) ?>" />

</head>
<body>
<div class="container py-5 gray-bg">
    <div class="row">
        <div class="col-md-12">
            <h1 class="display-4 text-center gray-txt">Green River Project Hub</h1>
            <hr class="green-bg">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <!-- form card login -->
                    <div class="card rounded-0">
                        <div class="card-header">
                            <h3 class="mb-0">Login</h3>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="./">
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control form-control-lg rounded-0"
                                           name="username" id="username" required="">
                                    <div class="invalid-feedback">Please enter a username.</div>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="password" class="form-control form-control-lg rounded-0"
                                           id="password" required="" autocomplete="new-password">
                                    <div class="invalid-feedback">Please enter a password.</div>
                                </div>
                                <button type="submit" name="submit" class="btn btn-success btn-lg float-right"
                                        value="Submit">Login</button>
                            </form>
                        </div>
                        <!--/card-block-->
                    </div>
                    <!-- /form card login -->

                </div>


            </div>
            <!--/row-->

        </div>
        <!--/col-->
    </div>
    <!--/row-->
</div>
<!--/container-->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>

</body>
</html>