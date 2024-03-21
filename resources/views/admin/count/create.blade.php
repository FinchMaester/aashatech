@extends('admin.layouts.master')
 
 
@section('content') 
 <!-- Content Wrapper. Contains page content -->


 

    

        <div class="row mb-2">
          <div class="col-sm-6">
            {{-- <h1 class="m-0">{{ $page_title }}</h1> --}}
           <a href="{{ url('admin') }}"><button class="btn btn-primary btn-sm"><i class="fa fa-arrow-left"></i> Back</button></a> 
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
   
    <!-- /.content-header -->


    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
      


<form id="quickForm"  method="POST" action="{{ route('Count.store') }}"
enctype="multipart/form-data">
@csrf
<div class="card-body">
    <div class="form-group">
        <label for="exampleInputEmail1">Happy Team</label>
        <input type="text" name="role" class="form-control" placeholder="Role">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Projects Completed</label>
        <input type="text" name="name" class="form-control" placeholder="Name" required>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Happy Clients</label>
        <input type="text" name="position" class="form-control" placeholder="Position" required>
    </div>
   

    <div class="form-group">
        <label for="exampleInputEmail1">Year Running</label>
        <input type="text" name="contact_number" class="form-control" placeholder="Contact Number" required>
    </div>

   

</div>
<!-- /.card-body -->
<div class="card-footer">
    <button type="submit" class="btn btn-primary">Create Staff</button>
</div>
</form>


     
        <!-- Main row -->
   
   


    <script>
        const previewImage = e => {
            const reader = new FileReader();
            reader.readAsDataURL(e.target.files[0]);
            reader.onload = () => {
                const preview = document.getElementById('preview');
                preview.src = reader.result;
            };
        };
    </script>






  @stop