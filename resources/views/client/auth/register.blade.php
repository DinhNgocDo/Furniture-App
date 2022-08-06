<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đăng ký</title>
    <link rel="stylesheet" href="{{ asset('login/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/general.css') }}">
    <link rel="shortcut icon" type="image/x-icon" href="https://cpwebassets.codepen.io/assets/favicon/favicon-aec34940fbc1a6e787974dcd360f2c6b63348d4b1f4e06c77743096d55480f33.ico">
    <link rel="mask-icon" href="https://cpwebassets.codepen.io/assets/favicon/logo-pin-8f3771b1072e3c38bd662872f6b673a722f4b3ca2421637d5596661b4e2132cc.svg" color="#111">
    <link rel="canonical" href="https://codepen.io/uiswarup/pen/zYvGKed">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome-animation/0.3.0/font-awesome-animation.min.css">
</head>
<body>
    
    <header class="top-header">
    </header>
    
    <div id="mainCoantiner">
        <div class="main-header">
            <div class="header-social">
                <ul>
                    <li><a id="nmberone">1</a></li>
                    <li><a id="nmbertwo">2</a></li>
                    <li><a id="numberthree">3</a></li>
                    <li><a>4</a></li>
                </ul>
            </div>
            <div class="folio-btn">
                <a class="folio-btn-item ajax" href="#" target="_blank"><span class="folio-btn-dot"></span><span class="folio-btn-dot"></span><span class="folio-btn-dot"></span><span class="folio-btn-dot"></span><span class="folio-btn-dot"></span><span class="folio-btn-dot"></span><span class="folio-btn-dot"></span><span class="folio-btn-dot"></span><span class="folio-btn-dot"></span></a>
            </div>
        </div>
        
        <!--dust particel-->
        <div>
            <div class="starsec"></div>
            <div class="starthird"></div>
            <div class="starfourth"></div>
            <div class="starfifth"></div>
        </div>
        <!--Dust particle end--->
        
        <div class="container text-center text-dark mt-5">
            <div class="row">
                <div class="col-lg-4 d-block mx-auto mt-5">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-md-12">
                            <form class="card" action="{{ route('register-client-form') }}" method="POST">
                                <div class="card-body wow-bg" id="formBg">
                                    <h3 class="colorboard">Đăng ký thành viên</h3>
                        
                                    @csrf
                                    @if (session()->has('messageSuccess'))
                                        <div class="red-text">{{ session()->get('messageSuccess') }}</div>
                                    @endif

                                    <div class="input-group mb-3"> 
                                        <input class="form-control textbox-dg" placeholder="Email" type="email" name="email" value="{{ old('email') }}"> 
                                    </div>
                                    @if ($errors->has('email'))
                                        <div class="red-text">{{ $errors->first('email') }}</div>
                                    @endif

                                    <div class="input-group mb-3"> 
                                        <input class="form-control textbox-dg" placeholder="Họ tên" type="text" name="name" value="{{ old('name') }}"> 
                                    </div>
                                    @if ($errors->has('name'))
                                        <div class="red-text">{{ $errors->first('name') }}</div>
                                    @endif

                                    <div class="input-group mb-3"> 
                                        <input class="form-control textbox-dg" placeholder="Số điện thoại" type="number" name="phone" value="{{ old('phone') }}"> 
                                    </div>
                                    @if ($errors->has('phone'))
                                        <div class="red-text">{{ $errors->first('phone') }}</div>
                                    @endif

                                    <div class="input-group mb-3"> 
                                        <input class="form-control textbox-dg" placeholder="Địa chỉ" type="text" name="address" value="{{ old('address') }}"> 
                                    </div>
                                    @if ($errors->has('address'))
                                        <div class="red-text">{{ $errors->first('address') }}</div>
                                    @endif

                                    <div class="input-group mb-4"> 
                                        <input type="text" class="form-control textbox-dg" name="password" placeholder="Password"> 
                                    </div>
                                    @if ($errors->has('password'))
                                        <div class="red-text">{{ $errors->first('password') }}</div>
                                    @endif
                        
                                    <div class="row">
                                        <div class="col-12"> <button type="submit" class="btn btn-primary btn-block logn-btn">Đăng ký</button> </div>
                                        {{-- <div class="col-12"> <a href="forgot-password.html" class="btn btn-link box-shadow-0 px-0">Đăng ký</a> </div> --}}
                                    </div>
                        
                                    <div class="mt-6 btn-list">
                                        <button class="socila-btn btn btn-icon btn-facebook fb-color"><i class="fab fa-facebook-f faa-ring animated"></i></button> <button type="button" class="socila-btn btn btn-icon btn-google incolor"><i class="fab fa-linkedin-in faa-flash animated"></i></button> <button type="button" class="socila-btn btn btn-icon btn-twitter tweetcolor"><i class="fab fa-twitter faa-shake animated"></i></button> <button type="button" class="socila-btn btn btn-icon btn-dribbble driblecolor"><i class="fab fa-dribbble faa-pulse animated"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="panda">
        <div class="ear"></div>
        <div class="face">
            <div class="eye-shade"></div>
                <div class="eye-white">
                <div class="eye-ball"></div>
            </div>
            <div class="eye-shade rgt"></div>
            <div class="eye-white rgt">
                <div class="eye-ball"></div>
            </div>
            <div class="nose"></div>
            <div class="mouth"></div>
        </div>
    </div>
    <form action="{{ route('register-client-form') }}" method="POST">
        @csrf
        @if (session()->has('messageSuccess'))
            <div class="red-text">{{ session()->get('messageSuccess') }}</div>
        @endif
        <div class="hand"></div>
        <div class="hand rgt"></div>
        <h1>Đăng ký thành viên</h1>
        <div class="form-group">
            <input required="required" class="form-control" type="email" name="email" value="{{ old('email') }}" />
            <label class="form-label">Email</label>
            @if ($errors->has('email'))
                <div class="red-text">{{ $errors->first('email') }}</div>
            @endif
        </div>
        <div class="form-group">
            <input required="required" class="form-control" type="name" name="name" value="{{ old('name') }}" />
            <label class="form-label">Họ tên</label>
            @if ($errors->has('name'))
                <div class="red-text">{{ $errors->first('name') }}</div>
            @endif
        </div>
        <div class="form-group">
            <input required="required" class="form-control" type="number" name="phone" value="{{ old('phone') }}" />
            <label class="form-label">Số điện thoại</label>
            @if ($errors->has('phone'))
                <div class="red-text">{{ $errors->first('phone') }}</div>
            @endif
        </div>
        <div class="form-group">
            <input required="required" class="form-control" type="text" name="address" value="{{ old('address') }}" />
            <label class="form-label">Địa chỉ</label>
            @if ($errors->has('address'))
                <div class="red-text">{{ $errors->first('address') }}</div>
            @endif
        </div>
        <div class="form-group">
            <input id="password" type="password" name="password" required="required" class="form-control"/>
            <label class="form-label">Mật khẩu</label>
            @if ($errors->has('password'))
                <div class="red-text">{{ $errors->first('password') }}</div>
            @endif
            <button class="btn">Đăng ký </button>
        </div>
    </form>
    <script src="{{ asset('login/js/main.js') }}"></script>
</body>
</html>