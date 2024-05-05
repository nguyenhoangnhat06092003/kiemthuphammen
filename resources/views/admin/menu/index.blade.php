@extends('admin.templates.admin-page')

@section('css')

@endsection

@section('content')
    <div class="right_col" role="main" style="min-height: 2000px">
      <div class="row">
        <div class="col-12">
          <h1 class="text-center mb-5">QUẢN LÝ THỰC ĐƠN</h1>
          <div class="row d-flex flex-row justify-content-between m-3">
            <div class="searh-box ">
                <label for="search" class="mr-1" style="font-size: 20px">Nhập tên: </label>
                <input type="text" name="search" id="search" class="" style="font-size: 20px">
                <button type="submit" class="btn btn-primary">Tìm kiếm</button>
            </div>
    
            <div class="add-account-box">
                <a href="" class="btn btn-primary" id="add-account-admin">Thêm thực đơn</a>
            </div>
        </div>

        <div class="x_content">
          <div class="table-responsive">
              <table class="table table-striped jambo_table bulk_action" >
                  <thead>
                      <tr class="headings text-center" style="font-size: 20px">
                          <th class="column-title" style="width: 10%">STT </th>
                          <th class="column-title" style="width: 30%">Tên thực đơn</th>
                          <th class="column-title" style="width: 30%">Loại dịch vụ </th>
                          <th class="column-title" style="width: 30%">Hành động </th>
                      </tr>
                  </thead>

                  <tbody class="text-center" style="font-size: 16px">
                      
                      @foreach ($menus as $menu)
                          <tr class="even pointer">
                              <td class="align-items-center ">{{ $menu->id }}</td>
                              <td class="align-items-center ">{{ $menu->name }}</td>
                              <td class="align-items-center ">{{ $menu->services->name }}</td>
                              <td class=" last">
                                <a href="{{ URL::to('/edit-food/'.$menu->id) }}" class="btn btn-warning" 
                                >Sửa</a>
                                <a href="{{ URL::to('/delete-food/'.$menu->id) }}" class="btn btn-danger" id="btn-view-order"
                                >Xóa</a>
                              </td>
                          </tr>
                      @endforeach
                      
                  </tbody>
              </table>

              <div class="d-flex justify-content-center">
                  {{ $menus->links() }}
              </div>
          </div>


        </div>
      </div>
    </div>
@endsection

@section('js')
    
@endsection