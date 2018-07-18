<?php

namespace Site\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Site\Http\Controllers\Controller;

class CrudController extends Controller implements ControllerInterface
{

	protected $pageOpts = [];
	protected $pageDefaults = [];
	protected $service;
	protected $jsonFields;

    /**
     * CrudController constructor.
     */
    public function __construct() {

        $this->middleware('auth');

    }


    /**
	 * Display a listing of the resource.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function index(Request $request) {

		if ( !$request->wantsJson() ) {

			$this->pageOpts['pageTitle']  = $this->pageDefaults['list']['title'];
			$this->pageOpts['pageAction'] = $this->pageDefaults['list']['action'];
			$this->pageOpts['view']       = $this->pageDefaults['list']['view'];

			$this->pageOpts['rows'] = $this->service->paginate(10);

			return view($this->pageOpts['view'], $this->pageOpts);

		} else {
			$items = $this->service->all();

			return response()->json($items);
		}

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{

		$this->pageOpts['pageTitle'] = $this->pageDefaults['create']['title'];
		$this->pageOpts['view'] = $this->pageDefaults['create']['view'];

		$this->populateFormSelects();

		return view($this->pageOpts['view'], $this->pageOpts);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{

		$result = [];

        $data = $this->beforeStore($request);

		$res = $this->service->create($data);

		if ( !isset($res['error']) || !$res['error'] ) {
			$result = [
				'message' => $this->pageDefaults['save']['message'],
				'data'    => $res
			];

			$route = $this->pageDefaults['save']['route'];
			$params = [];

			if ( isset($this->pageDefaults['save']['parent']) ) {
				$params = $this->pageDefaults['save']['parent'];
			}

			$this->afterStore($request, $res);

			$return = redirect()->route( $route, $params )->with('flashMessage', $result);

		} else {
			$route = $this->pageDefaults['create']['route'];
			$params = [];

			if ( isset($this->pageDefaults['save']['parent']) ) {
				$params = $this->pageDefaults['save']['parent'];
			}

			$return = redirect()->route( $route, $params )->withInput()->with('flashMessage', $result)->withErrors($result['message']);
		}

		return $return;

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{

		$this->pageOpts['pageTitle'] = $this->pageDefaults['edit']['title'];
		$this->pageOpts['id']        = $id;

		$this->pageOpts['row']       = $this->service->find($id);

		$this->populateFormSelects();

		return view($this->pageDefaults['edit']['view'], $this->pageOpts);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request, $id)
	{

	    $data = $this->beforeUpdate($request, $id);

		$result = $this->service->update($data, $id);

		if ( !isset($result['error']) || !$result['error'] ) {
			$result = [
				'message' => $this->pageDefaults['update']['message'],
				'data'    => $result
			];

			$route = $this->pageDefaults['update']['route'];

			$params = [];

			if ( isset($this->pageDefaults['update']['parent']) ) {
				$params = $this->pageDefaults['update']['parent'];
			} else {
				$params = ['id' => $id];
			}

			$this->afterUpdate($request, $id);

			$return = redirect()->route( $route, $params )->with('flashMessage', $result);

		} else {
			$route = $this->pageDefaults['update']['route'];

			$params = [];

			if ( isset($this->pageDefaults['update']['parent']) ) {
				$params = $this->pageDefaults['update']['parent'];
			}

			$return = redirect()->route( $route, $params )->withInput()->with('flashMessage', $result)->withErrors($result['message']);
		}

		return $return;

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{

		$result = $this->service->delete( $id );

		if ( !isset($result['error']) || !$result['error'] ) {
			$result = [
				'message' => $this->pageDefaults['destroy']['message'],
				'data'    => $result
			];

			$route = $this->pageDefaults['update']['route'];

			$return = redirect()->route( $route )->with('flashMessage', $result);
		} else {

			$route = $this->pageDefaults['destroy']['route'];

			$return = redirect()->route( $route )->with('flashMessage', $result)->withErrors($result['message']);

		}

		return $return;
	}

	public function populateFormSelects() {
		// TODO: Implement populateFormSelects() method.
	}

    public function beforeStore(Request $request)
    {
        // TODO: Implement beforeStore() method.
        return $request->all();
    }

    public function afterStore(Request $request, $result)
    {
        // TODO: Implement afterStore() method.
    }

    public function beforeUpdate(Request $request, $id)
    {
        // TODO: Implement beforeUpdate() method.
        return $request->all();
    }

    public function afterUpdate(Request $request, $id)
    {
        // TODO: Implement afterUpdate() method.
    }

    public function beforeSave(Request $request)
    {
        // TODO: Implement beforeSave() method.
    }

    public function afterSave(Request $request)
    {
        // TODO: Implement afterSave() method.
    }
}