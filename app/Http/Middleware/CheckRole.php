<?php

namespace App\Http\Middleware;

use App\Models\Role;
use Closure;
use Session;
use Request;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // get url after admin/
        $url_module = explode('/', Request::path())[1]; //current route word after admin/
        $permitted_modules = ['dashboard', 'logout']; //default for all 

        // if in permitted module or role is admin, let the request go 
        if ( Session::get('admin_role') == 'admin' || in_array($url_module, $permitted_modules)) {
            return $next($request);
        }

        // if above is false
        // if url_module is in the role permission set, then let it proceed
        $role = Role::where('role', Session::get('admin_role'))->first();

        // dd(json_decode($role->permissions));
        if($role != null){
            $role_permissions = json_decode($role->permissions); //current admin er role permissions

            if ( !in_array($url_module, $role_permissions) ) { //jodi admin/ er por current route word role permission array te na thake then dont let it pass
                session()->flash('Error', 'You are not permitted to access this url.');
                return redirect()->back();                
            }

            return $next($request); //else let it go
        }else{
            session()->flash('Error', 'Something went wrong !! Please try again.');
            return redirect()->back();
        }

        // if comes here .. return him back
        session()->flash('Error', 'Something went wrong !! Please try again.');
        return redirect()->back();
    }
}
