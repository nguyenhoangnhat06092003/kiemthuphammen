<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Models\Order;
use App\Models\statistic_revenues_byDate;
use Carbon\Carbon;
use App\Models\OrderStatus;
use App\Models\PaymentMethod;
use App\Models\Service;
use App\User;
use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use App\Exports\MonthExport;
use Session;
use Illuminate\Support\Facades\Redirect;
use PhpParser\Node\Expr\Cast\Array_;

class AdminController extends Controller
{

    public function filter_by_date(Request $request){
        $from_date = Carbon::createFromFormat('m/d/Y', $request->from_date)->format('Y-m-d');
        $to_date = Carbon::createFromFormat('m/d/Y', $request->to_date)->format('Y-m-d');

        // $gets = DeclarationStatistic::all();
        $gets = statistic_revenues_byDate::whereBetween('date',[$from_date, $to_date])->orderBy('date','ASC')->get();
        $chart_data = new Collection();
        foreach($gets as $get){
            $chart_data->push([
                'date' => $get->date,
                'sumRevenues' => $get->sumRevenues 
            ]);
        }
        return json_encode($chart_data);
    }
    public function filter_by_month(Request $request){
        $today = Carbon::now('Asia/Ho_Chi_Minh');
        $year = $today->year; // retrieve the year of the date
            
        $month = $year.'-'.$request->month;
        $start = Carbon::parse($month)->startOfMonth();
        $end = Carbon::parse($month)->endOfMonth();
        // $gets = DeclarationStatistic::all();
        $gets = statistic_revenues_byDate::whereBetween('date',[$start, $end])->orderBy('date','ASC')->get();
        $chart_data = new Collection();
        foreach($gets as $get){
            $chart_data->push([
                'date' => $get->date,
                'sumRevenues' => $get->sumRevenues 
            ]);
        }
        return json_encode($chart_data);
    }
    public function export_excel_statistic_by_month(Request $request,$month){
      
        $today = Carbon::now('Asia/Ho_Chi_Minh');
        $year = $today->year; // retrieve the year of the date
            
        $month = $year.'-'.$month;
        $start = Carbon::parse($month)->startOfMonth();
        $end = Carbon::parse($month)->endOfMonth();
        // $gets = DeclarationStatistic::all();
        $gets = statistic_revenues_byDate::whereBetween('date',[$start, $end])->orderBy('date','ASC')->get();
        //call export 
        return \Excel::download(new MonthExport($gets), 'thong-ke-thang-'.$month.'.xlsx');
        
    }
    public function export_pdf_by_month(Request $request,$month){
     
        $today = Carbon::now('Asia/Ho_Chi_Minh');
        $year = $today->year; // retrieve the year of the date
            
        $month = $year.'-'.$month;
        $start = Carbon::parse($month)->startOfMonth();
        $end = Carbon::parse($month)->endOfMonth();

        $orders = Order::with('OrderStatus','Service','User')->where('status', 1)->whereBetween('organizationDate',[$start, $end])->get();
      
        $revenues = statistic_revenues_byDate::all();
        
    	$pdf = \PDF::loadView('admin.exportPDF',  compact('orders','month','revenues'));
    		return $pdf->download('ThongKeDoanhThuThang'.$month.'.pdf');

    }
    public function filter_by_date1(Request $request){
        $from_date = Carbon::createFromFormat('m/d/Y', $request->from_date)->format('Y-m-d');
        $to_date = Carbon::createFromFormat('m/d/Y', $request->to_date)->format('Y-m-d');
        $serviceId = $request->serviceId;
        // $gets = DeclarationStatistic::all();
        $gets = Order::whereBetween('organizationDate',[$from_date, $to_date])
                    ->select(DB::raw('count(id) as number'),'organizationDate')
                    ->groupBy('organizationDate')
                    ->orderBy('organizationDate','ASC')
                    ->where('serviceId',$serviceId)
                    ->get();  
                    // return json_encode($gets);                 
                    
        $chart_data = new Collection();
        foreach($gets as $get){
            $chart_data->push([
                'organizationDate' => $get->organizationDate,
                'number' => $get->number 
            ]);
        }
        return json_encode($chart_data);
    }

    // public function dashboard(Request $request)
    // {
    //     $result = DB::table('statistic_revenue')->count();
    //     if($result){
    //         Session::put('result', 23);
    //         return Redirect::to('/');
    //     }
    // }

}
