<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Complaint Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
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
    
    <p><strong>Waste Types</strong><br> Household Waste</p>

    <p><strong>Address</strong><br> H#301, Lane 6, Road 10, Avn 5, Mirpur 11, Uttar City Corp...</p>

    <p><strong>Message</strong><br> Roads are blocked for trash people can't breathe. Please...</p>

    <p><strong>Status</strong></p>

    <div class="status-step">
        <div class="status-icon"><i class="fas fa-user-check"></i></div>
        <div>
            @if ($complain->status == '0') 
            Pending 
            @elseif ($complain->status == '1')
             Assigned to the vendor
             @elseif ($complain->status == '2')
             Resolved by the vendor
              @endif
            </div>
            
        @endif
    </div>
    </div>

  
        <div class="status-icon"><i class="fas fa-check-circle"></i></div>
        <div>Resolved by the Vendor</div>
