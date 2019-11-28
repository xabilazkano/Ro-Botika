<!DOCTYPE html>
<html lang="en">
@include('layouts.head')
<body id="page-top">
        @include('layouts.nav')

        <!-- Contact Section -->
        <section class="page-section" id="contact">
            <div class="container">
                <!-- Contact Section Form -->
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
                        <form name="sentMessage" id="contactForm" action="{{route('store')}}" method="post">
                            @csrf
                            <div class="control-group">
                                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                    <label>Name</label>
                                    <input class="form-control" name="name" type="text" placeholder="Name" >
                                    @if ($errors->has('name'))
                                    <b>{{$errors->first('name')}}</b>
                                    @endif
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                    <label>Lastname</label>
                                    <input class="form-control" name="lastname" type="text" placeholder="Lastname" >
                                    @if ($errors->has('lastname'))
                                    <b>{{$errors->first('lastname')}}</b>
                                    @endif
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                    <label>Email</label>
                                    <input class="form-control" name="email" type="text" placeholder="Email">
                                    @if ($errors->has('email'))
                                    <b>{{$errors->first('email')}}</b>
                                    @endif
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                    <label>Phone number</label>
                                    <textarea class="form-control" name="message" placeholder="Phone number" ></textarea>
                                    @if ($errors->has('phone_number'))
                                    <b>{{$errors->first('phone_number')}}</b>
                                    @endif
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                    <label>Type of user</label>
                                    <input class="form-control" name="name" type="text" placeholder="Type of user" >
                                    @if ($errors->has('type_of_user'))
                                    <b>{{$errors->first('type_of_user')}}</b>
                                    @endif
                                </div>
                            </div>
                            <br>
                            <div id="success"></div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-xl" id="sendMessageButton">Enviar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>


            <footer class="footer">
            @include('layouts.footer')
            </footer>

            </body>
            </html>
