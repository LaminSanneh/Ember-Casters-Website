<?php

namespace EmberCasters\Modules\Admin\Controllers;
use \View as View;
use \Redirect as Redirect;
use \EmberCasters\Models\Lesson as Lesson;
use \Input as Input;
class LessonsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $lessons = Lesson::all();
		return View::make('admin.lessons.index')->with(compact('lessons'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $lesson = new Lesson();
		return View::make('admin.lessons.create')->with(compact('lesson'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$data = Input::only('title','description','embed_code');
        $lesson = Lesson::create($data);

        if($lesson){
            return redirect::route('admin.lessons.index');
        }

        return View::make('admin.lessons.create')->with('lesson', (object)$data);
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
        $lesson = Lesson::find($id);
		return View::make('admin.lessons.edit')->with(compact('lesson'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$data = Input::only('title','description','embed_code');
        $lesson = Lesson::find($id);

        if($lesson->update($data)){
            return Redirect::route('admin.lessons.index');
        }

        return View::make('admin.lessons.edit')->with(compact('lesson'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		if(Lesson::destroy($id)){
            return Redirect::route('admin.lessons.index');
        }

        $lesson = Lesson::find($id);
        return View::make('admin.lessons.edit')->with(compact('lesson'));
	}

}