<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Schedule Management</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .search-bar {
            margin: 10px;
            display: flex;
            align-items: center;
            border: 1px solid #28a745;
            border-radius: 25px;
            padding: 5px 10px;
            background-color: white;
        }
        .search-bar input {
            border: none;
            outline: none;
            width: 100%;
        }
        .search-bar i {
            color: #28a745;
            cursor: pointer;
        }
        .schedule-container {
            padding: 10px;
        }
        .schedule-box {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px;
            margin: 5px 0;
            border-radius: 8px;
            background-color: white;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
        }
        .today {
            background-color: #28a745;
            color: white;
        }
        .not-arriving {
            background-color: #f8d7da;
            color: #721c24;
        }
        .status-icon {
            font-size: 18px;
        }
        .status-icon.success {
            color: #28a745;
        }
        .status-icon.failed {
            color: #dc3545;
        }
        .bottom-menu {
            position: fixed;
            bottom: 0;
            width: 100%;
            background-color: white;
            padding: 10px;
            display: flex;
            justify-content: space-around;
            box-shadow: 0px -2px 5px rgba(0, 0, 0, 0.1);
        }
        .bottom-menu div {
            text-align: center;
            font-size: 14px;
        }
        .bottom-menu i {
            font-size: 20px;
            margin-bottom: 5px;
        }
    </style>
</head>
<body>

<div class="search-bar m-3">
    <input type="text" placeholder="Search by location">
    <i class="fas fa-search"></i>
</div>

<div class="schedule-container m-3">
    <h5>Current Schedule</h5>
    @foreach ($schedule as $item)
    
    @if (\Carbon\Carbon::parse($item->date)->isSameDay(\Carbon\Carbon::today()))
    <div class="schedule-box today">
        <div>
            <strong>Today</strong>
            <p>{{ \Carbon\Carbon::parse($item->date)->format('d F, Y') }} . {{\Carbon\Carbon::parse($item->time)->format('H:i A')}}  </p>
        </div>
        <strong>{{ $item->organization->name }}</strong>
        @if ($item->status == 0)
        <i class="fas fa-circle-xmark status-icon warning"></i>
        @elseif ($item->status == 1)
        <i class="fas fa-check-circle status-icon success"></i>
        @endif
    </div>
    @endif

    @endforeach


    <h5>Week Schedule</h5>
    @foreach ($schedule as $item)
    @if (!\Carbon\Carbon::parse($item->date)->isSameDay(\Carbon\Carbon::today()))
    <div class="schedule-box">
        <div>
            <strong>{{ $item->day }}</strong>
            <p>{{ \Carbon\Carbon::parse($item->date)->format('d F, Y') }} . {{\Carbon\Carbon::parse($item->time)->format('H:i A')}}  </p>
        </div>
        <strong>{{ $item->organization->name }}</strong>
        @if ($item->status == 0)
        <i class="fas fa-circle-xmark status-icon warning"></i>
        @elseif ($item->status == 1)
        <i class="fas fa-check-circle status-icon success"></i>
        @endif

    </div>
    @endif
    @endforeach



</div>

<div class="bottom-menu">
    <div>
        <a href="{{ route('user_dashboard') }}">
        <i class="fas fa-home"></i>
        <p>Home</p>
    </a>
    </div>
    <div>
        <a href="#">
        <i class="fas fa-exclamation-circle"></i>
        <p>Complaint</p>
        </a>
    </div>
    <div>
        <i class="fas fa-user"></i>
        <p>Profile</p>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
