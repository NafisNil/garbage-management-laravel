
<div class="d-flex align-items-center mb-4">
    <div class="profile-img me-3"><img src="{{(!empty(@Auth::user()->logo))?URL::to('storage/'.@Auth::user()->logo):URL::to('image/no_image.png')}}" alt="{{ @Auth::user()->name }}" style="border-radius: 45%"></div>
    <div>
        <h5>{{ @Auth::user()->name }}</h5>
        <p class="text-muted">{{ @Auth::user()->phone }}</p>
    </div>

    <div class="float-right justify-content-right">
        <button class="btn btn-outline-secondary">🔔</button>
    </div>
</div>