@extends('layouts.frontend.app')
@section('content')
    <div class="content-w">
        <div class="content-i">
            <div class="content-box">
                {{-- @if ($errors->count())
                    {{ $errors }}
                @endif --}}
                <div class="row">
                    <div class="col-sm-12">
                        <div class="element-box">
                            <div class="row border">
                                <div class="col-sm-9 border">
                                    <table class="table table-sm table-striped ">
                                        <tbody>
                                            <tr>
                                                <td>{{__('Account')}}</td>
                                                <td>:</td>
                                                <td>{{$member->account}}</td>
                                            </tr>
                                            <tr>
                                                <td>{{__('Area')}}</td>
                                                <td>:</td>
                                                <td colspan="4">{{$member->area->name ?? 'N/A'}}</td>
                                            </tr>
                                            <tr>
                                                <td>{{__('Name')}}</td>
                                                <td>:</td>
                                                <td colspan="4">{{$member->m_name}}</td>
                                            </tr>
                                            <tr>
                                                <td>{{__('Address')}}</td>
                                                <td>:</td>
                                                <td colspan="4">{{ $member->address }}</td>
                                            </tr>
                                            <tr>
                                                <td>{{__('Phone')}}</td>
                                                <td>:</td>
                                                <td>{{$member->m_mobile}}</td>
                                            </tr>
                                            <tr>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-sm-3 text-center" style="background: #D5D543 ">
                                    <img id="photoF" src="{{asset($member->photo)}}" style="max-height:180px; max-width:300px;" class="text-center">
                                    <img id="signatureF" src="{{ asset('storage/uploads/member' . $member->signature) }}" style="max-height:180px; max-width:300px; display: none;" class="text-center">
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
                        <div class="element-box">
                            <form method="POST" action="{{ route('fixed-deposit.store') }}" accept-charset="UTF-8"
                                    note="Press OK to create FDR account using following information."
                                    enctype="multipart/form-data" novalidate>
                                @csrf
                                <input type="hidden" name="account" hidden value="{{ $member->account }}">
                                <input name="scheme_id" type="hidden" value="{{ $fixed_diposit_scheme->id }}">
                                <div class="row">
                                    <div class="col-sm-6 offset-3">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="date" class="col-form-label col-sm-12">{{__('Starting Date')}}</label>
                                                <div class="">
                                                    <input class="form-control text-center" placeholder="No need to select date for Today" name="starting_date" value="{{ date('Y-m-d') }}" type="date" id="datefield">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="date" class="col-form-label col-sm-12">{{__('Ending Date')}}</label>
                                                <div class="">
                                                    <input class="form-control text-center" placeholder="No need to select date for when is your diposit will end" name="ending_date" value="{{ old('ending_date') }}" type="date" id="ending_date">
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group row">
                                            <label for="months" class="col-form-label col-sm-4">{{__('Duration in month')}}</label>
                                            <div class="col-sm-8">
                                                <input class="form-control text-center shadow-none" placeholder="Something error. Please reload" name="months" type="number" value="{{ $fixed_diposit_scheme->duration }}" id="months">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="amount" class="col-form-label col-sm-4">{{__('FDR Amount')}}</label>
                                            <div class="col-sm-8">
                                                <input class="form-control text-center mainAmount" placeholder="Amount of FDR" required="" autofocus="" name="amount" value="{{ old('amount') }}" type="number" id="amount">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="profit" class="col-form-label col-sm-4">{{__('Profit (Monthly)')}}</label>
                                            <div class="col-sm-4 input-group">
                                                <input id="percent" class="form-control text-center" placeholder="Profit in percent" name="percent" type="number" value="{{$fixed_diposit_scheme->profit}}">
                                                <div class="input-group-append">
                                                    <div class="input-group-text">%</div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4 input-group">
                                                <input class="form-control text-center" placeholder="Profit for this duration" required="" name="profit" value="{{ old('profit') }}" type="number" id="profit">
                                                <div class="input-group-append">
                                                    <div class="input-group-text">৳</div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="profit" class="col-form-label col-sm-4">{{__('Profit for TotalTime')}}</label>
                                            <div class="col-sm-8 input-group">
                                                <input class="form-control text-center" placeholder="Profit for total duration" required="" type="number" id="total_profit" disabled value="">
                                                <div class="input-group-append">
                                                    <div class="input-group-text">৳</div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="note" class="col-form-label col-sm-4">{{__('Note')}}</label>
                                            <div class="col-sm-8">
                                                <textarea class="form-control text-center" placeholder="Information with this FDR to be remember or Blank" rows="2" name="note" value="{{ old('note') }}" cols="50" id="note"></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="bankName" class="col-form-label col-sm-4">{{__('Bank Name')}}</label>
                                            <div class="col-sm-8">
                                                <input class="form-control text-center" placeholder="bankName" name="bankName" type="text">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="branch" class="col-form-label col-sm-4">{{__('Branch Name')}}</label>
                                            <div class="col-sm-8">
                                                <input class="form-control text-center" placeholder="bankName" name="branch" type="text" value="Main Branch">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="bankAccount" class="col-form-label col-sm-4">{{__('Bank Account')}}</label>
                                            <div class="col-sm-8">
                                                <input class="form-control text-center" placeholder="bankAccount" name="bankAccount" type="text">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <label for="note" class="col-form-label col-sm-4">{{__('Attachment')}}</label>
                                            <div class="col-sm-8">
                                                <input class="form-control text-center" placeholder="Attachment file" capture="" name="capture" value="{{ old('capture') }}" type="file">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="note" class="col-form-label col-sm-4">{{__('Multiple Attachment')}}</label>
                                            <div class="col-sm-8">
                                                <input class="form-control text-center" placeholder="Attachment file 2" capture2="" multiple name="capture2[]" value="{{ old('capture2') }}" type="file">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="cheque" class="col-form-label col-sm-4">{{__('Cheque number')}}</label>
                                            <div class="col-sm-8">
                                                <textarea class="form-control text-center" placeholder="Cheque number" rows="1" name="cheque" value="{{ old('cheque') }}" cols="50" id="cheque"></textarea>
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
                                            <div class="col-sm-12 text-center">
                                                <input class="btn btn-primary w-100 btn-lg" type="submit" value="Submit">
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
<script type="text/javascript">

    $(document).ready(function () {
        $("#profit").val($("#amount").val() * $("#percent").val() / 100);
        $("#total_profit").val(($("#amount").val() * $("#percent").val() / 100) * $("#months").val());
    });
    $("#amount, #percent").bind("keyup change", function () {
        $("#profit").val(parseInt($("#amount").val() * $("#percent").val() / 100));
        $("#total_profit").val(($("#amount").val() * $("#percent").val() / 100) * $("#months").val());
    });
    $("#profit").bind("keyup change", function () {
        $("#percent").val(($("#profit").val() / $("#amount").val() * 100).toFixed(2));
    });

    // future date disable
    // var today = new Date();
    // var dd = today.getDate();
    // var mm = today.getMonth() + 1; //January is 0!
    // var yyyy = today.getFullYear();
    // if (dd < 10) {
    // dd = '0' + dd
    // }
    // if (mm < 10) {
    // mm = '0' + mm
    // }

    // today = yyyy + '-' + mm + '-' + dd;
    // document.getElementById("datefield").setAttribute("max", today);


    function dateFormat(inputDate, format) {
    //parse the input date
    const date = new Date(inputDate);

    //extract the parts of the date
    const day = date.getDate();
    const month = date.getMonth() + 1;
    const year = date.getFullYear();    

    //replace the month
    format = format.replace("MM", month.toString().padStart(2,"0"));        

    //replace the year
    if (format.indexOf("yyyy") > -1) {
        format = format.replace("yyyy", year.toString());
    } else if (format.indexOf("yy") > -1) {
        format = format.replace("yy", year.toString().substr(2,2));
    }

    //replace the day
    format = format.replace("dd", day.toString().padStart(2,"0"));

    return format;
}


    function calculate_future_date(){
        var start_date = new Date($('#datefield').val());
        var duration = parseInt($('#months').val());

        var result = start_date.setMonth(start_date.getMonth() + duration);
        $('#ending_date').val(dateFormat(result, 'yyyy-MM-dd'));
    
       
    }

    $('#datefield').on('change', function(){
        calculate_future_date()
    })

    $(document).ready(function(){
        
        calculate_future_date();
    })
</script>


@endsection
