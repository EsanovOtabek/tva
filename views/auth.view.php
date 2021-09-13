<?
  if(isset($_SESSION['user'])&&count($_SESSION['user'])>2){
    header("location: /");
  }
  
  $params=$param;
  $_SESSION['_shrft']=md5(time()).rand();
?>
<!-- Html Head -->
<? include_once 'include/head.php'; ?>

<body>
  <section class="material-half-bg">
    <div class="cover"></div>
  </section>
  <section class="login-content">
    <div class="logo">
      <h1 style="font-family:calibri;">TVA - Auth</h1>
    </div>
    <div class="login-box">

      <form class="login-form" method="POST" action="fetch.php">
        <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>Login</h3>

        <div class="form-group">
          <label class="control-label">Email</label>
          <input class="form-control" type="text" name="email" placeholder="Email" autofocus required>
        </div>
        <div class="form-group">
          <label class="control-label">Password</label>
          <input class="form-control" type="password" name="password" placeholder="Password" required>
        </div>
        <input type="text" name="_shrft" value="<?=$_SESSION['_shrft']?>" hidden>
        <input type="text" name="object" value="user" hidden>
        <input type="text" name="method_name" value="login" hidden>

        <div class="form-group">
          <div class="utility">
              <p class="semibold-text mb-2"><a href="#" data-toggle="flip">You haven't account? Register</a></p>
          </div>
        </div>
        <div class="form-group btn-container">
          <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>Login</button>
        </div>
      </form>

      <form class="forget-form" method="POST" action="fetch.php">
        <h3 class="login-head"><i class="fa fa-lg fa-fw fa-lock"></i>Register</h3>

        <div class="form-group">
          <label class="control-label">F.I.O</label>
          <input class="form-control" type="text" name="fio" placeholder="FIO" autofocus required>
        </div>
        <div class="form-group">
          <label class="control-label">Email</label>
          <input class="form-control" type="text" name="email" placeholder="Email" autofocus required>
        </div>
        <div class="form-group">
          <label class="control-label">Password</label>
          <input class="form-control" type="password" name="password" placeholder="Password" required>
        </div>
        <input type="text" name="_shrft" value="<?=$_SESSION['_shrft']?>" hidden>
        <input type="text" name="object" value="user" hidden>
        <input type="text" name="method_name" value="register" hidden>

        <div class="form-group btn-container">
          <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-unlock fa-lg fa-fw"></i>Register</button>
        </div>
        <div class="form-group mt-3">
          <p class="semibold-text mb-0"><a href="#" data-toggle="flip"><i class="fa fa-angle-left fa-fw"></i> Back to Login</a></p>
        </div>
      </form>


    </div>
  </section>

  <!-- script -->
  <? include_once 'include/script.php'; ?>
  <?=$script?>
</body>
</html>