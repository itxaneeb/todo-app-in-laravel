@extends('layouts.app')


    
@section('content')
    <form action="{{route('data.create')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden"  name="user_id" value="{{auth()->user()->id ?? ""}}">
        <div class="container">
            <div class="body-content mt-5">
                        <div class="form">
                        <div class="form-group">  
                        <input type="text" class="form-control" name="StudentName" id="">
                            <label>Student's Name</label>
                                    <div class="form-group">
                        <input type="text"  name="guardianName" class="form-control" id="">
                            <label>Guardians's Name</label>
                        </div>

                                    <div class="form-group">
                        <input type="text" class="mob form-control" name="mobileNumber" id="">
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
                        <div class="form-group">
                            <label for="image">File input</label>
                            <input name="image" type="file" >
                        </div>
                
                        <div class="input-group date" data-provide="datepicker">
                    <div class="input-group-addon">
                                                <input type="text" class="form-control" name="birthDate">
                    <label>Birth Date</label>
                                        </div>
                            </div>
                            
                    <button type="submit" class="btn btn-success"> submit</button>
                </div>
            </div>
        </div>
    </form>
@endsection

