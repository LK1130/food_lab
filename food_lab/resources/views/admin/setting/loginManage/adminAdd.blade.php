@extends('COMMON.layout.layout_admin')
@section('title','Admin Add')

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
        <form action="{{ route('adminLogin.store')}}" method="POST" enctype="multipart/form-data">  
            @csrf
                <p class="formHeader">{{__('messageZY.addAdmin')}} </p>
                <div>
                        <div class="form-group">
                            <label for="username">{{__('messageZY.username')}}</label>
                            <input type="text" class="form-control" id="username" name="username">
                            @error('username')
                            <li class="text-danger ">{{ $message }}</li>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">{{__('messageZY.password')}}</label>
                            <ion-icon name="eye-off-outline" id="icon"></ion-icon>
                            <input type="password" class="form-control" id="password" name="password">
                            
                            
                            @error('password')
                            <li class="text-danger ">{{ $message }}</li>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="role">{{__('messageZY.role')}}</label>
                            <select class="form-control" id="role" name="role">
                            <option>{{__('messageZY.sa')}}</option>
                            <option>{{__('messageZY.ad')}}</option>
                            <option>{{__('messageZY.ka')}}</option>
                            <option>{{__('messageZY.dl')}}</option>
                            </select>
                            @error('role')
                            <li class="text-danger ">{{ $message }}</li>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="addadmin">{{__('messageZY.addAdmin')}}</button>
                            <input type="reset" value="{{__('messageZY.reset')}}" class="reset">
                            
                        </div>
                </div>
        </form>
        <a href="{{ url('adminLogin') }}"><button class="checked  " id="back">{{__('messageZY.back')}}</button></a>
    </div>  

@endsection