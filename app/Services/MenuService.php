<?php
// app/Services/MenuService.php
namespace App\Services;
use App\Models\Category;


class MenuService
{
    public function generateMegaMenu()
    {
        $categories = Category::with(['children' => function($query) {
            $query->where('is_active', true);
        }])
            ->whereNull('parent_id')
            ->where('is_active', true)
            ->orderBy('order')
            ->get();

        return $categories;
    }


    //with cache
//    public function generateMegaMenu()
//    {
//        return Cache::remember('mega-menu', now()->addDays(1), function() {
//            return Category::with(['children' => function($query) {
//                $query->where('is_active', true);
//            }])
//                ->whereNull('parent_id')
//                ->where('is_active', true)
//                ->orderBy('order')
//                ->get();
//        });
//    }
}


?>