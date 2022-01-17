@extends('COMMON.layout.layout_admin')
@section('title','Coin Rate')

 @section('css') 

 <link rel="stylesheet" href="{{ URL::asset('css/adminLayout.css') }}"/>
 <link rel="stylesheet" href="{{ URL::asset('css/commonAdmincss.css') }}"/>
 <link rel="stylesheet" href="{{ URL::asset('css/coinRate.css') }}"/>
 @endsection

@section('script') 
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="{{ URL::asset('js/coinrate.js') }}"></script>
@endsection
@section('body')
    {{-- Starts Header Buttons --}}
<div class="navBar">
    <a href="{{ url('adminLogin') }}"><button class="btn text-light  active btncust">{{__('messageZY.loginManage')}}</button></a>
    <a href="{{ url('coinrate') }}"><button class="btn text-light  active btncust">{{__('messageZY.coinRate')}}</button></a>
    <a href="{{ url('siteManage') }}"><button class="btn text-light  active btncust">{{__('messageZY.siteManager')}}</button></a>
</div>
    {{-- Starts Table --}}

    <table class="table">
        <tr class="tableHeader">
            <td>{{__('messageZY.number')}}</td>
            <td>{{__('messageZY.username')}}</td>
            <td>{{__('messageZY.kyat')}}</td>
            <td>{{__('messageZY.date')}}</td>
            <td>{{__('messageZY.note')}}</td>
        </tr>
        @php
        $count = 1;
        @endphp
        @forelse ($admins as $admin)
        <tr class="tableChile">
            {{$rate = number_format($admin->new_rate) }}
            <td class="tdBlack">{{ $count++ }}</td>
            <td class="tdBlack">{{$admin->change_by}}</td>
            <td class="tdWhite">{{$rate}}</td>
            <td class="tdWhite">{{$admin->created_at}} </td>
            <td class="tdWhite">{{$admin->change_note}} </td>
        </tr>
        @empty
            <td>{{__('messageZY.noHistory')}} .</td>
            
        @endforelse
    </table>
    <div class="d-flex justify-content-center ">{{ $admins->links() }}</div>
    <a href="{{ route('coinrate.create')}}"><button  class="addAdminButton">{{__('messageZY.change')}}</button></a>
@endsection