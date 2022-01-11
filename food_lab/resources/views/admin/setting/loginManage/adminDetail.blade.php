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
<script src="{{ URL::asset('js/adminDetail.js') }}"></script>
@endsection
@section('body')
    {{-- Starts Header Buttons --}}
<div class="navBar">
    <a href="{{ url('adminLogin') }}"><button class="checked headerButton">{{__('messageZY.loginManage')}}</button></a>
    <a href="{{ url('coinrate') }}"><button class=" headerButton">{{__('messageZY.coinRate')}}</button></a>
    <a href="{{ url('sitemanager') }}"><button class=" headerButton">{{__('messageZY.siteManager')}}</button></a>
</div>
    {{-- Starts Show Feild --}}
    
        <fieldset>
            <legend>{{__('messageZY.admindetail')}}</legend>
            <label>{{__('messageZY.username')}} : {{ $admins->ad_name }}</label><br>
            <label>{{__('messageZY.password')}} : {{ $admins->ad_password}}</label><br>
            <label>{{__('messageZY.role')}} : {{ $admins->ad_role }}</label><br>
            <label><a href="{{ route('adminLogin.edit',$admins->id)}}"><button  class="btn btn-primary">{{__('messageZY.edit')}}</button></a></label>
            <label><form action="{{ route('adminLogin.destroy',$admins->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">{{__('messageZY.delete')}}</button>
                </form></label>
        </fieldset>
    </table>
    

@endsection