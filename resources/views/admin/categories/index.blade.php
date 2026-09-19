@extends('layouts.app')

@section('title', 'JME Group - Categories')

@section('content')

    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">

                {{-- Alert Messages --}}
                @include('common.alert')

                <div class="row">

                    {{-- ========================================================= --}}
                    {{-- LEFT SIDE : ADD CATEGORY --}}
                    {{-- ========================================================= --}}
                    <div class="col-lg-4">

                        <div class="card">

                            <div class="card-header">
                                <h5 class="card-title mb-0">
                                    Add Category
                                </h5>
                            </div>

                            <div class="card-body">

                                <form action="{{ route('admin.categories.store') }}" method="POST"
                                    enctype="multipart/form-data">

                                    @csrf

                                    {{-- Category Name --}}
                                    <div class="mb-3">

                                        <label class="form-label">
                                            Category Name
                                            <span style="color:red;">*</span>
                                        </label>

                                        <input type="text" name="name" class="form-control"
                                            value="{{ old('name') }}" placeholder="Enter category name">

                                        @if ($errors->has('name'))
                                            <span class="text-danger">
                                                {{ $errors->first('name') }}
                                            </span>
                                        @endif

                                    </div>


                                    {{-- Image --}}
                                    <div class="mb-3">

                                        <label class="form-label">
                                            Image
                                        </label>

                                        <input type="file" name="image" class="form-control" accept="image/*">

                                        @if ($errors->has('image'))
                                            <span class="text-danger">
                                                {{ $errors->first('image') }}
                                            </span>
                                        @endif

                                    </div>


                                    {{-- Short Description --}}
                                    <div class="mb-3">

                                        <label class="form-label">
                                            Short Description
                                        </label>

                                        <textarea name="sort_desicription" class="form-control" rows="4" placeholder="Enter short description">{{ old('sort_desicription') }}</textarea>

                                        @if ($errors->has('sort_desicription'))
                                            <span class="text-danger">
                                                {{ $errors->first('sort_desicription') }}
                                            </span>
                                        @endif

                                    </div>


                                    <div class="mb-3">

                                        <button type="submit" class="btn btn-primary">
                                            <i class="fas fa-save"></i>
                                            Save
                                        </button>

                                    </div>

                                </form>

                            </div>

                        </div>

                    </div>


                    {{-- ========================================================= --}}
                    {{-- RIGHT SIDE : CATEGORY LIST --}}
                    {{-- ========================================================= --}}
                    <div class="col-lg-8">

                        <div class="card">

                            <div class="card-header">

                                <div class="d-flex align-items-center justify-content-between">

                                    <h5 class="card-title mb-0">
                                        Category List
                                    </h5>

                                    <button type="button" class="btn btn-sm btn-danger" id="bulkDeleteBtn">
                                        <i class="fas fa-trash"></i>
                                        Delete Selected
                                    </button>

                                </div>

                            </div>

                            <div class="card-body">

                                <div class="table-responsive">

                                    <table class="table table-bordered table-striped align-middle">

                                        <thead>
                                            <tr>

                                                <th style="width: 40px;">
                                                    <input type="checkbox" id="selectAll">
                                                </th>

                                                <th>Image</th>

                                                <th>Category Name</th>

                                                <th>Short Description</th>

                                                <th style="width:100px;">
                                                    Action
                                                </th>

                                            </tr>
                                        </thead>

                                        <tbody>

                                            @forelse($categories as $category)
                                                <tr>

                                                    {{-- Checkbox --}}
                                                    <td>

                                                        <input type="checkbox" class="categoryCheckbox"
                                                            value="{{ $category->id }}">

                                                    </td>


                                                    {{-- Image --}}
                                                    <td>

                                                        @if (!empty($category->image))
                                                            <img src="{{ asset('categories/' . $category->image) }}"
                                                                alt="{{ $category->name }}"
                                                                style="
                                                                width:60px;
                                                                height:60px;
                                                                object-fit:cover;
                                                                border-radius:5px;
                                                            ">
                                                        @else
                                                            <span class="text-muted">
                                                                No Image
                                                            </span>
                                                        @endif

                                                    </td>


                                                    {{-- Name --}}
                                                    <td>
                                                        {{ $category->name }}
                                                    </td>


                                                    {{-- Short Description --}}
                                                    <td>

                                                        @if (!empty($category->sort_desicription))
                                                            {{ \Illuminate\Support\Str::limit($category->sort_desicription, 80) }}
                                                        @else
                                                            -
                                                        @endif

                                                    </td>


                                                    {{-- Actions --}}
                                                    <td>

                                                        {{-- Edit --}}
                                                        <button type="button"
                                                            class="btn btn-sm btn-primary editCategoryBtn" title="Edit"
                                                            data-id="{{ $category->id }}"
                                                            data-name="{{ $category->name }}"
                                                            data-metatitle="{{ $category->meta_title }}"
                                                            data-head="{{ $category->head }}"
                                                            data-body="{{ $category->body }}"
                                                            data-metadescription="{{ $category->meta_description }}"
                                                            data-description="{{ $category->sort_desicription }}"
                                                            data-image="{{ $category->image }}">
                                                            <i class="fas fa-edit"></i>
                                                        </button>


                                                        {{-- Delete --}}
                                                        <button type="button"
                                                            class="btn btn-sm btn-danger deleteCategoryBtn" title="Delete"
                                                            data-id="{{ $category->id }}">
                                                            <i class="fas fa-trash"></i>
                                                        </button>

                                                    </td>

                                                </tr>

                                            @empty

                                                <tr>

                                                    <td colspan="5" class="text-center">
                                                        No category found.
                                                    </td>

                                                </tr>
                                            @endforelse

                                        </tbody>

                                    </table>

                                </div>


                                {{-- Pagination --}}
                                <div class="d-flex justify-content-center mt-3">

                                    {{ $categories->links() }}

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>


    {{-- ============================================================= --}}
    {{-- EDIT CATEGORY MODAL --}}
    {{-- ============================================================= --}}

    <div class="modal fade" id="editCategoryModal" tabindex="-1" aria-labelledby="editCategoryModalLabel"
        aria-hidden="true">

        <div class="modal-dialog" style="max-width: 700px;">

            <div class="modal-content">

                <form method="POST" id="editCategoryForm" enctype="multipart/form-data">

                    @csrf
                    @method('PUT')

                    <div class="modal-header">

                        <h5 class="modal-title" id="editCategoryModalLabel">
                            Edit Category
                        </h5>

                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                    </div>
                    <div class="modal-body">

                        {{-- Category Name --}}
                        <div class="row">
                            <div class="col-md-6">

                                <label class="form-label">
                                    Category Name
                                    <span style="color:red;">*</span>
                                </label>

                                <input type="text" name="name" id="edit_name" class="form-control">

                                @if ($errors->has('name'))
                                    <span class="text-danger">
                                        {{ $errors->first('name') }}
                                    </span>
                                @endif

                            </div>

                            {{-- New Image --}}
                            <div class="col-md-6">

                                <label class="form-label">
                                    Change Image
                                </label>

                                <input type="file" name="image" id="edit_image" class="form-control"
                                    accept="image/*">

                                @if ($errors->has('image'))
                                    <span class="text-danger">
                                        {{ $errors->first('image') }}
                                    </span>
                                @endif

                            </div>
                            {{-- Current Image --}}
                            <div class="col-md-6" id="currentImageBox" style="display:none;">

                                <label class="form-label">
                                    Current Image
                                </label>

                                <br>

                                <img src="" id="currentImage" alt="Category Image"
                                    style="
                                width:80px;
                                height:80px;
                                object-fit:cover;
                                border-radius:5px;
                            ">

                            </div>

                        </div>


                        {{-- Description --}}
                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-label">
                                    Short Description
                                </label>

                                <textarea name="sort_desicription" id="edit_sort_desicription" class="form-control" rows="4"></textarea>

                                @if ($errors->has('sort_desicription'))
                                    <span class="text-danger">
                                        {{ $errors->first('sort_desicription') }}
                                    </span>
                                @endif

                            </div>
                            <div class="col-md-6">
                                <label class="form-label">
                                    Meta Title
                                </label>
                                <input type="text" id="meta_tittle" name="meta_tittle" class="form-control"
                                    value="{{ old('meta_tittle', isset($service) ? $service->meta_tittle : '') }}"
                                    placeholder="Enter meta title">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">

                                <label class="form-label">
                                    Meta Description
                                </label>

                                <textarea id="meta_description" name="meta_description" class="form-control" rows="3"
                                    placeholder="Enter meta description">{{ old('meta_description', isset($service) ? $service->meta_description : '') }}</textarea>
                                @if ($errors->has('meta_description'))
                                    <span class="text-danger">

                                        {{ $errors->first('meta_description') }}

                                    </span>
                                @endif

                            </div>

                            <div class="col-md-6">

                                <label class="form-label">
                                    Head
                                </label>


                                <textarea id="head" name="head" class="form-control" rows="4" placeholder="Enter head content">{{ old('head', isset($service) ? $service->head : '') }}</textarea>
                                @if ($errors->has('head'))
                                    <span class="text-danger">

                                        {{ $errors->first('head') }}

                                    </span>
                                @endif

                            </div>
                        </div>

                        <div class="col-md-12 mb-4">

                            <label class="form-label">
                                Body
                            </label>
                            <textarea id="body" name="body" class="form-control" rows="10" placeholder="Enter body content">{{ old('body', isset($service) ? $service->body : '') }}</textarea>
                            @if ($errors->has('body'))
                                <span class="text-danger">

                                    {{ $errors->first('body') }}

                                </span>
                            @endif

                        </div>

                    </div>


                    <div class="modal-footer">

                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            Close
                        </button>

                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i>
                            Update
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

@endsection


@section('scripts')

    <script>
        $(document).ready(function() {

            // ============================================================
            // Select / Unselect all
            // ============================================================
            $('#selectAll').on('change', function() {

                $('.categoryCheckbox').prop(
                    'checked',
                    $(this).prop('checked')
                );

            });


            $('.categoryCheckbox').on('change', function() {

                if (
                    $('.categoryCheckbox:checked').length ===
                    $('.categoryCheckbox').length
                ) {

                    $('#selectAll').prop('checked', true);

                } else {

                    $('#selectAll').prop('checked', false);

                }

            });


            // ============================================================
            // Edit Category Modal
            // ============================================================
            $('.editCategoryBtn').on('click', function() {
                let id = $(this).data('id');
                let name = $(this).data('name');
                let metatitle = $(this).data('metatitle');
                let head = $(this).data('head');
                let body = $(this).data('body');
                let metadescription = $(this).data('metadescription');
                let description = $(this).data('description');
                let image = $(this).data('image');

                $('#edit_name').val(name);
                $('#meta_tittle').val(metatitle);
                $('#meta_description').val(metadescription);
                $('#head').val(head);
                $('#body').val(body);

                $('#edit_sort_desicription').val(description);

                let updateUrl =
                    "{{ route('admin.categories.update', ':id') }}";

                updateUrl = updateUrl.replace(':id', id);

                $('#editCategoryForm').attr('action', updateUrl);


                // Current image
                if (image) {

                    $('#currentImage')
                        .attr(
                            'src',
                            "{{ asset('categories') }}/" + image
                        );

                    $('#currentImageBox').show();

                } else {

                    $('#currentImageBox').hide();

                    $('#currentImage').attr('src', '');

                }


                $('#editCategoryModal').modal('show');

            });


            // ============================================================
            // Single Delete
            // ============================================================
            $('.deleteCategoryBtn').on('click', function() {

                let id = $(this).data('id');

                if (
                    !confirm(
                        'Are you sure you want to delete this category?'
                    )
                ) {
                    return false;
                }

                let deleteUrl =
                    "{{ route('admin.categories.destroy', ':id') }}";

                deleteUrl = deleteUrl.replace(':id', id);


                $.ajax({

                    url: deleteUrl,

                    type: 'POST',

                    data: {
                        _token: "{{ csrf_token() }}",
                        _method: 'DELETE'
                    },

                    success: function(response) {

                        if (response.status === true) {

                            alert(response.message);

                            window.location.reload();

                        } else {

                            alert(response.message);

                        }

                    },

                    error: function() {

                        alert(
                            'Something went wrong while deleting the category.'
                        );

                    }

                });

            });


            // ============================================================
            // Bulk Delete
            // ============================================================
            $('#bulkDeleteBtn').on('click', function() {

                let ids = [];


                $('.categoryCheckbox:checked').each(function() {

                    ids.push($(this).val());

                });


                if (ids.length === 0) {

                    alert(
                        'Please select at least one category to delete.'
                    );

                    return false;

                }


                if (
                    !confirm(
                        'Are you sure you want to delete selected categories?'
                    )
                ) {

                    return false;

                }


                $.ajax({

                    url: "{{ route('admin.categories.bulk-delete') }}",

                    type: 'POST',

                    data: {
                        _token: "{{ csrf_token() }}",
                        ids: ids
                    },

                    success: function(response) {

                        if (response.status === true) {

                            alert(response.message);

                            window.location.reload();

                        } else {

                            alert(response.message);

                        }

                    },

                    error: function(xhr) {

                        if (
                            xhr.responseJSON &&
                            xhr.responseJSON.message
                        ) {

                            alert(xhr.responseJSON.message);

                        } else {

                            alert(
                                'Something went wrong while deleting selected categories.'
                            );

                        }

                    }

                });

            });

        });
    </script>

@endsection
