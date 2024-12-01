<?php
require("config.php");

// Handle the insertion of new records
if (isset($_POST["btn_insert"])) {
    $file_name = $_POST["file_name"];
    $description = $_POST["description"];
    $developer = $_POST["developer"];
    $VERSION = $_POST["VERSION"];
    $the_loai = $_POST["the_loai"]; // Lấy giá trị thể loại (iOS hoặc Android)
    $link_file = $_POST["link_file"];
    

    // Validate the URL format
    $image = $_POST["image"];
    if (!empty($image) && filter_var($image, FILTER_VALIDATE_URL) === false) {
        die("URL hình ảnh không hợp lệ.");
    } else {
        $sql_insert = "INSERT INTO file (file_name, description, developer, VERSION, image, the_loai, link_file) VALUES ('$file_name', N'$description', '$developer', N'$VERSION', N'$image',  N'$the_loai', N'$link_file')";
        if (mysqli_query($conn, $sql_insert)) {
            header("location:upload.php");
        } else {
            echo "Error: " . $sql_insert . "<br>" . mysqli_error($conn);
        }
    }
}
// Handle deletion of a single record
if (isset($_GET["file_id"])) {
    $file_id = $_GET["file_id"];
    $sql_delete = "DELETE FROM file WHERE file_id = " . $file_id;
    if (mysqli_query($conn, $sql_delete)) {
        header("location:upload.php");
    } else {
        echo "Error: " . $sql_delete . "<br>" . mysqli_error($conn);
    }
}

?>
<html>

<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('#login').click(function() {
                $('#log').slideToggle();
            });
        });
    </script>
</head>

<body style="background-color: #EDEDF5;">
    <section>
        <div class="container mt-5 pt-5" style="padding-top: 0rem !important;
    margin-left: inherit;">
            <div class="row" >
                <div class="col-12 col-sm-7 col-md-6 m-auto" style="    margin: unset;">
                    <div class="card border-0 shadow">
                        <div class="card-body text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-cloud-arrow-up-fill" viewBox="0 0 16 16">
                                <path d="M8 2a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 6.095 0 7.555 0 9.318 0 11.366 1.708 13 3.781 13h8.906C14.502 13 16 11.57 16 9.773c0-1.636-1.242-2.969-2.834-3.194C12.923 3.999 10.69 2 8 2m2.354 5.146a.5.5 0 0 1-.708.708L8.5 6.707V10.5a.5.5 0 0 1-1 0V6.707L6.354 7.854a.5.5 0 1 1-.708-.708l2-2a.5.5 0 0 1 .708 0z" />
                            </svg>
                            <form method="post">
                <div class="form-group">
                <input class="btn btn-success" type="submit" value="Tìm Kiếm" name="search">
                <br>
                <br>

                        <input class="form-control" type="text" name="txt_search" id="">
                        <br>
                </div>
            </form>
            <form action="upload.php" method="post">
                            <label  for="the_loai">Thể loại:</label>
        <select id="the_loai" name="the_loai" required>
            <option class="form-control my-4 py-2" value="" disabled selected>Chọn thể loại</option>
            <option value="ios">ios</option>
            <option value="Android">Android</option>
        </select><br><br>
                                <input type="text" name="file_name" id="" class="form-control my-4 py-2" placeholder="Nhập tên file " />
                                <input type="text" name="VERSION" id="" class="form-control my-4 py-2" placeholder="phiên bản " />
                                <input type="text" name="developer" id="" class="form-control my-4 py-2" placeholder="nhà phát triển " />
                                <input type="text" name="description" id="" class="form-control my-4 py-2" placeholder="Chức năng " />
                                <input type="url" name="image" id="" class="form-control my-4 py-2" placeholder="Nhập URL ảnh" />
                                <input class="form-control my-4 py-2" type="url" name="link_file" id="" placeholder="Link ">

                                <br>
                                <input class="btn btn-primary" name="btn_insert" type="submit" value="Thêm mới">
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    
                    <table class="table table-stripped">
                        <tr>
                        <th>ID</th>
                <th>Tên File</th>
                <th>Mô Tả</th>
                <th>Nhà Phát Triển</th>
                <th>Phiên Bản</th>
                <th>Thể Loại</th>
                <th>Hình Ảnh</th>
                <th>Link File</th>
                <th>Ngày Upload</th>
                            <th>tùy chọn</th>
                        </tr>
                        <form action="upload.php" method="post">
                            <?php
                            $sql = "";
                            if (isset($_POST["txt_search"])) {
                                $file_name = $_POST["txt_search"];
                                $sql = "SELECT * FROM file WHERE file_name LIKE '%" . $file_name . "%' ORDER BY file_id DESC";
                            } else {
                                $sql = "SELECT * FROM file ORDER BY file_id DESC";
                            }
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr>";
                    echo "<td>" . $row['file_id'] . "</td>";
                    echo "<td>" . $row['file_name'] . "</td>";
                    echo "<td>" . $row['description'] . "</td>";
                    echo "<td>" . $row['developer'] . "</td>";
                    echo "<td>" . $row['VERSION'] . "</td>";
                    echo "<td>" . $row['the_loai'] . "</td>";
                    echo "<td><img src='" . $row['image'] . "' alt='Image' width='100'></td>";
                    echo "<td><a href='" . $row['link_file'] . "' target='_blank'>Tải Về</a></td>";
                    echo "<td>" . $row['created_at'] . "</td>";
                    echo "<td>";
                                    echo "<a class='btn btn-warning' href='update_upload.php?task=update&file_id=" . $row["file_id"] . "'>Sửa</a>";
                                    echo "<a class='btn btn-danger' href='upload.php?task=delete&file_id=" . $row["file_id"] . "'>Xóa</a>";
                                    echo "</td>";                                  
                                    echo "</tr>";
                                }
                            } else {
                                echo "Bảng không chứa dữ liệu";
                            }
                            ?>
                        </form>
                    </table>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
