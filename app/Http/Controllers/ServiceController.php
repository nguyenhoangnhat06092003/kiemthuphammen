<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Package;
use App\Models\Menu;
use App\Models\PackageCriteria;
use App\Models\Criteria;
use App\Models\Food;
use App\Models\FoodCategory;
use App\Models\MenuFood;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::all();
        return view('service')->with('services', $services);
    }

    public function listOfService()
    {
        $services = Service::paginate(9);
        return view('admin.service_ui.servicesList')->with('services', $services);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.service_ui.addService');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'name' => 'required',
        //     'detail' => 'required',
        // ]);

        $service = $request->all();
        Service::create($service);

        return redirect('/admin/service/list')->with('status', 'Thêm mới thành công!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        $foods = Food::all();
        $categories = FoodCategory::all();
        $foodIds = $request->session()->get('foodIds', []);

        foreach ($foods as $food) {
            if (array_search($food->id, $foodIds) !== false) {
                $food->check = 'checked';
            } else {
                $food->check = '';
            }
        }

        $packages = Package::Where('serviceId', $id)->get();

        foreach ($packages as $package) {
            $package->criterias = PackageCriteria::Where('packageId', $package->id)->get();
            foreach ($package->criterias as $pc) {
                $pc->criteria = Criteria::findOrFail($pc->criteriaId);
            }
        }


        $menus = Menu::Where('serviceId', $id)->get();

        foreach ($menus as $menu) {
            $menu->menuFoods = MenuFood::Where('menuId', $menu->id)->get();
            $menu->cost = 0;
            foreach ($menu->menuFoods as $mf) {
                $mf->food = Food::findOrFail($mf->foodId);

                $menu->cost += $mf->food->price;
            }
        }

        $foods = Food::all();

        Session::put('serviceId', $id);
        return view('package')->with('packages', $packages)
            ->with('menus', $menus)
            ->with('foods', $foods)
            ->with('categories', $categories);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service = Service::findOrFail($id);

        // điều hướng đến view edit user và truyền sang dữ liệu về user muốn sửa đổi
        return view('admin.service_ui.updateService', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $service = Service::findOrFail($id);

        $data = $request->all();

        $service->update($data);

        return redirect('/admin/service/list')->with('status', 'Cập nhật thành công!');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $service = Service::findOrFail($id);

        $service->delete();

        return redirect('/admin/service/list')->with('status', 'Xóa thành công!');;
    }
}
