<template>
    <div >
       <div class="section-body">
            <div class="container-fluid">
                <div class="d-flex justify-content-between align-items-center ">
                    <div class="header-action">
                        <h1 class="page-title">Matriculas</h1>
                        <ol class="breadcrumb page-breadcrumb d-none">
                            <li class="breadcrumb-item"><a href="#">Ericsson</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Matriculas</li>
                        </ol>
                    </div>
                    <ul class="nav nav-tabs page-header-tab">
                        <li id="li-all-matriculation" class="nav-item"><a id="link-all-matriculation" class="nav-link active" data-toggle="tab" href="#">Ver Lista</a></li>
                        <li id="li-grid-matriculation" class="nav-item d-none"><a id="link-grid-matriculation" class="nav-link " data-toggle="tab" href="#">Ver Cuadricula</a></li>
                        <li id="li-add-matriculation" class="nav-item d-none"><a id="link-add-matriculation" class="nav-link" data-toggle="tab" href="#">Registrar Matricula</a></li>
                        <li id="li-update-matriculation" class="nav-item d-none"><a id="link-update-matriculation" class="nav-link" data-toggle="tab" href="#">Actualizar Matricula</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="section-body mt-4">
            <div class="container-fluid">
                <div class="tab-content">
                  <!--   <div class="tab-pane active" style="text-align: center;">
                        <h4 class="error-subtitle mb-4">Vista en mantenimiento</h4>
                        <img src="assets/images/error/maintenance.svg" class="img-fluid error-image" alt="maintenance" width="40%">
                    </div> -->
                    <div class="tab-pane active" id="Matriculation-all">
                        <a @click="mostrar_crear()" style="background: rgb(0,147,221);background: linear-gradient(180deg, rgba(0,147,221,1) 0%, rgba(115,162,235,1) 100%);" class="btn btn-primary mb-4" href="#">Registrar Matricula</a>
                        <div class="card row">
                            <div class="card-body col-md-12">
                                <div class="">
                                    <table id="table-matriculas" class="display " style="width:100%">
                                        <thead>
                                            <tr>
                                                <th class="d-none">#</th>
                                                <th >DNI</th>
                                                <th>ALUMNO</th>
                                                <th>NIVEL</th>
                                                <th>GRADO</th>
                                                <th>AULA</th>
                                                <th>FECHA MATRICULA</th>
                                                <th>MATRICULADO POR</th>
                                                <th>ESTADO</th>
                                                <!-- <th>OPCIONES</th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="(item, index) in matriculas" :key="index">
                                                <td class="d-none">{{item.mat_id}}</td>
                                                <td >{{item.dni}}</td>
                                                <td>{{item.alumno}}</td>
                                                <td>{{item.nivel}}</td>
                                                <td>{{item.grado}} {{item.seccion}}</td>
                                                <td>{{item.aula}}</td>
                                                <td>{{item.mat_fecha}}</td>
                                                <td>{{item.apoderado}}</td>
                                                <td>
                                                    <span v-if="item.mat_estado==1" class="tag tag-success">Activa</span>
                                                    <span v-else-if="item.mat_estado==2" class="tag tag-orange">Inactiva</span>
                                                    <span v-else class="tag tag-danger">Retirado</span>
                                                </td>
                                                <!-- <td>
                                                    <button type="button" class="btn btn-icon btn-sm d-none" title="View"><i class="fa fa-eye"></i></button>
                                                    <button type="button" class="btn btn-icon btn-sm" title="Editar" @click="mostrar_actualizar(item)"><i class="fa fa-edit"></i></button>
                                                    <button type="button" class="btn btn-icon btn-sm js-sweetalert" title="Eliminar" data-type="confirm" @click="eliminar_matricula(item.id_matricula)"><i class="fa fa-trash-o text-danger"></i></button>
                                                </td> -->
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="Matriculation-grid">
                        <div class="row">
                            <div class="col-xl-3 col-lg-4 col-md-6">
                                <div class="card">
                                    <div class="card-body text-center">
                                        <img class="card-profile-img" src="assets/images/sm/avatar1.jpg" alt="">
                                        <h5 class="mb-0">Peter Richards</h5>
                                        <span>Librarian</span>
                                        <div class="text-muted">+ (916) 369-7180</div>
                                        <p class="mb-4 mt-3">449 Thompson St, Conway, SC, 29527</p>
                                        <button class="btn btn-primary btn-sm">Read More</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-6">
                                <div class="card">
                                    <div class="card-body text-center ribbon">
                                        <div class="ribbon-box orange" data-toggle="tooltip" title="Permanent"><i class="fa fa-star"></i></div>
                                        <img class="card-profile-img" src="assets/images/sm/avatar2.jpg" alt="">
                                        <h5 class="mb-0">Ken Smith</h5>
                                        <span>Clerk</span>
                                        <div class="text-muted">+ (916) 369-7180</div>
                                        <p class="mb-4 mt-3">449 Thompson St, Conway, SC, 29527</p>
                                        <button class="btn btn-primary btn-sm">Read More</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-6">
                                <div class="card">
                                    <div class="card-body text-center">
                                        <img class="card-profile-img" src="assets/images/sm/avatar3.jpg" alt="">
                                        <h5 class="mb-0">Alan Johnson</h5>
                                        <span>Librarian</span>
                                        <div class="text-muted">+ (916) 369-7180</div>
                                        <p class="mb-4 mt-3">5290 NE 50th Rd, Osceola, MO, 64776</p>
                                        <button class="btn btn-primary btn-sm">Read More</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-6">
                                <div class="card">
                                    <div class="card-body text-center">
                                        <img class="card-profile-img" src="assets/images/sm/avatar4.jpg" alt="">
                                        <h5 class="mb-0">Alice A Smith</h5>
                                        <span>Clerk</span>
                                        <div class="text-muted">+ (916) 369-7180</div>
                                        <p class="mb-4 mt-3">462 Acacia Ave, Blythe, CA, 92225</p>
                                        <button class="btn btn-primary btn-sm">Read More</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-6">
                                <div class="card">
                                    <div class="card-body text-center ribbon">
                                        <div class="ribbon-box orange" data-toggle="tooltip" title="Permanent"><i class="fa fa-star"></i></div>
                                        <img class="card-profile-img" src="assets/images/sm/avatar5.jpg" alt="">
                                        <h5 class="mb-0">Gerald K Smith</h5>
                                        <span>Receptionist</span>
                                        <div class="text-muted">+ (916) 369-7180</div>
                                        <p class="mb-4 mt-3">449 Thompson St, Conway, SC, 29527</p>
                                        <button class="btn btn-primary btn-sm">Read More</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-6">
                                <div class="card">
                                    <div class="card-status bg-yellow"></div>
                                    <div class="card-body text-center">
                                        <img class="card-profile-img" src="assets/images/sm/avatar6.jpg" alt="">
                                        <h5 class="mb-0">Peter Richards</h5>
                                        <span>Purchase Officer</span>
                                        <div class="text-muted">+ (916) 369-7180</div>
                                        <p class="mb-4 mt-3">449 Thompson St, Conway, SC, 29527</p>
                                        <button class="btn btn-primary btn-sm">Read More</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-6">
                                <div class="card">
                                    <div class="card-body text-center">
                                        <img class="card-profile-img" src="assets/images/sm/avatar3.jpg" alt="">
                                        <h5 class="mb-0">Alan Johnson</h5>
                                        <span>Peon</span>
                                        <div class="text-muted">+ (916) 369-7180</div>
                                        <p class="mb-4 mt-3">5290 NE 50th Rd, Osceola, MO, 64776</p>
                                        <button class="btn btn-primary btn-sm">Read More</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-6">
                                <div class="card">
                                    <div class="card-body text-center ribbon">
                                        <div class="ribbon-box green" data-toggle="tooltip" title="Assistent"><i class="fa fa-star"></i></div>
                                        <img class="card-profile-img" src="assets/images/sm/avatar2.jpg" alt="">
                                        <h5 class="mb-0">Ken Smith</h5>
                                        <span>Lab Assistent</span>
                                        <div class="text-muted">+ (916) 369-7180</div>
                                        <p class="mb-4 mt-3">449 Thompson St, Conway, SC, 29527</p>
                                        <button class="btn btn-primary btn-sm">Read More</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-6">
                                <div class="card">
                                    <div class="card-body text-center ribbon">
                                        <div class="ribbon-box orange" data-toggle="tooltip" title="Permanent"><i class="fa fa-star"></i></div>
                                        <img class="card-profile-img" src="assets/images/sm/avatar5.jpg" alt="">
                                        <h5 class="mb-0">Gerald K Smith</h5>
                                        <span>Peon</span>
                                        <div class="text-muted">+ (916) 369-7180</div>
                                        <p class="mb-4 mt-3">449 Thompson St, Conway, SC, 29527</p>
                                        <button class="btn btn-primary btn-sm">Read More</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-6">
                                <div class="card">
                                    <div class="card-body text-center">
                                        <img class="card-profile-img" src="assets/images/sm/avatar4.jpg" alt="">
                                        <h5 class="mb-0">Alice A Smith</h5>
                                        <span>Driver</span>
                                        <div class="text-muted">+ (916) 369-7180</div>
                                        <p class="mb-4 mt-3">462 Acacia Ave, Blythe, CA, 92225</p>
                                        <button class="btn btn-primary btn-sm">Read More</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="Matriculation-profile">
                        <div class="row">
                            <div class="col-xl-4 col-md-12">
                                <div class="card">
                                    <div class="card-body w_user">
                                        <div class="user_avtar">
                                            <img class="rounded-circle" src="assets/images/sm/avatar2.jpg" alt="">
                                        </div>
                                        <div class="wid-u-info">
                                            <h5>Dessie Parks</h5>
                                            <p class="text-muted m-b-0">119 Peepee Way, Hilo, HI, 96720</p>
                                            <ul class="list-unstyled">
                                                <li>
                                                    <h5 class="mb-0">270</h5>
                                                    <small>Followers</small>
                                                </li>
                                                <li>
                                                    <h5 class="mb-0">310</h5>
                                                    <small>Following</small>
                                                </li>
                                                <li>
                                                    <h5 class="mb-0">908</h5>
                                                    <small>Liks</small>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">About Me</h3>
                                        <div class="card-options ">
                                            <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                                            <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
                                        </div>
                                    </div>
									<div class="card-body">
										<p>Hello I am Celena Anderson a Clerk in Xyz College USA. I love to work with all my college staff and seniour professors.</p>
										<ul class="list-group">
                                            <li class="list-group-item">
                                                <b>Gender </b>
                                                <div class="pull-right">Female</div>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Department</b>
                                                <div class="pull-right">Mechanical</div>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Email </b>
                                                <div class="pull-right">test@example.com</div>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Phone</b>
                                                <div class="pull-right">1234567890</div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="clearfix">
                                                    <div class="float-left"><strong>Study</strong></div>
                                                    <div class="float-right"><small class="text-muted">35%</small></div>
                                                </div>
                                                <div class="progress progress-xxs">
                                                    <div class="progress-bar bg-pink" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="clearfix">
                                                    <div class="float-left"><strong>Cricket</strong></div>
                                                    <div class="float-right"><small class="text-muted">72%</small></div>
                                                </div>
                                                <div class="progress progress-xxs">
                                                    <div class="progress-bar bg-blue" role="progressbar" style="width: 72%" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="clearfix">
                                                    <div class="float-left"><strong>Music</strong></div>
                                                    <div class="float-right"><small class="text-muted">60%</small></div>
                                                </div>
                                                <div class="progress progress-xxs">
                                                    <div class="progress-bar bg-green" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="row">
											<div class="col-md-4 col-sm-4 col-6">
												<div class="font-18 font-weight-bold">37</div>
												<div>Projects</div>
											</div>
											<div class="col-md-4 col-sm-4 col-6">
												<div class="font-18 font-weight-bold">51</div>
												<div>Tasks</div>
											</div>
											<div class="col-md-4 col-sm-4 col-6">
												<div class="font-18 font-weight-bold">61</div>
												<div>Uploads</div>
											</div>
										</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-8 col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Timeline Activity</h3>
                                        <div class="card-options">
                                            <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                                            <a href="#" class="card-options-fullscreen" data-toggle="card-fullscreen"><i class="fe fe-maximize"></i></a>
                                            <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
                                            <div class="item-action dropdown ml-2">
                                                <a href="javascript:void(0)" data-toggle="dropdown"><i class="fe fe-more-vertical"></i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fa fa-eye"></i> View Details </a>
                                                    <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fa fa-share-alt"></i> Share </a>
                                                    <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fa fa-cloud-download"></i> Download</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fa fa-copy"></i> Copy to</a>
                                                    <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fa fa-folder"></i> Move to</a>
                                                    <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fa fa-edit"></i> Rename</a>
                                                    <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fa fa-trash"></i> Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="summernote">
                                            Hello there,
                                            <br/>
                                            <p>The toolbar can be customized and it also supports various callbacks such as <code>oninit</code>, <code>onfocus</code>, <code>onpaste</code> and many more.</p>
                                            <p>Please try <b>paste some texts</b> here</p>
                                        </div>
                                        <div class="timeline_item ">
                                            <img class="tl_avatar" src="assets/images/xs/avatar1.jpg" alt="" />
                                            <span><a href="javascript:void(0);">Elisse Joson</a> San Francisco, CA <small class="float-right text-right">20-April-2019 - Today</small></span>
                                            <h6 class="font600">Hello, 'Im a single div responsive timeline without media Queries!</h6>
                                            <div class="msg">
                                                <p>I'm speaking with myself, number one, because I have a very good brain and I've said a lot of things. I write the best placeholder text, and I'm the biggest developer on the web card she has is the Lorem card.</p>
                                                <a href="javascript:void(0);" class="mr-20 text-muted"><i class="fa fa-heart text-pink"></i> 12 Love</a>
                                                <a class="text-muted" role="button" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample"><i class="fa fa-comments"></i> 1 Comment</a>
                                                <div class="collapse p-4 section-gray mt-2" id="collapseExample">
                                                    <form class="well">
                                                        <div class="form-group">
                                                            <textarea rows="2" class="form-control no-resize" placeholder="Enter here for tweet..."></textarea>
                                                        </div>
                                                        <button class="btn btn-primary">Submit</button>
                                                    </form>
                                                    <ul class="recent_comments list-unstyled mt-4 mb-0">
                                                        <li>
                                                            <div class="avatar_img">
                                                                <img class="rounded img-fluid" src="assets/images/xs/avatar4.jpg" alt="">
                                                            </div>
                                                            <div class="comment_body">
                                                                <h6>Donald Gardner <small class="float-right font-14">Just now</small></h6>
                                                                <p>Lorem ipsum Veniam aliquip culpa laboris minim tempor</p>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="timeline_item ">
                                            <img class="tl_avatar" src="assets/images/xs/avatar4.jpg" alt="" />
                                            <span><a href="javascript:void(0);" title="">Dessie Parks</a> Oakland, CA <small class="float-right text-right">19-April-2019 - Yesterday</small></span>
                                            <h6 class="font600">Oeehhh, that's awesome.. Me too!</h6>
                                            <div class="msg">
                                                <p>I'm speaking with myself, number one, because I have a very good brain and I've said a lot of things. on the web by far... While that's mock-ups and this is politics, are they really so different? I think the only card she has is the Lorem card.</p>
                                                <div class="timeline_img mb-20">
                                                    <img class="width100" src="assets/images/gallery/1.jpg" alt="Awesome Image">
                                                    <img class="width100" src="assets/images/gallery/2.jpg" alt="Awesome Image">
                                                </div>
                                                <a href="javascript:void(0);" class="mr-20 text-muted"><i class="fa fa-heart text-pink"></i> 23 Love</a>
                                                <a class="text-muted" role="button" data-toggle="collapse" href="#collapseExample1" aria-expanded="false" aria-controls="collapseExample1"><i class="fa fa-comments"></i> 2 Comment</a>
                                                <div class="collapse p-4 section-gray mt-2" id="collapseExample1">
                                                    <form class="well">
                                                        <div class="form-group">
                                                            <textarea rows="2" class="form-control no-resize" placeholder="Enter here for tweet..."></textarea>
                                                        </div>
                                                        <button class="btn btn-primary">Submit</button>
                                                    </form>
                                                    <ul class="recent_comments list-unstyled mt-4 mb-0">
                                                        <li>
                                                            <div class="avatar_img">
                                                                <img class="rounded img-fluid" src="assets/images/xs/avatar4.jpg" alt="">
                                                            </div>
                                                            <div class="comment_body">
                                                                <h6>Donald Gardner <small class="float-right font-14">Just now</small></h6>
                                                                <p>Lorem ipsum Veniam aliquip culpa laboris minim tempor</p>
                                                                <div class="timeline_img mb-20">
                                                                    <img class="width150" src="assets/images/gallery/7.jpg" alt="Awesome Image">
                                                                    <img class="width150" src="assets/images/gallery/8.jpg" alt="Awesome Image">
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="avatar_img">
                                                                <img class="rounded img-fluid" src="assets/images/xs/avatar3.jpg" alt="">
                                                            </div>
                                                            <div class="comment_body">
                                                                <h6>Dessie Parks <small class="float-right font-14">1min ago</small></h6>
                                                                <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking</p>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="timeline_item ">
                                            <img class="tl_avatar" src="assets/images/xs/avatar7.jpg" alt="" />
                                            <span><a href="javascript:void(0);" title="" >Rochelle Barton</a> San Francisco, CA <small class="float-right text-right">12-April-2019</small></span>
                                            <h6 class="font600">An Engineer Explains Why You Should Always Order the Larger Pizza</h6>
                                            <div class="msg">
                                                <p>I'm speaking with myself, number one, because I have a very good brain and I've said a lot of things. I write the best placeholder text, and I'm the biggest developer on the web by far... While that's mock-ups and this is politics, is the Lorem card.</p>
                                                <a href="javascript:void(0);" class="mr-20 text-muted"><i class="fa fa-heart text-pink"></i> 7 Love</a>
                                                <a class="text-muted" role="button" data-toggle="collapse" href="#collapseExample2" aria-expanded="false" aria-controls="collapseExample2"><i class="fa fa-comments"></i> 1 Comment</a>
                                                <div class="collapse p-4 section-gray mt-2" id="collapseExample2">
                                                    <form class="well">
                                                        <div class="form-group">
                                                            <textarea rows="2" class="form-control no-resize" placeholder="Enter here for tweet..."></textarea>
                                                        </div>
                                                        <button class="btn btn-primary">Submit</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="Matriculation-add">
                        <div class="row clearfix">
                            <form class="row" @submit.prevent="agregar_matricula">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Buscar Alumno</h3>
                                            <div class="card-options ">
                                                <a href="#" class="card-options-collapse d-none" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                                                <a href="#" class="card-options-remove d-none" data-toggle="card-remove"><i class="fe fe-x"></i></a>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row clearfix">
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label>DNI <span class="text-danger">*</span></label>

                                                        <div class="input-group mb-3">
                                                            <input type="number" v-model="matricula.dni" class="form-control" minlength="8" maxlength="8" required>
                                                            <div class="input-group-append">
                                                                <button v-if="!loadingDni" @click="buscando_dni()" class="btn btn-primary" type="button">
                                                                    <i class="fa-solid fa-magnifying-glass"></i>
                                                                    Buscar
                                                                </button>
                                                                <button v-else id="btnfollow_recargar" class="btn btn-primary" type="button">
                                                                    <i class="fa-solid fa-spinner base"></i>
                                                                    Procesando...
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Alumno <span class="text-danger">*</span></label>
                                                        <input type="text" v-model="matricula.alumno" class="form-control" required disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="cancelar1" style="text-align: end;">
                                                <button type="button" class="btn btn-outline-secondary" @click="cancelar()">Cancelar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="matricula_info" class="col-lg-12 col-md-12 col-sm-12 d-none">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Información Matricula</h3>
                                            <div class="card-options ">
                                                <a href="#" class="card-options-collapse d-none" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                                                <a href="#" class="card-options-remove d-none" data-toggle="card-remove"><i class="fe fe-x"></i></a>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row clearfix">
                                                <div class="col-lg-4 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Periodo <span class="text-danger">*</span></label>
                                                        <select  v-model="matricula.per_id"  class="form-control show-tick" >
                                                            <option value="0" selected >-- Selecciona --</option>
                                                            <option v-for="p in periodos" :key="p.id" v-bind:value="p.per_id">
                                                                {{p.periodo}}
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Nivel <span class="text-danger">*</span></label>
                                                        <select  @change="listar_grados()" v-model="matricula.niv_id"  class="form-control show-tick" required>
                                                            <option value="0" selected >-- Selecciona --</option>
                                                            <option v-for="n in niveles" :key="n.id" v-bind:value="n.niv_id">
                                                                {{n.niv_descripcion}}
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Grado <span class="text-danger">*</span></label>
                                                        <select @change="listar_secciones()" v-model="matricula.gra_id"  class="form-control show-tick" required>
                                                            <option value="0" selected >-- Selecciona --</option>
                                                            <option v-for="g in grados" :key="g.id" v-bind:value="g.gra_id">
                                                                {{g.gra_descripcion}}
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Sección <span class="text-danger">*</span></label>
                                                        <select  @change="mostrar_info_seccion()" v-model="matricula.sec_id"  class="form-control show-tick" required>
                                                            <option value="0" selected >-- Selecciona --</option>
                                                            <option v-for="s in secciones" :key="s.id" v-bind:value="s.sec_id">
                                                                {{s.sec_descripcion}}
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Aula </label>
                                                        <input type="text" v-model="matricula.aula" class="form-control" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Nro Vacantes </label>
                                                        <input type="text" v-model="matricula.vacantes" class="form-control" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Fecha de Matricula <span class="text-danger">*</span></label>
                                                        <input type="date" v-model="matricula.fecha" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Situación </label>
                                                        <select v-model="matricula.situacion" class="form-control show-tick" required>
                                                        <option value="0" disabled>-- Selecciona --</option>
                                                        <option value="Ingresante">Ingresante</option>
                                                        <option value="Promovido">Promovido</option>
                                                        <option value="Repite">Repite</option>
                                                        <option value="Reentrante">Reentrante</option>
                                                        <option value="Repite">Re ingresante</option>
                                                    </select>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="matricula_info2" class="col-lg-12 col-md-12 col-sm-12 d-none">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Información Apoderado</h3>
                                            <div class="card-options ">
                                                <a href="#" class="card-options-collapse d-none" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                                                <a href="#" class="card-options-remove d-none" data-toggle="card-remove"><i class="fe fe-x"></i></a>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row clearfix">
                                                <div class="col-lg-4 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Apoderado </label>
                                                        <input type="text" v-model="matricula.apoderado" class="form-control" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-12">
                                                    <label>Parentesco <span class="text-danger">*</span></label>
                                                    <select v-model="matricula.parentesco" class="form-control show-tick" required disabled>
                                                        <option value="0" disabled>-- Selecciona --</option>
                                                        <option value="PADRE">Padre</option>
                                                        <option value="MADRE">Madre</option>
                                                        <option value="TIO">Madre</option>
                                                        <option value="TUTOR">Tutor</option>
                                                    </select>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Vive con el estudiante</label>
                                                        <select v-model="matricula.vive_con_estudiante" class="form-control show-tick">
                                                            <option value="0" disabled>-- Selecciona --</option>
                                                            <option value="1">SI</option>
                                                            <option value="2">NO</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="matricula_info3" class="col-lg-12 col-md-12 col-sm-12 d-none">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Información Extra</h3>
                                            <div class="card-options ">
                                                <a href="#" class="card-options-collapse d-none" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                                                <a href="#" class="card-options-remove d-none" data-toggle="card-remove"><i class="fe fe-x"></i></a>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row clearfix">
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <label>Tipo Procedencia </label>
                                                    <select v-model="matricula.tipo_procedencia" class="form-control show-tick" >
                                                        <option value="0" disabled>-- Selecciona --</option>
                                                        <option value="Misma IE">Misma IE</option>
                                                        <option value="Otra IE">Otra IE</option>
                                                        <option value="Su casa">Su casa</option>
                                                    </select>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Observación </label>
                                                        <input type="text" v-model="matricula.observacion" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 text-right mt-4">
                                                    <button v-if="!loading" type="submit" class="btn btn-primary">Registrar</button>
                                                    <button v-else disabled type="button" class="btn btn-primary">Procesando...</button>
                                                    <button type="button" class="btn btn-outline-secondary" @click="cancelar()">Cancelar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="tab-pane" id="Matriculation-update">
                        <div class="row clearfix">
                            <form class="row" @submit.prevent="actualizar_matricula">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Información Básica</h3>
                                            <div class="card-options ">
                                                <a href="#" class="card-options-collapse d-none" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                                                <a href="#" class="card-options-remove d-none" data-toggle="card-remove"><i class="fe fe-x"></i></a>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row clearfix">
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Alumno <span class="text-danger">*</span></label>
                                                        <div class="input-group">
                                                            <input id="dni_buscar" type="text" class="form-control" aria-label="Recipient's username"
                                                            v-model="update_data.nombres_alumno" disabled>
                                                            <div class="input-group-append">
                                                                <button id="btn-buscar" class="btn btn-outline-secondary" @click="buscar_alumno2()" type="button">Buscar</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                 <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Periodo <span class="text-danger">*</span></label>
                                                        <select  v-model="update_data.id_periodo"  class="form-control show-tick" disabled>
                                                            <option v-for="p in periodos" :key="p.id" v-bind:value="p.id_periodo">
                                                                {{p.descripcion}}
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Nivel <span class="text-danger">*</span></label>
                                                        <select  @change="listar_grados2()" v-model="update_data.id_nivel"  class="form-control show-tick" required>
                                                            <option value="0" selected disabled>-- Selecciona --</option>
                                                            <option v-for="n in niveles" :key="n.id" v-bind:value="n.id_nivel">
                                                                {{n.descripcion}}
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Grado <span class="text-danger">*</span></label>
                                                        <select @change="listar_secciones2()" v-model="update_data.id_grado"  class="form-control show-tick" required>
                                                            <option value="0" selected disabled>-- Selecciona --</option>
                                                            <option v-for="g in grados" :key="g.id" v-bind:value="g.id_grado">
                                                                {{g.descripcion}}
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Sección <span class="text-danger">*</span></label>
                                                        <select  v-model="update_data.id_seccion"  class="form-control show-tick" required>
                                                            <option value="0" selected disabled>-- Selecciona --</option>
                                                            <option v-for="s in secciones" :key="s.id" v-bind:value="s.id_seccion">
                                                                {{s.descripcion}}
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Fecha de Matricula <span class="text-danger">*</span></label>
                                                        <input type="date" v-model="update_data.fecha_matricula" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 text-right mt-4">
                                                    <button v-if="!loading" type="submit" class="btn btn-primary">Actualizar</button>
                                                    <button v-else disabled type="button" class="btn btn-primary">Procesando...</button>
                                                    <!-- <button type="submit" class="btn btn-primary">Registrar</button> -->
                                                    <button type="button" class="btn btn-outline-secondary" @click="cancelar2()">Cancelar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="alumnosVer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Lista de Alumnos</h5>
                        <button type="button" @click="cerrar_modal()" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                         <table id="ver-table-alumnos" class="display " style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>DNI</th>
                                    <th>NOMBRES</th>
                                    <th>APELLIDOS</th>
                                    <th>OPCIONES</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(item, index) in data" :key="index">
                                    <td>{{item.id_alumno}}</td>
                                    <td>{{item.dni}}</td>
                                    <td>{{item.nombres}}</td>
                                    <td>{{item.apellidos}}</td>
                                    <td>
                                    <button type="button" class="btn btn-info btn-sm"  @click="enviarDatos(item)">Seleccionar</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                <!--  <div class="modal-footer">
                        <button type="button" @click="cerrar_modal()"  class="btn btn-secondary">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div> -->
                </div>
            </div>
        </div>

        <div class="modal fade" id="alumnosVer2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Lista de Alumnos</h5>
                        <button type="button" @click="cerrar_modal()" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                         <table id="ver-table-alumnos2" class="display " style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>DNI</th>
                                    <th>NOMBRES</th>
                                    <th>APELLIDOS</th>
                                    <th>OPCIONES</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(item, index) in data" :key="index">
                                    <td>{{item.id_alumno}}</td>
                                    <td>{{item.dni}}</td>
                                    <td>{{item.nombres}}</td>
                                    <td>{{item.apellidos}}</td>
                                    <td>
                                    <button type="button" class="btn btn-info btn-sm"  @click="enviarDatos2(item)">Seleccionar</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <div v-else> v-if="user.id_rol == 1"
        <div class="card-body text-center">
            <div class="display-1 text-muted mb-4">
                <img src="assets/images/error.jpg" alt="error" width="30%">
            </div>
            <h1 class="h3 mb-3">Ups... Página no autorizada...</h1>
            <p class="h6 text-muted font-weight-normal mb-3">Lo sentimos, no tiene autorizacion para ver esta página…&hellip;</p>
            <a class="btn btn-primary" href="javascript:history.back()"><i class="fe fe-arrow-left mr-2"></i>Regresar</a>
        </div>
    </div> -->
</template>

<script>
import swal from 'sweetalert';
let user = document.head.querySelector('meta[name="user"]');
export default {
    data() {
        return{
            data: {},
            matriculas: {},
            periodos: {},
            niveles: {},
            grados: {},
            secciones: {},
            alumnos: {},
            matricula: {
                alu_id: '',
                dni: '',
                alumno: '',
                per_id: '0',
                ala_id: '0',
                niv_id: '0',
                gra_id: '0',
                sec_id: '0',
                ala_id: '0',
                aula:'',
                vacantes: '',
                fecha: new Date().toISOString().substr(0, 10),
                apo_id: '',
                apoderado: '',
                parentesco: '0',
                vive_con_estudiante: '0',
                situacion: 'Ingresante',
                colegio_procedencia: '',
                tipo_procedencia: 'Misma IE',
                observacion: '',
                estado: '0',
            },
            update_data: {
                nombres_alumno: '',
                dni_alumno: '',
                id_alumno: '',
                id_periodo: '0',
                id_nivel: '0',
                id_grado: '0',
                id_seccion: '0',
                fecha_matricula: "",
                id_matricula: ""
            },
            loading: false,
            loadingDni: false,
        }
    },
    mounted(){
        this.listar_matriculas();
    },
    computed: {
        user(){
            return JSON.parse(user.content);
        }
    },
    methods: {
        async agregar_matricula(){
            if(this.matricula.vacantes > 0){
                this.loading = true;
                axios.post("/api/agregar-matricula",{
                    params: {
                        matricula: this.matricula,
                    }
                })
                .then(response=>{
                    setTimeout(() => {
                        this.loading = false;
                        swal({
                            title: "Matricula Registrada !!",
                            icon: "success",
                        }).then((willConfirm) => {
                            this.limpiar_campos();
                            this.listar_matriculas();
                            this.cancelar();
                        });
                    }, 1000);
                })
                .catch(error=>{
                    console.log(error)
                })
            }else{
                swal({
                    title: "No hay vacantes disponibles para la sección elegida !!",
                    icon: "info",
                })
            }
        },
        async actualizar_matricula(){
            this.loading = true;
            axios.post("/api/actualizar-matricula",{
                params: {
                    data: this.update_data,
                }
            })
            .then(response=>{
                setTimeout(() => {
                    this.loading = false;
                    swal({
                        title: "Matricula Actualizada !!",
                        icon: "success",
                    }).then((willConfirm) => {
                        this.limpiar_campos2();
                        this.listar_matriculas()
                        this.cancelar2();
                    });
                }, 1000);
            })
            .catch(error=>{
                console.log(error)
            })
        },
        async eliminar_matricula(matricula){
            swal({
                title: "Estas seguro de eliminar esta matricula?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    axios.post("/api/eliminar-matricula",{
                        params: {
                            id: matricula
                        }
                    })
                    .then(response=>{
                        setTimeout(() => {
                            swal({
                                title: "Matricula Eliminada !!",
                                icon: "success",
                            }).then((willConfirm) => {
                                this.listar_alumnos()
                            });
                        }, 1000);
                    })
                    .catch(error=>{
                        console.log(error)
                    })
                }
            });
        },
        async buscando_dni() {
            if(!this.matricula.dni){
                swal({
                    title: "Ingrese un DNI !!",
                    icon: "info",
                })
            }else{
                this.loadingDni = true;
                axios.post("/api/buscar-data-alumno",{
                    params: {
                        dni: this.matricula.dni
                    }
                })
                .then(response=>{
                    setTimeout(() => {
                        this.loadingDni = false;
                        if(response.data.evaluar == 2){
                            const cancelar = document.getElementById("cancelar1").classList;
                            cancelar.add("d-none");

                            this.listar_periodos();
                            this.listar_niveles();

                            this.matricula.alu_id =  response.data.alu_id,
                            this.matricula.alumno =  response.data.per_nombres+' '+response.data.per_apellidos,
                            this.matricula.apo_id =  response.data.apo_id,
                            this.matricula.apoderado =  response.data.apo_nombre_completo,
                            this.matricula.parentesco =  response.data.apo_parentesco,
                            this.matricula.vive_con_estudiante =  response.data.apo_vive_con_estudiante
                            swal({
                                title: "Alumno Encontrado !!",
                                icon: "success",
                            });
                            const div = document.getElementById("matricula_info").classList;
                            const div2 = document.getElementById("matricula_info2").classList;
                            const div3 = document.getElementById("matricula_info3").classList;
                            div.remove("d-none");
                            div2.remove("d-none");
                            div3.remove("d-none");
                        }else{
                            swal({
                                title: "Alumno no encontrado, por favor registre al alumno !!",
                                icon: "error",
                            });

                        }
                    }, 500);
                })
                .catch(error=>{
                    console.log(error)
                })
            }

        },
        async listar_matriculas() {
            this.buscando = true;
            axios.get("/api/listar-matriculas")
            .then(response=>{
                $('#table-matriculas').DataTable().destroy();
                this.matriculas = response.data
                this.initDtt();
                setTimeout(() => {
                    this.buscando = false;
                }, 500);
            })
            .catch(error=>{
                console.log(error)
            })
        },
        async listar_periodos() {
            axios.get("/api/listar-periodos")
            .then(response=>{
                var d = new Date();
                var n = d.getFullYear();
                for (let i = 0; i < response.data.length; i++) {
                    if(response.data[i].periodo == n){
                        this.matricula.per_id = response.data[i].per_id
                    }
                }
                this.periodos = response.data
            })
            .catch(error=>{
                console.log(error)
            })
        },
        async listar_niveles() {
            axios.get("/api/listar-niveles")
            .then(response=>{
                this.niveles = response.data
            })
            .catch(error=>{
                console.log(error)
            })
        },
        async listar_grados() {
            axios.post("/api/listar-grados",{
                params: {
                    id: this.matricula.niv_id
                }
            })
            .then(response=>{
                this.grados = response.data
            })
            .catch(error=>{
                console.log(error)
            })
        },
        async listar_secciones() {
            axios.post("/api/listar-secciones",{
                params: {
                    id: this.matricula.gra_id
                }
            })
            .then(response=>{
                this.secciones = response.data
            })
            .catch(error=>{
                console.log(error)
            })
        },
        async mostrar_info_seccion() {
            axios.post("/api/info-secciones",{
                params: {
                    data: this.matricula.sec_id
                }
            })
            .then(response=>{
                this.matricula.vacantes = response.data.sec_vacantes,
                this.matricula.ala_id = response.data.ala_id,
                this.matricula.aula = response.data.aula
            })
            .catch(error=>{
                console.log(error)
            })
        },
        async listar_grados2() {
            axios.post("/api/listar-grados",{
                params: {
                    id: this.update_data.id_nivel
                }
            })
            .then(response=>{
                this.grados = response.data
            })
            .catch(error=>{
                console.log(error)
            })
        },
        async listar_secciones2() {
            axios.post("/api/listar-secciones",{
                params: {
                    id: this.update_data.id_grado
                }
            })
            .then(response=>{
                this.secciones = response.data
            })
            .catch(error=>{
                console.log(error)
            })
        },
        async buscar_alumno() {
            axios.get("/api/listar-alumnos")
            .then(response=>{
                $('#ver-table-alumnos').DataTable().destroy();
                this.data = response.data
                this.initDtt2();
                $('#alumnosVer').modal('show');
            })
            .catch(error=>{
                console.log(error)
            })
        },
        async buscar_alumno2() {
            axios.get("/api/listar-alumnos")
            .then(response=>{
                $('#ver-table-alumnos2').DataTable().destroy();
                this.data = response.data
                this.initDtt3();
                $('#alumnosVer2').modal('show');
            })
            .catch(error=>{
                console.log(error)
            })
        },
        async enviarDatos(data) {
            this.alumno.nombres = data.nombres +' '+ data.apellidos;
            this.alumno.dni = data.dni;
            this.alumno.id_alumno = data.id_alumno;
            this.matricula.id_alumno = data.id_alumno;
            $('#alumnosVer').modal('hide');
        },
        async enviarDatos2(data) {
            this.update_data.nombres_alumno = data.nombres +' '+ data.apellidos;
            this.update_data.dni_alumno = data.dni;
            this.update_data.id_alumno = data.id_alumno;
            $('#alumnosVer2').modal('hide');
        },
        async mostrar_crear(){
            let date = new Date();
            let m = date.getMonth() + 1;
            let d = date.getDate();
            let y = date.getFullYear();
            if (d < 10) d = "0" + d;
            if (m < 10) m = "0" + m;
            let fecha_actual = y + "-" + m + "-" + d;
             axios.post("/api/buscar-periodo",{
                params: {
                    actual: y
                }
            })
            .then(response=>{
                if(response.data.per_estado == 1 && fecha_actual <= response.data.per_limite_cierre){
                    const div = document.getElementById("Matriculation-all").classList;
                    const link = document.getElementById("link-all-matriculation").classList;
                    for (let i = 0; i < div.length; i++) {
                        if (div[i] == "active") {
                            div.remove("active");
                            link.remove("active");
                        }
                        if (div[i] == "show") {
                            div.remove("show");
                        }
                    }
                    const div2 = document.getElementById("Matriculation-add").classList;
                    const link2 = document.getElementById("link-add-matriculation").classList;
                    div2.add("active");
                    div2.add("show");
                    link2.add("active");
                    const opcion_li = document.getElementById("li-add-matriculation").classList;
                    opcion_li.remove("d-none");

                }else if(response.data.per_estado == 1 && fecha_actual > response.data.per_limite_cierre){
                    swal({
                        title: "Ya no se aceptan matriculas, la fecha limite para matricular fue el " + response.data.per_limite_cierre,
                        icon: "info",
                    })
                }else if(response.data.per_estado == 2){
                    swal({
                        title: "Ya no se aceptan matriculas, el periodo académico actual se encuentra finalizado !!",
                        icon: "info",
                    });
                }else{
                    swal({
                        title: "No se pueden registrar matriculas, el periodo académico aun no esta aperturado !!",
                        icon: "info",
                    });
                }
            })
            .catch(error=>{
                console.log(error)
            })
        },
        async mostrar_actualizar(item){
            const div = document.getElementById("Matriculation-all").classList;
            const link = document.getElementById("link-all-matriculation").classList;
            for (let i = 0; i < div.length; i++) {
                if (div[i] == "active") {
                    div.remove("active");
                    link.remove("active");
                }
                if (div[i] == "show") {
                    div.remove("show");
                }
            }
            const div2 = document.getElementById("Matriculation-update").classList;
            const link2 = document.getElementById("link-update-matriculation").classList;
            div2.add("active");
            div2.add("show");
            link2.add("active");
            const opcion_li = document.getElementById("li-update-matriculation").classList;
            opcion_li.remove("d-none");

            this.update_data.id_alumno =  item.id_alumno,
            this.update_data.id_periodo = item.id_periodo,
            this.update_data.id_nivel =  item.id_nivel,
            this.update_data.id_grado =  item.id_grado,
            this.update_data.id_seccion =  item.id_seccion,
            this.update_data.fecha_matricula =  item.fecha_matricula,
            this.update_data.id_matricula =  item.id_matricula,
            this.update_data.nombres_alumno =  item.nombres_alumno,
            this.update_data.dni_alumno =  item.dni_alumno,

            this.listar_periodos()
            this.listar_niveles()
            this.listar_grados2()
            this.listar_secciones2()
        },
        async cancelar(){
            const div = document.getElementById("Matriculation-add").classList;
            const link = document.getElementById("link-add-matriculation").classList;
            for (let i = 0; i < div.length; i++) {
                if (div[i] == "active") {
                    div.remove("active");
                    link.remove("active");
                }
                if (div[i] == "show") {
                    div.remove("show");
                }
            }
            const div2 = document.getElementById("Matriculation-all").classList;
            const link2 = document.getElementById("link-all-matriculation").classList;
            div2.add("active");
            div2.add("show");
            link2.add("active");
            this.limpiar_campos();
            const opcion_li = document.getElementById("li-add-matriculation").classList;
            opcion_li.add("d-none");
            this.loading = false;
        },
        async cancelar2(){
            const div = document.getElementById("Matriculation-update").classList;
            const link = document.getElementById("link-update-matriculation").classList;
            for (let i = 0; i < div.length; i++) {
                if (div[i] == "active") {
                    div.remove("active");
                    link.remove("active");
                }
                if (div[i] == "show") {
                    div.remove("show");
                }
            }
            const div2 = document.getElementById("Matriculation-all").classList;
            const link2 = document.getElementById("link-all-matriculation").classList;
            div2.add("active");
            div2.add("show");
            link2.add("active");
            this.limpiar_campos2();
            const opcion_li = document.getElementById("li-update-matriculation").classList;
            opcion_li.add("d-none");
            this.loading = false;
        },
        async limpiar_campos() {
            this.matricula.alu_id = '',
            this.matricula.dni = '',
            this.matricula.alumno = '',
            this.matricula.per_id = '0',
            this.matricula.ala_id = '0',
            this.matricula.niv_id = '0',
            this.matricula.gra_id = '0',
            this.matricula.sec_id = '0',
            this.matricula.ala_id = '0',
            this.matricula.aula ='',
            this.matricula.vacantes = '',
            this.matricula.fecha = new Date().toISOString().substr(0, 10),
            this.matricula.apo_id = '',
            this.matricula.apoderado = '',
            this.matricula.parentesco = '0',
            this.matricula.vive_con_estudiante = '0',
            this.matricula.situacion = 'Ingresante',
            this.matricula.colegio_procedencia = '',
            this.matricula.tipo_procedencia = 'Misma IE',
            this.matricula.observacion = '',
            this.matricula.estado = '0'

            const div = document.getElementById("matricula_info").classList;
            const div2 = document.getElementById("matricula_info2").classList;
            const div3 = document.getElementById("matricula_info3").classList;
            div.add("d-none");
            div2.add("d-none");
            div3.add("d-none");

            const cancelar = document.getElementById("cancelar1").classList;
            cancelar.remove("d-none");
        },
        async limpiar_campos2() {
            this.update_data.id_alumno = ""
            this.update_data.id_periodo = "0"
            this.update_data.id_nivel = "0"
            this.update_data.id_grado = "0"
            this.update_data.id_seccion = "0"
            this.update_data.fecha_matricula = ""
            this.update_data.id_matricula = ""
            this.update_data.nombres_alumno = ""
            this.update_data.dni_alumno = ""
            this.listar_periodos()
            this.listar_niveles()
        },
        initDtt() {
            $(document).ready(() => {
                $('#table-matriculas').DataTable({
                    dom: '<lf<t>ip>',
                    responsive: true,
                    scrollX: false,
                    "order": [[ 0, "desc" ]]
                    ,
                    "language": {
                        "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                        "sInfo": "Mostrando pagina _PAGE_ de _PAGES_",
                        "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                        "sSearchPlaceholder": "Buscar...",
                        "infoFiltered": "",
                        "sLengthMenu": "Paginación :  _MENU_",
                        "sLoadingRecords": "Cargando...",
                        "sZeroRecords": "No hay registros"
                    },
                    "columnDefs": [
                    { "searchable": false, "targets": [0] }
                    ],
                    "stripeClasses": [],
                    "lengthMenu": [5, 10, 20, 30, 50],
                    "pageLength": 10,
                    exportOptions: {
                        format: {
                            body: function ( data, row, column, node ) {
                                // Strip $ from salary column to make it numeric
                                return column === 6 ?' ': '-';
                            }
                        }
                    }
                });
            });
        },
        initDtt2() {
            $(document).ready(() => {
                $('#ver-table-alumnos').DataTable({
                    dom: '<f<t>ip>',
                    responsive: true,
                    scrollX: false,
                    "order": [[ 0, "asc" ]]
                    ,
                    "language": {
                        "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                        "sInfo": "Mostrando pagina _PAGE_ de _PAGES_",
                        "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                        "sSearchPlaceholder": "Buscar...",
                        "infoFiltered": "",
                        "sLengthMenu": "Paginación :  _MENU_",
                        "sLoadingRecords": "Cargando...",
                        "sZeroRecords": "No hay registros"
                    },
                    "columnDefs": [
                        { "searchable": false, "targets": [0,4] }
                    ],
                    "stripeClasses": [],
                    "lengthMenu": [5, 10, 20, 30, 50],
                    "pageLength": 5,
                    exportOptions: {
                        format: {
                            body: function ( data, row, column, node ) {
                                // Strip $ from salary column to make it numeric
                                return column === 6 ?' ': '-';
                            }
                        }
                    }
                });
            });
        },
        initDtt3() {
            $(document).ready(() => {
                $('#ver-table-alumnos2').DataTable({
                    dom: '<f<t>ip>',
                    responsive: true,
                    scrollX: false,
                    "order": [[ 0, "asc" ]]
                    ,
                    "language": {
                        "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                        "sInfo": "Mostrando pagina _PAGE_ de _PAGES_",
                        "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                        "sSearchPlaceholder": "Buscar...",
                        "infoFiltered": "",
                        "sLengthMenu": "Paginación :  _MENU_",
                        "sLoadingRecords": "Cargando...",
                        "sZeroRecords": "No hay registros"
                    },
                    "columnDefs": [
                        { "searchable": false, "targets": [0,4] }
                    ],
                    "stripeClasses": [],
                    "lengthMenu": [5, 10, 20, 30, 50],
                    "pageLength": 5,
                    exportOptions: {
                        format: {
                            body: function ( data, row, column, node ) {
                                // Strip $ from salary column to make it numeric
                                return column === 6 ?' ': '-';
                            }
                        }
                    }
                });
            });
        }
    }
}
</script>
