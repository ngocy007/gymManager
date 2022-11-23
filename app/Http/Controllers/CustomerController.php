<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        return view ('/admin.customer')->with('customers', $customers);
    }


    public function create()
    {
        return view('/admin.create');
    }


    public function store(Request $request)
    {
        $input = $request->all();
        Customer::create($input);
        return redirect()->route('khachhang.index')->with('thongbao', 'Thêm khách hàng thành công!');
    }


//    public function show($id)
//    {
//        $customer = Customer::find($id);
//        return view('customers.show')->with('customers', $customer);
//    }


    public function edit($id)
    {
        $customer = Customer::find($id);
        return view('/admin.edit')->with('customer', $customer);
    }


    public function update(Request $request, $id)
    {
        $customer = Customer::find($id);
        $input = $request->all();
        $customer->update($input);
        return redirect()->route('khachhang.index')->with('thongbao', 'Cập nhật khách hàng thành công!');
    }


    public function destroy($id)
    {
        Customer::destroy($id);
        return redirect()->route('khachhang.index')->with('thongbao', 'Xóa khách hàng thành công!');
    }
}
