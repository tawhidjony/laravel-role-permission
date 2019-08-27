<?php

namespace App\Http\Controllers;

use App\Http\Traits\ResponseMessage;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CustomerController extends Controller
{
    use ResponseMessage;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $customer=Customer::orderBy('id','desc')->paginate(10);
        return view('customers.index',compact('customer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customer= New Customer();
        return view('customers.create',compact('customer'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'nullable',
            'phone' => 'required',
            'address' => 'required',
            'photo' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $data = $request->all();
        $image = $request->file('photo');

        if ($image) {
            $path = Storage::putFile('customers', $image);
            if ($path) {
                $data['photo'] = $path;
            }
        }else{
            $path='';
        }

        $customer = Customer::create($data);

        if($customer){
            return redirect()->Route('customers.index')->with($this->create_success_message);
        }else{
            return redirect()->Route('customers.index')->withInput()->with($this->create_fail_message);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer=Customer::find($id);
        return view('customers.show',compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer=Customer::find($id);
        return view('customers.edit',compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'nullable',
            'phone' => 'required',
            'address' => 'required',
            'photo' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->all();
        $customer = Customer::find($id);
        if($customer){
            $image = $request->file('photo');
            if ($image) {
                $path = Storage::putFile('customers',$image);

                if ($path) {
                    $data['photo'] = $path;
                    if (isset($customer->photo)) {
                        Storage::delete($customer->photo);
                    }
                }
            }
            $customer->update($data);
            return redirect()->route('customers.index')->with($this->update_success_message);
        }else{
            return redirect()->route('customers.index')->withInput()->with($this->update_fail_message);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Customer::find($id);

        if ($customer) {
            if(isset($customer->photo))
                Storage::delete($customer->photo);
            $customer->delete();
            return redirect()->route('customers.index')->with($this->delete_success_message);
        }else{
            return back()->with($this->not_found_message);
        }
    }
}
