<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Customer;
use App\Models\Utility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $customers = Customer::where(function ($query) use ($search) {
            $query->where('first_name', 'like', '%' . $search . '%')
                ->orWhere('last_name', 'like', '%' . $search . '%')
                ->orWhere('email', 'like', '%' . $search . '%')
                ->orWhere('phone', 'like', '%' . $search . '%')
                ->orWhere('address', 'like', '%' . $search . '%');
        })
        ->orderBy('first_name')
        ->paginate(6);

        return view('customers.index', compact('customers', 'search'));
    }

    public function create()
    {
        return view('customers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'phone' => 'required|string',
            'address' => 'required|string',
        ]);

        if ($request->hasFile('avatar_img')) {
            $path = Utility::uploadFile($request->file('avatar_img'));
            if ($path['flag'] == 1) {                
                $request->merge(['avatar' => $path['url']]);
            } else {
                return redirect()
                    ->route('customers.index')
                    ->with('error', __($path['msg']));
            }
        }

        if ($request->hasFile('id_photo_img')) {
            $path = Utility::uploadFile($request->file('id_photo_img'));
            if ($path['flag'] == 1) {
                $request->merge(['id_photo' => $path['url']]);
            } else {
                return redirect()
                    ->route('customers.index')
                    ->with('error', __($path['msg']));
            }
        }
        $request->merge(['creator_id' => auth('admin')->user()->id]);
        Customer::create($request->all());

        return redirect()->route('customers.index')->with('success', 'Customer created successfully.');
    }

    public function show(Customer $customer)
    {
        $bookings = Booking::where('customer_id', $customer->id)->get();
        return view('customers.show', compact('customer', 'bookings'));
    }

    public function edit(Customer $customer)
    {
        return view('customers.edit', compact('customer'));
    }

    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'phone' => 'required|string',
            'address' => 'required|string',
        ]);

        if ($request->hasFile('avatar_img')) {
            $path = Utility::uploadFile($request->file('avatar_img'));
            if ($path['flag'] == 1) {
                $request->merge(['avatar' => $path['url']]);
            } else {
                return redirect()
                    ->route('customers.index')
                    ->with('error', __($path['msg']));
            }
        }

        if ($request->hasFile('id_photo_img')) {
            $path = Utility::uploadFile($request->file('id_photo_img'));
            if ($path['flag'] == 1) {
                $request->merge(['id_photo' => $path['url']]);
            } else {
                return redirect()
                    ->route('customers.index')
                    ->with('error', __($path['msg']));
            }
        }

        $customer->update($request->all());

        return redirect()->route('customers.index')->with('success', 'Customer updated successfully.');
    }

    public function destroy(Customer $customer)
    {
        if ($customer->avatar) {
            Storage::disk('public')->delete($customer->avatar);
        }
        if ($customer->id_photo) {
            Storage::disk('public')->delete($customer->id_photo);
        }

        $customer->delete();

        return redirect()->route('customers.index')->with('success', 'Customer deleted successfully.');
    }
}