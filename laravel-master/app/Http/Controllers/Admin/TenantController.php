<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\Tenant\TenantRepositoryInterface;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Theme;

class TenantController extends Controller
{
    private $tenantRepository;
    private $userRepository;

    public function __construct(TenantRepositoryInterface $tenantRepository, UserRepositoryInterface $userRepository)
    {
        $this->tenantRepository = $tenantRepository;
        $this->userRepository = $userRepository;
    } 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listData=$this->tenantRepository->getActivatedTenant();
        return view('admin.tenant.index',['listTenant'=>$listData]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listData=Theme::all();
        return view('admin.tenant.create',['listTheme'=>$listData]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input['name'] = $request->nameCreateTenant;
        $input['subdomain'] = $request->subdomainCreateTenant;
        if(isset($request->chkEnableCreateTenant)){
            $input['enable'] = $request->chkEnableCreateTenant;
        } else {
            $input['enable'] = 0;
        }
        if($request->selectThemeCreateTenant==0){
            $input['theme'] = null;
        } else {
            $input['theme'] = $request->selectThemeCreateTenant;
        }
        $input['created_by'] = Auth::user()->id;
        $this->tenantRepository->create($input);
        return redirect()->route('getTenant');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tenant = $this->tenantRepository->findById($id);
        $createUser = $this->userRepository->findById($tenant->created_by);
        $updateUser = $this->userRepository->findById($tenant->updated_by);
        return view('admin.tenant.show',['tenantInfo'=>$tenant, 'createUserInfo'=>$createUser, 'updateUserInfo'=>$updateUser]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $listData=Theme::all();
        $tenant = $this->tenantRepository->findById($id);
        return view('admin.tenant.edit',['tenantInfo'=>$tenant, 'listTheme'=>$listData]);
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
        $input['name'] = $request->nameEditTenant;
        $input['subdomain'] = $request->subdomainEditTenant;
        if($request->selectThemeEditTenant == 0){
            $input['theme'] = null;
        } else{
            $input['theme'] = $request->selectThemeEditTenant;
        }
        $input['updated_by'] = Auth::user()->id;
        $this->tenantRepository->update($input, $id);
        return redirect()->route('getTenant');
    }

    public function delete($id)
    {
        $this->tenantRepository->delete($id);
        return redirect()->route('getTenant');
    }

    public function getDeleted(){
        $listData = $this->tenantRepository->getAllDeleted();
        return view('admin.tenant.listdeleted',['listTenantDeleted'=>$listData]);
    }

    public function restoreDeleted($id){
        $this->tenantRepository->restoreDeleted($id);
        return redirect()->route('getTenant');
    }

    public function restoreAllDeleted(){
        $this->tenantRepository->restoreAllDeleted();
        return redirect()->route('getTenant');
    }

    public function getDeactivatedList(){
        $listData=$this->tenantRepository->getDeactivatedTenant();
        return view('admin.tenant.listdeactivated',['listTenant'=>$listData]);
    }

    public function activeTenant($id){
        $this->tenantRepository->changeStatusActiveTenant($id);
        return redirect()->route('getTenant');
    }

    public function deactiveTenant($id){
        $this->tenantRepository->changeStatusDeactiveTenant($id);
        return redirect()->route('getTenant');
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
