<?php
//$udaj['title'] = 'WTP Events';
$this->load->view('header2', $name);
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
        .form-desc{
            color: black;
            width: 40%;
            margin-left: 30%;
            margin-right: 30%;
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

        .form-control {
            border-radius: 10px;
        }

        .wrapper {
            padding-top: 20px;
            text-align: center;
        }

        .descNames{
            color: #E13300;
        }
        .form-content{
            margin-top: 10px;
            margin-bottom: 10px;
            color: black;
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
    </style>

    <header>
        <div class="header-content">
            <div class="header-content-inner">
                <h1><?= $name ?></h1>

                <hr>

                <div class="form-desc">
                    <h4>Information about event:</h4>
                    <div class="desc">
                        <div class="descNames">Name: </div> <?= $name ?> <br>
                        <div class="descNames">Description: </div> <?= $description ?> <br>
                        <div class="descNames">Created by: </div> <?= $this->session->userdata['loginname'] ?> <br>
                        <div class="descNames">Date of event: </div> <?= $event_date ?> <br> 
                    </div>
                    <div class="wrapper">
                        <span class="group-btn">     
                            <a href="<?= base_url("events/deleteEvent/" . $id) ?>" class="btn btn-primary btn-md page-scroll">Delete event</a>
                            <a href="<?= base_url("events/addUserForEvent/" . $id) ?>" class="btn btn-primary btn-md  page-scroll">Add user</a>
                            <a href="<?= base_url("events/addContentForEvent/" . $id) ?>" class="btn btn-primary btn-md  page-scroll">Add TODO</a>
                        </span>
                    </div>
                </div>
                <div class="form-content">
                    <h4>TODO list:</h4>
                    <div class="desc chat-input input-sm">
                        <?php $edata = $this->events_model->getEventContent($id);
                        ?>

                        <?php
                        if ($edata) {
                            echo form_open(base_url("events/saveContent/" . $id));

                            foreach ($edata as $row) {
                                if ($row['equipped']) {
                                    ?>

                                    <input type="checkbox" checked="checked" id="<?= $row['name'] ?>" name="<?= $row['name'] ?>" class=""><?= $row['name'] ?>
                                <?php } else { ?>
                                    <input type="checkbox"  id="<?= $row['name'] ?>" name="<?= $row['name'] ?>" class=" "><?= $row['name'] ?>

                                    <?php
                                }
                            }
                            ?>
                        </div>      
                        <div class="wrapper">
                            <span class="group-btn">     
                                <input name="submit" value="Save" class="btn btn-primary btn-md" type="submit" >
                            </span>
                        </div>
                        <?php echo form_close(); ?>
                    </div>
                    <!--                                    echo '<button class="btn btn-warning btn-xl page-scroll" >';
                                                            echo $row['name'];
                                                            echo '</button>';-->
                <?php }
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