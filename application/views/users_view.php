<?php
$udaj['title'] = 'WTP Events';
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
                        <a class="page-scroll btn btn-info" href=""><?php echo $this->session->userdata['loginname']; ?></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="<?= base_url() ?>events">Home</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="<?= base_url() ?>auth/logout">Sign out</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <style>
        .form-content{
            color: black;
            width: 80%;
            margin-left: 10%;
            margin-right: 10%;
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
            color: #E13300;
        }
    </style>
<!--<hr>-->
    <header>
        <div class="header-content">
            <div class="header-content-inner">
                <h1>users :)</h1>
                <hr>
                <div class="form-content">
                    <?php
                    $user = $this->session->userdata();
                    if ($user['role_id'] == 1) {
                        ?>
                        <h4>All users in application:</h4>
                        <?php
                        $data = $this->users_model->getAllUsers();
                        if ($data) {
                            foreach ($data as $row) {
                                echo '<button class="btn btn-warning btn-xl page-scroll" >';
                                echo $row['name'];
                                echo '</button>';
                            }
                        }
                    } else {
                        ?>
                        <h4>Users in my events:</h4>
                        <?php
                        $data = $this->users_model->getUserEventsUsers($this->session->userdata['loginname']);
                        if ($data) {
                            foreach ($data as $row) {
                                echo '<button class="btn btn-warning btn-xl page-scroll" >';
                                echo $row['name'];
                                echo '</button>';
                            }
                        }
                    }
                    ?>
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
