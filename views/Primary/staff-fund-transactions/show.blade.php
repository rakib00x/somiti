@extends('layouts.frontend.app')
@section('content')
    <div class="content-w">
        <div class="content-i">
            <div class="content-box">


                <div class="container">




                    <div class="row">
                    </div>

                    <div class="row">

                        <div class="col-sm-12 mb-3">
                            <div class="element_custom" style="background: #000104" >
                                <div class="text-center custom">{{ $staff->name }}</div>
                                <hr style="border: 1px solid rgb(255, 255, 255);">
                                <div class="text-center text-light">{{ $staff->designation }} || Joining Date - {{ $staff->join }}</div>
                            </div>
                        </div>


                        <div class="col-sm">
                            <div class="element_custom" style="background: blue">
                                <div class="text-center " style="border-bottom: 2px solid white">Fund Deposit</div>
                                <h3 class="text-center text-white"> {{ $deposit }} ৳ </h3>
                            </div>
                        </div>

                        <div class="col-sm">
                            <div class="element_custom" style="background: red">
                                <div class="text-center " style="border-bottom: 2px solid white"> Fund Withdraw</div>
                                <h3 class="text-center text-white"> {{ $withdraw }}  ৳ </h3>
                            </div>
                        </div>

                        <div class="col-sm">
                            <div class="element_custom" style="background: green">
                                <div class="text-center " style="border-bottom: 2px solid white">Fund Balance</div>
                                <h3 class="text-center text-white"> {{ $balance }} ৳ </h3>
                            </div>
                        </div>

                        <div class="col-sm">
                            <div class="element_custom" style="background: brown">
                                <div class="text-center " style="border-bottom: 2px solid white">Security Money</div>
                                <h3 class="text-center text-white">  0 ৳</h3>
                            </div>
                        </div>

                        
                   
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-sm-12 table-responsive">
                            <table id="" class="table table-bordered table-v2 table-striped table-sm table-sm">
                                <thead>
                                    <tr class="text-center">
                                        <th scope="col">SL</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Purpose</th>
                                        <th scope="col">Deposit</th>
                                        <th scope="col">Withdraw</th>
                                        <th scope="col">Account No</th>
                                        <th scope="col">Member Name</th>
                                        <th scope="col">Type</th>
                                        <th scope="col">Process By</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ( $staff->staff_funds as $transaction )
                                    <tr class="text-center">
                                        <td scope="row">{{ $loop->iteration }}</td>
                                        <td>{{ $transaction->date }}</td>
                                        <td class="text-justify"></td>
                                        <td class="text-right">{{ $transaction->type == 'deposit'? $transaction->amount:'0.00' }}</td>

                                        <td class="text-right">{{ $transaction->type == 'withdraw'? $transaction->amount:'0.00' }}</td>
                                        <td>{{  $transaction->member_id? $transaction->member->account :''  }}</td>
                                        <td>{{ $transaction->member_id? $transaction->member->m_name :'' }}</td>
                                        <td>{{ $transaction->type }}</td>
                                        <td>{{ $transaction->processed_by? $transaction->processor->name: '' }}</td>
                                        <td>
                                            <a style="color: grey" title="Not Deletable"><i
                                                    class="os-icon os-icon-ui-15"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach

                        


                                </tbody>
                            </table>

                        </div>

                    </div>



                </div>


            </div>
        </div>
    </div>


    <style>
        .element_custom{
           
            color:white; 
            transition: .2s;
            border-radius: 10px;
            padding: 20px;  
        }

        .element_custom:hover{
            transform: translate(0px, -5px) scale(1.03);
            cursor: pointer;
        }


    </style>
@endsection
