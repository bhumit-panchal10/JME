@extends('layouts.app')

@section('title', 'Edit Meta Data List')

@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Edit Cms Data</h4>
                            <div class="page-title-right">
                                <a href="{{ route('cms.index') }}"
                                    class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                                    Back
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                @foreach ($data as $metaData)
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="live-preview">

                                        <form action="{{ route('cms.update', [$metaData->id]) }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')

                                            <div class="row">

                                                <div class="col-md-6 mt-2">

                                                    <div
                                                        class="form-group {{ $errors->has('strTitle') ? 'has-error' : '' }} mb-2">

                                                        <label for="strTitle">* Title</label>

                                                        <input type="text" id="strTitle" name="strTitle"
                                                            class="form-control"
                                                            value="{{ old('strTitle', isset($metaData) ? $metaData->strTitle : '') }}"
                                                            required>
                                                        @if ($errors->has('strTitle'))
                                                            <em class="invalid-feedback">
                                                                {{ $errors->first('strTitle') }}
                                                            </em>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6 mt-2">
                                                    <div
                                                        class="form-group {{ $errors->has('strDescription') ? 'has-error' : '' }} mb-2">

                                                        <label for="strDescription">* Description</label>

                                                        <textarea id="strDescription" name="strDescription" rows="7" class="form-control" required>{{ old('strDescription', isset($metaData) ? $metaData->strDescription : '') }}</textarea>
                                                        @if ($errors->has('strDescription'))
                                                            <em class="invalid-feedback">
                                                                {{ $errors->first('strDescription') }}
                                                            </em>
                                                        @endif
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="card-footer mt-2" style="float: right;">
                                                <button type="submit"
                                                    class="btn btn-primary btn-user float-right mb-3 mx-2">Update</button>
                                                <a class="btn btn-primary float-right mr-3 mb-3 mx-2"
                                                    href="{{ route('cms.edit', $metaData->id) }}">Cancel</a>
                                            </div>


                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
