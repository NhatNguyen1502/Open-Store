@extends('layouts.client')

@section('title', 'About us')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/homePage.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/hearder-footer.css') }}">
@endsection


@section('content')
<section class="container my-5">
    <div class="row p-50">
      <div class="col-md-6">
        <div class="carousel-item active">
          <!-- <img src="../image/Team.jpg" alt="Team 1" class="img-fluid"> -->
        </div>
      </div>
      <div class="col-md-6">
        <h2 class="mb-4">My Team</h2>
        <p>My team is a dedicated and diverse group that works together towards a common goal. We value collaboration,
          communication, and excellence. We support and motivate each other, celebrating successes and learning from
          challenges. Our professional synergy is complemented by strong personal connections, creating a positive and
          supportive work environment.</p>
        <p>We trust and respect one another, fostering a sense of camaraderie. Through teamwork, we overcome obstacles,
          achieve our objectives, and make a positive impact.</p>
      </div>
    </div>

    <!-- </section> -->


    <h2 class="text-center m-5">Team members</h2>
    <!-- <section class="container my-5"> -->
    <div class="row justify-content-center">
      <div class="col-md-3">
        <div class="member-card">
          <!-- <img src="../image/Nhat.jpg" alt="Member 1" class="img-fluid"> -->
          <h3 class="member-name">Lâm Nhật</h3>
          <p class="member-description">I am the team leader and I am ready to assist when team members encounter
            difficulties.</p>
        </div>
      </div>
      
      <div class="col-md-3">
        <div class="member-card">
          <!-- <img src="../image/ti.jpg" alt="Member 3" class="img-fluid"> -->
          <h3 class="member-name">Đức Quyền</h3>
          <p class="member-description">I am delighted to have this website because I enjoy shopping for items.</p>
        </div>
      </div>
      <div class="col-md-3">
        <div class="member-card">
          <!-- <img src="../image/Le.jpg" alt="Member 4" class="img-fluid"> -->
          <h3 class="member-name">Tường Nhật</h3>
          <p class="member-description">It useful to be able to browse the website and make purchases from the website
            we have created.</p>
        </div>
      </div>
    </div>
    <p></p>
    <!-- </section> -->

    <!-- <section class="container my-5"> -->
    <h2 class="mb-4 text-center mt-5">What Clients Say</h2>
    <div class="row">
      <div class="col-md-4">
        <div class="testimonial-card">
          <!-- <img src="../image/Jonh.jpg" alt="Client 1" class="img-fluid"> -->
          <h3 class="client-name">John Smith</h3>
          <p class="client-quote">"Outstanding clothing website. User-friendly, attractive design, diverse high-quality
            products. Highly recommended!"</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="testimonial-card">
          <!-- <img src="../image/Nath.jpg" alt="Client 2" class="img-fluid"> -->
          <h3 class="client-name">Jane Doe</h3>
          <p class="client-quote">"Amazing online clothing store. Stylish designs, great variety, and excellent quality.
            Fast shipping and friendly customer service."</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="testimonial-card">
          <!-- <img src="../image/Mish.jpg" alt="Client 2" class="img-fluid"> -->
          <h3 class="client-name">Jane Doe</h3>
          <p class="client-quote">"The product quality is excellent, and the customer service is professional. I am
            extremely satisfied with my shopping experience on this website."</p>
        </div>
      </div>
    </div>
  </section>
@endsection