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
            <a href="{{ url('admin/coverimage/create') }}"><button class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>Add
                    Cover Image</button></a>
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
            @foreach ($coverimages as $coverimage)
                <tr data-widget="expandable-table" aria-expanded="false">
                    <td width="5%">{{ $loop->iteration }}</td>
                    <td>{{ $coverimage->title ?? '' }}</td>
                    <td>
                        @if ($coverimage->image)
                            <!-- Use asset() helper function to generate correct URL for image -->
                            <img src="{{ asset($coverimage->image) }}" style="width: 100px;height:100px" />
                        @else
                            No Image
                        @endif
                    </td>

                    <td>
                        <a href="{{ url('admin/coverimage/edit/' . $coverimage->id) }}">

                            <button type="button" class="btn btn-block btn-warning btn-sm"><i
                                    class="fas fa-edit"></i>Edit</button>
                        </a>
                        <a href="{{ url('admin/coverimage/delete/' . $coverimage->id) }}">
                            <button type="button" class="btn btn-block btn-danger btn-sm" data-toggle="modal"
                                data-target="#modal-default" style="width:auto;">Delete</button>
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
@stop
