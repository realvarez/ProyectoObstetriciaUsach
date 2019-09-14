<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
use Illuminate\Database\Eloquent\SoftDeletes;
use PDF;

class File extends Model implements Searchable
{
    //use \Spatie\Tags\HasTags;
    use \Conner\Tagging\Taggable;
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'category_id',
        'file_name',
        'file_real_name',
        'file_path',
        'file_extension',
        'file_size',
        'file_year',
        'state',
        'storage_type',
        'elimination_date'
    ];

    public function updated_by(){
        return $this -> belongsTo('App\User');
    }

    public function category(){
        return $this -> belongsTo('App\Category');
    }
    public function getSearchResult(): SearchResult
    {
        $url = route('category.show', $this->category_id);

        $name=$this->file_real_name;

        return new SearchResult(
            $this,
            $name,
            $url
         );
    }
}
