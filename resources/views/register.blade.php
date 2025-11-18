@extends('layout')
@section('code')
<!-- register section -->
<section class="about_section layout_padding">
  <div class="container">
    <div class="row justify-content-center">

        <div class="col-md-6">   <!-- Centered form -->
            <div class="detail-box">
                <div class="heading_container">
                    <h2>Register</h2>
                </div>

                <form action="" method="POST" class="mt-4">
                    @csrf

                    <div class="form-group mb-3">
                        <label class="mb-2" for="name">Full Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>

                    <div class="form-group mb-3">
                        <label class="mb-2" for="email">Email Address</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>

                    <div class="form-group mb-3">
                        <label class="mb-2" for="phone">Phone Number</label>
                        <input type="tel" class="form-control" id="phone" name="phone" required>
                    </div>

                    <div class="form-group mb-3">
                        <label class="mb-2" for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>

                    <div class="form-group mb-3">
                        <label class="mb-2" for="password_confirmation">Confirm Password</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                    </div>

                    <div class="form-group mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="terms" name="terms" required>
                            <label class="form-check-label" for="terms">I agree to the <a href="">Terms & Conditions</a></label>
                        </div>
                    </div>

                    <button class="btn btn-primary" type="submit">Register</button>

                    <div class="mt-3">
                        <p>Already have an account? <a href="">Login here</a></p>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>

</section>

<!-- end register section -->

<style>
  .about_section .detail-box h2 {
    margin-bottom: 20px;
  }
  
  .about_section .form-control {
    padding: 10px 15px;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 15px;
  }
  
  .about_section .form-control:focus {
    border-color: #ffbe33;
    box-shadow: 0 0 0 0.2rem rgba(255, 190, 51, 0.25);
    outline: none;
  }
  
  .about_section label {
    font-weight: 500;
    color: #333;
  }
  
  .about_section .btn-primary {
    background-color: #ffbe33;
    border-color: #ffbe33;
    color: #fff;
    padding: 10px 45px;
    font-size: 16px;
    border-radius: 5px;
    transition: all 0.3s;
  }
  
  .about_section .btn-primary:hover {
    background-color: #e6a82e;
    border-color: #e6a82e;
    transform: translateY(-2px);
  }
  
  .about_section a {
    color: #ffbe33;
    text-decoration: none;
    transition: all 0.3s;
  }
  
  .about_section a:hover {
    color: #e6a82e;
    text-decoration: underline;
  }
  
  .about_section .img-box {
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100%;
  }
  
  .about_section .img-box img {
    max-width: 100%;
    height: auto;
  }
</style>

@endsection