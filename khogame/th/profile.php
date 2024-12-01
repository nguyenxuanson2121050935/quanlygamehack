<div class="container" >
    <div class="row">
        <div class="col-xl-5 col-lg-12 col-md-12 col-sm-12 layout-top-spacing">
            <div class="user-profile">
                <div class="widget-content widget-content-area">
                    <div >
                        <center> 
 <img src="https://upload.wikimedia.org/wikipedia/commons/e/e0/Logo_Truong_Dai_hoc_Mo_-_Dia_chat.jpg" alt="avatar" style="width: 15%;height: 15%; border-radius: 30px;">
</center>
                        <div>
                            <ul class="contacts-block list-unstyled">
                                <li class="contacts-block__item">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-coffee me-3"><path d="M18 8h1a4 4 0 0 1 0 8h-1"></path><path d="M2 8h16v9a4 4 0 0 1-4 4H6a4 4 0 0 1-4-4V8z"></path><line x1="6" y1="1" x2="6" y2="4"></line><line x1="10" y1="1" x2="10" y2="4"></line><line x1="14" y1="1" x2="14" y2="4"></line></svg>  user: <?php echo htmlspecialchars($username); ?>
                                </li>
                                <li class="contacts-block__item">
                                    <a href="mailto:<?php echo htmlspecialchars($email); ?>"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail me-3"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg><?php echo htmlspecialchars($email); ?></a>
                                </li>
                            </ul>
                        </div>
            </div>
                    <div class="user-info-list">
                    <h3> File tải gần đây </h3>      
                    <?php
if (isset($user_id)) {
    // Lấy lịch sử tải của người dùng từ bảng download
    $sql_history = "SELECT d.file_id, d.download_date, f.file_name,f.description, f.version, f.link_file, f.image, f.the_loai, f.developer, f.download_count
                    FROM download d
                    JOIN file f ON d.file_id = f.file_id
                    WHERE d.user_id = ?
                    ORDER BY d.download_date DESC";
    $stmt_history = $conn->prepare($sql_history);
    $stmt_history->bind_param("i", $user_id);
    $stmt_history->execute();
    $result_history = $stmt_history->get_result();
    
    // Kiểm tra nếu có kết quả trả về
    if ($result_history->num_rows > 0) {
        while ($row = $result_history->fetch_assoc()) {
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
                            <?php echo htmlspecialchars($row['the_loai']) . " - " . htmlspecialchars($row['version']) . " - " . htmlspecialchars($row['developer']); ?>
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
                    <button class="newios" type="button" onclick="location.href='<?php echo htmlspecialchars($row['link_file']); ?>'">
                        <svg class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="739">
                            <path d="M691.3 693.9c-24.7 0-44.8-20-44.8-44.8 0-24.7 20-44.8 44.8-44.8h40c190.6 0 176.8-274.4 0.2-268.1C671.2 37.2 208 145.1 299 445c-93-73.9-204.6 69.2-109.6 139.8 67.2 49.9 188.5-18.4 188.5 64.3 0 56.3-63.9 44.8-125.3 44.8-149.3 0-241.3-159.3-155.8-281.1 40.8-58.2 104.9-72.6 104.9-72.6C231.4 111.3 492.7-9.5 686.2 120c83.1 55.6 114.5 136.9 114.5 136.9 48.8 14.8 90.7 45.6 119.2 86.4 96 137.3 21.5 350.6-228.6 350.6zM514.2 335.8c0.2 0 0.3 0.1 0.5 0.1s0.3-0.1 0.5-0.1h-1z m177.1 421.1c0-17.5-45.8-17.3-63.3 0.1l-32.8 32.9c-14.1 14.1-38.2 4.2-38.2-15.8V380.6c0-24.5-17.9-44.4-42.3-44.7-24.5 0.3-47.2 20.1-47.2 44.7v393.5c0 19.9-24.1 29.9-38.2 15.8l-32.8-42.1c-17.5-17.5-45.3-9.3-62.8-9.3h-0.2c-17.5 44.8-17.6 55.1-0.1 72.6L449 931.5c35 35 91.6 37.3 126.6 2.3l115.7-114.6c17.5-17.5 0-45.2 0-62.7v0.4z" p-id="740"></path>
                        </svg>
                    </button>
                    <!-- Lượt tải -->
                    <p>
                        <?php echo htmlspecialchars($row['download_count']); ?> lượt tải
                    </p>
                    <!-- Thời gian tải -->
                    <p>
                        <font style="vertical-align: inherit;">
                            Tải vào: <?php echo date("d-m-Y H:i:s", strtotime($row['download_date'])); ?>
                        </font>
                    </p>
                </div>
            </a>
<?php
        }
    } else {
        echo "Bạn chưa tải file nào.";
    }
} else {
    echo "Vui lòng đăng nhập để xem lịch sử tải.";
}
?>


                        </div>                                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>