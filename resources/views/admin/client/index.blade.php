@extends('admin.layouts.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">{{ $page_title }}</h1>
            <a href="{{ url('admin/client/create') }}">
                <button class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>Add Clients</button>
            </a>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li>
                <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->

    <!-- /.content-header -->

    <div class="container-fluid">
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
                @foreach ($clients as $client)
                    <tr data-widget="expandable-table" aria-expanded="false">
                        <td width="5%">{{ $loop->iteration }}</td>
                        <td>{{ $client->title ?? '' }}</td>
                        <td>
                            @if ($client->image)
                                <img src="{{ asset($client->image) }}" style="width: 150px; height: 150px;"
                                    alt="Client Image">
                            @else
                                <span>No Image</span>
                            @endif
                        </td>
                        <td>
                            <a href="edit/{{ $client->id }}">
                                <button type="button" class="btn btn-block btn-warning btn-sm"><i
                                        class="fas fa-edit"></i>Edit </button>
                            </a>

                            <a href="{{ url('admin/client/delete/' . $client->id) }}">
                                <button type="button" class="btn btn-block btn-danger btn-sm" data-toggle="modal"
                                    data-target="#modal-default" style="width:auto;" onclick="replaceLinkFunction">Delete</button>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div><!-- /.container-fluid -->
@endsection
