@extends('layouts.frontend.app')
@section('content')
    <div class="content-w">
        <div class="content-i">
            <div class="content-box">

                <div class="row">
                    <div class="col-sm-12">

                        <div class="element-box">
                            <form method="POST" action=""
                                accept-charset="UTF-8" class="form-inline justify-content-center"><input name="_token"
                                    type="hidden" value="2z6rOSvIEnfzX7ujQshTjwZlGi2FCZD8qA0NiYmz">
                                <div class="form-element control-rounded text-center">

                                    <label for="branch_id" class="sr-only required">Branch</label>
                                    <select class="form-control rounded" id="branch_id" name="branch_id">
                                        <option selected="selected" value="">All branch</option>
                                        <option value="1">Main Branch</option>
                                    </select>

                                    <label for="type" class="sr-only">Transaction&nbsp;Type</label>
                                    <select class="form-control select2 rounded toy" id="type" name="type">
                                        <option selected="selected" value="">All</option>
                                        <option value="salary distribution">salary distribution</option>
                                        <option value="Admission fee">Admission fee</option>
                                        <option value="Admission form">Admission form</option>
                                        <option value="Admission Others">Admission Others</option>
                                        <option value="Purchase Share">Purchase Share</option>
                                        <option value="Loan Distribute (daily)">Loan Distribute (daily)</option>
                                        <option value="Insurance Fee">Insurance Fee</option>
                                        <option value="Stamp fee">Stamp fee</option>
                                        <option value="Risk fee">Risk fee</option>
                                        <option value="Installment Other">Installment Other</option>
                                        <option value="General savings deposit">General savings deposit</option>
                                        <option value="Installment Pay (daily)">Installment Pay (daily)</option>
                                        <option value="CC Loan Distribution (Installment)">CC Loan Distribution
                                            (Installment)</option>
                                        <option value="FDR Opening">FDR Opening</option>
                                        <option value="General savings withdraw">General savings withdraw</option>
                                        <option value="CC loan insallment pay">CC loan insallment pay</option>
                                        <option value="Bank Deposit">Bank Deposit</option>
                                        <option value="Bank Withdraw">Bank Withdraw</option>
                                        <option value="Passbook Fee">Passbook Fee</option>
                                        <option value="Deposit to DPS">Deposit to DPS</option>
                                        <option value="Installment Penalty (daily)">Installment Penalty (daily)</option>
                                        <option value="Director deposit ( Abdullah Al MamunN )">Director deposit ( Abdullah
                                            Al MamunN )</option>
                                        <option value="Director withdraw ( Abdullah Al MamunN )">Director withdraw (
                                            Abdullah Al MamunN )</option>
                                        <option value="Loan Distribute (weekly)">Loan Distribute (weekly)</option>
                                        <option value="Installment Pay (weekly)">Installment Pay (weekly)</option>
                                        <option value="Loan Distribute (monthly)">Loan Distribute (monthly)</option>
                                        <option value="Installment Pay (monthly)">Installment Pay (monthly)</option>
                                        <option value="VEx Internet Bill">VEx Internet Bill</option>
                                        <option value="DPS opening charge">DPS opening charge</option>
                                        <option value="DPS Penalty">DPS Penalty</option>
                                        <option value="Withdraw from DPS">Withdraw from DPS</option>
                                        <option value="VIn Admission fee">VIn Admission fee</option>
                                        <option value="Yearly Profit distribution (General savings)">Yearly Profit
                                            distribution (General savings)</option>
                                        <option value="Yearly Profit Distribution Charge/VAT">Yearly Profit Distribution
                                            Charge/VAT</option>
                                        <option value="Yearly profit distribution to member">Yearly profit distribution to
                                            member</option>
                                        <option value="DPS closing">DPS closing</option>
                                        <option value="DPS performance bonus">DPS performance bonus</option>
                                        <option value="Investment Opening">Investment Opening</option>
                                        <option value="CC loan Closing (Installment)">CC loan Closing (Installment)</option>
                                        <option value="Sale Share">Sale Share</option>
                                        <option value="FDR Closing">FDR Closing</option>
                                        <option value="FDR Profit Withdraw">FDR Profit Withdraw</option>
                                        <option value="Profit on General Saving Withdraw">Profit on General Saving Withdraw
                                        </option>
                                        <option value="Charge on General Savings Withdraw">Charge on General Savings
                                            Withdraw</option>
                                        <option value="Installment Penalty (monthly)">Installment Penalty (monthly)</option>
                                        <option value="Out Sider Loan Received">Out Sider Loan Received</option>
                                        <option value="Out Sider Loan/Installment Paid">Out Sider Loan/Installment Paid
                                        </option>
                                        <option value="Out Sider Loan Interest Paid">Out Sider Loan Interest Paid</option>
                                        <option value="CC Main Balance Return">CC Main Balance Return</option>
                                        <option value="VIn Pass book and form sale">VIn Pass book and form sale</option>
                                        <option value="Purchase Asset">Purchase Asset</option>
                                        <option value="VEx Audit fee">VEx Audit fee</option>
                                        <option value="Installment Penalty (weekly)">Installment Penalty (weekly)</option>
                                        <option value="Loan Closing (Principal)">Loan Closing (Principal)</option>
                                        <option value="Loan Closing (Profit)">Loan Closing (Profit)</option>
                                        <option value="Yearly Profit distribution (DPS)">Yearly Profit distribution (DPS)
                                        </option>
                                        <option value="CC Loan Distribution (Fixed)">CC Loan Distribution (Fixed)</option>
                                        <option value="CC Opening Stamp Fee">CC Opening Stamp Fee</option>
                                        <option value="CC Opening Admission Fee">CC Opening Admission Fee</option>
                                        <option value="CC Loan Insurance Fee">CC Loan Insurance Fee</option>
                                        <option value="CC loan Processing fee">CC loan Processing fee</option>
                                        <option value="CC loan penalty">CC loan penalty</option>
                                        <option value="FDR Balance Withdraw">FDR Balance Withdraw</option>
                                        <option value="FDR Balance Deposit">FDR Balance Deposit</option>
                                    </select>


                                    <input class="form-control" id="dateRange" required checked="checked" name="date"
                                        type="radio" value="1">
                                    <label for="dateRange"
                                        style="display: inline-block; width: auto; vertical-align: middle;">Date
                                        Range</label>

                                    <label for="start" class="sr-only toy start">Start</label>
                                    <input class="form-control rounded toy text-center" placeholder="Select Filter"
                                        required name="start" type="date" value="2022-11-19" id="start">
                                    <label for="end" class="sr-only toy">End</label>
                                    <input class="form-control rounded toy text-center" placeholder="Select Filter"
                                        required name="end" type="date" value="2022-11-19" id="end">

                                    <label for="member" class="sr-only toy">Member</label>
                                    <input class="form-control rounded toy text-center" placeholder="Account No"
                                        name="member" type="number" id="member">

                                    <label for="process" class="sr-only toy">Process By</label>
                                    <select class="form-control rounded toy text-center" id="process" name="process">
                                        <option selected="selected" value="">All Users</option>
                                        <option value="723">SH Din Islam</option>
                                        <option value="724">Md Arif Hasan</option>
                                        <option value="722">Mahfuz Akand</option>
                                    </select>
                                    <select name="data_type" class="form-control  rounded toy text-center">

                                        <option value="moment" selected>Transaction Date</option>
                                        <option value="created_at">Entry Date</option>
                                    </select>

                                    <input class="btn btn-primary" type="submit" value="Search">
                                </div>
                            </form>



                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="editModal" role="dialog" aria-labelledby="exampleModalCenterTitle"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Date Update Transaction</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action=""
                                        method="POST">
                                        <input type="hidden" name="_token"
                                            value="">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label>Date</label>
                                                <input type="date" name="date" class="form-control required">
                                            </div>
                                            <input type="hidden" name="TransId" id="TransId">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="display-type"></div>
@endsection
