@extends('layout')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="col-md-6">
                    <h3>Quản lý sinh viên</h3>
                </div>
                <div class="col-md-6">
                    <a href="{{route('sinhvien.create')}}"  class="btn btn-primary float-end">Thêm mới</a>
                </div>
            </div>
            <div class="card-body">
                @if (Session::has('thongbao'))
                    <div class="alert alert-success">
                        {{ Session::get('thongbao') }}
                    </div>
                @endif
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">MSSV</th>
                            <th scope="col">Họ và tên</th>
                            <th scope="col">Ngày Sinh</th>
                            <th scope="col">Giới Tính</th>
                            <th scope="col">Địa chỉ</th>
                            <th scope="col">Số điện thoại</th>
                            <th colspan="2">Action</th>
                            </tr>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sinhvien as $sv)
                            <tr>
                                <td>
                                    {{++$i}}
                                </td>
                                <td>{{$sv->MaSV}}</td>
                                <td>{{$sv->HoTen}}</td>
                                <td>{{$sv->NgaySinh}}</td>
                                <td>{{$sv->GioiTinh}}</td>
                                <td>{{$sv->DiaChi}}</td>
                                <td>{{$sv->SoDT}}</td>
                                <td>
                                    <form action="{{route('sinhvien.destroy', $sv->id)}}" method="POST">
                                        <a href="{{route('sinhvien.edit', $sv->id)}}" class="btn btn-info">Sửa</a>
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