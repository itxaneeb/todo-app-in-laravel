@extends('layouts.app')

    @section('content')
    <style>
        table, th, td {
          border:1px solid black;
        }
        </style>
            <body>
        
            <h2>Data Display</h2>
        <a href="{{url('/')}}"" class="btn btn-primary mb-3"  >Click to add new </a>
        <a href="{{route('leftjoin')}}"" class="btn btn-primary mb-3"  >DB Left Query </a>
                <table style="width:100%">
                    <thead>
                      <tr>
                        <th>id</th>
                        <th>Name</th>
                        <th>Photo</th>
                        <th>guardian Name</th>
                        <th>Mobile Number</th>
                        <th>School Name</th>
                        <th>Class Rollnumber</th>
                        <th>address	</th>
                        <th>Birht day</th>
                        <th>Action</th>
                        
                      </tr>
                     </thead>
                     <tbody>
                        @foreach ($data as $key => $data1)
                         @php
                             $path = "";
                            $isImageExist = file_exists($path . $data1->Image);
                            if($data1->Image == ''){
                                $isImageExist = false;
                            }
                        @endphp
                        
                            <tr id="row-{{$key}}">
                                <td>{{$data1->id}}</td>
                                <td>{{$data1->StudentName}}</td>
                                <td>
                                @if ($isImageExist == true)
                                <img style="width: 100px; height: 100px" src="{{ URL::to($data1->Image)}}">
                                                                    
                                @else
                                <img style="width: 100px; height: 100px" src="{{ URL::to('images/No_Image_Available.jpg')}}">
                                
                                @endif
                            </td>
                                
                                <td>{{$data1->guardianName}}</td>
                                <td>{{$data1->mobileNumber}}</td>
                                <td>{{$data1->schoolName}}</td>
                                <td>{{$data1->classRollnumber}}</td>
                                <td>{{$data1->address}}</td>
                                <td>{{$data1->birthDate}}</td>
                                <td>
                                    
                                    
                                    <a href='JavaScript:void(0)' onclick="edit({{$data1->id}})" type="button" class="btn btn-primary">Edit </a>
                                    <a href="#" onclick="deleteproduct({{$data1->id}})" class="btn btn-primary" type="button">Delete</a>
                                </td>
                            </tr>
                                <!-- Button trigger modal -->
{{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Launch demo modal
  </button> --}}

                            <!-- Modal -->
                            
                            
                        @endforeach
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{route('newdataupdatedata')}}"  method="POST" enctype="multipart/form-data" >
                                        @csrf
                                        <input type="hidden" name="update_id"  id="update_id">
                                          <div class="container">
                                              <div class="body-content mt-5">
                                                        <div class="form">
                                                        <div class="form-group">  
                                                          <input type="text" class="form-control" name="StudentName" id="StudentName" >
                                                              <label>Student's Name</label>
                                                              <div class="form-group">
                                                                <label for="image">File input</label>
                                                                <input name="image" type="file" id="image">
                                                            </div>
                                                                    <div class="form-group">
                                                          <input type="text"  name="guardianName" class="form-control" id="guardianName" >
                                                              <label>Guardians's Name</label>
                                                        </div>
                                  
                                                                    <div class="form-group">
                                                          <input type="text" class="mob form-control" name="mobileNumber" id="mobileNumber" >
                                                              <label>Mob No:-</label>
                                                        </div>
                                                                    <div class="form-group">
                                                          <input type="text" class="form-control" name="schoolName" id="schoolName">
                                                              <label>School Name</label>
                                                        </div>
                                                                    <div class="form-group">
                                                          <input type="text" class="form-control" name="classRollnumber" id="classRollnumber">
                                                              <label>class , Roll No</label>
                                                        </div>
                                                                    <div class="form-group">
                                                                            <textarea class="form-control" name="address" row="12" id="address"></textarea>
                                                              <label>Address</label>
                                                        </div>
                                                  <div class="input-group date" data-provide="datepicker">
                                                    <div class="input-group-addon">
                                                                                <input type="text" class="form-control" name="birthDate" id="birthDate">
                                                      <label>Birth Date</label>
                                                                        </div>
                                                              </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <button class="btn btn-secondary"  type="submit"  > Update</button>
                                                            </div>
                                                  </div>
                                              </div>
                                          </div>
                                    </form>
                                </div>
                                
                            </div>
                            </div>
                        </div>
                    </tbody>
            </table>
        
               <script>
                function edit(id){
                    fetch('/update?product_id=' + id)
                    .then(data => {
                            return data.json();
                        })
                        .then(post => {
                            
                            // console.log(post.id);
                            document.getElementById('update_id').value=post.id;
                            document.getElementById('StudentName').value=post.StudentName;
                            document.getElementById('image').value=post.Image;
                            document.getElementById('guardianName').value=post.guardianName;
                            document.getElementById('mobileNumber').value=post.mobileNumber;
                            document.getElementById('schoolName').value=post.schoolName;
                            document.getElementById('classRollnumber').value=post.classRollnumber;
                            document.getElementById('address').value=post.StudentName;
                            document.getElementById('birthDate').value=post.birthDate;
                            
                        });
                    $('#exampleModal').modal('show');
                }
                    function deleteproduct(id)
                    {
                    
                        fetch('/deleteproduct?product_id=' + id)
                            .then(response => response.json())
                            .then(data => window.location.reload());
                    }

                    
                </script>
                


    @endsection