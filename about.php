<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>About</title>
</head>
<body>

<div class="container text-center col-6 mt-5">
    <div class="row">
        <div class="col-4">
            <label for="name" class="form-label">Name:</label>
            <input type="text" id="name" class="form-control" value="<?php echo isset($_SESSION['name']) && preg_match('/^[a-zA-Z\s]+$/', $_SESSION['name']) ? htmlspecialchars($_SESSION['name']) : 'No name set in session'; ?>" readonly>
        </div>

        <div class="col">
            <label for="email" class="form-label">Email:</label>
            <input type="text" id="email" class="form-control" value="<?php echo isset($_SESSION['email']) ? htmlspecialchars($_SESSION['email']) : 'No email set in session'; ?>" readonly>
        </div>

        <div class="col">
            <label for="facebook_url" class="form-label">Facebook URL:</label>
            <input type="text" id="facebook_url" class="form-control" value="<?php echo isset($_SESSION['facebook_url']) ? htmlspecialchars($_SESSION['facebook_url']) : 'No Facebook URL set in session'; ?>" readonly>
        </div>
    </div>
</div>

<div class="container text-center col-6 mt-3">
    <div class="row align-items-center">
        <div class="col">
            <label for="phone" class="form-label">Phone Number:</label>
            <input type="text" id="phone" class="form-control" value="<?php echo isset($_SESSION['phone']) ? htmlspecialchars($_SESSION['phone']) : 'No phone number set in session'; ?>" readonly>
        </div>

        <div class="col">
            <label for="gender" class="form-label">Gender:</label>
            <input type="text" id="gender" class="form-control" value="<?php echo isset($_SESSION['gender']) ? htmlspecialchars($_SESSION['gender']) : 'No gender set in session'; ?>" readonly>
        </div>

        <div class="col">
            <label for="country" class="form-label">Country:</label>
            <input type="text" id="country" class="form-control" value="<?php echo isset($_SESSION['country']) ? htmlspecialchars($_SESSION['country']) : 'No country set in session'; ?>" readonly>
        </div>
    </div>
</div>

<div class="container text-center col-6 mt-3">
    <div class="row align-items-center">
        <div class="col">
            <label for="skills" class="form-label">Skills:</label>
            <input type="text" id="skills" class="form-control" value="<?php echo isset($_SESSION['skills']) ? htmlspecialchars($_SESSION['skills']) : 'No skills set in session'; ?>" readonly>
        </div>

        <div class="col">
            <label for="biography" class="form-label">Biography:</label>
            <textarea id="biography" class="form-control" rows="3" readonly><?php echo isset($_SESSION['biography']) ? htmlspecialchars($_SESSION['biography']) : 'No biography set in session'; ?></textarea>
        </div>
    </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
