@extends('layouts.app')

@section('content')
<div class="container">
  <table class="min-w-full divide-y divide-gray-200">
    <thead>
      <tr>
        <th>Id</th>
        <th>Name</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($regions as $region)
      <tr>
          <td>
            <a href="{{route('region.show', $region->id)}}">{{$region->id}}</a>
          </td>
          <td>
            <a href="{{route('region.show', $region->id)}}">{{$region->name}}</a>
          </td>
        
        </tr>
      
    </tbody>
  @endforeach
  </table>
  
  
</div>
@endsection