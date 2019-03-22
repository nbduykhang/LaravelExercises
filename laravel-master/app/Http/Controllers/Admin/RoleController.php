<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Role;
use App\Repositories\Role\RoleRepositoryInterface;
use App\Repositories\Permission\PermissionRepository;
use App\Repositories\Relationship\PermissionRoleRepository;
use App\Repositories\Relationship\RoleUserRepository;
use App\Repositories\User\UserRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\Role\StoreRoleRequest;
use App\Http\Requests\Role\UpdateRoleRequest;
use Auth;

class RoleController extends Controller
{
    private $roleRepository;
    private $permissionRepository;
    private $permissionRoleRepository;
    private $roleUserRepository;
    private $userRepository;

    public function __construct(RoleRepositoryInterface $roleRepository, PermissionRepository $permissionRepository, PermissionRoleRepository $permissionRoleRepository, RoleUserRepository $roleUserRepository, UserRepositoryInterface $userRepository)
    {
        $this->roleRepository = $roleRepository;
        $this->permissionRepository=$permissionRepository;
        $this->permissionRoleRepository=$permissionRoleRepository;
        $this->roleUserRepository = $roleUserRepository;
        $this->userRepository = $userRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $input = array();
        $input1 = array();
        $arrCount = array();
        $listDataRole = $this->roleRepository->all();
        foreach($listDataRole as $role){
            $arrCount[] = $this->roleUserRepository->countUserOfRole($role->id);
            //$listDataRolePermission = $this->permissionRoleRepository->findByRoleId($role->id);
            /*if($listRolePermission->isEmpty()){
                $input[$role->id] = array("");
            } else {
                foreach ($listRolePermission as $rolePermission) {
                    $permission = $this->permissionRepository->findById($rolePermission->permission_id);
                    $input1[] = $permission->name;
                }
                $input[$role->id] = $input1;
            }*/
        }
        return view('admin.role.index',['listRole'=>$listDataRole, 'listCountRoleUser'=>$arrCount]);    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listData = $this->permissionRepository->all();
        return view('admin.role.create')->with('listPermission',$listData);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRoleRequest $request)
    {
        $input = array();
        $input1 = array();

        
        $input['name'] = $request->nameCreateRole;

           
        $input['sort'] = $request->sortCreateRole;
        if(isset($request->chkActiveCreateRole)){
            $input['status'] = $request->chkActiveCreateRole;
        } else {
            $input['status'] = 0;
        }
        $input['created_by'] = Auth::user()->id;

        if(isset($request->chkAllPermissionCreateRole)){
            $input['all'] = true;
            $this->roleRepository->create($input);
            $listPermission = $this->permissionRepository->all();
            foreach($listPermission as $permission){
                $input1['permission_id'] = $permission->id;
                $lastRole = $this->roleRepository->findLastId();
                $input1['role_id'] = $lastRole->id;
                $this->permissionRoleRepository->create($input1);
            }
        } else {
            $input['all'] = false;
            $this->roleRepository->create($input);
            if($request->selectPermissionCreateRole!=0){
                $input1['permission_id'] = $request->selectPermissionCreateRole;
                $lastRole = $this->roleRepository->findLastId();
                $input1['role_id'] = $lastRole->id;
                $this->permissionRoleRepository->create($input1);
            }
        }        
        return redirect()->route('getRole');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $infoRole = $this->roleRepository->findById($id);
        $listDataRolePermission = $this->permissionRoleRepository->findByRoleId($id);
        $infoUserCreate = $this->userRepository->findById($infoRole->created_by);
        $infoUserUpdate = $this->userRepository->findById($infoRole->updated_by);
        return view('admin.role.show',['roleInfo'=>$infoRole, 'listRolePermission'=>$listDataRolePermission, 'userCreate'=>$infoUserCreate, 'userUpdate'=>$infoUserUpdate]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = $this->roleRepository->findById($id);
        $listDataPermission=$this->permissionRepository->all();
        return view('admin.role.edit', compact('role'))->with('listPermission',$listDataPermission);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRoleRequest $request, $id)
    {
        $input['name'] = $request->nameEditRole;
        $input['sort'] = $request->sortEditRole;
        $input['updated_by'] = Auth::user()->id;
        $this->roleRepository->update($input, $id);
        return redirect()->route('getRole');
    }

    public function delete($id)
    {
        $this->roleRepository->delete($id);
        return redirect()->route('getRole');
    }

    public function getDeleted(){
        $listData = $this->roleRepository->getAllDeleted();
        return view('admin.role.listdeleted')->with('listRoleDeleted',$listData);
    }

    public function restoreDeleted($id){
        $this->roleRepository->restoreDeleted($id);
        return redirect()->route('getRole');
    }

    public function restoreAllDeleted(){
        $this->roleRepository->restoreAllDeleted();
        return redirect()->route('getRole');
    }

    public function changeStatus($id){
        $this->roleRepository->changeStatus($id);
        return redirect()->route('getRole');
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
