@extends('layouts.frontend.app')
@section('content')
<div class="content-w">
    <div class="content-i">
        <div class="content-box">
            

            <div class="row">
                <div class="col-sm-12">
                    <div class="element-wrapper">
                        <h6 class="element-header">Member Income List
                            <strong id="add_new" style="cursor: pointer"><i class="fa fa-plus-circle"></i></strong>
                        </h6>
                        <div class="element-box-tp">
                            <!--------------------START - Table with actions-------------------->
                            <div class="table-responsive">
                                <table id="" class="table table-bordered table-v2 table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Date</th>
                                            <th>Account</th>
                                            <th>Member</th>
                                            <th>Area</th>
                                            <th>Addmission Fee</th>
                                            <th>Form Fee</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($members as $member)
                                            <tr class="text-center">
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{custom_date_format($member->created_at)}}</td>
                                                <td>{{$member->account}}</td>
                                                <td>{{$member->m_name}}</td>
                                                <td>{{$member->area->name}}</td>
                                                <td>{{$member->admission_fee}}</td>
                                                <td>{{$member->form_fee}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                    
                                        <tr class="text-right">
                                            <td colspan="5">Total:</td>
                                            <td class="text-center">{{ $members->sum('admission_fee') }}</td>
                                            <td class="text-center">{{ $members->sum('form_fee') }}</td>

                                        </tr>
                                    </tfoot>
                                </table>
                                {{ $members->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
