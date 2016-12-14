<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie9"><![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Material Admin</title>

        <!-- Vendor CSS -->
        <link href="vendors/bower_components/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet">
        <link href="vendors/bower_components/animate.css/animate.min.css" rel="stylesheet">
        <link href="vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css" rel="stylesheet">
        <link href="vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css" rel="stylesheet">        
        <link href="vendors/bower_components/google-material-color/dist/palette.css" rel="stylesheet">
        
        <!-- CSS -->
        <link href="css/app.min.1.css" rel="stylesheet">
        <link href="css/app.min.2.css" rel="stylesheet"> 
        
    </head>
    <body >
 

<div class="login" data-lbg="teal">
            <!-- Login -->
            <div class="l-block toggled" id="l-login">
                <div class="lb-header palette-Teal bg">
                    <i class="zmdi zmdi-account-circle"></i>
                    Hi there! Please Sign in
                </div>

                <div class="lb-body">

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}

                        <!-- <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> -->


                        <div class="form-group fg-float">
                        <div class="fg-line">
                            <input  id="email" type="email"  name="email" value="{{ old('email') }}" required autofocus class="input-sm form-control fg-input">
                            <label class="fg-label">Email Address</label>
                        </div>
                        @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                    </div>

                    <div class="form-group fg-float">
                        <div class="fg-line">
                            <input id="password" type="password" name="password" class="input-sm form-control fg-input" required>
                            <label class="fg-label">Password</label>
                        </div>

                        @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                    </div>



                        <div class="form-group">
                            <div class="col-md-6">
                                <div class="">
                                    <label>
                                        <input type="checkbox"  name="remember"> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>


                        <button type="submit" class="btn palette-Teal bg">Sign in</button>


                        <div class="m-t-20">
                        <!-- <a data-block="#l-register" data-bg="blue" class="palette-Teal text d-block m-b-5" href="">Creat an account</a> -->
                        <a data-block="#l-forget-password" data-bg="purple" href="" class="palette-Teal text">Forgot password?</a>
                        </div>

                        <!-- <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ url('/password/reset') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div> -->
                    </form>


                    

                    

                    
                </div>
            </div>

            

            
        </div>

@include('include/footer')