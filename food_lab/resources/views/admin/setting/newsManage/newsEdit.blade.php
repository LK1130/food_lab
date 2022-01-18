@extends('COMMON.layout.layout_admin')
@section('title','News Add')

 @section('css') 

 <link rel="stylesheet" href="{{ URL::asset('css/adminLayout.css') }}"/>
 <link rel="stylesheet" href="{{ URL::asset('css/commonAdmincss.css') }}"/>
 <link rel="stylesheet" href="{{ URL::asset('css/adminAdd.css') }}"/>
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
    <a href="{{ url('adminLogin') }}"><button class="btn text-light  active btncust">{{__('messageZY.loginManage')}}</button></a>
    <a href="{{ url('coinrate') }}"><button class="btn text-light  active btncust">{{__('messageZY.coinRate')}}</button></a>
    <a href="{{ url('siteManage') }}"><button class="btn text-light  active btncust">{{__('messageZY.siteManager')}}</button></a>
</div>
    {{-- Starts Form --}}
    <div class="adminAddForm">
        <form action="{{ route('news.update',$news->id)}}" method="POST" >  
            @csrf
            @method('PUT')
                <p class="formHeader">{{__('messageZY.editnews')}} </p>
                <div>
                        <div class="form-group mt-3">
                            <label for="title">{{__('messageZY.title')}}</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ $news->title }}">
                            @error('title')
                            <li class="text-danger ">{{ $message }}</li>
                            @enderror
                        </div>
                        <div class="imgshow">
                            <p>{{__('messageZY.chosenimage')}}</p>
                            <img src="/storage/newsImage/{{$news->source}}" alt="">
                        </div>
                        <div class="form-group mt-3 column">
                            <label for="note">{{__('messageZY.category')}}</label>
                            <select  id="category"  class="selectcategory" >
                                @forelse ($categories as $category)
                                @if ($news->category==$category->id)
                                <option value="{{$category->id}}" selected>{{$category->category_name}}</option>
                                @else
                                <option value="{{$category->id}}" >{{$category->category_name}}</option>
                                
                                @endif
                                
                                @empty
                                <option>{{__('messageZY.nocategory')}} .</option>
                                @endforelse
                            </select>
                            <input type="number"  id="idhide" name="category" value="{{$category->id}}" >
                            @error('category')
                            <li class="text-danger ">{{ $message }}</li>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <label for="detail">{{__('messageZY.detail')}}</label>
                            <input type="text" class="form-control" id="detail" name="detail" value="{{ $news->detail }}">
                            @error('detail')
                            <li class="text-danger ">{{ $message }}</li>
                            @enderror
                        </div>
                        <div class="form-group ml-5">
                            <button type="submit" class="btn btn-success btn-lg m-4">{{__('messageZY.save')}}</button>
                            <button type="reset" class="btn btn-success btn-lg m-4">{{__('messageZY.reset')}}</button>
                        </div>
                </div>
        </form>
    </div>  

@endsection