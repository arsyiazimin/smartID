<!-- Isi -->
<div class="twelve columns">
    <div class="box_c">
        <div class="col-lg-12">
            <h1 class="page-header">
                <?= $title ?> <small></small>
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> <?= $title ?>
                </li>
            </ol>
            
        </div>
        <div class="box_c_content">
            <div class="sepH_c">
                <table id="datatable" class="table table-striped jambo_table bulk_action" >
                    <thead style="background:rgba(52,73,94,0.94);color:#ECF0F1;" >
                        <tr>
                            <th style="text-align:center;">No</th>
                            <th style="text-align:center;">Nim</th>
                            <th style="text-align:center;">Nama Mahasiswa</th>
                            <th style="text-align:center;">Mata Kuliah</th>
                            <th style="text-align:center;">Tanggal</th>
                            <th style="text-align:center;">Hari</th>
                            <th style="text-align:center;">Jam</th>
                            <th style="text-align:center;">Status</th>
                            <th style="text-align:center;">Verifikasi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $no=0;
                        foreach ($log_presensi as $data) {
                            $no++;
                    ?>
                        <tr>
                            <td><?php echo $no;?></td>
                            <td><?php echo $data->nim;?></td>
                            <td><?php echo $data->nama_mhs;?></td>
                            <td><?php echo $data->nama_mk;?></td>
                            <td><?php echo $data->tanggal;?></td>
                            <td><?php echo $data->hari;?></td>
                            <td><?php echo $data->jam;?></td>
                            <td><?php echo $data->status;?></td>
                            <td>
                        <?php
                            if ($data->status=='Hadir') {
                        ?>
                                <span class='label label-success'><i class='fa fa-check'></i></span>
                        <?php
                            }else{
                                $array_m = array($data->tanggal, $data->jam_m);
                                $datetime_m = implode(" ", $array_m);

                                $array_s = array($data->tanggal, $data->jam_s);
                                $datetime_s = implode(" ", $array_s);
                                if ((date("Y-m-d H:i:s") >= $datetime_m )&& (date("Y-m-d H:i:s") <= $datetime_s)) {
                        ?>
                                <form action="<?=base_url()?>mahasiswa/updateabsen" method="post" name="postform" enctype="multipart/form-data" data-toggle="validator">                        
                                    <input type="hidden" name="id_abs_mhs" value="<?=$data->id_abs_mhs?>"/> 
                                    <input style="margin-left:29%;" type="submit" name="submit" value="Verifikasi" class="btn btn-primary"/> 
                                
                                </form>
                            
                        <?php
                                } else {
                        ?>
                                    <input style="margin-left:29%;" type="submit" name="submit" value="Verifikasi" class="btn btn-primary disabled" readonly="readonly" />
                        <?php
                                }
                            }
                        ?>
                            </td>
                        </tr>
                    <?php
                        }
                    ?>    
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- End Isi -->

<!-- End -->