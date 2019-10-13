@extends('adminlte::page')

@section('title', 'Product Details')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Product Details</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('products') }}">Return Back</a>
        </div>
    </div>
</div>

<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
           
<strong>Product Catalog:</strong>
 <select name="catalog_id">
<option selected disabled>Select...</option>
@foreach($catalogs as $catalog)
<option value="{{ $catalog->id }}"selected>{{ $catalog->name }}</option>
@endforeach
</select>
</div>
 </div>


<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Product Name:</strong>
{{$product->name}}
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Product Description:</strong>
{{$product->description}}
</div>
</div>
   
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Quantity:</strong>
{{$product->quantity}}
</div>
</div>


</div>

@endsection