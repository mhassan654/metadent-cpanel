@extends('layouts.master')

@section('title','Profile Settings')

@section('content')


    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-12 mb-2 mt-1">
                    <div class="breadcrumbs-top">
                        <h5 class="content-header-title float-left pr-1 mb-0">Account Settings</h5>
                        <div class="breadcrumb-wrapper d-none d-sm-block">
                            <ol class="breadcrumb p-0 mb-0 pl-1">
                                <li class="breadcrumb-item"><a href="index.html"><i class="bx bx-home-alt"></i></a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Admin</a>
                                </li>
                                <li class="breadcrumb-item active"> Account Settings
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- account setting page start -->
                <section id="page-account-settings">
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <!-- left menu section -->
                                <div class="col-md-3 mb-2 mb-md-0 pills-stacked">
                                    <ul class="nav nav-pills flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link d-flex align-items-center active" id="account-pill-general" data-toggle="pill" href="#account-vertical-general" aria-expanded="true">
                                                <i class="bx bx-cog"></i>
                                                <span>General</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link d-flex align-items-center" id="account-pill-password" data-toggle="pill" href="#account-vertical-password" aria-expanded="false">
                                                <i class="bx bx-lock"></i>
                                                <span>Change Password</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link d-flex align-items-center" id="account-pill-info" data-toggle="pill" href="#account-vertical-info" aria-expanded="false">
                                                <i class="bx bx-info-circle"></i>
                                                <span>Info</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link d-flex align-items-center" id="account-pill-social" data-toggle="pill" href="#account-vertical-social" aria-expanded="false">
                                                <i class="bx bxl-twitch"></i>
                                                <span>Social links</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link d-flex align-items-center" id="account-pill-connections" data-toggle="pill" href="#account-vertical-connections" aria-expanded="false">
                                                <i class="bx bx-link"></i>
                                                <span>Connections</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link d-flex align-items-center" id="account-pill-notifications" data-toggle="pill" href="#account-vertical-notifications" aria-expanded="false">
                                                <i class="bx bx-bell"></i>
                                                <span>Notifications</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- right content section -->
                                <div class="col-md-9">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="tab-content">
                                                <div role="tabpanel" class="tab-pane active" id="account-vertical-general" aria-labelledby="account-pill-general" aria-expanded="true">
                                                    <div class="media">
                                                        <a href="javascript: void(0);">
                                                            <img src="../../../app-assets/images/portrait/small/avatar-s-16.jpg" class="rounded mr-75" alt="profile image" height="64" width="64">
                                                        </a>
                                                        <div class="media-body mt-25">
                                                            <div class="col-12 px-0 d-flex flex-sm-row flex-column justify-content-start">
                                                                <label for="select-files" class="btn btn-sm btn-light-primary ml-50 mb-50 mb-sm-0">
                                                                    <span>Upload new photo</span>
                                                                    <input id="select-files" type="file" hidden="">
                                                                </label>
                                                                <button class="btn btn-sm btn-light-secondary ml-50">Reset</button>
                                                            </div>
                                                            <p class="text-muted ml-1 mt-50"><small>Allowed JPG, GIF or PNG. Max
                                                                    size of
                                                                    800kB</small></p>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <form class="validate-form" novalidate="novalidate" action="{{route('profile.update')}}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <div class="controls">
                                                                        <label>Username</label>
                                                                        <input type="text" class="form-control"  name="name" value="{{Auth::guard('admin')->user()->name}}">
                                                                    </div>
                                                                </div>
                                                            </div>
{{--                                                            <div class="col-12">--}}
{{--                                                                <div class="form-group">--}}
{{--                                                                    <div class="controls">--}}
{{--                                                                        <label>Name</label>--}}
{{--                                                                        <input type="text" class="form-control" placeholder="Name" value="{{Auth::guard('admin')->user()->name}}" name="name">--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <div class="controls">
                                                                        <label>E-mail</label>
                                                                        <input type="email" class="form-control"  value="{{Auth::guard('admin')->user()->email}}" name="email">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="alert bg-rgba-warning alert-dismissible mb-2" role="alert">
                                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                        <span aria-hidden="true">×</span>
                                                                    </button>
                                                                    <p class="mb-0">
                                                                        Your email is not confirmed. Please check your inbox.
                                                                    </p>
                                                                    <a href="javascript: void(0);">Resend confirmation</a>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label>Company</label>
                                                                    <input type="text" class="form-control" placeholder="Company name">
                                                                </div>
                                                            </div>
                                                            <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                                <button type="submit" class="btn btn-primary glow mr-sm-1 mb-1">Save
                                                                    </button>
                                                                <button type="reset" class="btn btn-light mb-1">Cancel</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="tab-pane fade" id="account-vertical-password" role="tabpanel" aria-labelledby="account-pill-password" aria-expanded="false">
                                                    <form class="validate-form" novalidate="novalidate">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <div class="controls">
                                                                        <label>Old Password</label>
                                                                        <input type="password" class="form-control" placeholder="Old Password" name="password">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <div class="controls">
                                                                        <label>New Password</label>
                                                                        <input type="password" class="form-control" placeholder="New Password" id="account-new-password" name="new-password">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <div class="controls">
                                                                        <label>Retype new Password</label>
                                                                        <input type="password" class="form-control" data-validation-match-match="password" placeholder="New Password" name="confirm-new-password">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                                <button type="submit" class="btn btn-primary glow mr-sm-1 mb-1">Save
                                                                   </button>
                                                                <button type="reset" class="btn btn-light mb-1">Cancel</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="tab-pane fade" id="account-vertical-info" role="tabpanel" aria-labelledby="account-pill-info" aria-expanded="false">
                                                    <form class="validate-form" novalidate="novalidate">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label>Bio</label>
                                                                    <textarea class="form-control" id="accountTextarea" rows="3" placeholder="Your Bio data here..."></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <div class="controls">
                                                                        <label>Birth date</label>
                                                                        <input type="text" class="form-control birthdate-picker picker__input" placeholder="Birth date" name="dob" readonly="" id="P816234033" aria-haspopup="true" aria-readonly="false" aria-owns="P816234033_root"><div class="picker" id="P816234033_root" aria-hidden="true"><div class="picker__holder" tabindex="-1"><div class="picker__frame"><div class="picker__wrap"><div class="picker__box"><div class="picker__header"><div class="picker__month">February</div><div class="picker__year">2022</div><div class="picker__nav--prev" data-nav="-1" tabindex="0" role="button" aria-controls="P816234033_table" title="Previous month"> </div><div class="picker__nav--next" data-nav="1" tabindex="0" role="button" aria-controls="P816234033_table" title="Next month"> </div></div><table class="picker__table" id="P816234033_table" role="grid" aria-controls="P816234033" aria-readonly="true"><thead><tr><th class="picker__weekday" scope="col" title="Sunday">Sun</th><th class="picker__weekday" scope="col" title="Monday">Mon</th><th class="picker__weekday" scope="col" title="Tuesday">Tue</th><th class="picker__weekday" scope="col" title="Wednesday">Wed</th><th class="picker__weekday" scope="col" title="Thursday">Thu</th><th class="picker__weekday" scope="col" title="Friday">Fri</th><th class="picker__weekday" scope="col" title="Saturday">Sat</th></tr></thead><tbody><tr><td><div class="picker__day picker__day--outfocus" data-pick="1643490000000" id="P816234033_1643490000000" tabindex="0" role="gridcell" aria-label="January, 30, 2022">30</div></td><td><div class="picker__day picker__day--outfocus" data-pick="1643576400000" id="P816234033_1643576400000" tabindex="0" role="gridcell" aria-label="January, 31, 2022">31</div></td><td><div class="picker__day picker__day--infocus" data-pick="1643662800000" id="P816234033_1643662800000" tabindex="0" role="gridcell" aria-label="February, 1, 2022">1</div></td><td><div class="picker__day picker__day--infocus" data-pick="1643749200000" id="P816234033_1643749200000" tabindex="0" role="gridcell" aria-label="February, 2, 2022">2</div></td><td><div class="picker__day picker__day--infocus" data-pick="1643835600000" id="P816234033_1643835600000" tabindex="0" role="gridcell" aria-label="February, 3, 2022">3</div></td><td><div class="picker__day picker__day--infocus" data-pick="1643922000000" id="P816234033_1643922000000" tabindex="0" role="gridcell" aria-label="February, 4, 2022">4</div></td><td><div class="picker__day picker__day--infocus" data-pick="1644008400000" id="P816234033_1644008400000" tabindex="0" role="gridcell" aria-label="February, 5, 2022">5</div></td></tr><tr><td><div class="picker__day picker__day--infocus" data-pick="1644094800000" id="P816234033_1644094800000" tabindex="0" role="gridcell" aria-label="February, 6, 2022">6</div></td><td><div class="picker__day picker__day--infocus" data-pick="1644181200000" id="P816234033_1644181200000" tabindex="0" role="gridcell" aria-label="February, 7, 2022">7</div></td><td><div class="picker__day picker__day--infocus" data-pick="1644267600000" id="P816234033_1644267600000" tabindex="0" role="gridcell" aria-label="February, 8, 2022">8</div></td><td><div class="picker__day picker__day--infocus" data-pick="1644354000000" id="P816234033_1644354000000" tabindex="0" role="gridcell" aria-label="February, 9, 2022">9</div></td><td><div class="picker__day picker__day--infocus" data-pick="1644440400000" id="P816234033_1644440400000" tabindex="0" role="gridcell" aria-label="February, 10, 2022">10</div></td><td><div class="picker__day picker__day--infocus" data-pick="1644526800000" id="P816234033_1644526800000" tabindex="0" role="gridcell" aria-label="February, 11, 2022">11</div></td><td><div class="picker__day picker__day--infocus" data-pick="1644613200000" id="P816234033_1644613200000" tabindex="0" role="gridcell" aria-label="February, 12, 2022">12</div></td></tr><tr><td><div class="picker__day picker__day--infocus" data-pick="1644699600000" id="P816234033_1644699600000" tabindex="0" role="gridcell" aria-label="February, 13, 2022">13</div></td><td><div class="picker__day picker__day--infocus" data-pick="1644786000000" id="P816234033_1644786000000" tabindex="0" role="gridcell" aria-label="February, 14, 2022">14</div></td><td><div class="picker__day picker__day--infocus" data-pick="1644872400000" id="P816234033_1644872400000" tabindex="0" role="gridcell" aria-label="February, 15, 2022">15</div></td><td><div class="picker__day picker__day--infocus" data-pick="1644958800000" id="P816234033_1644958800000" tabindex="0" role="gridcell" aria-label="February, 16, 2022">16</div></td><td><div class="picker__day picker__day--infocus" data-pick="1645045200000" id="P816234033_1645045200000" tabindex="0" role="gridcell" aria-label="February, 17, 2022">17</div></td><td><div class="picker__day picker__day--infocus picker__day--today picker__day--highlighted" data-pick="1645131600000" id="P816234033_1645131600000" tabindex="0" role="gridcell" aria-label="February, 18, 2022" aria-activedescendant="1645131600000">18</div></td><td><div class="picker__day picker__day--infocus" data-pick="1645218000000" id="P816234033_1645218000000" tabindex="0" role="gridcell" aria-label="February, 19, 2022">19</div></td></tr><tr><td><div class="picker__day picker__day--infocus" data-pick="1645304400000" id="P816234033_1645304400000" tabindex="0" role="gridcell" aria-label="February, 20, 2022">20</div></td><td><div class="picker__day picker__day--infocus" data-pick="1645390800000" id="P816234033_1645390800000" tabindex="0" role="gridcell" aria-label="February, 21, 2022">21</div></td><td><div class="picker__day picker__day--infocus" data-pick="1645477200000" id="P816234033_1645477200000" tabindex="0" role="gridcell" aria-label="February, 22, 2022">22</div></td><td><div class="picker__day picker__day--infocus" data-pick="1645563600000" id="P816234033_1645563600000" tabindex="0" role="gridcell" aria-label="February, 23, 2022">23</div></td><td><div class="picker__day picker__day--infocus" data-pick="1645650000000" id="P816234033_1645650000000" tabindex="0" role="gridcell" aria-label="February, 24, 2022">24</div></td><td><div class="picker__day picker__day--infocus" data-pick="1645736400000" id="P816234033_1645736400000" tabindex="0" role="gridcell" aria-label="February, 25, 2022">25</div></td><td><div class="picker__day picker__day--infocus" data-pick="1645822800000" id="P816234033_1645822800000" tabindex="0" role="gridcell" aria-label="February, 26, 2022">26</div></td></tr><tr><td><div class="picker__day picker__day--infocus" data-pick="1645909200000" id="P816234033_1645909200000" tabindex="0" role="gridcell" aria-label="February, 27, 2022">27</div></td><td><div class="picker__day picker__day--infocus" data-pick="1645995600000" id="P816234033_1645995600000" tabindex="0" role="gridcell" aria-label="February, 28, 2022">28</div></td><td><div class="picker__day picker__day--outfocus" data-pick="1646082000000" id="P816234033_1646082000000" tabindex="0" role="gridcell" aria-label="March, 1, 2022">1</div></td><td><div class="picker__day picker__day--outfocus" data-pick="1646168400000" id="P816234033_1646168400000" tabindex="0" role="gridcell" aria-label="March, 2, 2022">2</div></td><td><div class="picker__day picker__day--outfocus" data-pick="1646254800000" id="P816234033_1646254800000" tabindex="0" role="gridcell" aria-label="March, 3, 2022">3</div></td><td><div class="picker__day picker__day--outfocus" data-pick="1646341200000" id="P816234033_1646341200000" tabindex="0" role="gridcell" aria-label="March, 4, 2022">4</div></td><td><div class="picker__day picker__day--outfocus" data-pick="1646427600000" id="P816234033_1646427600000" tabindex="0" role="gridcell" aria-label="March, 5, 2022">5</div></td></tr><tr><td><div class="picker__day picker__day--outfocus" data-pick="1646514000000" id="P816234033_1646514000000" tabindex="0" role="gridcell" aria-label="March, 6, 2022">6</div></td><td><div class="picker__day picker__day--outfocus" data-pick="1646600400000" id="P816234033_1646600400000" tabindex="0" role="gridcell" aria-label="March, 7, 2022">7</div></td><td><div class="picker__day picker__day--outfocus" data-pick="1646686800000" id="P816234033_1646686800000" tabindex="0" role="gridcell" aria-label="March, 8, 2022">8</div></td><td><div class="picker__day picker__day--outfocus" data-pick="1646773200000" id="P816234033_1646773200000" tabindex="0" role="gridcell" aria-label="March, 9, 2022">9</div></td><td><div class="picker__day picker__day--outfocus" data-pick="1646859600000" id="P816234033_1646859600000" tabindex="0" role="gridcell" aria-label="March, 10, 2022">10</div></td><td><div class="picker__day picker__day--outfocus" data-pick="1646946000000" id="P816234033_1646946000000" tabindex="0" role="gridcell" aria-label="March, 11, 2022">11</div></td><td><div class="picker__day picker__day--outfocus" data-pick="1647032400000" id="P816234033_1647032400000" tabindex="0" role="gridcell" aria-label="March, 12, 2022">12</div></td></tr></tbody></table><div class="picker__footer"><button class="picker__button--today" type="button" data-pick="1645131600000" disabled="" aria-controls="P816234033">Today</button><button class="picker__button--clear" type="button" data-clear="1" disabled="" aria-controls="P816234033">Clear</button><button class="picker__button--close" type="button" data-close="true" disabled="" aria-controls="P816234033">Close</button></div></div></div></div></div></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label>Country</label>
                                                                    <select class="form-control" id="accountSelect">
                                                                        <option>USA</option>
                                                                        <option>India</option>
                                                                        <option>Canada</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label>Languages</label>
                                                                    <select class="form-control select2-hidden-accessible" id="languageselect2" data-select2-id="languageselect2" tabindex="-1" aria-hidden="true">
                                                                        <option value="English" selected="">English</option>
                                                                        <option value="Spanish">Spanish</option>
                                                                        <option value="French">French</option>
                                                                        <option value="Russian">Russian</option>
                                                                        <option value="German">German</option>
                                                                        <option value="Arabic" selected="" data-select2-id="2">Arabic</option>
                                                                        <option value="Sanskrit">Sanskrit</option>
                                                                    </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="1" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-languageselect2-container"><span class="select2-selection__rendered" id="select2-languageselect2-container" role="textbox" aria-readonly="true" title="Arabic">Arabic</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <div class="controls">
                                                                        <label>Phone</label>
                                                                        <input type="text" class="form-control" placeholder="Phone number" value="(+656) 254 2568" name="phone">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label>Website</label>
                                                                    <input type="text" class="form-control" placeholder="Website address">
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label>Favorite Music</label>
                                                                    <select class="form-control select2-hidden-accessible" id="musicselect2" data-select2-id="musicselect2" tabindex="-1" aria-hidden="true">
                                                                        <option value="Rock">Rock</option>
                                                                        <option value="Jazz" selected="">Jazz</option>
                                                                        <option value="Disco">Disco</option>
                                                                        <option value="Pop">Pop</option>
                                                                        <option value="Techno">Techno</option>
                                                                        <option value="Folk" selected="" data-select2-id="4">Folk</option>
                                                                        <option value="Hip hop">Hip hop</option>
                                                                    </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="3" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-musicselect2-container"><span class="select2-selection__rendered" id="select2-musicselect2-container" role="textbox" aria-readonly="true" title="Folk">Folk</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label>Favorite movies</label>
                                                                    <select class="form-control select2-hidden-accessible" id="moviesselect2" data-select2-id="moviesselect2" tabindex="-1" aria-hidden="true">
                                                                        <option value="The Dark Knight" selected="">The Dark Knight
                                                                        </option>
                                                                        <option value="Harry Potter" selected="">Harry Potter</option>
                                                                        <option value="Airplane!">Airplane!</option>
                                                                        <option value="Perl Harbour">Perl Harbour</option>
                                                                        <option value="Spider Man">Spider Man</option>
                                                                        <option value="Iron Man" selected="" data-select2-id="6">Iron Man</option>
                                                                        <option value="Avatar">Avatar</option>
                                                                    </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="5" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-moviesselect2-container"><span class="select2-selection__rendered" id="select2-moviesselect2-container" role="textbox" aria-readonly="true" title="Iron Man">Iron Man</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                                                </div>
                                                            </div>
                                                            <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                                <button type="submit" class="btn btn-primary glow mr-sm-1 mb-1">Save
                                                                    changes</button>
                                                                <button type="reset" class="btn btn-light mb-1">Cancel</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="tab-pane fade " id="account-vertical-social" role="tabpanel" aria-labelledby="account-pill-social" aria-expanded="false">
                                                    <form>
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label>Twitter</label>
                                                                    <input type="text" class="form-control" placeholder="Add link" value="https://www.twitter.com">
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label>Facebook</label>
                                                                    <input type="text" class="form-control" placeholder="Add link">
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label>Google+</label>
                                                                    <input type="text" class="form-control" placeholder="Add link">
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label>LinkedIn</label>
                                                                    <input type="text" class="form-control" placeholder="Add link" value="https://www.linkedin.com">
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label>Instagram</label>
                                                                    <input type="text" class="form-control" placeholder="Add link">
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label>Quora</label>
                                                                    <input type="text" class="form-control" placeholder="Add link">
                                                                </div>
                                                            </div>
                                                            <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                                <button type="submit" class="btn btn-primary glow mr-sm-1 mb-1">Save
                                                                    changes</button>
                                                                <button type="reset" class="btn btn-light mb-1">Cancel</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="tab-pane fade" id="account-vertical-connections" role="tabpanel" aria-labelledby="account-pill-connections" aria-expanded="false">
                                                    <div class="row">
                                                        <div class="col-12 my-2">
                                                            <a href="javascript: void(0);" class="btn btn-info">Connect to
                                                                <strong>Twitter</strong></a>
                                                        </div>
                                                        <hr>
                                                        <div class="col-12 my-2">
                                                            <button class=" btn btn-sm btn-light-secondary float-right">edit</button>
                                                            <h6>You are connected to facebook.</h6>
                                                            <p>Johndoe@gmail.com</p>
                                                        </div>
                                                        <hr>
                                                        <div class="col-12 my-2">
                                                            <a href="javascript: void(0);" class="btn btn-danger">Connect to
                                                                <strong>Google</strong>
                                                            </a>
                                                        </div>
                                                        <hr>
                                                        <div class="col-12 my-2">
                                                            <button class=" btn btn-sm btn-light-secondary float-right">edit</button>
                                                            <h6>You are connected to Instagram.</h6>
                                                            <p>Johndoe@gmail.com</p>
                                                        </div>
                                                        <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                            <button type="submit" class="btn btn-primary glow mr-sm-1 mb-1">Save
                                                                changes</button>
                                                            <button type="reset" class="btn btn-light mb-1">Cancel</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="account-vertical-notifications" role="tabpanel" aria-labelledby="account-pill-notifications" aria-expanded="false">
                                                    <div class="row">
                                                        <h6 class="m-1">Activity</h6>
                                                        <div class="col-12 mb-1">
                                                            <div class="custom-control custom-switch custom-control-inline">
                                                                <input type="checkbox" class="custom-control-input" checked="" id="accountSwitch1">
                                                                <label class="custom-control-label mr-1" for="accountSwitch1"></label>
                                                                <span class="switch-label w-100">Email me when someone comments
                                                                    onmy
                                                                    article</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 mb-1">
                                                            <div class="custom-control custom-switch custom-control-inline">
                                                                <input type="checkbox" class="custom-control-input" checked="" id="accountSwitch2">
                                                                <label class="custom-control-label mr-1" for="accountSwitch2"></label>
                                                                <span class="switch-label w-100">Email me when someone answers on
                                                                    my
                                                                    form</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 mb-1">
                                                            <div class="custom-control custom-switch custom-control-inline">
                                                                <input type="checkbox" class="custom-control-input" id="accountSwitch3">
                                                                <label class="custom-control-label mr-1" for="accountSwitch3"></label>
                                                                <span class="switch-label w-100">Email me hen someone follows
                                                                    me</span>
                                                            </div>
                                                        </div>
                                                        <h6 class="m-1">Application</h6>
                                                        <div class="col-12 mb-1">
                                                            <div class="custom-control custom-switch custom-control-inline">
                                                                <input type="checkbox" class="custom-control-input" checked="" id="accountSwitch4">
                                                                <label class="custom-control-label mr-1" for="accountSwitch4"></label>
                                                                <span class="switch-label w-100">News and announcements</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 mb-1">
                                                            <div class="custom-control custom-switch custom-control-inline">
                                                                <input type="checkbox" class="custom-control-input" id="accountSwitch5">
                                                                <label class="custom-control-label mr-1" for="accountSwitch5"></label>
                                                                <span class="switch-label w-100">Weekly product updates</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 mb-1">
                                                            <div class="custom-control custom-switch custom-control-inline">
                                                                <input type="checkbox" class="custom-control-input" checked="" id="accountSwitch6">
                                                                <label class="custom-control-label mr-1" for="accountSwitch6"></label>
                                                                <span class="switch-label w-100">Weekly blog digest</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                            <button type="submit" class="btn btn-primary glow mr-sm-1 mb-1">Save
                                                               </button>
                                                            <button type="reset" class="btn btn-light mb-1">Cancel</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- account setting page ends -->

            </div>
        </div>
    </div>

@endsection
