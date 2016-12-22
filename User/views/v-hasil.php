<!-- <table class="table table-hover" id="dataTables-example">
                    <thead>
                        <tr class="info">
                        <th>No</th>
                        <th>Id Soal</th>
                        <th>Judul Soal</th>
                        <th>Id Mapel</th>
                        <th>Id BAB</th>
                        <th>Tanggal Berakhir</th>
                        <th></th>
                    </tr>                       
                    </thead>    
                    <tbody>
                    <?php 
                    $no = 1;
                    foreach ($data as $d) : ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?=$d['nama_mapel'] ?></td>
                        <td><?=$d['judul_bab'] ?></td>               
                    
                        
                    </tr>
                    <?php 
                    $no++;
                    endforeach; 
                    ?>                      
                    </tbody>
                    </table> -->

                    <div class="col-sm-8">
                                        <select name="id_mapel" id="mapel" class="form-control">
                                            <?php 
                                            foreach ($data as $row) {
                                                echo '<option value="'.$row['id_mapel'].'">'.$row['judul_bab'].'</option>';
                                            }
                                         ?>
                                        </select>
                                    </div>