@extends("layout.dasboard")
@section("content")
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h3>Quản lý khách hàng</h3>
                    </div>
                    <div class="col-md-6">
                        <a href="{{route('khachhang.create')}}" class="btn btn-primary float-end">Thêm mới</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @if(Session::has('thongbao'))
                    <div class="alert alert-success">
                        {{Session::get('thongbao')}}
                    </div>
                @endif
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>Mã khách hàng</th>
                        <th>Họ tên</th>
                        <th>Ngày sinh</th>
                        <th>Giới tính</th>
                        <th>Số điện thoại</th>
                        <th>Thao tác</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($customers as $key=>$cus)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$cus->id}}</td>
                            <td>{{$cus->name}}</td>
                            <td>{{$cus->dob}}</td>
                            <td>{{$cus->gender == 1 ? "nam" : "nữ"}}</td>
                            <td>{{$cus->phone}}</td>
                            <td>
                                <form action="{{route('khachhang.destroy',$cus->id)}}" method="post">
                                    <a href="{{route('khachhang.edit',$cus->id)}}" class="btn btn-info">Sửa</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Xóa</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
