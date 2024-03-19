<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" rel= "stylesheet" >
<div class="col-5 m-auto bg-secondary p-2 text-white" style="margin: 0!important; max-width:100%!important;">
<form action="xulydangky.php" method="post" >
    <h4 class="border-bottom pb-2"  style="text-align: center;">ĐĂNG KÝ THÀNH VIÊN</h4>
  <div class="form-group">
    <label for="username">Tên truy cập</label>
    <input type="text" class="form-control" id="username" name="username" >    
  </div>
  <div class="form-group">
    <label for="password">Mật khẩu</label>
    <input type="password" class="form-control" id="password" name="pass">
  </div>
  <div class="form-group">
    <label for="repass">Nhập lại mật khẩu</label>
    <input type="password" class="form-control" id="repass" name="repass">
  </div>
  <div class="form-group">
    <label for="email">Email</label>
    <input type="email" class="form-control" id="email" name="email" >    
  </div>
  <div class="form-group">
    <label for="SoDienThoai">Số điện thoại</label>
    <input type="tel" class="form-control" id="SoDienThoai" name="SoDienThoai" >    
  </div>
  <div class="form-group">    
      <label>Phái : </label>
    <input type="radio" name="phai" id="nam" value=1 checked/> <label for="nam">Nam</label> 
    <input type="radio" name="phai" id="nu" value=0> <label for="nu">Nữ</label> 
  </div>   
  <div class="form-group">    
    <label>Sở thích: </label>
    <input type="radio" name="sothich" id="st3" value=2 checked/> <label for="st3">Cà phê đen</label> 
    <input type="radio" name="sothich" id="st2" value=1> <label for="st2">Cà phê sữa</label> 
    <input type="radio" name="sothich" id="st1" value=0> <label for="st1">Cả hai</label> 
  </div>
   <div class="form-group">
       <input type="submit" class="btn btn-primary py-2 px-5" value="Đăng ký"> 
       <input type="reset" class="btn btn-danger py-2 px-5" value="Làm lại">
  </div>
</form>
</div>
