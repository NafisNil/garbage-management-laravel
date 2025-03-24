<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dust Type</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .waste-card {
            border: 2px solid transparent;
            text-align: center;
            padding: 15px;
            border-radius: 10px;
            cursor: pointer;
            transition: 0.3s;
        }
        .waste-card.selected {
            border-color: green;
        }
        .waste-card img {
            width: 140px;
            height: 140px;
        }
        .next-btn {
            background-color: green;
            color: white;
            font-weight: bold;
            border: none;
            padding: 12px;
            width: 100%;
            border-radius: 10px;
        }
    </style>
</head>
<body>

<div class="container mt-3">
    <h4 class="mb-3">বর্জ্যের ধরন</h4>
    @include('frontend.sessionMsg')
    <form action="{{ route('complain_store') }}" method="POST">
        {{ csrf_field() }}
        <div class="row g-3">
            <div class="col-6">
                <div class="waste-card selected" data-alt="বসা বাড়ি বর্জ্য">
                    <img src="{{ asset('frontend/image/Frame 296.png') }}" alt="বসা বাড়ি বর্জ্য">
                </div>
            </div>
            <div class="col-6">
                <div class="waste-card" data-alt="কলকারখানার বর্জ্য">
                    <img src="{{ asset('frontend/image/Frame 297.png') }}" alt="কলকারখানার বর্জ্য">
                </div>
            </div>
            <div class="col-6">
                <div class="waste-card" data-alt="নির্মাণাধীন বর্জ্য">
                    <img src="{{ asset('frontend/image/Frame 298.png') }}" alt="নির্মাণাধীন বর্জ্য">
                </div>
            </div>
            <div class="col-6">
                <div class="waste-card" data-alt="মেডিকেল বর্জ্য">
                    <img src="{{ asset('frontend/image/Frame 299.png') }}" alt="মেডিকেল বর্জ্য">
                </div>
            </div>
            <div class="col-6">
                <div class="waste-card" data-alt="জলাবদ্ধতা (ওয়াসা)">
                    <img src="{{ asset('frontend/image/Frame 300.png') }}" alt="জলাবদ্ধতা (ওয়াসা)">
                </div>
            </div>
            <div class="col-6">
                <div class="waste-card" data-alt="জলাবদ্ধতা (উত্তর/দক্ষিণ)">
                    <img src="{{ asset('frontend/image/Frame 301.png') }}" alt="জলাবদ্ধতা (উত্তর/দক্ষিণ)">
                </div>
            </div>
        </div>
        <input type="hidden" name="waste_type" id="selectedWasteType" value="বসা বাড়ি বর্জ্য">
        <button type="submit" class="mt-4 next-btn">পরবর্তী ধাপে যান</button>
    </form>
</div>

<script>
    document.querySelectorAll('.waste-card').forEach(card => {
        card.addEventListener('click', function() {
            document.querySelectorAll('.waste-card').forEach(c => c.classList.remove('selected'));
            this.classList.add('selected');
            document.getElementById('selectedWasteType').value = this.getAttribute('data-alt');
        });
    });
</script>

</body>
</html>
