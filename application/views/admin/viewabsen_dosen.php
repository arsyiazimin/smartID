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
                        <tr>
                            <th style="text-align:center;">No</th>
                            <th style="text-align:center;">Nama</th>
                            <th style="text-align:center;">Kode Dosen</th>
                            <th style="text-align:center;">NIP</th>
                            <th style="text-align:center;">Waktu Login</th>
                            <!--<th style="text-align:center;">Status Login</th>-->
                            <th style="text-align:center;">MAC Address</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $no=0;
                        //$data = array('nim'=>'6302134014', 'nama_mhs'=>'Arsyi', 'waktu_absen'=>'00', 'mac_add'=>'01');
                        if (isset($data_dosen)) {
                            foreach ($data_dosen as $row) {
                                $no++;
                    ?>
                        <tr>
                            <td><?=$no?></td>
                            <td><?=$row['nama_dosen']?></td>
                            <td><?=$row['kode_dosen']?></td>
                            <td><?=$row['nip']?></td>
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

<!-- EDIT -->
<div class="modal fade" id="editdata" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit</h4>
      </div>
      <div class="modal-body">
        <p>One fine body&hellip;</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- Akhir EDIT -->

<!-- Hapus -->
<div class="modal fade" id="hapusdata" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Modal title</h4>
      </div>
      <div class="modal-body">
        <p>One fine body&hellip;</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- Akhir Hapus -->

<!-- Script -->
<script type="text/javascript">
    function data(idkapal,nama_kapal,bendera,posisi_sandar,jml_pilot,jml_kpltunda,tgl_agenda){
        var idstr           = idkapal;
        var nama_kapalstr   = nama_kapal;
        var benderastr      = bendera;
        var posisi_sandarstr= posisi_sandar;
        var jml_pilotstr    = jml_pilot;
        var jml_kpltundastr = jml_kpltunda;
        var tgl_agendastr   = tgl_agenda;
        document.edit_data.idkapal.value = idstr;
        document.edit_data.nama_kapal.value = nama_kapalstr;
        document.edit_data.bendera.value = benderastr;
        document.edit_data.posisi_sandar.value = posisi_sandarstr;
        document.edit_data.jml_pilot.value = jml_pilotstr;
        document.edit_data.jml_kpltunda.value = jml_kpltundastr;
        document.edit_data.tgl_agenda.value = tgl_agendastr;
    }

    function hapus(idkapal,nama_kapal){
        document.hapus_data.idkapal.value = idkapal;
        $(".kpl").html("<p>Hapus Data Kapal <strong>"+nama_kapal+"</strong> ? </p>");
    }

    function upload(idkapal){
        var idkapalstr = idkapal;
        document.upload_data.idkapal.value = idkapalstr;
    }

    function unduh(idkapal){
        
        var i=0;
        var text = "Wait...";
        var tulisan;

        function tambahProgress(){
            i++;
            if (i>99) { tulisan = text } else { tulisan = i+"%" };
            $(".unduh").html("<div class='progress progress-striped active' style='height:20px;'><div class='bar' style='width:"+i+"%;'><i style:'margin-top:-10px;'>"+tulisan+"</i></div></div>");
            timer=setTimeout(tambahProgress);    
            if (i==100) {
                clearTimeout(timer);
                $.post('unduh.php?idkapal='+idkapal, function(n){  
                    $(".unduh").html(n);
                });
            }
        }
        timer=setTimeout(tambahProgress);
    }


</script>
<!-- End -->