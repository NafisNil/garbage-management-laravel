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
            max-width: 80px;
            margin: auto;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center">
                <div class="profile-img me-3"></div>
                <div>
                    <h5>{{ @Auth::user()->name }}</h5>
                    <p class="text-muted">01798XXXXXX</p>
                </div>
            </div>
            <div>
                <button class="btn btn-outline-secondary">🔔</button>
            </div>
        </div>
        
        <div class="my-4 p-4 bg-light text-center" style="background:url({{ asset('frontend/image/banner.png') }});background-repeat: no-repeat;
  background-size: auto;">
            
        </div>

        <div class="row text-center">
            <div class="col-md-3 mb-4">
                <div class="card p-3">
                  <a href="bill_month_select.html">
                    <img src="https://via.placeholder.com/80" alt="Bill Payment">
                    <p class="mt-2">Bill Payment</p>
                  </a>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="card p-3">
                  <a href="complain_form.html">
                    <img src="https://via.placeholder.com/80" alt="Complaint">
                    <p class="mt-2">Complaint</p>
                  </a>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="card p-3">
                  <a href="event.html">
                    <img src="https://via.placeholder.com/80" alt="Event">
                    <p class="mt-2">Event</p>
                  </a>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="card p-3">
                  <a href="donation_form.html">
                    <img src="https://via.placeholder.com/80" alt="Donate">
                    <p class="mt-2">Donate to an Organization</p>
                  </a>
                </div>
            </div>

            <div class="col-md-3 mb-4">
              <div class="card p-3">
                <a href="track.html">
                  <img src="https://via.placeholder.com/80" alt="Donate">
                  <p class="mt-2">Garbage Truck Track</p>
                </a>
              </div>
          </div>

          <div class="col-md-3 mb-4">
            <div class="card p-3">
              <a href="track.html">
                <img src="https://via.placeholder.com/80" alt="Donate">
                <p class="mt-2">Collection Point Nearby</p>
              </a>
            </div>
        </div>

        <div class="col-md-3 mb-4">
          <div class="card p-3">
            <a href="collection_schedule.html">
              <img src="https://via.placeholder.com/80" alt="Donate">
              <p class="mt-2">Garbage Collection Schedule</p>
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