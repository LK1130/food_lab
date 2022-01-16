@extends('COMMON.layout.layout_admin')
@section('title','News Add')

 @section('css') 
 <link rel="stylesheet" href="{{ URL::asset('css/adminAdd.css') }}"/>
 <link rel="stylesheet" href="{{ URL::asset('css/adminLayout.css') }}"/>
 <link rel="stylesheet" href="{{ URL::asset('css/commonAdmincss.css') }}"/>
 @endsection

@section('script') 
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="{{ URL::asset('js/newsAdd.js') }}"></script>
@endsection
@section('body')
    {{-- Starts Header Buttons --}}
<div class="navBar">
    <a href="{{ url('adminLogin') }}"><button class="headerButton">{{__('messageZY.loginManage')}}</button></a>
    <a href="{{ url('coinrate') }}"><button  class="headerButton">{{__('messageZY.coinRate')}}</button></a>
    <a href="{{ url('siteManage') }}"><button  class="checked headerButton">{{__('messageZY.siteManager')}}</button></a>
</div>
    {{-- Starts Form --}}
    <div class="adminAddForm">
        <div id="back2"><a href="{{ url('siteManage') }}" ><button class="btn btn-lg buttonBack">{{__('messageZY.back')}}</button></a></div>
        <form action="{{ route('news.store')}}" method="POST" enctype="multipart/form-data">  
            @csrf
                <p class="formHeader">{{__('messageZY.addnews')}}</p>
                <div>
                        <div class="form-group mt-3">
                            <label for="title">{{__('messageZY.title')}}</label>
                            <input type="text" class="form-control" id="title" name="title">
                            @error('title')
                            <li class="text-danger ">{{ $message }}</li>
                            @enderror
                        </div>
                        <div class="form-group mt-3 column">
                            <label for="note">{{__('messageZY.category')}}</label>
                            <select  id="category"  class="selectcategory">
                                @forelse ($categories as $category)
                                <option value="{{$category->id}}" >{{$category->category_name}}</option>
                                @empty
                                <option>{{__('messageZY.nocategory')}} .</option>
                                @endforelse
                            </select>
                            <input type="number"  id="idhide" name="category">
                            @error('category')
                            <li class="text-danger ">{{ $message }}</li>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <input type="file" name="source">
                        </div>
                        <div class="form-group mt-3">
                            <label for="detail">{{__('messageZY.detail')}}</label>
                            <input type="text" class="form-control" id="detail" name="detail">
                            @error('detail')
                            <li class="text-danger ">{{ $message }}</li>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-lg m-4">{{__('messageZY.save')}}</button>
                        </div>
                </div>
        </form>
    </div>  

@endsection