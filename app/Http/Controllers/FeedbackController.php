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
        //$title = Input::get( 'title' );
		$pid = Input::get( 'pid' );
		//$criteria = Input::get( 'criteria' );
		//$tags = explode(",", $criteria);
        $presentations = DB::select('select * from presenter_info where id = ?', [$pid]);
        foreach ($presentations as $presentation) {
    		 $title = $presentation->presentation_title;
			 $presenter = $presentation->presenter_name;
			 $tags = $presentation->tags;
		}
		$tags_arr = explode(",", $tags);
        $tag_fb = array();
        foreach ($tags_arr as $tag_content) {
            $fb_count = DB::select('SELECT * FROM (SELECT id, listener_id, feedback, submission_date FROM feedback_detail WHERE session_id = ? AND tag_name= ? ORDER BY submission_date DESC) AS tmp_table GROUP BY listener_id',[$pid, $tag_content]);
            $total_count = 10;
            $fb_count_int = count($fb_count);
            $cur_pair = array($tag_content,($fb_count_int/$total_count)*100);
            $tag_fb[] = $cur_pair;
        }
		return view('presenter', ['title' => $title, 'pid' => $pid, 'tags' => $tag_fb] );
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
		
		$tags_arr = explode(",", $tags);
        $tag_fb = array();
        foreach ($tags_arr as $tag_content) {
            $fb_count = DB::select('SELECT * FROM (SELECT id, listener_id, feedback, submission_date FROM feedback_detail WHERE session_id = ? AND tag_name= ? ORDER BY submission_date DESC) AS tmp_table GROUP BY listener_id',[$pid, $tag_content]);
            $total_count = 10;
            $fb_count_int = count($fb_count);
            $frame_color = substr(md5($tag_content), 12, 6);
            $percent = 1-$fb_count_int/$total_count;
            $t=$percent<0?0:255;
            $p=$percent<0?$percent*-1:$percent;
            $RGB = str_split($frame_color, 2);
            $R=hexdec($RGB[0]);
            $G=hexdec($RGB[1]);
            $B=hexdec($RGB[2]);
            $bg_color = '#'.substr(dechex(0x1000000+(round(($t-$R)*$p)+$R)*0x10000+(round(($t-$G)*$p)+$G)*0x100+(round(($t-$B)*$p)+$B)),1);
            
            $cur_pair = array($tag_content,'#'.$frame_color, $bg_color);
            //$cur_pair = array($tag_content, $bg_color, $bg_color);
            $tag_fb[] = $cur_pair;
        }
        //return $tag_fb[0][0].$tag_fb[0][1].$tag_fb[0][2];
		return view('listener', ['title' => $title, 'pid' => $pid, 'presenter' => $presenter, 'tags' => $tag_fb]);
    }
    
        
    
}