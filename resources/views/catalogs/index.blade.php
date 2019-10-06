@extends('adminlte::page')

@section('title', 'Catalogs of Fields')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Catalogs of Fields</h2>
        </div>
    </div>
</div>


@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif
  <a class="btn btn-info" href="{{ URL::to('/addcatalog') }}">Add New Catalog Field</a>
<table class="table table-bordered">
 <tr>
   <th>Name</th>
   <th>Description</th>
   <th>Catalog Type</th>
 </tr>

@if (count($catalogs) > 0)
 
@foreach ($catalogs as $catalog)
 
  <tr>
    <td>{{$catalog->name }}</td>
    <td>{{$catalog->category_type }}</td>
    <td>{{$catalog->description }}</td>
    <td>
       <a class="btn btn-info" href="{{ URL::to('show_catalog/'.$catalog->id) }}">Show Catalog Details</a>
       <a class="btn btn-primary" href="{{ URL::to('edit_catalog',$catalog->id) }}">Edit Catalog</a>
       
    </td>
  </tr>
 @endforeach
</table>


{!! $catalogs->links() !!}
@else
<p>Now catalog is empty  now</p>
@endif


@endsection