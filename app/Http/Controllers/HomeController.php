<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use ConsoleTVs\Charts;
use App\Charts\PulseChart;
use mikehaertl\pdftk\Pdf;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function index2()

    {
       /* $chart = Charts::new('line' , 'hightcharts')
        ->setTitle('useres')
        ->setLabels(["SA", "FR"])
        ->setvalues([100, 50])
        ->setElementLabel("Total user");*/
        
        $chart = new PulseChart;
    
        $chart->labels(['One', 'Two', 'Three' ,'Three']);
       
        $chart->dataset('My dataset 1', 'bar', [20, 50, 30, 60])->backgroundcolor('#4e73df');
      
                
             
        
        

        return view('Dashbord.index', ['chart' => $chart]);
    }
}
