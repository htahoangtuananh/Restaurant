<?php
/**
 * Created by PhpStorm.
 * User: VCCORP
 * Date: 10/30/2017
 * Time: 10:12 AM
 */
$phone = '';
$facebook = '';
$youtube = '';
$website = '';
for($k = 0;$k<count($contact);$k++){
    if($contact[$k]['type'] == 'Phone'){
        $phone = $contact[$k]['contact_detail'];
    }
    if($contact[$k]['type'] == 'Facebook'){
        $facebook = $contact[$k]['contact_detail'];
    }
    if($contact[$k]['type'] == 'Youtube'){
        $youtube = $contact[$k]['contact_detail'];
    }
    if($contact[$k]['type'] == 'Website'){
        $website = $contact[$k]['contact_detail'];
    }
}
?>
<section id="footer">
	<div class="row">
		<img class="footer-img" src="<?= base_url().'assets/img/footer-img.png'?>">
	</div>
    <div class="row footer-content">
        <div class="col-md-2 no-padding">
            <img class="footer-img" src="<?= base_url().'assets/img/footer-left.png'?>">
        </div>
        <div class="col-md-3 ">
            <div class="row footer-title">
                <h4>Opening Time</h4>
            </div>
            <div class="row">
                <div class="col-md-5 no-padding">
                    <p>Weekdays</p>
                </div>
                <div class="col-md-7 no-padding">
                    <p class="float-right">10.00 - 20.30</p>
                </div>
            </div>
            <div class="row">
                <hr class="hr-dotted" style="border-top: dotted 1px;" />
            </div>
            <div class="row">
                <div class="col-md-5 no-padding">
                    <p>Sunday</p>
                </div>
                <div class="col-md-7 no-padding">
                    <p class="float-right">11.00 - 20.30</p>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <img class="footer-img" src="<?= base_url().'assets/img/bottom-logo.png'?>" style="position: absolute; bottom: 3%; margin-bottom: -60%">
        </div>
        <div class="col-md-3">
            <div class="row footer-title">
                <h4>Contact</h4>
            </div>
            <div class="row">
                <br>
            </div>
            <div class="row footer-a">
                <a href="tel:+12364250022">(236) 425-0022</a>
            </div>
            <div class="row footer-a">
                <a href="mailto:anhnd3010@gmail.com">anhnd3010@gmail.com</a>
            </div>
            <div class="row footer-a">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
            </div>
        </div>
        <div class="col-md-2">
            <img class="footer-img" src="<?= base_url().'assets/img/footer-right.png'?>">
        </div>
    </div>
</section>






<div id="fb-root"></div>
<script></script>
<style>#cfacebook{position:fixed;bottom:0px;right:8px;z-index:999;width:250px;height:auto;box-shadow:6px 6px 6px 10px rgba(0,0,0,0.2);border-top-left-radius:5px;border-top-right-radius:5px;overflow:hidden;}#cfacebook .fchat{float:left;width:100%;height:270px;overflow:hidden;display:none;background-color:#fff;}#cfacebook .fchat .fb-page{margin-top:-130px;float:left;}#cfacebook a.chat_fb{float:left;padding:0 25px;width:250px;color:#fff;text-decoration:none;height:40px;line-height:40px;text-shadow:0 1px 0 rgba(0,0,0,0.1);background-repeat:repeat-x;background-size:auto;background-position:0 0;background-color:#3a5795;border:0;border-bottom:1px solid #133783;z-index:9999999;margin-right:12px;font-size:18px;}#cfacebook a.chat_fb:hover{color:yellow;text-decoration:none;}</style>
<script>
    $(document).ready(function () {
        $(".chat_fb").click(function() {
            (function(d, s, id) {

                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s); js.id = id;
                js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.5";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
            jQuery('.fchat').toggle('slow');
        });
    });
</script>
<div id="cfacebook">
    <a href="javascript:;" class="chat_fb" onclick="return:true;"></i> Chat with us now</a>
    <div class="fchat">
        <div class="fb-page" data-tabs="messages" data-href="#" data-width="250" data-height="400" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="false"></div>
    </div>
</div>

