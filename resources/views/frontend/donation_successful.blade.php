<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Donation Confirmation</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .profile-pic {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background-color: #4caf50;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 24px;
            color: white;
        }
        .card {
            border-color: #4caf50;
        }
        .rating i {
            font-size: 24px;
            cursor: pointer;
        }
        .rating i:hover,
        .rating i.active {
            color: #ffc107;
        }
        .btn-done {
            width: 100%;
            background-color: #4caf50;
            border: none;
        }
    </style>
</head>
<body>

<div class="container mt-4">
    <div class="d-flex align-items-center">
        @include('frontend.layouts.profile_info')
        
    </div>

    <div class="card mt-3">
        <div class="card-body">
            <h6>Donation amount</h6>
            <h4 class="text-success fw-bold">{{ $donation->amount }} TK <span class="text-muted fs-6">Paid</span></h4>
            <p class="mb-1">Paid by  : </p>
            <p class="mb-1">Payment Date: <span class="text-success">{{ $donation->created_at->format('d M, Y') }}</span></p>
            <p>Transaction ID: <span class="text-success"></span></p>
        </div>
    </div>

    <div class="text-center mt-4">
        <p>Please rate our service</p>
        <div class="rating">
            <i class="far fa-star" onclick="rate(1)"></i>
            <i class="far fa-star" onclick="rate(2)"></i>
            <i class="far fa-star" onclick="rate(3)"></i>
            <i class="far fa-star" onclick="rate(4)"></i>
            <i class="far fa-star" onclick="rate(5)"></i>
        </div>
    </div>

   <a href="{{ route('user_dashboard') }}"><button class="btn btn-done mt-4 py-2 text-white">Done</button></a> 
</div>

<script>
    function rate(stars) {
        let starsList = document.querySelectorAll('.rating i');
        starsList.forEach((star, index) => {
            star.classList.remove('fas', 'active');
            star.classList.add(index < stars ? 'fas' : 'far');
        });
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
