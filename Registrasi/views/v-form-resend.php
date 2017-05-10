

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

          <h1>Resend Code</h1>
         <form  name="form-register" action="<?= base_url() ?>index.php/registrasi/kirim_ulang" method="post"> 
          <?php echo validation_errors(); ?>
          <div class="input-field">
           
            <?php if ($this->session->flashdata('notif') != '') {?>
                <div class="alert alert-warning">
                <span class="semibold">Note :</span><?php echo $this->session->flashdata('notif'); ?>
                </div>
                <?php } else { ?>
                <div class="alert alert-warning">
                <span class="semibold">Note :</span>&nbsp;&nbsp;Kami akan kirimkan kode verifikasi ke email.
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
      
       
   