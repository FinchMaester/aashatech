@extends('admin.layouts.master')

@section('content')

    <div class="row mb-2">
        <div class="col-sm-6">
            <a href="{{ url('admin/careers') }}"><button class="btn btn-primary btn-sm"><i class="fa fa-arrow-left"></i>
                    Back</button></a>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li>
                <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
        </div>
    </div>

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

    <form id="quickForm" novalidate="novalidate" method="POST" action="{{ route('careers.update', $data->id) }}"
        enctype="multipart/form-data">
        @csrf
        @method('POST')
        <div class="card-body">
            <div class="form-group">
                <label for="title">Title</label><span style="color:red; font-size:large"> *</span>
                <input style="width:auto;" type="text" name="title" class="form-control" id="title"
                    value="{{ old('title', $data->title) }}" placeholder="Title">
            </div>

            <div class="form-group">
                <label for="description">Description</label><span style="color:red; font-size:large"> *</span>
                <input style="width:auto;" type="textarea" name="description" class="form-control" id="title"
                    value="{{ old('description', $data->description) }}" placeholder="Description">
            </div>

            <div class="form-group">
                <label for="deadline">Deadline</label><span style="color:red; font-size:large"> *</span>
                <input style="width:auto;" type="date" name="deadline" class="form-control" id="deadline"
                    value="{{ old('deadline', $data->deadline) }}" placeholder="Deadline">
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>

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
