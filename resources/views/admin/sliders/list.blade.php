@extends('layouts.admin')

@section('content')
    <div id="content" class="container-fluid">
        <div class="card">
            @if (session('statuss'))
                <div class="alert alert-success">
                    {{ session('statuss') }}
                </div>
            @endif
            <div class="card-header font-weight-bold d-flex justify-content-between align-items-center">
                Thêm slider
                <div class="function">
                    <a href="{{ url('admin/sliders/add') }}"class="btn btn-success">Thêm mới</a>
                </div>
            </div>

            <div class="card-body">
                <form action="" method="">
                    @csrf
                    <table class="table table-striped table-checkall">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Ảnh</th>
                                <th style="text-align:left;" scope="col">Tiêu đề</th>
                                <th style="text-align:left;" scope="col">Mô tả</th>
                                <th style="text-align:left;" scope="col">Link</th>
                                <th scope="col">Trạng thái</th>
                                <th scope="col">Người tạo-Ngày tạo</th>
                                <th scope="col">Tác vụ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $t = 0;
                            @endphp
                            @foreach ($sliders as $slider)
                                @php
                                    $t++;
                                @endphp
                                <tr>
                                    <td scope="row">{{ $t }}</td>
                                    <td><a class="feature_img" href=""><img style="width:110px;height:60px"
                                                src="{{ asset($slider->slider_thumb) }}"alt=""></a>
                                    </td>
                                    <td style="text-align:left;"><a href="{{ route('slider.edit', $slider->id) }}">{{ $slider->name }}</a></td>
                                    <td style="text-align:left;"><a href="{{ route('slider.edit', $slider->id) }}">{{ $slider->content_desc }}</a>  </td>
                                    <td style="text-align:left;"><a href="{{ route('slider.edit', $slider->id) }}">{{ $slider->link }}</a> </td>
                                    <td style="text-align: center;">
                                        @if ($slider->status == 'posted')
                                            <span class="badge badge-success">Phê duyệt</span>
                                        @elseif ($slider->status == 'waiting')
                                            <span class="badge badge-warning">Chờ duyệt</span>
                                        @elseif ($slider->status == 'dustin')
                                            <span class="badge badge-danger">Thùng rác</span>
                                        
                                        @endif
                                    </td>

                                    <td>
                                        {{ $slider->user->name }}
                                        <p>{{ $slider->created_at }}</p>
                                    </td>

                                    <td>
                                        <a href="{{ route('slider.edit', $slider->id) }}"
                                            class="btn btn-success btn-sm rounded-0 text-white" type="button"
                                            data-toggle="tooltip" data-placement="top" title="Edit"><i
                                                class="fa fa-edit"></i></a>
                                        <a href="{{ route('delete_slider', $slider->id) }}"
                                            class="btn btn-danger btn-sm rounded-0 text-white"
                                            onclick=" return confirm('Bạn có chắc chắn xóa không?')" type="button"
                                            data-toggle="tooltip" data-placement="top" title="Delete"><i
                                                class="fa fa-trash"></i></a>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
@endsection
