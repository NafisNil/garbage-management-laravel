@extends('backend.layouts.master')
@section('title')
    Vendors - Index
@endsection
@section('content')
  <!-- Include SweetAlert CSS and JS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <section class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6 offset-3">
            <h1>Vendors</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Vendors</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container">
        <div class="row offset-1">
          <!-- left column -->
             <div class="card">
              <div class="card-header">
                <h3 class="card-title">Vendors</h3>


                {{-- <a href="{{route('bill.create')}}" class="float-right btn btn-outline-dark btn-sm mb-2"><i class="fas fa-plus-square"></i></a> --}}



              </div>
              <!-- /.card-header -->
              <div class="card-body">
                @include('backend.sessionMsg')
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Mobile</th>
                    <th>Email</th>
                    <th>Area </th>
                    <th>Created At </th>
                    <th>Status</th>
              
                    <th>Action</th>

                  </tr>
                  </thead>
                  <tbody>

                    @foreach ($vendors as $key=>$item)
                    <tr>
                      <td>{{ ++$key }}</td>
                      <td>{{$item->name}}</td>
                      <td>{{$item->phone}}</td>
                      <td>{{$item->email}}</td>
                      <td>{{$item->area}}</td>
                      <td>{{$item->created_at->format('d M, Y')}}</td>
                        <td>
                        @if ($item->status == 'pending') 
                        <span class="badge bg-secondary">Pending</span>
                           
                          @elseif ($item->status == 'approved')
                          <span class="badge bg-success">Approved</span>
                       
                            @endif
                      </td>
                      <td>
                        {{-- <a href="#" data-toggle="modal" data-target="#descriptionModal{{$key}}" class="btn btn-outline-info btn-sm" title="View Details" onclick="showDetails({{ $item }})">
                          <i class="fas fa-eye"></i>
                        </a> --}}
               
                        <button class="btn btn-outline-danger btn-sm" title="Delete" onclick="confirmDelete({{ $item->id }})"><i class="fas fa-trash"></i></button>
                        
                         <a href="{{ route('vendor.approve', $item->id) }}" class="btn btn-outline-success btn-sm">Approve</a>
                        <a href="{{ route('vendor.reject', $item->id) }}" class="btn btn-outline-warning btn-sm">Disapprove</a> 
                        
                        <form id="delete-form-{{ $item->id }}" action="{{route('vendor.delete',[$item->id])}}" method="POST" style="display:none;">
                          @method('DELETE')
                          @csrf
                        </form>
                      </td>
                    </tr>

                    {{-- <div class="modal fade" id="descriptionModal{{$key}}" tabindex="-1" role="dialog" aria-labelledby="descriptionModalLabel{{$key}}" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="descriptionModalLabel{{$key}}">Description</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <b>Name</b> : {{ $item->user->name }}<br>
                            <b>Waste Type</b> : {{ $item->waste_type }}<br>
                            <b>City Corporation</b> : {{ $item->city_corporation }}<br>
                           
                            <b>Ward </b> : {{ $item->ward }}<br>
                            <b>Thana </b> : {{ $item->thana }}<br>
                            <b>Flat </b> : {{ $item->flat }}<br>
                            <b>House </b> : {{ $item->house }}<br>
                            <b>Road </b> : {{ $item->road }}<br>
                            <b>Message </b> :
                            {!! $item->others !!}
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          </div>
                        </div>
                      </div>
                    </div> --}}
                    @endforeach

                  </tbody>
                  <tfoot>
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Mobile</th>
                    <th>Email</th>
                    <th>Area </th>
                    <th>Created At </th>
                    <th>Status</th>
              
                    <th>Action</th>

                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->

          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>

 

    <script>
    //   function showDetails(item) {
    //     document.getElementById('modalName').textContent = item.user.name;
    //     document.getElementById('modalWasteType').textContent = item.waste_type;
    //     document.getElementById('modalCityCorporation').textContent = item.city_corporation;
    //     document.getElementById('modalComplainDate').textContent = new Date(item.created_at).toLocaleDateString();
    //     document.getElementById('modalImage').innerHTML = `<a href="${item.logo ? '{{ URL::to('storage/') }}/' + item.logo : '{{ URL::to('image/no_image.png') }}'}"><img src="${item.logo ? '{{ URL::to('storage/') }}/' + item.logo : '{{ URL::to('image/no_image.png') }}'}" alt="" style="max-width:150px"></a>`;
    //     document.getElementById('modalStatus').textContent = item.status == '0' ? 'Pending' : item.status == '1' ? 'Assigned to the vendor' : 'Resolved by the vendor';
    //   }

      function confirmDelete(id) {
        Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
          if (result.isConfirmed) {
            document.getElementById('delete-form-' + id).submit();
          }
        })
      }
    </script>
@endsection
