@extends('layouts.app')
@section('title', 'Contact Us Inquiry List')
@section('content')

    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">

                {{-- Alert Messages --}}
                @include('common.alert')

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="d-flex justify-content-between card-header">
                                <h5 class="card-title mb-0">Contact Us Inquiry List</h5>
                                <a href="{{ route('ContactUsInquiry.export') }}" class="btn btn-success btn-sm">
                                    <i class="fa fa-file-excel"></i> Export Excel
                                </a>
                                <button type="button" class="btn btn-danger btn-sm" onclick="setBulkDelete()"
                                    data-bs-toggle="modal" data-bs-target="#deleteRecordModal">
                                    Delete Selected
                                </button>
                            </div>
                            <div class="card-body">

                                <table id="scroll-horizontal" class="table nowrap align-middle" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th width="1%">
                                                <input type="checkbox" id="selectAll">
                                            </th>
                                            <th width="1%">No</th>

                                            <th width="2%"> Name</th>
                                            <th width="5%">Mobile</th>
                                            <th width="5%">Department</th>
                                            <th width="5%">Email</th>
                                            <th width="5%">Message</th>
                                            <th width="1%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        @foreach ($ContactUsInquiry as $cat)
                                            <tr class="text-center">
                                                <td>
                                                    <input type="checkbox" class="rowCheckbox" value="{{ $cat->id }}">
                                                </td>
                                                <td>{{ $i + $ContactUsInquiry->perPage() * ($ContactUsInquiry->currentPage() - 1) }}
                                                </td>

                                                <td>{{ $cat->name ?? '' }}</td>
                                                <td>{{ $cat->mobile ?? '' }}</td>
                                                <td>{{ $cat->department ?? '' }}</td>
                                                <td>{{ $cat->email ?? '' }}</td>
                                                <td>{{ $cat->message ?? '' }}</td>
                                                <td>
                                                    <div class="gap-2">
                                                        {{-- <a class="mx-1" title="Edit" href="#"
                                                            onclick="getEditData(<?= $cat->id ?>)" data-bs-toggle="modal"
                                                            data-bs-target="#showModal">
                                                            <i class="far fa-edit"></i>
                                                        </a> --}}

                                                        <a class="" href="#" data-bs-toggle="modal"
                                                            title="Delete" data-bs-target="#deleteRecordModal"
                                                            onclick="setSingleDelete(<?= $cat->id ?>);">
                                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                                        </a>

                                                    </div>
                                                </td>
                                            </tr>
                                            <?php $i++; ?>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-center mt-3">
                                    {{ $ContactUsInquiry->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="modal fade zoomIn" id="deleteRecordModal" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>

                            <div class="modal-body text-center">
                                <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop"
                                    colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px">
                                </lord-icon>

                                <h4>Are you sure?</h4>
                                <p class="text-muted">You want to delete selected record(s)?</p>

                                <form id="delete-form" method="POST" action="{{ route('ContactUsInquiry.delete') }}">
                                    @csrf
                                    @method('DELETE')

                                    <!-- yaha ids store honge -->
                                    <input type="hidden" name="ids" id="deleteIds">

                                    <div class="d-flex gap-2 justify-content-center mt-4">
                                        <button type="submit" class="btn btn-danger">
                                            Yes, Delete It!
                                        </button>

                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Cancel</button>
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

    <script>
        // Select All
        $("#selectAll").click(function() {
            $(".rowCheckbox").prop('checked', $(this).prop('checked'));
        });

        // Single Delete
        function setSingleDelete(id) {
            $("#deleteIds").val(id);
        }

        // Bulk Delete
        function setBulkDelete() {

            let selected = [];

            $(".rowCheckbox:checked").each(function() {
                selected.push($(this).val());
            });

            if (selected.length === 0) {
                alert("Please select at least one record.");
                event.stopPropagation(); // modal open hone se rokega
                return false;
            }

            $("#deleteIds").val(selected.join(','));
        }
    </script>

@endsection
