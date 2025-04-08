<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Vendor Registration</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    body {
      background-color: #fff;
    }
    .form-container {
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
    }
    .brand-logo {
      position: absolute;
      top: 20px;
      left: 20px;
      display: flex;
      align-items: center;
      gap: 8px;
    }
    .brand-logo img {
      height: 30px;
    }
    .form-box {
      width: 100%;
      max-width: 400px;
      padding: 20px;
    }
    .form-title {
      font-weight: 700;
      color: #0c3d1f;
      margin-bottom: 30px;
      text-align: center;
    }
    .btn-submit {
      background-color: #029c3f;
      color: white;
      font-weight: 500;
    }
    .btn-submit:hover {
      background-color: #027b34;
    }
    .login-link {
      text-align: center;
      margin-top: 10px;
    }
    .login-link a {
      color: #029c3f;
      font-weight: 600;
      text-decoration: none;
    }
  </style>
</head>
<body>

<div class="form-container">
  <div class="brand-logo">
    <img src="https://via.placeholder.com/30" alt="Logo" />
    <span class="fw-bold">CleanCycle</span>
  </div>

  <div class="form-box">
    <h2 class="form-title">Vendor Registration</h2>
    <form>
      <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" id="name" class="form-control" placeholder="Enter your name" required>
      </div>

      <div class="mb-3">
        <label for="mobile" class="form-label">Mobile Number</label>
        <input type="tel" id="mobile" class="form-control" placeholder="Enter mobile number" required>
      </div>

      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" id="email" class="form-control" placeholder="Enter email" required>
      </div>

      <div class="mb-3">
        <label for="area" class="form-label">Area</label>
        <input type="text" id="area" class="form-control" placeholder="Enter area" required>
      </div>

      <button type="submit" class="btn btn-submit w-100">Send Request to Authority</button>
    </form>

    <div class="login-link">
      Already have access? <a href="#">Login</a>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
