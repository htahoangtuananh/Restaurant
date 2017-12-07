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
    <a href="javascript:;" class="chat_fb" onclick="return:true;"></i> Hỗ trợ trực tuyến</a>
    <div class="fchat">
        <div class="fb-page" data-tabs="messages" data-href="https://www.facebook.com/C%C3%B4-S%C6%B0%C6%A1ng-S%C6%B0%C6%A1ng-Luy%E1%BB%87n-Ch%E1%BB%AF-%C4%90%E1%BA%B9p-Cho-M%E1%BB%8Di-l%E1%BB%A9a-Tu%E1%BB%95i-1069896156386838/?fref=ts" data-width="250" data-height="400" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="false"></div>
    </div>
</div>

