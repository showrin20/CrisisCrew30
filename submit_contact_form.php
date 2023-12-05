<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // Recipient's email address
    $to = "showrinrahman66@gmail.com"; // Replace with the actual recipient's email address

    // Subject of the email
    $subject = "Contact Form Submission";

    // Compose the email message
    $email_message = "Name: $name\n";
    $email_message .= "Email: $email\n\n";
    $email_message .= "Message:\n$message";

    // Additional headers
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Send the email
    if (mail($to, $subject, $email_message, $headers)) {
        // Email sent successfully
        echo "Thank you for your message. We will get back to you soon.";
    } else {
        // Email could not be sent
        echo "Sorry, there was an error sending your message. Please try again later.";
    }
} else {
    // Handle form submission method other than POST (e.g., GET)
    echo "Invalid request method. Please submit the form.";
}
?>
