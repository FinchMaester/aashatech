@extends('admin.layouts.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">{{ $page_title }}</h1>
                        <a href="{{ url('admin/testimonials/create') }}"><button class="btn btn-primary btn-sm"><i
                                    class="fa fa-plus"></i> Add Testimonials</button></a>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v1</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div><!-- /.content-header -->

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>S.N.</th>
                                            <th>Title</th>
                                            <th>Image</th>
                                            <th>Content</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($testimonials as $testimonial)
                                            <tr data-widget="expandable-table" aria-expanded="false">
                                                <td width="5%">{{ $loop->iteration }}</td>
                                                <td>{{ $testimonial->title ?? '' }}</td>
                                                <td>
                                                    @if ($testimonial->image)
                                                        <img src="{{ asset($testimonial->image) }}"
                                                            style="width: 150px; height: 150px;" alt="Testimonial Image">
                                                    @else
                                                        <span>No Image</span>
                                                    @endif
                                                </td>
                                                <td>{{ $testimonial->content ?? '' }}</td>
                                                <td>
                                                    <a href="edit/{{ $testimonial->id }}">
                                                        <div style="display: flex; flex-direction:row;">
                                                            <button type="button"
                                                                class="btn btn-block btn-warning btn-sm"><i
                                                                    class="fas fa-edit"></i> Edit </button>
                                                        </div>
                                                    </a>
                                                    <a href="{{ url('admin/testimonials/delete/' . $testimonial->id) }}">
                                                        <button type="button" class="btn btn-block btn-danger btn-sm"
                                                            data-toggle="modal" data-target="#modal-default"
                                                            style="width:auto;"
                                                            onclick="replaceLinkFunction">Delete</button>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div><!-- /.content -->
    </div><!-- /.content-wrapper -->

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
