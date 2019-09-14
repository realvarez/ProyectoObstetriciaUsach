<?php

namespace App\Http\Controllers;
use Auth;
use App\Category;
use App\User;
use App\Permission;
use App\File;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {

    }

    public function show($id) {
        Auth::user()->record_categories()->attach($id);
        $category = new Category();
        $data['categories'] = $category -> recursiveGet($id);
        $fav_categories = Auth::user()->favorite_categories;
        foreach ($data['categories'] as $categorie) {
            if($fav_categories->contains($categorie)){
                $categorie->favorite = true;
            }
        }

        // $allCategories      = Category::all();
        $data['_category']  = Category::find($id);
        if($data['_category']->category_level!=1)
            $data['_category_father']  = Category::find($data['_category']->superior_category_id);

        $data['files']      = File::where('category_id', $id)->where('state',1)->get();
        $data['actualId'] = $id;
        return view('categories.show')->with($data);
    }

    public function create() {
        return view('categories.create');
    }

    public function store(Request $request) {
        $category = new Category($request->all());
        if($category->superior_category_id != 0){
            $category->category_level=2;
        }
        else{
            $category->category_level=1;
        }
        //por ahora solo categorias y no subcategorias :C
        $category->state=1;
        $path = $category->category_name;

        $PermisssionView = new Permission(['name'=>'ver_'.$request->category_name, 'type'=>2]);
        $PermissionAdmin = new Permission(['name'=>'administrar_'.$request->category_name,'type'=>2]);
        $PermisssionView -> save();
        $PermissionAdmin -> save();
        $category->save();
        return redirect()->action('CategoryController@show', ['id' => $category->id]);;
    }

    public function edit($id) {
        $Category= Category::find($id);
        return $Category;
    }

    public function update(Request $request, $id) {
        $Category= Category::find($id);
        $Category->update($request->all());
        return redirect()->action('CategoryController@show', $id);
    }

    public function destroy($id) {
        $Category = Category::find($id);
        $Category->destroy();
    }

    public function addToFavorite(Request $request){
        $usuario = User::find($request->id);
        $usuario->favorite_categories()->attach($request->cat);
        echo "ok";
    }

    public function removeFromFavorite(Request $request){
        $usuario = User::find($request->id);
        $usuario->favorite_categories()->detach($request->cat);
        echo "ok";
    }
    public function getcat($id){
        $user = Category::find($id);
        unset($user->elimination_date, $user->id);
        return $user;
    }
}

