@extends('frontend/views/layouts.app')
@section('content')

    <!-- Layout 1 -->
    <div class="row mb-3">
        <div class="col-12">
            <h6 class="mb-0 font-weight-semibold">
                {{__('index.contact')}}
            </h6>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">

            <!-- Basic map -->
            <div class="card">
                <div class="card-header header-elements-inline">
                <h5 class="card-title">{{__('auth.address')}}</h5>

                </div>

                <div class="card-body">
                <p class="mb-3">{{__('contact.address-text1')}}</p>

                    <div class="map-container" id="map_basic"></div>
                </div>
            </div>
            <!-- /basic map -->

        </div>

        <div class="col-md-6">

            <!-- Advanced legend -->
            <div class="card">
                <div class="card-header header-elements-inline">
                    <h5 class="card-title">Advanced legend</h5>
                    <div class="header-elements">
                        <div class="list-icons">
                            <a class="list-icons-item" data-action="collapse"></a>
                            <a class="list-icons-item" data-action="reload"></a>
                            <a class="list-icons-item" data-action="remove"></a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <form action="#">
                        <fieldset>
                            <legend class="font-weight-semibold text-uppercase font-size-sm">
                                <i class="icon-file-text2 mr-2"></i>
                                Enter your information
                                <a href="#" class="float-right text-default" data-toggle="collapse" data-target="#demo1">
                                    <i class="icon-circle-down2"></i>
                                </a>
                            </legend>

                            <div class="collapse show" id="demo1">
                                <div class="form-group">
                                    <label>Enter your name:</label>
                                    <input type="text" class="form-control" placeholder="Eugene Kopyov">
                                </div>

                                <div class="form-group">
                                    <label>Enter your password:</label>
                                    <input type="password" class="form-control" placeholder="Your strong password">
                                </div>

                                <div class="form-group">
                                    <label>Repeat password:</label>
                                    <input type="password" class="form-control" placeholder="Repeat password">
                                </div>

                                <div class="form-group">
                                    <label>Your message:</label>
                                    <textarea rows="5" cols="5" class="form-control" placeholder="Enter your message here"></textarea>
                                </div>
                            </div>
                        </fieldset>

                        <fieldset>
                            <legend class="font-weight-semibold text-uppercase font-size-sm">
                                <i class="icon-reading mr-2"></i>
                                Add personal details
                                <a class="float-right text-default" data-toggle="collapse" data-target="#demo2">
                                    <i class="icon-circle-down2"></i>
                                </a>
                            </legend>

                            <div class="collapse show" id="demo2">
                                <div class="form-group">
                                    <label>Your country:</label>
                                    <select data-placeholder="Select your country" class="form-control form-control-select2" data-fouc>
                                        <option value="USA">USA</option>
                                        <option value="United Kingdom">United Kingdom</option>
                                        <option value="...">...</option>
                                        <option value="Australia">Australia</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Select your state:</label>
                                    <select data-placeholder="Select your state" class="form-control form-control-select2" data-fouc>
                                        <option></option>
                                        <optgroup label="Alaskan/Hawaiian Time Zone">
                                            <option value="AK">Alaska</option>
                                            <option value="HI">Hawaii</option>
                                        </optgroup>
                                        <optgroup label="Pacific Time Zone">
                                            <option value="CA">California</option>
                                            <option value="NV">Nevada</option>
                                            <option value="WA">Washington</option>
                                        </optgroup>
                                        <optgroup label="Mountain Time Zone">
                                            <option value="AZ">Arizona</option>
                                            <option value="CO">Colorado</option>
                                            <option value="WY">Wyoming</option>
                                        </optgroup>
                                        <optgroup label="Central Time Zone">
                                            <option value="AL">Alabama</option>
                                            <option value="AR">Arkansas</option>
                                            <option value="KY">Kentucky</option>
                                        </optgroup>
                                        <optgroup label="Eastern Time Zone">
                                            <option value="CT">Connecticut</option>
                                            <option value="DE">Delaware</option>
                                            <option value="FL">Florida</option>
                                        </optgroup>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="d-block">Gender:</label>

                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" name="gender2" class="form-input-styled" checked data-fouc>
                                            Male
                                        </label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" name="gender2" class="form-input-styled" data-fouc>
                                            Female
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Your CV:</label>
                                    <input type="file" class="form-input-styled" data-fouc>
                                    <span class="form-text text-muted">Accepted formats: pdf, doc. Max file size 2Mb</span>
                                </div>

                                <div class="form-group">
                                    <label>About yourself:</label>
                                    <textarea rows="5" cols="5" placeholder="Few words about yourself..." class="form-control"></textarea>
                                </div>
                            </div>
                        </fieldset>

                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Submit form <i class="icon-paperplane ml-2"></i></button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /advanced legend -->

        </div>
    </div>
    <!-- /layout 1 -->


@endsection
@section('page-level-scripts')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCbF9O9Ks9_-QNWHi2SFxLqLUBOwrMyzXk"></script>
<script src="{{ asset('js/gmapbasic.js') }}"></script>
@endsection
