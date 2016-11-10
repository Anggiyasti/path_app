<!-- START Template Main -->
        <section id="main" role="main">
            <!-- START page header -->
            <section class="page-header page-header-block nm">
                <!-- pattern -->
                <div class="pattern pattern9"></div>
                <!--/ pattern -->
                <div class="container pt15 pb15">
                    <div class="page-header-section">
                        <h4 class="title font-alt">Login</h4>
                    </div>
                    <div class="page-header-section">
                        <!-- Toolbar -->
                        <div class="toolbar">
                            <ol class="breadcrumb breadcrumb-transparent nm">
                                <li><a href="javascript:void(0);">Pages</a></li>
                                <li class="active">Login</li>
                            </ol>
                        </div>
                        <!--/ Toolbar -->
                    </div>
                </div>
            </section>
            <!--/ END page header -->

    <!-- START Register Content -->
            <section class="section bgcolor-white">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Header -->
                            <div class="section-header section-header-bordered text-center">
                                <h2 class="section-title">
                                    <p class="font-alt nm">Register To Path Account</p>
                                </h2>
                            </div>
                            <!--/ Header -->
                        </div>

                        <div class="col-md-6 col-md-offset-3">
                            <!-- Social button -->
                            
                            <!-- Social button -->

                            <hr><!-- horizontal line -->

                            <!-- Login form -->
                                <div class="panel-body">
                                    <?php $attributes = array("name" => "registrationform");
                echo form_open("registrasi/register", $attributes);?>
                <div class="form-group">
                    <label for="name">First Name</label>
                    <div class="has-icon pull-left">
                    <input class="form-control" name="nama_depan" placeholder="Your First Name" type="text" value="<?php echo set_value('nama_depan'); ?>" />
                    <i class="ico-user2 form-control-icon"></i>
                    </div>
                    
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
                    <button name="submit" type="submit" class="btn btn-primary">Signup</button>
                    <button name="cancel" type="reset" class="btn btn-default">Cancel</button>
                </div>
                <?php echo form_close(); ?>
                <?php echo $this->session->flashdata('msg'); ?>
                                </div>
                            <!-- Login form -->
                        </div>
                    </div>
                </div>
            </section>
            <!--/ END Register Content -->
                        <hr><!-- horizontal line -->

                        <p class="text-muted text-center">Don't have any account? <a class="semibold" href="page-register.html">Sign up to get started</a></p>
                    </div>
                </div>
                <!--/ END row -->
            </section>
                <!--/ container -->
            </div>
            <!--/ bottom footer -->
        </footer>
        <!--/ END Template Footer -->