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
                        <a class="page-scroll" href="<?= base_url() ?>users">Users</a>
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
        form{
            color: black;
        }
    </style>

    <header>
        <div class="header-content">
            <div class="header-content-inner">
                <h1>My events :)</h1>

                <hr>
                <a href="<?= base_url() ?>events/addNewEvent" class="btn btn-primary btn-xl page-scroll">Add new event</a>
                <hr>
                <?php
                $user = $this->session->userdata();
                if ($user['role_id'] == 1) {
                    $data = $this->events_model->getAllEvents();
                    foreach ($data as $row) {
                        echo '<a class="btn btn-warning btn-xl page-scroll" href="';
                        echo base_url("events/displayEvent/" . $row['id']);
                        echo '">';
                        echo $row['name'];
                        echo '</a>';
                    }
                } else {
                    $data = $this->events_model->getUserEvents($user['loginname']);
                    foreach ($data as $row) {
                        echo '<a class="btn btn-warning btn-xl page-scroll" href="';
                        echo base_url("events/displayEvent/" . $row['id']);
                        echo '">';
                        echo $row['name'];
                        echo '</a>';
                    }
                }
                ?>
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
