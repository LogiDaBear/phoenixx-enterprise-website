<?php
// Prevent direct access
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('HTTP/1.1 403 Forbidden');
    exit('Direct access not permitted');
}

// Set header for JSON response
header('Content-Type: application/json');

// Enable error reporting for debugging (disable in production)
error_reporting(E_ALL);
ini_set('display_errors', 0);

// Email configuration - UPDATE THESE VALUES
define('SMTP_HOST', 'smtp.hostinger.com');
define('SMTP_PORT', 587); // or 465 for SSL
define('SMTP_USERNAME', 'rsoml@phxxrising.org');
define('SMTP_PASSWORD', 'YOUR_EMAIL_PASSWORD_HERE'); // Replace with your email password
define('FROM_EMAIL', 'rsoml@phxxrising.org');
define('FROM_NAME', 'Phoenixx Enterprises Contact Form');
define('TO_EMAIL', 'rsoml@phxxrising.org'); // Where form submissions go
define('TO_NAME', 'Phoenixx Enterprises');

// Get form data
$name = isset($_POST['name']) ? strip_tags(trim($_POST['name'])) : '';
$email = isset($_POST['email']) ? filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL) : '';
$phone = isset($_POST['phone']) ? strip_tags(trim($_POST['phone'])) : '';
$service = isset($_POST['service']) ? strip_tags(trim($_POST['service'])) : '';
$message = isset($_POST['message']) ? strip_tags(trim($_POST['message'])) : '';

// Validate inputs
$errors = [];

if (empty($name)) {
    $errors[] = 'Name is required';
}

if (empty($email)) {
    $errors[] = 'Email is required';
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Invalid email format';
}

if (empty($service)) {
    $errors[] = 'Please select a service';
}

if (empty($message)) {
    $errors[] = 'Message is required';
}

if (!empty($errors)) {
    echo json_encode([
        'success' => false,
        'message' => 'Please fill in all required fields',
        'errors' => $errors
    ]);
    exit;
}

// Build email content
$emailSubject = "New Contact Form Submission - " . $service;
$emailBody = "
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
        .footer { text-align: center; padding: 20px; color: #666; font-size: 12px; }
    </style>
</head>
<body>
    <div class='container'>
        <div class='header'>
            <h2>New Contact Form Submission</h2>
            <p>Phoenixx Enterprises</p>
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
        <div class='footer'>
            <p>This email was sent from the Phoenixx Enterprises contact form</p>
            <p>Submitted: " . date('F j, Y, g:i a') . "</p>
        </div>
    </div>
</body>
</html>
";

// Plain text version for email clients that don't support HTML
$emailBodyText = "
New Contact Form Submission - Phoenixx Enterprises

Name: $name
Email: $email
Phone: " . ($phone ?: 'Not provided') . "
Service Interest: $service

Message:
$message

Submitted: " . date('F j, Y, g:i a') . "
";

// Email headers
$headers = [
    'MIME-Version: 1.0',
    'Content-Type: text/html; charset=UTF-8',
    'From: ' . FROM_NAME . ' <' . FROM_EMAIL . '>',
    'Reply-To: ' . $name . ' <' . $email . '>',
    'X-Mailer: PHP/' . phpversion()
];

// Try to send using PHP mail() first (simpler, works on most shared hosting)
$mailSent = @mail(
    TO_EMAIL,
    $emailSubject,
    $emailBody,
    implode("\r\n", $headers)
);

if ($mailSent) {
    // Send auto-reply to customer
    $autoReplySubject = "Thank you for contacting Phoenixx Enterprises";
    $autoReplyBody = "
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
                <p>Your message:</p>
                <p style='background: #f9f9f9; padding: 15px; border-left: 4px solid #E63946;'>
                    " . nl2br(htmlspecialchars($message)) . "
                </p>
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
    
    $autoReplyHeaders = [
        'MIME-Version: 1.0',
        'Content-Type: text/html; charset=UTF-8',
        'From: ' . FROM_NAME . ' <' . FROM_EMAIL . '>',
        'X-Mailer: PHP/' . phpversion()
    ];
    
    @mail(
        $email,
        $autoReplySubject,
        $autoReplyBody,
        implode("\r\n", $autoReplyHeaders)
    );
    
    echo json_encode([
        'success' => true,
        'message' => 'Thank you! Your message has been sent successfully. We will contact you soon.'
    ]);
} else {
    // Log error for debugging
    error_log('Email sending failed - Check SMTP settings and credentials');
    
    echo json_encode([
        'success' => false,
        'message' => 'Sorry, there was an error sending your message. Please try again or email us directly at rsoml@phxxrising.org'
    ]);
}
?>
