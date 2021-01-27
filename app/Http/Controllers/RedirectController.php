<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RedirectController extends Controller
{
    public function redirectLogin()
    {
        return redirect()->route('login');
    }

    public function showView()
    {
        //dd('hola');
        $sug = DB::table('suggestions')                
                ->get();
                
        $s = DB::table('users')
                ->select(DB::raw('count(*) as num'))                
                ->get();                     
            $num = $s[0]->num;                                                            
        return view('dashboard', compact('sug','num'));        
    }

    public function addStudent(Request $request)
    {
        //return $request;
        $request->validate([
            'alumno' => 'required|string|max:255',
            'control' => 'required|string|max:255',
            'sugerencia' => 'required|string|max:255'
        ]);

        //return $request;

        DB::table('suggestions')->insert([
            'alumno' => $request->alumno,
            'control' => $request->control,
            'sugerencia' => $request->sugerencia
        ]);              
                                    
        return redirect()->route('students');        
    }
}
