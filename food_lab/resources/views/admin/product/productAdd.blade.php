@extends('COMMON.layout.layout_admin')

@section('title','Product Add')
    

@section('css') 
<link rel="stylesheet" href="{{ URL::asset('css/adminProduct.css') }}"/>
<link rel="stylesheet" href="{{ URL::asset('css/adminProductTagInput.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection



@section('script') 

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="{{ URL::asset('js/adminProductTagsInput.js') }}"></script>
<script src="{{ URL::asset('js/adminProduct.js') }}"></script>
@endsection

@section('body')
     <div class="col-md-10">
            {{-- Product Form --}}
            <form action="">
            <div class="mt-4 mb-4 labels">Products Add Form</div>
            
           
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-7">
                       
                        <div class="mt-2  image-container">
                             <div class="row">
                                 <div class="col-md-6">
                                     <div class="mx-5 mt-4 blocks">
                                         <img src="" alt="">
                                     </div>
                                  
                                     <div class="form-group mx-5 mt-2">
                                     <input type="file" name="photoone" class="form-control files">
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="mx-3 mt-4 blocks">
                                        <img src="" alt="">
                                    </div>
                                    <div class="form-group mx-3 mt-2">
                                    <input type="file" name="phototwo" class="form-control files">
                                   </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mx-5 mt-4 blocks">
                                        <img src="" alt="">
                                    </div>
                                    
                                    <div class="form-group mx-5 mt-2">
                                    <input type="file" name="photothree" class="form-control files">
                                   </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mx-3 mt-4 blocks">
                                        <img src="" alt="">
                                    </div>
                                  
                                    <div class="form-group mx-3 mt-2">
                                    <input type="file" name="photofour" class="form-control files">
                                   </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mx-5 mt-4 blocks">
                                        <img src="" alt="">
                                    </div>
                                   
                                    <div class="form-group mx-5 mt-2">
                                    <input type="file" name="photofive" class="form-control files">
                                   </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mx-3 mt-4 blocks"></div>
                                  
                                    <div class="form-group mx-3 mt-2">
                                    <input type="file" name="photosix" class="form-control files">
                                   </div>
                                </div>
                             </div>
                        </div>
                    </div>
                    {{-- Product Form --}}
                    <div class="mt-2 col-md-5">
                        <div class="form-group">
                            <label for="pname" class="form-label titles">Product Name</label>
                            <input type="text" name="pname" id="pname" class="form-control inputs"  required>
                        </div>
                        <div class="form-group">
                            <label for="ptaste" class="form-label titles">Taste</label>
                            <select name="ptaste" id="ptaste" class="form-select selects" required>
                                <option value="0" selected disabled>Choose Taste</option>
                                @foreach ($mTaste as $item)
                                    <option value="{{ $item->taste }}">{{ $item->taste }}</option>
                                @endforeach
                               
                            </select>
                        </div>
                        <div class="form-group ">
                            <label for="ptype" class="form-label titles">Type</label>
                            <select name="ptype" id="ptaste" class="form-select selects" required>
                                <option value="0" selected disabled>Choose Type</option>
                               @foreach ($mFav as $item)
                               <option value="{{ $item->favourite_food }}">{{ $item->favourite_food }}</option>
                               @endforeach
                            </select>
                        </div>
                        <div class="form-group ">
                            <label for="coin" class="form-label titles">Coin Amount</label>
                            <input type="number" name="coin" id="coin" class="form-control inputs" required>
                            <div class="d-flex justify-content-center">
                                <p class="mx-3 mt-2 fs-4 fw-bold amounts text-danger">1400 MMK</p>
                            </div>
                           
                        </div>
                        <div class="form-group">
                            <label for="list" class="form-label titles">Ingredient List</label>
                            <textarea type="text" name="list" id="list" class="form-control inputs" rows="4" required>
                            </textarea>
                           
                        </div>

                        <div class="d-flex justify-content-between  mt-4 mx-2">
                                <div class="mx-2">
                                    <label name="avaliable" class="titles">Avaliable</label>
                                
                                </div>
                                <div class="mt-2">
                                    <input type="checkbox" name="avaliable" id="avaliable" class="custombox" value="avaliable">
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
                            <textarea name="pdesc" id="pdesc" class="form-control" cols="30" rows="10"></textarea>
                        </div>
                    </div>
                </div>
            </div>


            {{-- Product Append --}}
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <div class="mt-4 mb-2 titles">Products Detail</div>                             
                            <div class="appendBox">
                                <div class="m-3 plusBox">
                                    <i class="fas fa-plus-circle icons" ></i>
                                </div>
                            </div>
                    </div>   
                </div>
            </div>

            <div class="d-flex justify-content-end mb-4">
                <button type="reset" class="resetBtn">Reset</button>
                <button type="submit" class="submitBtn">Submit</button>
            </div>
        </form>
     </div>
@endsection
