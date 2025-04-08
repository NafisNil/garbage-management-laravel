<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clean City - OTP Verification</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #fff;
        }
        .otp-container {
            text-align: center;
            width: 100%;
            max-width: 400px;
        }
        .otp-input {
            width: 50px;
            height: 50px;
            text-align: center;
            font-size: 24px;
            margin: 5px;
            border: 1px solid #ced4da;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="otp-container">
       
        <h2 class="mb-3">OTP Request</h2>
        <p class="text-muted">Enter below OTP</p>
        <p class="text-muted">Your OTP : {{$user->otp}}</p>
        @include('frontend.sessionMsg')
        @php
            $generate_otp = $user->otp;
        @endphp
        <form action="{{ route('otp_form_store') }}" method="post" id="otpForm">
            @csrf
            <input type="hidden" value="{{ $user->id }}" name="user_id">
            <input type="hidden" id="otp" name="otp">
        

            <div class="d-flex justify-content-center">
                <input type="text" maxlength="1" class="otp-input form-control" id="otp1" oninput="moveToNext(this, 'otp2')">
                <input type="text" maxlength="1" class="otp-input form-control" id="otp2" oninput="moveToNext(this, 'otp3')">
                <input type="text" maxlength="1" class="otp-input form-control" id="otp3" oninput="moveToNext(this, 'otp4')">
                <input type="text" maxlength="1" class="otp-input form-control" id="otp4" oninput="moveToNext(this, null)">
            </div>
            <button type="submit" class="btn btn-success mt-4 w-100" onclick="setOtpValue()">Verify</button>
        </form>
    </div>
    <script>
        function moveToNext(current, nextFieldID) {
            if (current.value.length >= current.maxLength) {
                if (nextFieldID) {
                    document.getElementById(nextFieldID).focus();
                }
            }
        }

        function setOtpValue() {
            const otp1 = document.getElementById('otp1').value;
            const otp2 = document.getElementById('otp2').value;
            const otp3 = document.getElementById('otp3').value;
            const otp4 = document.getElementById('otp4').value;
            const otp = otp1 + otp2 + otp3 + otp4;
            document.getElementById('otp').value = otp;
        }
    </script>
</body>
</html>