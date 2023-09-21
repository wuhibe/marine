<?php

namespace App\Http\Controllers;

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
        })->paginate(6);

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
            'email' => 'required|email|unique:customers,email',
            'phone' => 'required|string',
            'address' => 'required|string',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'id_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('avatar')) {
            $path = Utility::uploadFile($request, 'avatar');
            if ($path['flag'] == 1) {
                $request->merge(['avatar' => $path['url']]);
            } else {
                return redirect()
                    ->route('customers.index')
                    ->with('error', __($path['msg']));
            }
        }

        if ($request->hasFile('id_photo')) {
            $path = Utility::uploadFile($request, 'id_photo');
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
        return view('customers.show', compact('customer'));
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
            'email' => 'required|email|unique:customers,email,' . $customer->id,
            'phone' => 'required|string',
            'address' => 'required|string',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'id_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('avatar')) {
            $path = Utility::uploadFile($request, 'avatar');
            if ($path['flag'] == 1) {
                $request->merge(['avatar' => $path['url']]);
            } else {
                return redirect()
                    ->route('customers.index')
                    ->with('error', __($path['msg']));
            }
        }

        if ($request->hasFile('id_photo')) {
            $path = Utility::uploadFile($request, 'id_photo');
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