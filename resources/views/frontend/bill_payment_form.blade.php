<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bill Payment Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            max-width: 600px;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .profile-img {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background-color: #4CAF50;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            color: white;
        }
        .btn-custom {
            background-color: #4CAF50;
            color: white;
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        @include('frontend.layouts.profile_info')
        @php
            $current_year = date('Y');
        @endphp
        <form action="{{ route('bill_store') }}" method="POST">
            @csrf
            @include('frontend.sessionMsg')
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
            <div class="mb-3">
                <label class="form-label">Bill Month</label>
                <div class="row">
                    <div class="col-md-6">
                        <select class="form-select" name="month" required>
                            <option selected  value="January">January</option>
                            <option value="February">February</option>
                            <option value="March">March</option>
                            <option value="April">April</option>
                            <option value="May">May</option>
                            <option value="June">June</option>
                            <option value="July">July</option>
                            <option value="August">August</option>
                            <option value="September">September</option>
                            <option value="October">October</option>
                            <option value="November">November</option>
                            <option value="December">December</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <select class="form-select" name="year" required>
                            <option value="{{ $current_year }}" selected>{{ $current_year }}</option>
                            <option value="{{ $current_year - 1 }}">{{ $current_year - 1 }}</option>
                      
                        </select>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Bill Amount</label>
                <input type="text" class="form-control" placeholder="Enter bill amount" name="amount" required>
            </div>

        <button type="submit" class="btn btn-custom">Proceed</button>
        </form>
    </div>
</body>
</html>