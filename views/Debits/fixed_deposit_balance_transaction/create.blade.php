@extends('layouts.frontend.app')
@section('content')
    <div class="content-w">
        <div class="content-i">
            <div class="content-box">

                <div class="row">
                    <div class="col-sm-12">
                        <div class="element-box">
                            <div class="row border">
                                <div class="col-sm-9 border" style="background: #DDC1F5">
                                    <table class="table table-sm table-striped ">
                                        <tbody>
                                            <tr>
                                                <td>Account</td>
                                                <td>{{ $fdr->member->account }}</td>
                                            </tr>

                                            <tr>
                                                <td>Passbook</td>
                                                <td>
                                                    100 | 500
                                                    (<small>2022-10-16 | 2022-09-17</small>)
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>Area</td>
                                                <td colspan="4">{{ $fdr->member->area->name }}</td>
                                            </tr>

                                            <tr>
                                                <td>Name</td>

                                                <td colspan="4">{{ $fdr->member->m_name }}</td>
                                            </tr>
                                            <tr>
                                                <td>Parents</td>
                                                <td>
                                                    @if ($fdr->member->m_father || $fdr->member->m_mother)
                                                        {{ $fdr->member->m_father ?? '' }}
                                                        {{ $fdr->member->m_mother ? ' / ' . $fdr->member->m_mother : '' }}
                                                    @else
                                                        Not Available
                                                    @endif

                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Wife</td>
                                                <td colspan="4">{{ $fdr->member->m_companion ?? 'Not Available' }}</td>
                                            </tr>
                                            <tr>
                                                <td>Address</td>
                                                <td colspan="4">{{ $fdr->member->address }}</td>
                                            </tr>
                                            <tr>
                                                <td>Mobile</td>
                                                <td>
                                                    <a href="tel:{{ $fdr->member->m_mobile }}">
                                                        {{ $fdr->member->m_mobile }}
                                                    </a>
                                                </td>
                                            </tr>


                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-sm-3 text-center" style="background: #D5D543 ">
                                    <img id="photoF"
                                        src="{{ asset('storage/uploads/members/' . $fdr->member->m_photo) }}"
                                        style="max-height:180px; max-width:300px;" class="text-center">
                                    <img id="signatureF"
                                        src="{{ asset('storage/uploads/members/' . $fdr->member->m_signature) }}"
                                        style="max-height:180px; max-width:300px; display: none;" class="text-center">
                                </div>
                                <script>
                                    $("#photoF").dblclick(function() {
                                        $("#photoF").hide().delay(5000).fadeIn();
                                        $("#signatureF").show().delay(4500).fadeOut();
                                    });
                                </script>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <h6 class="element-header text-center" style="margin-bottom: 16px;">FDR Balance Withdraw / Deposit
                        </h6>
                        <div class="element-box">
                            <form method="POST" action="{{ route('fdr-balance-transaction.store') }}"
                                accept-charset="UTF-8"
                                note="Press OK to create Fixed Deposit account using following information.">
                                @csrf
                                <input name="account" type="hidden" value="{{ $fdr->member->account }}">
                                <input type="hidden" name="fdr_account_id" value="{{ $fdr->id }}">
                                <input type="hidden" name="previous_profit_rate" value="{{ $fdr->percent }}">
                                <div class="row">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-6">
                                        <div class="form-group row">
                                            <label for="type" class="col-form-label col-sm-4">Select Type</label>
                                            <div class="col-sm-8">
                                                <select name="type" class="form-control" required id="fdr_type">
                                                    <option value="2">Withdraw From FDR</option>
                                                    <option value="1">Deposit To FDR</option>

                                                </select>
                                            </div>

                                        </div>
                                        <div class="form-group row">
                                            <label for="start_date" class="col-form-label col-sm-4">Start Date</label>
                                            <div class="col-sm-8">
                                                <input class="form-control text-center"
                                                    placeholder="Fixed Deposit opening date" disabled name="start_date"
                                                    type="text" value="{{ custom_date_format($fdr->starting_date) }}"
                                                    id="start_date">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="opening_balance" class="col-form-label col-sm-4">Opening
                                                Balance</label>
                                            <div class="col-sm-8">
                                                <input class="form-control text-center" id="opening_balance"
                                                    placeholder="Amount of Fixed Deposit" disabled name="opening_balance"
                                                    type="number" value="{{ $fdr->opening_balance }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="current_balance" class="col-form-label col-sm-4">Current
                                                Balance</label>
                                            <div class="col-sm-8">
                                                <input class="form-control text-center" id="current_balance"
                                                    placeholder="Amount of Fixed Deposit" readonly name="current_balance"
                                                    type="number" step="any" value="{{ $fdr->amount }}">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="date" class="col-form-label col-sm-4">Payable Profit</label>
                                            <div class="col-sm-8">
                                                <input class="form-control text-center" placeholder="Profit Amount" disabled
                                                    name="profit_amount" type="number"
                                                    value="{{ $fdr->receiveable_amount }}">
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label for="date" class="col-form-label col-sm-4">Date</label>
                                            <div class="col-sm-8">
                                                <input class="form-control text-center"
                                                    placeholder="No need to select date for Today" name="date"
                                                    type="date" id="date" value="{{ date('Y-m-d') }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="amount" class="col-form-label col-sm-4">Input Amount</label>
                                            <div class="col-sm-8">
                                                <input type="number" name="amount" step="any" required
                                                    class="form-control text-center"
                                                    placeholder="Input Amount" id="input_amount">

                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="note" class="col-form-label col-sm-4">New Profit Rate
                                                %</label>
                                            <div class="col-sm-8">
                                                <input type="number" required="" step="any"
                                                    name="new_profit_rate" value="{{ $fdr->percent }}"
                                                    class="form-control text-center" placeholder="Enter New Profit Rate">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="note" class="col-form-label col-sm-4">Note or Details</label>
                                            <div class="col-sm-8">
                                                <textarea rows="1" class="form-control text-center" placeholder="Note or Details" name="note"
                                                    cols="50" id="note"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div>
                                    <br>
                                </div>
                                <div class="row">
                                    <div class="col-sm-5"></div>
                                    <div class="col-sm-4">
                                        <div class="row">
                                            <div class="col-sm-12 text-right">
                                                <input class="btn btn-primary" id="submit" type="submit"
                                                    value="Submit">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3"></div>
                                </div>
                            </form>



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>

  

        function setMaxMin(){
            let fdr_type = $('#fdr_type').val();

            if(fdr_type == 2){
                $('#input_amount').prop('max', {{ $fdr->amount }})
                console.log('withdraw')
            }else{
                $('#input_amount').prop('max', 'any')
                console.log('deposit')
            }

        }

        $('#fdr_type').change(function(){
            setMaxMin();
        });


        $(document).ready(function(){
            setMaxMin();
        })



    </script>
@endsection
