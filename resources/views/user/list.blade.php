@extends('layouts.app')

@section('content')
<div class="container shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
  <table class="min-w-full divide-y divide-gray-200">
    <thead>
      <tr>
        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Id</th>
        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Name</th>
        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">E-Mail</th>
        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Role</th>
        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Register Date</th>
      </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
    @foreach ($users as $user)
    @if($user->id !== Auth::user()->id)
    <tr>
        <td class="px-6 py-4 whitespace-no-wrap">
          <a href="{{route('user.show', $user->id)}}">{{$user->id}}</a>
        </td>
        <td class="px-6 py-4 whitespace-no-wrap">
          <a href="{{route('user.show', $user->id)}}">{{$user->name}}</a>
        </td>
        <td class="px-6 py-4 whitespace-no-wrap">
          {{$user->email}}
        </td>
        <td class="px-6 py-4 whitespace-no-wrap">
          {{$user->role}}
        </td>
        <td class="px-6 py-4 whitespace-no-wrap">
          {{$user->created_at}}
        </td>
        <td class="px-6 py-4 whitespace-no-wrap">
          <a href="{{route('user.edit', $user->id)}}">✏️</a>
        </td>
        <td class="px-6 py-4 whitespace-no-wrap">
          <a href="{{route('user.delete', $user->id)}}">🗑</a>
        </td>
      </tr>
      @endif
    </tbody>
  @endforeach
  </table>
  
  
</div>
@endsection