<?php
$title = "Register";
include 'header.php';

$registrationSuccess = false;
$registrationMessage = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $email = $_POST['email'];
    $passwordInput = $_POST['password'];  // Menggunakan nama variabel berbeda untuk password input
    $hashedPassword = password_hash($passwordInput, PASSWORD_BCRYPT);

    // Validasi data (misalnya, memastikan semua field terisi)
    if (!empty($firstName) && !empty($lastName) && !empty($email) && !empty($hashedPassword)) {
        // Simpan data ke database atau lakukan aksi lain
        $servername = "localhost";
        $username = "root"; // default username for XAMPP
        $dbpassword = ""; // default password for XAMPP
        $dbname = "nuna";

        // Create connection
        $conn = new mysqli($servername, $username, $dbpassword, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare and bind
        $stmt = $conn->prepare("INSERT INTO users (first_name, last_name, email, password) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $firstName, $lastName, $email, $hashedPassword);

        // Execute statement
        if ($stmt->execute()) {
            $registrationSuccess = true;
            $registrationMessage = "Terima kasih, $firstName. Pendaftaran Anda berhasil.";
        } else {
            $registrationMessage = "Error: " . $stmt->error;
        }

        // Close statement
        $stmt->close();
        $conn->close();
    } else {
        $registrationMessage = "Harap isi semua field.";
    }
}
?>

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

<div class="login-register-area mt-no-text">
    <div class="container container-default-2 custom-area">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-custom">
                <div class="login-register-wrapper">
                    <div class="section-content text-center mb-5">
                        <h2 class="title-4 mb-2">Create Account</h2>
                        <p class="desc-content">Please Register using account detail below.</p>
                    </div>
                    <?php if ($registrationSuccess): ?>
                        <div class="card success-card">
                            <div class="card-body">
                                <h5 class="card-title">Pendaftaran Berhasil!</h5>
                                <p class="card-text"><?php echo $registrationMessage; ?></p>
                            </div>
                        </div>
                    <?php elseif (!empty($registrationMessage)): ?>
                        <div class="card error-card">
                            <div class="card-body">
                                <h5 class="card-title">Error</h5>
                                <p class="card-text"><?php echo $registrationMessage; ?></p>
                            </div>
                        </div>
                    <?php endif; ?>
                    <form action="register.php" method="post">
                        <div class="single-input-item mb-3">
                            <input type="text" name="first_name" placeholder="First Name" required>
                        </div>
                        <div class="single-input-item mb-3">
                            <input type="text" name="last_name" placeholder="Last Name" required>
                        </div>
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
                                        <label class="custom-control-label" for="rememberMe">Subscribe Our Newsletter</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single-input-item mb-3">
                            <button type="submit" class="btn flosun-button secondary-btn theme-color rounded-0">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
