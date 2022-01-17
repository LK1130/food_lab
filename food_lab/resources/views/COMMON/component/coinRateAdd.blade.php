        @csrf
    <fieldset class="border p-2">
        <legend>{{__('messageZY.changecoinrate')}}</legend>
        <div class="rowInput">
            <label for="coin">{{__('messageZY.coin')}}</label>
            <div class="input-group mb-3">
                <input type="text" id="coin" value="1" disabled>
                <img src="{{ url('img/dogeCoin.png') }}" class="input-group-text coinImg" id="basic-addon2">
            </div>
        </div>
        <div class="rowInput">
            <label for="kyat">{{__('messageZY.kyat')}}</label>
            <div class="input-group mb-3">
                <input type="number" id="kyat" name="kyat">
                @error('kyat')
                            <li class="text-danger ">{{ $message }}</li>
                            @enderror
            </div>
        </div>
        <div class="rowInput">
            <label for="note">{{__('messageZY.note')}}</label>
            <div class="input-group mb-3">
                <input type="text" id="note" name="note">
                @error('note')
                            <li class="text-danger ">{{ $message }}</li>
                            @enderror
            </div>
        </div>
        <button type="submit" class="change">{{__('messageZY.change')}}</button>
        <input type="reset" value="{{__('messageZY.reset')}}" class="reset">
        
    </fieldset>