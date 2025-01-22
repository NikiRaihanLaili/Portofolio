<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Ambil data dari formulir
        $name = htmlspecialchars(trim($_POST['name']));
        $email = htmlspecialchars(trim($_POST['email']));
        $message = htmlspecialchars(trim($_POST['message']));

        // Validasi input
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            die("Invalid email address.");
        }

        // Konfigurasi email
        $to = "nikiraihan131@gmail.com";
        $subject = "Contact Form Message from $name";
        $body = "You received a new message from your website contact form:\n\n" .
                "Name: $name\n" .
                "Email: $email\n\n" .
                "Message:\n$message";

        $headers = "From: $email\r\n";
        $headers .= "Reply-To: $email\r\n";

        // Kirim email
        if (mail($to, $subject, $body, $headers)) {
            echo "Message sent successfully.";
        } else {
            echo "Failed to send message. Please try again later.";
        }

        if (mail($to, $subject, $body, $headers)) {
            header("Location: thank-you.html");
            exit();
        } else {
            echo "Failed to send message.";
        }        
    }
?>
