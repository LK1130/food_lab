@extends('COMMON.layout.layout_admin')
@section('title','Admin List')

 @section('css') 
 <link rel="stylesheet" href="{{ URL::asset('css/adminList.css') }}"/>
 <link rel="stylesheet" href="{{ URL::asset('css/adminLayout.css') }}"/>
 <link rel="stylesheet" href="{{ URL::asset('css/commonAdmincss.css') }}"/>
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
    <a href="{{ url('adminLogin') }}"><button class="checked headerButton">{{__('messageZY.loginManage')}}</button></a>
    <a href="{{ url('coinrate') }}"><button class=" headerButton">{{__('messageZY.coinRate')}}</button></a>
    <a href="{{ url('sitemanager') }}"><button class=" headerButton">{{__('messageZY.siteManager')}}</button></a>
</div>
    {{-- Starts Table --}}
    <table class="table">
        <tr class="tableHeader">
            <th>{{__('messageZY.number')}}</th>
            <th>{{__('messageZY.username')}}</th>
            <th>{{__('messageZY.password')}}</th>
            <th>{{__('messageZY.role')}}</th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
        @php
        $count = 1;
        @endphp
        @forelse ($admins as $admin)
        
        <tr class="tableChile">
            
            <td class="tdBlack">{{ $count++ }}</td>
            <td class="tdBlack">{{$admin->ad_name}}</td>
            <td class="tdWhite">{{$admin->ad_password}}</td>
            <td class="tdWhite">{{$admin->ad_role}} </td>
            <td ><a href="{{ route('adminLogin.show',$admin->id)}}"><button  class="btn btn-secondary">{{__('messageZY.detail')}}</button></a></td>
            <td ><a href="{{ route('adminLogin.edit',$admin->id)}}"><button  class="btn btn-primary">{{__('messageZY.edit')}}</button></a></td>
            <td>
            <form action="{{ route('adminLogin.destroy',$admin->id)}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">{{__('messageZY.delete')}}</button>
            </form>
            </td>
        </tr>
        @empty
            <td>{{__('messageZY.noadmin')}} .</td>
            
        @endforelse
    </table>
    <div class="d-flex justify-content-center ">{{ $admins->links() }}</div>
    <a href="{{ route('adminLogin.create')}}"><button  class="btn addAdminButton">{{__('messageZY.addAdmin')}}</button></a>

@endsection