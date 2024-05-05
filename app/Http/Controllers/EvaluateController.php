<?php

namespace App\Http\Controllers;

use App\Models\EvaluateModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Session as FacadesSession;
use Symfony\Component\HttpKernel\EventListener\SaveSessionListener;

class EvaluateController extends Controller
{
    public function index(){
        $evas = DB::table('evaluates')
            ->join('users', 'evaluates.userID', '=', 'users.id')
            ->select('users.fullName','createdDate', 'numberStar', 'content', 'avatarUrl')
            ->orderBy('createdDate', 'desc')
            ->paginate(2);
        //$evas = $evas->get();
        return redirect('home', ['list_evas' => $evas]);
    }
    public function send_comment(Request $request){
        $userID = FacadesSession::get('idUser', 1);
        $content = $request->comment_content;
        $numberStar = $request->numberStar;
        
        $comment = new EvaluateModel();
        $comment->userID = $userID;
        $comment->content = $content;
        $comment->numberStar = $numberStar;
        $comment->save();

        return redirect('home');
    }
}
