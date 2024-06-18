<?php

ob_start(); // Mulai output buffering

$title = "Login";
include 'header.php';

$loginSuccess = false;
$loginMessage = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validasi data (misalnya, memastikan semua field terisi)
    if (!empty($email) && !empty($password)) {
        // Cek data dengan database
        $servername = "localhost";
        $username = "root"; // default username for XAMPP
        $password_db = ""; // default password for XAMPP
        $dbname = "nuna";

        // Buat koneksi
        $conn = new mysqli($servername, $username, $password_db, $dbname);

        // Cek koneksi
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Query untuk mendapatkan data user berdasarkan email
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            // Verifikasi password
            if (password_verify($password, $user['password'])) {
                $loginSuccess = true;
                $_SESSION['first_name'] = $user['first_name']; // Simpan nama depan di session
                $loginMessage = "Selamat datang, " . $user['first_name'] . ". Anda berhasil login.";
                // Redirect ke halaman index.php setelah login berhasil
                header("Location: index.php");
                exit; // Penting: pastikan untuk keluar dari script setelah header redirect
            } else {
                $loginMessage = "Password salah.";
            }
        } else {
            $loginMessage = "Email tidak ditemukan.";
        }

        // Tutup statement dan koneksi
        $stmt->close();
        $conn->close();
    } else {
        $loginMessage = "Harap isi semua field.";
    }
}
?>


<!-- Header Area End Here -->
<!-- Breadcrumb Area Start Here -->
<div class="breadcrumbs-area position-relative">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="breadcrumb-content position-relative section-content">
                    <h3 class="title-3">Login-Register</h3>
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li>Login-Register</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Area End Here -->
<!-- Login Area Start Here -->
<div class="login-register-area mt-no-text">
    <div class="container custom-area">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-custom">
                <div class="login-register-wrapper">
                    <div class="section-content text-center mb-5">
                        <h2 class="title-4 mb-2">Login</h2>
                        <p class="desc-content">Please login using account detail below.</p>
                    </div>
                    <?php if ($loginSuccess) : ?>
                        <div class="card success-card">
                            <div class="card-body">
                                <h5 class="card-title">Login Berhasil!</h5>
                                <p class="card-text"><?php echo $loginMessage; ?></p>
                            </div>
                        </div>
                    <?php elseif (!empty($loginMessage)) : ?>
                        <div class="card error-card">
                            <div class="card-body">
                                <h5 class="card-title">Login Gagal</h5>
                                <p class="card-text"><?php echo $loginMessage; ?></p>
                            </div>
                        </div>
                    <?php endif; ?>
                    <form action="login.php" method="post">
                        <div class="single-input-item mb-3">
                            <input type="email" name="email" placeholder="Email or Username" required>
                        </div>
                        <div class="single-input-item mb-3">
                            <input type="password" name="password" placeholder="Enter your Password" required>
                        </div>
                        <div class="single-input-item mb-3">
                            <div class="login-reg-form-meta d-flex align-items-center justify-content-between">
                                <div class="remember-meta mb-3">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="rememberMe">
                                        <label class="custom-control-label" for="rememberMe">Remember Me</label>
                                    </div>
                                </div>
                                <a href="#" class="forget-pwd mb-3">Forget Password?</a>
                            </div>
                        </div>
                        <div class="single-input-item mb-3">
                            <button type="submit" class="btn flosun-button secondary-btn theme-color rounded-0">Login</button>
                        </div>
                        <div class="single-input-item">
                            <a href="register.php">Create Account</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Login Area End Here -->

<?php include 'footer.php'; ?>
<?php
ob_end_flush(); // Akhiri output buffering dan kirim output ke browser
?>

</body>

<!-- Mirrored from htmldemo.net/flosun/flosun/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 04 Dec 2022 05:03:27 GMT -->

</html>