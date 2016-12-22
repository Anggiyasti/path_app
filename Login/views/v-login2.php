<!-- Top content -->
        <div class="top-content">
            
            <div class="inner-bg">
                <div class="container">
                   <div class="row">
                   <div class="col-sm-6 col-sm-offset-3 form-box">
                        <div class="form-top">
                            <div class="form-top-left">
                                <h3>Human Resource Management</h3>
                                <p>Enter your username and password to log on:</p>
                                    <?php echo form_open('Login/login_user'); ?>
                                    <?php echo validation_errors(); ?>
                                        <fieldset>
                                        <!-- jalankan validasi pesan -->
                                        <?php if ($this->session->flashdata('pesan2')) :?>
                                        <div class="alert alert-danger" role="alert">
                                            <h4>Ada kesalahan</h4>
                                            <?php echo $this->session->flashdata('pesan2'); ?>
                                        </div>
                                    <?php endif; ?>
                                    <!-- end validasi -->
                            </div>
                                <div class="form-top-right">
                                    <i class="fa fa-lock"></i>
                                </div>
                        </div>
                        <div class="form-bottom">
                            <div class="form-group">
                                <label class="sr-only" for="username">Email/Username</label>
                                    <input type="email" name="text" placeholder="Username..." class="form-username form-control" id="form-username" value="<?php echo set_value('email') ?>">
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="password">Password</label>
                                    <input type="password" name="password" placeholder="Password..." class="form-password form-control" id="form-password">
                            </div>
                            <input type="submit" class="btn btn-lg btn-danger" name="submit"  value="Login">
                            </fieldset>
                              <?php echo form_close(); ?>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>