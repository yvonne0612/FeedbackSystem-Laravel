<?php

namespace App\Http\Controllers;

use DB;
use Input;
use Request;
use App\Http\Controllers\Controller;

class FeedbackController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function create()
    {
        $title = Input::get( 'title' );
		$presenter = Input::get( 'presenter' );
		$criteria = Input::get( 'criteria' );
		$pid = md5(uniqid(rand(), true));
		
		DB::insert('insert into presenter_info (id,presenter_name,presentation_title,tags) values (?, ?, ?, ?)', [$pid, $presenter, $title, $criteria]);
		
		return $pid;
    }
	
	
	public function presenter()
    {
        $title = Input::get( 'title' );
		$pid = Input::get( 'pid' );
		$criteria = Input::get( 'criteria' );
		$tags = explode(",", $criteria);
		
		return view('presenter', ['title' => $title, 'pid' => $pid, 'tags' => $tags]);
    }
	
	public function listener()
    {
		$pid = Input::get( 'pid' );
		$title = "";
		$presenter = "";
		$tags = "";
		//The select method will always return an array of results.
		$presentations = DB::select('select * from presenter_info where id = ?', [$pid]);
		foreach ($presentations as $presentation) {
    		 $title = $presentation->presentation_title;
			 $presenter = $presentation->presenter_name;
			 $tags = $presentation->tags;
		}
		
		$tagsArr = explode(",", $tags);
		
		return view('listener', ['title' => $title, 'pid' => $pid, 'presenter' => $presenter, 'tags' => $tagsArr]);
    }
}