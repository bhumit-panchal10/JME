@extends('layouts.app')

@section('title', isset($blog) ? 'JME Group - Edit Blog' : 'JME Group - Add Blog')

@section('content')

    <div class="main-content">

        <div class="page-content">

            <div class="container-fluid">

                {{-- Alert Messages --}}
                @include('common.alert')


                <div class="row">

                    <div class="col-12">

                        <div class="d-flex justify-content-between align-items-center mb-3">

                            <h4>

                                {{ isset($blog) ? 'Edit Blog' : 'Add Blog' }}

                            </h4>


                            <a href="{{ route('admin.blogs.index') }}" class="btn btn-secondary">

                                <i class="fas fa-arrow-left"></i>

                                Back

                            </a>

                        </div>

                    </div>

                </div>


                <div class="card">

                    <div class="card-body">

                        <form
                            action="{{ isset($blog) ? route('admin.blogs.update', $blog->id) : route('admin.blogs.store') }}"
                            method="POST" enctype="multipart/form-data">

                            @csrf


                            @if (isset($blog))
                                @method('PUT')
                            @endif


                            <div class="row">


                                {{-- ========================================== --}}
                                {{-- CATEGORY --}}
                                {{-- ========================================== --}}

                                <div class="col-md-6 mb-4">

                                    <label class="form-label">

                                        Category

                                        <span style="color:red;">*</span>

                                    </label>


                                    <select name="category_id" id="category_id" class="form-control">
                                        <option value="">
                                            Select Category
                                        </option>

                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ old('category_id', isset($blog) ? $blog->category_id : '') == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('category_id'))
                                        <span class="text-danger">
                                            {{ $errors->first('category_id') }}
                                        </span>
                                    @endif


                                    @if ($errors->has('category_id'))
                                        <span class="text-danger">

                                            {{ $errors->first('category_id') }}

                                        </span>
                                    @endif

                                </div>


                                {{-- ========================================== --}}
                                {{-- SERVICE --}}
                                {{-- ========================================== --}}

                                <div class="col-md-6 mb-4">

                                    <label class="form-label">

                                        Service

                                        <span style="color:red;">*</span>

                                    </label>


                                    <select name="service_id" id="service_id" class="form-control">
                                        <option value="">
                                            Select Service
                                        </option>
                                    </select>

                                    @if ($errors->has('service_id'))
                                        <span class="text-danger">
                                            {{ $errors->first('service_id') }}
                                        </span>
                                    @endif

                                </div>


                                {{-- ========================================== --}}
                                {{-- BLOG NAME --}}
                                {{-- ========================================== --}}

                                <div class="col-md-6 mb-4">

                                    <label class="form-label">

                                        Blog Name

                                        <span style="color:red;">*</span>

                                    </label>


                                    <input type="text" name="name" class="form-control" maxlength="255"
                                        placeholder="Enter Blog Name"
                                        value="{{ old('name', isset($blog) ? $blog->name : '') }}">


                                    @if ($errors->has('name'))
                                        <span class="text-danger">

                                            {{ $errors->first('name') }}

                                        </span>
                                    @endif

                                </div>

                                {{-- ========================================== --}}
                                {{-- IMAGE --}}
                                {{-- ========================================== --}}

                                <div class="col-md-6 mb-4">

                                    <label class="form-label">
                                        Image
                                    </label>

                                    <input type="file" name="image" class="form-control"
                                        accept=".jpg,.jpeg,.png,.webp,.gif">

                                    @if ($errors->has('image'))
                                        <span class="text-danger">
                                            {{ $errors->first('image') }}
                                        </span>
                                    @endif


                                    {{-- Existing Image On Edit --}}
                                    @if (isset($blog) && !empty($blog->image))
                                        <div class="mt-3">

                                            <label class="form-label d-block">
                                                Current Image
                                            </label>

                                            <img src="{{ asset('blogs/' . $blog->image) }}" alt="{{ $blog->name }}"
                                                style="
                                                    width: 120px;
                                                    height: 80px;
                                                    object-fit: cover;
                                                    border-radius: 6px;
                                                    border: 1px solid #ddd;
                                                    padding: 3px;
                                                ">

                                        </div>
                                    @endif

                                </div>


                                {{-- ========================================== --}}
                                {{-- META TITLE --}}
                                {{-- Keep DB spelling: meta_tittle --}}
                                {{-- ========================================== --}}

                                <div class="col-md-6 mb-4">

                                    <label class="form-label">

                                        Meta Title

                                    </label>


                                    <input type="text" name="meta_tittle" class="form-control" maxlength="255"
                                        placeholder="Enter Meta Title"
                                        value="{{ old('meta_tittle', isset($blog) ? $blog->meta_tittle : '') }}">


                                    @if ($errors->has('meta_tittle'))
                                        <span class="text-danger">

                                            {{ $errors->first('meta_tittle') }}

                                        </span>
                                    @endif

                                </div>


                                {{-- ========================================== --}}
                                {{-- DESCRIPTION --}}
                                {{-- ========================================== --}}

                                <div class="col-md-12 mb-4">

                                    <label class="form-label">

                                        Description

                                    </label>


                                    <textarea name="description" class="form-control ckeditor" rows="5" placeholder="Enter Description">{{ old('description', isset($blog) ? $blog->description : '') }}</textarea>


                                    @if ($errors->has('description'))
                                        <span class="text-danger">

                                            {{ $errors->first('description') }}

                                        </span>
                                    @endif

                                </div>


                                {{-- ========================================== --}}
                                {{-- META DESCRIPTION --}}
                                {{-- ========================================== --}}

                                <div class="col-md-12 mb-4">

                                    <label class="form-label">

                                        Meta Description

                                    </label>


                                    <textarea name="meta_description" class="form-control ckeditor" rows="4" placeholder="Enter Meta Description">{{ old('meta_description', isset($blog) ? $blog->meta_description : '') }}</textarea>


                                    @if ($errors->has('meta_description'))
                                        <span class="text-danger">

                                            {{ $errors->first('meta_description') }}

                                        </span>
                                    @endif

                                </div>


                                {{-- ========================================== --}}
                                {{-- HEAD --}}
                                {{-- ========================================== --}}

                                <div class="col-md-12 mb-4">

                                    <label class="form-label">

                                        Head

                                    </label>


                                    <textarea name="head" class="form-control" rows="6" placeholder="Enter Head Content">{{ old('head', isset($blog) ? $blog->head : '') }}</textarea>


                                    @if ($errors->has('head'))
                                        <span class="text-danger">

                                            {{ $errors->first('head') }}

                                        </span>
                                    @endif

                                </div>


                                {{-- ========================================== --}}
                                {{-- BODY --}}
                                {{-- ========================================== --}}

                                <div class="col-md-12 mb-4">

                                    <label class="form-label">

                                        Body

                                    </label>


                                    <textarea name="body" class="form-control" rows="12" placeholder="Enter Body Content">{{ old('body', isset($blog) ? $blog->body : '') }}</textarea>


                                    @if ($errors->has('body'))
                                        <span class="text-danger">

                                            {{ $errors->first('body') }}

                                        </span>
                                    @endif

                                </div>


                                {{-- ========================================== --}}
                                {{-- SAVE / UPDATE --}}
                                {{-- ========================================== --}}

                                <div class="col-md-12">

                                    <button type="submit" class="btn btn-primary">

                                        <i class="fas fa-save"></i>

                                        {{ isset($blog) ? 'Update' : 'Save' }}

                                    </button>


                                    <a href="{{ route('admin.blogs.index') }}" class="btn btn-secondary">

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

@endsection


@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.2/ckeditor.js"></script>
    <script>
        $(document).ready(function() {

            function loadServices(
                categoryId,
                selectedServiceId = ''
            ) {

                $('#service_id').html(
                    '<option value="">Loading...</option>'
                );

                if (!categoryId) {

                    $('#service_id').html(
                        '<option value="">Select Service</option>'
                    );

                    return;
                }

                let url =
                    "{{ route('admin.blogs.services', ':category_id') }}";

                url = url.replace(
                    ':category_id',
                    categoryId
                );

                $.ajax({

                    url: url,

                    type: 'GET',

                    success: function(response) {

                        let options =
                            '<option value="">Select Service</option>';

                        if (
                            response.status === true &&
                            response.services.length > 0
                        ) {

                            $.each(
                                response.services,
                                function(index, service) {

                                    let selected =
                                        selectedServiceId == service.id ?
                                        'selected' :
                                        '';

                                    options +=
                                        '<option value="' +
                                        service.id +
                                        '" ' +
                                        selected +
                                        '>' +
                                        service.name +
                                        '</option>';

                                }
                            );

                        }

                        $('#service_id').html(options);

                    },

                    error: function() {

                        $('#service_id').html(
                            '<option value="">Select Service</option>'
                        );

                    }

                });

            }


            /*
            |--------------------------------------------------------------------------
            | Category Change
            |--------------------------------------------------------------------------
            */
            $('#category_id').on(
                'change',
                function() {

                    loadServices(
                        $(this).val()
                    );

                }
            );


            /*
            |--------------------------------------------------------------------------
            | Add / Edit Initial Selection
            |--------------------------------------------------------------------------
            */
            let selectedCategoryId =
                "{{ old('category_id', isset($blog) ? $blog->category_id : '') }}";

            let selectedServiceId =
                "{{ old('service_id', isset($blog) ? $blog->service_id : '') }}";


            if (selectedCategoryId) {

                loadServices(
                    selectedCategoryId,
                    selectedServiceId
                );

            }

        });
    </script>

@endsection
