<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
            <div>
                <button class="btn btn-outline-secondary">🔔</button>
            </div>
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
                  <a href="complain_form.html">
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
                  <a href="donation_form.html">
                    <img src="{{ asset('frontend/image/Donate to  an Organization.png') }}" alt="Donate">
                   
                  </a>
                </div>
            </div>

            <div class="col-md-3 col-6 mb-4">
              <div class="card p-3">
                <a href="track.html">
                  <img src="{{ asset('frontend/image/Garbage Truck Track.png') }}" alt="Donate">
                 
                </a>
              </div>
          </div>

          <div class="col-md-3 col-6 mb-4">
            <div class="card p-3">
              <a href="track.html">
                <img src="{{ asset('frontend/image/Collection Point Nearby.png') }}" alt="Donate">
                
              </a>
            </div>
        </div>

        <div class="col-md-3 col-6 mb-4">
          <div class="card p-3">
            <a href="collection_schedule.html">
              <img src="{{ asset('frontend/image/Garbage  Collection Schedule.png') }}" alt="Donate">
             
            </a>
          </div>
      </div>
        </div>
        
        <nav class="navbar navbar-expand navbar-light bg-light fixed-bottom">
            <div class="container d-flex justify-content-around">
                <a href="profile.html" class="nav-link text-success">Home</a>
                <a href="complain_form.html" class="nav-link">Complaint</a>
                <a href="#" class="nav-link">Profile</a>
            </div>
        </nav>
    </div>
</body>
</html>