@extends('layouts.admin')
@section('content')
    <div id="content" class="container-fluid">
        <div class="card">
            <div class="card-header font-weight-bold">
                Thêm quyền
            </div>
            <div class="card-body">
                <form method="POST" action="{{ url('admin/permission/store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="text-strong" for="name">Tên quyền</label>
                        <input class="form-control" type="text" value="" name="name" id="name">
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="text-strong" for="display_name">Mô tả quyền</label>
                        <input class="form-control" type="text" value="" name="display_name" id="display_name">
                        @error('display_name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="action mb-4">
                        <label class="text-strong" for="">Chọn module cha<small
                                style="font-size: 15px; color: #656363;font-weight: normal;">(Là danh mục cha nếu không
                                chọn)</small></label>
                        <select class="form-control mr-1" name="permission_parent" id="">
                            <option value="0">Chọn</option>
                            @foreach ($permissions_add as $item)
                                {
                                <option value="{{ $item->id }}">
                                    {{ str_repeat('|--', $item['level']) . $item['name'] }}</option>
                                }
                            @endforeach
                        </select>
                    </div>
                    <input type="submit" name="btn-add" class="btn btn-primary" value="Thêm mới">
                </form>
            </div>
        </div>
    </div>
@endsection
