<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Academic;
use App\Academic_type;
use App\Resume;
use App\Category;
use App\Role;
use App\Roles_permission;
use App\Permission;

class AcademicController extends Controller
{
    public function __construct()
    {
        //
    }


    public function index() {
       $data['academicos']      = Academic::all();
       //$data['academicos_tipos']      = Academic::all();
        return view('academics.show', $data);
    }

    public function show($id) {


    }

    public function create() {

    }

    public function store(Request $request) {

    }

    public function edit($id) {

    }

    public function update(Request $request, $id) {

    }

    public function destroy($id) {

    }


}
