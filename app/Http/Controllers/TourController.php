<?php

namespace App\Http\Controllers;

use App\Models\Tour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class TourController extends Controller
{
    // Hiển thị Tour
    public function index() {
        $tour = Tour::orderBy('created_at','DESC')->get();

        return view('tour.list',[
            'tour' => $tour
        ]);
    }
    // Tạo 
    public function create() {
        return view('tour.create');
    }
    // Store
    public function store(Request $request) {
        $rules = [
            'name' => 'required|min:5',
            'vehicle' => 'required|min:3',
            'price' => 'required|numeric',

        ];

        if  ($request->image != "") {
            $rules['image'] = 'image'; 
        }


        $validator = Validator::make($request->all(),$rules);

        if ($validator->fails()) {
            return redirect()->route('tour.create')->withInput()->withErrors($validator);
        }
    
            // Thêm tour vào cơ sở dữ liệu
            $tour = new Tour();
            $tour->name = $request->name;
            $tour->vehicle = $request->vehicle;
            $tour->price = $request->price;
            $tour->description = $request->description;
            $tour->save();

            if  ($request->image != "") {
            // Hình ảnh
            $image = $request->image;
            $ext = $image->getClientOriginalExtension();
            $imageName = time().'.'.$ext;

            // Lưu hình vào trong tours directory
            $image->move(public_path('uploads/tours'),$imageName);


            // Lưu tên hình trong database
            $tour->image = $imageName;
            $tour->save();
            }
    
            return redirect()->route('tour.index')->with('success', 'Tour đã được thêm thành công.');
    }
    // Edit
    public function edit($id) {
        $tour = Tour::findOrFail($id);
        return view('tour.edit',[
            'tour' => $tour
        ]);
    }
    // Update
    public function update($id, Request $request) {

        $tour = Tour::findOrFail($id);

        $rules = [
            'name' => 'required|min:5',
            'vehicle' => 'required|min:3',
            'price' => 'required|numeric',

        ];

        if  ($request->image != "") {
            $rules['image'] = 'image'; 
        }


        $validator = Validator::make($request->all(),$rules);

        if ($validator->fails()) {
            return redirect()->route('tour.edit', $tour->id)->withInput()->withErrors($validator);
        }
    
        // Cập nhật tour
            $tour->name = $request->name;
            $tour->vehicle = $request->vehicle;
            $tour->price = $request->price;
            $tour->description = $request->description;
            $tour->save();

            if  ($request->image != "") {
            // Xóa hình cũ
            File::delete(public_path('uploads/tours/'.$tour->image));

            // Hình ảnh
            $image = $request->image;
            $ext = $image->getClientOriginalExtension();
            $imageName = time().'.'.$ext;

            // Lưu hình vào trong tours directory
            $image->move(public_path('uploads/tours'),$imageName);


            // Lưu tên hình trong database
            $tour->image = $imageName;
            $tour->save();
            }
    
            return redirect()->route('tour.index')->with('success', 'Tour đã được cập nhật thành công.');
    }

    public function destroy($id) {
        $tour = Tour::findOrFail($id);

        // Xóa hình
        File::delete(public_path('uploads/tours/'.$tour->image));

        $tour->delete();

        return redirect()->route('tour.index')->with('success', 'Tour đã được xóa thành công.');
    }
}