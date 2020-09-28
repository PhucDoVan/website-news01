@extends('admin.layouts.master')
@section('title', 'Profiles')
@section('content')
    <div class="container" style="padding-top: 60px;">
        <h1 class="page-header">Edit Profile</h1>
        <form class="form-horizontal" action="{{route('admin.update_profiles')}}" role="form" method="post"
              enctype="multipart/form-data">
            @csrf
            @if(count($profiles) > 0)
                @foreach($profiles as $key => $val)
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <div class="form-img text-center mgbt-xs-15 p-fileup__item">
                                        <div class="img_preview">
                                            @if($val->avatar != '' && file_exists(\App\Enums\Property\Upload::UploadPath.$val->avatar))
                                                <img src="/upload/{{ $val->avatar }}"/>
                                            @endif
                                        </div>
                                        <button class="p-btn__inline" type="button"
                                                onclick="return clickUploadFile(this);">Upload Image
                                        </button>
                                        <input type="file" class="img_select" name="user_profiles_image" hidden>
                                        <input class="img_tmp" type="hidden" name="user_profiles_image_tmp"
                                               value="{{ old('user_profiles_image_tmp') }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- edit form column -->
                        <div class="col-md-8 col-sm-6 col-xs-12 personal-info">
                            <h3>Personal info</h3>
                            <div class="form-group">
                                <label class="col-lg-3 control-label font-normal" style="font-size: 20px;">Full
                                    name:</label>
                                <div class="col-lg-8 d-flex">
                                    <input class="form-control" type="text" placeholder="First name"
                                           name="first_name" value="{{ $val->first_name }}" style="margin-right: 5px;">
                                    <input class="form-control" type="text" placeholder="Last name"
                                           name="last_name" value="{{ $val->last_name }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label" style="font-size: 20px;">Gender</label>
                                <div class="col-lg-8">
                                    <span class="vd_radio radio-info">
                                        <input type="radio" checked="" value="option3"
                                               id="optionsRadios3" name="optionsRadios2">
                                        <label for="optionsRadios3"> Male </label>
                                    </span>
                                    <span class="vd_radio  radio-danger">
                                        <input type="radio" value="option4"
                                               id="optionsRadios4" name="optionsRadios2">
                                        <label for="optionsRadios4"> Female </label>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label" style="font-size: 20px;">Birthday</label>
                                <div class="col-lg-8">
                                    <input type="text" id="datepicker-normal" class="hasDatepicker form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label" style="font-size: 20px;">Marital Status</label>
                                <div class="col-lg-8">
                                    <select class="select__statusMarital form-control">
                                        <option>Single</option>
                                        <option>Married</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label" style="font-size: 20px;">About</label>
                                <div class="col-lg-8 controls">
                                    <textarea rows="5" class="form-control"></textarea>
                                </div>
                            </div>
                            <hr>
                            <h3 class="mgbt-xs-15">Contact Setting</h3>
                            <div class="form-group">
                                <label class="col-lg-3 control-label" style="font-size: 20px;">Mobile Phone:</label>
                                <div class="col-lg-8 d-flex">
                                    <input class="form-control" type="text" placeholder="Phone"
                                           name="phone" value="{{ $val->phone }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="font-size: 20px;">Facebook</label>
                                <div class="col-lg-8">
                                    <input class="form-control" type="text" placeholder="Facebook"
                                           name="facebook" value="{{ $val->facebook }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="font-size: 20px;">Google</label>
                                <div class="col-lg-8">
                                    <input class="form-control" type="text" placeholder="Google"
                                           name="google" value="{{ $val->google }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="font-size: 20px;">Twitter</label>
                                <div class="col-lg-8">
                                    <input class="form-control" type="text" placeholder="Twitter"
                                           name="twitter" value="{{ $val->twitter }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label" style="font-size: 20px;">Email:</label>
                                <div class="col-lg-8">
                                    <input class="form-control" placeholder="Email" name="email"
                                           value="{{ $val->twitter }}" type="text">
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <div class="col-xs-12">
                                <div class="form-img text-center mgbt-xs-15 p-fileup__item">
                                    <input name="user_profiles_id" type="hidden" value="">
                                    <div class="img_preview"></div>
                                    <button class="p-btn__inline" type="button"
                                            onclick="return clickUploadFile(this);">Upload Image
                                    </button>
                                    <input type="file" class="img_select" name="user_profiles_image" hidden>
                                    <input class="img_tmp" type="hidden" name="user_profiles_image_tmp" value="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- edit form column -->
                    <div class="col-md-8 col-sm-6 col-xs-12 personal-info">
                        <h3>Personal info</h3>
                        <div class="form-group">
                            <label class="col-lg-3 control-label font-normal" style="font-size: 20px;">Full
                                name:</label>
                            <div class="col-lg-8 d-flex">
                                <input class="form-control" type="text" placeholder="First name"
                                       name="first_name" value="{{ old('first_name') }}" style="margin-right: 5px;">
                                <input class="form-control" type="text" placeholder="Last name"
                                       name="last_name" value="{{ old('last_name') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label" style="font-size: 20px;">Gender</label>
                            <div class="col-lg-8">
                                    <span class="vd_radio radio-info">
                                        <input type="radio" checked="" value="option3"
                                               id="optionsRadios3" name="optionsRadios2">
                                        <label for="optionsRadios3"> Male </label>
                                    </span>
                                <span class="vd_radio  radio-danger">
                                        <input type="radio" value="option4"
                                               id="optionsRadios4" name="optionsRadios2">
                                        <label for="optionsRadios4"> Female </label>
                                    </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label" style="font-size: 20px;">Birthday</label>
                            <div class="col-lg-8">
                                <input type="text" id="datepicker-normal" class="hasDatepicker form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label" style="font-size: 20px;">Marital Status</label>
                            <div class="col-lg-8">
                                <select class="select__statusMarital form-control">
                                    <option>Single</option>
                                    <option>Married</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label" style="font-size: 20px;">About</label>
                            <div class="col-lg-8 controls">
                                <textarea rows="5" class="form-control"></textarea>
                            </div>
                        </div>
                        <hr>
                        <h3 class="mgbt-xs-15">Contact Setting</h3>
                        <div class="form-group">
                            <label class="col-lg-3 control-label" style="font-size: 20px;">Mobile Phone:</label>
                            <div class="col-lg-8">
                                <input class="form-control" type="text" placeholder="Phone"
                                       name="phone" value="{{ old('phone') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label" style="font-size: 20px;">Facebook</label>
                            <div class="col-lg-8">
                                <input class="form-control" type="text" placeholder="Facebook"
                                       name="facebook" value="{{ old('facebook') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label" style="font-size: 20px;">Google</label>
                            <div class="col-lg-8">
                                <input class="form-control" type="text" placeholder="Google"
                                       name="google" value="{{ old('google') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label" style="font-size: 20px;">Twitter</label>
                            <div class="col-lg-8">
                                <input class="form-control" type="text" placeholder="Twitter"
                                       name="twitter" value="{{ old('twitter') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label" style="font-size: 20px;">Email:</label>
                            <div class="col-lg-8">
                                <input class="form-control" placeholder="Email" name="email"
                                       value="{{ old('email') }}" type="text">
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <div class="row">
                <div class="col-lg-4"></div>
                <div class="col-lg-8">
                    <button class="btn vd_btn vd_bg-green col-md-offset-3" type="submit">
                        <span class="menu-icon"><i class="fa fa-fw fa-check"></i></span> Update
                    </button>
                    <button class="btn vd_btn vd_bg-yellow col-md-offset-3" type="reset">
                        <span class="menu-icon"><i class="fa fa-ban"></i></span> Cancel
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
