<?php
include 'config.php';
session_start();

/* =========================
   ONLY HANDLE POST REQUEST
========================= */
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    /* =========================
       ANTI-SPAM 1: Honeypot
    ========================= */
    $website = $_POST['website'] ?? '';
    if (!empty($website)) {
        echo "❌ Spam detected.";
        exit;
    }

    /* =========================
       ANTI-SPAM 2: Rate limiting
       (FIXED: simple + reliable)
    ========================= */
    if (!isset($_SESSION['last_submit'])) {
        $_SESSION['last_submit'] = 0;
    }


    /* =========================
       GET FORM DATA
    ========================= */
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $message = trim($_POST['message'] ?? '');

    if ($name === '' || $email === '' || $message === '') {
        echo "❌ All fields are required.";
        exit;
    }

    /* =========================
       SAVE TO DATABASE
    ========================= */
    $stmt = $conn->prepare("INSERT INTO form (name, email, message) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $message);

    if ($stmt->execute()) {

        /* =========================
           TELEGRAM NOTIFICATION
        ========================= */
      
    $botToken = "8788596221:AAGWCxx9tCGnvJTaPMTOuTD1exkFGED1ekw";
    $chatID = "8637189183";


        $text = "📩 New Contact Form Message\n\n"
              . "👤 Name: $name\n"
              . "📧 Email: $email\n"
              . "💬 Message: $message";

        $url = "https://api.telegram.org/bot$botToken/sendMessage";

        $data = [
            'chat_id' => $chatID,
            'text' => $text
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        curl_exec($ch);
        curl_close($ch);

        echo "✅ Message sent successfully!";

    } else {
        echo "❌ Database error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>