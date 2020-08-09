@extends('frontend/views/layouts.app')
@section('content')

    <!-- Layout 1 -->
    <div class="row mb-3">
        <div class="col-sm-12">
            <h6 class="mb-0 font-weight-semibold">
                {{__('index.contact')}}
            </h6>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6">
            <!-- map -->
            <div class="card">
                <div class="card-header header-elements-inline">
                    <h5 class="card-title">{{__('auth.address')}}</h5>
                </div>
                <div class="card-body">
                    <p class="mb-3">{{__('contact.address-text1')}}</p>
                    <div class="map-container" id="map_basic"></div>
                </div>
            </div>
            <!-- /map -->
        </div>

        <div class="col-sm-6">
            <!-- ContactForm -->
            <div class="card">
                <div class="card-header header-elements-inline">
                    <h5 class="card-title">{{__('contact.contact-form')}}</h5>
                </div>
                <div class="card-body">
                    <form id="contact-us" action="" method="POST">
                        @csrf
                        <div class="form-group form-group-feedback form-group-feedback-right">
                            <input required id="name" type="text" maxlength="50" class="form-control maxlength @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  autocomplete="name" autofocus placeholder="{{ __('auth.name').' '.__('auth.surname') }}">
                            <div class="form-control-feedback">
                                <i class="icon-user-plus text-muted"></i>
                            </div>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group form-group-feedback form-group-feedback-right">
                            <input required id="email" type="email" maxlength="255" class="form-control maxlength @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email" placeholder="{{ __('auth.email-address') }}">
                            <div class="form-control-feedback">
                                <i class="icon-mention text-muted"></i>
                            </div>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group form-group-feedback form-group-feedback-right">
                            <input required id="mobilephone" type="text" maxlength="20" class="form-control maxlength @error('mobilephone') is-invalid @enderror" name="mobilephone" value="{{ old('mobilephone') }}"  autocomplete="mobilephone" placeholder="{{ __('contact.mobilephone') }}">
                            <div class="form-control-feedback">
                                <i class="icon-mobile text-muted"></i>
                            </div>
                            @error('mobilephone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group form-group-feedback form-group-feedback-right">
                            <input required id="subject" type="text" maxlength="80" class="form-control maxlength @error('subject') is-invalid @enderror" name="subject" value="{{ old('subject') }}"  autocomplete="subject" placeholder="{{ __('contact.subject') }}">
                            <div class="form-control-feedback">
                                <i class="icon-typography text-muted"></i>
                            </div>
                            @error('subject')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group form-group-feedback form-group-feedback-right">
                            <textarea required rows="8" cols="3" id="body" maxlength="1000" class="form-control maxlength-textarea @error('body') is-invalid @enderror" name="body"   autocomplete="body">{{ old('body') }}</textarea>
                            <div class="form-control-feedback">
                                <i class="icon-bubble text-muted"></i>
                            </div>
                            @error('body')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        @if(env('GOOGLE_RECAPTCHA_KEY'))
                            <div class="g-recaptcha mb-1" data-sitekey="{{env('GOOGLE_RECAPTCHA_KEY')}}"> </div>
                        @endif

                        <div class="text-right">
                            <button id="msgsubmitbtn" type="submit" class="btn btn-primary">{{__('contact.submitform')}} <i class="icon-paperplane ml-2"></i></button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /ContactForm -->

        </div>
    </div>
    <!-- /layout 1 -->


@endsection
@section('page-level-scripts')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD-RUKWn5EBwDh4hPGTIKfVXybSnmkV-IY"></script>
<script src="{{ asset('js/gmapbasic.js') }}"></script>
<script src="{{ asset('js/plugins/forms/inputs/maxlength.min.js') }}"></script>
<script src="{{ asset('js/plugins/notifications/noty.min.js') }}"></script>
<script src='https://www.google.com/recaptcha/api.js'></script>
<script>
    var ExtendedFormControls = function() {
        return {
            init: function() {

                if (typeof Noty == 'undefined') {
                    console.warn('Warning - noty.min.js is not loaded.');
                    return;
                }

                // Override Noty defaults
                Noty.overrideDefaults({
                    theme: 'limitless',
                    layout: 'topRight',
                    type: 'alert',
                    timeout: 2500
                });

                if (!$().maxlength) {
                    console.warn('Warning - maxlength.min.js is not loaded.');
                    return;
                }
                $('.maxlength').maxlength();
                $('.maxlength-textarea').maxlength({
                    alwaysShow: true
                });
            }
        }
    }();
    document.addEventListener('DOMContentLoaded', function() {
        ExtendedFormControls.init();
    });

    $(function(){
        $(document).on('submit','#contact-us',function(e){
            e.preventDefault();

            var data = $(this).serialize();
            var url = "{{ route('contact.create') }}";
            var btn = $('#msgsubmitbtn');

            $.ajax({
                type: 'POST',
                url: url,
                data: data,
                beforeSend: function() {
                    $(btn).addClass('disabled');
                    $(btn).empty().append('<span>{{__('index.btnloading')}}</span><i class="icon-spinner2 spinner"></i>');
                },
                success: function(data) {
                    $('form#contact-us')[0].reset();
                    if (data.message) {
                        new Noty({
                            layout: 'center',
                            text: '{{__('contact.sendmessagesuccess')}}',
                            type: 'success'
                        }).show();
                    }
                },
                error: function(xhr) {
                    new Noty({
                        layout: 'centerRight',
                        text: '{{__('contact.failedtosendmessage')}}',
                        type: 'error'
                    }).show();
                },
                complete: function() {
                    $(btn).removeClass('disabled');
                    $(btn).empty().append('{{__('contact.submitform')}} <i class="icon-paperplane ml-2"></i>');
                },
                dataType: 'json'
            });

        })
    })

</script>
@endsection
