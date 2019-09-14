<?php

namespace App\Http\Controllers;

use App\File;
use Auth;
use Illuminate\Support\Facades\Storage;
use App\Category;
use Illuminate\Http\Request;
use PDF;
use Spatie\Tags\Tag;
use Illuminate\Contracts\Auth\Guard;
use Youtube;

class FileController extends Controller
{

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    public function index()
    { }

    public function show($id)
    {
        $file = File::find($id);
        return $file;
    }

    public function store(Request $request)
    {

        //Se sube un link de youtube
        if ($request->file_link !== null) {
            //Validar con expresiones regulares si es valido.
            $url = $request->file_link;
            $result = [];
            if (preg_match('/youtu\.?be/', $url)) {
                $category               =  Category::find($request->category_id);
                $route                  =  $category->category_name;
                if ($category->category_level != 1) {
                    while ($category->category_level != 1) {
                        $category         =  Category::find($category->superior_category_id);
                        $route            =  $category->category_name . '/' . $route;
                    }
                }
                $file                   =  new File($request->all());
                $file->user_id          =  Auth::user()->id;
                $patterns = array(
                    "/youtu\.be\/([^#\&\?]{11})/",  // youtu.be/<id>
                    "/\?v=([^#\&\?]{11})/",         // ?v=<id>
                    "/\&v=([^#\&\?]{11})/",         // &v=<id>
                    "/embed\/([^#\&\?]{11})/",      // embed/<id>
                    "/\/v\/([^#\&\?]{11})/"         // /v/<id>
                );
                // If any pattern matches, return the ID
                for ($i = 0; $i < count($patterns); $i++) {
                    if (preg_match($patterns[$i], $url)) {
                        preg_match_all($patterns[$i], $url, $example_array);
                        $result = $example_array;
                        break;
                    }
                }

                $idVideo = $result[count($result) - 1][0];
                $homepage = file_get_contents('https://www.googleapis.com/youtube/v3/videos?key=AIzaSyA04eUTmTP3skSMcRXWeXlBNI0luJ2146c&part=snippet&id=' . $idVideo);
                $json = json_decode($homepage);
                //dd($json->items[0]->snippet->title);


                $file->file_real_name   =  $json->items[0]->snippet->title;
                $file->storage_type     =  2;
                $file->file_extension   =  'mp4';

                $file->file_name        =  $category->category_name . '_' . $request->file_year . '.' . $file->file_extension;

                $file->file_size        =  0;
                $file->user_id          =  $this->auth->user()->id;

                $tags_in = explode(",", $request->file_tags);
                $file->file_path = 'https://www.youtube.com/embed/' . $idVideo;

                $file->save();
                $file->tag($tags_in);
            } else {
                dd('no paso nada ');

                //No se reconocio nada
            }
        } else {
            //==============================MULTIPLE UPLOAD TEST====================================
            //Se sube archivos
            //$files = $request->file;
            //$uploadcount = 0;
            //$file_count = count($files);
            //dd($request->all());
            // start count how many uploaded
            /*foreach ($files as $file_aux) {
                $rules = array('file' => 'required|file|mimes:pdf,doc,docx,ppt,pptx,mp4|max:9000');
                $validator = Validator::make(array('file' => $file_aux), $rules);
                if ($validator->passes()) {
                    //Si pasa el validador
                    $category               =  Category::find($request->category_id);
                    $route                  =  $category->category_name;
                    if ($category->category_level != 1) {
                        while ($category->category_level != 1) {
                            $category         =  Category::find($category->superior_category_id);
                            $route            =  $category->category_name . '/' . $route;
                        }
                    }
                    $file                   =  new File($request->all());
                    $file->user_id          =  Auth::user()->id;
                    $file->file_real_name   =  $request->file('file')->getClientOriginalName();
                    $file->storage_type     =  1;
                    $file->file_extension   =  $request->file('file')->getClientOriginalExtension();

                    $file->file_name        =  $category->category_name . '_' . $request->file_year . '.' . $file->file_extension;

                    $file->file_size        =  $request->file('file')->getClientSize();
                    $file->user_id          =  $this->auth->user()->id;

                    $path = Storage::putFileAs($route, $request->file('file'), $file->file_real_name);
                    $tags_in = explode(",", $request->file_tags);

                    if ($file->file_extension == 'mp4') {
                        $video = Youtube::upload(storage_path('app/' . $path), [
                            'title'       => $file->file_real_name,
                            'description' => 'You can also specify your video description here.',
                            'tags'          => ['foo', 'bar', 'baz'],
                            'category_id' => 10
                        ], 'private');
                        $file->file_path = 'https://www.youtube.com/embed/' . $video->getVideoId();
                        $file->storage_type  = 2;
                        $file->save();
                        $file->tag($tags_in);
                        Storage::delete($route . '/' . $file->file_real_name);
                    } else {
                        $file->file_path        =  $path;
                        $file->state            =  1;
                        $file->save();
                        $file->tag($tags_in);
                    }
                }
            }

            if ($uploadcount == $file_count) {
                //uploaded successfully
            } else {
                //error occurred
            }*/
            //===================================== END MULTIPLE=====================================
            $this->validate($request, [
                'file'   => 'required|file|mimes:pdf,doc,docx,ppt,pptx,mp4|max:9000'
            ]);
            $category               =  Category::find($request->category_id);
            $route                  =  $category->category_name;
            if ($category->category_level != 1) {
                while ($category->category_level != 1) {
                    $category         =  Category::find($category->superior_category_id);
                    $route            =  $category->category_name . '/' . $route;
                }
            }
            $file                   =  new File($request->all());
            $file->user_id          =  Auth::user()->id;
            $file->file_real_name   =  $request->file('file')->getClientOriginalName();
            $file->storage_type     =  1;
            $file->file_extension   =  $request->file('file')->getClientOriginalExtension();

            $file->file_name        =  $category->category_name . '_' . $request->file_year . '.' . $file->file_extension;

            $file->file_size        =  $request->file('file')->getClientSize();
            $file->user_id          =  $this->auth->user()->id;

            $path = Storage::putFileAs($route, $request->file('file'), $file->file_real_name);
            $tags_in = explode(",", $request->file_tags);

            if ($file->file_extension == 'mp4') {
                $video = Youtube::upload(storage_path('app/' . $path), [
                    'title'       => $file->file_real_name,
                    'description' => 'You can also specify your video description here.',
                    'tags'          => ['foo', 'bar', 'baz'],
                    'category_id' => 10
                ], 'private');
                $file->file_path = 'https://www.youtube.com/embed/' . $video->getVideoId();
                $file->storage_type  = 2;
                $file->save();
                $file->tag($tags_in);
                Storage::delete($route . '/' . $file->file_real_name);
            } else {
                $file->file_path        =  $path;
                $file->state            =  1;
                $file->save();
                $file->tag($tags_in);
            }
        }

        return redirect()->action('CategoryController@show', ['id' => $request->category_id]);
    }

    public function edit($id)
    {
        $file = File::find($id);
        return $file;
    }

    public function vieWord($url)
    {
        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $phpWord = \PhpOffice\PhpWord\IOFactory::load($url);
        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'HTML');
        try {
            $objWriter->save(storage_path('temp.html'));
        } catch (Exception $e) { }
        return PDF::loadFile(storage_path('temp.html'))->save(storage_path('tempPdf.html'))->stream('temporalview.pdf');
    }

    public function update(Request $request, $id)
    {

        $file = File::find($id);
        $file->update($request->all());
    }

    public function destroy($id)
    { }
}
