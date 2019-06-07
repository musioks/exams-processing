@include('layouts.header')
<body class="pt-5" style="background: #716DEE;">
<!-- Login -->
<section>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="wrapper-pagemt-4">
                        <div class="account-box rounded-0"><!-- Logo box-->
                            <div class="account-logo-box border-bottom mt-0">
                                <h2 class="text-uppercase text-center mt-0">
                                    <a href="{{url('/')}}"                                                                                             class="text-success"><span><img
                                                    src="{{asset('assets/images/logo22.PNG')}}" alt="" style="width:130px;height:130px;"></span></a>
                                </h2>
                            </div>
                            <div class="account-content">
                                <form action="{{url('/')}}" method="post">
                                    @csrf
                                    <div class="form-group mb-3">
                                        <label for="emailaddress" class="font-weight-medium">Email address</label>
                                        <input class="form-control rounded-0" type="email" id="emailaddress" name="email"
                                               required="" placeholder="Enter your email" value="{{old('email')}}">
                                    </div>
                                    <div class="form-group mb-3"><a href="{{ route('password.request') }}"
                                                                    class="text-muted float-right">
                                            <small>Forgot your password?</small>
                                        </a> <label for="password" class="font-weight-medium">Password</label>
                                        <input class="form-control rounded-0" type="password" name="password" required=""
                                               id="password"
                                               placeholder="Enter your password"></div>

                                    <div class="form-group row text-center">
                                        <div class="col-12">
                                            <button class="btn btn-block btn-primary btn-lg waves-effect waves-light rounded-0"
                                                    type="submit"><i class="fa fa-fw fa-rocket"></i> Sign In
                                            </button>
                                        </div>
                                    </div>
                                </form><!-- end form -->
                                {{--<div class="row mt-3">--}}
                                {{--<div class="col-12 text-center"><p class="text-muted">Don't have an account? <a--}}
                                {{--href="auth-register.html" class="text-dark m-l-5"><b>Sign Up</b></a>--}}
                                {{--</p></div>--}}
                                {{--</div><!-- end row-->--}}
                            </div><!-- end account-content -->
                        </div><!-- end account-box -->
                </div><!-- end wrapper-page -->
            </div><!-- end col -->
        </div>
        <!-- end row -->
    </div><!-- end container -->
</section><!-- END HOME -->
<!-- jQuery  -->
@include('layouts.scripts')
</body>
</html>
