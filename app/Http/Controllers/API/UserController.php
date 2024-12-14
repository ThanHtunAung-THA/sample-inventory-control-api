<?php

namespace App\Http\Controllers\API;

use App\Model\User;
use App\Model\DeletedUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function get_by_latest()
    {
        $result = User::orderBy('created_at', 'desc')->get();
        if (count($result) > 0) return response()->json(['status' => 'OK', 'data' => $result], 200);
        return response()->json(['status' => 'NG', 'message' => 'Data does not exist!'], 200);
    }
    public function getAllUser()
    {
        $result = User::paginate(10);
        if (count($result) > 0) return response()->json(['status' => 'OK', 'data' => $result], 200);
        return response()->json(['status' => 'NG', 'message' => 'Data does not exist!'], 200);
    }
    public function get_by_id($id)
    {
        $user = User::find($id);

        if ($user) {
            return response()->json(['status' => 'OK', 'data' => $user], 200);
        }

        return response()->json(['status' => 'NG', 'message' => 'User not found'], 404);
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'phone' => 'nullable', // Optional phone
            'date_of_birth' => 'nullable|date', // Optional date_of_birth
    
        ]);

        $userCode = DB::table('users')->latest()->value('user_code');
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

        $result = User::create($data);

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
        $result = User::where('id', $id)->first();
        if (!empty($result))  return response()->json(['status' => 'OK', 'data' => $result], 200);
        return response()->json(['status' => 'NG', 'message' => 'Data does not exist!'], 200);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['status' => 'NG', 'message' => 'User not found'], 404);
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

        $user->update($request->all());

        return response()->json(['status' => 'OK', 'message' => 'User data updated successfully', 'data' => $user], 200);
    
    }

    public function delete($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['status' => 'NG', 'message' => 'User not found'], 404);
        }

        $user->delete();

        return response()->json(['status' => 'OK', 'message' => 'User deleted successfully'], 200);
    }

    // store the record and Remove the specified user from storage
    public function softdelete($id)
    {
        $user = User::find($id);    // TODO: Implement soft-delete method. [ insert into deleted_list.tb with type = user. and del from user.tb]

        if (!$user) {
            return response()->json(['status' => 'NG', 'message' => 'User not found'], 404);
        }
        DeletedUser::create([
            'user_id' => $user->id,
            'deleted_date' => $user->created_at,
            'user_code' => $user->user_code,
            'name' => $user->name,
            'email' => $user->email,
            'password' => $user->password,
            'date_of_birth' => $user->date_of_birth,

        ]);
        $user->delete();

        return response()->json(['status' => 'OK', 'message' => 'User deleted successfully', 'deleted_data' => $user], 200);
    }

    public function login(Request $request)
    {
        $request->validate([
            'user_code' => 'required_without:email',
            'email' => 'required_without:user_code',
            'password' => 'required',
        ]);

        $user = null;
        if (filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
            $user = User::where('email', $request->email)->first();
        } else {
            $user = User::where('user_code', $request->user_code)->first();
        }

        if ($user != null) {
            if ($request->password != $user->password) {
            // if (!Hash::check($request->password, $user->password)) {                       // TODO: using hashed type for future use
                return response()->json(['status' => 'NG', 'message' => 'Incorrect User Password!'], 200);
            }
            return response()->json([
                'status' => 'OK',
                'message' => 'Login successfully!',
                'userid' => $user->id,
                'usercode' => $user->user_code,
                'username' => $user->name
                ], 200);
        } else {
            return response()->json(['status' => 'NG', 'message' => 'User does not exist!'], 200);
        }
    }

    public function checkEmail($email)
    {
        $user = User::where('email', $email)->first();
        if ($user) {
            return response()->json(['status' => 'NG', 'message' => 'Email already exists!'], 200);
        }
        return response()->json(['status' => 'OK', 'message' => 'Email is available!'], 200);
    }
}
