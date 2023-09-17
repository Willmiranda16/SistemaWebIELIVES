<template>
    <main v-if="user.estado == 1">
        <!-- Start Main top header -->
        <div id="header_top" class="header_top dark">
            <div class="container">
                <div class="hleft">
                    <a class="header-brand" href="/inicio"><img src="assets/images/insig.png" class="" alt="logo"
                            style="width: 80%;"></a>
                    <div class="dropdown">
                        <a href="javascript:void(0)" class="nav-link icon menu_toggle"><i
                                class="fe fe-align-center"></i></a>
                        <a href="page-search.html" class="nav-link icon" style="pointer-events: none;cursor: default; "><i
                                class="fe fe-search" data-toggle="tooltip" data-placement="right" title="Search..."></i></a>
                        <a href="app-filemanager.html" class="nav-link icon app_file xs-hide"
                            style="pointer-events: none;cursor: default; "><i class="fe fe-folder" data-toggle="tooltip"
                                data-placement="right" title="File Manager"></i></a>
                        <a href="javascript:void(0)" class="nav-link icon settingbar"><i class="fe fe-settings"></i></a>
                    </div>
                </div>
                <div class="hright">
                    <a href="javascript:void(0)" class="nav-link icon right_tab"><i class="fe fe-align-right"></i></a>
                    <a class="nav-link icon" href="#" @click.prevent="logout">
                        <i class="fe fe-power"></i>
                    </a>
                </div>
            </div>
        </div>
        <!-- Start Quick menu with more functio -->
        <div class="user_div">
            <ul class="nav nav-tabs">
                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#righttab-statistics">Statistics</a>
                </li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#righttab-Result">Result</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#righttab-Students">Student</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#righttab-Todo">Todo</a></li>
            </ul>
            <div class="tab-content mt-3">
                <div class="tab-pane fade show active" id="righttab-statistics" role="tabpanel">
                    <div class="card">
                        <div class="card-body">
                            <div>Total Revenue</div>
                            <div class="py-3 m-0 text-center h1 text-success">$79,452</div>
                            <div class="d-flex">
                                <span class="text-muted">Income</span>
                                <div class="ml-auto"><i class="fa fa-caret-up text-success"></i>4%</div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <ul class="list-unstyled mb-0">
                                <li class="mb-3">
                                    <div class="clearfix">
                                        <div class="float-left"><strong>$43,320</strong></div>
                                        <div class="float-right"><small class="text-muted">Bank of America</small></div>
                                    </div>
                                    <div class="progress progress-xxs">
                                        <div class="progress-bar bg-azure" role="progressbar" style="width: 87%"
                                            aria-valuenow="42" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </li>
                                <li>
                                    <div class="clearfix">
                                        <div class="float-left"><strong>$36,132</strong></div>
                                        <div class="float-right"><small class="text-muted">Wells Fargo</small></div>
                                    </div>
                                    <div class="progress progress-xxs">
                                        <div class="progress-bar bg-green" role="progressbar" style="width: 80%"
                                            aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body top_counter">
                            <div class="icon bg-yellow"><i class="fa fa-users"></i> </div>
                            <div class="content">
                                <span>Total Student</span>
                                <h5 class="number mb-0">2,051</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body top_counter">
                            <div class="icon bg-gray"><i class="fa fa-sitemap"></i> </div>
                            <div class="content">
                                <span>Department</span>
                                <h5 class="number mb-0">14</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body top_counter">
                            <div class="icon bg-dark"><i class="fa fa-black-tie"></i> </div>
                            <div class="content">
                                <span>Total Teacher</span>
                                <h5 class="number mb-0">27</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body top_counter">
                            <div class="icon bg-azure"><i class="fa fa-tags"></i> </div>
                            <div class="content">
                                <span>Total Courses</span>
                                <h5 class="number mb-0">31</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body top_counter">
                            <div class="icon bg-pink"><i class="fa fa-credit-card"></i> </div>
                            <div class="content">
                                <span>Expense</span>
                                <h5 class="number mb-0">$7,254</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body top_counter">
                            <div class="icon bg-green"><i class="fa fa-bank"></i> </div>
                            <div class="content">
                                <span>Total Income</span>
                                <h5 class="number mb-0">$27,852</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body top_counter">
                            <div class="icon bg-cyan"><i class="fa fa-map-o"></i> </div>
                            <div class="content">
                                <span>Our Center</span>
                                <h5 class="number mb-0">52</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body top_counter">
                            <div class="icon bg-indigo"><i class="fa fa-smile-o"></i> </div>
                            <div class="content">
                                <span>Smiley Face</span>
                                <h5 class="number mb-0">10K</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="righttab-Result" role="tabpanel">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Result 2019</h3>
                            <div class="card-options">
                                <a href="#"><i class="fa fa-file-excel-o" data-toggle="tooltip"
                                        title="Export Excel"></i></a>
                            </div>
                        </div>
                        <div class="card-body">
                            <ul class="list-unstyled">
                                <li class="mb-3">
                                    <div class="clearfix">
                                        <div class="float-left"><strong>87%</strong></div>
                                        <div class="float-right"><small class="text-muted">Art & Design</small></div>
                                    </div>
                                    <div class="progress progress-xxs">
                                        <div class="progress-bar bg-azure" role="progressbar" style="width: 87%"
                                            aria-valuenow="42" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </li>
                                <li class="mb-3">
                                    <div class="clearfix">
                                        <div class="float-left"><strong>80%</strong></div>
                                        <div class="float-right"><small class="text-muted">Fashion</small></div>
                                    </div>
                                    <div class="progress progress-xxs">
                                        <div class="progress-bar bg-green" role="progressbar" style="width: 80%"
                                            aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </li>
                                <li class="mb-3">
                                    <div class="clearfix">
                                        <div class="float-left"><strong>63%</strong></div>
                                        <div class="float-right"><small class="text-muted">Sports Science</small></div>
                                    </div>
                                    <div class="progress progress-xxs">
                                        <div class="progress-bar bg-orange" role="progressbar" style="width: 63%"
                                            aria-valuenow="36" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </li>
                                <li class="mb-3">
                                    <div class="clearfix">
                                        <div class="float-left"><strong>91%</strong></div>
                                        <div class="float-right"><small class="text-muted">Computers</small></div>
                                    </div>
                                    <div class="progress progress-xxs">
                                        <div class="progress-bar bg-indigo" role="progressbar" style="width: 91%"
                                            aria-valuenow="6" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </li>
                                <li>
                                    <div class="clearfix">
                                        <div class="float-left"><strong>35%</strong></div>
                                        <div class="float-right"><small class="text-muted">Biological Sciences</small></div>
                                    </div>
                                    <div class="progress progress-xxs">
                                        <div class="progress-bar bg-pink" role="progressbar" style="width: 35%"
                                            aria-valuenow="6" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="card-footer">
                            <div class="row text-center">
                                <div class="col-6 border-right">
                                    <label class="mb-0">Total Pass</label>
                                    <div class="font-20 font-weight-bold">1,052</div>
                                </div>
                                <div class="col-6">
                                    <label class="mb-0">Total Fail</label>
                                    <div class="font-20 font-weight-bold">198</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Result 2018</h3>
                            <div class="card-options">
                                <a href="#"><i class="fa fa-file-excel-o" data-toggle="tooltip"
                                        title="Export Excel"></i></a>
                            </div>
                        </div>
                        <div class="card-body">
                            <ul class="list-unstyled">
                                <li class="mb-3">
                                    <div class="clearfix">
                                        <div class="float-left"><strong>80%</strong></div>
                                        <div class="float-right"><small class="text-muted">Fashion</small></div>
                                    </div>
                                    <div class="progress progress-xxs">
                                        <div class="progress-bar bg-green" role="progressbar" style="width: 80%"
                                            aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </li>
                                <li class="mb-3">
                                    <div class="clearfix">
                                        <div class="float-left"><strong>87%</strong></div>
                                        <div class="float-right"><small class="text-muted">Art & Design</small></div>
                                    </div>
                                    <div class="progress progress-xxs">
                                        <div class="progress-bar bg-azure" role="progressbar" style="width: 87%"
                                            aria-valuenow="42" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </li>
                                <li class="mb-3">
                                    <div class="clearfix">
                                        <div class="float-left"><strong>91%</strong></div>
                                        <div class="float-right"><small class="text-muted">Computers</small></div>
                                    </div>
                                    <div class="progress progress-xxs">
                                        <div class="progress-bar bg-indigo" role="progressbar" style="width: 91%"
                                            aria-valuenow="6" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </li>
                                <li class="mb-3">
                                    <div class="clearfix">
                                        <div class="float-left"><strong>35%</strong></div>
                                        <div class="float-right"><small class="text-muted">Biological Sciences</small></div>
                                    </div>
                                    <div class="progress progress-xxs">
                                        <div class="progress-bar bg-pink" role="progressbar" style="width: 35%"
                                            aria-valuenow="6" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </li>
                                <li>
                                    <div class="clearfix">
                                        <div class="float-left"><strong>63%</strong></div>
                                        <div class="float-right"><small class="text-muted">Sports Science</small></div>
                                    </div>
                                    <div class="progress progress-xxs">
                                        <div class="progress-bar bg-orange" role="progressbar" style="width: 63%"
                                            aria-valuenow="36" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="card-footer">
                            <div class="row text-center">
                                <div class="col-6 border-right">
                                    <label class="mb-0">Total Pass</label>
                                    <div class="font-20 font-weight-bold">845</div>
                                </div>
                                <div class="col-6">
                                    <label class="mb-0">Total Fail</label>
                                    <div class="font-20 font-weight-bold">142</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="righttab-Students" role="tabpanel">
                    <div id="users">
                        <div class="input-group mt-2 mb-2">
                            <input type="text" class="form-control search" placeholder="Search Student">
                        </div>
                        <ul class="right_chat list-unstyled list">
                            <li class="alfabet">A</li>
                            <li>
                                <a href="javascript:void(0);" class="media">
                                    <img class="media-object" src="assets/images/xs/avatar1.jpg" alt="">
                                    <div class="media-body">
                                        <span class="name">Abigail Churchill</span>
                                        <span class="message">Art & Design</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="media">
                                    <img class="media-object" src="assets/images/xs/avatar2.jpg" alt="">
                                    <div class="media-body">
                                        <span class="name">Alexandra Carr</span>
                                        <span class="message">Fashion</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="media">
                                    <img class="media-object" src="assets/images/xs/avatar3.jpg" alt="">
                                    <div class="media-body">
                                        <span class="name">Alison Berry</span>
                                        <span class="message">Fashion</span>
                                    </div>
                                </a>
                            </li>
                            <li class="alfabet">B</li>
                            <li>
                                <a href="javascript:void(0);" class="media">
                                    <img class="media-object" src="assets/images/xs/avatar4.jpg" alt="">
                                    <div class="media-body">
                                        <span class="name">Bella Alan</span>
                                        <span class="message">Sports Science</span>
                                    </div>
                                </a>
                            </li>
                            <li class="alfabet">C</li>
                            <li>
                                <a href="javascript:void(0);" class="media">
                                    <img class="media-object" src="assets/images/xs/avatar5.jpg" alt="">
                                    <div class="media-body">
                                        <span class="name">Caroline Alan</span>
                                        <span class="message">Sports Science</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="media">
                                    <img class="media-object" src="assets/images/xs/avatar6.jpg" alt="">
                                    <div class="media-body">
                                        <span class="name">Connor Campbell</span>
                                        <span class="message">Computers</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="media">
                                    <img class="media-object" src="assets/images/xs/avatar7.jpg" alt="">
                                    <div class="media-body">
                                        <span class="name">Charles Campbell</span>
                                        <span class="message">Computers</span>
                                    </div>
                                </a>
                            </li>
                            <li class="alfabet">D</li>
                            <li>
                                <a href="javascript:void(0);" class="media">
                                    <img class="media-object" src="assets/images/xs/avatar8.jpg" alt="">
                                    <div class="media-body">
                                        <span class="name">Donna Hudson</span>
                                        <span class="message">Computers</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="media">
                                    <img class="media-object" src="assets/images/xs/avatar9.jpg" alt="">
                                    <div class="media-body">
                                        <span class="name">Dylan Jones</span>
                                        <span class="message">Computers</span>
                                    </div>
                                </a>
                            </li>
                            <li class="alfabet">G</li>
                            <li>
                                <a href="javascript:void(0);" class="media">
                                    <img class="media-object" src="assets/images/xs/avatar8.jpg" alt="">
                                    <div class="media-body">
                                        <span class="name">Gordon Hudson</span>
                                        <span class="message">Sports Science</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="media">
                                    <img class="media-object" src="assets/images/xs/avatar9.jpg" alt="">
                                    <div class="media-body">
                                        <span class="name">Gabrielle Walker</span>
                                        <span class="message">Computers</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="media">
                                    <img class="media-object" src="assets/images/xs/avatar10.jpg" alt="">
                                    <div class="media-body">
                                        <span class="name">Gavin North</span>
                                        <span class="message">Computers</span>
                                    </div>
                                </a>
                            </li>
                            <li class="alfabet">S</li>
                            <li>
                                <a href="javascript:void(0);" class="media">
                                    <img class="media-object" src="assets/images/xs/avatar1.jpg" alt="">
                                    <div class="media-body">
                                        <span class="name">Stephanie Hudson</span>
                                        <span class="message">Sports Science</span>
                                    </div>
                                </a>
                            </li>
                            <li class="alfabet">W</li>
                            <li>
                                <a href="javascript:void(0);" class="media">
                                    <img class="media-object" src="assets/images/xs/avatar1.jpg" alt="">
                                    <div class="media-body">
                                        <span class="name">William Paige</span>
                                        <span class="message">Fashion</span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="user_chatbody chat_app">
                        <div class="card-header bline pt-1 pl-0 pr-0">
                            <h3 class="card-title">Abigail Churchill <small>Online</small></h3>
                            <div class="card-options">
                                <a href="javascript:void(0)" class="p-1" data-toggle="dropdown"><i
                                        class="fa fa-cog"></i></a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                    <a class="dropdown-item active" href="#">Online</a>
                                    <a class="dropdown-item" href="#">Away</a>
                                    <a class="dropdown-item" href="#">Do not disturb</a>
                                    <a class="dropdown-item" href="#">Invisible</a>
                                </div>
                                <a href="javascript:void(0)" class="p-1 chat_close"><i class="fa fa-close"></i></a>
                            </div>
                        </div>
                        <div class="chat_windows">
                            <ul class="mb-0">
                                <li class="other-message">
                                    <img class="avatar mr-3" src="assets/images/xs/avatar1.jpg" alt="avatar">
                                    <div class="message">
                                        <p class="bg-light-blue">Are we meeting today?</p>
                                        <span class="time">10:10 AM, Today</span>
                                    </div>
                                </li>
                                <li class="other-message">
                                    <img class="avatar mr-3" src="assets/images/xs/avatar1.jpg" alt="avatar">
                                    <div class="message">
                                        <p class="bg-light-blue">Hi Aiden, how are you? How is the project coming along?</p>
                                        <p class="bg-light-blue">Are we meeting today?</p>
                                        <span class="time">10:15 AM, Today</span>
                                    </div>
                                </li>
                                <li class="my-message">
                                    <div class="message">
                                        <p class="bg-light-gray">Project has been already finished and I have results to
                                            show you.</p>
                                        <div class="file_folder">
                                            <a href="javascript:void(0);">
                                                <div class="icon">
                                                    <i class="fa fa-file-excel-o text-success"></i>
                                                </div>
                                                <div class="file-name">
                                                    <p class="mb-0 text-muted">Report2017.xls</p>
                                                    <small>Size: 68KB</small>
                                                </div>
                                            </a>
                                        </div>
                                        <span class="time">10:17 AM, Today</span>
                                    </div>
                                </li>
                                <li class="other-message">
                                    <img class="avatar mr-3" src="assets/images/xs/avatar1.jpg" alt="avatar">
                                    <div class="message">
                                        <div class="media_img">
                                            <img src="assets/images/gallery/1.jpg" class="w100 img-thumbnail" alt="">
                                            <img src="assets/images/gallery/2.jpg" class="w100 img-thumbnail" alt="">
                                        </div>
                                        <span class="time">10:15 AM, Today</span>
                                    </div>
                                </li>
                                <li class="other-message">
                                    <img class="avatar mr-3" src="assets/images/xs/avatar1.jpg" alt="avatar">
                                    <div class="message">
                                        <p class="bg-light-blue">Are we meeting today I have results?</p>
                                        <span class="time">10:18 AM, Today</span>
                                    </div>
                                </li>
                                <li class="my-message">
                                    <div class="message">
                                        <p class="bg-light-gray">Well we have good budget for the project</p>
                                        <span class="time">10:25 AM, Today</span>
                                    </div>
                                </li>
                            </ul>
                            <div class="chat-message clearfix">
                                <a href="javascript:void(0);"><i class="icon-camera"></i></a>
                                <a href="javascript:void(0);"><i class="icon-camcorder"></i></a>
                                <a href="javascript:void(0);"><i class="icon-paper-plane"></i></a>
                                <div class="input-group mb-0">
                                    <input type="text" class="form-control" placeholder="Enter text here...">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="righttab-Todo" role="tabpanel">
                    <ul class="list-unstyled mb-0 todo_list">
                        <li>
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name="example-checkbox1" value="option1"
                                    checked="">
                                <span class="custom-control-label">Report Panel Usag</span>
                            </label>
                        </li>
                        <li>
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name="example-checkbox1"
                                    value="option1">
                                <span class="custom-control-label">Report Panel Usag</span>
                            </label>
                        </li>
                        <li>
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name="example-checkbox1" value="option1"
                                    checked="">
                                <span class="custom-control-label">New logo design for Angular Admin</span>
                            </label>
                        </li>
                        <li>
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name="example-checkbox1"
                                    value="option1">
                                <span class="custom-control-label">Design PSD files for Angular Admin</span>
                            </label>
                        </li>
                        <li>
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name="example-checkbox1" value="option1"
                                    checked="">
                                <span class="custom-control-label">New logo design for Angular Admin</span>
                            </label>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Start Main leftbar navigation -->
        <div id="left-sidebar" class="sidebar">
            <h5 class="brand-name">I.E.P 82857 LIVES<a href="javascript:void(0)" class="menu_option float-right"><i
                        class="icon-grid font-16" data-toggle="tooltip" data-placement="left"
                        title="Grilla o Lista"></i></a></h5>
            <ul class="nav nav-tabs">
                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#menu-uni">Académico</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#menu-admin">Admin</a></li>
            </ul>
            <div class="tab-content mt-3">
                <div class="tab-pane fade show active" id="menu-uni" role="tabpanel">
                    <nav class="sidebar-nav">
                        <ul class="metismenu">
                            <li class="opcion_tab2 active">
                                <router-link to="/inicio" id="home_tab" data-toggle="tab" class="opcion_tab"
                                    aria-current="page" onclick="evaluar_opciones()">
                                    <i class="fa fa-dashboard"></i><span>Inicio</span>
                                </router-link>
                            </li>
                            <li class="opcion_tab2">
                                <router-link to="/matriculas" id="matriculas_tab" data-toggle="tab" class="opcion_tab"
                                    aria-current="page" onclick="evaluar_opciones()">
                                    <i class="fa fa-book"></i><span>Matriculas</span>
                                </router-link>
                            </li>
                            <li class="opcion_tab2">
                                <router-link to="/asistencia" id="asistencia_tab" data-toggle="tab" class="opcion_tab"
                                    aria-current="page" onclick="evaluar_opciones()">
                                    <i class="fa-solid fa-table-list"></i><span>Asistencia</span>
                                </router-link>
                            </li>
                            <li class="opcion_tab2">
                                <router-link to="/horarios" id="horarios_tab" data-toggle="tab" class="opcion_tab"
                                    aria-current="page" onclick="evaluar_opciones()">
                                    <i class="fa fa-bullhorn"></i><span>Horario</span>
                                </router-link>
                            </li>
                            <li class="opcion_tab2">
                                <router-link to="/notas" id="notas_tab" data-toggle="tab" class="opcion_tab"
                                    aria-current="page" onclick="evaluar_opciones()">
                                    <i class="fa-solid fa-clipboard"></i><span>Notas</span>
                                </router-link>
                            </li>

                            <li class="opcion_tab2">
                            </li>
                            <li class="g_heading">Reportes</li>
                            <li class="opcion_tab2">
                                <!-- <a href="#"><i class="fa fa-folder"></i><span>Reportes</span></a> -->
                                <router-link to="/reportes-generales" id="resportes_tab" data-toggle="tab"
                                    class="opcion_tab" aria-current="page" onclick="evaluar_opciones()">
                                    <i class="fa fa-folder"></i><span>Generales</span>
                                </router-link>
                            </li>
                            <li class="opcion_tab2">
                                <!-- <a href="#"><i class="fa fa-folder"></i><span>Reportes</span></a> -->
                                <router-link to="/reportes-alumno" id="resportes_tab" data-toggle="tab" class="opcion_tab"
                                    aria-current="page" onclick="evaluar_opciones()">
                                    <i class="fa fa-folder-tree"></i><span>Por Alumno</span>
                                </router-link>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="tab-pane fade" id="menu-admin" role="tabpanel">
                    <nav class="sidebar-nav">
                        <ul class="metismenu">
                            <li class="g_heading">Actividades Adminitrativas</li>
                            <li class="opcion_tab2">
                                <!-- <a href="#"><i class="fa-solid fa-table"></i><span>Aulas</span></a> -->
                                <router-link to="/ambientes" id="aulas_tab" data-toggle="tab" class="opcion_tab"
                                    aria-current="page" onclick="evaluar_opciones()">
                                    <i class="fa-solid fa-table"></i><span>Ambientes</span>
                                </router-link>
                            </li>
                            <li class="opcion_tab2">
                                <!-- <a href="#"><i class="fa fa-users"></i><span>Alumnos</span></a> -->
                                <router-link to="/personal" id="alumnos_tab" data-toggle="tab" class="opcion_tab"
                                    aria-current="page" onclick="evaluar_opciones()">
                                    <i class="fa-solid fa-chalkboard-user"></i><span>Personal Académico</span>
                                </router-link>
                            </li>
                            <li class="opcion_tab2">
                                <!-- <a href="#"><i class="fa-solid fa-table"></i><span>Aulas</span></a> -->
                                <router-link to="/anios" id="aulas_tab" data-toggle="tab" class="opcion_tab"
                                    aria-current="page" onclick="evaluar_opciones()">
                                    <i class="fa-solid fa-calendar-days"></i><span>Año Escolar</span>
                                </router-link>
                            </li>
                            <li class="opcion_tab2">
                                <!-- <a href="#"><i class="fa fa-calendar-check-o"></i><span>Periodos</span></a> -->
                                <router-link to="/periodos" id="periodos_tab" data-toggle="tab" class="opcion_tab"
                                    aria-current="page" onclick="evaluar_opciones()">
                                    <i class="fa fa-calendar-check-o"></i><span>Periodo Académico</span>
                                </router-link>
                            </li>
                            <li class="opcion_tab2">
                                <!-- <a href="#"><i class="fa fa-calendar-check-o"></i><span>Periodos</span></a> -->
                                <router-link to="/cursos" id="periodos_tab" data-toggle="tab" class="opcion_tab"
                                    aria-current="page" onclick="evaluar_opciones()">
                                    <i class="fa-solid fa-book"></i><span>Cursos</span>
                                </router-link>
                            </li>
                            <li class="opcion_tab2">
                                <!--  <a href="#"><i class="fa fa-layer-group"></i><span>Grados</span></a> -->
                                <router-link to="/grados-secciones" id="grados_tab" data-toggle="tab" class="opcion_tab"
                                    aria-current="page" onclick="evaluar_opciones()">
                                    <i class="fa fa-layer-group"></i><span>Grados y Secciones</span>
                                </router-link>
                            </li>
                            <!-- <li class="g_heading">....</li> -->
                            <li class="opcion_tab2">
                                <!-- <a href="#"><i class="fa-solid fa-window-restore"></i><span>Cursos</span></a> -->
                                <router-link to="/asignar-cursos" id="cursos_tab" data-toggle="tab" class="opcion_tab"
                                    aria-current="page" onclick="evaluar_opciones()">
                                    <i class="fa-solid fa-window-restore"></i><span>Asignar Cursos</span>
                                </router-link>
                            </li>
                            <li class="opcion_tab2">
                                <!-- <a href="#"><i class="fa-solid fa-window-restore"></i><span>Cursos</span></a> -->
                                <router-link to="/asignar-grados" id="cursos_tab" data-toggle="tab" class="opcion_tab"
                                    aria-current="page" onclick="evaluar_opciones()">
                                    <i class="fa-solid fa-shapes"></i><span>Asignar Grados</span>
                                </router-link>
                            </li>
                            <li class="opcion_tab2">
                                <!-- <a href="#"><i class="fa fa-users"></i><span>Alumnos</span></a> -->
                                <router-link to="/alumnos" id="alumnos_tab" data-toggle="tab" class="opcion_tab"
                                    aria-current="page" onclick="evaluar_opciones()">
                                    <i class="fa fa-users"></i><span>Alumnos</span>
                                </router-link>
                            </li>

                            <!--  <li class="opcion_tab2">
                                <router-link to="/niveles" id="usuarios_tab" data-toggle="tab" class="opcion_tab" aria-current="page" onclick="evaluar_opciones()">
                                    <i class="fa fa-layer-group"></i><span>Niveles</span>
                                </router-link>
                            </li>

                            <li class="opcion_tab2">
                                <router-link to="/secciones" id="secciones_tab" data-toggle="tab" class="opcion_tab" aria-current="page" onclick="evaluar_opciones()">
                                    <i class="fa fa-layer-group"></i><span>Secciones</span>
                                </router-link>
                            </li> -->
                            <li class="g_heading">Seguridad</li>
                            <li class="opcion_tab2">
                                <!-- <a href="#"><i class="fa fa-user-circle-o"></i><span>Usuarios</span></a> -->
                                <router-link to="/roles" id="roles_tab" data-toggle="tab" class="opcion_tab"
                                    aria-current="page" onclick="evaluar_opciones()">
                                    <i class="fa-solid fa-toolbox"></i><span>Roles</span>
                                </router-link>
                            </li>
                            <li class="opcion_tab2">
                                <!-- <a href="#"><i class="fa fa-user-circle-o"></i><span>Usuarios</span></a> -->
                                <router-link to="/usuarios" id="usuarios_tab" data-toggle="tab" class="opcion_tab"
                                    aria-current="page" onclick="evaluar_opciones()">
                                    <i class="fa fa-user-circle-o"></i><span>Usuarios</span>
                                </router-link>
                            </li>
                            <li class="opcion_tab2">
                                <!--  <a href="#"><i class="fa-solid fa-gears"></i><span>Institucion Educativa</span></a> -->
                                <router-link to="/institucion-educativa" id="institucion-educativa_tab" data-toggle="tab"
                                    class="opcion_tab" aria-current="page" onclick="evaluar_opciones()">
                                    <i class="fa-solid fa-gears"></i><span>Institucion Educativa</span>
                                </router-link>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>

        <!-- Start project content area -->
        <div class="page" style="display: flex;height: 100vh;flex-direction: column;">
            <!-- Start Page header -->
            <div class="section-body sticky-top" id="page_top">
                <div class="container-fluid">
                    <div class="page-header">
                        <div class="left">
                            <div class="input-group d-none">
                                <input type="text" class="form-control" placeholder="What you want to find">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button">Search</button>
                                </div>
                            </div>
                        </div>
                        <div class="right">
                            <ul class="nav nav-pills d-none">
                                <li class="nav-item dropdown ">
                                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                                        aria-haspopup="true" aria-expanded="false">Pages</a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="page-empty.html">Empty page</a>
                                        <a class="dropdown-item" href="page-profile.html">Profile</a>
                                        <a class="dropdown-item" href="page-search.html">Search Results</a>
                                        <a class="dropdown-item" href="page-timeline.html">Timeline</a>
                                        <a class="dropdown-item" href="page-invoices.html">Invoices</a>
                                        <a class="dropdown-item" href="page-pricing.html">Pricing</a>
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                                        aria-haspopup="true" aria-expanded="false">Auth</a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="login.html">Login</a>
                                        <a class="dropdown-item" href="register.html">Register</a>
                                        <a class="dropdown-item" href="forgot-password.html">Forgot password</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="404.html">404 error</a>
                                        <a class="dropdown-item" href="500.html">500 error</a>
                                    </div>
                                </li>
                            </ul>
                            <div class="notification d-flex">
                                <div class="dropdown d-none">
                                    <a class="nav-link icon d-none d-md-flex btn btn-default btn-icon ml-1"
                                        data-toggle="dropdown"><i class="fa fa-language"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                        <a class="dropdown-item" href="#"><img class="w20 mr-2"
                                                src="assets/images/flags/us.svg" alt="">English</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#"><img class="w20 mr-2"
                                                src="assets/images/flags/es.svg" alt="">Spanish</a>
                                        <a class="dropdown-item" href="#"><img class="w20 mr-2"
                                                src="assets/images/flags/jp.svg" alt="">japanese</a>
                                        <a class="dropdown-item" href="#"><img class="w20 mr-2"
                                                src="assets/images/flags/bl.svg" alt="">France</a>
                                    </div>
                                </div>
                                <div class="dropdown d-flex">
                                    <a class="nav-link icon d-none d-md-flex btn btn-default btn-icon ml-1"
                                        data-toggle="dropdown"><i class="fa fa-envelope"></i><span
                                            class="badge badge-success nav-unread"></span></a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                        <ul class="right_chat list-unstyled w350 p-0">
                                            <li class="online">
                                                <a href="javascript:void(0);" class="media">
                                                    <img class="media-object" src="assets/images/xs/avatar4.jpg" alt="">
                                                    <div class="media-body">
                                                        <span class="name">Donald Gardner</span>
                                                        <div class="message">It is a long established fact that a reader
                                                        </div>
                                                        <small>11 mins ago</small>
                                                        <span class="badge badge-outline status"></span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="online">
                                                <a href="javascript:void(0);" class="media">
                                                    <img class="media-object " src="assets/images/xs/avatar5.jpg" alt="">
                                                    <div class="media-body">
                                                        <span class="name">Wendy Keen</span>
                                                        <div class="message">There are many variations of passages of Lorem
                                                            Ipsum</div>
                                                        <small>18 mins ago</small>
                                                        <span class="badge badge-outline status"></span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="offline">
                                                <a href="javascript:void(0);" class="media">
                                                    <img class="media-object " src="assets/images/xs/avatar2.jpg" alt="">
                                                    <div class="media-body">
                                                        <span class="name">Matt Rosales</span>
                                                        <div class="message">Contrary to popular belief, Lorem Ipsum is not
                                                            simply</div>
                                                        <small>27 mins ago</small>
                                                        <span class="badge badge-outline status"></span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="online">
                                                <a href="javascript:void(0);" class="media">
                                                    <img class="media-object " src="assets/images/xs/avatar3.jpg" alt="">
                                                    <div class="media-body">
                                                        <span class="name">Phillip Smith</span>
                                                        <div class="message">It has roots in a piece of classical Latin
                                                            literature from 45 BC</div>
                                                        <small>33 mins ago</small>
                                                        <span class="badge badge-outline status"></span>
                                                    </div>
                                                </a>
                                            </li>
                                        </ul>
                                        <div class="dropdown-divider"></div>
                                        <a href="javascript:void(0)"
                                            class="dropdown-item text-center text-muted-dark readall">Mark all as read</a>
                                    </div>
                                </div>
                                <div class="dropdown d-flex">
                                    <a class="nav-link icon d-none d-md-flex btn btn-default btn-icon ml-1"
                                        data-toggle="dropdown"><i class="fa fa-bell"></i><span
                                            class="badge badge-primary nav-unread"></span></a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                        <ul class="list-unstyled feeds_widget">
                                            <li>
                                                <div class="feeds-left">
                                                    <span class="avatar avatar-blue"><i class="fa fa-check"></i></span>
                                                </div>
                                                <div class="feeds-body ml-3">
                                                    <p class="text-muted mb-0">Campaign <strong
                                                            class="text-blue font-weight-bold">Holiday</strong> is nearly
                                                        reach budget limit.</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="feeds-left">
                                                    <span class="avatar avatar-green"><i class="fa fa-user"></i></span>
                                                </div>
                                                <div class="feeds-body ml-3">
                                                    <p class="text-muted mb-0">New admission <strong
                                                            class="text-green font-weight-bold">32</strong> in computer
                                                        department.</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="feeds-left">
                                                    <span class="avatar avatar-red"><i class="fa fa-info"></i></span>
                                                </div>
                                                <div class="feeds-body ml-3">
                                                    <p class="text-muted mb-0">6th sem result <strong
                                                            class="text-red font-weight-bold">67%</strong> in computer
                                                        department.</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="feeds-left">
                                                    <span class="avatar avatar-azure"><i
                                                            class="fa fa-thumbs-o-up"></i></span>
                                                </div>
                                                <div class="feeds-body ml-3">
                                                    <p class="text-muted mb-0">New Feedback <strong
                                                            class="text-azure font-weight-bold">53</strong> for university
                                                        assessment.</p>
                                                </div>
                                            </li>
                                        </ul>
                                        <div class="dropdown-divider"></div>
                                        <a href="javascript:void(0)"
                                            class="dropdown-item text-center text-muted-dark readall">Mark all as read</a>
                                    </div>
                                </div>
                                <div class="dropdown d-flex">
                                    <a href="javascript:void(0)" class="chip ml-3" data-toggle="dropdown">
                                        <span class="avatar"
                                            style="background-image: url(https://cdn-icons-png.flaticon.com/512/149/149071.png)"></span>
                                        {{ user.name }}</a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                        <a class="dropdown-item" href="javascript:void(0)"><i
                                                class="dropdown-icon fe fe-user"></i> Perfil</a>
                                        <a class="dropdown-item" href="javascript:void(0)"><i
                                                class="dropdown-icon fe fe-settings"></i> Ajustes</a>
                                        <a class="dropdown-item" href="javascript:void(0)"><span class="float-right"><span
                                                    class="badge badge-primary">6</span></span><i
                                                class="dropdown-icon fe fe-mail"></i> Inbox</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="javascript:void(0)"><i
                                                class="dropdown-icon fe fe-help-circle"></i> Ayuda en Línea</a>

                                        <a class="dropdown-item" href="#" @click.prevent="logout">
                                            <i class="dropdown-icon fe fe-log-out"></i>Cerrar Sesión
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Start Page title and tab -->
            <div class="tab-content">
                <div class="tab-pane fade show active" role="tabpanel">
                    <router-view></router-view>
                </div>
            </div>
            <!-- Start main footer -->
            <div class="section-body mt-auto">
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                Copyright © 2022 <a href="#"></a>.
                            </div>
                            <div class="col-md-6 col-sm-12 text-md-right">
                                Todos los derechos reservados.
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </main>
    <main v-else>
        <div class="card-body text-center">
            <div class="display-1 text-muted mb-5">
                <img src="assets/images/error_401.png" alt="error_401" width="70%">
            </div>
            <h1 class="h3 mb-4">Ups... Usuario Deshabilitado ...</h1>
            <p class="h6 text-muted font-weight-normal mb-3">Lo sentimos, este usuario actualmente esta deshabilitado,
                contactese con el adminitrador…&hellip;</p>
            <a class="btn btn-primary" href="#" @click.prevent="logout"><i class="dropdown-icon fe fe-log-out"></i>Salir</a>
        </div>
    </main>
</template>
<script>
let user = document.head.querySelector('meta[name="user"]');
export default {
    data() {
        return {
        }
    },
    computed: {
        user() {
            return JSON.parse(user.content);
        }
    },
    methods: {
        logout: function () {
            if (window.confirm("¿Estás seguro de que deseas cerrar sesión?")) {
                // Si el usuario confirma, realiza el logout
                axios.post('logout').then(response => {
                    window.location.href = '/login';
                })
            }
        },
    },
}
</script>
