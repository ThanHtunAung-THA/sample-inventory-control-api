<?php

namespace App\Http\Controllers\API;

use App\Model\Admin;
use App\Model\DeletedAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function get_by_latest()
    {
        $result = Admin::orderBy('created_at', 'desc')->get();
        if (count($result) > 0) return response()->json(['status' => 'OK', 'data' => $result], 200);
        return response()->json(['status' => 'NG', 'message' => 'Data does not exist!'], 200);
    }
    public function getAllAdmin()
    {
        $result = Admin::paginate(10);
        if (count($result) > 0) return response()->json(['status' => 'OK', 'data' => $result], 200);
        return response()->json(['status' => 'NG', 'message' => 'Data does not exist!'], 200);
    }
    public function get_by_id($id)
    {
        $admin = Admin::find($id);

        if ($admin) {
            return response()->json(['status' => 'OK', 'data' => $admin], 200);
        }

        return response()->json(['status' => 'NG', 'message' => 'Admin not found'], 404);
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:admins,email',
            'password' => 'required',
            'phone' => 'nullable|', // Optional phone
            'date_of_birth' => 'nullable|date', // Optional date_of_birth
    
        ]);

        $userCode = DB::table('admins')->latest()->value('user_code');
        if($userCode != null){
            $userCode = $userCode + 1;
        }else{
            $userCode = 20001;
        }
        
        $data = [
            'user_code' => $userCode,
            'name' => $request->name,
            'email' => $request->email,
            // 'password' => Hash::make($request->password), // // TODO: using hashed type for future use
            'password' =>  $request->password,
        ];

        if ($request->has('phone')) {
            $data['phone'] = $request->phone;
        }
        if ($request->has('date_of_birth')) {
            $data['date_of_birth'] = $request->date_of_birth;
        }

        $result = Admin::create($data);

        if ($result) {
            return response()->json([
                'status' => 'OK',
                'message' => 'Data was created successfully!',
                'info' => [$userCode, $request->name, $request->email]
            ], 200);
        }
    
        return response()->json(['status' => 'NG', 'message' => 'Create Failed!'], 200);
    }

    public function show($id)
    {
        $result = Admin::where('id', $id)->first();
        if (!empty($result))  return response()->json(['status' => 'OK', 'data' => $result], 200);
        return response()->json(['status' => 'NG', 'message' => 'Data does not exist!'], 200);
    }

    public function update(Request $request, $id)
    {
        $admin = Admin::find($id);

        if (!$admin) {
            return response()->json(['status' => 'NG', 'message' => 'Admin not found'], 404);
        }

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'phone' => 'nullable', // Optional phone
            'date_of_birth' => 'nullable|date', // Optional date_of_birth
    
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            // 'password' => Hash::make($request->password), // // TODO: using hashed type for future use
            'password' =>  $request->password,
        ];

        if ($request->has('phone')) {
            $data['phone'] = $request->phone;
        }
        if ($request->has('date_of_birth')) {
            $data['date_of_birth'] = $request->date_of_birth;
        }

        $admin->update($request->all());

        return response()->json(['status' => 'OK', 'message' => 'Admin data updated successfully', 'data' => $admin], 200);
    
    }

    public function delete($id)
    {
        $admin = Admin::find($id);

        if (!$admin) {
            return response()->json(['status' => 'NG', 'message' => 'Admin not found'], 404);
        }

        $admin->delete();

        return response()->json(['status' => 'OK', 'message' => 'Admin deleted successfully'], 200);
    }

    // store the record and Remove the specified admin from storage
    public function softdelete($id)
    {
        $admin = Admin::find($id);

        if (!$admin) {
            return response()->json(['status' => 'NG', 'message' => 'Admin not found'], 404);
        }
        DeletedAdmin::create([
            'admin_id' => $admin->id,
            'deleted_date' => $admin->created_at,
            'user_code' => $admin->user_code,
            'name' => $admin->name,
            'email' => $admin->email,
            'phone' => $admin->phone,
            'date_of_birth' => $admin->date_of_birth,

        ]);
        $admin->delete();

        return response()->json(['status' => 'OK', 'message' => 'Admin deleted successfully', 'deleted_data' => $admin], 200);
    }

    public function login(Request $request)
    {
        $request->validate([
            'user_code' => 'required_without:email',
            'email' => 'required_without:user_code',
            'password' => 'required',
        ]);

        // Check if the input is an email or user code
        $admin = null;
        if (filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
            // If it's an email, find the admin by email
            $admin = Admin::where('email', $request->email)->first();
        } else {
            // Otherwise, find the admin by user_code
            $admin = Admin::where('user_code', $request->user_code)->first();
        }

        // Check if admin exists
        if ($admin != null) {
            if ($request->password != $admin->password) {
                // if (!Hash::check($request->password, $user->password)) {                       // TODO: using hashed type for future use
                    return response()->json(['status' => 'NG', 'message' => 'Incorrect Admin Password!'], 200);
            }
            // Return success response with user details
            return response()->json([
                'status' => 'OK',
                'message' => 'Login successfully!',
                'userid' => $admin->id,
                'usercode' => $admin->user_code,
                'username' => $admin->name
                ], 200);
        } else {
            return response()->json(['status' => 'NG', 'message' => 'Admin does not exist!'], 200);
        }
    
    }

    public function checkEmail($email)
    {
        $admin = Admin::where('email', $email)->first();
        if ($admin) {
            return response()->json(['status' => 'NG', 'message' => 'Email already exists!'], 200);
        }
        return response()->json(['status' => 'OK', 'message' => 'Email is available!'], 200);
    }
}
