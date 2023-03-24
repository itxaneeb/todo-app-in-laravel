@extends('layouts.app')



@section('content')
    <div class="modal-body">
        <form action="{{route('data.update', $data->id)}}" method="POST">
            @csrf
            
            <div class="container">
                <div class="body-content mt-5">
                            <div class="form">
                            <div class="form-group">  
                            <input type="text" class="form-control" name="StudentName" id="" >
                                <label>Student's Name</label>
                                        <div class="form-group">
                            <input type="text"  name="guardianName" class="form-control" id="" >
                                <label>Guardians's Name</label>
                            </div>
    
                                        <div class="form-group">
                            <input type="text" class="mob form-control" name="mobileNumber" id="" v>
                                <label>Mob No:-</label>
                            </div>
                                        <div class="form-group">
                            <input type="text" class="form-control" name="schoolName" id="">
                                <label>School Name</label>
                            </div>
                                        <div class="form-group">
                            <input type="text" class="form-control" name="classRollnumber"id="">
                                <label>class , Roll No</label>
                            </div>
                                        <div class="form-group">
                                                <textarea class="form-control" name="address" row="12"></textarea>
                                <label>Address</label>
                            </div>
                    <div class="input-group date" data-provide="datepicker">
                        <div class="input-group-addon">
                                                    <input type="text" class="form-control" name="birthDate" >
                        <label>Birth Date</label>
                                            </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <input type="submit" name="" id="" class="btn btn-secondary" value="Update">
                                </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection