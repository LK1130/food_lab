@extends('COMMON.layout.layout_admin')
@section('title','Admin Add')

 @section('css') 
 <link rel="stylesheet" href="{{ URL::asset('css/settingLoginManage/adminAdd.css') }}"/>
 @endsection

@section('script') 
<script src="{{ URL::asset('js/settingLoginManage/adminAdd.js') }}"></script>
@endsection
@section('body')
    {{-- Starts Header Buttons --}}
<div class="navBar">
    <button class="checked">{{__('messageZY.loginManage')}}</button>
    <button>{{__('messageZY.coinRate')}}</button>
    <button>{{__('messageZY.siteManager')}}</button>
</div>
{{-- Button for mobile --}}
<div class="moblieNav" id="mobileNav">
    <ion-icon name="list-outline"></ion-icon>
</div>
{{-- Nav bar for mobile view --}}
<div class="mobileNavShow">
    <ion-icon name="close-outline" id="cross" class="cross"></ion-icon>
    <button class="checked">{{__('messageZY.loginManage')}}</button>
    <button>{{__('messageZY.coinRate')}}</button>
    <button>{{__('messageZY.siteManager')}}</button>
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
                        </div>
                        <div class="form-group">
                            <label for="password">{{__('messageZY.passsword')}}</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        <div class="form-group">
                            <label for="role">{{__('messageZY.role')}}</label>
                            <select class="form-control" id="role" name="role">
                            <option>{{__('messageZY.sa')}}</option>
                            <option>{{__('messageZY.ad')}}</option>
                            <option>{{__('messageZY.ka')}}</option>
                            <option>{{__('messageZY.dl')}}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="addadmin">Add Admin</button>
                        </div>
                </div>
        </form>
    </div>

@endsection