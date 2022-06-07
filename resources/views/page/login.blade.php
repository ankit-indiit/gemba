@extends('layout.master')
@section('content')	
<!-- Banner Start -->
<section class="login-page">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-sm-8">
                <div class="contact-form-box">
                    <h3>Login</h3>
                    <form method="POST" action="#" class="axil-contact-form">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="email" class="form-control" name="contact-name">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="contact-email">
                        </div>
                        <div class="customcheckbox">
                            <div class="checkbx-set">
                                <input type="checkbox" class="custom-control-input" id="remember">
                                <label class="custom-control-label" for="remember">Remember Me</label>
                            </div>
                            <span><a href="javascript: void(0)">Forgot Password ?</a></span>
                        </div>
                        <div class="form-group">
                            <a type="submit" href="index.php" class="submit-button" name="submit-btn">Login</a>
                        </div>
                    </form>
                    <div class="bottom-box">
                        <div class="text">Don't have an account? <a href="signup.php" class="signup">Signup</a></div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</section>
<!-- Banner End -->
@endsection
