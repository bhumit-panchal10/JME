@extends('layouts.app')

@section('title', 'JME Group - Photo Gallery')

@section('content')

    <div class="main-content">

        <div class="page-content">

            <div class="container-fluid">


                {{-- Alert Messages --}}
                @include('common.alert')


                <div class="row">


                    {{-- ======================================================== --}}
                    {{-- LEFT SIDE - ADD PHOTO --}}
                    {{-- ======================================================== --}}

                    <div class="col-lg-4">

                        <div class="card">


                            <div class="card-header">

                                <h5 class="card-title mb-0">

                                    Add Photo

                                </h5>

                            </div>


                            <div class="card-body">


                                <form action="{{ route('admin.photo-gallery.store') }}" method="POST"
                                    enctype="multipart/form-data">

                                    @csrf


                                    {{-- ======================================== --}}
                                    {{-- CATEGORY --}}
                                    {{-- ======================================== --}}

                                    <div class="mb-3">


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
                                                    {{ old('category_id') == $category->id ? 'selected' : '' }}>

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


                                    {{-- ======================================== --}}
                                    {{-- SERVICE --}}
                                    {{-- Category wise service --}}
                                    {{-- ======================================== --}}

                                    <div class="mb-3">


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


                                    {{-- ======================================== --}}
                                    {{-- IMAGE --}}
                                    {{-- ======================================== --}}

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


                                    {{-- ======================================== --}}
                                    {{-- SAVE --}}
                                    {{-- ======================================== --}}

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


                    {{-- ======================================================== --}}
                    {{-- RIGHT SIDE - LISTING --}}
                    {{-- ======================================================== --}}

                    <div class="col-lg-8">


                        <div class="card">


                            <div class="card-header">


                                <div class="d-flex justify-content-between align-items-center">


                                    <h5 class="card-title mb-0">

                                        Photo Gallery List

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


                                                {{-- Checkbox --}}
                                                <th style="width:40px;">

                                                    <input type="checkbox" id="selectAll">

                                                </th>


                                                {{-- Image --}}
                                                <th>

                                                    Image

                                                </th>


                                                {{-- Category --}}
                                                <th>

                                                    Category

                                                </th>


                                                {{-- Service --}}
                                                <th>

                                                    Service

                                                </th>


                                                {{-- Action --}}
                                                <th style="width:100px;">

                                                    Action

                                                </th>


                                            </tr>


                                        </thead>


                                        <tbody>

                                            @forelse ($photoGalleries as $photoGallery)
                                                <tr>

                                                    <td>
                                                        <input type="checkbox" class="photoCheckbox"
                                                            value="{{ $photoGallery->id }}">
                                                    </td>

                                                    <td>

                                                        @if (!empty($photoGallery->image))
                                                            <img src="{{ asset('photo-gallery/' . $photoGallery->image) }}"
                                                                alt="Photo"
                                                                style="
                            width:70px;
                            height:70px;
                            object-fit:cover;
                            border-radius:5px;
                        ">
                                                        @else
                                                            <span class="text-muted">
                                                                No Image
                                                            </span>
                                                        @endif

                                                    </td>

                                                    <td>
                                                        {{ optional($photoGallery->category)->name }}
                                                    </td>

                                                    <td>
                                                        {{ optional($photoGallery->service)->name }}
                                                    </td>

                                                    <td>

                                                        <button type="button" class="btn btn-sm btn-primary editPhotoBtn"
                                                            title="Edit" data-id="{{ $photoGallery->id }}"
                                                            data-category="{{ $photoGallery->category_id }}"
                                                            data-service="{{ $photoGallery->service_id }}"
                                                            data-image="{{ $photoGallery->image }}">
                                                            <i class="fas fa-edit"></i>
                                                        </button>

                                                        <button type="button" class="btn btn-sm btn-danger deletePhotoBtn"
                                                            title="Delete" data-id="{{ $photoGallery->id }}">
                                                            <i class="fas fa-trash"></i>
                                                        </button>

                                                    </td>

                                                </tr>

                                            @empty

                                                <tr>
                                                    <td colspan="5" class="text-center">
                                                        No photos found.
                                                    </td>
                                                </tr>
                                            @endforelse

                                        </tbody>


                                    </table>


                                </div>


                                {{-- ============================================ --}}
                                {{-- PAGINATION --}}
                                {{-- ============================================ --}}

                                <div class="d-flex justify-content-center mt-3">

                                    {{ $photoGalleries->links() }}

                                </div>


                            </div>


                        </div>


                    </div>


                </div>


            </div>

        </div>

    </div>



    {{-- ================================================================ --}}
    {{-- EDIT PHOTO MODAL --}}
    {{-- ================================================================ --}}

    <div class="modal fade" id="editPhotoModal" tabindex="-1" aria-labelledby="editPhotoModalLabel" aria-hidden="true">


        <div class="modal-dialog">


            <div class="modal-content">


                <form method="POST" id="editPhotoForm" enctype="multipart/form-data">


                    @csrf

                    @method('PUT')


                    {{-- ======================================================== --}}
                    {{-- Modal Header --}}
                    {{-- ======================================================== --}}

                    <div class="modal-header">


                        <h5 class="modal-title" id="editPhotoModalLabel">

                            Edit Photo

                        </h5>


                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>


                    </div>


                    {{-- ======================================================== --}}
                    {{-- Modal Body --}}
                    {{-- ======================================================== --}}

                    <div class="modal-body">


                        {{-- ======================================== --}}
                        {{-- CATEGORY --}}
                        {{-- ======================================== --}}

                        <div class="mb-3">


                            <label class="form-label">

                                Category

                                <span style="color:red;">*</span>

                            </label>


                            <select name="category_id" id="edit_category_id" class="form-control">


                                <option value="">

                                    Select Category

                                </option>


                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">

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


                        {{-- ======================================== --}}
                        {{-- SERVICE --}}
                        {{-- Category wise --}}
                        {{-- ======================================== --}}

                        <div class="mb-3">


                            <label class="form-label">

                                Service

                                <span style="color:red;">*</span>

                            </label>


                            <select name="service_id" id="edit_service_id" class="form-control">


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


                        {{-- ======================================== --}}
                        {{-- CURRENT IMAGE --}}
                        {{-- ======================================== --}}

                        <div class="mb-3" id="currentImageBox" style="display:none;">


                            <label class="form-label">

                                Current Image

                            </label>


                            <br>


                            <img src="" id="currentImage" alt="Photo"
                                style="
                                width:100px;
                                height:100px;
                                object-fit:cover;
                                border-radius:5px;
                            ">


                        </div>


                        {{-- ======================================== --}}
                        {{-- CHANGE IMAGE --}}
                        {{-- ======================================== --}}

                        <div class="mb-3">


                            <label class="form-label">

                                Change Image

                            </label>


                            <input type="file" name="image" id="edit_image" class="form-control" accept="image/*">


                            @if ($errors->has('image'))
                                <span class="text-danger">

                                    {{ $errors->first('image') }}

                                </span>
                            @endif


                        </div>


                    </div>


                    {{-- ======================================================== --}}
                    {{-- Modal Footer --}}
                    {{-- ======================================================== --}}

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


            /*
            |--------------------------------------------------------------------------
            | Add Form - Category Wise Services
            |--------------------------------------------------------------------------
            */
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
                    "{{ route('admin.photo-gallery.services', ':category_id') }}";


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
                                function(
                                    index,
                                    service
                                ) {


                                    let selected = '';


                                    if (
                                        selectedServiceId == service.id
                                    ) {

                                        selected = 'selected';

                                    }


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


                        $('#service_id').html(
                            options
                        );


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
            | Add Form Category Change
            |--------------------------------------------------------------------------
            */
            $('#category_id').on(
                'change',
                function() {


                    let categoryId =
                        $(this).val();


                    loadServices(
                        categoryId
                    );


                }
            );



            /*
            |--------------------------------------------------------------------------
            | Restore old Category + Service after validation error
            |--------------------------------------------------------------------------
            */
            let oldCategoryId =
                "{{ old('category_id') }}";


            let oldServiceId =
                "{{ old('service_id') }}";


            if (oldCategoryId) {


                loadServices(
                    oldCategoryId,
                    oldServiceId
                );


            }



            /*
            |--------------------------------------------------------------------------
            | Edit Modal - Category Wise Services
            |--------------------------------------------------------------------------
            */
            function loadEditServices(
                categoryId,
                selectedServiceId = ''
            ) {


                $('#edit_service_id').html(
                    '<option value="">Loading...</option>'
                );


                if (!categoryId) {


                    $('#edit_service_id').html(
                        '<option value="">Select Service</option>'
                    );


                    return;

                }


                let url =
                    "{{ route('admin.photo-gallery.services', ':category_id') }}";


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
                                function(
                                    index,
                                    service
                                ) {


                                    let selected = '';


                                    if (
                                        selectedServiceId == service.id
                                    ) {

                                        selected = 'selected';

                                    }


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


                        $('#edit_service_id').html(
                            options
                        );


                    },


                    error: function() {


                        $('#edit_service_id').html(
                            '<option value="">Select Service</option>'
                        );


                    }


                });


            }



            /*
            |--------------------------------------------------------------------------
            | Edit Category Change
            |--------------------------------------------------------------------------
            */
            $('#edit_category_id').on(
                'change',
                function() {


                    let categoryId =
                        $(this).val();


                    /*
                    |--------------------------------------------------------------------------
                    | Category changed manually.
                    | Do not preserve old service.
                    |--------------------------------------------------------------------------
                    */
                    loadEditServices(
                        categoryId
                    );


                }
            );



            /*
            |--------------------------------------------------------------------------
            | Open Edit Modal
            |--------------------------------------------------------------------------
            */
            $('.editPhotoBtn').on(
                'click',
                function() {


                    let id =
                        $(this).data('id');


                    let categoryId =
                        $(this).data('category');


                    let serviceId =
                        $(this).data('service');


                    let image =
                        $(this).data('image');



                    /*
                    |--------------------------------------------------------------------------
                    | Select Category
                    |--------------------------------------------------------------------------
                    */
                    $('#edit_category_id').val(
                        categoryId
                    );



                    /*
                    |--------------------------------------------------------------------------
                    | Load only Services belonging to this Category
                    |--------------------------------------------------------------------------
                    */
                    loadEditServices(
                        categoryId,
                        serviceId
                    );



                    /*
                    |--------------------------------------------------------------------------
                    | Update Form URL
                    |--------------------------------------------------------------------------
                    */
                    let updateUrl =
                        "{{ route('admin.photo-gallery.update', ':id') }}";


                    updateUrl =
                        updateUrl.replace(
                            ':id',
                            id
                        );


                    $('#editPhotoForm').attr(
                        'action',
                        updateUrl
                    );



                    /*
                    |--------------------------------------------------------------------------
                    | Current Image
                    |--------------------------------------------------------------------------
                    */
                    if (image) {


                        $('#currentImage').attr(
                            'src',
                            "{{ asset('photo-gallery') }}/" +
                            image
                        );


                        $('#currentImageBox')
                            .show();


                    } else {


                        $('#currentImage')
                            .attr(
                                'src',
                                ''
                            );


                        $('#currentImageBox')
                            .hide();


                    }



                    /*
                    |--------------------------------------------------------------------------
                    | Open Bootstrap Modal
                    |--------------------------------------------------------------------------
                    */
                    let editModal =
                        new bootstrap.Modal(
                            document.getElementById(
                                'editPhotoModal'
                            )
                        );


                    editModal.show();


                }
            );



            /*
            |--------------------------------------------------------------------------
            | Select All
            |--------------------------------------------------------------------------
            */
            $('#selectAll').on(
                'change',
                function() {


                    $('.photoCheckbox').prop(
                        'checked',
                        $(this).prop(
                            'checked'
                        )
                    );


                }
            );



            /*
            |--------------------------------------------------------------------------
            | Individual Checkbox
            |--------------------------------------------------------------------------
            */
            $('.photoCheckbox').on(
                'change',
                function() {


                    if (
                        $('.photoCheckbox:checked').length ===
                        $('.photoCheckbox').length
                    ) {


                        $('#selectAll').prop(
                            'checked',
                            true
                        );


                    } else {


                        $('#selectAll').prop(
                            'checked',
                            false
                        );


                    }


                }
            );



            /*
            |--------------------------------------------------------------------------
            | Single Delete
            |--------------------------------------------------------------------------
            */
            $('.deletePhotoBtn').on(
                'click',
                function() {


                    let id =
                        $(this).data('id');


                    /*
                    |--------------------------------------------------------------------------
                    | Confirmation
                    |--------------------------------------------------------------------------
                    */
                    if (
                        !confirm(
                            'Are you sure you want to delete this photo?'
                        )
                    ) {


                        return false;


                    }



                    let deleteUrl =
                        "{{ route('admin.photo-gallery.destroy', ':id') }}";


                    deleteUrl =
                        deleteUrl.replace(
                            ':id',
                            id
                        );



                    $.ajax({


                        url: deleteUrl,


                        type: 'POST',


                        data: {


                            _token: "{{ csrf_token() }}",


                            _method: 'DELETE'


                        },


                        success: function(
                            response
                        ) {


                            if (
                                response.status ===
                                true
                            ) {


                                alert(
                                    response.message
                                );


                                window.location.reload();


                            } else {


                                alert(
                                    response.message
                                );


                            }


                        },


                        error: function() {


                            alert(
                                'Something went wrong while deleting the photo.'
                            );


                        }


                    });


                }
            );



            /*
            |--------------------------------------------------------------------------
            | Bulk Delete
            |--------------------------------------------------------------------------
            */
            $('#bulkDeleteBtn').on(
                'click',
                function() {


                    let ids = [];



                    $('.photoCheckbox:checked')
                        .each(
                            function() {


                                ids.push(
                                    $(this).val()
                                );


                            }
                        );



                    if (
                        ids.length === 0
                    ) {


                        alert(
                            'Please select at least one photo.'
                        );


                        return false;


                    }



                    /*
                    |--------------------------------------------------------------------------
                    | Confirmation
                    |--------------------------------------------------------------------------
                    */
                    if (
                        !confirm(
                            'Are you sure you want to delete selected photos?'
                        )
                    ) {


                        return false;


                    }



                    $.ajax({


                        url: "{{ route('admin.photo-gallery.bulk-delete') }}",


                        type: 'POST',


                        data: {


                            _token: "{{ csrf_token() }}",


                            ids: ids


                        },


                        success: function(
                            response
                        ) {


                            if (
                                response.status ===
                                true
                            ) {


                                alert(
                                    response.message
                                );


                                window.location.reload();


                            } else {


                                alert(
                                    response.message
                                );


                            }


                        },


                        error: function(
                            xhr
                        ) {


                            if (
                                xhr.responseJSON &&
                                xhr.responseJSON.message
                            ) {


                                alert(
                                    xhr.responseJSON.message
                                );


                            } else {


                                alert(
                                    'Something went wrong while deleting selected photos.'
                                );


                            }


                        }


                    });


                }
            );


        });
    </script>


@endsection
