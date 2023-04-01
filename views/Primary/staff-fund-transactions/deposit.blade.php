@extends('layouts.frontend.app')
@section('content')
    <div class="content-w">
        <div class="content-i">
            <div class="content-box">
                <div class="row">
                    <div class="col-sm-12">
                        <form method="POST" action="" accept-charset="UTF-8"
                            note="Do you confirm to deposit from this account?" enctype="multipart/form-data"><input
                                name="_token" type="hidden" value="wjcOFC57HPRnNrznTRyOQztbRJ5wlepPED9BB4Wg">
                            <input name="preventDuplicate" type="hidden" value="634bdad5b9e14">
                            <div class="row">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-6">
                                    <button type="button" class="btn btn-secondary btn-lg btn-block">Staff Fund
                                        Deposit</button>
                                    <div class="element-box">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="staff_id" class="required">Staff Name</label>
                                                    <select class="form-control" required id="staff_id" name="staff_id">
                                                        <option value="208">Mahfuz Akand ( 14020 )</option>
                                                        <option value="209">Md Arif Hasan ( 21450 )</option>
                                                        <option value="216">আব্দুল্লাহ আল মামুন ( 163500 )</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="amount" class="required">Deposit Amount</label>
                                                    <input class="form-control mainAmount" text-center required autofocus
                                                        name="amount" type="number" id="amount">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="date">Deposit Date</label>
                                                    <input type='date' name="date" max="2022-10-16"
                                                        class="form-control text-center" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="details">Deposit Details</label>
                                                    <textarea rows="1" class="form-control" placeholder="Notes of deposit" name="details" cols="50"
                                                        id="details"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="member_id">Account</label>
                                                    <input rows="1" class="form-control" placeholder="Input AC Number"
                                                        name="member_id" type="number" id="member_id">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="is_security_money">Is Security Money Deposit ?</label>
                                                    <select name="is_security_money" class="form-control">
                                                        <option>No</option>
                                                        <option value="1">yes</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4"></div>
                                        <div>
                                            <br>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 text-center">
                                                <input class="btn btn-primary w-100 " type="submit" value="Submit">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3"></div>
                            </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="display-type"></div>
@endsection
