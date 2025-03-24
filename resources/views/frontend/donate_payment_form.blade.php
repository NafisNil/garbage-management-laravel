<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Donation Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .profile-container {
            padding: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .profile-picture {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background-color: #ddd;
            overflow: hidden;
        }
        .profile-picture img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .profile-name {
            font-size: 18px;
            font-weight: bold;
        }
        .profile-number {
            font-size: 14px;
            color: gray;
        }
        .form-container {
            padding: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .donation-input {
            background-color: #f0fff0;
            border: 1px solid #90ee90;
            padding: 10px;
            border-radius: 5px;
            font-style: italic;
            color: #333;
        }
        .proceed-btn {
            width: 100%;
            background-color: #4caf50;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
        }
        .proceed-btn:active {
            background-color: #388e3c;
        }
    </style>
</head>
<body>
<div class="p-3">
@include('frontend.layouts.profile_info')
</div>
<form action="{{ route('donate_store') }}" method="POST">
    {{ csrf_field() }}

<div class="form-container">
    <div class="form-group">
        <label for="organization">Select Organization</label>
        <div class="dropdown text-left">
          <button class="btn btn-light dropdown-toggle form-control" type="button" id="organizationDropdown" data-bs-toggle="dropdown" aria-expanded="false">
            Select Organization
          </button>
          <ul class="dropdown-menu dropdown-menu-start" aria-labelledby="organizationDropdown">
            <li class="p-2">
              <div class="input-group">
                <span class="input-group-text"><i class="bi bi-search"></i></span>
                <input type="text" class="form-control" placeholder="Search..." id="organizationSearch">
              </div>
            </li>
            <li><hr class="dropdown-divider"></li>
            @foreach ($organizations as $item)
              <li><a class="dropdown-item" href="#" data-value="{{ $item->name }}">{{ $item->name }}</a></li>
            @endforeach
          </ul>
          <input type="hidden" name="organization_id" id="selectedOrganization" value="">
        </div>
      </div>
      
    <div class="form-group">
        <label for="amount">Donation Amount</label>
        <input type="text" id="amount" class="form-control donation-input" placeholder="Enter bill amount" name="amount">
        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
    </div>

   <a href="donate_confirmation.html"><button class="proceed-btn">Proceed</button></a> 
</div>
</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
      const searchInput = document.getElementById('organizationSearch');
      const dropdownItems = document.querySelectorAll('.dropdown-item');
      const dropdownButton = document.getElementById('organizationDropdown');
      const selectedOrgInput = document.getElementById('selectedOrganization');
  
      searchInput.addEventListener('input', function() {
        const searchTerm = searchInput.value.toLowerCase();
  
        dropdownItems.forEach(item => {
          const itemText = item.textContent.toLowerCase();
          if (itemText.includes(searchTerm)) {
            item.style.display = '';
          } else {
            item.style.display = 'none';
          }
        });
      });
  
      dropdownItems.forEach(item => {
        item.addEventListener('click', function(e) {
          e.preventDefault();
          const selectedValue = this.getAttribute('data-value');
          dropdownButton.textContent = selectedValue;
          selectedOrgInput.value = selectedValue; // Store the selected value
        });
      });
    });
  </script>
</body>
</html>
