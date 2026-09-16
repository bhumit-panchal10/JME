@extends('layouts.app')
@section('title', 'NewsLetter List')
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
                                <h5 class="card-title mb-0">NewsLetter List</h5>
                                <a data-bs-toggle="modal" data-bs-target="#AddModal" class="btn btn-sm btn-primary">
                                    <i data-feather="plus"></i> Add New
                                </a>
                                <button type="button" class="btn btn-danger btn-sm" onclick="setBulkDelete()">
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

                                            <th width="2%"> Title</th>
                                            <th width="2%"> Date</th>
                                            <th width="5%">Image</th>
                                            <th width="1%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        @foreach ($NewsLetters as $cat)
                                            {{-- @dd($cat); --}}
                                            <tr class="text-center">
                                                <td>
                                                    <input type="checkbox" class="rowCheckbox" value="{{ $cat->id }}">
                                                </td>
                                                <td>{{ $i + $NewsLetters->perPage() * ($NewsLetters->currentPage() - 1) }}
                                                </td>

                                                <td>{{ $cat->title ?? '' }}</td>
                                                <td>
                                                    {{ !empty($cat->date) ? date('d-m-Y', strtotime($cat->date)) : '' }}
                                                </td>
                                                <td class="text-center">
                                                    @if ($cat->image)
                                                        <img src="{{ asset('uploads/NewsLetters') . '/' . $cat->image }}"
                                                            style="width: 50px;height: 50px;">
                                                    @else
                                                        <img src="{{ asset('assets/images/noimage.png') }}"
                                                            style="width: 50px;height: 50px;">
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="gap-2">
                                                        <a class="mx-1" title="Edit" href="#"
                                                            onclick="getEditData(<?= $cat->id ?>)" data-bs-toggle="modal"
                                                            data-bs-target="#showModal">
                                                            <i class="far fa-edit"></i>
                                                        </a>

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
                                    {{ $NewsLetters->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Add Modal Start-->
                <div class="modal fade flip" id="AddModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header bg-light p-3">
                                <h5 class="modal-title" id="exampleModalLabel">Add NewsLetter</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                    id="close-modal"></button>
                            </div>
                            <form method="POST" action="{{ route('NewsLetter.store') }}" autocomplete="off"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="modal-body">

                                    <div class="mb-3">
                                        <span style="color:red;">*</span>Title
                                        <input type="text" class="form-control" name="title" placeholder="Enter Title"
                                            autocomplete="off" required>
                                    </div>

                                    <div class="mb-3">
                                        <span style="color:red;">*</span>Date
                                        <input type="date" class="form-control" name="date" placeholder="Enter Date"
                                            autocomplete="off" required>
                                    </div>

                                    <div class="mb-3">
                                        <span style="color:red;">*</span>Image
                                        <input type="file" class="form-control" name="image" placeholder="Enter Image"
                                            autocomplete="off" required>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <div class="hstack gap-2 justify-content-end">
                                        <button type="submit" class="btn btn-primary mx-2" id="add-btn">Submit</button>
                                        <button type="button" class="btn btn-primary mx-2"
                                            data-bs-dismiss="modal">Cancel</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!--Add Modal End -->

                <!--Edit Modal Start-->
                <div class="modal fade flip" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header bg-light p-3">
                                <h5 class="modal-title" id="exampleModalLabel">Edit NewsLetter</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                    id="close-modal"></button>
                            </div>
                            <form method="POST" action="{{ route('NewsLetter.update') }}" autocomplete="off"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="NewsLetterid" id="NewsLetterid" value="">

                                <div class="modal-body">

                                    <div class="mb-3">
                                        <span style="color:red;">*</span>Title
                                        <input type="text" class="form-control" name="title" id="Edittitle"
                                            placeholder="Enter Title" value="" maxlength="100" autocomplete="off"
                                            required>
                                    </div>
                                    <div class="mb-3">
                                        <span style="color:red;">*</span>Date
                                        <input type="date" class="form-control" name="date" id="Editdate"
                                            placeholder="Enter Date" value="" maxlength="100" autocomplete="off"
                                            required>
                                    </div>
                                    <div class="mb-3">
                                        <span style="color:red;">*</span>Image
                                        <input type="file" class="form-control" name="image" id="Editimage">
                                    </div>

                                    <div class="mb-3">
                                        <img id="oldImagePreview" src="" style="width:70px;height:70px;">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <div class="hstack gap-2 justify-content-end">
                                        <button type="submit" class="btn btn-primary mx-2"
                                            id="add-btn">Update</button>
                                        <button type="button" class="btn btn-primary mx-2"
                                            data-bs-dismiss="modal">Cancel</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!--Edit Modal End -->

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

                                <form id="delete-form" method="POST" action="{{ route('NewsLetter.delete') }}">
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
        function getEditData(id) {
            var url = "{{ route('NewsLetter.edit', ':id') }}";
            url = url.replace(":id", id);

            $.ajax({
                url: url,
                type: 'GET',
                success: function(response) {

                    console.log(response);

                    if (response.status) {

                        $("#NewsLetterid").val(response.data.id);
                        $("#Edittitle").val(response.data.title);
                        $("#Editdate").val(response.data.date);

                        if (response.data.image) {
                            $("#oldImagePreview").attr("src", "/uploads/NewsLetters/" + response.data.image);
                        } else {
                            $("#oldImagePreview").attr("src", "/assets/images/noimage.png");
                        }

                    }
                }
            });
        }
    </script>

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

                Swal.fire({
                    icon: 'warning',
                    title: 'No Record Selected',
                    text: 'Please select at least one record.',
                    confirmButtonColor: '#d33'
                });

                return false;
            }

            $("#deleteIds").val(selected.join(','));

            // Agar checkbox select hai tabhi modal open karo
            var myModal = new bootstrap.Modal(document.getElementById('deleteRecordModal'));
            myModal.show();
        }
    </script>

@endsection
