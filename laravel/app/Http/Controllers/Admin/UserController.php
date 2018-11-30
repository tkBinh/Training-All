<?php

namespace App\Http\Controllers\Admin;

use App\Models\Auth\Role\Role;
use App\Models\Auth\User\User;
use App\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\MessageBag;
use Validator;
use App\Helpers\Permissions\Permissions;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $check = Permissions::checkPermisison(config('permission.user.view'));
        if (!$check) {
            return view('notify', ['content' => 'danh sách người dùng']);
        }
        return view('admin.users.index', ['users' => User::with('roles')->sortable(['email' => 'asc'])->paginate()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(User $user)
    {
        return view('admin.users.show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $check = Permissions::checkPermisison(config('permission.user.edit'));
        if (!$check) {
            return view('notify', ['content' => 'sửa thông tin người dùng']);
        }
        return view('admin.users.edit', ['user' => $user, 'roles' => Role::get()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param User $user
     * @return mixed
     */
    public function update(Request $request, User $user)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'active' => 'sometimes|boolean',
            'confirmed' => 'sometimes|boolean',
        ]);
            // dd($request);
        $validator->sometimes('email', 'unique:users', function ($input) use ($user) {
            return strtolower($input->email) != strtolower($user->email);
        });

        $validator->sometimes('password', 'min:6|confirmed', function ($input) {
            return $input->password;
        });

        if ($validator->fails()) return redirect()->back()->withErrors($validator->errors());

        $user->name = $request->get('name');
        $user->email = $request->get('email');

        if ($request->has('password') && $request->get('password')!=null) {
            $user->password = bcrypt($request->get('password'));
        }
        if(!$user->hasRole('administrator')){
            $user->active = $request->get('active', 0);
            $user->confirmed = $request->get('confirmed', 0);
        }else{
            $user->active = 1;
            $user->confirmed = 1;
        }
        

        $user->save();

        //roles
        if ($request->has('roles')) {
            $user->roles()->detach();

            if ($request->get('roles')) {
                $user->roles()->attach($request->get('roles'));
            }
        }

        return redirect()->intended(route('admin.users'));
    }

    public function showRegisterForm(){
        $check = Permissions::checkPermisison(config('permission.user.register'));
        if (!$check) {
            return view('notify', ['content' => 'thêm danh sách người dùng']);
        }
        return view('admin.users.register');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request, User $user)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'active' => 'sometimes|boolean',
        ]);

        $validator->sometimes('email', 'unique:users', function ($input) use ($user) {
            return strtolower($input->email) != strtolower($user->email);
        });

        $validator->sometimes('password', 'min:6|confirmed', function ($input) {
            return $input->password;
        });

        if ($validator->fails()) return redirect()->back()->withErrors($validator->errors());

        $user->name = $request->get('name');
        $user->email = $request->get('email');

        if ($request->has('password')) {
            $user->password = bcrypt($request->get('password'));
        }

        $user->active = $request->get('active', 1);
        
        $user->confirmed = '1';
        // dd($user->name);
        $user->save();
        
        //roles
        if ($request->get('roles')) {
            $user->roles()->attach($request->get('roles'));
        }
        return redirect()->intended(route('admin.users'));
    }

    public function active(Request $request)
    {
        $account_id = $request->users_id;
        $role = User::find($account_id)->roles->first();

        if ($role == null || $role->pivot['role_id'] !== 1) {
            $account = User::find($account_id);
            if ($account->active == 1) {
                $account->active = 0;
                $account->save();
                $check = 0;
            } else {
                $account->active = 1;
                $account->confirmed=1;
                $account->save();
                $check = 1;
            }
            $succes = new MessageBag(['succes' =>  'Change succes']);
            return response()->json([
                'error' => false,
                'message' => $succes,
                'status' => $check,
            ], 200);
        } else {
            $errors = new MessageBag(['errorActive' => 'Không thể khóa ADMIN']);
            return response()->json([
                'error' => true,
                'message' => $errors
            ], 200);
        }
    }
}
