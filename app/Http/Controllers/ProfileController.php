<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Middleware\VerifyCsrfToken;

class ProfileController extends Controller
{

    public function showProfile(Request $request)
    {
        $user = $request->session()->get('user');
        if ($user) {
            $account_id = $user->account_id;
            $customer = Customer::where('account_id', $account_id)->first();
            if ($customer) {
                return view('profile', ['customer' => $customer]);
            } else {
                $customer = new Customer();
                $customer->first_name = $user->username;
                $customer->account_id = $account_id;
                $customer->save();
                return redirect('/profile');
            }
        }
    }

    public function showUpdateInfo($customer_id)
    {
        $customer = Customer::find($customer_id);
        return view('/updateProfile', compact('customer'));
    }

    public function updateProfile(Request $request, $customer_id)
    {
        $customer = Customer::find($customer_id);
        $customer->first_name = $request->input('first_name');
        $customer->last_name = $request->input('last_name');
        $customer->email = $request->input('email');
        $customer->phone = $request->input('phone');
        $customer->address = $request->input('address');
        if ($request->hasFile('customer_image')) {
            $image = $request->file('customer_image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images/user'), $imageName);
            $customer->customer_image = $imageName;
        }
        $customer->save();
        return redirect()->route('profile')->with('success', 'Hotel updated successfully');
    }
}
