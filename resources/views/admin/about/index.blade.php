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
            <a href="{{ url('admin') }}"><button class="btn btn-primary btn-sm"><i class="fa fa-arrow-left"></i>
                    Back</button></a>

            {{-- <a href="{{ url('admin/about/create') }}"><button class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>Add
                    About</button></a> --}}

        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li>
                <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->

    <!-- /.content-header -->


    {{-- @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif --}}


    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>Title</th>
                <th>Subtitle</th>
                <th>Image</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($abouts as $about)
                <tr data-widget="expandable-table" aria-expanded="false">
                    <td>{{ $about->title ?? '' }}</td>
                    <td>{{ $about->subtitle ?? '' }}</td>
                    <td><img src="{{ url('uploads/about/' . $about->image) ?? '' }}" id="preview"
                            style="max-width: 150px; max-height:150px" /></td>
                    <td>{{ $about->description ?? '' }}</td>
                    <td>
                        <a href="/admin/about/edit/{{ $about->id }}">
                            <div style="display: flex; flex-direction:row;">
                                <button type="button" class="btn btn-block btn-warning btn-sm"><i class="fas fa-edit"></i>
                                    Update </button>
                        </a>
                        <a href="{{ url('admin/about/delete/' . $about->id) }}">
                            <button type="button" class="btn btn-block btn-danger btn-sm" data-toggle="modal"
                                data-target="#modal-default" style="width:auto;"
                                onclick="replaceLinkFunction">Delete</button>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>




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
