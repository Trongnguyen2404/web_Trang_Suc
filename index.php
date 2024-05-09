<?php require "./include/header.php";
?>
<style>
     .notifications {
	position: fixed;
	top: 30px;
	right: 20px;
    z-index: 50;
}
.toast{
    position: relative;
    padding: 10px;
    margin-bottom: 10px;
    color: #fff;
    width: 400px;
    display: grid;
    grid-template-columns: 70px 1fr 70px;
    border-radius: 5px;
    --color: #0abf30;
    background-image: linear-gradient(to right, #0abf3055, #22242F 30%);
    animation: show_toast 0.3s ease forwards;
}
.toast i{
    color: var(--color);
}
.toast .title{
    font-size: x-large;
    font-weight: bold;
}
.toast i{
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: x-large;
}
.toast span,
.toast .close{
    opacity: 0.6;
    color: #fff
}

@keyframes show_toast {
	0% {
		transform: translateX(100%);
	}
	40% {
		transform: translateX(-5%);
	}
	80% {
		transform: translateX(0%);
	}
	100% {
		transform: translateX(-10%);
	}
}
.toast::before{
    position: absolute;
    bottom: 0;
    left: 0;
    background-color: var(--color);
    box-shadow: 0 0 10px var(--color);
    content: '';
    width: 100%;
    height: 3px;
    animation: timeOut 5s linear 1 forwards;
}
@keyframes timeOut{
    to{
        width: 0%;  
    }
}
/* error */
.toast.error{
   --color: #f24d4c;
   background-image: linear-gradient(to right, #f24d4c55, #22242F 30%);
}
.progress-label-left
{
    float: left;
    margin-right: 0.5em;
    line-height: 1em;
}
.progress-label-right
{
    float: right;
    margin-left: 0.3em;
    line-height: 1em;
}
.star-light
{
	color:#e9ecef;
}
.text-warning {
    color: #ffc107 !important;
}
@media (max-width: 600px) {
    .toast{
        width: 300px !important;
    }
}
</style>
        <div class="carousel">
            <!-- list item -->
            <div class="list">
                <!-- item 1 -->
                <div class="item" data-slide="1">
                    <img src="./icon_wed/01.png">
                    <div class="content">
                        <div class="author">LUNDEV</div>
                        <div class="title">DESIGN SLIDER</div>
                        <div class="topic">ANIMAL</div>
                        <div class="des">
                            <!-- lorem 50 -->
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ut sequi, rem magnam nesciunt minima placeat, itaque eum neque officiis unde, eaque optio ratione aliquid assumenda facere ab et quasi ducimus aut doloribus non numquam. Explicabo, laboriosam nisi reprehenderit tempora at laborum natus unde. Ut, exercitationem eum aperiam illo illum laudantium?
                        </div>
                        <div class="buttons">
                            <button>SEE MORE</button>
                            <button>SUBSCRIBE</button>
                        </div>
                    </div>
                </div>
                <!-- item 2 -->
                <div class="item" data-slide="2">
                    <img src="./icon_wed/02.png">
                    <div class="content">
                        <div class="author">LUNDEV</div>
                        <div class="title">DESIGN SLIDER</div>
                        <div class="topic">ANIMAL</div>
                        <div class="des">
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ut sequi, rem magnam nesciunt minima placeat, itaque eum neque officiis unde, eaque optio ratione aliquid assumenda facere ab et quasi ducimus aut doloribus non numquam. Explicabo, laboriosam nisi reprehenderit tempora at laborum natus unde. Ut, exercitationem eum aperiam illo illum laudantium?
                        </div>
                        <div class="buttons">
                            <button>SEE MORE</button>
                            <button>SUBSCRIBE</button>
                        </div>
                    </div>
                </div>
                <!-- item 3 -->
                <div class="item" data-slide="3">
                    <img src="./icon_wed/03.png">
                    <div class="content">
                        <div class="author">LUNDEV</div>
                        <div class="title">DESIGN SLIDER</div>
                        <div class="topic">ANIMAL</div>
                        <div class="des">
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ut sequi, rem magnam nesciunt minima placeat, itaque eum neque officiis unde, eaque optio ratione aliquid assumenda facere ab et quasi ducimus aut doloribus non numquam. Explicabo, laboriosam nisi reprehenderit tempora at laborum natus unde. Ut, exercitationem eum aperiam illo illum laudantium?
                        </div>
                        <div class="buttons">
                            <button>SEE MORE</button>
                            <button>SUBSCRIBE</button>
                        </div>
                    </div>
                </div>
                <!-- item 4 -->
                <div class="item" data-slide="4">
                    <img src="./icon_wed/04.png">
                    <div class="content">
                        <div class="author">LUNDEV</div>
                        <div class="title">DESIGN SLIDER</div>
                        <div class="topic">ANIMAL</div>
                        <div class="des">
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ut sequi, rem magnam nesciunt minima placeat, itaque eum neque officiis unde, eaque optio ratione aliquid assumenda facere ab et quasi ducimus aut doloribus non numquam. Explicabo, laboriosam nisi reprehenderit tempora at laborum natus unde. Ut, exercitationem eum aperiam illo illum laudantium?
                        </div>
                        <div class="buttons">
                            <button>SEE MORE</button>
                            <button>SUBSCRIBE</button>
                        </div>
                    </div>
                </div>
            </div>
        
            <!-- thumbnail -->
            <div class="arrows-thumbnail">
                <div class="arrows arrows-next">                <button id="next">></button>  </div>


                <div class="thumbnail">

                    <!-- thumbnail item 1 -->
                    <div class="item" data-slide="1">
                        <img src="./icon_wed/01.png">
                        <div class="content">
                            <div class="title">
                                Name Slider
                            </div>
                            <div class="description">
                                Description
                            </div>
                        </div>
                    </div>
                    <!-- thumbnail item 2 -->
                    <div class="item" data-slide="2">
                        <img src="./icon_wed/02.png">
                        <div class="content">
                            <div class="title">
                                Name Slider
                            </div>
                            <div class="description">
                                Description
                            </div>
                        </div>
                    </div>
                    <!-- thumbnail item 3 -->
                    <div class="item" data-slide="3">
                        <img src="./icon_wed/03.png">
                        <div class="content">
                            <div class="title">
                                Name Slider
                            </div>
                            <div class="description">
                                Description
                            </div>
                        </div>
                    </div>
                    <!-- thumbnail item 4 -->
                    <div class="item" data-slide="4">
                        <img src="./icon_wed/04.png">
                        <div class="content">
                            <div class="title">
                                Name Slider
                            </div>
                            <div class="description">
                                Description
                            </div>
                        </div>
                    </div>
                    
                </div>  
                <div class="arrows arrows-prev">                <button  id="prev"><</button></div>
            </div>

            <!-- time running -->
            <div class="time"></div>
        </div>
        
            <script src="./assets/script/app.js"></script>

        <div id="content">
            <div id="product">
                
            
                <div class="wrapper">
                    <section class="intro">
                        <div class="logo" data-aos="fade-up" data-aos-duration="1000">
                            New product
                        </div>
                        <div class="line"></div>
                    </section>
            
                    <section class="saitama character">
                        <div class="block"></div>
                        <img src="./assets/img/saitama.png" alt=""><span class="huge-text">Saitama</span>
                        <div class="caption">
                            Saitama is a fictional character and the main protagonist of the Japanese manga and anime series, "One-Punch Man." He is a bald, ordinary-looking man who trained himself to become an extremely powerful superhero. Despite his lack of outward appearance, he possesses immense strength, speed, and durability that allow him to defeat any opponent with a single punch.
                        </div>
                        <div class="nickname"><span>Nickname</span>Bald cape</div>
                        <div class="quote">
                            I'll leave tomorrow's problems to tomorrow's me
                        </div>
                    </section>
            
                    <section class="genos character">
                        <div class="block"></div>
                        <img src="./assets/img/genos.png" alt=""><span class="huge-text">Genos</span>
                        <div class="caption">
                            Genos is a fictional character from the Japanese manga and anime series, "One-Punch Man." He is a cyborg and the disciple of Saitama, the series' main protagonist. Genos was once a human, but after his hometown was destroyed by a mysterious villain, he was badly injured and almost died. In order to survive, he agreed to become a cyborg and was transformed into a powerful weapon.
                        </div>
                        <div class="nickname"><span>Nickname</span>Demon Cyborg</div>
                        <div class="quote">
                            I WILL NOT grow if i cannot face superior opponents
                        </div>
                    </section>
                    <section class="genos character">
                        <div class="block"></div>
                        <img src="./assets/img/genos.png" alt=""><span class="huge-text">Genos</span>
                        <div class="caption">
                            Genos is a fictional character from the Japanese manga and anime series, "One-Punch Man." He is a cyborg and the disciple of Saitama, the series' main protagonist. Genos was once a human, but after his hometown was destroyed by a mysterious villain, he was badly injured and almost died. In order to survive, he agreed to become a cyborg and was transformed into a powerful weapon.
                        </div>
                        <div class="nickname"><span>Nickname</span>Demon Cyborg</div>
                        <div class="quote">
                            I WILL NOT grow if i cannot face superior opponents
                        </div>
                    </section>
                    <section class="genos character">
                        <div class="block"></div>
                        <img src="./assets/img/genos.png" alt=""><span class="huge-text">Genos</span>
                        <div class="caption">
                            Genos is a fictional character from the Japanese manga and anime series, "One-Punch Man." He is a cyborg and the disciple of Saitama, the series' main protagonist. Genos was once a human, but after his hometown was destroyed by a mysterious villain, he was badly injured and almost died. In order to survive, he agreed to become a cyborg and was transformed into a powerful weapon.
                        </div>
                        <div class="nickname"><span>Nickname</span>Demon Cyborg</div>
                        <div class="quote">
                            I WILL NOT grow if i cannot face superior opponents
                        </div>
                    </section>
                    
            
                </div>
            
                <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.3/gsap.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.3/ScrollTrigger.min.js"></script>
                <script src="./assets/script/app1.js"></script>
            </div>
            <div id="about" >

            <div class="backroutext" >
                <div class="auto">
                    <div class="me aos-init aos-animate introduce"  data-aos="fade-up" data-aos-duration="500">
                        JULY JEWELRY
                    </div>
                <div>
                    <div class="img1" 
                    data-aos="fade-up" data-aos-duration="1000" class="aos-init aos-animate">
                                <img src="./icon_wed/JULY-about0.jpg" alt="" style="
                                width: 100%;
                                height: 100%;
                            ">
                    </div>
                    <div class="text1 text"
                    data-aos="fade-up" data-aos-duration="1000" class="aos-init aos-animate">
                        <div class="text-1" >   Welcome to July Jewelry</div>
                            <div class="text-2" data-aos="fade-up" data-aos-duration="1000" class="aos-init aos-animate">   where we turn dreams of luxury and sophistication in jewelry into reality. We are a team of passion and creativity, committed to bringing the most exquisite and unique jewelry products. At July Jewelry, each piece of jewelry is not just a beautiful item, but also a marvelous work of art, crafted with meticulous attention and passion by talented artisans. When you come to us, you will experience the magic of natural gemstones and diamonds, carved by skilled hands, creating incomparable masterpieces of jewelry. Let July Jewelry be your destination in the world of jewelry, where each product carries its own story and value.
                            </div>
                    </div>
                </div>
                <div>
                    <div class="img2" 
                    data-aos="fade-up" data-aos-duration="1000" class="aos-init aos-animate">
                            <img src="./icon_wed/JULY-about0.jpg" alt="" style="
                            width: 100%;
                            height: 100%;
                        ">
                    </div>
                    <div class="text2 text"
                    data-aos="fade-up" data-aos-duration="1000" class="aos-init aos-animate">
                        <div class="text-1" >   Welcome to July Jewelry</div>
                        <div class="text-2"  data-aos="fade-up" data-aos-duration="1000" class="aos-init aos-animate">   where we turn dreams of luxury and sophistication in jewelry into reality. We are a team of passion and creativity, committed to bringing the most exquisite and unique jewelry products. At July Jewelry, each piece of jewelry is not just a beautiful item, but also a marvelous work of art, crafted with meticulous attention and passion by talented artisans. When you come to us, you will experience the magic of natural gemstones and diamonds, carved by skilled hands, creating incomparable masterpieces of jewelry. Let July Jewelry be your destination in the world of jewelry, where each product carries its own story and value.
                        </div>
                    </div>
                </div>
                    <div class="img3" 
                    data-aos="fade-up" data-aos-duration="1000" class="aos-init aos-animate">
                        <img src="./icon_wed/JULY-about0.jpg" alt="" style="
                        width: 100%;
                        height: 100%;
                    ">
                    </div>
                    <div class="text3 text" 
                    data-aos="fade-up" data-aos-duration="1000" class="aos-init aos-animate">
                        <div class="text-1" >   Welcome to July Jewelry</div>
                        <div class="text-2"  data-aos="fade-up" data-aos-duration="1000" class="aos-init aos-animate">   where we turn dreams of luxury and sophistication in jewelry into reality. We are a team of passion and creativity, committed to bringing the most exquisite and unique jewelry products. At July Jewelry, each piece of jewelry is not just a beautiful item, but also a marvelous work of art, crafted with meticulous attention and passion by talented artisans. When you come to us, you will experience the magic of natural gemstones and diamonds, carved by skilled hands, creating incomparable masterpieces of jewelry. Let July Jewelry be your destination in the world of jewelry, where each product carries its own story and value.
                        </div>
                    </div>
                    <div class="text4" data-aos="fade-up" data-aos-duration="1000" class="aos-init aos-animate" >
                            Join us in exploring the beauty and power of jewelry at July Jewelry. We are not just a brand, but also a companion in every journey towards style and personalization. Let us accompany you as you discover the perfect expression of your individuality through our stunning pieces. With July Jewelry, every moment becomes an opportunity to shine and to celebrate your unique essence.
                    </div>
                </div>
            </div>
        
    </div>
            
            <!-- Tour -->
            <!-- contact -->
            <div id="Contact" class="content-section">
                <h2 class="section-heading">CONTACT</h2>
                <!-- <p class="section-sub-heading">Fan? Drop a note!</p> -->
                <div class="Contact-text" style="

                ">
                    <div>We warmly welcome any feedback from our customers regarding our products and services. Please fill out the form below or contact us via phone or email to share your thoughts. We commit to utilizing all feedback to continuously improve and optimize your experience.</div>
                    <div>For customers interested in custom jewelry orders or requiring face-to-face consultations, please contact us via the phone or email provided below. We will provide prompt and professional assistance and advice.</div>
                </div>
                <div class="row contact-concent">
                    <div class="colum colum-two contact-info">
                        <p><i class="fa-solid fa-location-dot" style="color: #19191a;"></i>Chicago, US</p>
                        <p><i class="fa-solid fa-phone"></i>Phone: +00 151515</p>
                        <p><i class="fa-solid fa-envelope"></i>Email: mail@mail.com</p>
                    </div>
                    <div class="colum colum-two contact-form">
                    <form id="review_form">
                            <div class="row">
                                <div class="colum colum-two">
                                    <input type="text" name="user_name" placeholder="Name" required="" class="user_name" style="
                            padding: 10px;
                            width: 100%;
                        ">                                
                                </div>
                                <div class="colum colum-two ">
                                    <input type="email" name="email" placeholder="Email" required="" class="email" style="
                            width: 100%;
                            padding: 10px;
                        ">                                
                                </div>  
                            </div>
                            <div class="row mt-8">
                                <div class="colum colum-full ">
                                    <input type="text" name="user_review" placeholder="Message" required="" class="user_review" style="
                            width: 100%;
                            padding: 10px;
                        ">                                
                                </div>
                            </div>
                            <button type="button" class="btn btn-primary" id="save_review" style="
                            float: right;
                            margin: 10px 18px;
                            padding: 10px;
                            font-size: 14px;
                        ">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="map-section">
                <img src="./assets/img/map.jpg" alt="">
            </div>
            <?php require "./include/footer.php";?>
        </div>
    </div>
    <script>
        AOS.init();
      </script>
    <?php require "./include/card.php";?>
    <div class="notifications">
    <!-- Notification messages will be displayed here -->
</div>
</body>
</html>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

<script>
let notifications = document.querySelector('.notifications');
let canShowToast = true; // Biến để kiểm tra xem có thể hiển thị thông báo mới hay không

function createToast(type, icon, title, text){
    if (canShowToast) { // Kiểm tra trạng thái hiển thị của thông báo
        let newToast = document.createElement('div');
        newToast.innerHTML = `
            <div class="toast ${type}">
                <i class="${icon}"></i>
                <div class="content">
                    <div class="title">${title}</div>
                    <span>${text}</span>
                </div>
                <i class="close fa-solid fa-xmark" onclick="(this.parentElement).remove(); canShowToast = true;"></i>
            </div>`;
        notifications.appendChild(newToast);
        newToast.timeOut = setTimeout(() => {
            newToast.remove();
            canShowToast = true; // Thiết lập lại biến sau khi thông báo biến mất
        }, 5000);
        canShowToast = false; // Đặt biến để ngăn không hiển thị thông báo mới
    }
}

$(document).ready(function(){
    $('#save_review').click(function(){
        
        var user_name = $('.user_name').val();
        var email = $('.email').val();
        var user_review = $('.user_review').val();

        if(user_name == '' || email == '' || user_review == ''){
            createToast('error', 'fa-solid fa-times-circle', 'Error', 'Please complete all information.');
            return false;
        } else {
            $.ajax({
                url:"connnec_submit.php",
                method:"POST",
                data:{
                    user_name: user_name,
                    email: email,
                    user_review: user_review,
                },
                success:function(response){
                    createToast('success', 'fa-solid fa-check-circle', 'Success', response);
                    $('#review_form')[0].reset(); // Reset form sau khi gửi thành công
                },
                error:function(jqXHR, textStatus, errorThrown){
                    createToast('error', 'fa-solid fa-times-circle', 'Error', 'An error occurred, please try again later.');
                }
            });
        }
    });
});


</script>
