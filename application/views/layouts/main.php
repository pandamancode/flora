<!DOCTYPE html>
<html>
  <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <title>Kalo Klinik</title>
    <link rel="shortcut icon" href="<?php echo base_url()?>assets/dist/img/logo.png">
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta name="author" content="thonie, Web Developer">
    <?php
    $this->load->view('layouts/css');
    $this->load->view('layouts/js');
    ?>
  </head>
  <body class="layout-top-nav skin-yellow">
    <div class="wrapper">
      <?php $this->load->view('layouts/header_v'); ?>
      <div class="content-wrapper" id="contenkalo">
        <!-- <br> -->
        <section class="content">
          <?php
            $this->load->view($content);
          ?>
        </section>
        
      </div>
      <script type="text/javascript">
      function check_int(evt) {
            var charCode = ( evt.which ) ? evt.which : event.keyCode;
            return ( charCode >= 48 && charCode <= 57 || charCode == 8 );
        }
      </script>
      <footer class="main-footer">
          <strong> &copy; Copyright </strong>  <span style="color:#F00"><strong>Kalo Klinik <span style="color:#06F">2020</span></strong></span>  </span>
      </footer>
    </div>
  </body>
</html>
