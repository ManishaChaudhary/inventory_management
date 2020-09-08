<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\CompanyUser;
use App\Repositories\UserRepository;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public $model;

    public function __construct(UserRepository $model)
    {
        $this->model = $model;
    }

    public function index(Request $request)
    {
        $users = User::all();
        return view('admin.users.index')->with('users', $users);
    }

    public function create()
    {
        $roles = Role::all();
        $companies = Company::active()->get();
        return view('admin.users.create')->with(['roles' => $roles, 'companies' => $companies]);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['password'] = bcrypt("password");
        try {
            $user = $this->model->store($data);
            $user->assignRole($data['roles']);
            CompanyUser::create($data['companies']);

        } catch (\Illuminate\Database\QueryException  $exception) {
            $errorCode = $exception->errorInfo[1];
            if ($errorCode == '1062') {
                return redirect()->route('admin.users.create')->with('message', "Email or phone has already been used");
            }
        }
//        $user->assignRole($data['roles']);
//        foreach ($data['companies'] as $company) {
//            $user->companies()->attach($company);
//        }


        return redirect()->route('admin.users.index')->with('message', 'User Created');
    }

    public function show(User $user)
    {
        $roles = $user->getRoleNames();
        $companies = $user->companies()->get();
        return view('users.view')->with(['user' => $user, 'roles' => $roles, 'companies' => $companies]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
        $userRoles = $user->roles()->pluck('roles.id')->all();
        $companies = Company::active()->get();
        $userCompanies = $user->companies()->pluck('companies.id')->all();
        return view('admin.users.edit', compact('user', 'roles', 'userRoles', 'companies', 'userCompanies'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $user = User::findORFail($id);
        try {
            $user->update($data);
        } catch (\Illuminate\Database\QueryException  $exception) {
            $errorCode = $exception->errorInfo[1];
            if ($errorCode == '1062') {
                return redirect()->route('admin.users.create')->with('message', "Email or phone has already been used");
            }
        }
        DB::table('model_has_roles')->where('model_id', $id)->delete();
        DB::table('company_user')->where('user_id', $id)->delete();
        $user->assignRole($request->input('roles'));
        $this->model->assignCompany($data['companies'], $user);
        return redirect()->route('admin.users.index')->with('message', 'User updated');
    }

    public function destroy($id)
    {
        $this->model->delete($id);
        return redirect()->route('admin.users.index')
            ->with('message', 'User deleted successfully');
    }

    public function removeCompany($user_id, $company_id)
    {
        $user = User::findOrFail($user_id);
        $user->companies()->detach($company_id);
        return redirect()->back()->with('message', 'Company removed for user');
    }
}
