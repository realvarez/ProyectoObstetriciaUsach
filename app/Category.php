<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model implements Searchable
{
    use SoftDeletes;

    protected $fillable = [
        'category_name',
        'category_level',
        'superior_category_id',
        'state',
        'elimination_date'
    ];

    public function fav(){
        return $this->belongsToMany(User::class, 'categories_users');
    }

    public function visited_by(){
        return $this->belongsToMany(User::class, 'user_record');
    }

    public function recursiveGet($category_id = false, $categories_list = false){
        if(!$category_id){
            $categories = ($categories_list ?: Category::where('category_level',"=", 1)->where('state',1)->get());
            foreach($categories as $category){
                $_category      = $this->recursiveGet($category->id);
                if($_category->isNotEmpty())
                    $category->sons = $_category;
            }
        }
        else{
            $categories = Category::where('superior_category_id', "=", $category_id)->where('state',1)->get();
            foreach($categories as $category){
                $category->sons = $this->recursiveGet($category->id);
            }
        }
        return $categories;
    }
    public function getSearchResult(): SearchResult
    {
        $url = route('category.show', $this->id);
        $name=$this->category_name;

        return new SearchResult(
            $this,
            $name,
            $url
         );
    }
}
