<!-- Page Heading -->
                <div class="row"></div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
    </div>
    <!-- /#wrapper -->
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

</body>

</html>
