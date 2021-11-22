<?php

namespace App\Providers;
use App\Language;
use App\MainCategory;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::share('langs', Language::all());
        $data['cat'] = MainCategory::orderBy('_id', 'asc')->with('languages')->get();
        $data['categories'] = $data['cat']->map(function($category){
            if ($category->languages) {
                foreach ($category->languages as $value) {
                    if ($value->key == app()->getLocale()) {
                        $category->category_name = $value->value;
                        return $category;
                    }
                }
                return $category;
            }
            return $category;
        });
        View::share('s_cats', $data['categories']);
    }
}
