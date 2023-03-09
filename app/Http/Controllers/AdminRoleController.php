<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;

class AdminRoleController extends Controller
{
    //
    function __construct()
    {
        $this->middleware(function ($request, $next) {
            session(['module_active' => 'role']);
            return $next($request);
        });
    }
    public function phanvaitro()
    {
    }
    function add(Request $request)
    {
        //Role::create(['name'=>'developer']);
        // Permission::create(['name'=>'Delete Product']);
        //$role = Role::find(2);
        // $permission = Permission::find(3);
        // $role->givePermissionTo($permission);
        // $permission->assignRole($role);

        //auth()->user()->assignRole(['admin','guest','content','devoloper']);
        // auth()->user()->givePermissionTo(['Delete Product','Edit Product']);

        // $user = User::find(1);
        // $user->assignRole('content');
        // if($user->hasRole('hello')){
        //     return "ok";
        // }else{
        //     return "ko";
        // };

        $permission = Permission::orderBy('name', 'ASC')->where('parent_cat', '!=', '0')->get();

        return view('admin.role.add', compact('permission'));
    }

    function store(Request $request)
    {
        $data = $request->all();
        $request->validate(
            [
                'name' => ['required', 'string', 'min:2', 'max:255'],
                'display_name' => ['required', 'string', 'min:3'],


            ],
            [
                'required' => ':attribute không được để trống',
                'min' => ':attribute có độ dài ít nhất :min ký tự',
                'max' => ':attribute có độ dài tối đa :max ký tự'


            ],
            [
                'name' => 'Tên vai trò',
                'display_name' => 'Mô tả vai trò',

            ]

        );


        $datas = [
            'name' => $request->input('name'),
            'role_description' => $request->input('display_name'),


        ];

        $role = Role::create($datas);


        $role->syncPermissions($data['permission_id']);
        return redirect('admin/role/add')->with('status', 'Đã thêm vai trò thành công!');
    }
    function list()
    {
        $role = Role::all();
        return view('admin/role/list', compact('role'));
    }

    function edit(Request $request, $id)
    {


        //  $permission = Permission::find($id);
        $roles = Role::find($id);
        $permissions = Permission::orderBy('name', 'ASC')->where('parent_cat', '!=', '0')->get();

        //  return $permission;
        //  $get_permission_via_role = $roles ->getPermissionViaRoles();
        return view('admin.role.edit', compact('permissions', 'roles'));
    }
    function update(Request $request, $id)
    {
        $data = $request->all();
        $request->validate(
            [
                'name' => ['required', 'string', 'min:2', 'max:255'],
                'display_name' => ['required', 'string', 'min:3'],


            ],
            [
                'required' => ':attribute không được để trống',
                'min' => ':attribute có độ dài ít nhất :min ký tự',
                'max' => ':attribute có độ dài tối đa :max ký tự'


            ],
            [
                'name' => 'Tên vai trò',
                'display_name' => 'Mô tả vai trò',

            ]

        );


        $datas = [
            'name' => $request->input('name'),
            'role_description' => $request->input('display_name'),


        ];


        $id = $request->id; // Lấy giá trị id từ request
        $role = Role::find($id);
        $role->update($datas);
        //  $role =Role::where('id', $id)->update ($datas);
        $permission = $request->input('permission_id', []);
        $role->syncPermissions($permission);
        return redirect('admin/role/list')->with('status', 'Đã cập nhật vai trò thành công!');
    }
    function delete($id)
    {
        $role = Role::findById($id);
        $role->delete();
        return redirect('admin/role/list')->with('status', 'Đã xóa vai trò thành công!');

    }
}
