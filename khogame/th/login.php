
<div class="container" >
    <div class="row">
        <div class="col-xl-5 col-lg-12 col-md-12 col-sm-12 layout-top-spacing">
            <div class="user-profile">
                <div class="widget-content widget-content-area">
                    <div >
                        <center> 
                        <button id="toggle-login-btn">Đăng ký/Đăng nhập</button>
<br>
<form method="post" id="login-form" style="display:none;">
    <div class="box-login" style="padding-top: 5px; margin-right: -185px; margin-left: -185px;">
        <div class="card border-0 shadow" style="width: 300px;height:300px">
            <div class="card-body text-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                    <path fill-rule="evenodd"
                        d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                </svg>
                <br>
                <input type="text" name="username" id="username" class="form-control my-4 py-2" placeholder="Tên đăng nhập " required />
                <br>
                <input type="password" name="password" id="password" class="form-control my-4 py-2" placeholder="Password" required />
                <div class="text-center mt-3">
                    <input type="submit" value="login" name="login" class="btn btn-primary"><br>
                    <a href="javascript:void(0);" id="show-register-form" class="nav-link">Bạn chưa có tài khoản?</a>
                </div>
            </div>
        </div>
    </div>
</form>
<form method="post" id="register-form" style="display:none;">
    <div class="box-register" style="padding-top: 5px; margin-right: -185px; margin-left: -185px;">
        <div class="card border-0 shadow" style="width: 300px;height:320px">
            <div class="card-body text-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                </svg>
                <br>
                <input type="text" name="username" id="username_register" class="form-control my-4 py-2" placeholder="Tên đăng nhập" required />                <br>
                <input type="text" name="email" id="email" class="form-control my-4 py-2" placeholder="email" required />                <br>

                <input type="password" name="password" id="password" class="form-control my-4 py-2" placeholder="Password" required />                <br>

                <input type="password" name="re_password" id="re_password" class="form-control my-4 py-2" placeholder="Nhập lại mật khẩu" required />                <br>

                <div class="text-center mt-3">
                    <input type="submit" value="Đăng ký" name="register" class="btn btn-primary">                <br>

                    <a href="javascript:void(0);" id="show-login-form" class="nav-link">Đã có tài khoản?</a>
                </div>
            </div>
        </div>
    </div>
</form>
<script>
      // Hiển thị Form đăng nhập
      document.getElementById('toggle-login-btn').addEventListener('click', function () {
        const loginForm = document.getElementById('login-form');
        if (loginForm.style.display === 'none') {
            loginForm.style.display = 'block';
            document.getElementById('register-form').style.display = 'none'; // Ẩn form đăng ký
        } else {
            loginForm.style.display = 'none';
        }
    });
    // Hiển thị Form đăng ký khi nhấn vào "Chưa có tài khoản?"
    document.getElementById('show-register-form').addEventListener('click', function () {
        document.getElementById('register-form').style.display = 'block';
        document.getElementById('login-form').style.display = 'none'; // Ẩn form đăng nhập
    });

    // Hiển thị Form đăng nhập khi nhấn vào "Đã có tài khoản?"
    document.getElementById('show-login-form').addEventListener('click', function () {
        document.getElementById('login-form').style.display = 'block';
        document.getElementById('register-form').style.display = 'none'; // Ẩn form đăng ký
    });
</script>
                                                      
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>