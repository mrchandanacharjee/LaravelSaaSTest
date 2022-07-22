<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Tenant;
use App\Http\Requests\RegisterTenantRequest;
use Illuminate\Support\Facades\Auth;

class RegisteredTenantController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(RegisterTenantRequest $request)
    {

        $tenant = Tenant::create($request->validated());

        $tenant->createDomain(['domain' => $request->domain]);

        $redirectUrl = '/dashboard';

        // $user = $tenant->run(function ($tenant) {
        //     return  User::create($tenant->only('name', 'email', 'password'));            
        //  });

        $token = tenancy()->impersonate($tenant, 1, $redirectUrl);       

        return redirect(tenant_route($tenant->domains->first()->domain, 'tenant.impersonation', $token));
             

    }
}
