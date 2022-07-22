

@extends('layouts.admin')
@section('title')
    <title>Quản lý danh mục</title>
@endsection
@section('css')
    <link rel="stylesheet" href="{{asset('/css/category/index.css')}}">
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
                <input onkeypress="searchData()" id="keyFind" value="{{$key}}" class="form-control" placeholder="Nhập tên danh mục">
            </div>
            <div class="col col-md-2 div-relative-btn">
                <a href="{{route('admin.category.add')}}" class="btn btn-primary">Thêm mới</a>
            </div>
        </div>
        <div class="container-fluid">
            <div>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Stt</th>
                        <th>Tên danh mục</th>
                        <th>Ảnh</th>
                        <th>Hành động</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach ($categories as $category)
                        <tr>
                            <td>{{$category->id}}</td>
                            <td>{{$category->category_name}}</td>
                            <td><img src="{{$category->category_image_link}}"></td>
                            <td>
                                <a><i class="fas fa-edit text-primary"></i></a>
                                <a><i class="fas fa-trash text-danger"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div>
                {{$categories->links('pagination::bootstrap-4')}}
            </div>
        </div>
    </div>
</div>
 @endsection


 @section('popup')


@endsection

@section('script')
<script src="/js/category/index.js"></script>
@endsection
