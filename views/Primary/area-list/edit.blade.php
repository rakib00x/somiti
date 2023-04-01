@extends('layouts.frontend.app', ['pageTitle' => 'Edit area'])
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="element-box" style="display: visible" id="add_form">
                <h3 class="card-header text-center py-4 bg-success rounded text-white text-uppercase">{{ __('Edit Area') }}
                </h3>

                <form method="POST" action="{{ route('area-list.update') }}" accept-charset="UTF-8"
                    note="Do you want to create new branch with following information?">
                    @csrf
                    {{-- <input name="_token" type="hidden" value="4vpKH4KaXgiGypL51ErLVCwC0sYAIkyC4PllG1qZ"> --}}
                    <input type="hidden" name="id" value="{{ $areas->id }}">
                    <div class="row">
                        <div class="col-md-6 mx-auto mt-3">
                            @include('partials.message')
                            <div class="form-group">
                                <label for="branch_id">{{ __('Branch Name') }}</label>
                                <select class="form-control" required autofocus name="branch_id">
                                    <option value=""> Select branch </option>
                                    @foreach ($branches as $branch)
                                        <option value="{{ $branch->id }}"
                                            {{ $branch->id == $areas->branch_id ? 'selected' : '' }}>{{ $branch->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="name">{{ __('Area Name') }}</label>
                                <input class="form-control" placeholder="Area Name" required name="name" type="text"
                                    id="name" value="{{ $areas->name }}">
                            </div>
                            <div class="form-group">
                                <label for="area_code">{{ __('Area Code') }}</label>
                                <input class="form-control" placeholder="Area Code" required name="area_code" type="text"
                                    id="area_code" value="{{ $areas->area_code }}">
                            </div>
                            {{-- <div class="form-group">
                                <label for="associate">{{ __('Associate') }}</label>
                                <select class="form-control" name='associate_id' required>
                                    <option value=""> Select Associate </option>
                                    @foreach ($staffs as $staff)
                                        <option value="{{ $staff->id }}"
                                            {{ $staff->id == $areas->associate_id ? 'selected' : '' }}>{{ $staff->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div> --}}
                        </div>
                    </div>
            </div>

            <legend style="margin-bottom: 10px;"><span></span></legend>

            <div class="row">
                <div class="col-sm-12 text-center">
                    <input class="btn btn-primary" type="submit" value="Submit">
                </div>
            </div>
            </form>
        </div>
    </div>
    </div>
@endsection
