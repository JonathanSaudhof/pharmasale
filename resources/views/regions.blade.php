@extends('layouts.app')

@section('content')
<table class="min-w-full divide-y divide-gray-200">
  <thead>
    <tr>
      <th>Id</th>
      <th>Name</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($regions as $region)
    @if($user->id !== Auth::user()->id)
      <tr>
          <td>
            <a href="{{route('region.show', $region->id)}}">{{$region->id}}</a>
          </td>
          <td>
            <a href="{{route('region.show', $region->id)}}">{{$region->name}}</a>
          </td>
          <td>
            {{$user->email}}
          </td>
          <td>
            {{$user->role}}
          </td>
          <td>
            {{$user->created_at}}
          </td>
        
        </tr>
      @endif
  </tbody>
  @endforeach
</table>

@endsection