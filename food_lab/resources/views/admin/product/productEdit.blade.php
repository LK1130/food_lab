@extends('COMMON.layout.layout_admin')

@section('title', 'Product Edit')


@section('css')
    <link rel="stylesheet" href="{{ URL::asset('css/adminLayout.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('css/commonAdmincss.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('css/adminProduct.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('css/adminProductTagInput.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection



@section('script')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="{{ URL::asset('js/adminProductTagsInput.js') }}"></script>
    <script src="{{ URL::asset('js/adminTypeAhead.js') }}"></script>

@endsection

@section('body')
    <div class="col-md-10">
        {{-- Product Form --}}
        <form action="{{ route('product.update',$products->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mt-4 mb-4 labels">Products Edit Form</div>


            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-7 col-sm-12">

                        <div class="mt-2  image-container">
                            <div class="row">


                                @foreach ($evd as $item)
                                    <div class="col-md-6 col-sm-10">

                                        <div class="mx-5 mt-4 p-4 blocks">

                                            <img id="img1" class="img-thumbnail" src="{{ $item->path }}" alt="">


                                        </div>

                                        <div class="form-group mx-4 mt-2 mb-2">
                                            <input type="file" name="photo1" id="photoone" class="form-control files">
                                        </div>
                                    </div>

                                @endforeach

                            </div>
                        </div>
                    </div>
                    {{-- Product Form --}}
                    <div class="mt-2 col-md-5 col-sm-10">
                        <div class="form-group">


                            <label for="pname" class="form-label titles">Product Name</label>
                            <input type="text" name="pname" id="pname" class="form-control inputs"
                                value="{{ $products->product_name }}" required>
                            @error('pname')
                                <li class="text-danger ">{{ $message }}</li>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="ptaste" class="form-label titles">Taste</label>
                            <select name="ptaste" id="ptaste" class="form-select selects" required>
                                <option value="0" selected disabled>Choose Taste</option>
                                @foreach ($mTaste as $item)
                                    @if ($item->taste == $products->product_taste)
                                        <option value="{{ $item->taste }}" selected>{{ $item->taste }}</option>
                                    @else
                                        <option value="{{ $item->taste }}">{{ $item->taste }}</option>
                                    @endif


                                @endforeach

                            </select>
                        </div>
                        <div class="form-group ">
                            <label for="ptype" class="form-label titles">Type</label>
                            <select name="ptype" id="ptype" class="form-select selects" required>
                                <option value="0" selected disabled>Choose Type</option>
                                @foreach ($mFav as $item)
                                    @if ($item->favourite_food == $products->product_type)
                                        <option value="{{ $item->favourite_food }}" selected>
                                            {{ $item->favourite_food }}</option>
                                    @else
                                        <option value="{{ $item->favourite_food }}">{{ $item->favourite_food }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group ">
                            <label for="coin" class="form-label titles">Coin Amount</label>
                            <input type="number" name="coin" id="coin" class="form-control inputs"
                                value="{{ $products->coin }}" required>
                            @error('coin')
                                <li class="text-danger ">{{ $message }}</li>
                            @enderror
                            <div class="d-flex justify-content-center">
                                <p class="mx-3 mt-2 fs-4 fw-bold amounts text-danger">{{ $products->amount }} MMK</p>
                            </div>

                        </div>
                        <div class="form-group">
                            <label for="list" class="form-label titles">Ingredient List</label>
                            <textarea type="text" name="list" id="list" class="form-control inputs" rows="4" required>{{ $products->list }}
                                        </textarea>

                        </div>

                        <div class="d-flex justify-content-between  mt-4 mx-2">
                            <div class="mx-2">
                                <label name="avaliable" class="titles">Avaliable</label>

                            </div>
                            <div class="mt-2">
                                @if ($products->avaliable == 1)
                                    <input type="checkbox" name="avaliable" id="avaliable" class="custombox" checked
                                        value="1">
                                @else
                                    <input type="checkbox" name="avaliable" id="avaliable" class="custombox" value="1">
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Product Description --}}
            <div class="container-fluid mb-4">
                <div class="row">
                    <div class="col-md-10 col-sm-12">
                        <div class="form-group mt-3">
                            <label for="pdesc" class="form-label titles">Description</label>
                            <textarea name="pdesc" id="pdesc" class="form-control" cols="30"
                                rows="10">{{ $products->description }}</textarea>
                        </div>
                    </div>
                </div>
            </div>


            {{-- Product Append --}}
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 col-sm-12 mb-3">
                        <div class="mt-4 mb-2 titles">Products Detail</div>
                        <div class="appendBox">
                            <div class="m-3 plusBox">
                                <i class="fas fa-plus-circle icons"></i>
                            </div>

                            <div class="row">
                                <div class="col-md-12 col-sm-7">
                                    <div class="append">
                                        @foreach ($pdetails as $detail)
                                            <div class="d-flex mt-3 appendCount" id="deleteForm">
                                                <div class="form-group d-flex mx-3">
                                                    <label for="category" class="col-form-label titles">Category</label>
                                                    <select name="category{{ $loop->iteration }}" id="category"
                                                        class="form-select mx-2">
                                                        <option value="0" selected disabled>Select category</option>
                                                        @if ($detail->category == 1)
                                                            <option value="1" selected>Selected Box</option>

                                                        @else
                                                            <option value="2" selected>Checked Box</option>
                                                        @endif
                                                    </select>
                                                </div>

                                                <input type="text" name="pdname{{ $loop->iteration }}"
                                                    class="mx-3 col-sm-3 plabel{{ $loop->iteration }}"
                                                    value="{{ $detail->label }}">
                                                <input type="text" class="inputtag" name="pdvalue{{ $loop->iteration }}"
                                                    value="{{ $detail->value }}" class="ms-3  form-control inputs${count}"
                                                    data-role="tagsinput">

                                                <div class="mx-3 mt-3 delete" id={{ $loop->iteration }}><i
                                                        class="fas fa-minus-circle minusIcon"></i></div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-end mb-4">
                <button type="reset" class="resetBtn">Reset</button>
                <button type="submit" class="submitBtn">Update</button>
            </div>
        </form>
    </div>
    <script>
        var startCount = @json(count($pdetails) + 1);
        console.log(startCount);

    </script>
    <script src="{{ URL::asset('js/adminProduct.js') }}"></script>
@endsection
