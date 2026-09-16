@extends('layouts.app')

@section('title', 'JME Group - FAQs')

@section('content')

    <div class="main-content">

        <div class="page-content">

            <div class="container-fluid">

                {{-- Alert Messages --}}
                @include('common.alert')


                <div class="row">

                    {{-- ====================================================== --}}
                    {{-- LEFT SIDE - ADD FAQ --}}
                    {{-- ====================================================== --}}

                    <div class="col-lg-4">

                        <div class="card">

                            <div class="card-header">

                                <h5 class="card-title mb-0">
                                    Add FAQ
                                </h5>

                            </div>


                            <div class="card-body">

                                <form action="{{ route('admin.faqs.store') }}" method="POST">

                                    @csrf


                                    {{-- ====================================== --}}
                                    {{-- SERVICE --}}
                                    {{-- ====================================== --}}

                                    <div class="mb-3">

                                        <label class="form-label">

                                            Service

                                            <span style="color:red;">*</span>

                                        </label>

                                        <select name="service_id" id="service_id" class="form-control">

                                            <option value="">
                                                Select Service
                                            </option>

                                            @foreach ($services as $service)
                                                <option value="{{ $service->id }}"
                                                    {{ old('service_id') == $service->id ? 'selected' : '' }}>

                                                    {{ $service->name }}

                                                </option>
                                            @endforeach

                                        </select>


                                        @if ($errors->has('service_id'))
                                            <span class="text-danger">

                                                {{ $errors->first('service_id') }}

                                            </span>
                                        @endif

                                    </div>


                                    {{-- ====================================== --}}
                                    {{-- QUESTION --}}
                                    {{-- ====================================== --}}

                                    <div class="mb-3">

                                        <label class="form-label">

                                            Question

                                            <span style="color:red;">*</span>

                                        </label>

                                        <textarea name="question" id="question" class="form-control" rows="3" maxlength="500"
                                            placeholder="Enter Question">{{ old('question') }}</textarea>


                                        @if ($errors->has('question'))
                                            <span class="text-danger">

                                                {{ $errors->first('question') }}

                                            </span>
                                        @endif

                                    </div>


                                    {{-- ====================================== --}}
                                    {{-- ANSWER --}}
                                    {{-- ====================================== --}}

                                    <div class="mb-3">

                                        <label class="form-label">

                                            Answer

                                        </label>

                                        <textarea name="answer" id="answer" class="form-control" rows="6" placeholder="Enter Answer">{{ old('answer') }}</textarea>


                                        @if ($errors->has('answer'))
                                            <span class="text-danger">

                                                {{ $errors->first('answer') }}

                                            </span>
                                        @endif

                                    </div>


                                    {{-- ====================================== --}}
                                    {{-- SAVE --}}
                                    {{-- ====================================== --}}

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


                    {{-- ====================================================== --}}
                    {{-- RIGHT SIDE - FAQ LISTING --}}
                    {{-- ====================================================== --}}

                    <div class="col-lg-8">

                        <div class="card">

                            <div class="card-header">

                                <div class="d-flex justify-content-between align-items-center">

                                    <h5 class="card-title mb-0">

                                        FAQs List

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


                                                <th>
                                                    Service
                                                </th>


                                                <th>
                                                    Question
                                                </th>


                                                <th>
                                                    Answer
                                                </th>


                                                <th style="width:110px;">
                                                    Action
                                                </th>

                                            </tr>

                                        </thead>


                                        <tbody>

                                            @forelse ($faqs as $faq)
                                                <tr>

                                                    {{-- Checkbox --}}
                                                    <td>

                                                        <input type="checkbox" class="faqCheckbox"
                                                            value="{{ $faq->id }}">

                                                    </td>


                                                    {{-- Service --}}
                                                    <td>

                                                        {{ optional($faq->service)->name }}

                                                    </td>


                                                    {{-- Question --}}
                                                    <td>

                                                        {{ $faq->question }}

                                                    </td>


                                                    {{-- Answer --}}
                                                    <td>

                                                        {{ \Illuminate\Support\Str::limit(strip_tags($faq->answer), 100) }}

                                                    </td>


                                                    {{-- Action --}}
                                                    <td>

                                                        {{-- Edit --}}
                                                        <button type="button" class="btn btn-sm btn-primary editFaqBtn"
                                                            title="Edit" data-id="{{ $faq->id }}"
                                                            data-service="{{ $faq->service_id }}"
                                                            data-question='@json($faq->question)'
                                                            data-answer='@json($faq->answer)'>

                                                            <i class="fas fa-edit"></i>

                                                        </button>


                                                        {{-- Delete --}}
                                                        <button type="button" class="btn btn-sm btn-danger deleteFaqBtn"
                                                            title="Delete" data-id="{{ $faq->id }}">

                                                            <i class="fas fa-trash"></i>

                                                        </button>

                                                    </td>

                                                </tr>

                                            @empty

                                                <tr>

                                                    <td colspan="5" class="text-center">

                                                        No FAQs found.

                                                    </td>

                                                </tr>
                                            @endforelse

                                        </tbody>

                                    </table>

                                </div>


                                {{-- ========================================== --}}
                                {{-- PAGINATION --}}
                                {{-- ========================================== --}}

                                <div class="d-flex justify-content-center mt-3">

                                    {{ $faqs->links() }}

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- ================================================================ --}}
    {{-- EDIT FAQ MODAL --}}
    {{-- ================================================================ --}}

    <div class="modal fade" id="editFaqModal" tabindex="-1" aria-labelledby="editFaqModalLabel" aria-hidden="true">

        <div class="modal-dialog modal-lg">

            <div class="modal-content">

                <form method="POST" id="editFaqForm">

                    @csrf

                    @method('PUT')


                    <div class="modal-header">

                        <h5 class="modal-title" id="editFaqModalLabel">
                            Edit FAQ
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                    </div>


                    <div class="modal-body">


                        {{-- ====================================== --}}
                        {{-- SERVICE --}}
                        {{-- ====================================== --}}

                        <div class="mb-3">

                            <label class="form-label">

                                Service

                                <span style="color:red;">*</span>

                            </label>


                            <select name="service_id" id="edit_service_id" class="form-control">

                                <option value="">
                                    Select Service
                                </option>


                                @foreach ($services as $service)
                                    <option value="{{ $service->id }}">

                                        {{ $service->name }}

                                    </option>
                                @endforeach

                            </select>


                            @if ($errors->has('service_id'))
                                <span class="text-danger">

                                    {{ $errors->first('service_id') }}

                                </span>
                            @endif

                        </div>


                        {{-- ====================================== --}}
                        {{-- QUESTION --}}
                        {{-- ====================================== --}}

                        <div class="mb-3">

                            <label class="form-label">

                                Question

                                <span style="color:red;">*</span>

                            </label>


                            <textarea name="question" id="edit_question" class="form-control" rows="3" maxlength="500"
                                placeholder="Enter Question"></textarea>


                            @if ($errors->has('question'))
                                <span class="text-danger">

                                    {{ $errors->first('question') }}

                                </span>
                            @endif

                        </div>


                        {{-- ====================================== --}}
                        {{-- ANSWER --}}
                        {{-- ====================================== --}}

                        <div class="mb-3">

                            <label class="form-label">

                                Answer

                            </label>


                            <textarea name="answer" id="edit_answer" class="form-control" rows="8" placeholder="Enter Answer"></textarea>


                            @if ($errors->has('answer'))
                                <span class="text-danger">

                                    {{ $errors->first('answer') }}

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
            $('.editFaqBtn').on(
                'click',
                function() {

                    let id =
                        $(this).data('id');

                    let serviceId =
                        $(this).data('service');

                    let question =
                        $(this).attr('data-question');

                    let answer =
                        $(this).attr('data-answer');

                    try {
                        question = JSON.parse(question);
                    } catch (e) {}

                    try {
                        answer = JSON.parse(answer);
                    } catch (e) {}
                    $('#edit_service_id').val(
                        serviceId
                    );

                    $('#edit_question').val(
                        question
                    );

                    $('#edit_answer').val(
                        answer
                    );


                    let updateUrl =
                        "{{ route('admin.faqs.update', ':id') }}";

                    updateUrl =
                        updateUrl.replace(
                            ':id',
                            id
                        );


                    $('#editFaqForm').attr(
                        'action',
                        updateUrl
                    );


                    let editModal =
                        new bootstrap.Modal(
                            document.getElementById(
                                'editFaqModal'
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

                    $('.faqCheckbox').prop(
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
            $('.faqCheckbox').on(
                'change',
                function() {

                    $('#selectAll').prop(
                        'checked',
                        $('.faqCheckbox:checked').length ===
                        $('.faqCheckbox').length
                    );

                }
            );


            /*
            |--------------------------------------------------------------------------
            | Single Delete
            |--------------------------------------------------------------------------
            */
            $('.deleteFaqBtn').on(
                'click',
                function() {

                    let id =
                        $(this).data('id');


                    if (
                        !confirm(
                            'Are you sure you want to delete this FAQ?'
                        )
                    ) {

                        return false;

                    }


                    let deleteUrl =
                        "{{ route('admin.faqs.destroy', ':id') }}";


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
                                'Something went wrong while deleting the FAQ.'
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


                    $('.faqCheckbox:checked').each(
                        function() {

                            ids.push(
                                $(this).val()
                            );

                        }
                    );


                    if (ids.length === 0) {

                        alert(
                            'Please select at least one FAQ.'
                        );

                        return false;

                    }


                    if (
                        !confirm(
                            'Are you sure you want to delete selected FAQs?'
                        )
                    ) {

                        return false;

                    }


                    $.ajax({

                        url: "{{ route('admin.faqs.bulk-delete') }}",

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
                                    'Something went wrong while deleting selected FAQs.'
                                );

                            }

                        }

                    });

                }
            );

        });
    </script>

@endsection
