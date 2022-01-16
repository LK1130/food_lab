@extends('COMMON.layout.layout_admin')
@section('title','Site Manage')

 @section('css') 
 <link rel="stylesheet" href="{{ URL::asset('css/siteManage.css') }}"/>
 <link rel="stylesheet" href="{{ URL::asset('css/adminLayout.css') }}"/>
 <link rel="stylesheet" href="{{ URL::asset('css/commonAdmincss.css') }}"/>
 @endsection

@section('script') 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

<script src="{{ URL::asset('js/siteManage.js') }}"></script>
@endsection
@section('body')
    {{-- Starts Header Buttons --}}
<div class="navBar">
    <a href="{{ url('adminLogin') }}"><button class=" headerButton">{{__('messageZY.loginManage')}}</button></a>
    <a href="{{ url('coinrate') }}"><button class=" headerButton">{{__('messageZY.coinRate')}}</button></a>
    <a href="{{ url('siteManage') }}"><button class="checked headerButton">{{__('messageZY.siteManager')}}</button></a>
</div>
    {{-- Starts Table --}}
    <select class="select" id="select">
        <option value="3">{{__('messageZY.newsmanage')}}</option>
        <option value="2">{{__('messageZY.appManage')}}</option>
        <option value="1">{{__('messageZY.siteManage')}}</option>
        
        
        
    </select>
    <div id="site">
        <h2>{{__('messageZY.siteedit')}}</h2>
        <form action="siteManage/store" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="rowInput">
                <label for="name">{{__('messageZY.sitename')}}</label>
                <div class="input-group mb-3">
                    <input type="text" id="name" name="name" value="{{ $siteInfo->site_name }}">
                    @error('name')
                    <li class="text-danger ">{{ $message }}</li>
                    @enderror
                </div>
                
            </div>
            <div class="rowInput">
                <label for="logo">{{__('messageZY.sitelogo')}}</label>
                <div class="showImageInitial">
                    <h2>{{__('messageZY.sitecurrentimg')}}</h2>
                    <img id="imgInitial" src="/storage/siteLogo/{{$siteInfo->site_logo}}" />
                </div>
                <div class="showImageChange">
                    <h2>{{__('messageZY.yourimage')}}</h2>
                    <img id="imageChange" src="" />
                </div>
                <div class="input-group mb-3">
                    <input type="file" id="logo" name="logo" value="{{$siteInfo->site_logo}}">
                </div>
            </div>
            <div class="rowInput">
                <label for="policy">{{__('messageZY.privacy')}}</label>
                <div class="input-group mb-3">
                    <input type="text" id="policy" name="policy" value="{{ $siteInfo->privacy_policy }}">
                                @error('policy')
                                <li class="text-danger ">{{ $message }}</li>
                                @enderror
                </div>
                
            </div>
            <div class="rowInput">
                <div class="checkbox">
                    <label for="maintenance">{{__('messageZY.maintenance')}}</label>
                    @if ($siteInfo->maintenance==0)
                    <input type="checkbox" id="maintenance" >
                    @else
                    <input type="checkbox" id="maintenance" checked>
                    @endif
                    <input type="text" id="mvalue" value="" name="maintenance">
                </div>
            </div>
            <button type="submit" class="save">{{__('messageZY.save')}}</button>
    </form>
    </div>
    <div id="news">
        <table class="newstable">
            
                <tr class="tableHeader ">
                    <td>{{__('messageZY.number')}}</td>
                    <td>{{__('messageZY.title')}}</td>
                    <td>{{__('messageZY.news')}}</td>
                    <td>{{__('messageZY.category')}}</td>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
                @php
                    $countnews = 1;
                    $category="";
                    @endphp
                @forelse ($news as $new)
            @if    ($new->category==1)@php $category="Food"; @endphp 
            @elseif($new->category==2)@php $category="Health"; @endphp 
            @elseif($new->category==3)@php $category="Promotion"; @endphp 
            @elseif($new->category==4)@php $category="Social"; @endphp 
            @elseif($new->category==5)@php $category="Other"; @endphp 
            @endif
            <tr class="tableChile">
                <td class="tdBlack">{{ $countnews++ }}</td>
                <td class="tdBlack">{{$new->title}}</td>
                <td class="tdBlack">{{$new->detail}}</td>
                <td class="tdBlack">{{$category}}</td>
                <td><input type="checkbox"></td>
                <td><a href="{{ route('news.show',$new->id)}}"><button  class="btn btn-primary btn-sm">{{__('messageZY.edit')}}</button></a></td>
                <td>
                <form action="{{ route('news.destroy',$new->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm delete" >{{__('messageZY.delete')}}</button>
                </form>
                </td>
            </tr>
            @empty
            <tr class="tableChile">
                <td>{{__('messageZY.notownship')}}</td>
                <td></td><td></td><td></td><td></td><td></td>
            </tr>
            @endforelse
                <div class="newsbutton1"><a href="{{ route('news.create')}}" ><button class="btn btn-success">{{__('messageZY.add')}}</button></a></div>
                
        </table>
        <div class="w-25 h-25 d-flex pages">{{ $news->links() }}</div>
    </div>
    <div id="app">
        <div class="tables">
            <div class="tablediv">
                <h2>{{__('messageZY.township')}}</h2>
                <table class="table">
                    <tr class="tableHeader">
                        <th>{{__('messageZY.number')}}</th>
                        <th>{{__('messageZY.township')}}</th>
                        <th>{{__('messageZY.deliveryprice')}}</th>
                        <th>{{__('messageZY.note')}}</th>
                        <th></th>
                        <th></th>
                    </tr>
                    @php
                    $count = 1;
                    @endphp
                    
            @forelse ($townships as $township)
            
            <tr class="tableChile">
                <td class="tdWhite">{{ $count++ }}</td>
                <td class="tdWhite">{{$township->township_name}}</td>
                <td class="tdWhite">{{$township->delivery_price}}</td>
                <td class="tdWhite">{{$township->note}} </td>
                <td><a href="{{ route('township.show',$township->id)}}"><button  class="btn btn-primary">{{__('messageZY.edit')}}</button></a></td>
                <td>
                <form action="{{ route('township.destroy',$township->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger delete" >{{__('messageZY.delete')}}</button>
                </form>
                </td>
            </tr>
            @empty
            <tr class="tableChile">
                <td>{{__('messageZY.notownship')}}</td>
                <td></td><td></td><td></td><td></td><td></td>
            </tr>
            @endforelse
            <tr class="tableChile">
                <td></td><td></td><td></td><td></td><td></td>
                <td><a href="{{ route('township.create')}}" ><button class="btn btn-success">{{__('messageZY.add')}}</button></a></td>
            </tr>
                </table>
            </div>
            <div class="tablediv">
                <h2>{{__('messageZY.payment')}}</h2>
            <table class="table">
                <tr class="tableHeader">
                    <th>{{__('messageZY.number')}}</th>
                    <th>{{__('messageZY.paymentname')}}</th>
                    <th>{{__('messageZY.accountname')}}</th>
                    <th>{{__('messageZY.note')}}</th>
                    <th></th><th></th>
                </tr>
                @php
                $countpayment = 1;
                @endphp
                @forelse ($payments as $payment)
        <tr class="tableChile">
            <td class="tdBlack">{{ $countpayment++ }}</td>
            <td class="tdBlack">{{$payment->payment_name}}</td>
            <td class="tdWhite">{{$payment->account_name}}</td>
            <td class="tdWhite">{{$payment->note}} </td>
            <td ><a href="{{ route('payment.show',$payment->id)}}"><button  class="btn btn-primary">{{__('messageZY.edit')}}</button></a></td>
            <td>
            <form action="{{ route('payment.destroy',$payment->id)}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger delete" >{{__('messageZY.delete')}}</button>
            </form>
            </td>
        </tr>
        @empty
        <tr class="tableChile">
            <td>{{__('messageZY.nopayment')}}</td>
            <td></td><td></td><td></td><td></td><td></td>
        </tr>
        @endforelse
        <tr class="tableChile">
            <td></td><td></td><td></td><td></td><td></td>
            <td><a href="{{ route('payment.create')}}" ><button class="btn btn-success">{{__('messageZY.add')}}</button></a></td>
        </tr>
            </table>
            </div>
            <div class="tablediv">
                <h2>{{__('messageZY.category')}}</h2>
            <table class="table">
                <tr class="tableHeader">
                    <th>{{__('messageZY.number')}}</th>
                    <th>{{__('messageZY.categoryname')}}</th>
                    <th>{{__('messageZY.note')}}</th>
                    <th></th><th></th><th></th>
                </tr>
                @php
                $countcategory = 1;
                @endphp
                @forelse ($categories as $category)
        <tr class="tableChile">
            <td class="tdBlack">{{ $countcategory++ }}</td>
            <td class="tdBlack">{{$category->category_name}}</td>
            <td class="tdWhite">{{$category->note}} </td>
            <td></td>
            
            <td ><a href="{{ route('category.show',$category->id)}}"><button  class="btn btn-primary">{{__('messageZY.edit')}}</button></a></td>
            <td>
            <form action="{{ route('category.destroy',$category->id)}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger delete" >{{__('messageZY.delete')}}</button>
            </form>
            </td>
        </tr>
        @empty
        <tr class="tableChile">
            <td>{{__('messageZY.nocategory')}}</td>
            <td></td><td></td><td></td><td></td><td></td>
        </tr>
        @endforelse
        <tr class="tableChile">
            <td></td><td></td><td></td><td></td><td></td>
            <td><a href="{{ route('category.create')}}" ><button class="btn btn-success">{{__('messageZY.add')}}</button></a></td>
        </tr>
            </table>
            </div>
            <div class="tablediv">
                <h2>{{__('messageZY.taste')}}</h2>
            <table class="table">
                <tr class="tableHeader">
                    <th>{{__('messageZY.number')}}</th>
                    <th>{{__('messageZY.taste')}}</th>
                    <th>{{__('messageZY.note')}}</th>
                    <th></th><th></th><th></th><th></th><th></th><th></th>
                </tr>
                @php
                $counttaste = 1;
                @endphp
                @forelse ($tastes as $taste)
        <tr class="tableChile">
            <td class="tdBlack">{{ $counttaste++ }}</td>
            <td class="tdBlack">{{$taste->taste}}</td>
            <td class="tdWhite">{{$taste->note}} </td>
            <td></td><td></td><td></td><td></td>
            <td ><a href="{{ route('taste.show',$taste->id)}}"><button  class="btn btn-primary">{{__('messageZY.edit')}}</button></a></td>
            <td>
            <form action="{{ route('taste.destroy',$taste->id)}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger delete" >{{__('messageZY.delete')}}</button>
            </form>
            </td>
        </tr>
        @empty
        <tr class="tableChile">
            <td>{{__('messageZY.nocategory')}}</td>
            <td></td><td></td><td></td><td></td><td></td>
        </tr>
        @endforelse
        <tr class="tableChile">
            <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
            <td><a href="{{ route('taste.create')}}" ><button class="btn btn-success">{{__('messageZY.add')}}</button></a></td>
        </tr>
            </table>
            </div>
            <div class="tablediv">
                <h2>{{__('messageZY.suggest')}}</h2>
            <table class="table">
                <tr class="tableHeader">
                    <th>{{__('messageZY.number')}}</th>
                    <th>{{__('messageZY.suggest')}}</th>
                    <th>{{__('messageZY.note')}}</th>
                    <th></th><th></th><th></th>
                </tr>
                @php
                $countsuggest = 1;
                @endphp
                @forelse ($suggests as $suggest)
        <tr class="tableChile">
            <td class="tdBlack">{{ $countsuggest++ }}</td>
            <td class="tdBlack">{{$suggest->suggest_type}}</td>
            <td class="tdWhite">{{$suggest->note}} </td>
            <td></td>
            <td ><a href="{{ route('suggest.show',$suggest->id)}}"><button  class="btn btn-primary">{{__('messageZY.edit')}}</button></a></td>
            <td>
            <form action="{{ route('suggest.destroy',$suggest->id)}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger delete" >{{__('messageZY.delete')}}</button>
            </form>
            </td>
        </tr>
        @empty
        <tr class="tableChile">
            <td>{{__('messageZY.nosuggest')}}</td>
            <td></td><td></td><td></td><td></td><td></td>
        </tr>
        @endforelse
        <tr class="tableChile">
            <td></td><td></td><td></td><td></td><td></td>
            <td><a href="{{ route('suggest.create')}}" ><button class="btn btn-success">{{__('messageZY.add')}}</button></a></td>
        </tr>
            </table>
            </div>
            <div class="tablediv">
                <h2>{{__('messageZY.favfood')}}</h2>
            <table class="table">
                <tr class="tableHeader">
                    <th>{{__('messageZY.number')}}</th>
                    <th>{{__('messageZY.favfood')}}</th>
                    <th>{{__('messageZY.note')}}</th>
                    <th></th><th></th><th></th>
                </tr>
                @php
                $countfav = 1;
                @endphp
                @forelse ($favtypes as $favtype)
        <tr class="tableChile">
            <td class="tdBlack">{{ $countfav++ }}</td>
            <td class="tdBlack">{{$favtype->favourite_food}}</td>
            <td class="tdWhite">{{$favtype->note}} </td>
            <td></td>
            <td ><a href="{{ route('favtype.show',$favtype->id)}}"><button  class="btn btn-primary">{{__('messageZY.edit')}}</button></a></td>
            <td>
            <form action="{{ route('favtype.destroy',$favtype->id)}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger delete" >{{__('messageZY.delete')}}</button>
            </form>
            </td>
        </tr>
        @empty
        <tr class="tableChile">
            <td>{{__('messageZY.nofav')}}</td>
            <td></td><td></td><td></td><td></td><td></td>
        </tr>
        @endforelse
        <tr class="tableChile">
            <td></td><td></td><td></td><td></td><td></td>
            <td><a href="{{ route('favtype.create')}}" ><button class="btn btn-success">{{__('messageZY.add')}}</button></a></td>
        </tr>
            </table>
            </div>
            <div class="tablediv">
                <h2>{{__('messageZY.orderstatus')}}</h2>
            <table class="table">
                <tr class="tableHeader">
                    <th>{{__('messageZY.number')}}</th>
                    <th>{{__('messageZY.status')}}</th>
                    <th>{{__('messageZY.note')}}</th>
                    <th></th><th></th><th></th>
                </tr>
                @php
                $countorder = 1;
                @endphp
                @forelse ($orderstatus as $orderstatusa)
        <tr class="tableChile">
            <td class="tdBlack">{{ $countorder++ }}</td>
            <td class="tdBlack">{{$orderstatusa->status}}</td>
            <td class="tdWhite">{{$orderstatusa->note}} </td>
            <td></td>
            <td ><a href="{{ route('orderstatus.show',$orderstatusa->id)}}"><button  class="btn btn-primary">{{__('messageZY.edit')}}</button></a></td>
            <td>
            <form action="{{ route('orderstatus.destroy',$orderstatusa->id)}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger delete" >{{__('messageZY.delete')}}</button>
            </form>
            </td>
        </tr>
        @empty
        <tr class="tableChile">
            <td>{{__('messageZY.noorder')}}</td>
            <td></td><td></td><td></td><td></td><td></td>
        </tr>
        @endforelse
        <tr class="tableChile">
            <td></td><td></td><td></td><td></td><td></td>
            <td><a href="{{ route('orderstatus.create')}}" ><button class="btn btn-success">{{__('messageZY.add')}}</button></a></td>
        </tr>
            </table>
            </div>
            <div class="tablediv">
                <h2>{{__('messageZY.decision')}}                                                                         </h2>
            <table class="table">
                <tr class="tableHeader">
                    <th>{{__('messageZY.number')}}</th>
                    <th>{{__('messageZY.decision')}}</th>
                    <th>{{__('messageZY.note')}}</th>
                    <th></th><th></th><th></th>
                </tr>
                @php
                $countdecision = 1;
                @endphp
                @forelse ($decisions as $decision)
        <tr class="tableChile">
            <td class="tdBlack">{{ $countdecision++ }}</td>
            <td class="tdBlack">{{$decision->status}}</td>
            <td class="tdWhite">{{$decision->note}} </td>
            <td></td>
            <td ><a href="{{ route('decision.show',$decision->id)}}"><button  class="btn btn-primary">{{__('messageZY.edit')}}</button></a></td>
            <td>
            <form action="{{ route('decision.destroy',$decision->id)}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger delete" >{{__('messageZY.delete')}}</button>
            </form>
            </td>
        </tr>
        @empty
        <tr class="tableChile">
            <td>{{__('messageZY.nodecision')}}</td>
            <td></td><td></td><td></td><td></td><td></td>
        </tr>
        @endforelse
        <tr class="tableChile">
            <td></td><td></td><td></td><td></td><td></td>
            <td><a href="{{ route('decision.create')}}" ><button class="btn btn-success">{{__('messageZY.add')}}</button></a></td>
        </tr>
            </table>
            </div>
        </div>
        
    </div>
@endsection