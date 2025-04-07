<?php
session_start();
include "../includes/db.php"; // adjust path if needed

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['login'])) {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        $msg = "missing";
    } else {
        $stmt = $conn->prepare("SELECT * FROM admin WHERE adminUsername = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result && $result->num_rows === 1) {
            $row = $result->fetch_assoc();
            if (password_verify($password, $row['adminPassword'])) {
                $_SESSION['admin'] = $row['adminUsername'];
                header("Location: ../login.php?status=success");
                exit();
            } else {
                $msg = "wrong_password";
            }
        } else {
            $msg = "no_user";
        }

        $stmt->close();
        $conn->close();
    }

    // Redirect back with error message if login fails
    header("Location: ../login.php?status=$msg");
    exit();
}
?>
