<?php

namespace App\Http\Controllers;


use App\Http\Traits\ResponseMessage;
use Dotenv\Dotenv;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use Mockery\CountValidator\Exception;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{   use ResponseMessage;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::orderBy('id', 'desc')->where('id','>',Auth::user()->roles->first()->id)->get();

        return view('roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   $role = new Role();
        $collection = Route::getRoutes();
        $routes = [];
        foreach ($collection as $key => $route) {
            $routes[] = $route->getName();
        }
        $match_key = array_search('/', $routes);
        if ($match_key)
            $routes = array_slice($routes, $match_key);
        $route_tree = [];
        foreach ($routes as $key => $item) {
            if(strpos($item,'.')){
                $route = substr($item,0,strpos($item,'.'));
                $value = substr($item,strpos($item,'.')+1,strlen($item));
                $route_tree[$route][]=$value;
                
            }else{
                $route_tree[$item]= $item;
            }

        }

        $this->createPermission($routes);
        return view('roles.create', compact('role', 'route_tree'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|unique:roles,name',
                'permissions' => 'required'
            ]);
            $permissions = $request->input('permissions');
            $role = Role::create(Input::except(array('permissions')));
            if ($role) {
                $this->setPermission($role, $permissions);
                return redirect('roles')->with($this->create_success_message);
            } else {
                return back()->withInput()->with($this->create_fail_message);
            }
        } catch (Exception $ex) {
            Log::error($ex->getMessage());
            return back()->withInput()->with($this->create_fail_message);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::find($id);
        if ($role) {
            return view('roles.show', compact('role', 'routes'));
        } else {
            return redirect()->back()->with($this->not_found_message);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::find($id);

        if ($role) {
            $collection = Route::getRoutes();
             dd($collection);
            $routes = [];

            foreach ($collection as $key => $route) {
                $routes[] = $route->getName();
            }

            $match_key = array_search('/', $routes);

            if ($match_key)
                $routes = array_slice($routes, $match_key);
                $route_tree = [];

            foreach ($routes as $key => $item) {
                if(strpos($item,'.')){
                    $route = substr($item,0,strpos($item,'.'));
                    $value = substr($item,strpos($item,'.')+1,strlen($item));
                    $route_tree[$route][]=$value;
                }else{
                    $route_tree[$item]= $item;
                }

            }

            return view('roles.edit', compact('role', 'routes','route_tree'));
        } else {
            return redirect()->back()->withInput()->with($this->not_found_message);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'name' => 'required|unique:roles,name,' . $id
            ]);
            $role = Role::find($id);
            if ($role) {
                $role->fill(Input::except(array('permissions')))->update();
                $permissions = $request->input('permissions');
                $this->updatePermission($role, $permissions);
                return redirect('roles')->with($this->update_success_message);
            } else {
                return back()->withInput()->with($this->not_found_message);
            }
        } catch (Exception $ex) {
            Log::error($ex->getMessage());
            return back()->withInput()->with($this->update_fail_message);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $role = Role::find($id);
            if ($role) {
                $role->delete();
                return redirect('roles')->with($this->delete_success_message);
            } else {
                return back()->with($this->not_found_message);
            }
        }catch (\Exception $exception){
            Log::error($exception->getMessage());
            return back()->with($this->delete_fail_message);
        }
    }

    public function setPermission($role, $permissions)
    {
        foreach ($permissions as $perm) {
            $role->givePermissionTo($perm);
        }
    }

    public function updatePermission($role, $permissions)
    {
        $role->syncPermissions($permissions);
    }
    public function createPermission($permissions)
    {
        foreach ($permissions as $perm) {
            $permission = Permission::where('name',$perm)->first();
            if(!$permission)
                Permission::create(['name' => $perm]);
        }
    }
}
