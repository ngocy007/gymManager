@extends("layout.dasboard")

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h3>Chỉnh sửa khách hàng</h3>
                    </div>
                    <div class="col-md-6">
                        <a href="{{route('khachhang.index')}}" class="btn btn-primary float-end">Danh sách khách
                            hàng</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{route('khachhang.update', $customer->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <strong>Họ tên</strong>
                                <input type="text" name="name" value="{{$customer->name}}" class="form-control" placeholder="Nhập họ tên" >
                            </div>
                            <div class="form-group">
                                <strong>Giới tính</strong>
                                <select name="gender" class="form-select">
                                    <option {{$customer->gender == 1 ? "selected" : ""}}  value="1">nam</option>
                                    <option {{$customer->gender == 0 ? "selected" : ""}} value="0">nữ</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <strong>Ngày sinh</strong>
                                <input  type="date" name="dob"   class="form-control" placeholder="Nhập ngày sinh" value="{{$customer->dob}}">
                            </div>
                            <div class="form-group">
                                <strong>Số điện thoại</strong>
                                <input type="text" name="phone" class="form-control" value="{{$customer->phone}}" placeholder="Nhập số điện thoại">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success mt-2">Cập nhật</button>
                </form>
            </div>
        </div>
    </div>
@endsection()
