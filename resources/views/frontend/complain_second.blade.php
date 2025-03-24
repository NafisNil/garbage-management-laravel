<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Complaint Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            background-color: #f8f9fa;
        }
        .call-btn {
            background-color: #4caf50;
            color: white;
            border-radius: 20px;
            padding: 8px 15px;
            font-size: 14px;
            border: none;
        }
        .call-btn i {
            margin-left: 5px;
        }
        .form-control {
            background-color: #f8f9fa;
            border: 1px solid #ccc;
        }
        .attachment {
            color: green;
            cursor: pointer;
        }
        .btn-done {
            width: 100%;
            background-color: #4caf50;
            border: none;
            color: white;
            padding: 12px;
            font-size: 16px;
        }
        .nav-icons {
            font-size: 20px;
            color: #6c757d;
        }
        .nav-item.active .nav-icons {
            color: #28a745;
        }
    </style>
</head>
<body>

<div class="container mt-3">
    <div class="d-flex justify-content-between align-items-center">
        <h5>Address</h5>
        <button class="call-btn">Want to Call? <i class="fas fa-phone"></i></button>
    </div>

    <hr class="text-success">
    <form action="{{ route('complain_update') }}" method="post" enctype="multipart/form-data">
        @csrf
    <div class="row">
        <div class="col-6">
            <label class="form-label">City Corporation</label>
            <input type="text" class="form-control" placeholder="North" name="city_corporation" value="{{ old('city_corporation') }}">
        </div>
        <div class="col-6">
            <label class="form-label">Thana</label>
            <input type="text" class="form-control" placeholder="Thana Name" name="thana" value="{{ old('thana') }}">
        </div>
    </div>

    <div class="row mt-2">
        <div class="col-6">
            <label class="form-label">Ward</label>
            <input type="text" class="form-control" placeholder="05" name="ward" value="{{ old('ward') }}">
        </div>
        <div class="col-6">
            <label class="form-label">Road</label>
            <input type="text" class="form-control" placeholder="17" name="road"   value="{{ old('road') }}">
        </div>
    </div>

    <div class="row mt-2">
        <div class="col-6">
            <label class="form-label">House</label>
            <input type="text" class="form-control" placeholder="10/A" name="house" value="{{ old('house') }}">
            <input type="hidden" name="complain_id" value="{{ $complain->id }}">
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
        </div>
        <div class="col-6">
            <label class="form-label">Flat</label>
            <input type="text" class="form-control" placeholder="4B" name="flat"    value="{{ old('flat') }}">
        </div>
    </div>


    <div class="mt-2">
        <label class="form-label">Anything Others to Remark?</label>
        <textarea class="form-control" rows="3" placeholder="Write about detail complaint" name="others">{{old('others')}}</textarea>
    </div>

    <div class="mt-3">
        <span class="text-success">Attachment files:</span>
        <i class="fas fa-paperclip attachment" id="attachmentIcon"></i>
        <span id="fileName" class="text-muted"></span>
        <input type="file" class="form-control" name="logo" id="logo" style="display: none;">
    </div>

   <button type="submit" class="btn btn-outline-success btn-done">Done</button>
</div>
</form>

<!-- Bottom Navigation -->
<nav class="navbar fixed-bottom navbar-light bg-white border-top">
    <div class="container d-flex justify-content-around">
        <div class="nav-item">
            <a href="{{ route('user_dashboard') }}" class="text-success">
            <i class="fas fa-home nav-icons"></i>
            <p class="small text-muted">Home</p>
        </a>
        </div>
        <div class="nav-item active">
            <a href="{{ route('complain_first') }}" class="text-success">
            <i class="fas fa-exclamation-circle nav-icons"></i>
            <p class="small">Complaint</p>
            </a>
        </div>
        <div class="nav-item">
            <i class="fas fa-user nav-icons"></i>
            <p class="small text-muted">Profile</p>
        </div>
    </div>
</nav>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.getElementById('attachmentIcon').addEventListener('click', function() {
        document.getElementById('logo').click();
    });

    document.getElementById('logo').addEventListener('change', function() {
        const fileName = this.files[0].name;
        document.getElementById('fileName').textContent = fileName;
    });
</script>

</body>
</html>
