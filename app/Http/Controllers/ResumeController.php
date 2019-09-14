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


class ResumeController extends Controller
{
    public function __construct()
    {
        //
    }


    public function index($id) {

    }

    public function show($id) {

        $data['academic']      = Academic::find($id);
        $data['resume']      = Resume::where('academic_id',$id)->first();

        $data['all_teacher_category']      = Teacher_category::all()    ;
        $data['all_hierarchy']      = Hierarchy::all()    ;
        $data['all_academic_type']      = Academic_type::all()   ;

        if($data['resume'] == null){
            $data['exists'] = false;
        }
        else{
            $data['exists'] = true;

        }
         return view('academics.resume', $data);

    }

    public function create() {

    }

    public function get(Request $request) {

    }

    public function store(Request $request) {
        /*DB::table('resumes') ->updateOrInsert(
            ['academic_id' => $request->get('id')],
            $request->replace($request->except('_token','id'))->all()
        );*/

        /*FORMA MANUAL*/
        $resume = Resume::where('academic_id',$request->get('id'))->get();

        if($resume->count() == 0){
            $resume = new Resume($request->all());

            $resume->phone=$request->phone;
            $resume->hours=$request->hours;
            $resume->area_competence=$request->area_competence;
            $resume->address=$request->address;
            $resume->birth_date=$request->birth_date;
            $resume->email=$request->email;

            //Aca esta el id del academico
            //dd($request->resume_academic_id);

            $resume->academic_id=$request->get('id');
            $resume->academic_type_id=$request->academic_type_id;
            $resume->hierarchy_id=$request->hierarchy_id;
            $resume->teacher_category_id=$request->teacher_category_id;
            $resume->save();


        }
        else{
            $aux = $resume->values()->get(0);
            $aux->update($request->all());



        }

        return redirect()->action('AcademicController@index');;

    }

    public function edit($id) {

    }

    public function update(Request $request, $id) {

    }

    public function destroy($id) {

    }

}
