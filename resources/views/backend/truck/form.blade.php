
@include('backend.sessionMsg')
<div class="card-body">





  <div class="form-group">
    <label for="exampleInputEmail1">Name <span style="color:red" >*</span></label>

    <input type="text"  class="form-control" name="name"  value="{!!old('name',@$edit->name)!!}">

  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Area <span style="color:red" >*</span></label>

    <input type="text"  class="form-control" name="area"  value="{!!old('area',@$edit->area)!!}">

  </div>



</div>
<!-- /.card-body -->

<div class="card-footer">
  <button type="submit" class="btn btn-primary">Submit</button>
</div>






