@extends('layouts.app')

@section('title', isset($service) ? 'JME Group - Edit Service' : 'JME Group - Add Service')

@section('content')

    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">

                {{-- Alert Messages --}}
                @include('common.alert')


                <div class="row">

                    <div class="col-12">

                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">

                            <h4 class="mb-sm-0">

                                {{ isset($service) ? 'Edit Service' : 'Add Service' }}

                            </h4>


                            <div class="page-title-right">

                                <a href="{{ route('admin.services.index') }}"
                                    class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">

                                    <i class="fas fa-arrow-left fa-sm text-white-50"></i>

                                    Back

                                </a>

                            </div>

                        </div>

                    </div>

                </div>


                <div class="row">

                    <div class="col-lg-12">

                        <div class="card">

                            <div class="card-body">

                                <form method="POST"
                                    action="{{ isset($service) ? route('admin.services.update', $service->id) : route('admin.services.store') }}"
                                    enctype="multipart/form-data">

                                    @csrf

                                    @if (isset($service))
                                        @method('PUT')
                                    @endif


                                    <div class="row">


                                        {{-- Category --}}
                                        <div class="col-md-6 mb-4">

                                            <label class="form-label">

                                                Category

                                                <span style="color:red;">*</span>

                                            </label>

                                            <select name="category_id" class="form-control">

                                                <option value="">
                                                    Select Category
                                                </option>

                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}"
                                                        {{ old('category_id', isset($service) ? $service->category_id : '') == $category->id ? 'selected' : '' }}>

                                                        {{ $category->name }}

                                                    </option>
                                                @endforeach

                                            </select>


                                            @if ($errors->has('category_id'))
                                                <span class="text-danger">

                                                    {{ $errors->first('category_id') }}

                                                </span>
                                            @endif

                                        </div>
                                        {{-- Service Name --}}
                                        <div class="col-md-6 mb-4">
                                            <label class="form-label">
                                                Service Name
                                                <span style="color:red;">*</span>
                                            </label>
                                            <input type="text" name="name" class="form-control"
                                                value="{{ old('name', isset($service) ? $service->name : '') }}"
                                                placeholder="Enter service name">
                                            @if ($errors->has('name'))
                                                <span class="text-danger">
                                                    {{ $errors->first('name') }}
                                                </span>
                                            @endif
                                        </div>

                                        {{-- Image --}}
                                        <div class="col-md-6 mb-4">

                                            <label class="form-label">
                                                Image
                                            </label>


                                            <input type="file" name="image" class="form-control" accept="image/*">


                                            @if ($errors->has('image'))
                                                <span class="text-danger">

                                                    {{ $errors->first('image') }}

                                                </span>
                                            @endif

                                            @if (isset($service) && !empty($service->image))
                                                <div class="mt-2">

                                                    <img src="{{ asset('services/' . $service->image) }}"
                                                        style="
                                                        width:100px;
                                                        height:100px;
                                                        object-fit:cover;
                                                        border-radius:5px;
                                                    "
                                                        alt="{{ $service->name }}">

                                                </div>
                                            @endif

                                        </div>


                                        {{-- Meta Title --}}
                                        <div class="col-md-6 mb-4">

                                            <label class="form-label">
                                                Meta Title
                                            </label>


                                            <input type="text" name="meta_tittle" class="form-control"
                                                value="{{ old('meta_tittle', isset($service) ? $service->meta_tittle : '') }}"
                                                placeholder="Enter meta title">


                                            @if ($errors->has('meta_tittle'))
                                                <span class="text-danger">

                                                    {{ $errors->first('meta_tittle') }}

                                                </span>
                                            @endif

                                        </div>


                                        {{-- Meta Description --}}
                                        <div class="col-md-12 mb-4">

                                            <label class="form-label">
                                                Meta Description
                                            </label>


                                            <textarea name="meta_description" class="form-control" rows="3" placeholder="Enter meta description">{{ old('meta_description', isset($service) ? $service->meta_description : '') }}</textarea>


                                            @if ($errors->has('meta_description'))
                                                <span class="text-danger">

                                                    {{ $errors->first('meta_description') }}

                                                </span>
                                            @endif

                                        </div>


                                        {{-- Head --}}
                                        <div class="col-md-12 mb-4">

                                            <label class="form-label">
                                                Head
                                            </label>


                                            <textarea name="head" class="form-control" rows="4" placeholder="Enter head content">{{ old('head', isset($service) ? $service->head : '') }}</textarea>


                                            @if ($errors->has('head'))
                                                <span class="text-danger">

                                                    {{ $errors->first('head') }}

                                                </span>
                                            @endif

                                        </div>


                                        {{-- Short Description --}}
                                        <div class="col-md-12 mb-4">

                                            <label class="form-label">
                                                Short Description
                                            </label>


                                            <textarea name="short_description" class="form-control" rows="4" placeholder="Enter short description">{{ old('short_description', isset($service) ? $service->short_description : '') }}</textarea>


                                            @if ($errors->has('short_description'))
                                                <span class="text-danger">

                                                    {{ $errors->first('short_description') }}

                                                </span>
                                            @endif

                                        </div>


                                        {{-- Brief Description --}}
                                        <div class="col-md-12 mb-4">

                                            <label class="form-label">
                                                Brief Description
                                            </label>

                                            <textarea name="brief_description" class="form-control ckeditor" rows="6" placeholder="Enter brief description">{{ old('brief_description', isset($service) ? $service->brief_description : '') }}</textarea>

                                            @if ($errors->has('brief_description'))
                                                <span class="text-danger">

                                                    {{ $errors->first('brief_description') }}

                                                </span>
                                            @endif

                                        </div>


                                        {{-- Body --}}
                                        <div class="col-md-12 mb-4">

                                            <label class="form-label">
                                                Body
                                            </label>


                                            <textarea name="body" class="form-control" rows="10" placeholder="Enter body content">{{ old('body', isset($service) ? $service->body : '') }}</textarea>


                                            @if ($errors->has('body'))
                                                <span class="text-danger">

                                                    {{ $errors->first('body') }}

                                                </span>
                                            @endif

                                        </div>


                                        {{-- Save --}}
                                        <div class="col-md-12">

                                            <button type="submit" class="btn btn-primary">

                                                <i class="fas fa-save"></i>

                                                {{ isset($service) ? 'Update Service' : 'Save Service' }}

                                            </button>


                                            <a href="{{ route('admin.services.index') }}" class="btn btn-secondary">
                                                Cancel
                                            </a>

                                        </div>


                                    </div>

                                </form>

                            </div>

                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.2/ckeditor.js"></script>
@endsection
