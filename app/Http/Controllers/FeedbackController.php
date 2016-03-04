<?php

namespace app\Http\Controllers;

use DB;
use Mail;
use Input;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
class FeedbackController extends Controller
{
    
    public function auth()
    {   
        $tags = "Too Loud,No Smile,No Eye Contact,Speak Too Slow";
        $email = Input::get( 'email' );
		//$histories = DB::select('select * from presenter_history where id = ?', [$email]);
        ////foreach ($histories as $history) {
    		// $tags = $history->tags;
		//}
		//alert("end of auth()");
		return $tags;
    }
    
    public function ifvalid()
    {   
        $pid = Input::get( 'pid' );
        $presentations = DB::select('select * from presenter_info where id = ?', [$pid]);
        return count($presentations);
        /*if(count($presentations)>0)
            return true;
        else
            return false;*/
    }
    public function history()
    {
        //print("inside getting email list function!\n");
        $email = Input::get( 'email' );
        $escapedEmail = (string)htmlspecialchars($email);
        //print($escapedEmail+ "\n");
        //$email = "yuanyuan920612%40gmail.com";
        $id_arr = DB::select('select session_id from presenter_record where email = ?', [$escapedEmail]);
        //$tmp = 1;
        $idlist = array();
        //$id_arr = array('number', 'pid');
        foreach ($id_arr as $arr) {
            //$sid = $idlist->session_id;
            //$id_arr = array_add($id_arr,$tmp,$sid);
            $idlist[] = $arr->session_id;
            //print($arr->session_id + "\n");
            //$tmp = $tmp+1;
        }
        //print((string)$idlist);

        return view('history', ['email' => $escapedEmail, 'idlist' => $idlist] );
    }





    public function create()
    {
        $title = Input::get( 'title' );
		$presenter = Input::get( 'presenter' );
		$criteria = Input::get( 'criteria' );
        $email = Input::get( 'email' );
        $escapedEmail = (string)htmlspecialchars($email);
		$pid = md5(uniqid(rand(), true));
        //$clickablePID = action('FeedbackController@presenter', null, ['pid' => $pid]);
        //print("url is :" + $clickablePID);
		DB::insert('insert into presenter_info (id,presenter_name,presentation_title,tags) values (?, ?, ?, ?)', [$pid, $presenter, $title, $criteria]);
		//DB::statement('replace into presenter_history (id,tags) values (?, ?)', [$email, $criteria]);
        DB::insert('insert into presenter_record (email,session_id,tag_name) values (?, ?, ?)', [$escapedEmail, $pid,  $criteria]);


        Mail::send('notification', ['presenter'=>$presenter, 'pid'=>$pid, 'title'=>$title, 'criteria'=>$criteria], function ($message) {

            $message->from('yuanyuan920612@gmail.com', 'Feedback Team');

            $message->to(Input::get( 'email' ))->subject('New Presentation ID');
            //can only use Input::get( 'email' ) but not $email

        });

		return $pid;
    }
	
	public function toCreate()
    {
        $email = Input::get('email');
        return $email;
    }


    /*
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
            //$fb_count = DB::select('SELECT * FROM (SELECT id, listener_id, feedback, submission_date FROM feedback_detail WHERE session_id = ? AND tag_name= ? ORDER BY submission_date DESC) AS tmp_table GROUP BY listener_id',[$pid, $tag_content]);
            //$total_count = 10;
            //$fb_count_int = count($fb_count);
            $fb_count = DB::select('SELECT listener_id, COUNT(*) as vote_count FROM feedback_detail WHERE session_id = ? AND tag_name= ? AND submission_date >= NOW() - INTERVAL 5 MINUTE GROUP BY listener_id',[$pid, $tag_content]);
            
            $fb_count_int = 0;
            foreach ($fb_count as $fb_count_val) {
                $cur_vote_count = (int)$fb_count_val->vote_count;
                if($cur_vote_count>5){
                    $fb_count_int = $fb_count_int+5;
                }else{
                    $fb_count_int = $fb_count_int+$cur_vote_count;
                }
                    
            }
            
            $listeners_count = DB::select('SELECT * FROM listener_info WHERE session_id = ?',[$pid]);
            $listeners_count_int = count($listeners_count);
            if($listeners_count_int==0){
                $listeners_count_int = 1;
            }
            
            $cur_pair = array($tag_content,($fb_count_int*100/($listeners_count_int*5)));
            //$cur_pair = array($tag_content,($fb_count_int*100/$total_count));
            $tag_fb[] = $cur_pair;
        }
		return view('presenter1', ['title' => $title, 'pid' => $pid, 'tags' => $tag_fb] );
    }*/


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
            /*$fb_count = DB::select('SELECT * FROM (SELECT id, listener_id, feedback, submission_date FROM feedback_detail WHERE session_id = ? AND tag_name= ? ORDER BY submission_date DESC) AS tmp_table GROUP BY listener_id',[$pid, $tag_content]);
            $total_count = 10;
            $fb_count_int = count($fb_count);*/
            $fb_count = DB::select('SELECT listener_id, COUNT(*) as vote_count FROM feedback_detail WHERE session_id = ? AND tag_name= ? AND submission_date >= NOW() - INTERVAL 5 MINUTE GROUP BY listener_id',[$pid, $tag_content]);

            $fb_count_int = 0;
            foreach ($fb_count as $fb_count_val) {
                $cur_vote_count = (int)$fb_count_val->vote_count;
                if($cur_vote_count>5){
                    $fb_count_int = $fb_count_int+5;
                }else{
                    $fb_count_int = $fb_count_int+$cur_vote_count;
                }

            }

            $listeners_count = DB::select('SELECT * FROM listener_info WHERE session_id = ?',[$pid]);
            $listeners_count_int = count($listeners_count);
            if($listeners_count_int==0){
                $listeners_count_int = 1;
            }

            $cur_pair = array($tag_content,($fb_count_int*100/($listeners_count_int*5)));
            //$cur_pair = array($tag_content,($fb_count_int*100/$total_count));
            $tag_fb[] = $cur_pair;
        }
        return view('presenter', ['title' => $title, 'pid' => $pid, 'tags' => $tag_fb] );
    }

    public function listener(Request $request)
    {
        $lid = $request->cookie('lid');
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
            #$fb_count = DB::select('SELECT * FROM (SELECT id, listener_id, feedback, submission_date FROM feedback_detail WHERE session_id = ? AND tag_name= ? ORDER BY submission_date DESC) AS tmp_table GROUP BY listener_id',[$pid, $tag_content]);
            $fb_count = DB::select('SELECT listener_id, COUNT(*) as vote_count FROM feedback_detail WHERE session_id = ? AND tag_name= ? AND submission_date >= NOW() - INTERVAL 5 MINUTE GROUP BY listener_id',[$pid, $tag_content]);
            $fb_count_int = 0;
            foreach ($fb_count as $fb_count_val) {
                $cur_vote_count = (int)$fb_count_val->vote_count;
                if($cur_vote_count>5){
                    $fb_count_int = $fb_count_int+5;
                }else{
                    $fb_count_int = $fb_count_int+$cur_vote_count;
                }

            }

            $listeners_count = DB::select('SELECT * FROM listener_info WHERE session_id = ?',[$pid]);
            $listeners_count_int = count($listeners_count);
            if($listeners_count_int==0){
                $listeners_count_int = 1;
            }
            //$fb_count_int = count($fb_count);
            $frame_color = substr(md5($tag_content), 12, 6);
            $percent = 1-$fb_count_int/($listeners_count_int*5);
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
        //return view('listener', ['title' => $title, 'pid' => $pid, 'presenter' => $presenter, 'tags' => $tag_fb]);
        if(count($lid)==0){
            $lid = md5(uniqid(rand(), true));
            DB::insert('insert into listener_info (id,session_id) values (?, ?)', [$lid, $pid]);
        }
        $response = new Response(view('listener', ['title' => $title, 'pid' => $pid, 'presenter' => $presenter, 'tags' => $tag_fb]));
        $response->withCookie(cookie('lid', $lid, 10));
        return $response;

    }


    /*
	public function listener(Request $request)
    {
        $lid = $request->cookie('lid');

        print("cookie is "+ $lid+'\n');


        if(count($lid)==0){
            $lid = md5(uniqid(rand(), true));
            DB::insert('insert into listener_info (id,session_id) values (?, ?)', [$lid, $pid]);
        }
        print("cookie is "+ $lid+'\n');


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
            #$fb_count = DB::select('SELECT * FROM (SELECT id, listener_id, feedback, submission_date FROM feedback_detail WHERE session_id = ? AND tag_name= ? ORDER BY submission_date DESC) AS tmp_table GROUP BY listener_id',[$pid, $tag_content]);
            $fb_count = DB::select('SELECT listener_id, COUNT(*) as vote_count FROM feedback_detail WHERE session_id = ? AND tag_name= ? AND submission_date >= NOW() - INTERVAL 5 MINUTE GROUP BY listener_id',[$pid, $tag_content]);
            $fb_count_int = 0;
            foreach ($fb_count as $fb_count_val) {
                $cur_vote_count = (int)$fb_count_val->vote_count;
                if($cur_vote_count>5){
                    $fb_count_int = $fb_count_int+5;
                }else{
                    $fb_count_int = $fb_count_int+$cur_vote_count;
                }
                    
            }
            
            $listeners_count = DB::select('SELECT * FROM listener_info WHERE session_id = ?',[$pid]);
            $listeners_count_int = count($listeners_count);
            if($listeners_count_int==0){
                $listeners_count_int = 1;
            }
            //$fb_count_int = count($fb_count);
            $frame_color = substr(md5($tag_content), 12, 6);
            $percent = 1-$fb_count_int/($listeners_count_int*5);
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
		//return view('listener', ['title' => $title, 'pid' => $pid, 'presenter' => $presenter, 'tags' => $tag_fb]);

        $response = new Response(view('listener', ['title' => $title, 'pid' => $pid, 'presenter' => $presenter, 'tags' => $tag_fb]));
        $response->withCookie(cookie('lid', $lid, 10));
        return $response;

    }*/


    public function vote(Request $request)
    {
        $lid = $request->cookie('lid');
        $pid = Input::get( 'pid' );
        $tag = Input::get( 'tag' );
        $feedback = "bad";
        DB::insert('insert into feedback_detail (listener_id,session_id,tag_name,feedback) values (?, ?, ?, ?)', [$lid, $pid, $tag,$feedback]);

        return $pid;
    }





    
}
