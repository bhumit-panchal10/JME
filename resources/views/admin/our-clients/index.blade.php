@extends('layouts.app')

@section('title', 'JME Group - Our Clients')

@section('content')

    <div class="main-content">

        <div class="page-content">

            <div class="container-fluid">

                {{-- Alert Messages --}}
                @include('common.alert')


                <div class="row">

                    {{-- ====================================================== --}}
                    {{-- LEFT SIDE - ADD CLIENT --}}
                    {{-- ====================================================== --}}

                    <div class="col-lg-4">

                        <div class="card">

                            <div class="card-header">

                                <h5 class="card-title mb-0">
                                    Add Client
                                </h5>

                            </div>


                            <div class="card-body">

                                <form action="{{ route('admin.our-clients.store') }}" method="POST"
                                    enctype="multipart/form-data">

                                    @csrf


                                    {{-- Client Name --}}
                                    <div class="mb-3">

                                        <label class="form-label">

                                            Client Name

                                            <span style="color:red;">*</span>

                                        </label>


                                        <input type="text" name="name" class="form-control" maxlength="255"
                                            placeholder="Enter Client Name" value="{{ old('name') }}">


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


                                    <button type="submit" class="btn btn-primary">

                                        <i class="fas fa-save"></i>

                                        Save

                                    </button>

                                </form>

                            </div>

                        </div>

                    </div>


                    {{-- ====================================================== --}}
                    {{-- RIGHT SIDE - LISTING --}}
                    {{-- ====================================================== --}}

                    <div class="col-lg-8">

                        <div class="card">

                            <div class="card-header">

                                <div class="d-flex justify-content-between align-items-center">

                                    <h5 class="card-title mb-0">

                                        Our Clients List

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

                                                <th style="width:120px;">
                                                    Image
                                                </th>

                                                <th>
                                                    Client Name
                                                </th>

                                                <th style="width:110px;">
                                                    Action
                                                </th>

                                            </tr>

                                        </thead>


                                        <tbody>

                                            @forelse ($ourClients as $ourClient)
                                                <tr>

                                                    <td>

                                                        <input type="checkbox" class="clientCheckbox"
                                                            value="{{ $ourClient->id }}">

                                                    </td>


                                                    {{-- Image --}}
                                                    <td>

                                                        @if (!empty($ourClient->image))
                                                            <img src="{{ asset('our-client/' . $ourClient->image) }}"
                                                                alt="{{ $ourClient->name }}"
                                                                style="
                                                                width:70px;
                                                                height:55px;
                                                                object-fit:contain;
                                                            ">
                                                        @else
                                                            <span class="text-muted">
                                                                No Image
                                                            </span>
                                                        @endif

                                                    </td>


                                                    {{-- Name --}}
                                                    <td>

                                                        {{ $ourClient->name }}

                                                    </td>


                                                    {{-- Action --}}
                                                    <td>

                                                        <button type="button" class="btn btn-sm btn-primary editClientBtn"
                                                            title="Edit" data-id="{{ $ourClient->id }}"
                                                            data-name="{{ $ourClient->name }}"
                                                            data-image="{{ $ourClient->image }}">

                                                            <i class="fas fa-edit"></i>

                                                        </button>


                                                        <button type="button" class="btn btn-sm btn-danger deleteClientBtn"
                                                            title="Delete" data-id="{{ $ourClient->id }}">

                                                            <i class="fas fa-trash"></i>

                                                        </button>

                                                    </td>

                                                </tr>

                                            @empty

                                                <tr>

                                                    <td colspan="4" class="text-center">

                                                        No clients found.

                                                    </td>

                                                </tr>
                                            @endforelse

                                        </tbody>

                                    </table>

                                </div>


                                {{-- Pagination --}}
                                <div class="d-flex justify-content-center mt-3">

                                    {{ $ourClients->links() }}

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- ================================================================ --}}
    {{-- EDIT CLIENT MODAL --}}
    {{-- ================================================================ --}}

    <div class="modal fade" id="editClientModal" tabindex="-1" aria-hidden="true">

        <div class="modal-dialog">

            <div class="modal-content">

                <form method="POST" id="editClientForm" enctype="multipart/form-data">

                    @csrf
                    @method('PUT')


                    <div class="modal-header">

                        <h5 class="modal-title">
                            Edit Client
                        </h5>


                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>

                    </div>


                    <div class="modal-body">


                        {{-- Client Name --}}
                        <div class="mb-3">

                            <label class="form-label">

                                Client Name

                                <span style="color:red;">*</span>

                            </label>


                            <input type="text" name="name" id="edit_name" class="form-control" maxlength="255"
                                placeholder="Enter Client Name">


                            @if ($errors->has('name'))
                                <span class="text-danger">

                                    {{ $errors->first('name') }}

                                </span>
                            @endif

                        </div>


                        {{-- Current Image --}}
                        <div class="mb-3" id="currentImageBox" style="display:none;">

                            <label class="form-label">
                                Current Image
                            </label>

                            <br>

                            <img src="" id="currentImage" alt="Current Image"
                                style="
                                max-width:150px;
                                max-height:100px;
                                object-fit:contain;
                                border:1px solid #ddd;
                                padding:5px;
                            ">

                        </div>


                        {{-- New Image --}}
                        <div class="mb-3">

                            <label class="form-label">
                                Change Image
                            </label>


                            <input type="file" name="image" class="form-control" accept="image/*">


                            @if ($errors->has('image'))
                                <span class="text-danger">

                                    {{ $errors->first('image') }}

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

            /*
            |--------------------------------------------------------------------------
            | Open Edit Modal
            |--------------------------------------------------------------------------
            */
            $('.editClientBtn').on(
                'click',
                function() {

                    let id =
                        $(this).data('id');

                    let name =
                        $(this).attr('data-name');

                    let image =
                        $(this).attr('data-image');


                    $('#edit_name').val(name);


                    /*
                    |--------------------------------------------------------------------------
                    | Current Image
                    |--------------------------------------------------------------------------
                    */
                    if (image) {

                        let imageUrl =
                            "{{ asset('our-client') }}/" +
                            image;

                        $('#currentImage')
                            .attr(
                                'src',
                                imageUrl
                            );

                        $('#currentImageBox')
                            .show();

                    } else {

                        $('#currentImageBox')
                            .hide();

                        $('#currentImage')
                            .attr(
                                'src',
                                ''
                            );

                    }


                    /*
                    |--------------------------------------------------------------------------
                    | Update URL
                    |--------------------------------------------------------------------------
                    */
                    let updateUrl =
                        "{{ route('admin.our-clients.update', ':id') }}";


                    updateUrl =
                        updateUrl.replace(
                            ':id',
                            id
                        );


                    $('#editClientForm')
                        .attr(
                            'action',
                            updateUrl
                        );


                    /*
                    |--------------------------------------------------------------------------
                    | Show Modal
                    |--------------------------------------------------------------------------
                    */
                    let editModal =
                        new bootstrap.Modal(
                            document.getElementById(
                                'editClientModal'
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

                    $('.clientCheckbox').prop(
                        'checked',
                        $(this).prop('checked')
                    );

                }
            );


            /*
            |--------------------------------------------------------------------------
            | Individual Checkbox
            |--------------------------------------------------------------------------
            */
            $('.clientCheckbox').on(
                'change',
                function() {

                    $('#selectAll').prop(
                        'checked',

                        $('.clientCheckbox:checked').length ===
                        $('.clientCheckbox').length
                    );

                }
            );


            /*
            |--------------------------------------------------------------------------
            | Single Delete
            |--------------------------------------------------------------------------
            */
            $('.deleteClientBtn').on(
                'click',
                function() {

                    let id =
                        $(this).data('id');


                    if (
                        !confirm(
                            'Are you sure you want to delete this client?'
                        )
                    ) {

                        return false;

                    }


                    let deleteUrl =
                        "{{ route('admin.our-clients.destroy', ':id') }}";


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

                            if (
                                response.status === true
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
                                'Something went wrong while deleting the client.'
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


                    $('.clientCheckbox:checked').each(
                        function() {

                            ids.push(
                                $(this).val()
                            );

                        }
                    );


                    if (ids.length === 0) {

                        alert(
                            'Please select at least one client.'
                        );

                        return false;

                    }


                    if (
                        !confirm(
                            'Are you sure you want to delete selected clients?'
                        )
                    ) {

                        return false;

                    }


                    $.ajax({

                        url: "{{ route('admin.our-clients.bulk-delete') }}",

                        type: 'POST',

                        data: {

                            _token: "{{ csrf_token() }}",

                            ids: ids

                        },

                        success: function(response) {

                            if (
                                response.status === true
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
                                    'Something went wrong while deleting selected clients.'
                                );

                            }

                        }

                    });

                }
            );

        });
    </script>

@endsection
