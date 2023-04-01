@extends('layouts.frontend.app')
@section('content')
    <div class="content-w">
        <div class="content-i">
            <div class="content-box">

                <div class="row">
                    <div class="col-sm-12">
                        <div class="element-box">
                            <div class="row border">
                                <div class="col-sm-9 border" style="background: #ddc1f553">
                                    <table class="table table-sm table-striped ">
                                        <tbody>
                                            <tr>
                                                <td>Account</td>
                                                <td>{{ $member->account }}</td>
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
                                                <td>Address</td>
                                                <td colspan="4">{{ $member->address }}</td>
                                            </tr>
                                            <tr>
                                                <td>Phone</td>
                                                <td>{{ $member->m_mobile }}</td>
                                            </tr>

                                            <tr>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-sm-3 text-center" style="background: #4284c371 ">
                                    <img id="photoF"
                                        src="{{ asset('storage/uploads/members/' . $member->m_photo) }}"
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



                <div class="row mt-3">
                    <div class="col-sm-12 table-responsive">
                        <table id="" class="table table-bordered table-v2 table-striped table-sm table-sm">
                            <thead>
                                <tr class="text-center">
                                    <th scope="col">SL</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Account</th>
                                    <th scope="col">Member</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Balance</th>
                                    <th scope="col">Profit Rate</th>
                                    <th scope="col">Processed By</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($transactions as $transaction)
                                    <tr class="text-center">
                                        <td scope="row">{{ $loop->iteration }}</td>
                                        <td>{{ custom_date_format($transaction->date) }}</td>
                                        <td class="text-justify">{{ $transaction->account_id }}</td>
                                        <td>{{ $transaction->member->m_name }}</td>
                                        <td>{{ $transaction->type == 1 ? 'Deposit' : 'Withdraw' }}</td>
                                        <td>{{ $transaction->amount }}</td>
                                        <td>{{ $transaction->current_balance }}</td>
                                        <td>{{ $transaction->new_profit_rate }}</td>
                                        <td>{{ $transaction->processed_by }}</td>
                                        <td>
                                            @if (Auth::user()->hasRole('admin') || !hour_passed($transaction->created_at))
                                                <a class=" text-danger text-decoration-none mx-0" href="#"
                                                    onclick="transactionDelete(this);" data-id="{{ $transaction->id }}">
                                                    <i class="os-icon os-icon-ui-15"></i>
                                                </a>
                                                <form id="delete-form-{{ $transaction->id }}"
                                                    action="{{ route('fdr-balance-transaction.destroy', $transaction->id) }}"
                                                    method="POST" class="d-none">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            
                                            @endif

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

    <script>
        function transactionDelete(elem) {
            event.preventDefault();
            if (confirm('Are you sure? You want to delete this transaction')) {
                document.getElementById('delete-form-' + elem.dataset.id).submit();
            }
        }

    </script>
@endsection
