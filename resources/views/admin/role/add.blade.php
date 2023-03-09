@extends('layouts.admin')
@section('content')
    <div id="content" class="container-fluid">
        <div class="card">
            <div class="card-header font-weight-bold">
                Thêm vai trò
            </div>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <div class="card-body">
                <form method="POST" action="{{ url('admin/role/store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="text-strong" for="name">Tên vai trò</label>
                        <input class="form-control" type="text" value="" name="name" id="name">
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="text-strong" for="display_name">Mô tả vai trò</label>
                        <input class="form-control" type="text" value="" name="display_name" id="display_name">
                        @error('display_name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    {{-- <div class="checkall mt-4 display-6">
                        <input type="checkbox" name="checkall" id="check_all">
                        <label for="check_all"><strong>Chọn tất cả các vai trò</strong></label>
                    </div> --}}

                    <div class="card my-4 border-info card-checkbox">
                        <div class="card-header w-100 text-white bg-info hello">
                            <input type="checkbox" class="checkbox_parent" name="" id="item-1">
                            <label for="item-1">Module
                                </label>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                @foreach ($permission as $key => $per)
                                    <div class="col-md-3">
                                        <input type="checkbox" class="checkbox_child" value="{{ $per->id }}"
                                            name="permission_id[]" id="{{ $per->id }}">
                                        <label for="{{ $per->id }}">{{ $per->name }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        
                    </div>
                    


                    <input type="submit" name="btn-add" class="btn btn-primary" value="Thêm mới">
                </form>
            </div>
        </div>
    </div>
@endsection
