@extends('layouts.main')
@section('title', 'cartlist')
@section('content')



    <div class="py-2">
        <h1 class="text-center"> <b> Ordered Items</b></h1>
    </div>


    <table class="table  my-2 table-hover mx-3">
        <tr>
            <td>
                <h2>Image</h2>
            </td>
            <td>
                <h2>Title</h2>
            </td>

            <td>
                <h2>price</h2>
            </td>
            <td>
                <Address></Address>
            </td>
            <td>
                <h2>status</h2>
            </td>
            <td>
                <h2>Payment Method</h2>
            </td>
            <td>
                <h2>Payment Status</h2>
            </td>
        





        </tr>
        @foreach ($products as $product)
            <tr>
                <td> <img src="{{ asset('product_images/' . $product->image) }}" class="card-img-top"
                        alt="{{ $product->title }} " style="width: 100px; height:100px;">
                </td>
                <td>
                    <p style="font-size: 1.5rem;">{{ $product->title }}</p>
                </td>
                <td>
                    <p style="font-size: 1.5rem;">{{ $product->amount }}</p>
                </td>
                  <td>
                    <p style="font-size: 1.5rem;">{{ $product->address }}</p>
                </td>
                <td>
                    <p style="font-size: 1.5rem;">{{ $product->status }}</p>
                </td>
                <td>
                    <p style="font-size: 1.5rem;">{{ $product->payment_method }}</p>
                </td>
                <td>
                    <p style="font-size: 1.5rem;">{{ $product->payment_status }}</p>
                </td>

             




            </tr>
           
            
        @endforeach
      
        
    </table>

    <h1 class="mx-3 text-center">Total={{ $products->sum('amount') }}</h1>


















@endsection
