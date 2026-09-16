@extends('layouts.app')

@section('title', 'JME Group - Services')

@section('content')

    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">

                {{-- Alert Messages --}}
                @include('common.alert')


                <div class="row">
                    <div class="col-lg-12">

                        <div class="card">

                            <div class="card-header">

                                <div class="d-flex justify-content-between align-items-center">

                                    <h5 class="card-title mb-0">
                                        Service List
                                    </h5>

                                    <a href="{{ route('admin.services.create') }}" class="btn btn-sm btn-primary">
                                        <i class="fas fa-plus"></i>
                                        Add New
                                    </a>

                                </div>

                            </div>


                            <div class="card-body">

                                {{-- Search --}}
                                <form method="GET" action="{{ route('admin.services.index') }}" class="mb-4">

                                    <div class="row">

                                        {{-- Category Search --}}
                                        <div class="col-md-4 mb-2">

                                            <label class="form-label">
                                                Category
                                            </label>

                                            <select name="category_id" class="form-control">

                                                <option value="">
                                                    All Categories
                                                </option>

                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}"
                                                        {{ request('category_id') == $category->id ? 'selected' : '' }}>
                                                        {{ $category->name }}
                                                    </option>
                                                @endforeach

                                            </select>

                                        </div>


                                        {{-- Service Name Search --}}
                                        <div class="col-md-4 mb-2">

                                            <label class="form-label">
                                                Service Name
                                            </label>

                                            <input type="text" name="service_name" value="{{ request('service_name') }}"
                                                class="form-control" placeholder="Search service name">

                                        </div>


                                        <div class="col-md-4 mb-2 d-flex align-items-end">

                                            <button type="submit" class="btn btn-primary me-2">
                                                <i class="fas fa-search"></i>
                                                Search
                                            </button>

                                            <a href="{{ route('admin.services.index') }}" class="btn btn-secondary">
                                                <i class="fas fa-sync"></i>
                                                Reset
                                            </a>

                                        </div>

                                    </div>

                                </form>


                                {{-- Bulk Delete --}}
                                <div class="mb-3">

                                    <button type="button" id="bulkDeleteBtn" class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash"></i>
                                        Delete Selected
                                    </button>

                                </div>


                                <div class="table-responsive">

                                    <table class="table table-bordered table-striped align-middle">

                                        <thead>

                                            <tr>

                                                <th style="width:40px;">
                                                    <input type="checkbox" id="selectAll">
                                                </th>

                                                <th>Image</th>

                                                <th>Category</th>

                                                <th>Service Name</th>

                                                <th>Short Description</th>

                                                <th style="width:100px;">
                                                    Action
                                                </th>

                                            </tr>

                                        </thead>


                                        <tbody>

                                            @forelse($services as $service)
                                                <tr>

                                                    <td>

                                                        <input type="checkbox" class="serviceCheckbox"
                                                            value="{{ $service->id }}">

                                                    </td>


                                                    {{-- Image always displayed --}}
                                                    <td>

                                                        @if (!empty($service->image))
                                                            <img src="{{ asset('services/' . $service->image) }}"
                                                                alt="{{ $service->name }}"
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


                                                    <td>
                                                        {{ optional($service->category)->name }}
                                                    </td>


                                                    <td>
                                                        {{ $service->name }}
                                                    </td>


                                                    <td>

                                                        @if (!empty($service->short_description))
                                                            {{ \Illuminate\Support\Str::limit(strip_tags($service->short_description), 80) }}
                                                        @else
                                                            -
                                                        @endif

                                                    </td>


                                                    <td>

                                                        <a href="{{ route('admin.services.edit', $service->id) }}"
                                                            class="btn btn-sm btn-primary" title="Edit">
                                                            <i class="fas fa-edit"></i>
                                                        </a>


                                                        <button type="button"
                                                            class="btn btn-sm btn-danger deleteServiceBtn"
                                                            data-id="{{ $service->id }}" title="Delete">
                                                            <i class="fas fa-trash"></i>
                                                        </button>

                                                    </td>

                                                </tr>

                                            @empty

                                                <tr>

                                                    <td colspan="6" class="text-center">
                                                        No services found.
                                                    </td>

                                                </tr>
                                            @endforelse

                                        </tbody>

                                    </table>

                                </div>


                                {{-- Pagination --}}
                                <div class="d-flex justify-content-center mt-3">

                                    {{ $services->links() }}

                                </div>

                            </div>

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection


@section('scripts')

    <script>
        $(document).ready(function() {

            /**
             * Select All
             */
            $('#selectAll').on('change', function() {

                $('.serviceCheckbox').prop(
                    'checked',
                    $(this).prop('checked')
                );

            });


            $('.serviceCheckbox').on('change', function() {

                if (
                    $('.serviceCheckbox:checked').length ==
                    $('.serviceCheckbox').length
                ) {

                    $('#selectAll').prop('checked', true);

                } else {

                    $('#selectAll').prop('checked', false);

                }

            });


            /**
             * Single delete.
             */
            $('.deleteServiceBtn').on('click', function() {

                let id = $(this).data('id');

                if (
                    !confirm(
                        'Are you sure you want to delete this service?'
                    )
                ) {
                    return false;
                }

                let url =
                    "{{ route('admin.services.destroy', ':id') }}";

                url = url.replace(':id', id);


                $.ajax({

                    url: url,

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
                            'Something went wrong while deleting the service.'
                        );

                    }

                });

            });


            /**
             * Bulk delete.
             */
            $('#bulkDeleteBtn').on('click', function() {

                let ids = [];


                $('.serviceCheckbox:checked').each(function() {

                    ids.push($(this).val());

                });


                if (ids.length === 0) {

                    alert(
                        'Please select at least one service.'
                    );

                    return false;

                }


                if (
                    !confirm(
                        'Are you sure you want to delete selected services?'
                    )
                ) {

                    return false;

                }


                $.ajax({

                    url: "{{ route('admin.services.bulk-delete') }}",

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

                    error: function() {

                        alert(
                            'Something went wrong while deleting selected services.'
                        );

                    }

                });

            });

        });
    </script>

@endsection
