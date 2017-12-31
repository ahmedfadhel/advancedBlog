<?php

namespace App\Http\Controllers;
use App\Permission;
use Illuminate\Http\Request;
use Session;
class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $permissions = Permission::all();
			return view('manage.permissions.index')->withPermissions($permissions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('manage.permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      if($request->has('resource')){
            
				foreach($request->curd_box as $curd){
					$name = strtolower(substr($curd,0,1)).substr($curd,1)."-".strtolower(substr($request->resource,0,1)).substr($request->resource,1);
					$display_name = strtoupper(substr($curd,0,1)).substr($curd,1)." ".strtoupper(substr($request->resource,0,1)).substr($request->resource,1);
					$description = 'This Allow User To ' .' ' .strtoupper(substr($curd,0,1)).substr($curd,1) . ' '. strtoupper(substr($request->resource,0,1)).substr($request->resource,1);

					$permission = new Permission();
					$permission->name = $name;
					$permission->display_name = $display_name;
					$permission->description = $description;
					$permission->save();

				}
				return redirect()->route('permissions.index');
		}else{
			//Basic Permission Saving 
			$this->validate($request,[
				'display_name' => 'required|max:255',
        'name' => 'required|max:255|alphadash|unique:permissions,name',
        'description' => 'sometimes|max:255'
			]);
			$permission = new Permission();
			$permission->name = $request->name;
			$permission->display_name = $request->display_name;
			$permission->description = $request->description;

			if($permission->save()){
				return redirect()->route('permissions.show',$permission->id);
			}else{
				Session:flush('error','There was a Problem During Create New Permission');
				return redirect()->route('permissions.create');
			}
		}
	 }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
			$permission = Permission::findorFail($id);
			return view('manage.permissions.show')->withPermission($permission);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
			$permission = Permission::findorFail($id);
			return view('manage.permissions.edit')->withPermission($permission);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
			$this->validate($request,[
        'display_name' => 'required|max:255',
        'description' => 'sometimes|max:255'
      ]);
      $permission = Permission::findorFail($id);
			// $permission->name = $request->name;
			$permission->display_name = $request->display_name;
      $permission->description = $request->description;
      
      if($permission->save()){
        return redirect()->route('permissions.show',$permission->id);

      }else{
        Session::flush('error','There was problem occured When try to update with new Permissions');
        return redirect()->route('permissions.edit',$permission->id);
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
