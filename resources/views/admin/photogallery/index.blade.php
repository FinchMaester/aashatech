@extends('admin.layouts.master')


@section('content')
    <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->

    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">{{ $page_title }}</h1>
            <a href="{{ route('Photogallery.create') }}"><button class="btn-primary btn-sm"><i class="fa fa-plus"></i>
                    Add New</button></a>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li>
                <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->


    <!-- Content Wrapper. Contains page content -->
    @if (session('successMessage'))
        <div class="alert alert-success">
            {!! session('successMessage') !!}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {!! session('error') !!}
        </div>
    @endif




    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>Title</th>
                <th>Image Desription</th>
                <th>Images</th>

                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($gallery as $image)
                <tr data-widget="expandable-table" aria-expanded="false">
                    <td>{{ $image->title }}</td>
                    <td>{{ $image->img_desc ?? '' }}</td>

                    <td>
                        @foreach ($image->img as $imageurl)
                            {{-- <a href="" data-gall="gallery" class="venobox"> --}}
                            <img src="{{ asset($imageurl) }}" style="max-width: 100px; max-height: 100px;">
                        @endforeach


                    </td>

                    <td>
                        {{-- <a href="/admin/image/edit/{{ $image->id }}">
          <div style="display: flex; flex-direction:row;">
            <button type="button" class="btn btn-block btn-warning btn-sm"><i class="fas fa-edit"></i> Update </button>
        </a> --}}
                        {{-- <a href="{{ url('admin/image/delete/'.$image->id) }}"> --}}

                        <button type="button" class="btn-danger button-size" data-bs-toggle="modal"
                            data-bs-target="#edit{{ $image->id }}">
                            Update
                        </button>
                        <button type="button" class="btn-danger button-size" data-bs-toggle="modal"
                            data-bs-target="#delete{{ $image->id }}">
                            Delete
                        </button>
                        </div>
                        {{-- </a> --}}
                    </td>
                </tr>
            @endforeach
        </tbody>

        @foreach ($gallery as $image)
            <div class="modal fade" id="delete{{ $image->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">This can't be undone. Are you sure?</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
                            <a href="{{ route('Photogallery.destroy', ['id' => $image->id]) }}">
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#delete{{ $image->id }}">
                                    Yes
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach


        {{-- Update --}}
        @foreach ($gallery as $image)
            <div class="modal fade" id="edit{{ $image->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">This can't be undone. Are you sure?</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
                            <a href="{{ url('admin/photogallery/edit/' . $image->id) }}">
                                <button type="button" class="btn btn-danger">Yes
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </table>





    <script>
        var myModal = document.getElementById('myModal')
        var myInput = document.getElementById('myInput')

        myModal.addEventListener('shown.bs.modal', function() {
            myInput.focus()
        })
    </script>
@stop
