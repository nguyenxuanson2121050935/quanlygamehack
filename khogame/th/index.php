<?php
require('config.php');
session_start();

if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Truy vấn kiểm tra username và password
    $stmt = $conn->prepare("SELECT user_id, username, email FROM tbl_user WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        // Lấy thông tin user từ cơ sở dữ liệu
        $user = $result->fetch_assoc();

        // Lưu thông tin vào session
        $_SESSION["user_id"] = $user["user_id"];
        $_SESSION["username"] = $user["username"];
        $_SESSION["email"] = $user["email"];

        // Điều hướng sang trang cá nhân hoặc trang đã login
        header("location: index_login.php?gamehack=profile");
        exit();
    } else {
        echo "Sai tên đăng nhập hoặc mật khẩu.";
    }
}
    if(isset($_POST["register"])){
        // lấy giá trị từ ô nhập liệu
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $re_password = $_POST["re_password"];
        if($password!=$re_password){
            echo" mật khẩu không trùng khớp";
        }
        else{
            $sql = "SELECT * FROM tbl_user WHERE email = '".$email."' OR username = N'".$username."'";
            $result = mysqli_query($conn,$sql);
            if(mysqli_num_rows($result)>0){
                echo" tài khoản gmail hoặc tên đăng nhập đã sử dụng ";
            }
            else{
                $sql_insert = "insert into tbl_user(username,email,password) values(N'".$username."',N'".$email."',N'".$password."')";
                if(mysqli_query($conn,$sql_insert)){
                    header("location: index.php?gamehack=app");
                }
                else{
                    echo"error" .$sql_insert ."<br>".mysqli_error($conn);
                }
            }
        }
       }
?>
<!DOCTYPE html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport"
		content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no, viewport-fit=cover">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
	<title> Tip Tip Mod </title>
	<link rel="stylesheet" href="../assets/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js" type="text/javascript"></script>
	<style>
		.--savior-overlay-transform-reset {
			transform: none !important;
		}

		.--savior-overlay-z-index-top {
			z-index: 2147483643 !important; 
		}

		.--savior-overlay-position-relative {
			position: relative;
		}

		.--savior-overlay-overflow-hidden {
			overflow: hidden !important;
		}

		.--savior-overlay-overflow-x-visible {
			overflow-x: visible !important;
		}

		.--savior-overlay-overflow-y-visible {
			overflow-y: visible !important;
		}

		.--savior-overlay-z-index-reset {
			z-index: auto !important;
		}

		.--savior-overlay-display-none {
			display: none !important;
		}

		.--savior-overlay-clearfix {
			clear: both;
		}

		.--savior-overlay-reset-filter {
			filter: none !important;
			backdrop-filter: none !important;
		}

		.--savior-tooltip-host {
			z-index: 9999;
			position: absolute;
			top: 0;
		}

		main.--savior-overlay-z-index-reset {
			z-index: auto !important;
		}

		main.--savior-overlay-z-index-top {
			z-index: auto !important;
		}

		main.--savior-overlay-z-index-top .channel-root__player-container+div,
		main.--savior-overlay-z-index-top .video-player-hosting-ui__container+div {
			opacity: 0.1;
		}

		.--savior-backdrop {
			position: fixed !important;
			z-index: 2147483642 !important;
			top: 0;
			left: 0;
			height: 100vh;
			width: 100vw !important;
			background-color: rgba(0, 0, 0, 0.9);
		}

		.--savior-overlay-twitter-video-player {
			position: fixed;
			width: 80%;
			height: 80%;
			top: 10%;
			left: 10%;
		}

		.zm-video-modal.--savior-overlay-z-index-reset {
			position: absolute;
		}

		#page #main.--savior-overlay-z-index-reset {
			z-index: auto !important;
		}

		#vp_w.--savior-overlay-z-index-reset.media-layer.media-layer__video {
			position: absolute;
			overflow-y: hidden;
		}

		.--savior-overlay-z-index-top.rmc_controller,
		.--savior-overlay-z-index-top.rmc_setting_intro,
		.--savior-overlay-z-index-top.rmc_highlight,
		.--savior-overlay-z-index-top.rmc_control_settings {
			z-index: 2147483644 !important;
		}

		.swiper-wrapper.--savior-overlay-z-index-reset .swiper-slide:not(.swiper-slide-active),
		.swiper-wrapper.--savior-overlay-transform-reset .swiper-slide:not(.swiper-slide-active) {
			display: none;
		}

		.videoWrap+div>div {
			pointer-events: unset;
		}

		.mfp-wrap.--savior-overlay-z-index-top {
			position: relative;
		}

		.mfp-wrap.--savior-overlay-z-index-top .mfp-close {
			display: none;
		}

		.mfp-wrap.--savior-overlay-z-index-top .mfp-content {
			position: fixed;
			top: 50%;
			left: 50%;
			transform: translate(-50%, -50%);
		}

		section.--savior-overlay-z-index-reset>main[role="main"].--savior-overlay-z-index-reset+nav {
			z-index: -1 !important;
		}

		section.--savior-overlay-z-index-reset>main[role="main"].--savior-overlay-z-index-reset section.--savior-overlay-z-index-reset div.--savior-overlay-z-index-reset~div {
			position: relative;
		}

		div[class^="tiktok"].--savior-overlay-z-index-reset {
			z-index: 2147483644 !important;
		}

		@-moz-keyframes fadeIn {
			from {
				opacity: 0;
			}

			to {
				opacity: 1;
			}
		}

		@-webkit-keyframes fadeIn {
			from {
				opacity: 0;
			}

			to {
				opacity: 1;
			}
		}

		@-o-keyframes fadeIn {
			from {
				opacity: 0;
			}

			to {
				opacity: 1;
			}
		}

		@keyframes fadeIn {
			from {
				opacity: 0;
			}

			to {
				opacity: 1;
			}
		}
		.newios{
			background:unset;
			border:none;
			margin-right: 26px;
		}
		.icon{ 
			width: 24px;
			height: 24px;
			vertical-align: middle;
			fill: currentColor;
			color: #4c74ff;
			overflow: hidden;
		}
		.box-shadow {
			box-shadow: 0 4px 8px 2px rgba(255, 255, 255, 0.1), 0 6px 20px rgba(255, 255, 255, 0.1);
		}
		button {
    height: 28px;
    color: #fff;
    background-color: #eb2727;
    display: block;
    cursor: pointer;
    text-align: center;
    text-decoration: none;
    font-weight:bold;
    outline: none;
    border: none;
    border-radius: 5px;
    padding: 0 2px;
    margin: 2px;
}

button:active {
    background-color: #fff;
    transform: translateY(2px);
}
input{
	background: black;
	border:1px solid #686868F0;
    border-radius: 8px;
    color: #f2f2f2;
    width: 200px;
    flex-grow: 1;
    height: 24px;
    margin: 5px;
    text-align: center;
}

	</style></head>
	<body class="">
		
			<?php 
include "head.php"; 

 if (isset($_GET['gamehack'])){
  $game=$_GET['gamehack'];
 } 
 
 else{
  $game ='';
 }
 if($game == 'cert'){
  include "android.php"; 
 }
 elseif($game == 'app'){
	include "login.php"; 
} 
elseif($game == 'gameios'){
	include "ios.php"; 
   }
else{
	include "login.php"; 
   }
?>
<?php
include "menu.php"; 
?>

        <script type="text/javascript">
            
                AddtoHome("2000", "once");
                
                caches.keys().then(keys => {
                  keys.forEach(key => {
                    caches.delete(key).then(() => {
                      console.log(`Cache ${key} deleted`);
                    });
                  });
                });
                
                document.getElementById("scrollBtn").style.visibility = "hidden";
                
                function scrollToTop() {
                    document.body.scrollTop = 0;
                    document.documentElement.scrollTop = 0;
                }
        
                window.onscroll = function() {
                    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                        document.getElementById("scrollBtn").style.visibility  = "visible";
                    } else {
                        document.getElementById("scrollBtn").style.visibility  = "hidden";
                    }
                };
            </script>
        </body>
        <div style="position: absolute; top: 0px; display: block !important;"></div>
		</html>
