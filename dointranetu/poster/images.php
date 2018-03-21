<style>
    .item {
        max-width:  115px;
        max-height: 110px;
        position: absolute;
        top: 50%;
        left: 50%;
        margin-top: -55px;
        margin-left: -55px;
    }
    img {
        width: 100%;
        height: auto;
        background-size: contain;
        border-radius: 30px;
        position: relative;
    }
    body
    {
        background-color: #fcfcfc;
    }

</style>
<script src="js/jq33.js"></script> 
<script>

    function getRandomInt(min, max) {
        return Math.floor(Math.random() * (max - min + 1)) + min;
    }
    var timeout = getRandomInt(15, 40) * 1000;
    var flag = true;

    function loadimg() {

        $('#background').animate({opacity: 1}, 0, function () {
            //finished animating, minifade out and fade new back in           
            $('#background').animate({opacity: 0}, 0, function () {
                $('#background').css("display", "");
                //animate fully back in
                $('#background').animate({opacity: 1}, 500, function () {
                    //set timer for next
                    setTimout();
                });
            });
        });
    }

    function setTimout() {
        if (flag) {
            flag = false;
            setTimeout(function () {
                $('#background').animate({opacity: 0}, 400, function () {
                    window.location.reload();
                });
            }, timeout);
        }
    }

    window.onload = loadimg;
</script>

<?php
//pobierz liste plików z katalogu
$target_dir = __DIR__ . "/pic";
$files = array_diff(scandir($target_dir), array('.', '..'));
shuffle($files);
$value = array_pop($files);

echo "<div id='background' class='item' style='display: none;'> <center> <img src='pic/$value' ></center> </div>";


