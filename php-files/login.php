<?php
session_start();
include 'db.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($user = $result->fetch_assoc()) {
        if (password_verify($password, $user['password'])) {
            
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            header("Location: ../dashboard.html");
            exit();
        } else {
        
            echo "<script>alert('Invalid password. Please try again.'); window.location.href='login.html';</script>"; // 
            exit();
        }
    } else {
        // No user found with that email
        echo "<script>alert('No user found with that email. Please sign up.'); window.location.href='../signup.html';</script>";
        exit();
    }
    $stmt->close();
}
$conn->close();
?>
