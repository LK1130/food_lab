@extends('COMMON.layout.layout_admin')
@section('title','Coin List')

 @section('css') 
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
 <link rel="stylesheet" href="{{ URL::asset('css/adminCoinList.css') }}"/>
 @endsection

@section('script') 

@endsection
@section('body')
    <div class="col-md-10">
        <div class="mt-4">
            <a href="" class="me-5"><button
                    class="btn text-light  active btncust">{{ __('messageLK.Listing') }}</button></a>
            <a href="" class="me-5"><button
                    class="btn text-light  inactive btncust">{{ __('messageLK.AddCoin') }}</button></a>
            <a href="" class="me-5"><button
                    class="btn text-light  inactive btncust">{{ __('messageLK.CoinRate') }}</button></a>
            <a href="" class="me-5"><button
                    class="btn text-light  inactive btncust">{{ __('messageLK.CoinHistory') }}</button></a>
        </div>
        <div class="row">
            <div class="col">
                <div class="fw-bold mb-4 mt-4 title">{{ __('messageLK.Request') }}</div>
                <table class="table me-5 tbcust">
                    <thead>
                        <tr class="tableth">
                            <th scope="col" class="no" >No.</th>
                            <th scope="col">Customer ID</th>
                            <th scope="col">Customer Name</th>
                            <th scope="col">Coin</th>
                            <th scope="col">Date Time</th>
                            <th scope="col">Decision</th>
                            <th scope="col"></th>
                            
                        </tr>
                    </thead>
                    <tbody class="scroll">
                        @forelse ($request as $item)
                        <tr class="text-light tabletd">
                            <th scope="col" class="no">{{ $loop->index+1 }}</th>
                            <th scope="col">{{ $item->customerID }}</th>
                            <th scope="col">{{ $item->nickname }}</th>
                            <th scope="col">{{ $item->request_coin }}</th>
                            <th scope="col">{{ $item->request_datetime }}</th>
                            <th scope="col">{{ $item->ad_name }}</th>                            <td>
                                <a href=""><button class="btn btn-outline-light"><i class="bi bi-arrow-right"></i></button></a>
                            </td>
                            </tr> 
                        @empty
                            There is no data.
                        @endforelse
                    </tbody>
                </table>
            </div>
                        <div class="col">
                <div class="fw-bold mb-4 mt-4 title">{{ __('messageLK.Approve') }}</div>
                <table class="table me-5 tbcust">
                    <thead>
                        <tr class="tableth">
                            <th scope="col" class="no" >No.</th>
                            <th scope="col">Customer ID</th>
                            <th scope="col">Customer Name</th>
                            <th scope="col">Coin</th>
                            <th scope="col">Date Time</th>
                            <th scope="col">Decision</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody class="scroll">
                        @forelse ($approve as $item)
                        <tr class="text-light tabletd">
                            <th scope="col" class="no" >{{ $loop->index+1 }}</th>
                            <th scope="col">{{ $item->customerID }}</th>
                            <th scope="col">{{ $item->nickname }}</th>
                            <th scope="col">{{ $item->request_coin }}</th>
                            <th scope="col">{{ $item->request_datetime }}</th>
                            <th scope="col">{{ $item->ad_name }}</th>  
                            <td>
                                <a href=""><button class="btn btn-outline-light"><i class="bi bi-arrow-right"></i></button></a>
                            </td>
                            </tr> 
                        @empty
                            There is no data.
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
                <div class="row">
            <div class="col">
                <div class="fw-bold mb-4 mt-4 title">{{ __('messageLK.Waiting') }}</div>
                <table class="table me-5 tbcust">
                    <thead>
                        <tr class="tableth">
                            <th scope="col" class="no" >No.</th>
                            <th scope="col">Customer ID</th>
                            <th scope="col">Customer Name</th>
                            <th scope="col">Coin</th>
                            <th scope="col">Date Time</th>
                            <th scope="col">Decision</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody class="scroll">
                        @forelse ($waiting as $item)
                        <tr class="text-light tabletd">
                            <th scope="col" class="no">{{ $loop->index+1 }}</th>
                            <th scope="col">{{ $item->customerID }}</th>
                            <th scope="col">{{ $item->nickname }}</th>
                            <th scope="col">{{ $item->request_coin }}</th>
                            <th scope="col">{{ $item->request_datetime }}</th>
                            <th scope="col">{{ $item->ad_name }}</th>                              <td>
                                <a href=""><button class="btn btn-outline-light"><i class="bi bi-arrow-right"></i></button></a>
                            </td>
                            </tr> 
                        @empty
                            There is no data.
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="col">
                <div class="fw-bold mb-4 mt-4 title">{{ __('messageLK.Reject') }}</div>
                <table class="table me-5 tbcust">
                    <thead>
                        <tr class="tableth">
                            <th scope="col" class="no" >No.</th>
                            <th scope="col">Customer ID</th>
                            <th scope="col">Customer Name</th>
                            <th scope="col">Coin</th>
                            <th scope="col">Date Time</th>
                            <th scope="col">Decision</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody class="scroll">
                        @forelse ($reject as $item)
                        <tr class="text-light tabletd">
                            <th scope="col" class="no">{{ $loop->index+1 }}</th>
                            <th scope="col">{{ $item->customerID }}</th>
                            <th scope="col">{{ $item->nickname }}</th>
                            <th scope="col">{{ $item->request_coin }}</th>
                            <th scope="col">{{ $item->request_datetime }}</th>
                            <th scope="col">{{ $item->ad_name }}</th>                              <td>
                                <a href=""><button class="btn btn-outline-light"><i class="bi bi-arrow-right"></i></button></a>
                            </td>
                            </tr> 
                        @empty
                            There is no data.
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        
    </div>
@endsection
