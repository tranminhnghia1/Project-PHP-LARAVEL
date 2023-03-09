<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;
class AdminPermissionController extends Controller
{
    //
    function __construct()
    {
        $this->middleware(function($request, $next){
            session(['module_active' => 'permission']);
            return $next($request);
        });
    }
    function list(){
        $permissions = Permission::paginate(10);
        $permissions_multip = data_tree($permissions);
        return view('admin/permission/list',compact('permissions_multip','permissions'));
    }
    function add(){
        $permissions_add = Permission::where('parent_cat','=','0')->get();
        
        return view('admin/permission/add',compact('permissions_add'));
    }
    function store(Request $request){ 
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
            'permission_description' => $request->input('display_name'),
            'parent_cat' => $request->input('permission_parent')
            
           
        ];
        $permission = Permission::create($datas);
        return redirect('admin/permission/list')->with('status', 'Đã thêm  danh mục mới thành công!');
    }
    function delete($id)
    {
        $role = Permission::findById($id);
        $role->delete();
        return redirect('admin/permission/list')->with('status', 'Đã xóa vai trò thành công!');

    }

    function edit($id){
        $permissions_edit = Permission::find($id);
        
        return view('admin/permission/edit',compact('permissions_edit'));
    }
    function update(Request $request,$id){ 
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
            'permission_description' => $request->input('display_name'),
            
            
           
        ];
        $id = $request->id; // Lấy giá trị id từ request
        $permission = Permission::find($id);
        $permission->update($datas);
        
        return redirect('admin/permission/list')->with('status', 'Đã cập nhật  danh mục mới thành công!');
    }
}
