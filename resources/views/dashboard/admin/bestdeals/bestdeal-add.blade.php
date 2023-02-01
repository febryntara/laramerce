@extends('layouts.dashboard-layout')
@section('dashboard-content')
<!-- BEGIN: Content -->
<div class="content">
    <!-- END: Top Bar -->
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Add New Bestdeal
        </h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-12">
            <!-- BEGIN: Form Layout -->
            <form action="{{ route('manage_best_deal.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="intro-y box p-5">
                    <div class="mt-3">
                        <label for="category_id" class="form-label mt-2">Products</label>
                        @error('category_id')
                        <small class="text-xs text-red-500 ml-1">{{ '*' . $message }}</small>
                        @enderror
                        <select name="category_id" id="category_id" data-placeholder="Choose Product Category" class="tom-select w-full">
                            <option value="0">None</option>
                            @foreach ($products as $item)
                            <option value="{{ $item->id }}" {{ old('product_code')==$item->id?'selected':null }}>{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="text-right mt-5">
                        <a href="{{ route('manage_product.all') }}" class="btn btn-outline-secondary w-24 mr-1">Cancel</a>
                        <input type="submit" value="Save" class="btn btn-primary w-24 mr-1">
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
<script src="{{ asset('dist/js/view/manage-product/product.js') }}"></script>
@endsection