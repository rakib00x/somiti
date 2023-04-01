@extends('layouts.frontend.app')
@section('content')
    <div class="content-w">
        <div class="content-i">
            <div class="content-box">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="element-box" id="add_form">
                            <form method="POST" action="" accept-charset="UTF-8">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="card">
                                            <div class="card-header bg-prmary">
                                                <h4 class="">Enter the number of notes</h4>
                                                <hr>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="one_thousand">One Thousand Tk Notes</label>
                                                            <input class="form-control border border-info" id="one_thousand"
                                                                placeholder="Write down the number of notes"
                                                                name="one_thousand" type="number">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="five_hundred">Five Hundred Tk Notes</label>
                                                            <input class="form-control border border-info" id="five_hundred"
                                                                placeholder="Write down the number of notes"
                                                                name="five_hundred" type="number">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="two_hundred">Two Hundred Tk Notes</label>
                                                            <input class="form-control border border-info" id="two_hundred"
                                                                placeholder="Write down the number of notes"
                                                                name="two_hundred" type="number">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="one_hundred">One Hundred Tk Notes</label>
                                                            <input class="form-control border border-info" id="one_hundred"
                                                                placeholder="Write down the number of notes"
                                                                name="one_hundred" type="number">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="fifty_taka">Fifty Tk Notes</label>
                                                            <input class="form-control border border-info" id="fifty_taka"
                                                                placeholder="Write down the number of notes"
                                                                name="fifty_taka" type="number">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="twenty_taka">Twenty Tk Notes</label>
                                                            <input class="form-control border border-info" id="twenty_taka"
                                                                placeholder="Write down the number of notes"
                                                                name="twenty_taka" type="number">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="ten_taka">Ten Tk Notes</label>
                                                            <input class="form-control border border-info" id="ten_taka"
                                                                placeholder="Write down the number of notes" name="ten_taka"
                                                                type="number">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="five_taka">Five Tk Notes</label>
                                                            <input class="form-control border border-info" id="five_taka"
                                                                placeholder="Write down the number of notes"
                                                                name="five_taka" type="number">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="two_taka">Two Tk Notes</label>
                                                            <input class="form-control border border-info" id="two_taka"
                                                                placeholder="Write down the number of notes" name="two_taka"
                                                                type="number">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="one_taka">One Tk Notes</label>
                                                            <input class="form-control border border-info" id="one_taka"
                                                                placeholder="Write down the number of notes"
                                                                name="one_taka" type="number">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-1">
                                    </div>
                                    <div class="col-sm-5" style="border-color: 1px solid red">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="">Finish today&#039;s calculations</h4>
                                                <hr>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label for="money_taker" class="required">Money
                                                                Receiver</label>
                                                            <input class="form-control border border-danger"
                                                                placeholder="Write the name of the person who took the money"
                                                                required name="money_taker" type="text"
                                                                id="money_taker">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label for="branch">Branch Name</label>
                                                            <input name="branch" type="" value="1"
                                                                id="branch">
                                                            <input class="form-control" placeholder="No Branch Found"
                                                                disabled name="branch" type="text"
                                                                value="Main Branch" id="branch">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label for="prev_day_amount">Calculation of the previous
                                                                day</label>
                                                            <input class="form-control border border-success"
                                                                placeholder="0" readonly name="prev_day_amount"
                                                                type="number" value="17900.00" id="prev_day_amount">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label for="today_amount" class="required">Total deposits at
                                                                the end of the day</label>
                                                            <input class="form-control border border-success"
                                                                id="today_amount" placeholder="0" readonly required
                                                                name="today_amount" type="number">
                                                            <!-- , 'readonly' -->
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label for="moment">Account Closing Date</label>
                                                            <input class="form-control border border-success" readonly
                                                                name="moment" type="date" value="2022-11-03"
                                                                id="moment">
                                                            <!-- , 'readonly' -->
                                                        </div>
                                                    </div>
                                                </div>
                                                </br>
                                                <div class="col-sm-12 text-center">
                                                    <input class="btn btn-primary w-100" type="submit" value="Submit">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
