<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class AdminServiceController extends Controller
{
    public function index()
    {
        $services = Service::paginate(5); //phân trang, mỗi trang 5 phần tử
        return view('Admin.services.index', compact('services')); //đường dẫn, thư viện compact lấy biến service
    }

    public function create()
    {
        return view('Admin.services.create');
    }

    public function store(Request $request)
    {
        $service = new Service();
        $service->service_name = $request->input('name');


        $service->save();

        return redirect()->route('Admin.services.index')->with('success', 'Services created successfully');
    }

    public function edit($service_id)
    {
        $service = Service::find($service_id);
        return view('Admin.services.edit', compact('service'));
    }

    public function update(Request $request, $service_id)
    {
        $service = Service::find($service_id);
        $service->service_name = $request->input('name');

        $service->save();

        return redirect()->route('Admin.services.index')->with('success', 'Services updated successfully');
    }


    public function destroy($id)
    {
        $service = Service::find($id);
        $service->delete();

        return redirect()->route('Admin.services.index')->with('success', 'Services deleted successfully');
    }
}
