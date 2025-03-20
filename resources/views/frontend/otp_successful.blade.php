<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Success</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f8f9fa;
        }
        .container {
            text-align: center;
            max-width: 500px;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .illustration {
            width: 100%;
            max-width: 300px;
            margin-bottom: 20px;
        }
        .btn-custom {
            background-color: #4CAF50;
            color: white;
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            text-transform: uppercase;
        }
    </style>
</head>
<body>
    <div class="container">
        <img src="{{asset('frontend/image/image.png')}}" alt="Success Illustration" class="illustration">
        
        <a href="{{ route('profile_update') }}" class="btn btn-custom">Sign in</a>
    </div>
</body>
</html>
