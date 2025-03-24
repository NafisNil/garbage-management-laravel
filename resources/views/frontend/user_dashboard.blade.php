<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .profile-img {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background-color: #ddd;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .card img {
            max-width: 100px;
            margin: auto;
        }
        @media (max-width: 767.98px) {
            .card {
                flex: 0 0 48%;
                margin: 1%;
            }
            .col-6 {
                flex: 0 0 48%;
                max-width: 48%;
                margin: 1%;
            }
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center">
            @include('frontend.layouts.profile_info')

        </div>
        
        <div class="my-4 p-4 bg-light text-center" style="background:url({{ asset('frontend/image/banner.png') }});background-repeat: round;
  background-size: auto; height:120px;">
            
        </div>

        <div class="row text-center">
            <div class="col-md-3 col-6 mb-4">
                <div class="card p-3">
                  <a href="{{ route('bill_payment_form') }}">
                    <img src="{{ asset('frontend/image/Bill Payment.png') }}" alt="Bill Payment">
                    
                  </a>
                </div>
            </div>
            <div class="col-md-3 col-6 mb-4">
                <div class="card p-3">
                  <a href="{{ route('complain_first') }}">
                    <img src="{{ asset('frontend/image/Complaint.png') }}" alt="Complaint">
                 
                  </a>
                </div>
            </div>
            <div class="col-md-3 col-6 mb-4">
                <div class="card p-3">
                  <a href="{{ route('event.all') }}">
                    <img src="{{ asset('frontend/image/Event.png') }}" alt="Event">
                  
                  </a>
                </div>
            </div>
            <div class="col-md-3 col-6 mb-4">
                <div class="card p-3">
                  <a href="{{ route('donate_payment_form') }}">
                    <img src="{{ asset('frontend/image/Donate to  an Organization.png') }}" alt="Donate">
                   
                  </a>
                </div>
            </div>

            <div class="col-md-3 col-6 mb-4">
              <div class="card p-3">
                <a href="#">
                  <img src="{{ asset('frontend/image/Garbage Truck Track.png') }}" alt="Donate">
                 
                </a>
              </div>
          </div>

          <div class="col-md-3 col-6 mb-4">
            <div class="card p-3">
              <a href="#">
                <img src="{{ asset('frontend/image/Collection Point Nearby.png') }}" alt="Donate">
                
              </a>
            </div>
        </div>

        <div class="col-md-3 col-6 mb-4">
          <div class="card p-3">
            <a href="{{ route('weekly_schedule') }}">
              <img src="{{ asset('frontend/image/Garbage  Collection Schedule.png') }}" alt="Donate">
             
            </a>
          </div>
      </div>
        </div>
        
        <nav class="navbar navbar-expand navbar-light bg-light fixed-bottom">
            <div class="container d-flex justify-content-around">
                <a href="{{ route('user_dashboard') }}" class="nav-link text-success">  <i class="fas fa-home"></i>Home</a>
                <a href="{{ route('complain_first') }}" class="nav-link"><i class="fas fa-exclamation-circle"></i>Complaint</a>
                <a href="#" class="nav-link"> <i class="fas fa-user"></i>Profile</a>
            </div>
        </nav>
    </div>
</body>
</html>