

<div class="courses-page-area3" >
                <div class="container" >
                    <div class="row" > 
                        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12" style="width: 100%;">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="section-divider" ></div>
                                    <div class="course-details-inner" >
                                        <div class="leave-comments" >
                                            <h3 class="sidebar-title">Login</h3>
                                            <div class="row">
                                                <div class="contact-form" id="review-form"> 
                                                    <?php echo form_open('Login/login_user'); ?>
                                                    <?php echo validation_errors(); ?>
                                                        <fieldset>
                                                            <div class="col-sm-12">
                                                                <div class="form-group">
                                                                    <label>Email address *</label>
                                                                    <input type="text" name="username" value="<?php echo set_value('email') ?>" onfocus="if (this.value=='Username/Email') this.value = ''" onblur="if (this.value=='') this.value = 'Email'" class="form-control"/>
                                                                    <div class="help-block with-errors"></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <div class="form-group">
                                                                    <label>Password *</label>
                                                                    <input type="password" name="password" onfocus="if (this.value=='password') this.value = ''" onblur="if (this.value=='') this.value = 'password'" class="form-control"/>
                                                                    <div class="help-block with-errors"></div>
                                                                </div>
                                                            </div>
                                                            
                                                            
                                                            <div class="col-sm-12">
                                                                <div class="form-group">
                                                                    <a href="<?php echo base_url('index.php/forgot')?>" class="page-login-forgot"><i class="ion-ios-eye"></i>Forgot Credentials | </a>
                                                                    <a href="<?php echo base_url('index.php/registrasi')?>" class="page-login-create">Create Account<i class="ion-android-create"></i></a>
                                                                    <div class="clear"></div>
                                                                    
                                                                    
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <div class="form-group">
                                                                    <button class="default-full-width-btn" type="submit" value="Login">Login</button>
                                                                    
                                                                    
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <div class="form-group">
                                                                    
                                                                    <button class="default-full-width-btn" type="submit" value="">Cancel</button>
                                                                    
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                    <?php echo form_close(); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                                       
                    </div>
                </div>
            </div>


