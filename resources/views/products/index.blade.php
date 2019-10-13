@extends('adminlte::page')

@section('title', 'Products')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Products</h2>
        </div>
    </div>
</div>


@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif
  <a class="btn btn-info" href="{{ URL::to('/addproduct') }}">Add Product</a>
<table class="table table-bordered">
 <tr>
  <th>Catalog of Fields</th>
   <th>Name</th>
   <th>Description</th>
   <th>Quantity</th>
 </tr>

@if (count($products) > 0)

@foreach ($products as $product)

<tr>
<td> 
<select name="catalog">
<option selected disabled>Select...</option>

@foreach($catalogs as $catalog)
<option value="{{ $catalog->id }}"selected>{{ $catalog->name }}</option>
@endforeach

</select>
</td>
<td>{{$product->name }}</td>
<td>{{$product->description }}</td>
<td>{{$product->quantity }}</td>
<td>
<a class="btn btn-info" href="{{ URL::to('show_product/'.$product->id) }}">Show Product Details</a>
<a class="btn btn-primary" href="{{ URL::to('edit_product',$product->id) }}">Edit Product</a>
</td>
</tr>
@endforeach
</table>


{!! $products->links() !!}

@else

<p>No any products available now</p>

@endif


@endsection