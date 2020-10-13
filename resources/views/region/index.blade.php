@extends('layouts.app')

@section('content')
<div class="container">
  <div class="col-10 sticky flex justify-between items-center rounded mx-auto mb-6 px-6 py-3 shadow-sm bg-gray-50 border border-gray-500">
    <h1>🗺 All Regions</h1>
    <a href="{{route('region.create')}}" >
     <button class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded"> + New Region</button>
    </a>
  </div>
  <table class="col-10 ml-auto mr-auto divide-y divide-gray-200 shadow-sm overflow-hidden border border-b border-gray-200 sm:rounded-lg">
    <thead>
      <tr>
        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Id</th>
        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Name</th>
        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Edit</th>
        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Delete</th>
      </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
    @foreach ($regions as $region)
      <tr class="border">
          <td class="px-6 py-4 whitespace-no-wrap w-1">
            <a href="{{route('region.show', $region->id)}}">{{$region->id}}</a>
          </td>
          <td class="px-6 py-4 whitespace-no-wrap">
            <a href="{{route('region.show', $region->id)}}">{{ucfirst($region->name)}}</a>
          </td>
          <td class="px-6 py-4 whitespace-no-wrap w-1">
            <a href="{{route('region.edit', $region->id)}}">✏️</a>
          </td>
          <td class="px-6 py-4 whitespace-no-wrap w-1">
            <button onclick="openClose('delete', '{{$region->id}}')" >🗑</button>
            <div class="hidden bg-gray-100 bg-opacity-75 fixed w-screen h-screen flex justify-center items-center inset-0" id="delete-{{$region->id}}">
              <div role="alert" class="shadow w-1/4">
                <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                  Are you sure?
                </div>
                <div class="border flex justify-evenly border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700" >
                  <form method="POST" action="{{route('region.destroy', $region->id)}}" >
                    @csrf
                    @method('DELETE')
                    <button class='hover:bg-red-700 hover:text-white text-black font-bold border py-2 px-4 rounded' type="submit">Yes</button>
                  </form>
                  <button class='border hover:bg-blue-700 hover:text-white text-black font-bold py-2 px-4 rounded' onclick="openClose('delete', '{{$region->id}}');">No</button>
              </div>
            </div>
          </td>
        </tr>
      
        @endforeach
      </tbody>
  </table>
  
  
</div>
@endsection