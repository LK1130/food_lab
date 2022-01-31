@extends('COMMON.layout.layout_admin')
@section('title', 'Site Manage')

@section('css')

    <link rel="stylesheet" href="{{ URL::asset('css/adminLayout.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('css/commonAdmincss.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('css/siteManage.css') }}" />
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
        <a href="{{ url('adminLogin') }}"><button
                class="btn text-light   btncust">{{ __('messageZY.loginManage') }}</button></a>
        <a href="{{ url('coinrate') }}"><button
                class="btn text-light   btncust">{{ __('messageZY.coinRate') }}</button></a>
        <a href="{{ url('siteManage') }}"><button
                class="btn text-light  active btncust">{{ __('messageZY.siteManager') }}</button></a>
    </div>
    {{-- Starts Table --}}
    <select class="select" id="select">
        <option value="siteManage">{{ __('messageZY.siteManage') }}</option>
        <option value="app">{{ __('messageZY.appManage') }}</option>
        <option value="news" selected>{{ __('messageZY.newsmanage') }}</option>
    </select>
    <div id="news">
        <table class="newstable">

            <tr class="tableHeader ">
                <td>{{ __('messageZY.number') }}</td>
                <td>{{ __('messageZY.title') }}</td>
                <td>{{ __('messageZY.news') }}</td>
                <td>{{ __('messageZY.category') }}</td>
                <th></th>
                <th></th>
                <th></th>
            </tr>
            @php
                $countnews = 1;
            @endphp
            @forelse ($news as $new)
                <tr class="tableChile">
                    <td class="tdBlack">{{ $countnews++ }}</td>
                    <td class="tdBlack">{{ $new->title }}</td>
                    <td class="tdBlack">{{ $new->detail }}</td>
                    <td class="tdBlack">{{ $new->category_name }}</td>
                    <td><input type="checkbox"></td>
                    <td><a href="{{ route('news.show', $new->id) }}"><button
                                class="btn btn-primary btn-sm">{{ __('messageZY.edit') }}</button></a></td>
                    <td>
                        <form action="{{ route('news.destroy', $new->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="btn btn-danger btn-sm delete">{{ __('messageZY.delete') }}</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr class="tableChile">
                    <td>{{ __('messageZY.notownship') }}</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            @endforelse
            <div class="newsbutton1"><a href="{{ route('news.create') }}"><button
                        class="btn btn-success">{{ __('messageZY.add') }}</button></a></div>

        </table>
        <div class="w-25 h-25 d-flex pages">{{ $news->links() }}</div>
    </div>

@endsection
