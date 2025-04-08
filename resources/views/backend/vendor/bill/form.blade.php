@include('backend.sessionMsg')
<div class="card-body">
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Full Name" value="{!! old('name', @$user->name) !!}">
    </div>

    <div class="form-group">
        <label for="mobile">Mobile Number</label>
        <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Mobile Number" value="{!! old('mobile', @$user->phone) !!}">
        <input type="hidden" name="vendor_id" value="{{ Auth::user()->id }}">
    </div>

    <div class="form-group">
        <label for="email">Email (optional)</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="example@gmail.com" value="{!! old('email', @$user->email) !!}">
    </div>

    <hr>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="city_corporation">City Corporation</label>
                <input type="text" class="form-control" id="city_corporation" name="city_corporation" placeholder="North" value="{!! old('city_corporation', @$user->city_corporation) !!}">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="thana">Thana</label>
                <input type="text" class="form-control" id="thana" name="thana" placeholder="Thana Name" value="{!! old('thana', @$user->thana) !!}">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="ward">Ward</label>
                <input type="text" class="form-control" id="ward" name="ward" placeholder="05" value="{!! old('ward', @$user->ward) !!}">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="road">Road</label>
                <input type="text" class="form-control" id="road" name="road" placeholder="17" value="{!! old('road', @$user->road) !!}">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="house">House</label>
                <input type="text" class="form-control" id="house" name="house" placeholder="10/A" value="{!! old('house', @$user->house) !!}">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="flat">Flat</label>
                <input type="text" class="form-control" id="flat" name="flat" placeholder="4B" value="{!! old('flat', @$user->flat) !!}">
            </div>
        </div>
    </div>

    <hr>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="bill_month">Bill Month</label>
                <select class="form-control" id="bill_month" name="month">
                    <option>Select Month</option>
                    <option value="January" {{ old('month', @$edit->month) == 'January' ? 'selected' : '' }}>January</option>
                    <option value="February" {{ old('month', @$edit->month) == 'February' ? 'selected' : '' }}>February</option>
                    <option value="March" {{ old('month', @$edit->month) == 'March' ? 'selected' : '' }}>March</option>
                    <option value="April" {{ old('month', @$edit->month) == 'April' ? 'selected' : '' }}>April</option>
                    <option value="May" {{ old('month', @$edit->month) == 'May' ? 'selected' : '' }}>May</option>
                    <option value="June" {{ old('month', @$edit->month) == 'June' ? 'selected' : '' }}>June</option>
                    <option value="July" {{ old('month', @$edit->month) == 'July' ? 'selected' : '' }}>July</option>
                    <option value="August" {{ old('month', @$edit->month) == 'August' ? 'selected' : '' }}>August</option>
                    <option value="September" {{ old('month', @$edit->month) == 'September' ? 'selected' : '' }}>September</option>
                    <option value="October" {{ old('month', @$edit->month) == 'October' ? 'selected' : '' }}>October</option>
                    <option value="November" {{ old('month', @$edit->month) == 'November' ? 'selected' : '' }}>November</option>
                    <option value="December" {{ old('month', @$edit->month) == 'December' ? 'selected' : '' }}>December</option>
                    <!-- Add other months -->
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="bill_year">Bill Year</label>
                <select class="form-control" id="bill_year" name="year">
                    <option>Select Year</option>
                    @for ($year = now()->year; $year >= 2024; $year--)
                        <option value="{{ $year }}" {{ old('year', @$edit->year) == $year ? 'selected' : '' }}>{{ $year }}</option>
                    @endfor
                </select>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label for="bill_amount">Bill Amount</label>
        <input type="number" class="form-control" id="bill_amount" name="amount" placeholder="Enter Bill Amount" value="{!! old('amount', @$edit->amount) !!}">
    </div>
</div>

<div class="card-footer">
    <button type="submit" class="btn btn-primary">Submit</button>
</div>




