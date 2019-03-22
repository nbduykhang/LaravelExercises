<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Permission;
use App\Repositories\Permission\PermissionRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\Permission\StorePermissionRequest;
use App\Http\Requests\Permission\UpdatePermissionRequest;
use Auth;

class PermissionController extends Controller
{
    private $permissionRepository;

    public function __construct(PermissionRepositoryInterface $permissionRepository)
    {
        $this->permissionRepository = $permissionRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listData = $this->permissionRepository->all();
        return view('admin.permission.index')->with('listPermission',$listData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.permission.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePermissionRequest $request)
    {
        $input = array();
        $input['name'] = $request->nameCreatePermission;
        $input['display_name'] = $request->displaynameCreatePermission;
        $input['sort'] = $request->sortCreatePermission;
        $input['created_by'] = Auth::user()->id;

        $this->permissionRepository->create($input);
        return redirect()->route('getPermission');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permission = $this->permissionRepository->findById($id);
        return view('admin.permission.edit', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePermissionRequest $request, $id)
    {
        $input = array();
        $input['name'] = $request->nameEditPermission;
        $input['display_name'] = $request->displaynameEditPermission;
        $input['sort'] = $request->sortEditPermission;
        $input['updated_by'] = Auth::user()->id;

        $this->permissionRepository->update($input, $id);
        return redirect()->route('getPermission');
    }

    public function delete($id)
    {
        $this->permissionRepository->delete($id);
        return redirect()->route('getPermission');
    }

    public function getDeleted(){
        $listData = $this->permissionRepository->getAllDeleted();
        return view('admin.permission.listdeleted')->with('listPermissionDeleted',$listData);
    }

    public function restoreDeleted($id){
        $this->permissionRepository->restoreDeleted($id);
        return redirect()->route('getPermission');
    }

    public function restoreAllDeleted(){
        $this->permissionRepository->restoreAllDeleted();
        return redirect()->route('getPermission');
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
