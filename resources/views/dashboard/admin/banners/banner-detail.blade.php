@extends('layouts.dashboard-layout')
@section('dashboard-content')
<div class="content">
    <!-- END: Top Bar -->
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Detail Product
        </h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-12">
            <div class="intro-y box p-8">
                <p class="font-medium text-lg capitalize mb-2" >{{ $banner->title }}</p>
                <div class="md:flex-shrink-0 basis-1/3 justify-center">              
                        <img class="w-3/4 object-cover rounded-lg cursor-pointer border-black border border-solid" src="{{ asset($banner->image->count() ? 'storage/' . $banner->image->src : 'dist/images/default.jpg')}}" alt="">
                </div>
                <div class="flex justify-start mt-5">
                    <a class="flex items-center btn btn-danger" href="javascript:;" data-tw-toggle="modal"
                        data-tw-target="#delete-confirmation-modal" onclick="deleteModalHandler(0)"> <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i> Delete </a>
                   <input type="hidden" id="delete_route_0" value="{{ route('manage_banner.delete', ['banner' => $banner]) }}">
                </div>
            </div>
        </div>
    </div>
</div>
    <!-- BEGIN: Delete Confirmation Modal -->
    <div id="delete-confirmation-modal" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="p-5 text-center">
                        <i data-lucide="x-circle" class="w-16 h-16 text-danger mx-auto mt-3"></i>
                        <div class="text-3xl mt-5">Are you sure?</div>
                        <div class="text-slate-500 mt-2">
                            Do you really want to delete these records?
                            <br>
                            This process cannot be undone.
                        </div>
                    </div>
                    <div class="px-5 pb-8 flex justify-center items-center">
                        <button type="button" data-tw-dismiss="modal"
                            class="btn btn-outline-secondary w-24 mr-1">Cancel</button>
                        <form id="deleteItem" method="post">
                            @csrf
                            @method('delete')
                            <input type="hidden" value="" id="delete_route_input">
                            <button type="submit" class="btn btn-danger w-24">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset('dist/js/view/manage-banner/banner.js') }}"></script>
@endsection
