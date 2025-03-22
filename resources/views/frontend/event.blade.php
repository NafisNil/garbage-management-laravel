<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Event Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .profile-container {
            text-align: left;
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
        .card-container {
            margin-top: 10px;
        }
        .custom-card {
            border-radius: 10px;
            overflow: hidden;
            margin-bottom: 10px;
        }
        .custom-card img {
            width: 100%;
            height: auto;
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

    <div class="card-container">
        @foreach ($event as $item)
        <div class="custom-card mb-3">
            <a href="event_details.html">
            <img src="{{(!empty($item->logo))?URL::to('storage/'.$item->logo):URL::to('image/no_image.png')}}" alt="{{ $item->title }}">
           </a>
        </div>
        @endforeach


    </div>
</div>

<div class="bottom-nav">
    <a href="profile.html"><i class="fas fa-home"></i>Home</a>
    <a href="complain_form.html"><i class="fas fa-exclamation-circle"></i>Complaint</a>
    <a href="#"><i class="fas fa-user"></i>Profile</a>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
