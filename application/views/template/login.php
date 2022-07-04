<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>SMARTID</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
      <link href="<?php echo base_url() ?>assets/bootstrap.css" rel="stylesheet" media="screen">
      <link href="<?php echo base_url() ?>assets/css/docs.css" rel="stylesheet">
      <link href="<?php echo base_url() ?>assets/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
      
      <link href="<?php echo base_url() ?>awesome/css/font-awesome.css" rel="stylesheet">
      

    <style>
      body {

        padding-top: 0px; /* 60px to make the container go all the way to the bottom of the topbar */
      }
      #about {
        background-image:url('<?php echo base_url() ?>images/11.jpg');
        background-attachment: fixed;
        background-position: center center;
        background-size: cover;
        /*margin-top: -1px;*/
        min-height: 667px;
      }
      .header-content .header-content-inner{
        text-align: center; 
        color: #111;
      }
      .header-content-inner{

      }

      #home{
        /*background-image:url('images/5.jpg');*/
        background-attachment: inherit;
        background-position: center center;
        background-size: cover;
        /*margin-top: -1px;*/
        min-height: 667px;
      }

      #about #skip {
        border: medium none;
        display: block;
        position: absolute;
        bottom: 1.5rem;
        left: 0px;
        right: 0px;
        height: 1.5rem;
      }
      #about #skip svg {
        width: 3rem;
        height: 1.5rem;
        display: block;
        margin: 0px auto;
      }

      /* CUSTOMIZE THE CAROUSEL
      -------------------------------------------------- */

      /* Carousel base class */
      .carousel {
        margin-bottom: 0px;
      }

      .carousel .container {
        position: relative;
        z-index: 9;

      }

      .carousel-control {
        height: 80px;
        margin-top: 45px;
        font-size: 120px;
        text-shadow: 0 1px 1px rgba(0,0,0,.4);
        background-color: transparent;
        border: 0;
        z-index: 10;
      }

      .carousel-indicators {
        float: left;
        bottom: 15px;
        margin-left: 600px;
      }

      .carousel-indicators li {
        cursor: pointer;
        padding: 5px;
      }

      .carousel .item {
        min-height: 667px;

      }
      .carousel img {
        position: absolute;
        top: 0;
        left: 0;
        min-width: 100%;
        min-height: 667px;

      }

      .carousel-caption {
        background-color: transparent;
        position: static;
        max-width: 550px;
        padding: 0 20px;
        margin-top: 300px;

      }
      .carousel-caption img {
        height: 80px;
        max-width: 100px;
        margin-top:300px;
        margin-left:20px;
      }
      .carousel-caption h1,
      .carousel-caption .lead {
        margin: 0;
        line-height: 1.25;
        color: #fff;
        text-shadow: 0 1px 1px rgba(0,0,0,.4);

      }
      .carousel-caption .btn {
        margin-top: 10px;
      }
    </style>
    <link href="<?php echo base_url() ?>assets/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->
  </head>

  <body>

   <div class="navbar navbar-inverse navbar-fixed-top" style="margin-top: 15px;width: 90%;margin-left: 5%;">
      <div class="navbar-inner" style="-webkit-border-radius:6px;-moz-border-radius:6px;border-radius:6px;">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href=""> &nbsp; SMART IDENTIFICATION</a>
          <div class="nav-collapse collapse">
            <ul class="nav pull-right" id="top-nav">
              <li class="active"><a href="#home">Beranda</a></li>
              <li><a href="#about">Tentang</a></li>
              <li class="divider-vertical"></li>
              <li class="dropdown">
                <a class="dropdown-toggle" href="#" data-toggle="dropdown">Masuk <strong class="caret"></strong></a>
                <div class="dropdown-menu" style="padding: 15px; padding-bottom: 0px;"> 
                  <div class="loading" style="text-align: center"></div>
                  <form action="" id="loginF" name="loginF" class="formlog" method="post">
                    <div class="form-group">
                      <label for="username" class="control-label">Id Pengguna</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Id Pengguna"  data-error="Username anda masih kosong" required>
                      <div class="help-block with-errors" ></div>
                    </div>
                    <div class="form-group">
                      <label for="inputPassword" class="control-label">Kata Sandi</label>
                      <div class="form-group col-sm-6">
                          <input type="password" class="form-control" id="password" name="password" placeholder="Kata Sandi" required>
                      </div>
                    </div>
                      <input type="submit" class="btn btn-info btn-submit" name="butLogin" id="butLogin" onchange="login()" value="Masuk" />
                      <!-- daftar -->
                      <a href="#daftar" data-toggle="modal" class="btn btn-primary">Daftar</a>
                  </form>
                </div>
              </li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
    
    <?php echo $this->session->flashdata('notification'); ?>

    <div id="home">
     <br>
     <br>
     <br>
     <br>
    <!--<img style="width:180px;margin-top:12%;-webkit-border-radius: 6px;-moz-border-radius: 6px;border-radius: 6px;-o-border-radius: 6px;" src="images/2.png"/>-->
            <!--<h2 style="font-size:35px; margin-left:60%;margin-top:30%;">Welcome to <br> Smart Identification </h2>-->
            
    </div>
    
    <div id="about">
      <div class="header-content">
        <div class="header-content-inner">
            <!--<video autoplay width="100%" height="10%">
              <source src="/video/videoplayback.mp4" type="video/mp4">
            </video>-->
        </div>
      </div>
      <a href="#home" id="skip" title="Go to top">
        <svg enable-background="new 0 0 50 50" height="50px" id="Layer_1" version="1.1" viewBox="0 0 50 50" width="50px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
          <rect fill="none" height="50" width="50"/>
          <polygon points="2.75,35 4.836,37.086 25,16.922 45.164,37.086 47.25,35 25,12.75 "/>
          <rect fill="none" height="50" width="50"/>
        </svg>
      </a>
    </div>

    <!-- Daftar -->
    <div class="modal hide fade" id="daftar" tabindex="-1" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Daftar</h4>
          </div>
          <div class="modal-body">
           <form action="<?=base_url()?>admin/daftar" method="post" name="postform" enctype="multipart/form-data" > 
            <table width="570" border="0">
            <tr >
            <td width="120" >NIM/NIP</td>
            <td width="260">
            <div class='form-group'> <input type="text" name="nim" size="43" value="" id="nim" placeholder="NIM/NIP" required > <span id="shownim"></span> </div>
            </td>
            </tr>
            <tr >
            <td width="120" >Alamat MAC</td>
            <td width="260">
            <div class='form-group'> <input type="text" name="macaddress" size="43" value="" id="macaddress" maxlength="17" style="text-transform:uppercase;" placeholder="CAPS ex : F4:NE:67:BB:90:EE " required/> <span id="showmac"></span> </div>
            </td>
            </tr>
            <tr >
            <td width="120" >Password</td>
            <td width="260">
            <div class='form-group'> <input type="password" name="password" size="43" id="password" maxlength="8" required/></div>
            </td>
            </tr>
            </table>
          </div>
          <div class="modal-footer">
            <button class="btn btn-default" data-dismiss="modal">Tutup</button>
            <button class="btn btn-primary" id="regis">Registrasi</button>
          </div>
          </form> 
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <!-- Akhir Daftar -->
    
    <script src="<?php echo base_url() ?>assets/js/jquery.js"></script>
    <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/bootstrap-carousel.js"></script>
    <script src="<?php echo base_url() ?>assets/js/bootstrap-scrollspy.js"></script>
    <script src="<?php echo base_url() ?>assets/js/jquery.validate.min.js" type="text/javascript"></script>
    <script type="text/javascript">
      $.validator.setDefaults({
        submitHandler: function() { login(); },
      });
      
      $().ready(function() {
        // validate the comment form when it is submitted
        $("#loginF").validate();
      });


      function login(){  

        //jalankan otomatis
        var i;
        var text = "Wait...";
        var tulisan;
        var durasi;
        i=0;
        durasi = 121; 
        function tambahProgress(){
          i++;
          if (i>99) { tulisan = text } else { tulisan = i+"%" };
          $(".loading").html("<div class='progress progress-striped active' style='height:20px;'><div class='bar' style='width:"+i+"%;'><i style:'margin-top:-10px;'>"+tulisan+"</i></div></div>");
          timer=setTimeout(tambahProgress);

          if(i==100){
            clearTimeout(timer);
            $.post('<?php echo base_url()?>welcome/signin', $(".formlog").serialize(), function(hasil){  
              $('form input[type="text"],form input[type="password"]').val('');
              $(".loading").html(hasil);
            
            });
            
          } 

        }
        timer=setTimeout(tambahProgress);
      } 
      </script>
    <script>
    $('.carousel').carousel({
        speed: 5000 //changes the speed
    })
    </script>
    <script src="<?php echo base_url() ?>js/plugins.js"></script>
    <script src="<?php echo base_url() ?>js/main.js"></script>
    <script>
         $('#top-nav').onePageNav({
            currentClass: 'active',
            changeHash: true,
             scrollSpeed: 1200
        });
    </script>
  <script type="text/javascript" src="<?php echo base_url() ?>js/jquery.backstretch.min.js"></script>
  <script>
    $(document).ready(function(){
      $.backstretch([
          "<?php echo base_url() ?>images/telkom.jpg",
          "<?php echo base_url() ?>images/telkom.jpg"
      ], {duration: 5000, fade: 1000});
      })
  </script>
  <script type="text/javascript">
    $(document).ready(function() {
      $("#nim").change(function(){ 
      $('#shownim').html("checking ...");
      var nim  = $("#nim").val(); 
      $.ajax({
        type:"POST",
        url:"<?=base_url()?>welcome/ceknim_nip",    
        data: "id=" + nim,
        success: function(data){                 
          if(data=="<span class='label label-success'>NIM Terdaftar</span>"){
            $("#shownim").html(data);
            $("#regis").fadeIn();
          }  
          else if(data=="<span class='label label-success'>NIP Terdaftar</span>"){
            $("#shownim").html(data);
            $("#regis").fadeIn(); 
          } else {
            $("#shownim").html(data);
            $("#regis").fadeOut(); 
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
        url:"<?=base_url()?>welcome/cekmac",    
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
</html> 