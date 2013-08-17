<?php

class TodosController extends \BaseController {

	protected $todo;

	public function __construct(Todo $todo)
	{
		$this->todo = $todo;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$todos = $this->todo->all()->toArray();

		return Response::json(compact('todos'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::json();

		$todo = $this->todo->create($input->get('todo'));
		$todo = $todo->toArray();

		return Response::json(compact('todo'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$todo = $this->todo->findOrFail($id);
		$todo = $todo->toArray();

		return Response::json(compact('todo'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$todo = $this->todo->findOrFail($id);
		$input = Input::json();

		$todo->update($input->get('todo'));
		$todo = $todo->toArray();

		return Response::json(compact('todo'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->todo->destroy($id);

		return Response::make(null, 204);
	}

}
