<?php
require("config.php");

// Kiểm tra nếu có yêu cầu sửa (GET task=update)
if (isset($_GET["file_id"])) {
    $file_id = $_GET["file_id"];

    // Lấy thông tin file theo ID
    $sql_select = "SELECT * FROM file WHERE file_id = ?";
    $stmt = $conn->prepare($sql_select);
    $stmt->bind_param("i", $file_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $file_data = $result->fetch_assoc();

    if (!$file_data) {
        echo "Không tìm thấy file với ID này.";
        exit();
    }
}
if (isset($_POST["btn_update"])) {
    $file_id = $_POST["file_id"]; // ID cũ
    $file_name = $_POST["file_name"];
    $description = $_POST["description"];
    $developer = $_POST["developer"];
    $the_loai = $_POST["the_loai"];
    $version = $_POST["VERSION"];
    $link_file = $_POST["link_file"];
    $image = $_POST["image"];

    // Bước 1: Xóa bản ghi cũ
    $sql_delete = "DELETE FROM file WHERE file_id = ?";
    $stmt_delete = $conn->prepare($sql_delete);
    $stmt_delete->bind_param("i", $file_id);
    if (!$stmt_delete->execute()) {
        echo "Lỗi khi xóa file cũ: " . $stmt_delete->error;
        exit();
    }

    // Bước 2: Lấy ID mới
    $sql_max_id = "SELECT MAX(file_id) AS max_id FROM file";
    $result = mysqli_query($conn, $sql_max_id);
    $row = mysqli_fetch_assoc($result);
    $new_file_id = $row['max_id'] + 1; // ID mới tự động tăng

    // Bước 3: Tạo bản ghi mới với ID mới
    $sql_insert = "INSERT INTO file (file_id, file_name, the_loai, version, developer, description, image, link_file) 
                   VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt_insert = $conn->prepare($sql_insert);
    $stmt_insert->bind_param("isssssss", $new_file_id, $file_name, $the_loai, $version, $developer, $description, $image, $link_file);

    if ($stmt_insert->execute()) {
        echo "Cập nhật thành công và tạo mới file.";
        header("Location: upload.php");
        exit();
    } else {
        echo "Lỗi khi tạo bản ghi mới: " . $stmt_insert->error;
    }
}

?>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
</head>

<body style="background-color: #EDEDF5;">
    <section>
        <div class="container mt-5 pt-5">
            <div class="row">
                <div class="col-12 col-sm-7 col-md-6 m-auto">
                    <div class="card border-0 shadow">
                        <div class="card-body text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-cloud-arrow-up-fill" viewBox="0 0 16 16">
                                <path d="M8 2a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 6.095 0 7.555 0 9.318 0 11.366 1.708 13 3.781 13h8.906C14.502 13 16 11.57 16 9.773c0-1.636-1.242-2.969-2.834-3.194C12.923 3.999 10.69 2 8 2m2.354 5.146a.5.5 0 0 1-.708.708L8.5 6.707V10.5a.5.5 0 0 1-1 0V6.707L6.354 7.854a.5.5 0 1 1-.708-.708l2-2a.5.5 0 0 1 .708 0z" />
                            </svg>
                            <form action="update_upload.php?file_id=<?php echo $file_data['file_id']; ?>" method="post">
                                <input type="text" name="file_name" id="" class="form-control my-4 py-2" placeholder="Nhập tên file " value="<?php echo $file_data['file_name']; ?>" />
                                <input type="text" name="the_loai" id="" class="form-control my-4 py-2" placeholder="thể loại " value="<?php echo $file_data['the_loai']; ?>" />
                                <input type="text" name="VERSION" id="" class="form-control my-4 py-2" placeholder="phiên bản " value="<?php echo $file_data['VERSION']; ?>" />
                                <input type="text" name="developer" id="" class="form-control my-4 py-2" placeholder="nhà phát triển " value="<?php echo $file_data['developer']; ?>" />
                                <input type="text" name="description" id="" class="form-control my-4 py-2" placeholder="Chức năng " value="<?php echo $file_data['description']; ?>" />
                                <input type="url" name="image" id="" class="form-control my-4 py-2" placeholder="Nhập URL ảnh"value="<?php echo $file_data['image']; ?>" />
                                <input class="form-control my-4 py-2" type="url" name="link_file" id="" placeholder="Link "value="<?php echo $file_data['link_file']; ?>">

                                <br>
                                <input class="btn btn-primary" name="btn_update" type="submit" value="Cập nhật">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
