# Coming Soon Page

This repository contains the source code for a "Coming Soon" page for a website. The page allows users to subscribe to updates by providing their name and email address. The subscription data can be saved locally as a CSV file, sent to a Google Sheet, or sent via email using PHP's `mail()` function or SMTP.

<p align="center">
   <a href="https://github.com/gamgsp/Coming-Soon-Page/blob/main/LICENSE">
    <img src="https://img.shields.io/github/license/gamgsp/Coming-Soon-Page.svg" alt="License">
  </a>
  <a href="https://github.com/gamgsp/Coming-Soon-Page/issues">
    <img src="https://img.shields.io/github/issues/gamgsp/Coming-Soon-Page.svg" alt="Open Issues">
  </a>
  <a href="https://github.com/gamgsp/Coming-Soon-Page/network">
    <img src="https://img.shields.io/github/forks/gamgsp/Coming-Soon-Page.svg" alt="Forks">
  </a>
  <a href="https://github.com/gamgsp/Coming-Soon-Page/stargazers">
    <img src="https://img.shields.io/github/stars/gamgsp/Coming-Soon-Page.svg" alt="Stars">
  </a>
  <a href="https://github.com/gamgsp/Coming-Soon-Page/commits/main">
    <img src="https://img.shields.io/github/last-commit/gamgsp/Coming-Soon-Page.svg" alt="Last Commit">
  </a>
</p>

## What is Coming-Soon-Page?

The "Coming Soon" page is a placeholder page for a website that is under construction or will be launched soon. It provides a way for visitors to subscribe to updates by entering their name and email address. This helps in building an email list of interested users before the actual launch of the website.

## How to Use It?

1. **Clone the repository:**
    ```sh
    git clone https://github.com/your-username/Coming-Soon-Page.git
    cd Coming-Soon-Page
    ```

2. **Open `index.html` in a web browser:**
    Simply open the `index.html` file in your web browser to view the "Coming Soon" page.

3. **Configure the PHP scripts:**
    - For `save_csv_local.php`, ensure the server has write permissions to the directory where `subscribers.csv` will be saved.
    - For `send_php_email.php`, update the `$to` variable with your email address.
    - For `send_smtp_mail.php`, update the SMTP server settings and the `$to` variable with your email address.
    - For `send_to_google_sheets.php`, update the Google Sheets API credentials and the `$spreadsheetId` variable with your Google Sheet ID.

4. **Deploy the project to a web server:**
    Ensure that the web server supports PHP and has the necessary permissions and configurations.

## How to Change the Data Saving Format from `index.html`?

The `index.html` file includes a form that submits data to a PHP script. You can change the data saving format by modifying the `action` attribute of the form to point to the desired PHP script.

### Example:

```html
<form class="email-form" action="save_csv_local.php" method="post">
    <!-- form fields -->
</form>
```

Send via PHP email:
```html
<form class="email-form" action="send_php_email.php" method="post">
    <!-- form fields -->
</form>
```

Send via SMTP email:
```html
<form class="email-form" action="send_smtp_mail.php" method="post">
    <!-- form fields -->
</form>
```

Send to Google Sheets:
```html
<form class="email-form" action="send_to_google_sheets.php" method="post">
    <!-- form fields -->
</form>
```

## Folder Structure

```
img/
    testlogo.png
index.html
save_csv_local.php
send_php_email.php
send_smtp_mail.php
send_to_google_sheets.php
```

## Files

### `index.html`
This is the main HTML file for the "Coming Soon" page. It includes a form for users to enter their name and email address to subscribe to updates.

### `save_csv_local.php`
This PHP script handles form submissions and saves the subscriber data to a local CSV file. It captures the user's name, email, IP address, browser/device information, and geolocation.

### `send_php_email.php`
This PHP script handles form submissions and sends the subscriber data via email using PHP's built-in `mail()` function. It captures the user's email address.

### `send_smtp_mail.php`
This PHP script handles form submissions and sends the subscriber data via email using SMTP with PHPMailer. It captures the user's email address.

### `send_to_google_sheets.php`
This PHP script handles form submissions and sends the subscriber data to a Google Sheet. It captures the user's email address, IP address, and browser/device information.

### `testlogo.png`
This is a placeholder image for the company logo displayed on the "Coming Soon" page.

## License

This project is licensed under the MIT License. See the [LICENSE](https://github.com/gamgsp/Coming-Soon-Page/blob/main/LICENSE) file for details.

## Acknowledgements

- [PHPMailer](https://github.com/PHPMailer/PHPMailer) for sending emails via SMTP.
- [Google Sheets API](https://developers.google.com/sheets/api) for integrating with Google Sheets.
