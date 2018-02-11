<?php

namespace App\Http\Controllers;
use Validator;
use Illuminate\Http\Request;
use App\Project;
use App\Manager;
use Illuminate\Support\Facades\Response;


class ProjectController extends Controller
{
    
	public function index(){
		return view('projects.index',['projects' => Project::all()]);
	}

    public function store(Request $request){

    	$validator = Validator::make($request->all(),[
    		'name' => 'required|string',
    		'price' => 'required|numeric',
    		'executor' => 'required|string',
    		'execution_start_date' => 'required|date',
    		'execution_end_date' => 'required|date',
		]);

		if ($validator->fails()) {
            return redirect('projects/create')
                        ->withErrors($validator)
                        ->withInput($request->all());
        }



    	Project::create($request->all());
    	return redirect('/projects');
    }



    public function getManager($pid,$mid){
        try {
            Project::find($pid)->managers()->attach(Manager::find($mid));
        return redirect('/projects');
        } catch (Exception $e) {
            return Response::json("{}", 404);
        }
    }

    public function showManagers($pid){
        $response = [
            
        ];
        $managers = Project::find($pid)->managers()->get();
        try{
            $statusCode = 200;
        
        foreach($managers as $man){
                $response [] = [
                    'id' => $man->id,
                    'name' => $man->name,
                    'email' => $man->email,
                    'phone' => $man->phone,
                    'company' => $man->company,
                    'photo_link' => $man->photo_link
                ];
            }
        }catch(Exception $e){
            $statusCode = 400;
        }finally{
            return Response::json($response, $statusCode);
        }
    }

    public function updateView($pid){
        return view('projects.update',['proj' => Project::find($pid)]);
    }

    
    public function update($pid, Request $request){
        $validator = Validator::make($request->all(),[
            'name' => 'required|string',
            'price' => 'required|numeric',
            'executor' => 'required|string',
            'execution_start_date' => 'required|date',
            'execution_end_date' => 'required|date',
        ]);

        if ($validator->fails()) {
            return redirect('projects/create')
                        ->withErrors($validator)
                        ->withInput($request->all());
        }



        Project::find($pid)->update($request->all());
        return redirect('/projects');
    }
}
