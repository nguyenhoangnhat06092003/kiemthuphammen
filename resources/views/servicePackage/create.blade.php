@extends('templates.default-page')

@section('script')
    <script src="{{ asset('public/ckeditor/ckeditor.js') }}"></script>  
@endsection

@section('content')
    <form action="{{ route('servicePackage.store') }}" method="POST">
        @csrf
        <div>
            <label for="name">Name</label>
            <input type="text" name="name">
        </div>
        <div>
            <label for="price">Price</label>
            <input type="number"  min="1" onkeypress="return event.charCode >= 48" name="price">
        </div>
        <div>
            <textarea name="content" id="" cols="30" rows="10"></textarea>
        </div>
        <div>
            <button type="submit">Submit</button>
        </div>
    </form>

    <script>
        CKEDITOR.replace('content');
    </script>
@endsection