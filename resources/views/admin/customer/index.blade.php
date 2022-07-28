

@extends('layouts.admin')
@section('title')
    <title>Quản lý khách hàng</title>
@endsection
@section('css')
    {{--    <link rel="stylesheet" href="{{asset('/css/category/index.css')}}">--}}
@endsection
@section('content')
    <div class="content-wrapper">
        <div class="content">
            <div class="row head-find" >
                <div class="col col-md-2">
                    <lable>Hiển thị</lable>
                    <select onchange="searchData()" id="selectLimit" class="form-control">
                        <?php
                        $array_limit = [10,20,50,100];

                        foreach($array_limit as $item){
                        $isSelect = "";
                        if($item == $limit) $isSelect = "selected"; ?>
                        <option {{$isSelect}} value="{{$item}}">{{$item}}</option>
                        <?php }?>
                    </select>
                </div>
                <div class="col col-md-3">
                    <lable>Tìm kiếm</lable>
                    <input onkeypress="searchData()" id="keyFind" value="{{$key}}" class="form-control" placeholder="Nhập tên nhân viên">
                </div>
                <div class="col col-md-2 div-relative-btn">
                    <a href="{{route('admin.customer.add')}}" class="btn btn-primary">Thêm mới</a>
                </div>
            </div>
            <div class="container-fluid">
                <div>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Stt</th>
                            <th>Tên khách hàng</th>
                            <th>Số điện thoại</th>
                            <th>Địa chỉ</th>
                            <th>Email</th>
                            <th>Hành động</th>
                        </tr>
                        </thead>
                        <tbody>

                        @for ($i  = 0 ; $i < count($customers); $i++)
                            <tr>
                                <td>{{$i+1+(($page-1)*$limit)}}</td>
                                <td>{{$customers[$i]->name}}</td>
                                <td>{{$customers[$i]->phone}}</td>
                                <td>{{$customers[$i]->address}}</td>
                                <td>{{$customers[$i]->email}}</td>

                                <td>
                                    <a href="{{route('admin.customer.edit', ['id' => $customers[$i]->id])}}"><i title="chỉnh sửa" class="fas fa-edit text-primary"></i></a>
                                </td>
                            </tr>
                        @endfor
                        </tbody>
                    </table>
                </div>
                <div>
                    {{$customers->links('pagination::bootstrap-4')}}
                </div>
            </div>
        </div>
    </div>
@endsection


@section('popup')


@endsection

@section('script')
    @if(session()->has('success'))
        <script>alert('{{session()->get('success')}}')</script>
    @endif
    <script src="/js/customer/index.js"></script>
@endsection
