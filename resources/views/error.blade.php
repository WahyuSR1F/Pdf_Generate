<!-- resources/views/errors/500.blade.php -->
<!DOCTYPE html>
<html>

<head>
    <title>Internal Server Error</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 50px;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            text-align: center;
        }

        .error-code {
            font-size: 72px;
            margin-bottom: 40px;
        }

        .error-message {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .error-details {
            color: #888;
            font-size: 16px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="error-code">500</div>
        <div class="error-message">Internal Server Error</div>
        <div class="error-details">
            {{ $errorMessage ?? 'Sorry, something went wrong on our end. Please try again later.' }}</div>
    </div>
</body>

</html>
