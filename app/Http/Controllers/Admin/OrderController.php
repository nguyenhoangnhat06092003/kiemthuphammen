<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Food;
use App\Models\Order;
use App\Models\OrderFood;
use App\Models\OrderStatus;
use App\Models\PaymentMethod;
use App\Models\Service;
use Carbon\Carbon;
use App\Exports\OrderExport;
use App\User;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{

    public function index()
    {
        // $idUser = Session::get('idUser', 1);
        $pendingOrders = Order::where('status', 1)
            ->orderBy('created_at', 'DESC')
            ->paginate(10);
        foreach ($pendingOrders as $pendingOrder) {
            $pendingOrder->order_status = OrderStatus::where('id', $pendingOrder->status)->first();
            $pendingOrder->services = Service::where('id', $pendingOrder->serviceId)->first();
            $pendingOrder->users = User::where('id', $pendingOrder->userId)->first();
        }

        $approvedOrders = Order::where('status', 2)
            ->orderBy('created_at', 'DESC')
            ->paginate(10);
        foreach ($approvedOrders as $approvedOrder) {
            $approvedOrder->order_status = OrderStatus::where('id', $approvedOrder->status)->first();
            $approvedOrder->services = Service::where('id', $approvedOrder->serviceId)->first();
            $approvedOrder->users = User::where('id', $approvedOrder->userId)->first();
        }

        $approvedPays = Order::where('status', 4)
            ->orderBy('created_at', 'DESC')
            ->paginate(10);
        foreach ($approvedPays as $approvedPay) {
            $approvedPay->order_status = OrderStatus::where('id', $approvedPay->status)->first();
            $approvedPay->services = Service::where('id', $approvedPay->serviceId)->first();
            $approvedPay->users = User::where('id', $approvedPay->userId)->first();
        }
        $i1 = 0;
        $i2 = 0;
        $i3 = 0;


        return view('admin.order.index')->with('pendingOrders', $pendingOrders)
            ->with('approvedOrders', $approvedOrders)
            ->with('approvedPays', $approvedPays)
            ->with('i1', $i1)
            ->with('i2', $i2)
            ->with('i3', $i3);
    }
    public function export_order(Request $request, $month)
    {
        $today = Carbon::now('Asia/Ho_Chi_Minh');
        $year = $today->year; // retrieve the year of the date

        $month = $year . '-' . $month;
        $start = Carbon::parse($month)->startOfMonth();
        $end = Carbon::parse($month)->endOfMonth();

        $orders = Order::with('OrderStatus', 'Service', 'User')->whereBetween('organizationDate', [$start, $end])->get();

        return Excel::download(new OrderExport($orders), 'ThongKeDoanhThu.xlsx');
    }


    public function viewDetail($id)
    {
        $order = Order::find($id);
        $order->service = Service::where('id', $order->serviceId)->first();
        $order->payment = PaymentMethod::where('id', $order->paymentId)->first();
        $order_foods = OrderFood::where('orderId', $id)->get();
        foreach ($order_foods as $order_food) {
            $order_food->food = Food::where('id', $order_food->foodId)->first();
        }

        $i = 0;

        return view('admin.order.detail')->with('order', $order)->with('order_foods', $order_foods)->with('i', $i);
    }

    public function confirmOrder($id)
    {
        $order = Order::find($id);
        $order->status = 2;
        $order->update();

        return back()->with('status', 'Đơn hàng đã được duyệt!');
    }
    public function confirmPay($id)
    {
        $total_price = 0;
        $order = Order::join('services', 'orders.serviceId', '=', 'services.id')
        ->join('users', 'orders.userId','=','users.id')
        ->join('payment_methods', 'orders.paymentId', '=', 'payment_methods.id')
        ->select(
            'orders.*',
            'users.*',
            'services.name as service_name',
            'payment_methods.name as payment_method_name',
        )
        ->find($id);
        $order_foods = OrderFood::where('orderId', $id)->get();
        foreach ($order_foods as $order_food) {
            $order_food->food = Food::where('id', $order_food->foodId)->first();
            $total_price += $order->peopleNumber * $order_food->food->price;
        }

        $i = 0;
        if ($order && $order_foods) {
            $order->status = 4;
            $order->update();
            Mail::send('mail', compact('order', 'order_foods', 'i', 'total_price'), function ($email) {
                $email->to('ntkkieuuuu@gmail.com', 'Visitor')->subject('HÓA ĐƠN THANH TOÁN');
            });
        }
        return back()->with('status', 'Thanh toán thành công!');
    }

    public function viewPay($id)
    {
        $order = Order::find($id);
        $order->service = Service::where('id', $order->serviceId)->first();
        $order->payment = PaymentMethod::where('id', $order->paymentId)->first();
        $order_foods = OrderFood::where('orderId', $id)->get();
        foreach ($order_foods as $order_food) {
            $order_food->food = Food::where('id', $order_food->foodId)->first();
        }

        $i = 0;

        return view('admin.order.detailOrder')->with('order', $order)->with('order_foods', $order_foods)->with('i', $i);
    }


    public function printInvoice($id)
    {
        $total_price = 0;
        $order = Order::join('services', 'orders.serviceId', '=', 'services.id')
        ->join('users', 'orders.userId','=','users.id')
        ->join('payment_methods', 'orders.paymentId', '=', 'payment_methods.id')
        ->select(
            'orders.*',
            'users.*',
            'services.name as service_name',
            'payment_methods.name as payment_method_name',
        )
        ->find($id);
        $order_foods = OrderFood::where('orderId', $id)->get();
        foreach ($order_foods as $order_food) {
            $order_food->food = Food::where('id', $order_food->foodId)->first();
            $total_price += $order->peopleNumber * $order_food->food->price;
        }

        $i = 0;
        if ($order && $order_foods) {
            $pdf = PDF::loadView('pdf', [
                'order' => $order,
                'order_foods' => $order_foods,
                'i' => $i,
                'total_price' => $total_price
            ]);
            return $pdf->download('HoaDon.pdf');
        }
    }
}
