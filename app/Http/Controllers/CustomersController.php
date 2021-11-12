<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customers;
use App\Models\CustomerGroup;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // $customers = Customers::latest()->paginate(5);
        $customers = Customers::whereNotIn('id', [1])->latest()->paginate(30);
    
        return view('customers.index',compact('customers'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function getGroup() {
        $groups = CustomerGroup::latest()->paginate(50);
        return view('admin.group.index', compact('groups'));
    }

    public function getGroupForm()
    {

        return view('admin.group.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customers.create');
    }

    public function postGroupForm(Request $request)
    {
        $group = new CustomerGroup;
        $group->name = $request->name;
        $group->active = $request->active == 'active' ? true : false;
        $group->save();

        return redirect('/admin/customer-group')->with('success', 'Group generated success');
    }

    public function getAllUsersByGroupId($id)
    {
        $group = CustomerGroup::find($id);
        $users = User::whereHas('groups', function (Builder $query) use ($group) {
            $query->where('name', $group->name);
        })->paginate(30);
        return view('admin.group.customers', compact('group', 'users'));
    }

    public function getAddUserForm($id)
    {
        $group = CustomerGroup::find($id);
        $users = User::get();
        return view('admin.group.add-user', compact('group', 'users'));
    }

    public function getAddUserFormSave(Request $request, $id)
    {
        $group = CustomerGroup::find($id);
        $userid = $request->userid;
        $group->customers()->attach($userid);
        return back()->with('success', 'user attached to this group');
    }

    public function getAddUserFormRemove(Request $request, $id)
    {
        $group = CustomerGroup::find($id);
        $userid = $request->userid;
        $group->customers()->detach($userid);
        return back()->with('success', 'user detached to this group');
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
            'firstname' => 'required',
            'firstname' => 'required',
        ]);
    
        Product::create($request->all());
     
        return redirect()->route('customers.index')
                        ->with('success','Customer created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('customers.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('customers.edit',compact('customers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customers $customer)
    {
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
        ]);
    
        $customer->update($request->all());
    
        return redirect()->route('customers.index')
                        ->with('success','Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
