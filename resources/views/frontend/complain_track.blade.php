<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Complaint Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .status-step {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }
        .status-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: #28a745;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            margin-right: 10px;
        }
        .status-step.pending .status-icon {
            background-color: #ddd;
            color: black;
        }
        .status-line {
            width: 2px;
            height: 30px;
            background-color: #28a745;
            margin-left: 19px;
        }
        .status-step.pending .status-line {
            background-color: #ddd;
        }
        .assign-btn {
            border: 2px solid #28a745;
            color: #28a745;
            background: none;
            padding: 10px;
            width: 100%;
            border-radius: 10px;
            font-weight: bold;
            cursor: pointer;
        }
        .assign-btn:hover {
            background-color: #28a745;
            color: white;
        }
    </style>
</head>
<body>

<div class="container mt-3">
    <h5><i class="fas fa-arrow-left"></i> Complaint Details</h5>

    @php
    $currentYear = \Carbon\Carbon::now()->year;
@endphp
    <p class="mt-3"><strong>Complain Number</strong><br>
        <span style="color: #28a745; font-weight: bold;">#CC{{ $complain->id }}{{$currentYear}}</span>
    </p>

    <p><strong>Complainer Name</strong><br>{{$complain->user->name}}</p>
    
    <p><strong>Waste Types</strong><br> {{ $complain->waste_type }}</p>

    <p><strong>Address</strong><br> {{ $complain->flat }}, {{ $complain->house }}, {{ $complain->road }},  {{ $complain->ward }}, {{ $complain->thana }}, {{ $complain->city_corporation }} </p>

    <p><strong>Message</strong><br> {!! $complain->others !!}</p>

    <p><strong>Status</strong></p>

    <div class="status-step">
        <div class="status-icon"><i class="fas fa-user-check"></i></div>
        @if ($complain->status == '0') 
        Pending 
        @elseif ($complain->status == '1')
         Assigned to the vendor
         @elseif ($complain->status == '2')
         Resolved by the vendor
          @endif
    </div>

   

    <button class="mt-4 assign-btn">View Assign Person</button>
    <nav class="navbar navbar-expand navbar-light bg-light fixed-bottom">
        <div class="container d-flex justify-content-around">
            <a href="{{ route('user_dashboard') }}" class="nav-link text-success">  <i class="fas fa-home"></i>Home</a>
            <a href="{{ route('complain_first') }}" class="nav-link"><i class="fas fa-exclamation-circle"></i>Complaint</a>
            <a href="#" class="nav-link"> <i class="fas fa-user"></i>Profile</a>
        </div>
    </nav>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
