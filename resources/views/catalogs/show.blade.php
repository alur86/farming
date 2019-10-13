@extends('adminlte::page')

@section('title', 'Catalog Field Details')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Catalog Field Details</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('catalogs') }}">Return Back</a>
        </div>
    </div>
</div>

<div class="row">
  <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
           


  <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Catalog Name:</strong>
           {{$catalog->name}}
        </div>
    </div>

  <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="form-group">
            <strong>Catalog Status:</strong>
            
       @if ($catalog->active==1)
            activated
               @else 
           deactivated
         @endif

        </div>
    </div

    <div class="col-xs-12 col-sm-12 col-md-12">
     <div class="form-group">
            <strong>Catalog Description:</strong>
            {{$catalog->description}}
    </div>
    </div>
   


    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Catalog Type:</strong>
              {{$catalog->catalog_type}}
        </div>
    </div>



</div>
@endsection