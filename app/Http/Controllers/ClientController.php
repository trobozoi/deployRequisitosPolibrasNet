<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use App\Version;
use App\Client;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Client $client)
    {
        $clients = $client->paginate(10);
		return view('client.index', ['clients' => $clients]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
		$version = Version::lists('name', 'id');
        return view('client.create', ['version' => $version]);
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
		$client = Client::create(['name' => $name, 'version_id' => $version_id] );
		
		Session::flash('flash_message_success', 'Client successfully added!');

		return redirect('client');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
		$client = Client::findOrFail($id);
        return view('client.show', ['client' => $client]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
		$client = Client::findOrFail($id);
		$version = Version::lists('name', 'id');
        return view('client.edit', ['client' => $client, 'version' => $version]);
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
		$client = Client::findOrFail($id);

		$this->validate($request, [
			'name' => 'required'
		]);

		$input = $request->all();

		$client->fill($input)->save();

		Session::flash('flash_message_success', 'Client successfully edit!');

		return redirect('client');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
		$client = Client::findOrFail($id);

		$client->delete();

		Session::flash('flash_message_success', 'Client successfully deleted!');

		return redirect('client');
    }
}
