@extends('layouts.main')
@section('content')
    @if (session('success'))
        <h1 style="background: green;">{{ session('success') }}</h1>
    @endif


    <div class="add d-flex justify-content-center my-3">
    
        <div>
                <h1 class="text-center text-secondary">Add Product</h1>
            <form action="{{ route('add.product') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="text" class="form-control  my-2" name="title" id="" placeholder="Enter a title">
                <input type="text" class="form-control my-2" name="amount" id="" placeholder="Enter a amount">
         
                <select name="category" class="form-control my-2">
                    <option value="mobiles">mobiles</option>
                    <option value="fashions">fashions</option>
                    <option value="electronics">electronics</option>
                    <option value="furnitures">furnitures</option>
                    <option value="grocery">grocery</option>

                </select>
                <input type="file"class="form-control my-2" name="file">
                <button class="btn btn-info my-2">submit</button>


            </form>

        </div>



    </div>
@endsection
