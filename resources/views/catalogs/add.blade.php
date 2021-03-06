@extends('adminlte::page')

@section('title', 'Add Catalog')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add Catalog</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('catalogs') }}">Return Back</a>
        </div>
    </div>
</div>


@if (count($errors) > 0)
  <div class="alert alert-danger">
    <strong>Error </strong> happened<br><br>
    <ul>
       @foreach ($errors->all() as $error)
         <li>{{ $error }}</li>
       @endforeach
    </ul>
  </div>
@endif


<form class="form-horizontal" role="form" method="POST" action="{{ url('/addedcatalog') }}">

 {{ csrf_field() }}

<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
<label for="name" class="col-md-4 control-label">Catalog Name</label>
<div class="col-md-6">
<input id="name" type="text" class="form-control" name="name" value="{{old('name')}}">
@if ($errors->has('name'))
<span class="help-block">
<strong>{{ $errors->first('name') }}</strong>
</span>
 @endif
 </div>
</div>


<div class="form-group{{ $errors->has('catalog_type') ? ' has-error' : '' }}">
<label for="catalog_type" class="col-md-4 control-label">Catalog Type</label>
<div class="col-md-6">
<input id="catalog_type" type="text" class="form-control" name="catalog_type" value="{{old('catalog_type')}}">
@if ($errors->has('catalog_type'))
<span class="help-block">
<strong>{{ $errors->first('catalog_type') }}</strong>
</span>
 @endif
 </div>
</div>




<div class="form-group{{ $errors->has('active') ? ' has-error' : '' }}">
<label for="active" class="col-md-4 control-label">Catalog of status</label>
<div class="col-md-6">
<select name="active">
<option selected disabled>Select...</option>
<option value="0" >deactivated</option>
<option value="1" selected>activated</option>
</select>  
@if ($errors->has('active'))
<span class="help-block">
<strong>{{ $errors->first('active') }}</strong>
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




<div class="form-group">
<div class="col-md-6 col-md-offset-4">
<button type="submit" class="btn btn-primary">
 <i class="fa fa-btn fa-user"></i> Add
</button>
</div>
</div>
</div>
</div>                   
       
@endsection


