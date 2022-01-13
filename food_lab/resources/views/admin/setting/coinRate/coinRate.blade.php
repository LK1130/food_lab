@extends('COMMON.layout.layout_admin')
@section('title','Coin Rate')

 @section('css') 
 <link rel="stylesheet" href="{{ URL::asset('css/coinRate.css') }}"/>
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
    <a href="{{ url('adminLogin') }}"><button class=" headerButton">{{__('messageZY.loginManage')}}</button></a>
    <a href="{{ url('coinrate') }}"><button  class="checked headerButton">{{__('messageZY.coinRate')}}</button></a>
    <a href="{{ url('sitemanager') }}"><button  class=" headerButton">{{__('messageZY.siteManager')}}</button></a>
</div>
    {{-- Starts Table --}}

    <table class="table">
        <tr class="tableHeader">
            <th>{{__('messageZY.number')}}</th>
            <th>{{__('messageZY.username')}}</th>
            <th>{{__('messageZY.kyat')}}</th>
            <th>{{__('messageZY.date')}}</th>
            <th>{{__('messageZY.note')}}</th>
        </tr>
        @php
        $count = 1;
        @endphp
        @forelse ($admins as $admin)
        
        <tr class="tableChile">
            
            <td class="tdBlack">{{ $count++ }}</td>
            <td class="tdBlack">{{$admin->change_by}}</td>
            <td class="tdWhite">{{$admin->new_rate}}</td>
            <td class="tdWhite">{{$admin->created_at}} </td>
            <td class="tdWhite">{{$admin->change_note}} </td>
        </tr>
        @empty
            <td>{{__('messageZY.noHistory')}} .</td>
            
        @endforelse
    </table>
    <div class="d-flex justify-content-center ">{{ $admins->links() }}</div>
    <a href="{{ route('coinrate.create')}}"><button  class="btn addAdminButton">{{__('messageZY.change')}}</button></a>
@endsection