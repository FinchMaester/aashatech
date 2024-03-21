@extends('admin.layouts.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="row mb-2">
        <div class="col-sm-6">
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

    <form id="quickForm" novalidate="novalidate" method="POST" action="{{ route('Post.store') }}"
        enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="title">Title</label><span style="color:red; font-size:large"> *</span>
                <input style="width:auto;" type="text" name="title" class="form-control" id="title"
                    value="{{ old('title') }}" placeholder="Title">
            </div>
            <div>
                <label for="registration_date">Description</label><span style="color:red; font-size:large">
                    *</span>
                <textarea style="max-width: 30%;" type="text" class="form-control" name="description" id="description"
                    placeholder="Add Description">{{ old('description') }}</textarea>
            </div>

            <div class="form-group">
                <label for="pdf">PDF</label>
                <input type="file" name="file" class="form-control" id="pdf" onchange="previewImage(event)"
                    placeholder="PDF" required>
            </div>

            <div class="form-group">
                <label for="image">Image</label><span style="color:red; font-size:large"> *</span>
                <input type="file" name="image" class="form-control" id="image" onchange="previewImage(event)"
                    placeholder="image" required>
            </div>
            <img id="preview" style="max-width: 500px; max-height:500px" />

            <div class="form-group" style="margin: auto;">
                <label for="categories">Categories</label>
                @foreach ($categories as $category)
                    <div class="form-check checkbox2">
                        <input class="form-check-input" name="categories[]" value="{{ $category->id }}" type="checkbox"
                            id="category_{{ $category->id }}">
                        <label class="form-check-label"
                            for="category_{{ $category->id }}">{{ $category->title ?? '' }}</label>
                    </div>
                @endforeach
            </div>


            <div class="form-group">
                <label for="summernote">Content</label><span style="color:red; font-size:large"> *</span>
                <textarea id="summernote" name="content" style="width: 20%; height: 30px;">
                    {{ old('content') }}
                </textarea>
            </div>

        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>

    <!-- Main row -->

    <!-- Include jQuery library -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Summernote Script -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

    <!-- Initialize Summernote -->
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                height: 300, // set editor height
                width: '100%', // set editor width to 100% of parent
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    ['fontname', ['fontname']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            });
        });
    </script>

@stop
