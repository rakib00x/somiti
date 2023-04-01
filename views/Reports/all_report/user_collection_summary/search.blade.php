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
                                    type="hidden" value="">
                                <div class="form-element control-rounded text-center">

                                    <label for="branch" class="sr-only">User</label>
                                    <select class="form-control rounded" id="branch" name="branch">
                                        <option value="">All branch</option>
                                        <option value="1">Main Branch</option>
                                    </select>

                                    <label for="user" class="sr-only">User</label>

                                    <input class="form-control" id="dateRange" required checked="checked" name="date"
                                        type="radio" value="1">
                                    <label for="dateRange"
                                        style="display: inline-block; width: auto; vertical-align: middle;">Date
                                        Range</label>

                                    <label for="start" class="sr-only toy">Start</label>
                                    <input class="form-control rounded toy text-center" placeholder="Select Filter" required
                                        name="start" type="date" value="2022-11-19" id="start">
                                    <label for="end" class="sr-only toy">End</label>
                                    <input class="form-control rounded toy text-center" placeholder="Select Filter" required
                                        name="end" type="date" value="2022-11-19" id="end">
                                    <select class="form-control rounded" name="date_filter">
                                        <option value="moment" selected="selected">Collection Date</option>
                                        <option value="created_at">Entry Date</option>
                                    </select>
                                    <input class="btn btn-primary" type="submit" value="Search">
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
