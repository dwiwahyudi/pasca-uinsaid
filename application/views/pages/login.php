<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sign in | Pasca Sarjana UIN RM Said Surakarta</title>
  <base href="<?php echo base_url();?>">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/adminlte.min.css">
  <style>
    body{
      background: url('<?=base_url();?>assets/img/bg2.png');
      /* background: url('<?=base_url();?>assets/img/icon.png'); */
      /* background: #e3e3e3 !important; */
    }
    .left-side{
      background: #ff9019;
      border-left: 1px solid #ff9019;
      border-radius:0;
    }
  </style>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="<?php echo base_url(); ?>index.php"> <i class="fas fa-fingerprint" style="color: #ad0000;"></i> <b>Sign</b> In</a>
  </div>
  <!-- /.login-logo -->
  <!-- <div class="row">
    <div class="card left-side">
      <div class="card-body">Test</div>
    </div> -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg my-2">Sign in to start your session</p>
      <div id="alert"></div>

      <form id="signin-form">
        <div>Username or Email</div>
        <div class="input-group mb-3">
          <input type="text" name="uname" id="uname" class="form-control" placeholder="Username or Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div>Password</div>
        <div class="input-group mb-3">
          <input type="password" name="passwd" id="passwd" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div>Account type</div>
        <div class="mb-3">
          <select name="acc_type" id="acc_type" class="form-control" placeholder="Jenis akun">
            <option value=""></option>
            <option value="10">Mahasiswa</option>
            <option value="5">Dosen</option>
            <option value="4">Direktur</option>
            <option value="3">Kaprodi</option>
            <option value="2">Admin akademik</option>
            <option value="1">Admin persuratan</option>
            <option value="0">Administrator</option>
          </select>
        </div>

        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="button" class="btn btn-primary btn-block" id="signin2">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
<!-- 
      <div class="social-auth-links text-center mb-3">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>
      </div> -->
      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p>
      <p class="mb-0">
        <!-- <a href="register.html" class="text-center">Register a new membership</a> -->
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
  
  <!-- </div> -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->

<script src="<?php echo base_url(); ?>assets/dist/js/account.js"></script>
<script src="<?php echo base_url(); ?>assets/dist/js/adminlte.min.js"></script>
</body>
</html>
