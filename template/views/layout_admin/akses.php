
        <aside class="sidebar sidebar-left sidebar-menu">
            <!-- START Sidebar Content -->
            <section class="content slimscroll">
                <h5 class="heading">Main Menu</h5>
                <!-- START Template Navigation/Menu -->
                <ul class="topmenu topmenu-responsive" data-toggle="menu">
                    <li >
                        <a href="<?php echo base_url('assets/adminre/gh_frontend')?>">
                            <span class="figure"><i class="ico-trophy"></i></span>
                            <span class="text">Frontend</span>
                        </a>
                    </li>
                    <li class="active open">
                        <a href="javascript:void(0);" data-target="#dashboard" data-toggle="submenu" data-parent=".topmenu">
                            <span class="figure"><i class="ico-home2"></i></span>
                            <span class="text">Dashboard </span>
                            <span class="arrow"></span>
                        </a>
                        <!-- START 2nd Level Menu -->
                       
                        <!--/ END 2nd Level Menu -->
                    </li>
                     <li >
                        <a href="javascript:void(0);" data-toggle="submenu" data-target="#mapel" data-parent=".topmenu">
                            <span class="figure"><i class="ico-book"></i></span>
                            <span class="text">Mata Pelajaran</span>
                            <span class="arrow"></span>
                        </a>
                        <!-- START 2nd Level Menu -->
                        <ul id="mapel" class="submenu collapse ">
                            <li class="submenu-header ellipsis">Forms</li>
                            <li >
                                <a href="<?php echo base_url('index.php/banksoal/tambahmapel')?>">
                                    <span class="text">Tambah Mata pelajaran</span>
                                </a>
                            </li>
                            
                            <li >
                                <a href="<?php echo base_url('index.php/banksoal/daftarmapel')?>">
                                    <span class="text">Daftar Mata Pelajaran</span>
                                </a>
                            </li>
                            
                        </ul>
                        <!--/ END 2nd Level Menu -->
                    </li>

                    <li >
                        <a href="javascript:void(0);" data-target="#bab" data-toggle="submenu" data-parent=".topmenu">
                            <span class="figure"><i class="ico-book"></i></span>
                            <span class="text">BAB</span>
                            <span class="arrow"></span>
                        </a>
                        <!-- START 2nd Level Menu -->
                        <ul id="bab" class="submenu collapse ">
                            <li class="submenu-header ellipsis">Forms</li>
                            <li >
                                <a href="<?php echo base_url('index.php/banksoal/tambahbab')?>">
                                    <span class="text">Tambah BAB</span>
                                </a>
                            </li>
                            
                            <li >
                                <a href="<?php echo base_url('index.php/banksoal/daftarbab')?>">
                                    <span class="text">Daftar BAB</span>
                                </a>
                            </li>
                            
                        </ul>
                        <!--/ END 2nd Level Menu -->
                    </li>

                    <li >
                        <a href="javascript:void(0);" data-toggle="submenu" data-target="#soal" data-parent=".topmenu">
                            <span class="figure"><i class="ico-book"></i></span>
                            <span class="text">Tambah Soal</span>
                            <span class="arrow"></span>
                        </a>
                        <!-- START 2nd Level Menu -->
                        <ul id="soal" class="submenu collapse">
                            <li class="submenu-header ellipsis">Forms</li>
                            <li >
                                <a href="<?php echo base_url('index.php/banksoal/form_tambahsoal')?>">
                                    <span class="text">Tambah Soal</span>
                                </a>
                            </li>
                            <li >
                                <a href="<?php echo base_url('index.php/banksoal/daftarsoal')?>">
                                    <span class="text">Daftar Soal</span>
                                </a>
                            </li>
                            <li >
                                <a href="<?php echo base_url('index.php/banksoal/filtersoal')?>">
                                    <span class="text">Filter Soal</span>
                                </a>
                            </li>
                        </ul>
                        <!--/ END 2nd Level Menu -->
                    </li>
                     <li >
                        <a href="javascript:void(0);" data-toggle="submenu" data-target="#guru" data-parent=".topmenu">
                            <span class="figure"><i class="ico-book"></i></span>
                            <span class="text">Guru</span>
                            <span class="arrow"></span>
                        </a>
                        <!-- START 2nd Level Menu -->
                        <ul id="guru" class="submenu collapse ">
                            <li class="submenu-header ellipsis">Forms</li>
                            <li>
                                <a href="<?php echo base_url('index.php/user/d_guru')?>">
                                    <span class="text">Daftar Guru</span>
                                </a>
                            </li>
                             <li >
                                <a href="<?php echo base_url('index.php/user/t_guru')?>">
                                    <span class="text">Tambah Guru</span>
                                </a>
                            </li>
                           
                        </ul>
                        <!--/ END 2nd Level Menu -->
                    </li>
                    <li>
                        <a href="javascript:void(0);" data-toggle="submenu" data-target="#siswa" data-parent=".topmenu">
                            <span class="figure"><i class="ico-book"></i></span>
                            <span class="text">Siswa</span>
                            <span class="arrow"></span>
                        </a>
                        <!-- START 2nd Level Menu -->
                        <ul id="siswa" class="submenu collapse">
                            <li class="submenu-header ellipsis">Forms</li>
                             <li >
                                <a href="<?php echo base_url('index.php/user/d_siswa')?>">
                                    <span class="text">Daftar Siswa</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('index.php/user/t_siswa')?>">
                                    <span class="text">Tambah Siswa</span>
                                </a>
                            </li>
                            
                           
                        </ul>
                        <!--/ END 2nd Level Menu -->
                    </li>
              
                <!--/ Summary -->
                <!--/ END Sidebar summary -->
            </section>
            <!--/ END Sidebar Container -->
        </aside>