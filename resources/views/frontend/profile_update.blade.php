<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Information</title>
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
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            width: 100%;
        }
        .profile-img {
            display: block;
            margin: 0 auto;
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background-color: #4CAF50;
            position: relative;
            background-size: cover;
            background-position: center;
        }
        .edit-icon {
            position: absolute;
            bottom: 0;
            right: 0;
            background: white;
            border-radius: 50%;
            padding: 5px;
            cursor: pointer;
        }
        .form-control {
            background: #f8f9fa;
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
    <div class="container text-center">
        <div class="d-flex justify-content-end">
            <a  href="{{ route('user_dashboard') }}" class="btn btn-outline-secondary btn-sm mb-3">Save later</a>
        </div>
        @include('frontend.sessionMsg')
        <form action="{{ route('profile_update_store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="position-relative d-inline-block">
                <div class="profile-img" id="profileImg" style="background-image: url('{{ Auth::user()->logo ? asset('storage/' . Auth::user()->logo) : '' }}');"></div>
                <div class="edit-icon" onclick="document.getElementById('profileImageInput').click();">✏️</div>
                <input type="file" id="profileImageInput" style="display: none;" accept="image/*" name="logo" onchange="loadFile(event)">
            </div>
            <p class="mt-2">{{ Auth::user()->phone }}</p>
        
            <div class="mb-3 text-start">
                <label class="form-label">Full Name</label>
                <input type="text" class="form-control" name="name" placeholder="Enter Name" value="{{ old('name', Auth::user()->name == 'user' ? '':Auth::user()->name) }}">
            </div>
            <hr>
            <h5 class="text-start">Address</h5>
            <div class="row g-2">
                <div class="col-md-6">
                    <label class="form-label">City Corporation</label>
                    <input type="text" class="form-control" placeholder="North/South" name="city_corporation" value="{{ old('city_corporation', Auth::user()->city_corporation) }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Thana</label>
                    <input type="text" class="form-control" placeholder="Enter thana" name="thana" value="{{ old('thana', Auth::user()->thana) }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Ward</label>
                    <input type="text" class="form-control" placeholder="Enter Ward Number" name="ward" value="{{ old('ward', Auth::user()->ward) }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Road</label>
                    <input type="text" class="form-control" placeholder="Enter Road No" name="road" value="{{ old('road', Auth::user()->road) }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">House</label>
                    <input type="text" class="form-control" placeholder="Enter House No" name="house" value="{{ old('house', Auth::user()->house) }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Flat</label>
                    <input type="text" class="form-control" placeholder="Enter Flat Number" name="flat" value="{{ old('flat', Auth::user()->flat) }}">
                </div>
            </div>
           <a href="profile.html"><button type="submit" class="btn btn-custom mt-3">Save</button></a> 
        </form>
    </div>
    <script>
        function loadFile(event) {
            var output = document.getElementById('profileImg');
            output.style.backgroundImage = "url(" + URL.createObjectURL(event.target.files[0]) + ")";
        }
    </script>
</body>
</html>