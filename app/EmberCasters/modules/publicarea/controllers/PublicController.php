<?php
namespace EmberCasters\Modules\PublicArea\Controllers;
use \View as View;
use EmberCasters\Models\Lesson as Lesson;
class PublicController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function home()
	{
        $lessons = Lesson::all();
        $lesson = Lesson::first();

        return View::make('publicarea.home')->with(compact('lesson','lessons'));
	}

    /**
     * View a single lesson
     */
    public function viewLesson($id){

        $lessons = Lesson::all();
        $lesson = Lesson::find($id);

        return View::make('publicarea.public.viewLesson')->with(compact('lesson','lessons'));
    }

}