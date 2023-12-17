<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $people = $_POST['people'];
    $message = $_POST['message'];

    // Recipient WhatsApp number with country code
    $recipientPhoneNumber = '+919746925420'; 

    // Message to be sent
    $whatsappMessage = "New Table Booking\n\nName: $name\nEmail: $email\nPhone: $phone\nDate: $date\nTime: $time\nPeople: $people\nMessage: $message";

    // Compose the email headers
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion();

    // Send the email
    $mailSuccess = mail("whatsapp:$recipientPhoneNumber", "New Table Booking", $whatsappMessage, $headers);

    if ($mailSuccess) {
        echo "Your booking request was sent. We will call back or send an email to confirm your reservation. Thank you!";
    } else {
        echo "Error sending the booking request. Please try again later.";
    }
} else {
    // If the request method is not POST, redirect to the form page
    header("Location: /path/to/your/form-page.php");
    exit();
}
?>
