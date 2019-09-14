<?php

namespace App\Http\Controllers;

use App\File;
use App\Category;
use Spatie\Searchable\Search;
use Illuminate\Http\Request;
use \Conner\Tagging\Model\Tag;
use \Conner\Tagging\Model\Tagged;
use App\Resume;

class SearchController extends Controller
{
    public function autocomplete(Request $request)

    {
        $data = Tag::select("slug")->where("slug", "LIKE", "%{$request->input('query')}%")->get();
        return response()->json($data);
    }
    public function search(Request $request)
    {
        $searchResults = (new Search())
            ->registerModel(File::class, 'file_name', 'file_real_name')
            ->registerModel(Category::class, 'category_name')
            ->registerModel(Tagged::class, 'tag_slug')
            ->registerModel(Resume::class,'name','email')
            ->perform($request->input('query'));
        //$searchResults['tag']=$data;
        //dd($searchResults['tag']);
        return view('result', compact('searchResults'));
    }
}
