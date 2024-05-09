<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="footer-col">
                <h4>CUSTOMER SERVICE</h4>
                <ul>
                    <li><a href="terms-and-condition.php">Terms and Conditions</a></li>
                    <li><a href="return-and-refund-policy.php">Return and Refund Policy</a></li>
                    <li><a href="delivery-policy.php">Delivery Policy</a></li>
                    <li><a href="privacy-policy.php">Privacy Policy</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>USER MANUAL</h4>
                <ul>
                    <li><a href="user-manual-01.php">Why should you choose high quality silver?</a></li>
                    <li><a href="distinguishing-different-types-of-silver.php">Distinguishing different types of silver</a></li>
                    <li><a href="how-to-preserve-silver-jewelry.php">How to preserve silver jewelry</a></li>
                </ul>
            </div>
            <div class="footer-col footer-col-contact">
                <h4>CONTACT</h4>
                <ul class="contact" style="">
                    <li>Address: Nguyen Anh Thu Street, District 12, Ho Chi Minh City</li>
                    <li>Phone: 0346019375</li>
                    <li>Email: contact@july.vn</li>
                </ul>
            </div>
            <form id="review_form1">
                <div class="row">
                    <div class="colum colum-two">
                        <input type="text" name="user_name1" placeholder="Name" required="" class="user_name1" style="padding: 10px; width: 100%;">
                    </div>
                    <div class="colum colum-two">
                        <input type="email" name="email1" placeholder="Email" required="" class="email1" style="width: 100%; padding: 10px;">
                    </div>
                </div>
                <div class="row mt-8">
                    <div class="colum colum-full">
                        <input type="text" name="user_review1" placeholder="Message" required="" class="user_review1" style="width: 100%; padding: 10px;">
                    </div>
                </div>
                <button type="button" class="" id="save_review1" style="float: right; margin: 10px 18px; padding: 10px; font-size: 14px;">Submit</button>
            </form>
                <div class="notifications1"></div>
                <style>
                    .notifications1 {
                        position: fixed;
                        top: 30px;
                        right: 20px;
                        z-index: 50;
                    }
                </style>
        </div>
    </div>
    
</footer>
<script>
    $(document).ready(function() {
        // Thêm sự kiện khi click vào nút "Submit"
        $('#save_review1').click(function() {
            var user_name = $('.user_name1').val();
            var email = $('.email1').val();
            var user_review = $('.user_review1').val();

            if (user_name == '' || email == '' || user_review == '') {
                createToast('error', 'fa-solid fa-times-circle', 'Error', 'Please fill in all fields.');
                return false;
            } else {
                $.ajax({
                    url: "connnec_submit1.php",
                    method: "POST",
                    data: {
                        user_name1: user_name,
                        email1: email,
                        user_review1: user_review
                    },
                    success: function(response) {
                        createToast('success', 'fa-solid fa-check-circle', 'Success', response);
                        $('#review_form1')[0].reset(); // Reset form after successful submission
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        createToast('error', 'fa-solid fa-times-circle', 'Error', 'An error occurred, please try again later.');
                    }
                });
            }
        });
        let notifications1 = document.querySelector('.notifications1');
        let canShowToast1 = true; // Biến để kiểm tra xem có thể hiển thị thông báo mới hay không

        function createToast(type, icon, title, text){
            if (canShowToast1) { // Kiểm tra trạng thái hiển thị của thông báo
                let newToast = document.createElement('div');
                newToast.innerHTML = `
                    <div class="toast ${type}">
                        <i class="${icon}"></i>
                        <div class="content">
                            <div class="title">${title}</div>
                            <span>${text}</span>
                        </div>
                        <i class="close fa-solid fa-xmark" onclick="(this.parentElement).remove(); canShowToast1 = true;"></i>
                    </div>`;
                notifications1.appendChild(newToast);
                newToast.timeOut = setTimeout(() => {
                    newToast.remove();
                    canShowToast1= true; // Thiết lập lại biến sau khi thông báo biến mất
                }, 5000);
                canShowToast1 = false; // Đặt biến để ngăn không hiển thị thông báo mới
            }
        }
    });
</script>

</footer>
