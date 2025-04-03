<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = password_hash(trim($_POST['password']), PASSWORD_DEFAULT); 
    
    $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $email, $password);

    try {
        $stmt->execute();
        echo "<script>alert('Registration successful. Please login.'); window.location.href='../login.html';</script>";
    } catch (Exception $e) {
       
        if ($conn->errno == 1062) {
            echo "<script>alert('Email or username already exists.'); window.location.href='../signup.html';</script>";
        } else {
            echo "<script>alert('An error occurred. Please try again later.'); window.location.href='signup.html';</script>";
        }
    }

    $stmt->close();
    $conn->close();
}
?>
