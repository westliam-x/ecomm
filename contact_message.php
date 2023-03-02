<?php
require_once 'conn.php';
session_start();
// sanitize input data
function sanitize($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// validate input data
function validate($name, $email, $subject, $message)
{
    $errors = array();
    if (empty($name)) {
        $errors[] = "Name is required.";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }
    if (empty($subject)) {
        $errors[] = "Subject is required.";
    }
    if (empty($message)) {
        $errors[] = "Message is required.";
    }
    return $errors;
}

// check if form is submitted

if (isset($_POST['Submit'])) {
    // sanitize input data
    $name = sanitize($_POST["name"]);
    $email = sanitize($_POST["email"]);
    $subject = sanitize($_POST["subject"]);
    $message = sanitize($_POST["message"]);
    $id = $_SESSION["id"];

    // validate input data
    $errors = validate($name, $email, $subject, $message);

    // if there are no errors, send the email
    if (empty($errors)) {
        $sql = "INSERT INTO messages (id, name, email, subject, message) VALUES ($id, '$name', '$email', '$subject', '$message')";
        $result = mysqli_query($mysqli, $sql);
        if ($result) {
            echo "<script>alert('Thank you for contacting us!')</script>";
        } else {
            echo "<script>alert('Error sending message')</script>";
        }
    } else {
        // if there are errors, display them
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
    }
}
