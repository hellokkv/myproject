<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php
    session_start(); 
    if (!isset($_SESSION['username'])) {
        header('Location: login.php'); 
        exit();
    }
    ?>
    <header>
        <nav>
            <ul>
                <li><a href="index.php" class="active">Home</a></li>
                <li><a href="../create-form.php">Create Form</a></li>
                <li><a href="view-forms.html">View Forms</a></li>
                <li><a href="edit-profile.html">Edit Profile</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section class="welcome">
            <h1>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
            <p>Here's your dashboard where you can manage everything from form creation to data analysis.</p>
        </section>
        <section class="form-templates">
            <h2>Start Creating Forms</h2>
            <div class="templates">
                <div class="template">
                    <h3>Contact Form</h3>
                    <button onclick="location.href='create-form.html?template=contact';">Use Template</button>
                </div>
                <div class="template">
                    <h3>Feedback Form</h3>
                    <button onclick="location.href='create-form.html?template=feedback';">Use Template</button>
                </div>
                <div class="template">
                    <h3>Survey</h3>
                    <button onclick="location.href='create-form.html?template=survey';">Use Template</button>
                </div>
            </div>
        </section>
    </main>
    <footer>
    </footer>
</body>
</html>
