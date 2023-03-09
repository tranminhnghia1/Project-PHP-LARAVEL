@extends('layouts.admin')
@section('content')
    <div id="content" class="container-fluid">
        <div class="card">

            <div class="card-header font-weight-bold d-flex justify-content-between align-items-center mb-4">
                <h5 class="m-0 ">Danh sách các quyền</h5>
                <a href="{{ route('add.permission') }}" class="btn btn-success">Thêm mới</a>
            </div>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <div class="card-body">
                <table class="table table-striped table-checkall">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th class="title" scope="col">Tên quyền</th>
                            <th scope="col">Mô tả quyền</th>
                            <th scope="col">Ngày tạo</th>
                            <th scope="col">Tác vụ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $t = 0;
                        @endphp
                        @foreach ($permissions_multip as $item)
                            @php
                                $t++;
                            @endphp
                            <tr>
                                <th scope="row">{{ $t }}</th>
                                <td class="title">
                                    {{ str_repeat('|--', $item['level']) . $item['name'] }}
                                </td>
                                <td>{{ $item->permission_description }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>
                                    <a href="{{ route('edit.permission',$item->id) }}" 
                                        class="btn btn-success btn-sm rounded-0 text-white" type="button"
                                        data-toggle="tooltip" data-placement="top" title="Edit"><i
                                            class="fa fa-edit"></i></a>
                                    <a href="{{ route('delete.permission',$item->id) }}"
                                        onclick="return confirm('Bạn có chắc chắn muốn xóa không?');"
                                        class="btn btn-danger btn-sm rounded-0 text-white" type="button"
                                        data-toggle="tooltip" data-placement="top" title="Delete"><i
                                            class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $permissions->links() }}
            </div>
        </div>
    </div>
@endsection
