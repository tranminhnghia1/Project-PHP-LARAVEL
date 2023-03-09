@extends('layouts.admin')
@section('content')
    <div id="content" class="container-fluid">
        <div class="card">
            <div class="card-header font-weight-bold d-flex justify-content-between align-items-center mb-4">
                <h5 class="m-0 ">Danh sách vai trò</h5>
                
                <a href="{{ route('add.role') }}" class="btn btn-success">Thêm mới</a>
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
                            <th scope="col">Tên vai trò</th>
                            <th scope="col">Mô tả vai trò</th>
                            <th scope="col">Ngày tạo</th>
                            <th scope="col">Tác vụ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $t = 0;
                        @endphp
                        @foreach ($role as $item)
                            @php
                                $t++;
                            @endphp
                            <tr>
                                <th scope="row">{{ $t }}</th>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->role_description }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>
                                    <a href="{{ route('edit.role', $item->id) }}"
                                        class="btn btn-success btn-sm rounded-0 text-white" type="button"
                                        data-toggle="tooltip" data-placement="top" title="Edit"><i
                                            class="fa fa-edit"></i></a>
                                    <a href="{{ route('delete.role',$item->id) }}" onclick="return confirm('Bạn có chắc chắn muốn xóa không?');"
                                        class="btn btn-danger btn-sm rounded-0 text-white" type="button"
                                        data-toggle="tooltip" data-placement="top" title="Delete"><i
                                            class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach


                    </tbody>
                </table>
                <nav aria-label="Page navigation example">
                    <ul class="pagination">

                    </ul>
                </nav>
            </div>
        </div>
    </div>
@endsection
