@extends('layouts.main')
@section('content')
    @if (session('success'))
        <h1 style="background: green;">{{ session('success') }}</h1>
    @endif


    <div class="add">
        <div>
            <form action="{{ route('add.product') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="text" name="title" id="" placeholder="Enter a title"><br><br>
                <input type="text" name="amount" id="" placeholder="Enter a amount"><br><br>
                <input type="text" name="category" id="" placeholder="Enter a category"><br><br>

                <input type="file" name="file" id=""><br><br>
                <button>submit</button>


            </form>

        </div>



    </div>
@endsection
