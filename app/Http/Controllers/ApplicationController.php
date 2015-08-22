<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use App\Application;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Application $application)
    {
        $applications = $application->paginate(10);
		return view('application.index', ['applications' => $applications]);
    }
	
	public function exemplo()
	{
		$nome = "Jailton";
		return view('exemplo')->with('nome', $nome);
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
		return view('application.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
		$this->validate($request, [
			'name' => 'required'
		]);
		
		$name = $request->input('name');
		$application = Application::create(['name' => $name]);
		
		Session::flash('flash_message_success', 'Application successfully added!');

		return redirect('application');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
		$application = Application::findOrFail($id);
        return view('application.show', ['application' => $application]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
		$application = Application::findOrFail($id);
        return view('application.edit', ['application' => $application]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
		$application = Application::findOrFail($id);

		$this->validate($request, [
			'name' => 'required'
		]);

		$input = $request->all();

		$application->fill($input)->save();

		Session::flash('flash_message_success', 'Application successfully edit!');

		return redirect('application');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
		$application = Application::findOrFail($id);

		$application->delete();

		Session::flash('flash_message_success', 'Application successfully deleted!');

		return redirect('application');
    }
}
