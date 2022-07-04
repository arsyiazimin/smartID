<!-- Page Heading -->
                <div class="row"></div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
    </div>
    <!-- /#wrapper -->
    <!-- Massal -->
<div class="modal fade" id="massal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Input Massal</h4>
      </div>
      <div class="modal-body">
        <form action="function.php?act=importfile" method="post" name="postform" enctype="multipart/form-data" >
            <p>
                <strong>Import Massal</strong>
            </p>
            <div class="asd">
                <label for="backup">File CSV (*.csv)</label><br>
                
                <input type="file" name="filename" class="filestyle" /> <br>
                
                <button type="submit" class="btn btn-primary" name="restore" data-loading-text="Loading...">Proses</button>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
        </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- Akhir Massal -->   

<!-- mac mhs -->
<div class="modal fade" id="mac_mhs" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Tambah Data Mahasiswa</h4>
      </div>
      <div class="modal-body">
        <form action="<?=base_url()?>admin/simpan_data_mhs" method="post" name="postform" enctype="multipart/form-data" data-toggle="validator">            
            <table>
                <tr >
                <td width="120" >NIM</td>
                <td width="260">
                <div class="form-group">
                    <input type="text" name="nim" size="43" id="nim" value="" x-moz-errormessage="Nim Harus di Isi" class="form-control" required/> <span id="shownim"></span>
                </div>
                </td>
                </tr>
                <div id="tampildata">
                  <!--<tr >
                  <td width="120" >Alamat MAC</td>
                  <td width="260">
                  <div class='form-group'>
                  <input type="text" name="macaddress" size="43" value="" id="macaddress" class="form-control" maxlength="17" style="text-transform:uppercase;" placeholder="Contoh:D8:9E:3F:32:FA:42" /> <span id="showmac"></span>
                  </div>
                  </td>
                  </tr>-->
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
                      foreach ($data_kelas as $kls) {
                    ?>
                      <option value="<?php echo $kls->kode_kelas?>"><?php echo $kls->kode_kelas ?></option>
                     <?php } ?>
                    </select>
                    </div>
                  </td>
                  </tr>
                   <tr >
                  <td>Email</td>
                  <td>
                  <div class="form-group">
                  <input type="email" name="email" size="43" value="" autocomplete="off" class="form-control" placeholder="nama@domain.com"  required/>
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
        <button class="btn btn-primary" id="regis">Simpan</button>
      </div>
        </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- Akhir mac mhs -->

<!-- mac dosen -->
<div class="modal fade" id="mac_dosen" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Tambah Data Dosen</h4>
      </div>
      <div class="modal-body">
        <form action="<?=base_url()?>admin/simpan_data_dosen" method="post" name="postform" enctype="multipart/form-data" data-toggle="validator">            
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
                <input type="text" name="kodedosen" size="43" value="" id="kodedosen" class="form-control" required/><span id="showkode"></span>
                </div>
                </td>
                </tr>
                <tr >
                <td width="120" >NIP</td>
                <td width="260">
                <div class="form-group">
                <input type="text" name="nip" size="43" value="" id="nip" class="form-control" required/><span id="shownip"></span>
                </div>
                </td>
                </tr>
                 <!--<tr >
                <td>Alamat MAC</td>
                <td>
                <div class="form-group">
                <input type="text" name="macaddress" size="43" value="" id="macaddress_dosen" length="17" style="text-transform:uppercase;" class="form-control" placeholder="Contoh:D8:9E:3F:32:FA:42"  /> <span id="showmac_dosen"></span>
                </td>
                </div>
                </tr>-->
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
        <button class="btn btn-default" data-dismiss="modal">Tutup</button>
        <button class="btn btn-primary" id="regis1">Simpan</button>
      </div>
        </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- Akhir mac dosen -->





<!-- Massal Dosen -->
<div class="modal fade" id="massaldosen" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"
        ><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Input Massal</h4>
      </div>
      <div class="modal-body">
        <form action="function.php?act=importfiledosen" method="post" name="postform" enctype="multipart/form-data" >
            <p>
                <strong>Import Massal</strong>
            </p>
            <div class="asd">
                <label for="backup">File CSV (*.csv)</label><br>
                
                <input type="file" name="filename" class="filestyle" /> <br>
                
                <button type="submit" class="btn btn-primary" name="restore" data-loading-text="Loading...">Proses</button>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
        </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- Akhir Massal Dosen -->   

  <!-- Import Kelas -->
<div class="modal fade" id="kelas" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Input Data Kelas</h4>
      </div>
      <div class="modal-body">
        <form action="function.php?act=importkelas" method="post" name="postform" enctype="multipart/form-data" >
          <table>
           <tr >
                <td width="120" >Kelas</td>
                <td width="260">
                <div class='form-group'>
                <input type="text" name="kelas" size="43" value="" id="kelas" class="form-control" required/>
                </div>
                </td>
            </tr> 
            <tr >
                <td width="120" >Nama Kelas</td>
                <td width="260">
                <div class='form-group'>
                <input type="text" name="namakelas" size="43" value="" id="namakelas" class="form-control" required/>
                </div>
                </td>
            </tr>

          </table>
      </div>
      <div class="modal-footer">
        <button class="btn btn-default" data-dismiss="modal">Close</button>
        <button class="btn btn-primary">Save changes</button>
      </div>
        </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>


<div class="modal fade" id="importmanual" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Tambah Data Manual</h4>
      </div>
      <div class="modal-body">
          <table>
           <tr >
                <td width="120" >Tambah data untuk</td>
                <td width="260">
                <div class='form-group'>
                <select name="kelas" class="form-control" onchange="showForm(this.value)">
                    <option value="">--</option>
                    <option value="import_mac_mhs_manual">MAC Mahasiswa</option>
                    <option value="import_mac_dosen_manual">Mac Dosen</option>
                    <option value="import_kelas_manual">Kelas</option>
                    <option value="import_matakuliah_manual">Mata Kuliah</option>
                    <option value="import_jadwal_manual">Jadwal</option>


                </select>
                <span class="wait"></span>
                </div>
                </td>
            </tr> 
            
            <td colspan="2" id="showform">
                
            </td>

          </table>
      </div>
      <div class="modal-footer">

        <button class="btn btn-default" data-dismiss="modal">Tutup</button>
      </div>
        </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>



<div class="modal fade" id="importmassal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Tambah Data Massal</h4>
      </div>
      <div class="modal-body">
          <table>
           <tr >
                <td width="120" >Tambah Data untuk</td>
                <td width="260">
                <div class='form-group'>
                <select name="kelas" class="form-control" onchange="showForm2(this.value)">
                    <option value="">--</option>
                    <option value="import_mac_dosen">Mac Dosen</option>
                    <option value="import_mac_mhs">Mac Mahasiswa</option>
                </select>
                <span class="wait"></span>
                </div>
                </td>
            </tr> 
            
            <td colspan="2" id="showform2">
                
            </td>

          </table>
      </div>
      <div class="modal-footer">
        <button class="btn btn-default" data-dismiss="modal">Tutup</button>
      </div>
        </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>

<!-- Import Kelas -->
<div class="modal fade" id="matakuliah" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Input Mata Kuliah</h4>
      </div>
      <div class="modal-body">
        <form action="function.php?act=importmatakuliah" method="post" name="postform" enctype="multipart/form-data" >
          <table>
           <tr >
                <td width="120" >Kode Mata Kuliah</td>
                <td width="260">
                <div class='form-group'>
                <input type="text" name="kodemk" size="43" value="" id="kodemk" class="form-control" required/>
                </div>
                </td>
            </tr> 
            <tr >
                <td width="120" >Nama Mata Kuliah</td>
                <td width="260">
                <div class='form-group'>
                <input type="text" name="namamk" size="43" value="" id="namamk" class="form-control" required/>
                </div>
                </td>
            </tr>
            <tr >
                  <td>Kelas</td>
                <td>
                <div class="form-group">
                
                  <select name="kelasmk" class="form-control">
                    <?php 
                      foreach ($data_kelas as $kls) {
                    ?>
                      <option value="<?php echo $kls->kode_kelas?>"><?php echo $kls->kode_kelas ?></option>
                     <?php } ?>
                    </select>
                  </div>
                </td>
                </tr>

          </table>
      </div>
      <div class="modal-footer">
        <button class="btn btn-default" data-dismiss="modal">Close</button>
        <button class="btn btn-primary">Save changes</button>
      </div>
        </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>


<div class="modal fade" id="excel" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Salin Data Kelas</h4>
      </div>
      <div class="modal-body">
        <form action="function.php?act=export1" method="post" name="postform" enctype="multipart/form-data" >
          <table>
           <tr >
                  <td>Salin data untuk Kelas  :  </td>
                <td>
                <div class="form-group">
                
                  <select name="kelas" class="form-control">
                    <?php 
                      foreach ($data_kelas as $kls) {
                    ?>
                      <option value="<?php echo $kls->kode_kelas?>"><?php echo $kls->kode_kelas ?></option>
                     <?php } ?>
                    </select>
                  </div>
                </td>
            </tr>
            <tr >
                  <td>Tipe file yang akan di export :  </td>
                <td>
                <div class="form-group">
                
                  <select name="tipe" class="form-control">
                    <option value="csv">csv</option>
                    <option value="xls">xls</option>
                   
                  </select>
                  </div>
                </td>
            </tr>

          </table>
      </div>
      <div class="modal-footer">
        <button class="btn btn-default" data-dismiss="modal">Close</button>
        <button class="btn btn-primary">Export</button>
      </div>
        </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>
    
<!-- jQuery -->
    <script src="<?php echo base_url() ?>js/jquery.js"></script>
    <script src="<?php echo base_url() ?>js/jquery.append.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url() ?>js/bootstrap.min.js"></script>

    <!-- Datatables -->
    <script src="<?php echo base_url() ?>vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url() ?>vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url() ?>vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="<?php echo base_url() ?>vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="<?php echo base_url() ?>vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="<?php echo base_url() ?>vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="<?php echo base_url() ?>vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="<?php echo base_url() ?>vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?php echo base_url() ?>vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="<?php echo base_url() ?>vendors/datatables.net-scroller/js/datatables.scroller.min.js"></script>
    <script src="<?php echo base_url() ?>vendors/jszip/dist/jszip.min.js"></script>
    <script src="<?php echo base_url() ?>vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="<?php echo base_url() ?>vendors/pdfmake/build/vfs_fonts.js"></script>

    <!-- Datatables -->
    <script>
      $(document).ready(function() {

        $('#datatable').dataTable({
          "language":{
            "sProcessing"     : "Memproses...",
            "sSearch"         : "Cari : ",
            "sLengthMenu"     : "Tampilakan _MENU_ entri",
            "sZeroRecords"    : "Tidak ditemukan data yang sesuai",
            "sEmptyTable"     : "Tidak ada data pada tabel",
            "sInfo"           : "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
            "sInfoEmpty"      : "Menampilkan 0 sampai 0 dari 0 entri",
            "sInfoFiltered"   : "(disaring dari _MAX_ entri keseluruhan)",
            "sInfoPostFix"    : "",
            "sUrl"            : "",
            "oPaginate"       : {
                      "sFirst"    : "Pertama",
                      "sPrevious" : "Sebelumnya",
                      "sNext"     : "Selanjutnya",
                      "sLast"     : "Terakhir"
            }
          }
        });
      });
    </script>
    <!-- /Datatables -->
        

        <!-- select file backup/restore.php -->
        <script src="<?php echo base_url() ?>js/jquery-latest.min.js"></script>
        <script src="<?php echo base_url() ?>js/jquery.inputfile.js"></script>
        <script>
            $('input[type="file"]').inputfile({
            uploadText: '<span class="fa fa-upload"></span> Select a file',
            removeText: '<span class="fa fa-trash"></span>',
            restoreText: '<span class="fa fa-remove"></span>',

            uploadButtonClass: 'btn btn-success',
            removeButtonClass: 'btn btn-danger'
            });
        </script>

        <script type="text/javascript">
            function showForm(str) {
                var i=0;
                
                function tambahProgress(){
                    i++;
                    $(".wait").html("<label class='label label-info'>Wait...</label>");
                    timer=setTimeout(tambahProgress);    
                    if (i==50) {
                        clearTimeout(timer);
                        
                        if (str=="") {
                            document.getElementById("showform").innerHTML="";
                            //$("#showJabatan").html("");
                            return;
                        } 
                        if (window.XMLHttpRequest) {
                            // code for IE7+, Firefox, Chrome, Opera, Safari
                            xmlhttp=new XMLHttpRequest();
                        } else { // code for IE6, IE5
                            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
                        }
                        xmlhttp.onreadystatechange=function() {
                            if (xmlhttp.readyState==4 && xmlhttp.status==200) {
                                $(".wait").html("");
                                document.getElementById("showform").innerHTML=xmlhttp.responseText;
                                //$("#showJabatan").html(xmlhttp.responseText);
                            }
                        }
                        xmlhttp.open("GET","cariform.php?nama_form="+str,true);
                        xmlhttp.send();
                    }
                }
                timer=setTimeout(tambahProgress);
            }
        </script>

         <script type="text/javascript">
            function showForm2(str) {
                var i=0;
                
                function tambahProgress(){
                    i++;
                    $(".wait").html("<label class='label label-info'>Wait...</label>");
                    timer=setTimeout(tambahProgress);    
                    if (i==50) {
                        clearTimeout(timer);
                        
                        if (str=="") {
                            document.getElementById("showform2").innerHTML="";
                            //$("#showJabatan").html("");
                            return;
                        } 
                        if (window.XMLHttpRequest) {
                            // code for IE7+, Firefox, Chrome, Opera, Safari
                            xmlhttp=new XMLHttpRequest();
                        } else { // code for IE6, IE5
                            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
                        }
                        xmlhttp.onreadystatechange=function() {
                            if (xmlhttp.readyState==4 && xmlhttp.status==200) {
                                $(".wait").html("");
                                document.getElementById("showform2").innerHTML=xmlhttp.responseText;
                                //$("#showJabatan").html(xmlhttp.responseText);
                            }
                        }
                        xmlhttp.open("GET","<?=base_url()?>admin/form/"+str,true);
                        xmlhttp.send();
                    }
                }
                timer=setTimeout(tambahProgress);
            }
        </script>

    
    <script type="text/javascript">
      $(document).ready(function() {
        $("#nim").change(function(){ 
        $('#shownim').html("checking ...");
        var nim  = $("#nim").val(); 
        
            $.ajax({
              type:"POST",
              url:"<?=base_url()?>admin/ceknim",    
              data: "nim=" + nim,
              success: function(data){        
                if(data=="<span class='label label-success'><i class='fa fa-check'></i></span>"){
                  $("#shownim").html(data);
                  $("#regis").fadeIn();
                }  
                else{
                  $("#shownim").html(data);
                  $("#regis").fadeOut(); 
                //} else {
                //  $("#shownim").html(data);
                //  $("#regis").fadeOut(); 
                }
              }
            });
        })
      });
    </script>

    <script type="text/javascript">
    $(document).ready(function() {
      $("#macaddress").change(function(){ 
      $('#showmac').html("checking ...");
      var macaddress  = $("#macaddress").val(); 
      $.ajax({
        type:"POST",
        url:"<?=base_url()?>admin/cekmac",    
        data: "macaddress=" + macaddress,
        success: function(data){                 
          if(data=="<span class='label label-success'><i class='fa fa-check'></i></span>"){
            $("#showmac").html(data);
            $("#regis").fadeIn();
          }  
          /*else if(data=="<span class='label label-success'><i class='glyphicon glyphicon-ok'></i></span>"){
            $("#showmac").html(data);
            $("#regis").fadeIn();
          }*/ else {
            $("#showmac").html(data);
            $("#regis").fadeOut(); 
          }
        }
      });
      })
    });
  </script>

    <script type="text/javascript">
      $(document).ready(function() {
        $("#kodedosen").change(function(){ 
        $('#showkode').html("checking ...");
        var kodedosen  = $("#kodedosen").val(); 
        
            $.ajax({
              type:"POST",
              url:"<?=base_url()?>admin/cekkodedosen",    
              data: "kode_dosen=" + kodedosen,
              success: function(data){        
                if(data=="<span class='label label-success'><i class='fa fa-check'></i></span>"){
                  $("#showkode").html(data);
                  $("#regis1").fadeIn();
                }  
                else{
                  $("#showkode").html(data);
                  $("#regis1").fadeOut(); 
                //} else {
                //  $("#shownim").html(data);
                //  $("#regis").fadeOut(); 
                }
              }
            });
        })
      });
    </script>

    <script type="text/javascript">
      $(document).ready(function() {
        $("#nip").change(function(){ 
        $('#shownip').html("checking ...");
        var nip  = $("#nip").val(); 
        
            $.ajax({
              type:"POST",
              url:"<?=base_url()?>admin/ceknip",    
              data: "nip=" + nip,
              success: function(data){        
                if(data=="<span class='label label-success'><i class='fa fa-check'></i></span>"){
                  $("#shownip").html(data);
                  $("#regis1").fadeIn();
                }  
                else{
                  $("#shownip").html(data);
                  $("#regis1").fadeOut(); 
                //} else {
                //  $("#shownim").html(data);
                //  $("#regis").fadeOut(); 
                }
              }
            });
        })
      });
    </script>

    <script type="text/javascript">
    $(document).ready(function() {
      $("#macaddress_dosen").change(function(){ 
      $('#showmac_dosen').html("checking ...");
      var macaddress  = $("#macaddress_dosen").val(); 
      $.ajax({
        type:"POST",
        url:"<?=base_url()?>admin/cekmac",    
        data: "macaddress=" + macaddress,
        success: function(data){                 
          if(data=="<span class='label label-success'><i class='fa fa-check'></i></span>"){
            $("#showmac_dosen").html(data);
            $("#regis1").fadeIn();
          }  
          /*else if(data=="<span class='label label-success'><i class='glyphicon glyphicon-ok'></i></span>"){
            $("#showmac").html(data);
            $("#regis").fadeIn();
          }*/ else {
            $("#showmac_dosen").html(data);
            $("#regis1").fadeOut(); 
          }
        }
      });
      })
    });
  </script>

    
  <script type="text/javascript">
    var macAddress = document.getElementById("macaddress");

    function formatMAC(e) {
        var r = /([a-f0-9]{2})([a-f0-9]{2})/i,
            str = e.target.value.replace(/[^a-f0-9]/ig, "");

        while (r.test(str)) {
            str = str.replace(r, '$1' + ':' + '$2');
        }

        e.target.value = str.slice(0, 17);
    };

    macAddress.addEventListener("keyup", formatMAC, false);
  </script>

  <script type="text/javascript">
    var macAddress = document.getElementById("macaddress_dosen");

    function formatMAC(e) {
        var r = /([a-f0-9]{2})([a-f0-9]{2})/i,
            str = e.target.value.replace(/[^a-f0-9]/ig, "");

        while (r.test(str)) {
            str = str.replace(r, '$1' + ':' + '$2');
        }

        e.target.value = str.slice(0, 17);
    };

    macAddress.addEventListener("keyup", formatMAC, false);
  </script>

  <script type="text/javascript">
  </script>

</body>

</html>
