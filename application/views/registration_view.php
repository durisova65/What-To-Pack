<?php
$udaj['title'] = 'WTP Registration';
$this->load->view('header2', $udaj);
?>

<body id="page-top">

    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">What to pack</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a class="page-scroll" href="<?= base_url() ?>main">Home</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="<?= base_url() ?>auth/login">Sign in</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="<?= base_url() ?>main/#contact">Contact</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>


    <header>
        <div class="header-content">
            <div class="header-content-inner">
                <h1>Registration</h1>
                <hr>

                <style>
                    .form-login {
                        color: black;
                        width: 30%;
                        margin-left: 35%;
                        margin-right: 35%;
                        background-color: #EDEDED;
                        padding-top: 10px;
                        padding-bottom: 20px;
                        padding-left: 20px;
                        padding-right: 20px;
                        border-radius: 15px;
                        border-color:#d2d2d2;
                        border-width: 5px;
                        box-shadow:0 1px 0 #cfcfcf;
                    }

                    h4 { 
                        border:0 solid #fff; 
                        border-bottom-width:1px;
                        padding-bottom:10px;
                        text-align: center;
                    }

                    .form-control {
                        border-radius: 10px;
                    }

                    .wrapper {
                        text-align: center;
                    }
                    .errors{
                        margin-top: 10px;
                    }

                    .validation_error:first-child{
                        border-top: 1px dashed #CCCCCC;
                        clear: both;
                    }
                </style>
                <div id="parent">
                    <div class="form-login">
                        <h4>Come join us !</h4>
                        <?php echo form_open('auth/registration'); ?>
                        <input type="text" id="login" name="login" class="form-control input-sm chat-input" placeholder="login name" />
                        </br>
                        <input type="text" id="name" name="name" class="form-control input-sm chat-input" placeholder="name" />
                        </br>
                        <input type="text" id="surname" name="surname" class="form-control input-sm chat-input" placeholder="surname" />
                        </br>
                        <input type="text" id="email" name="email" class="form-control input-sm chat-input" placeholder="e-mail" />
                        </br>
                        <input type="password" id="password" name="password" class="form-control input-sm chat-input" placeholder="password" />
                        </br>
                        <input type="password" id="password" name="password2" class="form-control input-sm chat-input" placeholder="RE-password" />
                        </br>
                        <div class="wrapper">
                            <span class="group-btn">     
                                <input name="submit" value="Register" class="btn btn-primary btn-md" type="submit" >
                                <!--<a href="#" class="btn btn-primary btn-md">login <i class="fa fa-sign-in"></i></a>-->
                            </span>
                        </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>

<!--                <input name="login" value="" placeholder="Login name" type="text"> <br>
      <input name="name" value="" placeholder="Name" type="text"> <br>
      <input name="surname" value="" placeholder="Surname" type="text"> <br>
      <input name="email" value="" placeholder="E-mail" type="text"> <br>
      <input name="password" value="" placeholder="Password" type="password"> <br>
      <input name="password2" value="" placeholder="Re-password" type="password"> <br>
      <input name="submit" value="Sign in" class="btn btn-primary btn-xl page-scroll" type="submit">-->

                <div class="errors">
                    <?= validation_errors(); ?>
                </div>

            </div>
        </div>
    </header>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?= base_url() ?>js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/jquery.fittext.js"></script>
    <script src="js/wow.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?= base_url() ?>js/creative.js"></script>
</body>
<?php
// $this->load->view('footer'); ?>