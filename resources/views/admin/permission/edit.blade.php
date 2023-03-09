@extends('layouts.admin')
@section('content')
    <div id="content" class="container-fluid">
        <div class="card">
            <div class="card-header font-weight-bold">
                Thêm quyền
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('update.permission',$permissions_edit->id) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="text-strong" for="name">Tên quyền</label>
                        <input class="form-control" type="text" value="{{ $permissions_edit->name }}" name="name" id="name">
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="text-strong" for="display_name">Mô tả quyền</label>
                        <input class="form-control" type="text" value="{{ $permissions_edit->permission_description }}" name="display_name" id="display_name">
                        @error('display_name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    
                    <input type="submit" name="btn-add" class="btn btn-primary" value="Thêm mới">
                </form>
            </div>
        </div>
    </div>
@endsection
