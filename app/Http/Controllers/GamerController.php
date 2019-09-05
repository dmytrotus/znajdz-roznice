<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gamer;
use Session;


class GamerController extends Controller
{
    public function index()
    {
    	return view('game')
    	->with('gamers', Gamer::all());
    }

    public function savedata()
    {
    	$r = request();

    	/*$this->validate($r, [
    		'nick' => 'required|min:3',
    		'time' => 'required'
    	]);*/

    	$gamer = Gamer::create([
    		'nick' => $r->nick,
    		'time' => $r->time
    	]);

    	Session::flash('success', 'Dziękuję. Zobacz swoją pozycję w rankingu na dole');

    	return back();
    }
}
