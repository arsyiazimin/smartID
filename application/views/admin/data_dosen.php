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
                            <th style="text-align:center;">NIP</th>
                            <th style="text-align:center;">NAMA</th>
                            <th style="text-align:center;">Kode Dosen</th>
                            <th style="text-align:center;">No Handphone</th>
                            <th style="text-align:center;">MAC Address</th>
                            <th class="span2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        foreach ($data_dosen_semua as $row) {
                    ?>
                            <tr align="center">
                                <td><?php echo $row->nip;?></td>
                                <td><?php echo $row->nama_dosen;?></td>
                                <td><?php echo $row->kode_dosen;?></td>
                                <td><?php echo $row->no_telp;?></td>
                                <td><?php echo $row->mac_add;?></td>
                                <td>
                                    <a href="#editdata" title="Edit" data-toggle="modal" onclick="javacript:data(<?php echo $row->nip.",'".$row->nama_dosen."','".$row->kode_dosen."','".$row->no_telp."','".$row->mac_add."'";?>)" class="btn btn-small "><span class="fa fa-pencil"></span> Edit</a>&nbsp;
                                    <a href="#hapusdata" title="Hapus" data-toggle="modal" onclick="javacript:hapus(<?php echo "'".$row->nip."','".$row->nama_dosen."'";?>)" class="btn btn-small " ><span class="fa fa-trash"></span> Delete</a>
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
        <h4 class="modal-title">Edit</h4>
      </div>
      <div class="modal-body">
        <form action="<?=base_url()?>admin/ubah_data_dosen" method="post" name="edit_data" >            
            <table>
                <tr >
                <td width="120" >Nama Dosen</td>
                <td width="260">
                <div class="form-group">
                    <input type="text" name="nama_dosen" size="43" value="" id="nama_dosen" x-moz-errormessage="Nim Harus di Isi" class="form-control" required/>
                </div>
                </td>
                </tr>
                <tr >
                <td width="120" >Kode Dosen</td>
                <td width="260">
                <div class='form-group'>
                <input type="text" name="kodedosen" size="43" value=""  class="form-control" required/>
                </div>
                </td>
                </tr>
                <tr >
                <td width="120" >NIP</td>
                <td width="260">
                <div class="form-group">
                <input type="text" name="nip" size="43" value="" id="nip" class="form-control" readonly />
                </div>
                </td>
                </tr>
                 <tr >
                <td>Mac Address</td>
                <td>
                <div class="form-group">
                <input type="text" name="macaddress" size="43" value="" autocomplete="off" class="form-control" required/> <span class="label label-info">Example : F4:NE:67:BB:90:EE</span>
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

            </table>
      </div>
      <div class="modal-footer">
        <button class="btn btn-default" data-dismiss="modal">Close</button>
        <button class="btn btn-primary">Save changes</button>
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
        <h4 class="modal-title">Modal title</h4>
      </div>
      <div class="modal-body">
        <form method="POST" action="<?=base_url()?>admin/hapus_data_dosen" name="hapus_data">
            <input type="hidden" name="nip" size="43" id="nip" x-moz-errormessage="Nim Harus di Isi" class="form-control" required/>
            <span class="data"></span>
      </div>
      <div class="modal-footer">
        <button class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button class="btn btn-primary">Delete</button>
        </form>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- Akhir Hapus -->

<!-- Script -->
<script type="text/javascript">
    function data(nip,nama_dosen,kode_dosen,no_telp,mac_add){
        
        document.edit_data.nip.value = nip;
        document.edit_data.nama_dosen.value = nama_dosen;
        document.edit_data.kodedosen.value = kode_dosen;
        document.edit_data.notelp.value = no_telp;
        document.edit_data.macaddress.value = mac_add;
    }

    function hapus(nip,nama_dosen){
        document.hapus_data.nip.value = nip;
        $(".data").html("<p>Hapus Data <strong>"+nama_dosen+"</strong> ? </p>");
    }

    

</script>
<!-- End -->