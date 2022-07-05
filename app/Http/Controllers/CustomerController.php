<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Mobile;
use DB;
use Illuminate\Http\Request;
use App\Mail\registration_mail;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\CustomerRequest;


class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)  // this grab data from database directly
    {
        // dd($request);
        if ($request->has('trashed')) {
            $customers = Customer::onlyTrashed()
                ->get();
        } else {
            //   dd($customers)          ;
            $customers = Customer::with('mobile')->latest()->paginate();
        }
        // dd($customers);
        return view('customers.index', compact('customers'))->with('i', (request()->input('page', 1) - 1));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customers.add_edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomerRequest $request)
    
    {


        $input = $request->validated();
        $email = $input['email'];
        // dd($email);
        $input['hobby'] = implode(",", $request->hobby);
        if ($image = $request->file('image')) {
            $input['image'] = insert_image($image);
        }
        mail::to($email)->send(new registration_mail($input));

        $customer = Customer::create($input);  // this is for join  $customer is object(variable)
        $input['customer_id'] = $customer->id; // pass krava mate $input  
        Mobile::create($input);

        return redirect()->route('customers.index')
            ->with('success', 'customer created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {

        // dd($customer);

        return view('customers.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        $customer['hobby'] = explode(",", $customer['hobby']);
        return view('customers.add_edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(CustomerRequest $request, Customer $customer)
    {

        $input = $request->all();
        $input['hobby'] = implode(",", $request->hobby);
        if ($image = $request->file('image')) {
            $destinationPath = 'customer_image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            //$customer = Customer::find($customer->id);           
            unlink("customer_image/" . $input['old_image']);
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        } else {
            unset($input['image']);
        }
        $customer->update($input);
        $input['customer_id'] = $customer->id;
        $mobile = $customer->mobile;
        $mobile->update($input);
        return redirect()->route('customers.index')
            ->with('success', 'customer updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        // unlink("customer_image/".$customer->image);
        $customer->delete();
        return redirect()->route('customers.index')
            ->with('success', 'Customer deleted successfully');
    }

    public function restore($id)
    {
        Customer::withTrashed()->find($id)->restore();

        return redirect()->back();
    }

    public function restoreAll()
    {
        Customer::onlyTrashed()->restore();

        return redirect()->back();
    }
    public function delete($id)
    {
        Customer::onlyTrashed()->find($id)->forceDelete();

        // unlink("customer_image/".$customer->image);
        $id->delete();
        return redirect()->route('customers.index')
            ->with('success', 'Customer deleted successfully');
    }
}
