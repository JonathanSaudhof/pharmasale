@extends('layouts.app')


@section('content')
  {{-- {{dd(route("user.store"))}} --}}
  <div class="container items-center justify-center">
    <div class="col-10 sticky flex justify-between items-center rounded mx-auto mb-6 px-6 py-3 shadow-sm bg-gray-50 border border-gray-500"><h1>🗺 Create new region</h1>
      <a href="{{route('region.index')}}"><button class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded">< Back</button></a>
    </div>
    <form class="m-auto flex flex-column shadow-sm col-10 p-6 bg-white rounded" method="POST" action="{{route('region.store')}}">
      @csrf
      <label class="py-2 font-bold text-base">Region name:</label>
      <input class="block border rounded py-2 px-3 mb-2" type="text" name="name" placeholder="East Germany" id="user-name"/>
    <div class="flex py-2">
      <button class="bg-blue-500 hover:bg-blue-300 text-gray-800 font-bold text-white py-2 px-4 border border-gray-400 rounded mr-2" type='submit'>Create</button>
      <a  href="{{route('region.index')}}"><button class="bg-gray-100 hover:bg-gray-300 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded"> Cancel</button> </a>
    </div>
  </form>
  </div>
@endsection