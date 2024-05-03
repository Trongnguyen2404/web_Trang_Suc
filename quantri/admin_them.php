<div class="col-5 m-auto bg-secondary p-2 text-white" style="margin: 0!important; max-width:100%!important;">
<style>
.select-menu{
    width: 170px;
    display: inline-block;
}
.select-menu .select-btn {
    display: flex;
    height: 36px;
    background: #fff;
    padding: 8px;
    font-size: 15px;
    font-weight: 400;
    border-radius: 8px;
    align-items: center;
    cursor: pointer;
    justify-content: space-between;
    box-shadow: 0 0 5px rgba(0,0,0,0.1);
}
.select-menu.active .select-btn i{
    transform: rotate(-180deg);
}
.select-menu .options {
    position: absolute;
    margin-top: 10px;
    border-radius: 8px;
    background: #f6f6f6;
    box-shadow: 0 0 3px rgba(0,0,0,0.1);
    z-index: 50;
    width: 170px;
    height: 0px; /* Đặt chiều cao ban đầu là 0 */
    overflow: hidden; /* Ẩn nội dung khi không active */
    text-align: center;
    transition: height 1s ease; /* Thay đổi transition time thành 0.4s */
}
.select-menu .options.active {
    display: block;
    height: 80px;
}
.options .option {
    display: flex;
    height: 15px;
    cursor: pointer;
    margin: 15px 0;
    padding: 0 16px;
    border-radius: 8px;
    align-items: center;
    transition: margin 1s ease;
}
.options .option:hover{
    margin: 15px;
}
.option i{
    font-size: 15px;
    margin-right: 12px;
}
.option .option-text{
    font-size: 15px;
    color: #333;
}
a.option-link {
    text-decoration: none;
}
label {
    float: left;
    margin: 5px;
    font-weight: 600;
    font-size: 15px;
}
.form-group {
    width: 95%;
    margin: auto;
    margin-bottom: 1rem;
}
</style>
<div class ="top-card">
        <div class="Name-card">
        create admin account
        </div>
            <div class="search">
                    <div class="form-group">
                        <input type="text" class="form-control" id="search" name="search" placeholder="Enter admin name">
                    </div>
            </div>
        <!-- Dropdown start -->
        <div class="select-menu">
            <div class="select-btn">
                <span class="sBtn-text">Select your option</span>
                <i class="fa-solid fa-chevron-down"></i>
            </div>
            <ul class="options">
                <li class="option">
                    <a class="option-link" href="http://localhost/web_Trang_Suc/quantri/index.php?page=admin_ds">
                        <span class="option-text">List</span>
                    </a>
                </li>
                <li class="option">
                    <a class="option-link" href="http://localhost/web_Trang_Suc/quantri/index.php?page=admin_them">
                        <span class="option-text">Add new</span>
                    </a>
                </li>
            </ul>
        </div>


                <script>
const optionMenu = document.querySelector(".select-menu");
const selectBtn = optionMenu.querySelector(".select-btn");
const option = optionMenu.querySelector(".options"); // Thay đổi từ querySelectorAll thành querySelector
const options = optionMenu.querySelectorAll(".option");
const sBtn_text = optionMenu.querySelector(".sBtn-text");

selectBtn.addEventListener("click", () => {
    optionMenu.classList.toggle("active");
    option.classList.toggle("active"); // Kích hoạt lớp active cho phần tử .options
});

options.forEach(option => {
    option.addEventListener("click", (event) => {
        event.preventDefault(); // Ngăn chặn hành vi mặc định của thẻ a
        let selectedOption = option.querySelector(".option-text").innerText;
        sBtn_text.innerText = selectedOption;
        optionMenu.classList.remove("active");
        let link = option.querySelector(".option-link").getAttribute("href"); // Lấy đường dẫn từ thuộc tính href của thẻ a
        window.location.href = link; // Chuyển hướng đến đường dẫn
    });
});

</script>
    </div>
    <div class ="card">
<form action="xulydangky.php" method="post" >
  <div class="form-group">
    <label for="username">Username:</label>
    <input type="text" class="form-control" id="username" name="username" >    
  </div>
  <div class="form-group">
    <label for="password">Password:</label>
    <input type="password" class="form-control" id="password" name="pass">
  </div>
  <div class="form-group">
    <label for="repass">Enter the password:</label>
    <input type="password" class="form-control" id="repass" name="repass">
  </div>
  <div class="form-group">
    <label for="email">Email:</label>
    <input type="email" class="form-control" id="email" name="email" >    
  </div>
  <div class="form-group">
    <label for="SoDienThoai">Phone number:</label>
    <input type="tel" class="form-control" id="SoDienThoai" name="SoDienThoai" >    
  </div>
   <div class="form-group">
       <input type="submit" class="btn btn-primary py-2 px-5" value="Register"> 
       <input type="reset" class="btn btn-danger py-2 px-5" value="Reset">
  </div>
</form>
</div>
</div>
