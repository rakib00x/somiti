@extends('layouts.frontend.app')
@section('content')
    <div class="content-w">
        <div class="content-i">
            <div class="content-box">

                <div class="row">
                    <div class="col-sm-12">


                        <div class="element-box">
                            <form method="POST" action="{{ route('report.admission-register.index') }}"
                                accept-charset="UTF-8" class="form-inline justify-content-center">
                                @csrf
                                <div class="form-element control-rounded text-center">

                                    <input class="form-control" required name="start_date" id="start_date" type="date"
                                        >
                                        <i class="fas fa-arrows-alt-h"></i>
                                    <input class="form-control" required name="end_date" id="end_date" type="date" >

                                    <label for="status" class="sr-only">Status</label>
                                    <select class="form-control text-center" id="status" name="status">
                                        <option value="">All</option>
                                        <option value="1" selected="selected">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>

                                    <label for="staff" class="sr-only">Type</label>
                                    <select class="form-control text-center" id="staff" name="staff">
                                        <option selected="selected" value="all">All Staff</option>
                                        @foreach ($staffs as $staff)
                                            <option value="{{ $staff->id }}">{{ $staff->name }}</option>
                                        @endforeach
                                      
                                        
                                    </select>

                                    <label for="area" class="sr-only">Select Area</label>
                                    <input type="text" readonly class="form-control" id="area">

           

                                    <input class="btn btn-primary" type="submit" value="Report">
                                </div>
                            </form>



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="display-type"></div>


    <script>

            document.getElementById('start_date').valueAsDate = new Date();
            document.getElementById('end_date').valueAsDate = new Date();

        const areas = {!! $areas !!};
        const staffs = {!! $staffs !!};

        $('#staff').on('change', function(){

            let currentStaffId = $('#staff').val();

            if(currentStaffId == 'all'){
                $('#area').val('')
            }else{
                staffs.forEach(staff => {
                    if(staff.id == currentStaffId){
                        areas.forEach(area => {
                            if(staff.area == area.id){
                                $('#area').val(area.name) 
                            }
                        })
                    }
                });
                
            }
       

            

           
        })


    </script>



    
@endsection
