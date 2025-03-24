<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Complaint Received</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f8f9fa;
        }
        .thank-you-card {
            background: white;
            padding: 30px;
            text-align: center;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
        }
        .thank-you-card img {
            width: 200px;
            margin-bottom: 15px;
        }
        .thank-you-card h2 {
            font-weight: bold;
            margin-bottom: 10px;
        }
        .btn-track {
            background-color: #4CAF50;
            color: white;
            padding: 12px;
            border-radius: 8px;
            width: 100%;
            border: none;
            font-size: 16px;
            font-weight: bold;
        }
        .btn-track:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<div class="thank-you-card">
    <img src="https://cdn-icons-png.flaticon.com/512/4140/4140047.png" alt="Thank You">
    <h2>Thank You</h2>
    <p>Your complaint has been received.</p>
    <p>Further progress will be communicated through notifications on your mobile app.</p>
    <a href="{{ route('complain_track', $complain->id) }}">  <button class="btn-track">Track Progress</button></a>
  
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
