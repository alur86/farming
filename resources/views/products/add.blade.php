@extends('adminlte::page')

@section('title', 'Add Product')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add Product</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('products') }}">Return Back</a>
        </div>
    </div>
</div>


@if (count($errors) > 0)
  <div class="alert alert-danger">
    <strong>Error</strong>happened<br><br>
    <ul>
       @foreach ($errors->all() as $error)
         <li>{{ $error }}</li>
       @endforeach
    </ul>
  </div>
@endif


<form class="form-horizontal" role="form" method="POST" action="{{ url('/addedproduct') }}">
  {{ csrf_field() }}

<div class="form-group{{ $errors->has('catalog_id') ? ' has-error' : '' }}">
<label for="catalog_id" class="col-md-4 control-label">Catalog of Fields</label>
<div class="col-md-6">
<select name="catalog_id">
<option selected disabled>Select...</option>
@foreach($catalogs as $catalog)
<option value="{{ $catalog->id }}"selected>{{ $catalog->name }}</option>
@endforeach
</select>  
@if ($errors->has('catalog_id'))
<span class="help-block">
<strong>{{ $errors->first('catalog_id') }}</strong>
</span>
 @endif
 </div>
</div>

<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
<label for="name" class="col-md-4 control-label">Product Name</label>
<div class="col-md-6">
<input id="name" type="text" class="form-control" name="name" value="{{old('name')}}">
@if ($errors->has('name'))
<span class="help-block">
<strong>{{ $errors->first('name') }}</strong>
</span>
 @endif
 </div>
</div>


<div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
<label for="description" class="col-md-4 control-label">Description</label>
<div class="col-md-6">
<textarea class="form-control" rows="5" class="form-control" name="description"></textarea>
@if ($errors->has('supplier_description'))
<span class="help-block">
<strong>{{ $errors->first('description') }}</strong>
</span>
 @endif
 </div>
</div>




 


<div class="form-group{{ $errors->has('quantity') ? ' has-error' : '' }}">
<label for="quantity" class="col-md-4 control-label">Quantity</label>
<div class="col-md-6">
<input id="quantity" type="text" class="form-control" name="quantity" value="{{old('quantity')}}">
@if ($errors->has('quantity'))
<span class="help-block">
<strong>{{ $errors->first('quantity') }}</strong>
</span>
 @endif
 </div>
</div>


 


<div class="form-group">
<div class="col-md-6 col-md-offset-4">
<button type="submit" class="btn btn-primary">
 <i class="fa fa-btn fa-user"></i> Add
</button>
</div>
</div>
       </div>
        
            </div>
        </div>
    </div>
@endsection


