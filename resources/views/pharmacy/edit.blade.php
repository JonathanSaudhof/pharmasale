@extends('layouts.app')

@section('content')
<div class="container items-center justify-center">
  <div class="col-10 sticky flex justify-between items-center rounded mx-auto mb-6 px-6 py-3 shadow-sm bg-gray-50 border border-gray-500"><h1>💊 Update new pharmacy</h1>
    <a href="{{route('pharmacy.index')}}"><button class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded">< Back</button></a>
  </div>
  <form class="m-auto flex flex-column items-start shadow-sm col-10 p-6 bg-white rounded" method="POST" action="{{route('pharmacy.store')}}" id="form">
    @csrf
    <label class="inline py-2 font-bold text-base">Pharmacy name:</label>
    <input class="border rounded py-2 px-3 mb-2 w-full" type="text" name="name" value="{{$pharmacy->name}}" placeholder="Pharmacy Jon Doe" id="pharmacy-name"/>
    <hr class="my-3"/>
    <span class="text-xl"> Adress: </span>
    <div class="street_container w-full flex justify-between">
      <div class="street-name-wrapper w-3/4 pr-2">
        <label class="py-2 font-bold text-base">Street:</label>
        <input class="w-full border rounded py-2 px-3 mb-2" type="text" name="adress_street" value="{{$pharmacy->adress_street}}" placeholder="Frankfurter Allee" id="pharmacy-street"/>
      </div>
      <div class="building-number-wrapperpl-2 w-1/4">
        <label class="py-2 font-bold text-base">Building Number:</label>
        <input class="w-full border rounded py-2 px-3 mb-2" type="text" name="adress_building_number" value="{{$pharmacy->adress_building_number}}"placeholder="100" id="pharmacy-building-number"/>
      </div>
   </div>
   <div class="city_container w-full flex">
    <div class="street-name-wrapper  inline w-1/4 pr-2">
      <label class="py-2 font-bold text-base">Zip code:</label>
      <input class="block w-full border rounded py-2 px-3 mb-2" type="text" name="adress_zip_code"  value="{{$pharmacy->adress_zip_code}}" placeholder="99999" id="pharmacy-zip-code"/>
    </div>
    <div class="building-number-wrapper  inline  pl-2 w-3/4">
      <label class="py-2 font-bold text-base">City:</label>
      <input class="block w-full border rounded py-2 px-3 mb-2" type="text" name="adress_city" value="{{$pharmacy->adress_city}}" placeholder="Berlin" id="pharmacy-city"/>
    </div>
   
    </div>
  <hr class="my-3"/>
  <div class="contact-container w-full">
    <div class="bg-white w-full my-5 hover:bg-gray-100 text-gray-800 font-semibold py-4 px-4 border border-gray-400 rounded collapsed" >
      <div class="border bg-blue-500 text-white text-bold rounded py-2 px-4 contact-header cursor-pointer inline" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
        Edit contact
      </div>
      
      <div id="collapseTwo" class="contact-body collapse mt-3" aria-labelledby="headingTwo" data-parent="#form">
        <label class="py-2 font-bold text-base" for="contact_name">Name:</label>
        <input class="block w-full border rounded py-2 px-3 mb-2" type="text" name="contact_name" value="{{$pharmacy->contact_name}}" placeholder="Jon Doe" id="contact_name"/>
        <label class="py-2 font-bold text-base" for="contact_name">Email:</label>
        <input class="block w-full border rounded py-2 px-3 mb-2" type="text" name="contact_email" value="{{$pharmacy->contact_email}}" placeholder="Jon Doe" id="contact_email"/>
        <label class="py-2 font-bold text-base" for="contact_phone">Phone:</label>
        <input class="block w-full border rounded py-2 px-3 mb-2" type="text" name="contact_phone" value="{{$pharmacy->contact_phone}}" placeholder="017631215960" id="contact_phone"/>
      </div>
    </div>
    
  </div>
  <div class="flex py-2">
    <button class="bg-blue-500 hover:bg-blue-300 text-gray-800 font-bold text-white py-2 px-4 border border-gray-400 rounded mr-2" type='submit'>Update</button>
    <a  href="{{route('pharmacy.index')}}"><button class="bg-gray-100 hover:bg-gray-300 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded"> Cancel</button> </a>
  </div>
</form>
</div>
@endsection