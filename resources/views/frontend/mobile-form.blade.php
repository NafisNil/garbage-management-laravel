<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In - Clean City</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .card {
            padding: 40px;
            width: 400px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }
        .btn-custom {
            width: 100%;
            padding: 10px;
            font-size: 18px;
        }
    </style>
</head>
<body>
    <div class="card">
      
        <h2 class="text-center text-success">Sign In</h2>
        @include('frontend.sessionMsg')
        <form action="{{ route('mobile_form_store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="mobileNumber" class="form-label text-muted">Enter Mobile Number</label>
                <input type="text" name="phone" class="form-control" id="mobileNumber" placeholder="Enter your mobile number(01XXXXXXXXX)">
            </div>
            <button type="submit" class="btn btn-success btn-custom">Send OTP</button>
        </form>
    </div>
</body>
</html>
