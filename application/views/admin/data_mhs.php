<!-- Isi -->
<div class="twelve columns">
    <div class="box_c">
        <div class="col-lg-12">
            <h1 class="page-header">
                <?=$title?>
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
                            <th style="text-align:center;">NIM</th>
                            <th style="text-align:center;">NAMA</th>
                            <th style="text-align:center;">Kelas</th>
                            <th style="text-align:center;">EMail</th>
                            <th style="text-align:center;">No. Telepon</th>
                            <th style="text-align:center;">Alamat MAC</th>
                            <th class="span2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        foreach ($data_mhs_semua as $row) {
                    ?>
                        <tr align="center">
                          <td><?php echo $row->nim;?></td>
                          <td><?php echo $row->nama_mhs;?></td>
                          <td><?php echo $row->kode_kelas;?></td>
                          <td><?php echo $row->email;?></td>
                          <td><?php echo $row->no_telp;?></td>
                          <td><?php echo $row->mac_add;?></td>


                          <td>
                              <a href="#editdata" title="Edit" data-toggle="modal" onclick="javacript:data(<?php echo $row->nim.",'".$row->nama_mhs."','".$row->kode_kelas."','".$row->email."','".$row->no_telp."','".$row->mac_add."'";?>)" class="btn btn-small "><span class="fa fa-pencil"></span> Ubah</a>&nbsp;
                              <a href="#hapusdata" title="Hapus" data-toggle="modal" onclick="javacript:hapus(<?php echo "'".$row->nim."','".$row->nama_mhs."'";?>)" class="btn btn-small " ><span class="fa fa-trash"></span> Hapus</a>
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

<!-- EDIT -->
<div class="modal fade" id="editdata" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Ubah Data Mahasiswa</h4>
      </div>
      <div class="modal-body">
        <form action="<?=base_url()?>admin/ubah_data_mhs" method="post" name="edit_data" enctype="multipart/form-data" data-toggle="validator">            
            <table>
                <tr >
                <td width="120" >NIM</td>
                <td width="260">
                <div class="form-group">
                    <input type="text" name="nim" size="43" id="nim" x-moz-errormessage="Nim Harus di Isi" class="form-control" readonly/> <span id="tampilnim"></span>
                </div>
                </td>
                </tr>
                <div id="tampildata">
                  <tr >
                  <td width="120" >Alamat MAC</td>
                  <td width="260">
                  <div class='form-group'>
                  <input type="text" name="macaddress" size="43" value="" id="macaddress" class="form-control" maxlength="17" style="text-transform:uppercase;"/>
                  </div>
                  </td>
                  </tr>
                  <tr >
                  <td width="120" >Nama</td>
                  <td width="260">
                  <div class="form-group">
                  <input type="text" name="nama" size="43" value="" id="nama" class="form-control" required/>
                  </div>
                  </td>
                  </tr>
                  <tr >
                    <td>Kelas</td>
                  <td>
                  <div class="form-group">
                  
                    <select name="kelas" class="form-control">
                    <?php 
                      foreach ($data_kelas as $data) {
                    ?>
                      <option value="<?php echo $data->kode_kelas?>"><?php echo $data->kode_kelas ?></option>
                     <?php } ?>
                    </select>
                    </div>
                  </td>
                  </tr>
                   <tr >
                  <td>Email</td>
                  <td>
                  <div class="form-group">
                  <input type="email" name="email" size="43" value="" autocomplete="off" class="form-control" placeholder="nama@domain.com" required/> 
                  </td>
                  </div>
                  </tr>
                  <tr >
                  <td>No Telepon</td>
                  <td>
                  <div class="form-group">
                  <input type="text" name="notelp" size="43" value="" class="form-control" required  />
                  </div>
                  </td>
                  </tr>
                </div>

            </table>
      </div>
      <div class="modal-footer">
        <button class="btn btn-default" data-dismiss="modal">Tutup</button>
        <button class="btn btn-primary">Simpan Perubahan</button>
        </form>
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
        <h4 class="modal-title">Hapus Data Mahasiswa</h4>
      </div>
      <div class="modal-body">
        <form method="POST" action="<?=base_url()?>admin/hapus_data_mhs" name="hapus_data">
            <input type="hidden" name="nim" size="43" id="" x-moz-errormessage="Nim Harus di Isi" class="form-control" required/>
            <span class="data"></span>
      </div>
      <div class="modal-footer">
        <button class="btn btn-default" data-dismiss="modal">Batalkan</button>
        <button class="btn btn-primary">Hapus</button>
        </form>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- Akhir Hapus -->

<!-- Script -->
<script type="text/javascript">
    function data(nim,nama_mhs,kode_kelas,email,no_telp,macaddress){
        
        document.edit_data.nim.value = nim;
        document.edit_data.nama.value = nama_mhs;
        document.edit_data.kelas.value = kode_kelas;
        document.edit_data.email.value = email;
        document.edit_data.notelp.value = no_telp;
        document.edit_data.macaddress.value = macaddress;
    }

    function hapus(nim,nama_mhs){
        document.hapus_data.nim.value = nim;
        $(".data").html("<p>Hapus Data <strong>"+nama_mhs+"</strong> ? </p>");
    }

    

</script>
<!-- End -->