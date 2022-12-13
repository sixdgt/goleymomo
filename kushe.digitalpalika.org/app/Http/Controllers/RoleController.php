<?php

namespace App\Http\Controllers;

use FontLib\Table\Table;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use function PHPUnit\Framework\isEmpty;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RoleController extends Controller
{
    /**
     * Constructor
     * 
     * @return \Illuminate\Http\Response
     */

    function __construct(){
        $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index','store']]);
        $this->middleware('permission:role-create', ['only' => ['create','store']]);
        $this->middleware('permission:role-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:role-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request){
        $roles = Role::orderBy('id','DESC')->paginate(5);
        return view('roles.index',compact('roles'))->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create(){
        $permission = Permission::get();
        return view('roles.create',compact('permission'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'permission' => 'required',
        ]);

        $role = Role::create(['name' => $request->input('name')]);
        $role->syncPermissions($request->input('permission'));
        return redirect()->route('roles.index')->with('success','रोल सफलतापूर्वक सिर्जना गरियो |');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id){
        $role = Role::find($id);
        $rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
            ->where("role_has_permissions.role_id",$id)
            ->get();
        return view('roles.show',compact('role','rolePermissions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id){
        $role = Role::find($id);
        $permission = Permission::get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
            ->all();
        return view('roles.edit',compact('role','permission','rolePermissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $this->validate($request, [
            'name' => 'required',
//            'permission' => 'required',
        ]);
//        dd($request);
        $role = Role::find($id);
        $role->name = $request->input('name');
        if($role->save())
        {


                $permissions=Permission::all();
                foreach ($permissions as $permission)
                {
                    if($request->has($permission->id)) {
                        if($request->get($permission->id)==1)
                        {
                            if (DB::table('role_has_permissions')->where('role_id','=',$id)->where('permission_id',$permission->id)->get()->count()==0)
                            {
                                DB::table('role_has_permissions')->insert(['role_id'=>$id,'permission_id'=>$permission->id]);
                            }
                        }
                        if($request->get($permission->id)==0)
                        {
                            //if data is user has permission that will be removed

                            if (!DB::table('role_has_permissions')->where('role_id','=',$id)->where('permission_id',$permission->id)->get()->count()==0)
                            {
                                DB::table('role_has_permissions')->where('role_id','=',$id)->where('permission_id','=',$permission->id)->delete();
                            }
                        }
                    }
                }






            return redirect()->route('roles.show',$id)->with('success','रोल सफलतापूर्वक एडित गरियो|');
        }



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id){
        DB::table("roles")->where('id',$id)->delete();
        return redirect()->route('roles.index')->with('success','रोल सफलतापूर्वक हटाइयो |');
    }
}
