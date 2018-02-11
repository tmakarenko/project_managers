<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Manager;
use App\Project;
use Validator;
use Illuminate\Support\Facades\Response;

class ManagerController extends Controller
{
    public function index(){
    	return view('managers.index',['mans' => Manager::all()]);
    }

    public function store(Request $request){
    	//$file = $request->file('file');

        $validator = Validator::make($request->all(),[
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|regex:/(0)[0-9]{9}/',
            'company' => 'required|string',
            'photo_link' => 'required|mimes:jpeg,jpg,png',
        ]);

        if ($validator->fails()) {
            return redirect('managers/create')
                        ->withErrors($validator)
                        ->withInput($request->all());
        }




        $file = $request->file('photo_link');
            $name = $file->getClientOriginalName();
            $file->move('photos' , $name);
            $inputs = $request->all();
            $inputs['photo_link'] = "photos/".$name;
    	Manager::create($inputs);
    	return redirect('/managers');
    }

    public function getProject($mid,$pid){
        try {
            Manager::find($mid)->projects()->attach(Project::find($pid));
            return redirect('/managers');
        } catch (Exception $e) {
            return Response::json("{}", 404);
        }
    }

    public function showProjects($mid){
        $response = [];
        try{
            $statusCode = 200;
        $projects = Manager::find($mid)->projects()->get();
        foreach($projects as $proj){
                $response[] = [
                    'id' => $proj->id,
                    'name' => $proj->name,
                    'price' => $proj->price,
                    'executor' => $proj->executor,
                    'execution_start_date' => $proj->execution_start_date,
                    'execution_end_date' => $proj->execution_end_date,
                ];
            }
        }catch(Exception $e){
            $statusCode = 400;
        }finally{
            return Response::json($response, $statusCode);
        }
    }
}
