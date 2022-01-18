@extends('COMMON.layout.layout_admin')
@section('title','Favourite Type Add')

 @section('css') 

 <link rel="stylesheet" href="{{ URL::asset('css/adminLayout.css') }}"/>
 <link rel="stylesheet" href="{{ URL::asset('css/commonAdmincss.css') }}"/>
 <link rel="stylesheet" href="{{ URL::asset('css/adminAdd.css') }}"/>
 @endsection

@section('script') 
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="{{ URL::asset('js/adminAdd.js') }}"></script>
@endsection
@section('body')
    {{-- Starts Header Buttons --}}
<div class="navBar">
    <a href="{{ url('adminLogin') }}"><button class="btn text-light  active btncust">{{__('messageZY.loginManage')}}</button></a>
    <a href="{{ url('coinrate') }}"><button class="btn text-light  active btncust">{{__('messageZY.coinRate')}}</button></a>
    <a href="{{ url('siteManage') }}"><button class="btn text-light  active btncust">{{__('messageZY.siteManager')}}</button></a>
</div>
    {{-- Starts Form --}}
    <div class="adminAddForm">
        <form action="{{ route('favtype.store')}}" method="POST" enctype="multipart/form-data">  
            @csrf
                <p class="formHeader">{{__('messageZY.addfavtype')}} </p>
                <div>
                        <div class="form-group">
                            <label for="favtype">{{__('messageZY.favtype')}}</label>
                            <input type="text" class="form-control" id="favtype" name="favourite_food">
                            @error('favourite_food')
                            <li class="text-danger ">{{ $message }}</li>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="note">{{__('messageZY.note')}}</label>
                            <input type="text" class="form-control" id="name"  name="note">
                            @error('note')
                            <li class="text-danger ">{{ $message }}</li>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button class="btn text-light  active btncust mt-5">{{__('messageZY.save')}}</button>
                        </div>
                </div>
        </form>
    </div>  

@endsection