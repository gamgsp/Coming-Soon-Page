<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get the name and email address from the form
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

    // Validate the email address
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email address.";
        exit;
    }

    // Get the user's IP address
    $ip_address = $_SERVER['REMOTE_ADDR'];

    // Get the user's browser/device information
    $user_agent = $_SERVER['HTTP_USER_AGENT'];

    // Get the user's geolocation (latitude and longitude) based on IP address using a free API
    $geo_data = json_decode(file_get_contents("http://ipinfo.io/{$ip_address}/json"));
    $location = isset($geo_data->city) ? $geo_data->city : 'Unknown';
    $region = isset($geo_data->region) ? $geo_data->region : 'Unknown';
    $country = isset($geo_data->country) ? $geo_data->country : 'Unknown';

    // File path where the subscriber data will be saved
    $file_path = 'subscribers.csv';  // CSV file

    // Prepare the data to save (name, email, IP, user-agent, location)
    $data = array(
        $name, 
        $email, 
        date('Y-m-d H:i:s'),  // Timestamp
        $ip_address,          // User's IP address
        $user_agent,          // User's browser/device info
        $location,            // Location (City)
        $region,              // Region (State)
        $country              // Country
    );

    // Open the file in append mode
    if (($file = fopen($file_path, 'a')) !== false) {
        // Write the subscriber data to the file
        fputcsv($file, $data);  // Write data as a CSV row
        fclose($file);  // Close the file
        echo "Thank you for subscribing!";
    } else {
        echo "Failed to save your subscription. Please try again later.";
    }
} else {
    echo "Invalid request method.";
}
?>
