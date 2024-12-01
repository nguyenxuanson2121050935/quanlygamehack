<?php
require('config.php');
session_start();

if (isset($_GET['file_id']) && isset($_SESSION['user_id'])) {
    $file_id = $_GET['file_id'];
    $user_id = $_SESSION['user_id'];

    // Cập nhật số lượt tải trong bảng file
    $sql_update_download_count = "UPDATE file SET download_count = download_count + 1 WHERE file_id = ?";
    $stmt_update = $conn->prepare($sql_update_download_count);
    $stmt_update->bind_param("i", $file_id);

    if ($stmt_update->execute()) {
        // Lưu lịch sử tải vào bảng download (bao gồm thời gian tải)
        $sql_insert = "INSERT INTO download (user_id, file_id, download_date) VALUES (?, ?, NOW())";
        $stmt_insert = $conn->prepare($sql_insert);
        $stmt_insert->bind_param("ii", $user_id, $file_id);

        if ($stmt_insert->execute()) {
            // Truy vấn lấy đường dẫn file để tải
            $sql_select = "SELECT link_file FROM file WHERE file_id = ?";
            $stmt_select = $conn->prepare($sql_select);
            $stmt_select->bind_param("i", $file_id);
            $stmt_select->execute();
            $result = $stmt_select->get_result();
            $file = $result->fetch_assoc();

            if ($file) {
                // Lấy đường dẫn tải file
                $file_path = $file['link_file'];
            } else {
                echo "Không tìm thấy thông tin file.";
            }
        } else {
            echo "Lỗi khi lưu lịch sử tải.";
        }
    } else {
        echo "Lỗi khi cập nhật số lượt tải.";
    }
} else {
    echo "Không có file để tải.";
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
			color: #fff;
			overflow: hidden;
		}
		.box-shadow {
			box-shadow: 0 4px 8px 2px rgba(255, 255, 255, 0.1), 0 6px 20px rgba(255, 255, 255, 0.1);
		}
		button {
    height: 35px;
    color: #fff;
    background-color: #eb2727;
    display: block;
    cursor: pointer;
    text-align: center;
    text-decoration: none;
    font-weight:bold;
    outline: none;
    border: none;
    border-radius: 15px;
    padding: 0 2px;
    margin: 50px;
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

	</style>
    <script>
        let count = 6;  // Thời gian đếm ngược bắt đầu từ 6 giây
        const countdown = () => {
            const countdownElement = document.getElementById("countdown");
            const downloadButton = document.getElementById("downloadButton");

            countdownElement.textContent = count;

            if (count > 1) {
                count--;
                // Giữ nút tải xuống màu đỏ và không thể nhấn
                downloadButton.style.backgroundColor = "red";
                downloadButton.disabled = true;
            } else {
                clearInterval(timer);  // Dừng lại khi đếm đến 1
                countdownElement.textContent = "Hoàn thành!";
                // Chuyển nút tải xuống sang màu xanh lá và có thể nhấn
                downloadButton.style.backgroundColor = "green";
                downloadButton.disabled = false;  // Kích hoạt lại nút
            }
        };

        const timer = setInterval(countdown, 1000);  // Đặt interval mỗi giây để cập nhật đếm ngược
    </script>
    </head>
	<body class="">
    <?php 
include "head.php"; 
?>
    <center>
        <br>
        <br>

        <br>

    <b><span id="countdown">6</span></b> 
<button id="downloadButton" type="button" onclick="window.open('<?php echo htmlspecialchars($file_path); ?>', '_blank');" disabled>
    Tải Xuống
    <svg class="icon" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg">
        <path d="M691.3 693.9c-24.7 0-44.8-20-44.8-44.8 0-24.7 20-44.8 44.8-44.8h40c190.6 0 176.8-274.4 0.2-268.1C671.2 37.2 208 145.1 299 445c-93-73.9-204.6 69.2-109.6 139.8 67.2 49.9 188.5-18.4 188.5 64.3 0 56.3-63.9 44.8-125.3 44.8-149.3 0-241.3-159.3-155.8-281.1 40.8-58.2 104.9-72.6 104.9-72.6C231.4 111.3 492.7-9.5 686.2 120c83.1 55.6 114.5 136.9 114.5 136.9 48.8 14.8 90.7 45.6 119.2 86.4 96 137.3 21.5 350.6-228.6 350.6zM514.2 335.8c0.2 0 0.3 0.1 0.5 0.1s0.3-0.1 0.5-0.1h-1z m177.1 421.1c0-17.5-45.8-17.3-63.3 0.1l-32.8 32.9c-14.1 14.1-38.2 4.2-38.2-15.8V380.6c0-24.5-17.9-44.4-42.3-44.7-24.5 0.3-47.2 20.1-47.2 44.7v393.5c0 19.9-24.1 29.9-38.2 15.8l-32.8-42.1c-17.5-17.5-45.3-9.3-62.8-9.3h-0.2c-17.5 44.8-17.6 55.1-0.1 72.6L449 931.5c35 35 91.6 37.3 126.6 2.3l115.7-114.6c17.5-17.5 0-45.2 0-62.7v0.4z"></path>
    </svg>
</button>
</center>  
<?php 
include "menu_login.php"; 
?>
        </body>
        <div style="position: absolute; top: 0px; display: block !important;"></div>
		</html>
