<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CleanCycle - Index</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .hero-section {
            position: relative;
            text-align: center;
            color: white;
        }
        .hero-section img {
            width: 100%;
            height: 400px;
            object-fit: cover;
        }
        .overlay {
            position: absolute;
            bottom: 0;
            width: 100%;
            background: linear-gradient(transparent, white);
            height: 150px;
        }
        .content-section {
            text-align: center;
            padding: 40px;
        }
        .btn-custom {
            width: 100%;
            padding: 10px;
            font-size: 18px;
        }
        .splash-screen {
            position: fixed;
            width: 100%;
            height: 100%;
            background-color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
        }
        .splash-screen img {
            width: 130px;
            height: 70px;
        }
    </style>
</head>
<body>
    <div class="splash-screen" id="splashScreen">
        <img src="{{ asset('frontend/image/Layer_1.png') }}" alt="Logo" >
    </div>
    <div class="container mt-4">
        <div class="hero-section">
            <img src="{{(!empty($general->slider_logo))?URL::to('storage/'.$general->slider_logo):URL::to('image/no_image.png')}}" alt="Garbage Truck">
            <div class="overlay"></div>
        </div>
        
        <div class="content-section">
            <h2 class="text-success">Welcome to CleanCycle</h2>
            <p class="text-muted">Track garbage trucks in real-time, manage payments, and report issues—all in one app.</p>
            
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <button class="btn btn-success btn-custom mb-3">Create account</button>
                   <a href="{{ route('mobile_form') }}"><button class="btn btn-outline-dark btn-custom">Sign in</button></a> 
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(function() {
                document.getElementById('splashScreen').style.display = 'none';
            }, 2000); // Adjust the timeout duration as needed
        });
    </script>
</body>
</html>
