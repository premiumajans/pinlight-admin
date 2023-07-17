@extends('master.backend')
@section('title',__('backend.partner'))
@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-xl-9">
                        <div class="card">
                            <div class="card-body">
                                <div class="col-12">
                                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                        <h4 class="mb-sm-0">@lang('backend.partner'): @lang('backend.add-new')</h4>
                                    </div>
                                </div>
                                <form action="{{ route('backend.partner.update',$id) }}" method="POST"
                                      class="needs-validation" novalidate="" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                        <label>@lang('backend.photo') <span class="text-danger">*</span></label>
                                        <input type="file" name="photo" class="form-control">
                                        <img class="form-control w-100" src="{{ asset($partner->photo) }}">
                                    </div>
                                    <div class="mb-3">
                                        <label>@lang('backend.link')</label>
                                        <input type="url" name="link" class="form-control"
                                               value="{{ $partner->link }}">
                                    </div>
                                    @include('backend.templates.components.buttons')
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
