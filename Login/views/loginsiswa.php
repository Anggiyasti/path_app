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
                                    <p class="font-alt nm">selamat datang <?=$this->session->userdata['email'];?></p>

                                    <p><a href="<?php echo base_url('index.php/Login/logout_siswa')?>">Logout</a></p>
                                </h2>
                            </div>
                            <!--/ Header -->
                        </div>

                        <div class="col-md-6 col-md-offset-3">
                            <!-- Social button -->
                            
                            <!-- Social button -->

                            <hr><!-- horizontal line -->

                            <!-- Login form -->
                            
                            <!-- Login form -->
                        </div>
                    </div>
                </div>
            </section>