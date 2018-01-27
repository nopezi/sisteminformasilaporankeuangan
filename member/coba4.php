<style type="text/css" media="screen">

/** 
Css validasi
**/
.error{color:#f00;}
label.error {margin-top:6px;}
input.error {border-color:#F00;}
</style>

<script>
	$("#form-registrasi").validate();
</script>

<div class="container"><div class="row"><div class="col-sm-4 col-sm-offset-4">
  <form action="#" id="form-registrasi" class="panel panel-primary form-horizontal">
    <div class="panel-heading">
     <h3 class="panel-title text-center">Form Registrasi</h3>
    </div>
    
    <div class="panel-body">
    
    <div class="form-group">
      <label class="control-label col-sm-4">Username</label>
      <div class="col-sm-8">
        <input class="form-control" type="text" name="username" id="username" placeholder="Username" required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-4">Password</label>
      <div class="col-sm-8">
        <input class="form-control" type="password" name="password" id="password" placeholder="Username" required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-4">Email</label>
      <div class="col-sm-8">
        <input class="form-control" type="text" name="email" id="email" placeholder="Username" required>
      </div>
    </div>
    
    </div>
    <div class="panel-footer text-right">
      <button type="submit" class="btn btn-primary">Registrasi</button>
    </div>
  </form>
  </div></div></div>