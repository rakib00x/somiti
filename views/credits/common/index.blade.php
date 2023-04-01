@extends('layouts.frontend.app')
@section('content')
<style>
    .c_buton{
        font-size: 13px;
        padding: 8px;
    }
</style>
    <div class="content-w">
        <div class="content-i">
            <div class="content-box">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="element-box">
                            <h2 class="heading_title">Common Collection</h2>
                            <div class="row border">
                                <div class="col-sm-9 border" style="background: #DDC1F5">
                                    <table class="table table-sm table-striped ">
                                        <tbody>
                                            <tr>
                                                <td>Account</td>
                                                <td>{{ $member->account }}</td>
                                            </tr>
                                            <tr>
                                                <td>Passbook</td>
                                                <td>
                                                    N/A
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Area</td>
                                                <td colspan="4">{{ $member->area->name }}</td>
                                            </tr>
                                            <tr>
                                                <td>Name</td>
                                                <td colspan="4">{{ $member->m_name }}</td>
                                            </tr>
                                            <tr>
                                                <td>Parents</td>
                                                <td>
                                                    @if ($member->m_father || $member->m_mother)
                                                        {{ $member->m_father }} / {{ $member->m_mother }}
                                                    @else
                                                        N/A
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Address</td>
                                                <td colspan="4">
                                                    {{ $member->address }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Mobile</td>
                                                <td>
                                                    <a href="#{{ $member->m_mobile }}">
                                                        {{ $member->m_mobile }}
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-sm-3 text-center" style="background: #D5D543 ">
                                    <img id="photoF" src="{{ asset('storage/uploads/members/' . $member->m_photo) }}"
                                        alt="" height="200px" width="180px"
                                        style="max-height:180px; max-width:300px;" class="text-center">
                                    <img id="signatureF" src=""
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





                <form method="POST" action="{{ route('common.collection.store', $member->account) }}">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="element-box">
                                <div class="row">
                                    <div class="col-sm"></div>
                                    <div class="col-sm-3 text-center">
                                        <label for="previous_date" class="form-label">Select date (optional)</label>
                                        <input type="date" name="previous_date" class="form-control text-center"
                                            value="{{ date('Y-m-d') }}">
                                    </div>
                                    <div class="col-sm"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        @if ($general_account)
                            <!-- general saving -->
                        <div class="col-sm-12">
                            <h5 class="element-header text-center" style="margin-bottom: 16px;">General Savings</h5>
                            <div class="element-box text-center text-md-left">
                                <div class="row">
                                    <div class="col-sm-12">
                                        @if ($general_account)
                                            <div class="form-group row">

                                                <div class="col-sm-4">
                                                    <input class="form-control text-center amount" step="any"
                                                        placeholder="Input amount" min="1" autofocus name="general"
                                                        type="number" id="general_saving_amount">
                                                </div>


                                                <div class="col-md-8">
                                                    <div class="row">
                                                        <div class="col-sm-3 mt-2">
                                                            <label for="general"
                                                                class="btn btn-primary col-form-label col-sm-12">Target :
                                                                <span>{{ $general_account->target_amount }}</span> ৳</label>
                                                        </div>
                                                        
                                                        <div class="col-sm-3 mt-2">
                                                            <label for="general"
                                                                class="btn btn-primary col-form-label col-sm-12">Balance :
                                                                <span>{{ $general_account?->members->ac_balance ?? '0' }}</span> ৳</label>
                                                        </div>

                                                        <div class="col-sm-2 mt-2">
                                                            <label for="general"
                                                                class="btn btn-primary col-form-label col-sm-12 c_buton">deposit :
                                                                <span>{{ $general_account->members->total_deposit }}</span> ৳</label>
                                                        </div>

                                                        <div class="col-sm-2 mt-2">
                                                            <label for="general"
                                                                class="btn btn-primary col-form-label col-sm-12 c_buton">withdraw :
                                                                <span>{{ $general_account->members->total_withdraw }}</span> ৳</label>
                                                        </div>
        
                                                        <div class="col-sm-2 mt-2">
                                                            <a href="{{ route('general-ac.transactions', $general_account->account_id) }}"
                                                                class="btn btn-danger  col-sm-12 text-center">Book
                                                                Check</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <h5 class="text-center">General Account Not Found</h5>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        
                        @if ($current_account)
                            <!-- Current Account -->
                        <div class="col-sm-12">
                            <h5 class="element-header text-center" style="margin-bottom: 16px;">Current Account</h5>
                            <div class="element-box text-center text-md-left">
                                <div class="row">
                                    <div class="col-sm-12">
                                        @if ($current_account)
                                            <div class="form-group row">
                                                <div class="col-sm-4">
                                                    <input class="form-control text-center amount" step="any"
                                                        placeholder="Input amount" min="1" autofocus name="current"
                                                        type="number" id="current">
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="row">

                                                        <div class="col-sm-3 mt-2">
                                                            <label for="general"
                                                                class="btn btn-primary col-form-label col-sm-12">Target :
                                                                <span>{{ $current_account->amount }}</span>
                                                                ৳</label>
                                                        </div>

                                                        <div class="col-sm-3 mt-2">
                                                            <label for="general"
                                                                class="btn btn-primary col-form-label col-sm-12">Balance :
                                                                <span>{{ $current_account->members->cd_ac_balance }}</span>
                                                                ৳</label>
                                                        </div>
        
                                                        <div class="col-sm-2 mt-2">
                                                            <label for="general"
                                                                class="btn btn-primary col-form-label col-sm-12 c_buton">Deposit :
                                                                <span>{{ $current_account->members->cd_ac_total_deposit }}</span>
                                                                ৳</label>
                                                        </div>
        
                                                        <div class="col-sm-2 mt-2">
                                                            <label for="general"
                                                                class="btn btn-primary col-form-label col-sm-12 c_buton">Withdraw :
                                                                <span>{{ $current_account->members->cd_ac_total_withdraw }}</span>
                                                                ৳</label>
                                                        </div>
        
                                                        <div class="col-sm-2 mt-2">
                                                            <a href="{{ route('current-amount.transaction', $current_account->account_id) }}"
                                                                class="btn btn-danger  col-sm-12 text-center c_buton">Book
                                                                Check</a>
                                                        </div>
                                                    </div>
                                                </div>
                                             
                                            </div>
                                        @else
                                            <h5 class="text-center">Current Account Not Found</h5>
                                        @endif

                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        


                        <!-- Active dps -->
                        @if ($savings)
                        <div class="col-sm-12">
                            <h5 class="element-header text-center" style="margin-bottom: 16px;">Active DPS A/c</h5>
                            <div class="element-box text-center text-md-left">
                                <div class="row">
                                    <div class="col-sm-12">
                                        @if ($savings)
                                            <div class="form-group row">

                                                <div class="col-sm-4 mt-3">
                                                    <input class="form-control text-center amount" step="any"
                                                        placeholder="Input amount" min="1" autofocus
                                                        name="dps_deposit" type="number" id="dps_deposit">
                                                    <input name="savings_id" type="hidden" value="{{ $savings->id }}">
                                                    <input name="per_installment" type="hidden" value="{{ $savings->savings_amount }}">
                                                </div>


                                                <div class="col-sm-2 mt-3">
                                                    <label for="Target_Amount"
                                                        class="btn btn-primary col-form-label col-sm-12">Per Installment :
                                                        {{ $savings->savings_amount }}</label>
                                                </div>

                                                <div class="col-sm-2 mt-3">
                                                    <label for="Balance"
                                                        class="btn btn-primary col-form-label col-sm-12">Balance:
                                                        {{ $savings->balance }}</label>
                                                </div>

                                                <div class="col-sm-2 mt-3">
                                                    <label for="Due"
                                                        class="btn btn-primary col-form-label col-sm-12">Due:
                                                        {{abs($savings->due) }}</label>
                                                </div>

                                                <div class="col-sm-2 mt-3">
                                                    <a href="{{ route('savings.transactions', $savings->account_id) }}"
                                                        class="btn btn-danger  col-sm-12 text-center">Book
                                                        Check</a>
                                                </div>
                                            </div>
                                        @else
                                            <h5 class="text-center">No Running DPS Account</h5>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                       



                        <!-- Loan Collection -->
                        @if ($member->active_loan->count() > 0)
                        <div class="col-sm-12">
                            <h5 class="element-header text-center" style="margin-bottom: 16px;">Loan Collection
                            </h5>
                            <div class="element-box text-center text-md-left">
                                <div class="row">
                                    <div class="col-sm-12">
                                        @forelse($member->active_loan as $loan)
                                            <div class="form-group row">
                                                <div class="col-sm-4 mt-3">
                                                    <input type="hidden" name="loan_id[]" value="{{ $loan->id }}"
                                                        id="">

                                                        <input type="hidden" name="loan_per_installment[]" value="{{ $loan->installment_amount }}"
                                                        id="">
                                                    <input class="cc_loan_amount form-control text-center amount"
                                                        step="any" placeholder="Input amount" min="1"
                                                        name="loan_amount[]" type="number">
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="row">
                                                        <div class="col-sm-2 mt-3">
                                                            <label for="loan"
                                                                class="btn btn-primary col-form-label col-sm-12 c_buton">Per
                                                                Inst:
                                                                {{ $loan->installment_amount }}</label>
                                                        </div>

                                                        <div class="col-sm-2 mt-3">
                                                            <label for="loan"
                                                                class="btn btn-primary col-form-label col-sm-12 c_buton">Cate:
                                                                {{ substr($loan->category->name, 0, 10) ?? 'N/A' }}</label>
                                                        </div>


                                                        <div class="col-sm-2 mt-3">
                                                            <label for="loan"
                                                                class="btn btn-primary col-form-label col-sm-12 c_buton">Amount:
                                                                {{ $loan->total_amount }}</label>
                                                        </div>


                                                        <div class="col-sm-2 mt-3">
                                                            <label for="loan"
                                                                class="btn btn-primary col-form-label col-sm-12 c_buton">Total
                                                                Paid:
                                                                {{ $loan->total_paid }}</label>
                                                        </div>
                                                        <div class="col-sm-2 mt-3">
                                                            <label for="loan"
                                                                class="btn btn-primary col-form-label col-sm-12 c_buton">Total Due:
                                                                {{ $loan->due_amount }}</label>
                                                        </div>

                                                        <div class="col-sm-2 mt-3">
                                                            <a href="{{ route('loan.show', $loan->id) }}"
                                                                class="btn btn-danger  col-sm-12 text-center c_buton">Book
                                                                Check</a>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                        @empty
                                            <h5 class=" text-center">No Data</h5>
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        

                        <div class="col-md-12" style="float: none; margin: 0 auto;">
                            <div class="element-box text-center text-md-left">
                                <div class="form-group">
                                    <input type="text" class="form-control text-center" name="note"
                                        placeholder="Please enter your note" />
                                </div>
                            </div>
                        </div>


                        <div class="col-sm-12">

                            <div class="row">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-8">
                                    <div class="row">


                                        <div class="col-sm-4 text-center mt-3">
                                            <button id="total" class="btn btn-danger btn-lg btn-block" disabled
                                                type="button">Total Collected: <span id="total_collected"></span>
                                            </button>
                                        </div>
                                        <div class="col-sm-4"></div>

                                        <div class="col-sm-4 text-center mt-3">

                                            <input class="btn btn-success btn-lg btn-block btn_submit" type="submit"
                                                value="Submit">
                                        </div>

                                    </div>
                                </div>
                                <div class="col-sm-2"></div>

                            </div>

                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="display-type"></div>



    <script>
        function countTotal() {

            let total = 0;
            var general_saving_amount = $('#general_saving_amount').val();
            var current_amount = $('#current').val();
            var dps_deposit = $('#dps_deposit').val();
            let cc_loan_amount = $(".cc_loan_amount");
           

            cc_loan_amount.each(function() {
                var value = $(this).val();
                if (value) {
                    total = total + parseInt(value);
                }
            })

            if (general_saving_amount) {
                total = total + parseInt(general_saving_amount);
            }

            if (current_amount) {
                total = total + parseInt(current_amount);
            }

            if (dps_deposit) {
                total = total + parseInt(dps_deposit);
            }

            $('#total_collected').html(total);

        }

        $(".cc_loan_amount").keyup(function() {
            countTotal();
        })
        $("#dps_deposit").keyup(function() {
            countTotal();
        })
        $("#general_saving_amount").keyup(function() {
            countTotal();
        })

        $("#current").keyup(function() {
            countTotal();
        })
    </script>
@endsection
