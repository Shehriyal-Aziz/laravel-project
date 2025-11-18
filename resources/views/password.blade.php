@extends('layout')
@section('code')
<!-- forgot password section -->
<section class="about_section layout_padding">
  <div class="container">
    <div class="row justify-content-center">

        <div class="col-md-6">   <!-- Centered form -->
            <div class="detail-box">
                <div class="heading_container">
                    <h2>Password Recovery</h2>
                </div>

                <div class="small mb-3 text-muted">
                    Enter your email address and we will send you a link to reset your password.
                </div>

                <form action="" method="POST" class="mt-4">
                    @csrf

                    <div class="form-group mb-3">
                        <label class="mb-2" for="email">Email Address</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required>
                    </div>

                    <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                        <a href="">Return to login</a>
                        <button class="btn btn-primary" type="submit">Reset Password</button>
                    </div>
                </form>

                <div class="mt-4 text-center">
                    <p>Need an account? <a href="">Sign up!</a></p>
                </div>
            </div>
        </div>

    </div>
</div>

</section>

<!-- end forgot password section -->

<style>
  .about_section .detail-box h2 {
    margin-bottom: 20px;
  }

  .about_section .text-muted {
    color: #6c757d;
    font-size: 14px;
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
    font-size: 14px;
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