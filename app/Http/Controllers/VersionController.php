<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use App\Application;
use App\Version;
use App\File;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class VersionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Version $version)
    {
        $versions = $version->paginate(10);
		return view('version.index', ['versions' => $versions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
		$application = Application::lists('name', 'id');
        return view('version.create', ['application' => $application]);
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
			'name' => 'required',
			'application_id' => 'required',
			'file' => 'required'
		]);
		$name = $request->input('name');
		$application_id = $request->input('application_id');
		$file = $request->input('file');
		$version = Version::create(['name' => $name, 'application_id' => $application_id] );

		$file = File::create(['name' => $file, 'version_id' => $version["attributes"]["id"]]);
		
		Session::flash('flash_message_success', 'Version successfully added!');

		return redirect('version');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
		$version = Version::findOrFail($id);
        return view('version.show', ['version' => $version]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
		$version = Version::findOrFail($id);
		$application = Application::lists('name', 'id');
        return view('version.edit', ['version' => $version, 'application' => $application]);
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
		$version = Version::findOrFail($id);

		$this->validate($request, [
			'name' => 'required'
		]);

		$input = $request->all();

		$version->fill($input)->save();

		Session::flash('flash_message_success', 'Version successfully edit!');

		return redirect('version');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
		$version = Version::findOrFail($id);

		$version->delete();

		Session::flash('flash_message_success', 'Version successfully deleted!');

		return redirect('version');
    }
}
