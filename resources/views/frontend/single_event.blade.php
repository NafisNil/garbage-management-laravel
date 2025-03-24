<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Event Details - {{$event->title}}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .profile-container {
            padding: 20px;
        }
        .profile-header {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .profile-picture {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background-color: #4caf50;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 24px;
        }
        .profile-name {
            font-size: 18px;
            font-weight: bold;
        }
        .profile-number {
            font-size: 14px;
            color: gray;
        }
        .complaint-card {
            background-color: #d6f5d6;
            border-radius: 10px;
            padding: 15px;
            border: 1px solid #90ee90;
            margin-top: 10px;
        }
        .complaint-title {
            font-weight: bold;
            color: #228b22;
        }
        .complaint-date {
            float: right;
            font-size: 14px;
            color: gray;
        }
        .bottom-nav {
            position: fixed;
            bottom: 0;
            width: 100%;
            background-color: white;
            display: flex;
            justify-content: space-around;
            padding: 10px 0;
            border-top: 1px solid #ddd;
        }
        .bottom-nav a {
            text-align: center;
            color: black;
            text-decoration: none;
            font-size: 14px;
        }
        .bottom-nav a i {
            display: block;
            font-size: 20px;
            margin-bottom: 2px;
        }
    </style>
</head>
<body>

<div class="profile-container">
    @include('frontend.layouts.profile_info')

    <div class="complaint-card">
        <div>
            <span class="complaint-title">{{$event->title}}</span>
            <span class="complaint-date">{{ \Carbon\Carbon::parse($event->date)->format('d F, Y') }}</span>
        </div>
        <p>
            {!! $event->description !!}
        </p>
    </div>
</div>

@include('frontend.layouts.bottom_nav')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
