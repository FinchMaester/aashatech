@extends('admin.layouts.master')


@section('content')
    <!-- Content Wrapper. Contains page content -->
    @if (Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif

    @if (Session::has('error'))
        <div class="alert alert-danger">
            {{ Session::get('error') }}
        </div>
    @endif






    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">{{ $page_title }}</h1>
            <a href="{{ url('admin/backimage/create') }}"><button class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>Add
                    Background Image</button></a>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li>
                <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->

    <!-- /.content-header -->


    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>S.N.</th>
                <th>Title</th>
                <th>Image</th>
                <th>Action</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($backimages as $backimage)
                <tr data-widget="expandable-table" aria-expanded="false">
                    <td width="5%">{{ $loop->iteration }}</td>
                    <td>{{ $backimage->title ?? '' }}</td>

                    <td>
                        @if ($backimage->image)
                            <img src="{{ asset($backimage->image) }}" style="width: 150px; height: 150px;"
                                alt="Back Image">
                        @else
                            <span>No Image</span>
                        @endif
                    </td>
                    <td>
                        <a href="edit/{{ $backimage->id }}">
                            <div style="display: flex; flex-direction:row;">
                                <button type="button" class="btn btn-block btn-warning btn-sm"><i
                                        class="fas fa-edit"></i>Edit </button>
                        </a>

                        <a href="{{ url('admin/backimage/delete/' . $backimage->id) }}">
                            <button type="button" class="btn btn-block btn-danger btn-sm" data-toggle="modal"
                                data-target="#modal-default" style="width:auto;"
                                onclick="replaceLinkFunction">Delete</button>
                        </a>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- /.row -->
    <!-- Main row -->

    <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->


    <script>
        const previewImage1 = e => {
            const reader = new FileReader();
            reader.readAsDataURL(e.target.files[0]);
            reader.onload = () => {
                const preview = document.getElementById('preview1');
                preview.src = reader.result;
            };
        };
    </script>







@stop
