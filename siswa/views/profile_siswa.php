<?php 

  foreach ($Siswa as $row) {
    $id_siswa = $row['id_siswa'];

    $nama_depan = $row['nama_depan'];

    $nama_belakang = $row['nama_belakang'];

    $password = $row['password'];

    $email = $row['email'];

    $alamat = $row['alamat'];

    $namaskul = $row['nama_sekolah'];

    $no = $row['no_tlp'];

    $univ = $row['univ'];

    $jur = $row['jurusan'];

    $bio = $row['biografi'];

    // $universitas = $row['univ'];

    $photo=base_url().'assets/images/siswa/'.$row['photo'];

    $oldphoto=$row['photo'];





    // $biografi = $row['biografi'];

    // $photo=base_url().'assets/image/photo/guru/'.$row['photo'];

    // $oldphoto=$row['photo'];

} ;



?> 


<div class="courses-page-area3">
                <div class="container">
                    <div class="row"> 
                        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="section-divider"></div>
                                    <div class="course-details-inner">
                                        <div class="leave-comments">
                                            <h3 class="sidebar-title">Profile Setting</h3>
                                            <div class="row">
                                                <div class="contact-form" id="review-form">
                                                <?php echo $this->session->flashdata('msg'); ?> 
                                                    <form action="<?=base_url()?>index.php/Siswa/edit_siswa" method="post">
                                                        <fieldset>
                                                            <div class="col-sm-10">
                                                                <div class="form-group">
                                                                    <label>Nama Depan</label>
                                                                    <input type="text" class="form-control" name="nama_depan" value="<?=$nama_depan; ?>">
                                                                    <?php echo form_error('nama_depan'); ?>
                                                                    <div class="help-block with-errors"></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-10">
                                                                <div class="form-group">
                                                                    <label>Nama Belakang</label>
                                                                    <input type="text" class="form-control" name="nama_belakang" value="<?=$nama_belakang; ?>">
                                                                    <?php echo form_error('nama_belakang'); ?>
                                                                    <div class="help-block with-errors"></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-10">
                                                                <div class="form-group">
                                                                    <label>Alamat</label>
                                                                    <input type="text" class="form-control" name="alamat" value="<?=$alamat; ?>">
                                                                    <?php echo form_error('alamat'); ?>
                                                                    <div class="help-block with-errors"></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-10">
                                                                <div class="form-group">
                                                                    <label>Nama Sekolah</label>
                                                                    <input type="text" class="form-control" name="nama_sekolah" value="<?=$namaskul; ?>">
                                                                    <?php echo form_error('nama_sekolah'); ?>
                                                                    <div class="help-block with-errors"></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-10">
                                                                <div class="form-group">
                                                                    <label>Email</label>
                                                                    <input type="email" class="form-control" name="email" value="<?=$email; ?>">
                                                                    <?php echo form_error('email'); ?>
                                                                    <div class="help-block with-errors"></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-10">
                                                                <div class="form-group">
                                                                <label>No Telepon</label>
                                                                <input type="text" class="form-control" name="no_tlp" value="<?=$no; ?>">
                                                                <?php echo form_error('no_tlp'); ?>
                                                                    <div class="help-block with-errors"></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-10">
                                                                <div class="form-group">
                                                                <label>Universitas</label>
                                                                <input type="text" class="form-control" name="no_tlp" value="<?=$univ; ?>" disabled>
                                                                    <div class="help-block with-errors"></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-10">
                                                                <div class="form-group">
                                                                <label>Jurusan</label>
                                                                <input type="text" class="form-control" name="no_tlp" value="<?=$jur; ?>" disabled>
                                                                    <div class="help-block with-errors"></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-10">
                                                                <div class="form-group">
                                                                <label>biografi</label>
                                                                <textarea placeholder="Comment" class="textarea form-control" id="form-message" name="biografi" rows="8" cols="20"><?=$bio; ?></textarea>
                                                                <div class="help-block with-errors"></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <div class="form-group">
                                                                <input type="hidden" name="id_siswa" value="<?=$id_siswa;?>">
                                                                <input type="submit" class="view-all-accent-btn" name="update"  value="Update" style="color: #FFFFFF;" >
                                                                <!-- <button type="submit" name="update" class="view-all-accent-btn">Update</button> -->
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