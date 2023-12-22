<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your IP Has been logged into our database.</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f0f0;
            text-align: center;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333;
        }

        p {
            color: #666;
        }

        #message {
            color: #ff5050;
            font-weight: bold;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Geolocation Information</h1>

        <?php
        // Get IP address
        $ipAddress = $_SERVER['REMOTE_ADDR'];

        // Use ipinfo.io to get geolocation information
        $url = "http://ipinfo.io/{$ipAddress}/json";
        $response = file_get_contents($url);
        $data = json_decode($response);

        // Extract location data
        $location = $data->city . ', ' . $data->region . ', ' . $data->country;
        $coordinates = $data->loc;
        ?>

        <p><strong>IP Address:</strong> <?php echo $ipAddress; ?></p>
        <p><strong>Location:</strong> <?php echo $location; ?></p>
        <p><strong>Coordinates:</strong> <?php echo $coordinates; ?></p>
        <p id="message">Next time, be more careful nerd.</p>
    </div>
</body>
</html>
