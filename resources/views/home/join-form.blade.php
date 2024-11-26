<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PackYourBags</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    

    <style>
        body {
            margin: 0;
            padding: 0;
            height: 270vh;
            background: url('/desert.jpg') center/cover no-repeat fixed;
            overflow: auto; 
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: Comic Sans MS, Comic Sans, cursive;
        }

        #form-container {
            background: rgba(255, 255, 255, 0.5); 
            padding: 20px;
            border-radius: 10px;
            width: 80%;
            max-width: 700px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            margin: auto; 
        }

        #registration-form button {
            background-color: rgb(139, 97, 67); 
            color: #fff; 
            border: none;
            transition: background-color 0.3s ease; 
        }

        #registration-form button:active {
            background-color: rgb(139, 69, 19); 
        }


        #registration-form button:hover {
            background-color: #A0522D; 
        }
        
        #header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.8);
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
        }

        #header img {
            max-width: 100px;
        }

    </style>
</head>

<body>
    <div id="header">
        <div class="logo">
            <img
                src="https://www.pokemon.co.jp/ex/sun_moon/common/images/pokemon/160901_02/portrait01.png"
                alt="Logo">
        </div>
        <a href="/" class="py-3 mt-4 btn btn-lg btn-primary btn-block">home</a>
    </div>
    <div id="form-container">
        <form action="{{ url('/send-app') }}" method="POST" id="registration-form">
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
            
            <button type="submit" class="py-3 mt-4 btn btn-lg btn-primary btn-block">Send Application</button>
          </form>
          @if(session('fail'))
          <div class="container container--narrow mt-3">
              <div class="alert alert-danger text-center">
                  {{ session('fail') }}
              </div>
          </div>
          @endif
    </div>
</body>
</html>
