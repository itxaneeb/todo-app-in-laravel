<?php

namespace App\Http\Controllers;
use App\Models\Data;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataController extends Controller
{
    public function create(Request $request)
    {
        // echo "<pre>";
        // print_r($request->all());
        // exit();
        // dd($request);
        // dd($request->hasFile);
       $data = new Data;
       $data->user_id = $request->user_id;
       if($request->hasFile('image')){
              $imageName = time().'.'.$request->image->extension();
           $request->image->move(public_path('images/'), $imageName);
           $data->Image = 'images/'.$imageName;
        
        // $file = $request->file('image');
        // echo "<pre>";
        // print_r($file);
        // exit();
        // $filename = date("Ymd-his").'.'.$file->getClientOriginalExtension();
        // $destinationPath = "public/images/".$filename;
        // // dd($destinationPath);
        // if (move_uploaded_file($_FILES['image']['tmp_name'],$destinationPath) && $data['image']){
        //     if (file_exists($destinationPath)) {
        //         $data->Image = $filename;
        //     }
        //     else{
        //         echo "error, Unable to update image!";
        //     }
        // }
    }
    else{
        $data->Image = NULL;
    }
    //    $imageName = date("Ymd-his").'.'.$imagefile->getClientOriginalExtension();     
    //    $image_path = "upload".$imageName;
    //    if (move_uploaded_file($_FILES['image']['tmp_name'],$image_path) && $data['image']){
    //     if (file_exists($image_path)) {
    //         $data->image = $imageName;
    //     }
    //     else{
    //         echo "error","Unable to update image!";
    //         // return redirect()->back();
    //     }
    // }
    //    $data->image =  $request->image->move(public_path('upload'), $imageName);
    // dd($data);
       $data->StudentName = $request->StudentName;
       $data->guardianName = $request->guardianName;
       $data->mobileNumber = $request->mobileNumber;
       $data->schoolName = $request->schoolName;
       $data->classRollnumber = $request->classRollnumber;
       $data->address = $request->address;
       $data->birthDate = $request->birthDate;
       $data->save();
    //    dd('here');
    //    dd($data->all());
       return redirect()->route('data.show')->with('success', 'Welcome to the page');
    }
    public function show()
    {  
        $data = Data::all();
        
        return view('show',compact('data'));
    }

    public function updateblade($id)
    {
        $data = Data::find($id);
       return view('showblade',compact('data')); 
    }

    public function update()
    {   
        $id=$_GET['product_id'];
        
        $data = Data::find($id);
        print_r(json_encode($data));

       
    }

    public function deletedata() 
    {
        $id=$_GET['product_id'];
        $data =  Data::find($id);
        $data->delete();
        print_r(json_encode('Deleted'));
        
        // $data = Data::find($id);
        // $data->delete();
        // return back();
    }

    public function home()
    {
        // echo('')
        return view('welcome');
    }

    public function updatedata(Request $request)
    {
        // dd($request->hasFile);
        // $id = $_GET['update_id'];
        // dd($request->update_id);
        $data = Data::find($request->update_id);
        $data->StudentName = $request->StudentName;
        if($request->hasFile('image')){
            $imageName = time().'.'.$request->image->extension();
            // dd($imageName);
         $request->image->move(public_path('images'), $imageName);
         $data->Image = $imageName;
        }
        else{
            $data->Image = NULL;
        }
        $data->guardianName = $request->guardianName;
        $data->mobileNumber = $request->mobileNumber;
        $data->schoolName = $request->schoolName;
        $data->classRollnumber = $request->classRollnumber;
        $data->address = $request->address;
        $data->birthDate = $request->birthDate;
        $data->save();
        return back();
    }

    
    // public function leftjoin(){
    //         ＄users = User::leftJoin('data', 'users.id', '=', 'data.user_id')->get();
                      
    //         return ＄users;
            
    //         }

    public function leftjoin()
    {   
        $users =User::leftJoiN('data', 'users.id', '=', 'data.user_id')->select('users.*', 'StudentName', 'mobileNumber')->get();
        return view('leftjoin',compact('users'));

    }

    // public function rightjoin()
    // {
    // // Right Join Example
    // $users = User::rightJoin('posts', 'users.id', '=', 'posts.user_id')->select('users.*', 'posts.title', 'posts.body')->get();
    // }
}

