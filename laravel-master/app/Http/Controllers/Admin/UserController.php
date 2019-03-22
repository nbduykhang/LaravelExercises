<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\User;
use App\Repositories\User\UserRepositoryInterface;
use App\Repositories\Role\RoleRepositoryInterface;
use App\Repositories\Tenant\TenantRepositoryInterface;
use App\Repositories\Relationship\RoleUserRepository;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use Hash;
use Auth;
use Config;

class UserController extends Controller
{
    private $userRepository;
    private $roleRepository;
    private $roleUserRepository;
    private $tenantRepository;

    public function __construct(UserRepositoryInterface $userRepository, RoleRepositoryInterface $roleRepository, RoleUserRepository $roleUserRepository, TenantRepositoryInterface $tenantRepository)
    {
        $this->userRepository = $userRepository;
        $this->roleRepository = $roleRepository;
        $this->roleUserRepository = $roleUserRepository;
        $this->tenantRepository = $tenantRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listData=$this->userRepository->getActivatedUser();
        $nameRoleUser = array();
        $nameTenantUser = array();
        foreach ($listData as $user) {
            $roleUser = $this->roleUserRepository->findByUserId($user->id);
            $tenantUser = $this->tenantRepository->findById($user->tenant);
            if($roleUser == null){
                $nameRoleUser[] = 'Not Available';
            } else {
                $role = $this->roleRepository->findById($roleUser->role_id);
                $nameRoleUser[] = $role->name;
            }
            if($tenantUser==null){
                $nameTenantUser[] = 'Not Available';
            } else {
                $nameTenantUser[] = $tenantUser->name;
            }
        }
        return view(Config::get('settings.default_theme').'.user.index',['listUser'=>$listData, 'listRoleUser'=>$nameRoleUser, 'listTenantUser'=>$nameTenantUser]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listDataRole = $this->roleRepository->all();
        $listDataTenant = $this->tenantRepository->all();
        return view('admin.user.create',['listRole'=>$listDataRole, 'listTenant'=>$listDataTenant]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        $input = array();
        $input1 = array();
        $input['first_name'] = $request->firstnameCreateUser;
        $input['last_name'] = $request->lastnameCreateUser;
        $input['username'] = $request->usernameCreateUser;
        $input['email']= $request->emailCreateUser;
        $input['phone']= $request->phoneCreateUser;
        $input['password'] = Hash::make($request->passwordCreateUser);
        if(isset($request->chkActiveCreateUser)){
            $input['status'] = $request->chkActiveCreateUser;
        } else {
            $input['status'] = 0;
        }
        $input['created_by'] = Auth::user()->id;
        
        if($request->selectTenantCreateUser!=0){
            $input['tenant'] = $request->selectTenantCreateUser;
        }
        
        $this->userRepository->create($input);
        
        if(isset($request->optradioRoleUser)){
            $input1['role_id'] = $request->optradioRoleUser;
            $lastUser = $this->userRepository->findLastId();
            $input1['user_id'] = $lastUser->id;
            $this->roleUserRepository->create($input1);
        }

        return redirect()->route('getUser');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $infoUser = $this->userRepository->findById($id);
        return view('admin.user.show')->with('userInfo',$infoUser);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = $this->userRepository->findById($id);
        $listDataRole = $this->roleRepository->all();
        $listDataTenant = $this->tenantRepository->all();
        $roleUser = $this->roleUserRepository->findByUserId($id);
        return view('admin.user.edit', ['userInfo'=>$user,'listTenant'=>$listDataTenant, 'listRole'=>$listDataRole, 'roleUserInfo'=>$roleUser]);  
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
        $input['first_name'] = $request->firstnameEditUser;
        $input['last_name'] = $request->lastnameEditUser;
        $input['username'] = $request->usernameEditUser;
        $input['email']= $request->emailEditUser;
        $input['phone']= $request->phoneEditUser;
        $input['updated_by'] = Auth::user()->id;
        if($request->selectTenantEditUser==0){
            $input['tenant'] = null;
        } else{
            $input['tenant'] = $request->selectTenantEditUser;
        }
        if($request->selectRoleEditUser!=0){
            $input1['role_id'] = $request->selectRoleEditUser;
            $this->roleUserRepository->updateOrCreate($input1, $id);
        }
        $this->userRepository->update($input,$id);
        return redirect()->route('getUser');
    }

    public function delete($id)
    {
        $this->userRepository->delete($id);
        return redirect()->route('getUser');
    }

    public function getDeleted(){
        $listData = $this->userRepository->getAllDeleted();
        $nameRoleUser = array();
        foreach ($listData as $user) {
            $roleUser = $this->roleUserRepository->findByUserId($user->id);
            if($roleUser == null){
                $nameRoleUser[] = 'Not Available';
            } else {
                $role = $this->roleRepository->findById($roleUser->role_id);
                $nameRoleUser[] = $role->name;
            }
            
        }
        return view('admin.user.listdeleted',['listUserDeleted'=>$listData, 'listRoleUserDeleted'=>$nameRoleUser]);
    }

    public function restoreDeleted($id){
        $this->userRepository->restoreDeleted($id);
        return redirect()->route('getUser');
    }

    public function restoreAllDeleted(){
        $this->userRepository->restoreAllDeleted();
        return redirect()->route('getUser');
    }

    public function getDeactivatedList(){
        $listData=$this->userRepository->getDeactivatedUser();
        $nameRoleUser = array();
        foreach ($listData as $user) {
            $roleUser = $this->roleUserRepository->findByUserId($user->id);
            if($roleUser == null){
                $nameRoleUser[] = 'Not Available';
            } else {
                $role = $this->roleRepository->findById($roleUser->role_id);
                $nameRoleUser[] = $role->name;
            }
        }
        return view('admin.user.listdeactivated',['listUser'=>$listData, 'listRoleUser'=>$nameRoleUser]);
    }

    public function activeUser($id){
        $this->userRepository->changeStatusActiveUser($id);
        return redirect()->route('getUser');
    }

    public function deactiveUser($id){
        $this->userRepository->changeStatusDeactiveUser($id);
        return redirect()->route('getUser');
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
