<?php


namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Academic;
use App\Resume;
use App\Category;
use App\Role;
use App\Roles_permission;
use App\Permission;

use App\Teacher_category;
use App\Hierarchy;
use App\Academic_type;
use App\Event;
use Illuminate\Support\Collection;


class EventController extends Controller
{
    public function __construct()
    {
        //
    }


    public function index($id) {

    }

    public function show($id) {


        $data['academic']      = Academic::find($id);
        $data['events']      = Event::where('academic_id',$id)->get();
        $data['evento'] = null;
         return view('academics.log', $data);

    }

    public function create(Request $request) {


    }

    public function store(Request $request) {
        if($request->name_edit !== null){
            DB::table('events') ->updateOrInsert(
                ['academic_id' => $request->get('id'),'id'=>$request->event_id],
                ['name' => $request->name_edit, 'annotation'=> $request->annotation_edit]
            );

              $data['academic']      = Academic::find($request->get('id'));
              $data['events']      = Event::where('academic_id',$request->get('id'))->get();

              return redirect()->action('EventController@show',$request->get('id') );

        }

        else if($request->event_id !== null){
                $data['academic']      = Academic::find($request->get('id'));
                $data['events']      = Event::where('academic_id',$request->get('id'))->get();

                $data['evento']      = Event::where('academic_id',$request->get('id'))->get()->where('id', $request->event_id)->first();
                return view('academics.log', $data);


        }
        else {

            $event = new Event($request->all());
            $event->academic_id = $request->get('id');
            $event->name=$request->name;
            $event->annotation=$request->annotation;
            $event->save();
            return redirect()->action('EventController@show',$request->get('id') );


        }


    }

    public function edit($id) {

    }

    public function update(Request $request) {

        dd( $request->get('id') );



    }

    public function destroy($id) {

    }

}
