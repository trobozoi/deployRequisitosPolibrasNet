<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use App\Version;
use App\File;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(File $file)
    {
        $files = $file->paginate(10);
		return view('file.index', ['files' => $files]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
		$version = Version::lists('name', 'id');
        return view('file.create', ['version' => $version]);
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
			'version_id' => 'required'
		]);
		$name = $request->input('name');
		$version_id = $request->input('version_id');
		$file = File::create(['name' => $name, 'version_id' => $version_id] );
		
		Session::flash('flash_message_success', 'File successfully added!');

		return redirect('file');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
		$file = File::findOrFail($id);
        return view('file.show', ['file' => $file]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
		$file = File::findOrFail($id);
		$version = Version::lists('name', 'id');
        return view('file.edit', ['file' => $file, 'version' => $version]);
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
		$file = File::findOrFail($id);

		$this->validate($request, [
			'name' => 'required'
		]);

		$input = $request->all();

		$file->fill($input)->save();

		Session::flash('flash_message_success', 'File successfully edit!');

		return redirect('file');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
		$file = File::findOrFail($id);

		$file->delete();

		Session::flash('flash_message_success', 'File successfully deleted!');

		return redirect('file');
    }
}
