<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Auth;
use App\Role;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    public function index()
    {
        $category = new Category();
        $data['categories'] = $category -> recursiveGet();
        $fav_categories = Auth::user()->favorite_categories;
        foreach ($data['categories'] as $categorie) {
            if($fav_categories->contains($categorie)){
                $categorie->favorite = true;
            }
        }
        return view('categories.index',$data);
    }
}
