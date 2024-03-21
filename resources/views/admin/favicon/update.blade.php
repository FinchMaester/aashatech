@extends('admin.layouts.master')

@section('content')
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
        <!-- ... Your existing code ... -->
    </div>

    <form id="quickForm" method="POST" action="{{ route('Favicon.update') }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{ $favicon->id ?? '' }}">
        <div class="card-body">
            <div>
                <!-- Favicon 32*32 -->
                <div class="form-group">
                    <label for="favicon_thirtyTwo">Favicon 32* 32</label><span style="color:red; font-size:large"> *</span>
                    <input type="file" name="favicon_thirtyTwo" class="form-control" id="favicon_thirtyTwo">
                    @if ($favicon->favicon_thirtyTwo)
                        <img src="{{ asset('uploads/favicon/' . $favicon->favicon_thirtyTwo) }}"
                            style="max-width: 500px; max-height:500px" />
                    @endif
                    <span>{{ $favicon->favicon_thirtyTwo ?? old('favicon_thirtyTwo') }}</span>
                </div>

                <!-- Favicon 16*16 -->
                <div class="form-group">
                    <label for="favicon_sixteen">Favicon 16*16</label><span style="color:red; font-size:large"> *</span>
                    <input type="file" name="favicon_sixteen" class="form-control" id="favicon_sixteen">
                    @if ($favicon->favicon_sixteen)
                        <img src="{{ asset('uploads/favicon/' . $favicon->favicon_sixteen) }}"
                            style="max-width: 500px; max-height:500px" />
                    @endif
                    <span>{{ $favicon->favicon_sixteen ?? old('favicon_sixteen') }}</span>
                </div>
                <!-- Favicon ICO -->
                <div class="form-group">
                    <label for="favicon_ico">Favicon Ico</label><span style="color:red; font-size:large"> *</span>
                    <input type="file" name="favicon_ico" class="form-control" id="favicon_ico">
                    @if ($favicon->favicon_ico)
                        <img src="{{ asset('uploads/favicon/' . $favicon->favicon_ico) }}"
                            style="max-width: 500px; max-height:500px" />
                    @endif
                    <span>{{ $favicon->favicon_ico ?? old('favicon_ico') }}</span>
                </div>

                <!-- Apple Touch Icon -->
                <div class="form-group">
                    <label for="apple_touch_icon"> apple_touch_icon</label><span style="color:red; font-size:large">*</span>
                    <input type="file" name="apple_touch_icon" class="form-control" id="apple_touch_icon">
                    @if ($favicon->apple_touch_icon)
                        <img src="{{ asset('uploads/favicon/' . $favicon->apple_touch_icon) }}"
                            style="max-width: 500px; max-height:500px" />
                    @endif
                    <span>{{ $favicon->apple_touch_icon ?? old('apple_touch_icon') }}</span>
                </div>

                <!-- Site Manifest -->
                <div class="form-group">
                    <label for="file">Site manifest</label><span style="color:red; font-size:large"> *</span>
                    <input type="file" name="file" class="form-control" id="pdf" placeholder="file">
                    @if ($favicon->file)
                        <img src="{{ asset('uploads/favicon/file/' . $favicon->file) }}"
                            style="max-width: 500px; max-height:500px" />
                    @endif
                    <span>{{ $favicon->file ?? old('file') }}</span>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn-primary">Submit</button>
        </div>
    </form>

    <script>
        const previewImage = (event, previewId) => {
            const reader = new FileReader();
            reader.readAsDataURL(event.target.files[0]);
            reader.onload = () => {
                const preview = document.getElementById(previewId);
                preview.src = reader.result;
            };
        };
    </script>
@stop
