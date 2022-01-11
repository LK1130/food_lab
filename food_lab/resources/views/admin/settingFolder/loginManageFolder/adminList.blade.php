@extends('COMMON.layout.layout_admin')
@section('title','Admin List')

 @section('css') 
 <link rel="stylesheet" href="{{ URL::asset('css/adminList.css') }}"/>
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
    <a href="{{ url('adminLogin') }}"><button class="checked">{{__('messageZY.loginManage')}}</button></a>
    <a href="{{ url('coinrate') }}"><button>{{__('messageZY.coinRate')}}</button></a>
    <a href="{{ url('sitemanager') }}"><button>{{__('messageZY.siteManager')}}</button></a>
</div>
    {{-- Starts Table --}}
    <table class="table">
        <tr class="tableHeader">
            <th>No.</th>
            <th>Name</th>
            <th>Password</th>
            <th>Role</th>
            <th></th>
            <th></th>
        </tr>
        @php
        $count = 1;
        @endphp
        @forelse ($admins as $admin)
        <tr class="tableChile">
            <td>{{ $count++ }}</td>
            <td>{{$admin->ad_name}}</td>
            <td>{{$admin->ad_password}}</td>
            <td>{{$admin->ad_role}} </td>
            <td class="text-primary"><a href="{{ route('adminLogin.edit',$admin->id)}}">{{__('message.Edit')}}</a></td>
            <td>
            <form action="{{ route('adminLogin.destroy',$admin->id)}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" >{{__('message.Delete')}}</button>
        </form>
      </td>
          </tr>
        @empty
            <td>{{__('message.NoRoomHasLeft')}} .</td>
            
        @endforelse
    </table>
    

@endsection