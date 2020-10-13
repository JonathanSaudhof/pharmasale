@extends('layouts.app')
{{dd($user)}} 
@section('content')
<div class="container">
  <div class="col-10 flex justify-between items-center rounded mx-auto mb-6 px-6 py-3 shadow-sm bg-gray-100 border border-gray-500">
    <h1>👩🏻‍💻 User: <strong><u>{{$user->name}}</u></strong></h1>
    <div class="button-container">
      <a href="{{route('user.index')}}"><button class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded">< Back</button></a>
      <a href="{{route('user.edit', $user->id)}}"><button class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded">✏️</button></a>
      <button class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded" onclick="openClose('delete', '{{$user->id}}')" >🗑</button>
    </div>
  </div>
  <table class="col-10 ml-auto mr-auto divide-x divide-gray-200 shadow-sm overflow-hidden border border-gray-500 sm:rounded-lg">
    <tbody class=" border divide-y divide-gray-200">
    <tr>
        <td class="px-6 py-4 whitespace-no-wrap w-1">
          Email
        </td>
        <td class="px-6 py-4 whitespace-no-wrap w-1 bg-white">
          {{$user->email}}
        </td>
    </tr>
    <tr>
        <td class="px-6 py-4 whitespace-no-wrap w-1 bg-gray-50">
          Role
        </td>
        <td class="px-6 py-4 whitespace-no-wrap w-1 bg-white">
          {{$user->role}}
        </td>
    </tr>
    <tr>
      <td class="px-6 py-4 whitespace-no-wrap w-1 bg-gray-50">
        Region
      </td>
      <td class="px-6 py-4 whitespace-no-wrap w-1 bg-white">
        {{$user->region->name}}
      </td>
    </tr>

    </tbody>

  </table>
  <div class="hidden bg-gray-100 bg-opacity-75 fixed w-screen h-screen flex justify-center items-center inset-0" id="delete-{{$user->id}}">
    <div role="alert" class="shadow w-1/4">
      <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
        Are you sure?
      </div>
      <div class="border flex justify-evenly border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700" >
        <form method="POST" action="{{route('user.delete', $user->id)}}" >
          @csrf
          @method('DELETE')
          <button class='hover:bg-red-700 hover:text-white text-black font-bold border py-2 px-4 rounded' type="submit">Yes</button>
        </form>
        <button class='border hover:bg-blue-700 hover:text-white text-black font-bold py-2 px-4 rounded' onclick="openClose('delete', '{{$user->id}}');">No</button>
    </div>
  
</div>
@endsection