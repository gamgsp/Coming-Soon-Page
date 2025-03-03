<?php
require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Google Sheets credentials and API setup
    $client = new \Google_Client();
    $client->setAuthConfig('credentials.json');  // Path to your credentials.json file
    $client->addScope(\Google_Service_Sheets::SPREADSHEETS);
    $service = new \Google_Service_Sheets($client);

    // ID of the Google Sheet and the specific range (tab)
    $spreadsheetId = 'YOUR_SPREADSHEET_ID';  // Replace with your Google Sheet ID
    $range = 'Sheet1';  // Name of the sheet/tab in Google Sheets

    // Get form data
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $ip_address = $_SERVER['REMOTE_ADDR'];
    $user_agent = $_SERVER['HTTP_USER_AGENT'];
    
    // Prepare the data to insert into the Google Sheet
    $values = [
        [date('Y-m-d H:i:s'), $email, $ip_address, $user_agent]
    ];
    $body = new \Google_Service_Sheets_ValueRange([
        'values' => $values
    ]);
    $params = [
        'valueInputOption' => 'RAW'
    ];

    // Insert data into the sheet
    try {
        $result = $service->spreadsheets_values->append(
            $spreadsheetId,
            $range,
            $body,
            $params
        );
        echo "Thank you for subscribing!";
    } catch (Exception $e) {
        // Log the exception details
        error_log("Error: " . $e->getMessage());
        echo "Failed to process your request. Please try again later.";
    }
} else {
    echo "Invalid request method.";
}
?>
