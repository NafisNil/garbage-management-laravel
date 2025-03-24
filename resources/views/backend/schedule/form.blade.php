
@include('backend.sessionMsg')
<div class="card-body">





  <div class="form-group">
    <label for="exampleInputEmail1">Day <span style="color:red" >*</span></label>

    <select name="day" id="" class="form-control">
       <option value="Saturday">Saturday</option>
       <option value="Sunday">Sunday</option>
       <option value="Monday">Monday</option>
       <option value="Tuesday">Tuesday</option>
       <option value="Wednesday">Wednesday</option>
       <option value="Thursday">Thursday</option>
       <option value="Friday">Friday</option>
    </select>

  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Date <span style="color:red" >*</span></label>

    <input type="date"  class="form-control" name="date"  value="{!!old('date',@$edit->date)!!}">

  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Time <span style="color:red" >*</span></label>

    <input type="time"  class="form-control" name="time"  value="{!!old('date',@$edit->time)!!}">

  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Status <span style="color:red" >*</span></label>

    <select name="status" id="" class="form-control">
       <option value="1">Done</option>
       <option value="0">Not Arrived</option>
      
    </select>

  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Organization <span style="color:red" >*</span></label>

    <select name="organization_id" id="" class="form-control">
      @foreach ($organization as $item)
      <option value="{{ $item->id }}">{{ $item->name }}</option>
      @endforeach
       
      
    </select>

  </div>

  



</div>
<!-- /.card-body -->

<div class="card-footer">
  <button type="submit" class="btn btn-primary">Submit</button>
</div>






