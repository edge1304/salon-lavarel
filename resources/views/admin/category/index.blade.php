

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
                <select class="form-control">
                    <option value="10">10</option>
                    <option value="20">20</option>
                    <option value="30">30</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
            </div>
            <div class="col col-md-3">
                <lable>Tìm kiếm</lable>
                <input class="form-control" placeholder="Nhập tên danh mục">
            </div>
            <div class="col col-md-2 div-relative-btn">
                <button onclick="showPopup('popupAdd',true)" class="btn btn-primary">Thêm mới</button>
            </div>
        </div>
        <div class="container-fluid">

        </div>
    </div>
</div>
 @endsection


 @section('popup')

<div class="modal fade" id="popupAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Thêm danh mục</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-12 col-md-6">
                <label>Tên danh mục</label>
                <input class="form-control" type="text" placeholder="Nhập tên danh mục">
            </div>
            <div class="col-12 col-md-6">
                <label>Tên danh cha</label>
                <select id="select_parent_add">
                    <option value="0">______________</option>
{{--                    {!! $htmlOption !!}--}}
                </select>
            </div>
        </div>
        <div class="row">
            <label>Chọn ảnh</label>
            <input type="file" id="input_add_image" class="input-select-image" accept="image/*">
            <div class="div-select-image-popup">
                <img>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
        <button type="button" class="btn btn-primary">Lưu</button>
      </div>
    </div>
  </div>
</div>
@endsection

@section('script')
<script src="/js/category/index.js"></script>
@endsection
