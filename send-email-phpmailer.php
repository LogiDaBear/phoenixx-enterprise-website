<?php
/**
 * ADVANCED EMAIL HANDLER USING PHPMAILER
 * Use this version if the basic send-email.php doesn't work
 * Requires PHPMailer library (usually included on Hostinger)
 */

// Prevent direct access
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('HTTP/1.1 403 Forbidden');
    exit('Direct access not permitted');
}

header('Content-Type: application/json');

// Check if PHPMailer exists
if (!file_exists('PHPMailer/PHPMailer.php')) {
    // Try alternate location
    if (file_exists('/usr/share/php/PHPMailer/PHPMailer.php')) {
        require_once '/usr/share/php/PHPMailer/PHPMailer.php';
        require_once '/usr/share/php/PHPMailer/SMTP.php';
        require_once '/usr/share/php/PHPMailer/Exception.php';
    } else {
        // Fallback to basic mail function
        include 'send-email.php';
        exit;
    }
} else {
    require 'PHPMailer/PHPMailer.php';
    require 'PHPMailer/SMTP.php';
    require 'PHPMailer/Exception.php';
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Email configuration
define('SMTP_HOST', 'smtp.hostinger.com');
define('SMTP_PORT', 587); // 587 for TLS, 465 for SSL
define('SMTP_USERNAME', 'rsoml@phxxrising.org');
define('SMTP_PASSWORD', 'YOUR_EMAIL_PASSWORD_HERE'); // REPLACE THIS
define('FROM_EMAIL', 'rsoml@phxxrising.org');
define('FROM_NAME', 'Phoenixx Enterprises');
define('TO_EMAIL', 'rsoml@phxxrising.org');

// Get and sanitize form data
$name = strip_tags(trim($_POST['name'] ?? ''));
$email = filter_var(trim($_POST['email'] ?? ''), FILTER_SANITIZE_EMAIL);
$phone = strip_tags(trim($_POST['phone'] ?? ''));
$service = strip_tags(trim($_POST['service'] ?? ''));
$message = strip_tags(trim($_POST['message'] ?? ''));

// Validate
$errors = [];
if (empty($name)) $errors[] = 'Name is required';
if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = 'Valid email is required';
if (empty($service)) $errors[] = 'Please select a service';
if (empty($message)) $errors[] = 'Message is required';

if (!empty($errors)) {
    echo json_encode([
        'success' => false,
        'message' => 'Please fill in all required fields',
        'errors' => $errors
    ]);
    exit;
}

try {
    // Create PHPMailer instance
    $mail = new PHPMailer(true);
    
    // Server settings
    $mail->isSMTP();
    $mail->Host = SMTP_HOST;
    $mail->SMTPAuth = true;
    $mail->Username = SMTP_USERNAME;
    $mail->Password = SMTP_PASSWORD;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Use ENCRYPTION_SMTPS for port 465
    $mail->Port = SMTP_PORT;
    
    // Recipients
    $mail->setFrom(FROM_EMAIL, FROM_NAME);
    $mail->addAddress(TO_EMAIL, 'Phoenixx Enterprises');
    $mail->addReplyTo($email, $name);
    
    // Content
    $mail->isHTML(true);
    $mail->Subject = 'New Contact Form Submission - ' . $service;
    $mail->Body = "
    <html>
    <head>
        <style>
            body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
            .container { max-width: 600px; margin: 0 auto; padding: 20px; }
            .header { background: #E63946; color: white; padding: 20px; text-align: center; }
            .content { background: #f9f9f9; padding: 20px; border: 1px solid #ddd; }
            .field { margin-bottom: 15px; }
            .label { font-weight: bold; color: #E63946; }
            .value { margin-top: 5px; }
        </style>
    </head>
    <body>
        <div class='container'>
            <div class='header'>
                <h2>New Contact Form Submission</h2>
            </div>
            <div class='content'>
                <div class='field'>
                    <div class='label'>Name:</div>
                    <div class='value'>" . htmlspecialchars($name) . "</div>
                </div>
                <div class='field'>
                    <div class='label'>Email:</div>
                    <div class='value'>" . htmlspecialchars($email) . "</div>
                </div>
                <div class='field'>
                    <div class='label'>Phone:</div>
                    <div class='value'>" . htmlspecialchars($phone ?: 'Not provided') . "</div>
                </div>
                <div class='field'>
                    <div class='label'>Service Interest:</div>
                    <div class='value'>" . htmlspecialchars($service) . "</div>
                </div>
                <div class='field'>
                    <div class='label'>Message:</div>
                    <div class='value'>" . nl2br(htmlspecialchars($message)) . "</div>
                </div>
            </div>
        </div>
    </body>
    </html>
    ";
    
    $mail->AltBody = "Name: $name\nEmail: $email\nPhone: $phone\nService: $service\n\nMessage:\n$message";
    
    // Send email
    $mail->send();
    
    // Send auto-reply to customer
    $autoReply = new PHPMailer(true);
    $autoReply->isSMTP();
    $autoReply->Host = SMTP_HOST;
    $autoReply->SMTPAuth = true;
    $autoReply->Username = SMTP_USERNAME;
    $autoReply->Password = SMTP_PASSWORD;
    $autoReply->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $autoReply->Port = SMTP_PORT;
    
    $autoReply->setFrom(FROM_EMAIL, FROM_NAME);
    $autoReply->addAddress($email, $name);
    
    $autoReply->isHTML(true);
    $autoReply->Subject = 'Thank you for contacting Phoenixx Enterprises';
    $autoReply->Body = "
    <html>
    <head>
        <style>
            body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
            .container { max-width: 600px; margin: 0 auto; padding: 20px; }
            .header { background: #E63946; color: white; padding: 20px; text-align: center; }
            .content { padding: 20px; }
            .signature { margin-top: 30px; border-top: 2px solid #E63946; padding-top: 15px; }
        </style>
    </head>
    <body>
        <div class='container'>
            <div class='header'>
                <h2>Thank You for Contacting Us</h2>
            </div>
            <div class='content'>
                <p>Dear " . htmlspecialchars($name) . ",</p>
                <p>Thank you for reaching out to Phoenixx Enterprises. We have received your inquiry regarding <strong>" . htmlspecialchars($service) . "</strong> and will respond within 24-48 hours.</p>
                <div class='signature'>
                    <p><strong>Rise. So others may live.</strong></p>
                    <p>
                        Phoenixx Enterprises<br>
                        Columbus, OH<br>
                        Email: rsoml@phxxrising.org
                    </p>
                </div>
            </div>
        </div>
    </body>
    </html>
    ";
    
    $autoReply->send();
    
    echo json_encode([
        'success' => true,
        'message' => 'Thank you! Your message has been sent successfully. We will contact you soon.'
    ]);
    
} catch (Exception $e) {
    error_log("PHPMailer Error: {$mail->ErrorInfo}");
    
    echo json_encode([
        'success' => false,
        'message' => 'Sorry, there was an error sending your message. Please email us directly at rsoml@phxxrising.org'
    ]);
}
?>
