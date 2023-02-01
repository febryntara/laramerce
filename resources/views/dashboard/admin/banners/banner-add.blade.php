@extends('layouts.dashboard-layout')
@section('dashboard-content')
    <!-- BEGIN: Content -->
    <div class="content">
        <!-- END: Top Bar -->
        <div class="intro-y flex items-center mt-8">
            <h2 class="text-lg font-medium mr-auto">
                Add Banner
            </h2>
        </div>
        <div class="grid grid-cols-12 gap-6 mt-5">
            <div class="intro-y col-span-12 lg:col-span-12">
                <!-- BEGIN: Form Layout -->
                <form action="{{ route('manage_banner.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="intro-y box p-5">
                        <div class="mt-3">
                            <label for="name" class="form-label">Name</label>
                            @error('name')
                                <small class="text-xs text-red-500 ml-1">{{ '*' . $message }}</small>
                            @enderror
                            <input type="text" name="name" id="banner_name" class="form-control"
                                placeholder="Input Banner Name" value="">
                        </div>
                        <div class="upload__box mt-3">
                            @error('image')
                                <small class="text-xs text-red-500 ml-1">{{ '*' . $message }}</small>
                            @enderror
                            <div class="upload__btn-box">
                                <label class="upload__btn btn btn-primary">
                                    <p>Choose An Image</p>
                                    <input type="file" name="image" id="img_upload" class="upload__inputfile" onchange="logoPreview()">
                                </label>
                            </div>
                            <div class="upload__img-wrap">
                                <img id="img_preview" class="upload__img-box" src="" alt="">
                            </div>
                        </div>
                        <div class="text-right mt-5">
                            <a class="btn btn-outline-secondary w-24 mr-1" href="{{ route('manage_banner.all') }}">Cancel</a>
                            <input type="submit" value="Save" class="btn btn-outline-primary shadow-md w-24 mr-1">
                        </div>
                    </div>
                </form>
                <!-- END: Form Layout -->
            </div>
        </div>
    </div>
    <!-- END: Content -->
@endsection
@section('script')
    <script src="{{ asset('dist/js/view/manage-banner/banner.js') }}"></script>
@endsection

