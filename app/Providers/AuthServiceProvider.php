<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Organization Gates
        Gate::define('registerOrganization', function($user){
            return $user->hasRole('admin');
        });
        Gate::define('editOrganization', function($user){
            return $user->hasAnyRoles(['admin', 'organizationHead']);
        });
        Gate::define('manageOrganization', function($user){
            return $user->hasAnyRoles(['admin', 'organizationHead']);
        });
        Gate::define('deleteOrganization', function($user){
            return $user->hasRole('admin');
        });

        // Branch gates
        Gate::define('registerBranch', function($user){
            return $user->hasRole('admin');
        });
        Gate::define('editBranch', function($user){
            return $user->hasAnyRoles(['admin', 'organizationHead','branchHead']);
        });
        Gate::define('manageBranch', function($user){
            return $user->hasAnyRoles(['admin', 'organizationHead','branchHead']);
        });
        Gate::define('userBranches', function($user){
            return $user->hasAnyRoles([ 'organizationHead','branchHead']);
        });
        Gate::define('deleteBranch', function($user){
            return $user->hasRole('admin');
        });

        // Department Gates
        Gate::define('registerDepartment', function($user){
            return $user->hasRole('admin');
        });
        Gate::define('editDepartment', function($user){
            return $user->hasAnyRoles(['admin', 'organizationHead','branchHead','departmentHead']);
        });
        Gate::define('userDepartment', function($user){
            return $user->hasAnyRoles(['organizationHead','branchHead','departmentHead']);
        });
        Gate::define('deleteDepartment', function($user){
            return $user->hasRole('admin');
        });

        //Device Gates
        Gate::define('registerDevice', function($user){
            return $user->hasRole('admin');
        });
        Gate::define('editDevice', function($user){
            return $user->hasAnyRoles(['admin', 'organizationHead','branchHead','departmentHead']);
        });
        Gate::define('deleteDevice', function($user){
            return $user->hasRole('admin');
        });





        Gate::define('isAdmin', function($user){
            return $user->hasRole('admin');
        });
        
        Gate::define('isStaff', function($user){
            return $user->hasRole('staff');
        });
        Gate::define('isOrganizationHead', function($user){
            return $user->hasRole('organizationHead');
        });
        Gate::define('isBranchHead', function($user){
            return $user->hasRole('branchHead');
        });
        Gate::define('isDepartmentHead', function($user){
            return $user->hasRole('departmentHead');
        });
    }
}
