@extends('admin.templates.admin-page')

@section('css')
    <link rel="stylesheet" href="{{ asset('public/front-end/css/package.css') }}">
@endsection

@section('content')
    <div class="right_col row content" role="main">
        <div class="x_content col-11" style="margin-left: 20px">

            <h3>Danh sách gói ưu đãi</h3>

            <div class="status">
                @if (session('status'))
                    <h6 class="alert alert-success">{{ session('status') }}</h6>
                @endif
            </div>
            <div class="table-responsive">
                <div class="add-account-box">
                    <a href="{{ route('createPackage') }}" class="btn btn-primary" id="add-account-admin">Thêm gói ưu đãi</a>
                </div>
                <table class="table table-striped jambo_table bulk_action">
                    <thead>
                        <tr class="headings">
                            <th>STT</th>
                            <th class="column-title">Tên gói ưu đãi </th>
                            {{-- <th class="column-title">Chi tiết </th> --}}
                            <th class="column-title">Dịch vụ </th>
                            <th class="column-title">Giá</th>
                            <th class="column-title no-link last">
                                <span class="nobr">Hành động</span>
                            </th>
                            <th class="bulk-actions" colspan="7">
                                <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions
                                    ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($packages as $package)
                            <tr class="even pointer">
                                <th>{{ $package->id }}</th>
                                <th>{{ $package->content }}</th>
                                {{-- <th>{{ $package->detail }}</th> --}}
                                <th>{{ $package->service->name }}</th>
                                <th>{{ number_format($package->price, 0) }} đ</th>
                                <th>
                                    <a href="{{ url('admin/package/update', ['id' => $package->id]) }}"><i
                                            class="fa fa-edit"></i></a>
                                    <a href="{{ url('admin/package/delete', ['id' => $package->id]) }}">
                                        <i class="fa fa-remove"></i>
                                    </a>
                                </th>
                            </tr>
                        @endforeach

                    </tbody>

                </table>

                <div class="d-flex justify-content-center">
                    {{ $packages->links() }}
                </div>
            </div>
        </div>

    </div>
@endsection

@section('js')

@endsection
