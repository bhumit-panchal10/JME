@extends('layouts.app')
@section('title', 'Inquiry List')
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
                                <h5 class="card-title mb-0">Inquiry List</h5>
                                {{-- <a data-bs-toggle="modal" data-bs-target="#AddModal" class="btn btn-sm btn-primary">
                                    <i data-feather="plus"></i> Add New
                                </a> --}}
                            </div>
                            <div class="card-body">

                                <div class="d-flex justify-content-end align-items-center mb-3 gap-2">



                                    <button type="button" class="btn btn-danger btn-sm" id="multiDeleteBtn"
                                        data-bs-toggle="modal" data-bs-target="#multiDeleteRecordModal" disabled>
                                        <i class="fa fa-trash"></i> Delete Selected
                                    </button>

                                </div>


                                <table id="scroll-horizontal" class="table nowrap align-middle" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th width="1%">
                                                <input type="checkbox" id="selectAll">
                                            </th>
                                            <th width="1%">No</th>
                                            <th width="5%">Name</th>
                                            <th width="5%">Phone</th>
                                            <th width="5%">Email</th>
                                            <th width="5%">Comment</th>
                                            <th width="5%">Date</th>
                                            <th width="5%">Time</th>
                                            <th width="5%">Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php $i = 1; ?>

                                        @foreach ($Inquiries as $Inquiry)
                                            <tr class="text-center">

                                                <td>
                                                    <input type="checkbox" class="inquiry-checkbox" name="inquiry_ids[]"
                                                        value="{{ $Inquiry->id }}">
                                                </td>

                                                <td>
                                                    {{ $i + $Inquiries->perPage() * ($Inquiries->currentPage() - 1) }}
                                                </td>

                                                <td>{{ $Inquiry->name }}</td>
                                                <td>{{ $Inquiry->mobile }}</td>
                                                <td>{{ $Inquiry->email }}</td>
                                                <td>{{ $Inquiry->comment }}</td>

                                                <td>
                                                    {{ date('d-m-Y', strtotime($Inquiry->created_at)) }}
                                                </td>

                                                <td>
                                                    {{ date('H:i', strtotime($Inquiry->created_at)) }}
                                                </td>

                                                <td>
                                                    <div class="gap-4">
                                                        <a href="#" title="Delete" data-bs-toggle="modal"
                                                            data-bs-target="#deleteRecordModal"
                                                            onclick="deleteData({{ $Inquiry->id }});">
                                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                                        </a>
                                                    </div>
                                                </td>

                                            </tr>

                                            <?php $i++; ?>
                                        @endforeach
                                    </tbody>
                                </table>

                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    <div>
                                        {{ $Inquiries->links() }}
                                    </div>

                                </div>


                                <div class="d-flex justify-content-center mt-3">
                                    {{ $Inquiries->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!--Delete Modal Start -->
                <div class="modal fade zoomIn" id="deleteRecordModal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                    id="btn-close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mt-2 text-center">
                                    <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop"
                                        colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px">
                                    </lord-icon>
                                    <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                                        <h4>Are you Sure ?</h4>
                                        <p class="text-muted mx-4 mb-0">Are you Sure You want to Remove this Record
                                            ?</p>
                                    </div>
                                </div>
                                <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                                    <a class="btn btn-primary mx-2" href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('user-delete-form').submit();">
                                        Yes,
                                        Delete It!
                                    </a>
                                    <button type="button" class="btn w-sm btn-primary mx-2"
                                        data-bs-dismiss="modal">Close</button>
                                    <form id="user-delete-form" method="POST" action="{{ route('inquiry.delete') }}">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="inquiryid" id="deleteid" value="">

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Multi Delete Modal Start -->
                <div class="modal fade zoomIn" id="multiDeleteRecordModal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">

                            <div class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                </button>
                            </div>

                            <div class="modal-body">

                                <div class="mt-2 text-center">

                                    <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop"
                                        colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px">
                                    </lord-icon>

                                    <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                                        <h4>Are you Sure?</h4>

                                        <p class="text-muted mx-4 mb-0">
                                            Are you sure you want to delete the selected inquiries?
                                        </p>
                                    </div>

                                </div>

                                <div class="d-flex gap-2 justify-content-center mt-4 mb-2">

                                    <button type="button" class="btn btn-danger mx-2" onclick="submitMultiDelete()">
                                        Yes, Delete It!
                                    </button>

                                    <button type="button" class="btn btn-primary mx-2" data-bs-dismiss="modal">
                                        Close
                                    </button>

                                </div>

                                <form id="multi-delete-form" method="POST" action="{{ route('inquiry.multidelete') }}">

                                    @csrf
                                    @method('DELETE')

                                    <div id="selected-inquiries"></div>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- Multi Delete Modal End -->



            </div>
        </div>
    </div>
@endsection

@section('scripts')

    <script>
        function deleteData(id) {
            $("#deleteid").val(id);
        }
    </script>
    <script>
        function CancelData(id) {
            $("#cancelid").val(id);
        }
    </script>
    <script>
        // Select All
        $("#selectAll").on("change", function() {

            $(".inquiry-checkbox").prop("checked", this.checked);

            updateDeleteButton();
        });


        // Individual checkbox
        $(document).on("change", ".inquiry-checkbox", function() {

            let total = $(".inquiry-checkbox").length;
            let checked = $(".inquiry-checkbox:checked").length;

            // Check Select All if all are selected
            $("#selectAll").prop("checked", total > 0 && total === checked);

            updateDeleteButton();
        });


        // Enable / Disable Multi Delete button
        function updateDeleteButton() {

            let checked = $(".inquiry-checkbox:checked").length;

            if (checked > 0) {
                $("#multiDeleteBtn").prop("disabled", false);
            } else {
                $("#multiDeleteBtn").prop("disabled", true);
            }
        }


        // Single Delete
        function deleteData(id) {
            $("#deleteid").val(id);
        }


        // Multi Delete
        function submitMultiDelete() {

            let selectedIds = [];

            $(".inquiry-checkbox:checked").each(function() {
                selectedIds.push($(this).val());
            });

            if (selectedIds.length === 0) {
                alert("Please select at least one inquiry.");
                return;
            }

            $("#selected-inquiries").html("");

            $.each(selectedIds, function(index, id) {

                $("#selected-inquiries").append(
                    '<input type="hidden" name="inquiry_ids[]" value="' + id + '">'
                );

            });

            $("#multi-delete-form").submit();
        }


        // Cancel
        function CancelData(id) {
            $("#cancelid").val(id);
        }
    </script>
@endsection
