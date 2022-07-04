<!-- Isi -->
<div class="twelve columns">
    <div class="box_c">
        <div class="col-lg-12">
            <h1 class="page-header">
                <?=$title?> <small></small>
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> <?= $title?>
                </li>
            </ol>
            
        </div>
        <div class="box_c_content">
            <div class="sepH_c">
                <table id="datatable" class="table table-striped jambo_table bulk_action" >
                    <thead style="background:rgba(52,73,94,0.94);color:#ECF0F1;" >
                        <tr>
                            <th style="text-align:center;">No</th>
                            <th style="text-align:center;">Kode Matakuliah</th>
                            <th style="text-align:center;">Nama Matakuliah</th>
                            <th style="text-align:center;">Kode Dosen</th>
                            <th style="text-align:center;">Nama Dosen</th>
                            <th style="text-align:center;">Ruangan</th>
                            <th style="text-align:center;">Hari</th>
                            <th style="text-align:center;">Jam Masuk</th>
                            <th style="text-align:center;">Jam Selesai</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $no=0;
                        foreach ($jadwal_dosen as $data) {
                            $no++;
                    ?>
                        <tr>
                            <td><?php echo $no;?></td>
                            <td><?php echo $data->kode_mk;?></td>
                            <td><?php echo $data->nama_mk;?></td>
                            <td><?php echo $data->kode_dosen;?></td>
                            <td><?php echo $data->nama_dosen;?></td>
                            <td><?php echo $data->ruang;?></td>
                            <td><?php echo $data->hari;?></td>
                            <td><?php echo $data->jam_m;?></td>
                            <td><?php echo $data->jam_s;?></td>
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