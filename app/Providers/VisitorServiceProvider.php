<?php

namespace App\Providers;

use App\Models\Visitor;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class VisitorServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        
        $this->logVisitor();
        View::composer('*', function ($view) {
            $view->with('visitorCount', Visitor::count());
        });
    }

    private function logVisitor(){
        $ipAddress = request()->ip();
        // Exclude internal IPs or bots (e.g., localhost or certain user agents)
        $excludedIps = ['127.0.0.1', '::1'];
        $userAgent = request()->userAgent();

        if (in_array($ipAddress, $excludedIps) || strpos($userAgent, 'bot') !== false) {
            return; // Don't log the visit
        }
        // Log only if the IP address hasn't been logged today
        if (!Visitor::where('ip_address', $ipAddress)->whereDate('created_at', now()->toDateString())->exists()) {
            Visitor::create([
                'ip_address' => $ipAddress,
            ]);
        }
    }
}
