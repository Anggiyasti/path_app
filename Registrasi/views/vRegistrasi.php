<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Adminre backend</title>
        <meta name="author" content="pampersdry.info">
        <meta name="description" content="Adminre is a clean and flat backend and frontend theme build with twitter bootstrap 3.1.1">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url('assets/adminre/image/touch/apple-touch-icon-144x144-precomposed.png')?>">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url('assets/adminre/image/touch/apple-touch-icon-144x144-precomposed.png')?>">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url('assets/adminre/image/touch/apple-touch-icon-114x114-precomposed.png')?>">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url('assets/adminre/image/touch/apple-touch-icon-72x72-precomposed.png')?>">
        <link rel="apple-touch-icon-precomposed" href="<?php echo base_url('assets/adminre/image/touch/apple-touch-icon-57x57-precomposed.png')?>">
        <link rel="shortcut icon" href="<?php echo base_url('assets/adminre/image/favicon.ico')?>">
        <!--/ END META SECTION -->

        <!-- START STYLESHEETS -->
        <!-- Plugins stylesheet : optional -->
        
        <link rel="stylesheet" href="<?php echo base_url('assets/adminre/plugins/selectize/css/selectize.min.css')?>">
        <!--/ Plugins stylesheet -->

        <!-- Application stylesheet : mandatory -->
        <link rel="stylesheet" href="<?php echo base_url('assets/adminre/library/bootstrap/css/bootstrap.min.css')?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/adminre/stylesheet/layout.min.css')?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/adminre/stylesheet/uielement.min.css')?>">
        <!--/ Application stylesheet -->
        <!-- END STYLESHEETS -->

        <!-- START JAVASCRIPT SECTION - Load only modernizr script here -->
        <script src="<?php echo base_url('assets/adminre/library/modernizr/js/modernizr.min.js')?>"></script>
        <!--/ END JAVASCRIPT SECTION -->

</head>
<body>
<div class="container">
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <?php echo $this->session->flashdata('verify_msg'); ?>
    </div>
</div>

<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>User Registration Form</h4>
            </div>
            <div class="panel-body">
                <?php $attributes = array("name" => "registrationform");
                echo form_open("registrasi/register", $attributes);?>
                <div class="form-group">
                    <label for="name">First Name</label>
                    <input class="form-control" name="nama_depan" placeholder="Your First Name" type="text" value="<?php echo set_value('nama_depan'); ?>" />
                    <span class="text-danger"><?php echo form_error('nama_depan'); ?></span>
                </div>

                <div class="form-group">
                    <label for="name">Last Name</label>
                    <input class="form-control" name="nama_belakang" placeholder="Last Name" type="text" value="<?php echo set_value('nama_belakang'); ?>" />
                    <span class="text-danger"><?php echo form_error('nama_belakang'); ?></span>
                </div>
                
                <div class="form-group">
                    <label for="email">Email ID</label>
                    <input class="form-control" name="email" placeholder="Email-ID" type="text" value="<?php echo set_value('email'); ?>" />
                    <span class="text-danger"><?php echo form_error('email'); ?></span>
                </div>

                <div class="form-group">
                    <label for="subject">Password</label>
                    <input class="form-control" name="password" placeholder="Password" type="password" />
                    <span class="text-danger"><?php echo form_error('password'); ?></span>
                </div>

                <div class="form-group">
                    <label for="subject">Confirm Password</label>
                    <input class="form-control" name="cpassword" placeholder="Confirm Password" type="password" />
                    <span class="text-danger"><?php echo form_error('cpassword'); ?></span>
                </div>
                <div class="form-group">
                    <label for="name">Tingkat</label>
                    <input class="form-control" name="id_tingkat" placeholder="Your First Name" type="text" value="<?php echo set_value('id_tingkat'); ?>" />
                    <span class="text-danger"><?php echo form_error('id_tingkat'); ?></span>
                </div>

                <div class="form-group">
                    <button name="submit" type="submit" class="btn btn-default">Signup</button>
                    <button name="cancel" type="reset" class="btn btn-default">Cancel</button>
                </div>
                <?php echo form_close(); ?>
                <?php echo $this->session->flashdata('msg'); ?>
            </div>
        </div>
    </div>
</div>
</div>
</body>
</html>