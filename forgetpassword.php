<?php
// Database connection
include('dbconn.php');

// Reset Password
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['reset_password'])) {
        $email = $_POST['email'];
        $new_password = md5($_POST['new_password']);
        $confirm_password = md5($_POST['confirm_password']);

        // Check if new password matches confirm password
        if ($new_password === $confirm_password) {
            
            $sql = "UPDATE registerform SET password = '$new_password' ,passwordcnf='$confirm_password' WHERE email = '$email'";

            if ($conn->query($sql) === TRUE) {
                echo "Password reset successfully.";
                header('Location: login.php');
            } else {
                echo "Error updating password: " . $conn->error;
            }
        } else {
            echo "Passwords do not match.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script>
        function validateForm() {
            var email = document.getElementById("email").value;
            var newPassword = document.getElementById("new_password").value;
            var confirmPassword = document.getElementById("confirm_password").value;
            var passwordRegex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/; // Regex for password validation
            var error = "";

            // Validate email
            if (email === "") {
                error += "Email field is required.\n";
            }

            // Validate new password
            if (newPassword === "") {
                error += "New Password field is required.\n";
            } else if (!passwordRegex.test(newPassword)) {
                error += "Password must contain at least one uppercase letter, one lowercase letter, one number, and be at least 8 characters long.\n";
            }

            // Validate confirm password
            if (confirmPassword === "") {
                error += "Confirm Password field is required.\n";
            } else if (newPassword !== confirmPassword) {
                error += "Passwords do not match.\n";
            }

            if (error !== "") {
                alert(error);
                return false; // Prevent form submission
            }

            return true; // Allow form submission
        }
    </script>
</head>

<body>
    <div class="container mt-5">
        <h1 class="mb-4">Reset Password</h1>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" onsubmit="return validateForm()">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="new_password">New Password</label>
                <input type="password" class="form-control" id="new_password" name="new_password" required>
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirm Password</label>
                <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
            </div>
            <button type="submit" class="btn btn-primary" name="reset_password">Reset Password</button>
        </form>
    </div>
</body>

</html>


<?php
$conn->close();
?>
