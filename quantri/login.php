<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" rel= "stylesheet" >
<form action="xulylogin.php" method="post" id="frmlogin" class="col-5 m-auto bg-secondary p-2 text-white">
<div class="form-group">
<h4 class="border-bottom pb-2"  style="text-align: center;">ĐĂNG NHẬP</h4>
</div>
<div class="form-group">
   <label>Username</label> <input name="u" type="text" class="form-control"/>
</div>
<div class="form-group">
   <label>Mật khẩu</label> <input name="p" type="password" class="form-control"/>
   <a href="quenpass.php" style="float: right;">Quên mật khẩu?</a>
</div> 
<div class="form-group"> <input name="nho" type="checkbox"/> Ghi nhớ </div>
<div class="form-group">
    <input name="btn" type="submit" value="Đăng nhập" class="btn btn-primary"/> 
</div>
</form>
