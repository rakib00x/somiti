@extends('layouts.frontend.app', ['pageTitle' => 'Search'])
@section('content')
    <div class="content-w">
        <div class="content-i">
            <div class="content-box">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="element-box">
                            <form method="POST" action=""
                                accept-charset="UTF-8" class="form-inline justify-content-center"><input name="_token"
                                    type="hidden" value="z1XyFJh45Z2TxsL4Y4bgfFhZCRUusXiBwYzJazHV">
                                <div class="form-element control-rounded text-center d-flex flex-column">
                                    <a href=""
                                        class="btn btn-success rounded w-25 mx-auto"
                                        title="Click Here For Profit Distribution."><i class="fa fa-recycle"></i> </a>
                                    <label for="filter" class="sr-only">Filter</label>
                                    <select class="form-control rounded mt-3 text-center" hidden required id="filter"
                                        name="filter">
                                        <option value="account" selected="selected">Account</option>
                                        <option value="mobile">Mobile</option>
                                        <option value="name">Name</option>
                                    </select>
                                    <label for="value" class="sr-only">Values</label>
                                    <input class="form-control rounded text-center mt-3 mainAmount" required name="value"
                                        type="text" id="value">
                                    <input class="btn btn-primary btn-lg mt-3" type="submit" value="Search">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="display-type"></div>
@endsection
