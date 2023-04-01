@extends('layouts.frontend.app')
<style>
    .table.table-v2 thead tr th {
        /* background: none; */
        background: rgb(88, 112, 239) !important;
    }
</style>
@section('content')
<div class="content-w">
    <div class="content-i">
        <div class="content-box">
            <div class="row">
                <div class="col-sm-12">
                    <div class="">
                        <div class="row">
                            <div class="col-md-8 mt-4">
                                <div class="text-center">
                                    <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#form-modal">Add Out Loan</button>
                                </div>
                            </div>
                            <div class="col-md-4 mt-3">
                                <form method="GET" action="{{ route('outloan.index') }}" accept-charset="UTF-8" class="form-inline justify-content-center" autocomplete="off">
                                <div class="form-element control-rounded text-center">
                                    <input class="form-control rounded text-center" placeholder="Name and Company" name="search" type="text">
                                    <input class="btn btn-primary" type="submit" value="Search">
                                </div>
                            </form>
                            </div>
                        </div>

                        <h6 class="element-header">{{__('Out Loan Account List')}}</h6>
                        <div class="element-box">
                            <!--------------------START - Table with actions-------------------->
                            <div class="table-responsive">
                                <table class="table table-bordered table-v2 table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{__('Name')}}</th>
                                            <th>{{__('Company')}}</th>
                                            <th>{{__('Mobile')}}</th>
                                            <th>{{__('Profession')}}</th>
                                            <th>{{__('Status')}}</th>
                                            <th>{{__('Action')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        @foreach ($loans as $loan)
                                            <tr>
                                                <td class="align-middle">{{$loop->iteration}}</td>
                                                <td class="align-middle">{{$loan->name}}</td>
                                                <td class="align-middle">{{$loan->company}}</td>
                                                <td class="align-middle">{{$loan->mobile}}</td>
                                                <td class="align-middle">{{$loan->profession}}</td>
                                                <td class="align-middle">
                                                    @if ($loan->active == true)
                                                        <a href="{{ route('outloan-inactive', $loan->id) }}" class="badge badge-success btn">Active</a>
                                                    @else
                                                        <a href="{{ route('outloan-active', $loan->id) }}" class="badge badge-danger btn">Deactive</a>
                                                    @endif
                                                </td>
                                                <td class="align-middle">
                                                    <a class="btn btn-sm btn-info text-white mx-0" target="_blank" href="{{route('outloan.show', $loan->id)}}" onclick="return confirm('Are you sure? You want to show ( {{$loan->name}} )? '); ">
                                                        <i class="fas fa-expand-arrows-alt"></i>
                                                    </a>
                                                    @role("admin|manager")
                                                        <a class="btn btn-sm btn-primary text-white mx-0" href="{{route('outloan.edit', $loan->id)}}" onclick="return confirm('Are you sure? You want to edit ( {{$loan->name}} )? '); ">
                                                            <i class="fa fa-box"></i>
                                                        </a>
                                                        <a class="btn btn-sm btn-danger text-white mx-0" href="#" onclick="loanDelete(this);" data-id="{{ $loan->id }}"  data-name="{{ $loan->name }}">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                        <form id="delete-form-{{ $loan->id }}" action="{{ route('outloan.destroy', $loan->id) }}" method="POST" class="d-none">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                    @elserole("field-officer")
                                                    @endrole
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>

                                </table>
                                {{ $loans->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="form-modal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="formModal" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModal">{{__('Outloan Form')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">X</button>
                </button>
            </div>
            <div class="modal-body pb-0">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="element-box my-0" id="add_form">
                            <h6 class="element-header text-center">{{__('New Out loan Account')}}</h6>
                            <form method="POST" action="{{ route('outloan.store') }}" accept-charset="UTF-8" note="Do you want to create new Out Loan with following information?">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="name">{{__('Name')}}</label>
                                            <input class="form-control" placeholder="Input Out Loan AC Name" required autofocus value="{{ old('name') }}" name="name" type="text" id="name">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="mobile">{{__('Mobile Number')}}</label>
                                            <input class="form-control" placeholder="Out Loan AC Mobile Number" required value="{{ old('mobile') }}" name="mobile" type="tel" id="mobile">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="company">{{__('Company')}}</label>
                                            <input class="form-control" placeholder="Out Loan AC Company" value="{{ old('company') }}" name="company" type="text" id="company">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="profession">{{__('Profession')}}</label>
                                            <input class="form-control" placeholder="Out Loan AC Profession" value="{{ old('profession') }}" name="profession" type="text" id="profession">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="address">{{__('Address')}}</label>
                                            <input class="form-control" placeholder="Specific Address" value="{{ old('address') }}" name="address" type="text" id="address">
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="active">{{__('Status')}}</label>
                                            <select class="form-control" id="active" name="active">
                                                <option value="">Select Account Status</option>
                                                <option value="1">Active</option>
                                                <option value="0">Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <br>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 text-center">
                                        <input class="btn btn-info btn-sm" type="submit" value="Submit">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>
<script>
    function loanDelete(elem){
        event.preventDefault();
        if (confirm('Are you sure? You want to edit ( '+ elem.dataset.name +' )')) {
            document.getElementById('delete-form-'+ elem.dataset.id).submit();
        }
    }
</script>
@endsection
