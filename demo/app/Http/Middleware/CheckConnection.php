<?php

namespace App\Http\Middleware;

use Closure;
use Config;
use DB;

class CheckConnection
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
        if( $request->session()->has('host') ) {
        Config::set('database.connections.tenant.host', session('host') );
        Config::set('database.connections.tenant.database', session('database') );
        Config::set('database.connections.tenant.username', session('db_user') );
        Config::set('database.connections.tenant.password', session('db_pass') );

        Config::set('database.default', 'tenant');
        DB::purge('tenant');
        DB::reconnect('tenant');
        // dd(\DB::connection('tenant'));

        return $next($request);

        } else {
            return redirect('addcredentials');
        }
    }
}
