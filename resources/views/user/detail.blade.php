@extends('layouts.app')

@section('content')
<div class="container">
  <table class="min-w-full divide-y divide-gray-200">
    <thead>
      <tr>
        <th>{{$user->id}}</th>
        <th>{{$user->name}}</th>
      </tr>
    </thead>
    <tbody>
    <tr>
        <td>
          e-mail
        </td>
        <td>
          {{$user->email}}
        </td>
    </tr>
    <tr>
        <td>
          role
        </td>
        <td>
          {{$user->role}}
        </td>
    </tr>
    <tr>
      <td>
        Region
      </td>
      <td>
        {{$user->region->name}}
      </td>
    </tr>
    <tr>
      <td><a href="#" class='bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded'>Edit</a></td>
      <td>Delete</td>
   </tr>

    </tbody>

  </table>
  
  
</div>
@endsection