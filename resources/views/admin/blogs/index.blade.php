@extends('layouts.app')

@section('title', 'JME Group - Blogs')

@section('content')

    <div class="main-content">

        <div class="page-content">

            <div class="container-fluid">

                {{-- Alert Messages --}}
                @include('common.alert')


                <div class="card">

                    <div class="card-header">

                        <div class="d-flex justify-content-between align-items-center">

                            <h5 class="card-title mb-0">

                                Blogs List

                            </h5>


                            <div>

                                {{-- Bulk Delete --}}
                                <button type="button" class="btn btn-danger btn-sm" id="bulkDeleteBtn">

                                    <i class="fas fa-trash"></i>

                                    Delete Selected

                                </button>


                                {{-- Add New --}}
                                <a href="{{ route('admin.blogs.create') }}" class="btn btn-primary btn-sm">

                                    <i class="fas fa-plus"></i>

                                    Add New

                                </a>

                            </div>

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

                                        <th>
                                            Category
                                        </th>

                                        <th>
                                            Service
                                        </th>

                                        <th>
                                            Blog Name
                                        </th>

                                        <th>
                                            Description
                                        </th>

                                        <th style="width:110px;">
                                            Action
                                        </th>

                                    </tr>

                                </thead>


                                <tbody>

                                    @forelse ($blogs as $blog)
                                        <tr>

                                            <td>

                                                <input type="checkbox" class="blogCheckbox" value="{{ $blog->id }}">

                                            </td>


                                            <td>

                                                {{ optional($blog->category)->name }}

                                            </td>


                                            <td>

                                                {{ optional($blog->service)->name }}

                                            </td>


                                            <td>

                                                {{ $blog->name }}

                                            </td>


                                            <td>

                                                {{ \Illuminate\Support\Str::limit(strip_tags($blog->description), 100) }}

                                            </td>


                                            <td>

                                                {{-- Edit --}}
                                                <a href="{{ route('admin.blogs.edit', $blog->id) }}"
                                                    class="btn btn-sm btn-primary" title="Edit">

                                                    <i class="fas fa-edit"></i>

                                                </a>


                                                {{-- Delete --}}
                                                <button type="button" class="btn btn-sm btn-danger deleteBlogBtn"
                                                    title="Delete" data-id="{{ $blog->id }}">

                                                    <i class="fas fa-trash"></i>

                                                </button>

                                            </td>

                                        </tr>

                                    @empty

                                        <tr>

                                            <td colspan="6" class="text-center">

                                                No blogs found.

                                            </td>

                                        </tr>
                                    @endforelse

                                </tbody>

                            </table>

                        </div>


                        {{-- Pagination --}}
                        <div class="d-flex justify-content-center mt-3">

                            {{ $blogs->links() }}

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
            /*
            |--------------------------------------------------------------------------
            | Select All
            |--------------------------------------------------------------------------
            */
            $('#selectAll').on(
                'change',
                function() {

                    $('.blogCheckbox').prop(
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
            $('.blogCheckbox').on(
                'change',
                function() {

                    $('#selectAll').prop(
                        'checked',
                        $('.blogCheckbox:checked').length ===
                        $('.blogCheckbox').length
                    );

                }
            );


            /*
            |--------------------------------------------------------------------------
            | Single Delete
            |--------------------------------------------------------------------------
            */
            $('.deleteBlogBtn').on(
                'click',
                function() {

                    let id =
                        $(this).data('id');


                    if (
                        !confirm(
                            'Are you sure you want to delete this blog?'
                        )
                    ) {

                        return false;

                    }


                    let deleteUrl =
                        "{{ route('admin.blogs.destroy', ':id') }}";


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
                                'Something went wrong while deleting the blog.'
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


                    $('.blogCheckbox:checked').each(
                        function() {

                            ids.push(
                                $(this).val()
                            );

                        }
                    );


                    if (ids.length === 0) {

                        alert(
                            'Please select at least one blog.'
                        );

                        return false;

                    }


                    if (
                        !confirm(
                            'Are you sure you want to delete selected blogs?'
                        )
                    ) {

                        return false;

                    }


                    $.ajax({

                        url: "{{ route('admin.blogs.bulk-delete') }}",

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
                                    'Something went wrong while deleting selected blogs.'
                                );

                            }

                        }

                    });

                }
            );

        });
    </script>

@endsection
