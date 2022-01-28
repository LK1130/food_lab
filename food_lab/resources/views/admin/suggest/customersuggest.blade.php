@extends('COMMON.layout.layout_admin')

@section('title')
    Customer Suggest
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ URL::asset('css/adminDashbord.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/adminnoties.css') }}">
@endsection

@section('script')
@endsection
@section('body')
    <div class="col-md-10">
        {{-- Top Noti Start --}}
        <div class="d-flex justify-content-end bd-highlight mx-5 my-4">
            <div class="back">
                <a href="dashboard"><button class="btn btncust1 text-light">Back</button></a>
            </div>

            {{-- Suggest --}}
            <a href="customerSuggest">
                <button type="button" class="btn btn-lg btn-outline-dark position-relative mx-3 fs-4">
                    <i class="bi bi-bell"></i>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        {{ $sugcount }}
                    </span>
                </button></a>
            {{-- Contact --}}
            <a href="customerContact">
                <button type="button" class="btn btn-lg lg btn-outline-dark position-relative mx-3 fs-4">
                    <i class="bi bi-book"></i>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        {{ $concount }}
                    </span>
                </button></a>
            {{-- Report --}}
            <a href="customerReport">
                <button type="button" class="btn btn-lg lg btn-outline-danger position-relative mx-3 fs-4">
                    </i><i class="bi bi-exclamation-triangle"></i>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        13
                    </span>
                </button></a>
        </div>
        {{-- Top Noti End --}}

        <div class="status text title fw-bold mb-4">Customer Suggest</div>
        <div class="row">
            <div class="col-md-12">
                <table class="table boxshad me-5">
                    <thead>
                        <tr class="tableheader tablerows">
                            <th scope="col">No.</th>
                            <th scope="col">Customer ID</th>
                            <th scope="col">Suggest Type</th>
                            <th scope="col">Message</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($suggest as $sug)
                            <tr class="tablecolor1 text-light tablerows">
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $sug->customerID }}</td>
                                <td>{{ $sug->suggest_type }}</td>
                                <td>{{ $sug->message }}</td>
                                <td>
                                    @if ($sug->reply == null)
                                        <a href="suggestreplies?id={{ $sug->ID }}">
                                            <button class="btn btn-primary">Reply</button></a>
                                </td>
                            @else
                                Done !
                        @endif

                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
