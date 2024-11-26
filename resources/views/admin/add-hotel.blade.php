<x-layout>
    ADD HOTEL
    <div id="form-container" style="width: 20cm;  align-items: center;">
        <form action="{{ url('/add-hotel') }}" method="POST" id="registration-form" style="margin: 2cm">
            @csrf
            <div class="form-group">
              <label for="name-register" class="text-muted mb-1"><small>name</small></label>
              <input value="{{old('name')}}" name="name" id="name-register" class="form-control" type="text" placeholder="Pick a name" autocomplete="off" />
            </div>
            @error('name')
            <p class="m-0 small alret alert-danger shadow-sm">{{$message}}</p> 
            @enderror
            <div class="form-group">
              <label for="email-register" class="text-muted mb-1"><small>Email</small></label>
              <input value="{{old('email')}}" name="email" id="email-register" class="form-control" type="text" placeholder="you@example.com" autocomplete="off" />
            </div>
            @error('email')
            <p class="m-0 small alret alert-danger shadow-sm">{{$message}}</p> 
            @enderror

            <div class="form-group">
              <label for="adress-register" class="text-muted mb-1"><small>adress</small></label>
              <input value="{{old('adress')}}" name="adress" id="adress-register" class="form-control" type="text" placeholder="your property adress" autocomplete="off" />
            </div>

            <div class="form-group">
              <label for="city-register" class="text-muted mb-1"><small>city</small></label>
              <input value="{{old('city')}}" name="city" id="city-register" class="form-control" type="text" placeholder="city" autocomplete="off" />
            </div>

            <div class="form-group">
              <label for="area-register" class="text-muted mb-1"><small>area</small></label>
              <input value="{{old('area')}}" name="area" id="area-register" class="form-control" type="text" placeholder="area" autocomplete="off" />
            </div>

            <div class="form-group">
              <label for="distance-register" class="text-muted mb-1"><small>distance</small></label>
              <input value="{{old('distance')}}" name="distance" id="distance-register" class="form-control" type="number" placeholder="in kms" autocomplete="off" />
            </div>

            <div class="form-group">
              <label for="property_type" class="text-muted mb-1"><small>property type (please pick one)</small></label>
              <x-input-label for="property_type"/>
              <select name="property_type" id="property_type" class="form-control"  placeholder="special?">
                  <option value="hotel">hotel</option>
                  <option value="resort">resort</option>
                  <option value="theme_park">theme park</option>
                  <option value="motel">motel</option>
                  <option value="bandb">b&b</option>
              </select>
              </div>


            <div class="form-group">
              <label for="telephone-register" class="text-muted mb-1"><small>telephone</small></label>
              <input value="{{old('telephone')}}" name="telephone" id="telephone-register" class="form-control" type="text" placeholder="+81 999-999-9999" autocomplete="off" />
            </div>

            <div class="form-group">
              <label for="number_of_rooms-register" class="text-muted mb-1"><small>number of rooms</small></label>
              <input value="{{old('number_of_rooms')}}" name="number_of_rooms" id="number_of_rooms-register" class="form-control" type="number" placeholder="eg: 5" autocomplete="off" />
            </div>
            <div class="form-group">
              <label for="place_type" class="text-muted mb-1"><small>property type (please pick one)</small></label>
              <x-input-label for="place_type"/>
              <select name="place_type" id="place_type" class="form-control"  placeholder="special?">
                  <option value="hill">hill</option>
                  <option value="beach">beach</option>
                  <option value="city">city</option>
                  <option value="country_side">country side</option>
                  <option value="wildlife">wildlife</option>
              </select>
              </div>
            <div class="form-check">
              <input name="resto" class="form-check-input" type="checkbox" value="1" id="resto-register" autocomplete="off">
              <label for="resto-register" class="text-muted mb-1">
                  restaurant
              </label>
            </div>
            <div class="form-check">
              <input name="breakfast" class="form-check-input" type="checkbox" value="1" id="breakfast-register" >
              <label for="breakfast-register" class="text-muted mb-1">
                  breakfast
              </label>
            </div>
            <div class="form-check">
              <input name="pool" class="form-check-input" type="checkbox" value="1" id="pool" autocomplete="off">
              <label for="pool" class="text-muted mb-1">
                  pool
              </label>
            </div>
            <div class="form-group">
              <label for="star-register" class="text-muted mb-1"><small>star pick one</small></label>
              <x-input-label for="star"/>
              <select name="star" id="star-register" class="form-control"  placeholder="special?">
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
              </select>
              </div>
              <div class="form-group">
                  <label for="bed_types-register" class="text-muted mb-1"><small>bed_types</small></label>
                  <input value="  {{old('bed_types')}}" name="bed_types" id="bed_types-register" class="form-control" type="text" placeholder="single, double, queen, king" autocomplete="off" />
                </div>

            <div class="form-check">
              <input name="chain" class="form-check-input" type="checkbox" value="1" id="chain" autocomplete="off">
              <label for="chain" class="text-muted mb-1">
                  chain
              </label>
            </div>

            <div class="form-check">
              <input name="cancle" class="form-check-input" type="checkbox" value="1" id="cancle" autocomplete="off">
              <label for="cancle" class="text-muted mb-1">
                  cancelation fee
              </label>
            </div>
            <div class="form-group">
              <label for="price-register" class="text-muted mb-1"><small>price</small></label>
              <input value="{{old('price')}}" name="price" id="price-register" class="form-control" type="number" placeholder="in yen" autocomplete="off" />
            </div>
            
            <button type="submit" class="py-3 mt-4 btn btn-lg btn-primary btn-block">Add Hotel</button>
          </form>
          @if(session('fail'))
          <div class="container container--narrow mt-3">
              <div class="alert alert-danger text-center">
                  {{ session('fail') }}
              </div>
          </div>
          @endif
    </div>

</x-layout>