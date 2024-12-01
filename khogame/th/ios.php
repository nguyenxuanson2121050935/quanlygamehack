<?php
require('config.php');
// Kiểm tra xem session đã được khởi tạo chưa
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION["user_id"])) {
    echo "Bạn cần đăng nhập để tải file.";
    exit();
}

// Lấy user_id từ session
$user_id = $_SESSION["user_id"];

// Lấy dữ liệu từ bảng File
$sql = "SELECT file_id, file_name, image, VERSION, developer, description, download_count, the_loai, link_file 
        FROM file 
        WHERE the_loai = 'ios'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Duyệt qua từng dòng dữ liệu
    while ($row = $result->fetch_assoc()) {
        ?>
        <a class="item">
            <div class="detail">
                <!-- Ảnh minh họa -->
                <img class="image-block imaged w48 box-shadow" src="<?php echo htmlspecialchars($row['image']); ?>" alt="<?php echo htmlspecialchars($row['file_name']); ?>">
                <div>
                    <!-- Tên file -->
                    <strong>
                        <font style="vertical-align: inherit;">
                            <?php echo htmlspecialchars($row['file_name']); ?>
                        </font>
                    </strong>
                    <!-- Phiên bản và nhà phát triển -->
                    <p>
                        <?php echo htmlspecialchars($row['the_loai']) . " version: " . htmlspecialchars($row['VERSION']) . " - Dev: " . htmlspecialchars($row['developer']); ?>
                    </p>
                    <!-- Mô tả -->
                    <p>
                        <font style="vertical-align: inherit;">
                            <?php echo htmlspecialchars($row['description']); ?>
                        </font>
                    </p>
                </div>
            </div>
            <div class="right">
                <!-- Nút tải về -->
                <button class="newios" type="button" onclick="downloadFile(<?php echo $row['file_id']; ?>)">
                    <svg class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="739">
                        <path d="M691.3 693.9c-24.7 0-44.8-20-44.8-44.8 0-24.7 20-44.8 44.8-44.8h40c190.6 0 176.8-274.4 0.2-268.1C671.2 37.2 208 145.1 299 445c-93-73.9-204.6 69.2-109.6 139.8 67.2 49.9 188.5-18.4 188.5 64.3 0 56.3-63.9 44.8-125.3 44.8-149.3 0-241.3-159.3-155.8-281.1 40.8-58.2 104.9-72.6 104.9-72.6C231.4 111.3 492.7-9.5 686.2 120c83.1 55.6 114.5 136.9 114.5 136.9 48.8 14.8 90.7 45.6 119.2 86.4 96 137.3 21.5 350.6-228.6 350.6zM514.2 335.8c0.2 0 0.3 0.1 0.5 0.1s0.3-0.1 0.5-0.1h-1z m177.1 421.1c0-17.5-45.8-17.3-63.3 0.1l-32.8 32.9c-14.1 14.1-38.2 4.2-38.2-15.8V380.6c0-24.5-17.9-44.4-42.3-44.7-24.5 0.3-47.2 20.1-47.2 44.7v393.5c0 19.9-24.1 29.9-38.2 15.8l-32.8-42.1c-17.5-17.5-45.3-9.3-62.8-9.3h-0.2c-17.5 44.8-17.6 55.1-0.1 72.6L449 931.5c35 35 91.6 37.3 126.6 2.3l115.7-114.6c17.5-17.5 0-45.2 0-62.7v0.4z" p-id="740"></path>
                    </svg>
                </button>
                <!-- Lượt tải -->
                <p>
                    <?php echo htmlspecialchars($row['download_count']); ?> lượt tải
                </p>
            </div>
        </a>
        <?php
    }
} else {
    echo "Không có file nào được tìm thấy.";
}
?>
