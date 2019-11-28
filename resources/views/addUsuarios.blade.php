<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
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
                                    <input class="form-control" name="name" type="text" placeholder="{{ __('messages.Nombre') }}" >
                                    @if ($errors->has('name'))
                                    <b>{{$errors->first('name')}}</b>
                                    @endif
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                    <input class="form-control" name="lastname" type="text" placeholder="{{ __('messages.Apellido') }}" >
                                    @if ($errors->has('lastname'))
                                    <b>{{$errors->first('lastname')}}</b>
                                    @endif
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                    <input class="form-control" name="email" type="text" placeholder="{{ __('messages.Email') }}">
                                    @if ($errors->has('email'))
                                    <b>{{$errors->first('email')}}</b>
                                    @endif
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                    <textarea class="form-control" name="message" placeholder="{{ __('messages.Número de teléfono') }}" ></textarea>
                                    @if ($errors->has('phone_number'))
                                    <b>{{$errors->first('phone_number')}}</b>
                                    @endif
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                    <input class="form-control" name="name" type="text" placeholder="{{ __('messages.Tipo de usuario') }}" >
                                    @if ($errors->has('type_of_user'))
                                    <b>{{$errors->first('type_of_user')}}</b>
                                    @endif
                                </div>
                            </div>
                            <br>
                            <div id="success"></div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-xl" id="sendMessageButton">{{ __('messages.Enviar') }}</button>
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
