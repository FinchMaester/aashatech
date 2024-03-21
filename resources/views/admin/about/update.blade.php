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
            {{-- <h1 class="m-0">{{ $page_title }}</h1> --}}
            <a href="{{ url('admin') }}"><button class="btn btn-primary btn-sm"><i class="fa fa-arrow-left"></i>
                    Back</button></a>
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


    <form id="quickForm" method="POST" action="{{ route('About.update') }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{ $about->id }}">
        <div class="card-body">
            <div class="form-group">
                <label for="title">Title</label><span style="color:red; font-size:large"> *</span>
                <input style="width:auto;" type="text" name="title" class="form-control" id="title"
                    placeholder="Title" value="{{ $about->title }}">
            </div>
            <div class="form-group">
                <label for="subtitle">Subtitle</label><span style="color:red; font-size:large"> *</span>
                <input style="width:auto;" type="text" name="subtitle" class="form-control" id="subtitle"
                    placeholder="Subtitle" value="{{ $about->subtitle }}">
            </div>
            <div class="form-group">
                <label for="image">Image</label><span style="color:red; font-size:large"> *</span>
                <input type="file" name="image" class="form-control" id="image" onchange="previewImage(event)"
                    placeholder="Image">
                <img id="preview1" src="{{ url('uploads/about/' . $about->image) }}"
                    style="max-width: 300px; max-height:300px" />
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Description</label>

                <textarea style="max-width: 30%;" type="text" class="form-control" name="description" id="description"
                    placeholder="Add Description" value="{{ old('description') }}">
                  {{ $about->description ?? '' }}
                </textarea>

            </div>

            <div class="form-group">
                <label for="content">Content</label>
                <textarea id="summernote" name="content" value="">
          {{ $about->content }}
        </textarea>
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Update about</button>
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
