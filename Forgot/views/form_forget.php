

<div class="courses-page-area3" >
                <div class="container" >
                    <div class="row" > 
                        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12" style="width: 100%;">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="section-divider" ></div>
                                    <div class="course-details-inner" >
                                        <div class="leave-comments" >
                                            <h3 class="sidebar-title">Forgot Password</h3>
                                            <div class="row">
                                                <div class="contact-form" id="review-form"> 
                                                    <form  name="form-register" action="<?= base_url() ?>index.php/forgot/cobalupa" method="post"> 
                                                    <?php echo validation_errors(); ?>
                                                        <fieldset>
                                                            <div class="col-sm-12">
                                                                <div class="form-group">
                                                                    <?php if ($this->session->flashdata('notif') != '') {?>
                                                                    <div class="alert alert-warning">
                                                                    <span class="semibold">Note :</span><?php echo $this->session->flashdata('notif'); ?>
                                                                    </div>
                                                                    <?php } else { ?>
                                                                    <div class="alert alert-warning">
                                                                    <span class="semibold">Note :</span>&nbsp;&nbsp;Kami akan kirimkan kode reset password ke email akun mu.
                                                                    </div>
                                                                    <?php }; ?>
                                                                    <div class="help-block with-errors"></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <div class="form-group">
                                                                    <input type="email" class="form-control" name="email" placeholder="xxx@mail.com" required> 
                                                                    <div class="help-block with-errors"></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <div class="form-group">
                                                                <button type="submit" class="view-all-accent-btn"><span class="semibold">Submit</span></button>
                                                                <a href="<?php echo base_url('index.php/login')?>" class="view-all-accent-btn">Kembali</a>
                                                                    
                                                                    
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                    </form>
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


 <!-- Page Content -->
      <div id="content" class="grey-blue login">

        <!-- Toolbar -->
        <div id="toolbar" class="tool-login primary-color animated fadeindown">
          <a href="javascript:history.back()" class="open-left">
            <i class="ion-android-arrow-back"></i>
          </a>
        </div>
        
        <!-- Main Content -->
        <div class="login-form animated fadeinup delay-2 z-depth-1">

          <h1>Login</h1>
         <form  name="form-register" action="<?= base_url() ?>index.php/forgot/cobalupa" method="post"> 
          <?php echo validation_errors(); ?>
          <div class="input-field">
           
            <?php if ($this->session->flashdata('notif') != '') {?>
                <div class="alert alert-warning">
                <span class="semibold">Note :</span><?php echo $this->session->flashdata('notif'); ?>
                </div>
                <?php } else { ?>
                <div class="alert alert-warning">
                <span class="semibold">Note :</span>&nbsp;&nbsp;Kami akan kirimkan kode reset password ke email akun mu.
                </div>
                <?php }; ?>
          </div>

          <div class="input-field" style="margin-bottom:20px;">
            <i class="ion-android-lock prefix"></i> 
            <input type="email" class="validate" name="email" placeholder="xxx@mail.com" required> 
          </div>

          
          
          <button type="submit" class="waves-effect waves-light btn-large accent-color width-100 m-b-20 animated bouncein delay-4"><span class="semibold">Submit</span></button>
           <a href="<?php echo base_url('index.php/login')?>" class="waves-effect waves-light btn-large accent-color width-100 m-b-20 animated bouncein delay-4">Kembali</a>
      
        </div><!-- End of Main Contents -->
        </div>
      
       
   