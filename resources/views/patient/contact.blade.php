 @extends('patient.layouts.master')
 @section('title', 'About')
 @section('content')
     <!-- Inner Banner -->
     <div class="inner-banner inner-bg2">
         <div class="container">
             <div class="inner-title">
                 <h3>Contact Us</h3>
                 <ul>
                     <li>
                         <a href="/">Home</a>
                     </li>
                     <li>Contact Us</li>
                 </ul>
             </div>
         </div>
         <div class="inner-banner-shape">
             <div class="shape1">
                 <img src="{{ asset('patient/assets/img/inner-banner/inner-banner-shape1.png') }}" alt="Images">
             </div>
             <div class="shape2">
                 <img src="{{ asset('patient/assets/img/inner-banner/inner-banner-shape2.png') }}" alt="Images">
             </div>
         </div>
     </div>
     <!-- Inner Banner End -->

     <!-- Contact Area -->
     <div class="contact-area pt-100 pb-70">
         <div class="container">
             <div class="row">
                 <div class="col-lg-4">
                     <div class="contact-widget-right">
                         <h3>Contact Info</h3>
                         <p>Grursus mal suada faci Lorem to the ipsum dolarorit.</p>
                         <ul class="contact-list">
                             <li>
                                 <i class='flaticon-pin'></i>
                                 <div class="content">
                                     {{ \App\Helpers\Utility::getValByName('address') }}
                                 </div>
                             </li>
                             <li>
                                 <i class='flaticon-phone-call'></i>
                                 <div class="content">
                                     <a
                                         href="tel:{{ \App\Helpers\Utility::getValByName('phone') }}">{{ \App\Helpers\Utility::getValByName('phone') }}</a>

                                 </div>
                             </li>
                             <li>
                                 <i class='bx bxs-envelope'></i>
                                 <div class="content">
                                     <a href="hello@medizo.com">{{ \App\Helpers\Utility::getValByName('email') }}</a>
                                 </div>
                             </li>
                         </ul>
                     </div>
                 </div>

                 <div class="col-lg-8">
                     <div class="contact-form">
                         <h2>Get in Touch</h2>
                         @if (session()->has('success'))
                             <div class="alert alert-success">
                                 {{ session()->get('success') }}
                             </div>
                         @endif
                         {!! Form::open(['route' => 'patient.contact.message.store', 'files' => true, 'method' => 'post']) !!}
                         <div class="row">
                             <div class="col-lg-6 col-sm-6">
                                 <div class="form-group">
                                     <input type="text" name="name" id="name"
                                         class="form-control @error('name') is-invalid @enderror" required
                                         data-error="Please enter your name" placeholder="Name">
                                     @error('name')
                                         <span id="code-error" class="error invalid-feedback">{{ $message }}</span>
                                     @enderror

                                 </div>
                             </div>

                             <div class="col-lg-6 col-sm-6">
                                 <div class="form-group">
                                     <input type="email" name="email" id="email"
                                         class="form-control @error('email') is-invalid @enderror" required
                                         data-error="Please enter your email" placeholder="Email">
                                     @error('email')
                                         <span id="code-error" class="error invalid-feedback">{{ $message }}</span>
                                     @enderror
                                 </div>
                             </div>

                             <div class="col-lg-6 col-sm-6">
                                 <div class="form-group">
                                     <input type="text" name="phone" id="phone_number" required
                                         data-error="Please enter your number"
                                         class="form-control @error('phone') is-invalid @enderror" placeholder="Phone">
                                     @error('phone')
                                         <span id="code-error" class="error invalid-feedback">{{ $message }}</span>
                                     @enderror
                                 </div>
                             </div>

                             <div class="col-lg-6 col-sm-6">
                                 <div class="form-group">
                                     <input type="text" name="subject" id="msg_subject"
                                         class="form-control @error('subject') is-invalid @enderror" required
                                         data-error="Please enter your subject" placeholder="Your Subject">
                                     @error('subject')
                                         <span id="code-error" class="error invalid-feedback">{{ $message }}</span>
                                     @enderror
                                 </div>
                             </div>

                             <div class="col-lg-12 col-md-12">
                                 <div class="form-group">
                                     <textarea name="message" class="form-control @error('message') is-invalid @enderror" id="message" cols="30" rows="8"
                                         required data-error="Write your message" placeholder="Your Message"></textarea>
                                     @error('message')
                                         <span id="code-error" class="error invalid-feedback">{{ $message }}</span>
                                     @enderror
                                 </div>
                             </div>

                             <div class="col-lg-12 col-md-12">
                                 <button type="submit" class="default-btn">
                                     Send Message
                                 </button>
                                 <div id="msgSubmit" class="h3 text-center hidden"></div>
                                 <div class="clearfix"></div>
                             </div>
                         </div>
                         {!! Form::close() !!}
                     </div>
                 </div>
             </div>
         </div>
         <div class="contact-shape">
             <img src="assets/img/shape/shape2.png" alt="Images">
         </div>
     </div>
     <!-- Contact Area End -->
 @endsection
