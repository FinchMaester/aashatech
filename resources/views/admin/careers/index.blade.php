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
            <a href="{{ url('admin/careers/create') }}"><button class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>Add
                    Careers</button></a>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li>
                <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
        </div>
    </div>
    <h2>Admin-Entered Data</h2>

    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>S.N.</th>
                <th>Title</th>
                <th>Description</th>
                <th>Deadline</th>
                <th>Action</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->description }}</td>
                    <td>{{ $item->deadline }}</td>
                    <td>
                        <a href="{{ route('careers.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('careers.destroy', $item->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"
                                onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <h2>Client-Entered Data</h2>

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>S.N.</th>
                    <th>Job Title</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Permanent Address</th>
                    <th>Temporary Address</th>
                    <th>Contact Number</th>
                    <th>Expertise</th>
                    <th>Preferred</th>
                    <th>Cover Letter</th>
                    <th>Resume</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jobapp as $jobApp)
                    <tr data-widget="expandable-table" aria-expanded="false">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $jobApp->career->title }}</td>
                        <td>{{ $jobApp->full_name ?? '' }}</td>
                        <td>{{ $jobApp->email ?? '' }}</td>
                        <td>{{ $jobApp->permanent_address ?? '' }}</td>
                        <td>{{ $jobApp->temporary_address ?? '' }}</td>
                        <td>{{ $jobApp->contact_number ?? '' }}</td>
                        <td>
                            @if ($jobApp->expertise)
                                @php
                                    $expertiseData = json_decode($jobApp->expertise, true);
                                @endphp

                                @foreach ($expertiseData as $expertise)
                                    {{ $expertise['name'] }} ({{ $expertise['experience'] }} months)<br>
                                @endforeach
                            @else
                                {{ $jobApp->expertise ?? '' }}
                            @endif
                        </td>


                        <td>{{ $jobApp->preferred ?? '' }}</td>
                        <td>{{ $jobApp->cover_letter ?? '' }}</td>
                        <td>
                            @if ($jobApp->resume)
                                <a href="{{ asset('storage/' . $jobApp->resume) }}" target="_blank"
                                    class="btn btn-primary">View</a>
                                <a href="{{ asset('storage/' . $jobApp->resume) }}" download
                                    class="btn btn-success">Download</a>
                            @else
                                No Resume Available
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </section>
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
