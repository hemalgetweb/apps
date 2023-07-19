<?php
namespace APPS_Application_LISTING\MAIL;
if ( ! is_admin() ) {
    return;
}

include_once( AJL_VENDOR_DIR . 'PHPMailer-master/src/PHPMailer.php' );
include_once( AJL_VENDOR_DIR . 'PHPMailer-master/src/Exception.php' );
include_once( AJL_VENDOR_DIR . 'PHPMailer-master/src/SMTP.php' );

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


class SendMailForApplication {
    public function send_email($approve_status, $name, $job_title, $application_id, $statusText, $job_cat_name, $company_logo_url) {
        $mail = new PHPMailer( true );
        try {
            // SMTP Configuration
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'hemalrika@gmail.com'; // Replace with your Gmail email address
            $mail->Password   = 'sgtrwxdavysoiicz'; // Replace with your Gmail password
            $mail->SMTPSecure = 'tls';
            $mail->Port       = 587;

            // Email Content
            $mail->setFrom( 'hemalrika@gmail.com', 'Hemal With Rika' );
            $mail->addAddress( 'hemalgetweb@gmail.com', 'Hemal' );
            $mail->Subject = 'Subject of the email';

            // Load HTML content from template file
            // $htmlTemplatePath = AJL_CONTACT_DIR . 'email/templates/email-template-application.php';
            // ob_start();
            // include $htmlTemplatePath;
            // $htmlBody = ob_get_clean();
            $htmlBody = <<<EOT
                <!DOCTYPE html>
                <html>
                <head>
                    <title>Job Application Status</title>
                    <style>
                        body {
                            font-family: Arial, sans-serif;
                            color: #333;
                            margin: 0;
                            padding: 0;
                        }

                        .container {
                            max-width: 600px;
                            margin: 0 auto;
                            padding: 20px;
                            background-color: #f7f7f7;
                            border: 1px solid #ddd;
                            border-radius: 4px;
                            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                        }

                        h1 {
                            color: #333;
                            margin-top: 0;
                        }

                        p {
                            margin-bottom: 10px;
                        }

                        strong {
                            font-weight: bold;
                        }

                        .logo {
                            display: block;
                            margin-top: 20px;
                        }
                    </style>
                </head>
                <body>
                    <div class="container">
                        <h2>Application Status: {$job_title}</h2>
                        <p><strong>Name:</strong> {$name}</p>
                        <p><strong>Job Role:</strong> {$job_cat_name}</p>
                        <p><strong>Application ID:</strong> {$application_id}</p>
                        <p>Details: {$statusText}</p>
                        <div class="logo-img"><img class="logo" src="{$company_logo_url}" alt="Company Logo"></div>
                        <h1>{$company_logo_url}</h1>
                    </div>
                </body>
                </html>
                EOT;
            $mail->Body = $htmlBody;
            $mail->isHTML( true );

            // Send the email
            $mail->send();
        } catch ( Exception $e ) {
            echo 'Failed to send email: ' . $mail->ErrorInfo;
        }
    }
}

new SendMailForApplication();
