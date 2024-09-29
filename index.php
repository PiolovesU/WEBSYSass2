<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submit'])) {
      
        $name = htmlspecialchars(strip_tags(trim($_POST['name'])));
        $email = htmlspecialchars(strip_tags(trim($_POST['email'])));
        $pass = htmlspecialchars(strip_tags(trim($_POST['pass'])));
        $cpass = htmlspecialchars(strip_tags(trim($_POST['cpass'])));
        $sex = isset($_POST['gender']) ? htmlspecialchars(strip_tags(trim($_POST['gender']))) : null;
        $country = htmlspecialchars(strip_tags(trim($_POST['country'])));
        $skills = isset($_POST['skill']) ? $_POST['skill'] : [];
        $bio = htmlspecialchars(strip_tags(trim($_POST['biag'])));
        $phone = htmlspecialchars(strip_tags(trim($_POST['phone'])));
        $facebook_url = htmlspecialchars(strip_tags(trim($_POST['facebook_url'])));

     
        $errors = [];

       
        if (empty($name) || !preg_match("/^[a-zA-Z\s]+$/", $name)) {
            $errors[] = "Name is required and must contain letters and spaces only.";
        } else {
            echo "Name: " . $name . "<br>";
            $_SESSION['name'] = $name; 
        }

       
        if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "A valid email is required.";
        } else {
            echo "Email: " . $email . "<br>";
            $_SESSION['email'] = $email; 
        }

        
        if (empty($pass) || !preg_match("/^(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{8,}$/", $pass)) {
            $errors[] = "Password must be at least 8 characters long, contain at least 1 uppercase letter, and at least 1 number.";
        } else if ($pass !== $cpass) {
            $errors[] = "Confirm password must match the password.";
        } else {
            echo "Password is set <br>";
            $_SESSION['password'] = $pass;
        }

       
        if (empty($sex)) {
            $errors[] = "Gender is required.";
        } else {
            echo "Gender: " . $sex . " <br>";
            $_SESSION['gender'] = $sex; 
        }

    
        if (empty($country)) {
            $errors[] = "Country must be selected.";
        } else {
            echo "Country: " . $country . " <br>";
            $_SESSION['country'] = $country; 
        }

    
        if (empty($skills)) {
            $errors[] = "At least one skill must be selected.";
        } else {
            $skills_list = implode(', ', $skills); 
            echo "Skills: " . $skills_list . "<br>";
            $_SESSION['skills'] = $skills_list; 
        }

        
        if (strlen($bio) > 200) {
            $errors[] = "Biography must be a maximum of 200 characters.";
        } else {
            echo "Biography: " . $bio . "<br>";
            $_SESSION['biography'] = $bio;
        }

    
        if (empty($phone) || !preg_match("/^[0-9]+$/", $phone)) {
            $errors[] = "A valid phone number is required.";
        } else {
            $_SESSION['phone'] = $phone;
        }

    
        if (empty($facebook_url) || !filter_var($facebook_url, FILTER_VALIDATE_URL)) {
            $errors[] = "A valid Facebook URL is required.";
        } else {
            $_SESSION['facebook_url'] = $facebook_url; 
        }

        
        if (!empty($errors)) {
            foreach ($errors as $error) {
                echo $error . "<br>";
            }
        }
    }
    if(isset($_SESSION['name']) && isset( $_SESSION['email'])&& isset( $_SESSION['password'])&& isset( $_SESSION['gender'])&& isset( $_SESSION['country'])
    && isset( $_SESSION['skills'])&& isset( $_SESSION['biography'])&& isset( $_SESSION['phone']) && isset($_SESSION['facebook_url'])){
        header("Location: http://localhost/websysass2/about.php");
    }
}
?>
<head><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"></head>
<body>
<form action ="" method="POST">
    <div class="container text-center col-6 mt-5">
    <div class="row">
        <div class="col-4">
        Name: <input type="text" name="name" class="form-control  ">
        </div>
        <div class="col">
        Email: <input type="email" name="email" class="form-control" >
        </div>
        <div class="col">
        Password: <input type="password" name="pass" class="form-control"><br>
        </div>
    
    </div>
    </div>
    
    <div class="container text-center col-6">
        <div class="row align-items-center">
            <div class="col-4">
                Confirm Password: <input type="password" name="cpass" class="form-control">
            </div>

            <div class="col">

                Gender:
                Male <input type="radio" name="gender" value="male" >
                Female <input type="radio" name="gender" value="female" >

            </div>

            <div class="col">

                Country:
                <select name="country" class="form-control">
                    <option value="">Select a country</option>
                    <option value="Africa">Africa</option>
                    <option value="Chicago">Chicago</option>
                    <option value="Nigeria">Nigeria</option>
                </select>

            </div>
            </div>
            </div>
    
    <div class="container text-center col-6">
        <div class="row align-items-center">
        <div class="col mt-3">
                Phone Number: <input type="text" name="phone" class="form-control"><br>
            </div>
            <div class="col-4" >
            Skills: <br>
                <input type="checkbox" name="skill[]" value="Guitar" > Guitar
                <input type="checkbox" name="skill[]" value="Bass"> Bass
                <input type="checkbox" name="skill[]" value="Keyboard"> Keyboard
            </div>
            
            <div class="col mb-2">
                Facebook URL: <input type="url" name="facebook_url" class="form-control">
            </div>
        </div>
    </div>

    <div class="container text-center col-6"> 
        Biography: <br>
        <textarea name="biag" placeholder="Enter some details" maxlength="200" class="form-control" rows="3"></textarea><br><br>
        <button type="submit" name="submit" class="text-warning btn btn-outline-warning">
            Submit
        </button>
    </div>

</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>