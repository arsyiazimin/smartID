<!-- Isi -->
<div class="twelve columns">
    <div class="box_c">
        <div class="col-lg-12">
            <h1 class="page-header">
                <?=$title?> <small></small>
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> <?=$title?>
                </li>
            </ol>
            
        </div>
        <div class="box_c_content">
            <div class="sepH_c">
                <table id="datatable" class="table table-striped jambo_table bulk_action" >
                    <thead style="background:rgba(52,73,94,0.94);color:#ECF0F1;" >
                        <tr >
                            <th style="text-align:center;" >No</th>
                            <th style="text-align:center;">Nama</th>
                            <th style="text-align:center;">NIM</th>
                            <th style="text-align:center;">Waktu Absen</th>
                            <!--<th style="text-align:center;">Status Login</th>-->
                            <th style="text-align:center;">Alamat MAC</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $no=0;
                        //$data = array('nim'=>'6302134014', 'nama_mhs'=>'Arsyi', 'waktu_absen'=>'00', 'mac_add'=>'01');
                        if (isset($data_mhs)) {
                            foreach ($data_mhs as $row) {
                                $no++;
                    ?>
                        <tr>
                            <td><?=$no?></td>
                            <td><?=$row['nama_mhs']?></td>
                            <td><?=$row['nim']?></td>
                            <td><?=$row['waktu_absen']?></td>
                            <td><?=$row['mac_add']?></td>
                        </tr>
                    <?php
                            }
                        }
                    ?>    
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- End Isi -->