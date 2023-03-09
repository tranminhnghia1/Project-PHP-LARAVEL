@extends('layouts.admin')

@section('content')
    <div id="content" class="container-fluid">
        <div class="card">
            <p style="    font-size: 28px;
    color: red;">Bạn không có quyền truy cập vào trang này, xin vui lòng click <a style="text-transform: uppercase;font-weight: bold;"
                    href="{{ route('dashboard') }}">vào đây</a> để quay về Dasboard!</p>
            <img style=" display: flex;
    justify-content: center;
    align-items: center; width:500px;"
                src="{{ asset('uploads/bao-mat.jpg') }}" alt="">
        </div>
    </div>
@endsection
