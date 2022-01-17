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
            <td class="tdBlack">{{ $count++ }}</td>
            <td class="tdBlack">{{$admin->ad_name}}</td>
            <td class="tdWhite">{{ number_format($admin->old_rate)}} => {{ number_format($admin->new_rate)}}</td>
            <td class="tdWhite">{{$admin->created_at}} </td>
            <td class="tdWhite">{{$admin->change_note}} </td>
        </tr>
        @empty
            <td>{{__('messageZY.noHistory')}} .</td>
            
        @endforelse
    </table>
    <div class="d-flex justify-content-center ">{{ $admins->links() }}</div>
