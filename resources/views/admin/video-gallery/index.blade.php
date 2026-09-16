@extends('layouts.app')

@section('title', 'JME Group - Video Gallery')

@section('content')

    <div class="main-content">

        <div class="page-content">

            <div class="container-fluid">

                @include('common.alert')

                <div class="row">

                    {{-- ================================ --}}
                    {{-- LEFT SIDE - ADD VIDEO --}}
                    {{-- ================================ --}}

                    <div class="col-lg-4">

                        <div class="card">

                            <div class="card-header">

                                <h5 class="card-title mb-0">
                                    Add Video
                                </h5>

                            </div>

                            <div class="card-body">

                                <form action="{{ route('admin.video-gallery.store') }}" method="POST">

                                    @csrf

                                    {{-- Category --}}
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


                                    {{-- Service --}}
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


                                    {{-- URL --}}
                                    <div class="mb-3">

                                        <label class="form-label">

                                            Video URL

                                            <span style="color:red;">*</span>

                                        </label>

                                        <input type="url" name="url" class="form-control"
                                            value="{{ old('url') }}" placeholder="https://www.youtube.com/watch?v=...">

                                        @if ($errors->has('url'))
                                            <span class="text-danger">

                                                {{ $errors->first('url') }}

                                            </span>
                                        @endif

                                    </div>


                                    <button type="submit" class="btn btn-primary">

                                        <i class="fas fa-save"></i>

                                        Save

                                    </button>

                                </form>

                            </div>

                        </div>

                    </div>


                    {{-- ================================ --}}
                    {{-- RIGHT SIDE - LISTING --}}
                    {{-- ================================ --}}

                    <div class="col-lg-8">

                        <div class="card">

                            <div class="card-header">

                                <div class="d-flex justify-content-between align-items-center">

                                    <h5 class="card-title mb-0">

                                        Video Gallery List

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

                                                <th style="width:40px;">

                                                    <input type="checkbox" id="selectAll">

                                                </th>

                                                <th>Category</th>

                                                <th>Service</th>

                                                <th>Video URL</th>

                                                <th style="width:110px;">
                                                    Action
                                                </th>

                                            </tr>

                                        </thead>


                                        <tbody>

                                            @forelse ($videoGalleries as $videoGallery)
                                                <tr>

                                                    <td>

                                                        <input type="checkbox" class="videoCheckbox"
                                                            value="{{ $videoGallery->id }}">

                                                    </td>

                                                    <td>

                                                        {{ optional($videoGallery->category)->name }}

                                                    </td>

                                                    <td>

                                                        {{ optional($videoGallery->service)->name }}

                                                    </td>

                                                    <td>

                                                        @if (!empty($videoGallery->url))
                                                            <a href="{{ $videoGallery->url }}" target="_blank"
                                                                rel="noopener noreferrer">

                                                                <i class="fas fa-external-link-alt"></i>

                                                                View Video

                                                            </a>
                                                        @else
                                                            <span class="text-muted">
                                                                No URL
                                                            </span>
                                                        @endif

                                                    </td>

                                                    <td>

                                                        <button type="button" class="btn btn-sm btn-primary editVideoBtn"
                                                            title="Edit" data-id="{{ $videoGallery->id }}"
                                                            data-category="{{ $videoGallery->category_id }}"
                                                            data-service="{{ $videoGallery->service_id }}"
                                                            data-url="{{ $videoGallery->url }}">

                                                            <i class="fas fa-edit"></i>

                                                        </button>


                                                        <button type="button" class="btn btn-sm btn-danger deleteVideoBtn"
                                                            title="Delete" data-id="{{ $videoGallery->id }}">

                                                            <i class="fas fa-trash"></i>

                                                        </button>

                                                    </td>

                                                </tr>

                                            @empty

                                                <tr>

                                                    <td colspan="5" class="text-center">

                                                        No videos found.

                                                    </td>

                                                </tr>
                                            @endforelse

                                        </tbody>

                                    </table>

                                </div>


                                <div class="d-flex justify-content-center mt-3">

                                    {{ $videoGalleries->links() }}

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- ================================================== --}}
    {{-- EDIT VIDEO MODAL --}}
    {{-- ================================================== --}}

    <div class="modal fade" id="editVideoModal" tabindex="-1" aria-hidden="true">

        <div class="modal-dialog">

            <div class="modal-content">

                <form method="POST" id="editVideoForm">

                    @csrf
                    @method('PUT')


                    <div class="modal-header">

                        <h5 class="modal-title">
                            Edit Video
                        </h5>

                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>

                    </div>


                    <div class="modal-body">

                        {{-- Category --}}
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


                        {{-- Service --}}
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


                        {{-- URL --}}
                        <div class="mb-3">

                            <label class="form-label">

                                Video URL

                                <span style="color:red;">*</span>

                            </label>

                            <input type="url" name="url" id="edit_url" class="form-control">

                            @if ($errors->has('url'))
                                <span class="text-danger">

                                    {{ $errors->first('url') }}

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
                    "{{ route('admin.video-gallery.services', ':category_id') }}";

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


            $('#category_id').on(
                'change',
                function() {

                    loadServices(
                        $(this).val()
                    );

                }
            );


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
                    "{{ route('admin.video-gallery.services', ':category_id') }}";

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

                        $('#edit_service_id').html(options);
                    },

                    error: function() {

                        $('#edit_service_id').html(
                            '<option value="">Select Service</option>'
                        );

                    }

                });
            }


            $('#edit_category_id').on(
                'change',
                function() {

                    loadEditServices(
                        $(this).val()
                    );

                }
            );


            $('.editVideoBtn').on(
                'click',
                function() {

                    let id =
                        $(this).data('id');

                    let categoryId =
                        $(this).data('category');

                    let serviceId =
                        $(this).data('service');

                    let videoUrl =
                        $(this).data('url');


                    $('#edit_category_id').val(
                        categoryId
                    );


                    loadEditServices(
                        categoryId,
                        serviceId
                    );


                    $('#edit_url').val(
                        videoUrl
                    );


                    let updateUrl =
                        "{{ route('admin.video-gallery.update', ':id') }}";

                    updateUrl =
                        updateUrl.replace(
                            ':id',
                            id
                        );


                    $('#editVideoForm').attr(
                        'action',
                        updateUrl
                    );


                    let editModal =
                        new bootstrap.Modal(
                            document.getElementById(
                                'editVideoModal'
                            )
                        );

                    editModal.show();

                }
            );


            $('#selectAll').on(
                'change',
                function() {

                    $('.videoCheckbox').prop(
                        'checked',
                        $(this).prop('checked')
                    );

                }
            );


            $('.videoCheckbox').on(
                'change',
                function() {

                    $('#selectAll').prop(
                        'checked',
                        $('.videoCheckbox:checked').length ===
                        $('.videoCheckbox').length
                    );

                }
            );


            $('.deleteVideoBtn').on(
                'click',
                function() {

                    let id =
                        $(this).data('id');


                    if (
                        !confirm(
                            'Are you sure you want to delete this video?'
                        )
                    ) {

                        return false;
                    }


                    let deleteUrl =
                        "{{ route('admin.video-gallery.destroy', ':id') }}";

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
                                'Something went wrong while deleting the video.'
                            );

                        }

                    });

                }
            );


            $('#bulkDeleteBtn').on(
                'click',
                function() {

                    let ids = [];


                    $('.videoCheckbox:checked').each(
                        function() {

                            ids.push(
                                $(this).val()
                            );

                        }
                    );


                    if (ids.length === 0) {

                        alert(
                            'Please select at least one video.'
                        );

                        return false;
                    }


                    if (
                        !confirm(
                            'Are you sure you want to delete selected videos?'
                        )
                    ) {

                        return false;
                    }


                    $.ajax({

                        url: "{{ route('admin.video-gallery.bulk-delete') }}",

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

                                alert(
                                    xhr.responseJSON.message
                                );

                            } else {

                                alert(
                                    'Something went wrong while deleting selected videos.'
                                );

                            }

                        }

                    });

                }
            );

        });
    </script>

@endsection
