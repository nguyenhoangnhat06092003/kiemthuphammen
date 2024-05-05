@extends('admin.templates.admin-page')

@section('css')
<link rel="stylesheet" href="{{ asset('public/front-end/css/package.css') }}">
@endsection

@section('content')
    <div class="right_col" role="main" style="min-height: 2000px">
      <div class="row">
        <div class="col-12">
          <div class="status">
            @if (session('status'))
              <h6 class="alert alert-success">{{ session('status') }}</h6>
            @endif
          </div>
          <div class="card">
            <div class="card-header">
              <h4 class="d-flex justify-content-between"> Thêm gói ưu đãi
                <a href="{{ route('packagelist') }}" class="btn btn-primary float-end">Trở lại trang trước</a>
              </h4>
            </div>
            <div class="card-body" style="font-size: 20px">
                <form action="{{ route('add-package') }}" method="POST" enctype="multipart/form-data">
                  
                  @csrf
                  <div class="form-group">
                    <label for="name">Tên gói ưu đãi:</label>
                    <input type="text" name="name" id="name" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="ServiceId">Chọn dịch vụ:</label>
                    <select name="ServiceId" id="ServiceId" class="custom-select">
                      @foreach ($services as $service)
                        <option class="p-2" value="{{ $service->id }}">{{ $service->name }}</option>
                          
                      @endforeach
                    </select>
                  <div class="form-group">
                    <label for="price">Giá:</label>
                    <input type="number" name="price" id="price" min="1" onkeypress="return event.charCode >= 48" class="form-control">
                  </div>
        
                  
                  

                  </div>
                  <div class="form-group d-flex justify-content-end">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                    <button type="submit" class="btn btn-primary">Thêm dịch vụ</button>
                  </div>
                </form>
            </div>
          </div>
          </div>
        </div>
      </div>
@endsection

@section('js')
    
@endsection