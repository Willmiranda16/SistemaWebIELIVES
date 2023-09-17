<template>
    <div >
       <div class="section-body">
            <div class="container-fluid">
                <div class="d-flex justify-content-between align-items-center ">
                    <div class="header-action">
                        <h1 class="page-title">Usuarios</h1>
                        <ol class="breadcrumb page-breadcrumb d-none">
                            <li class="breadcrumb-item"><a href="#">Ericsson</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Staff</li>
                        </ol>
                    </div>
                    <ul class="nav nav-tabs page-header-tab">
                        <li id="li-all" class="nav-item"><a id="link-all" class="nav-link active" data-toggle="tab" href="#Staff-all">Ver Lista</a></li>
                        <li id="li-grid" class="nav-item d-none"><a id="link-grid" class="nav-link" data-toggle="tab" href="#Staff-grid">Ver Cuadricula</a></li>
                        <li id="li-add" class="nav-item d-none"><a id="link-add" class="nav-link" data-toggle="tab" href="#Staff-add">Registrar Usuario</a></li>
                        <li id="li-update" class="nav-item d-none"><a id="link-update" class="nav-link" data-toggle="tab" href="#Staff-update">Actualizar Usuario</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="section-body mt-4">
            <div class="container-fluid">
                <div class="tab-content">
                    <div class="tab-pane active" id="Staff-all">
                        <div class="card d-none">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-2 col-md-4 col-sm-6">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Roll No.">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-4 col-sm-6">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-6">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Department">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-4 col-sm-6">
                                        <div class="input-group">
                                            <input data-provide="datepicker" data-date-autoclose="true" class="form-control" placeholder="Admission Date">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-4 col-sm-6">
                                        <a href="javascript:void(0);" class="btn btn-sm btn-primary btn-block" title="">Search</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a @click="mostrar_crear()" style="background: rgb(0,147,221);background: linear-gradient(180deg, rgba(0,147,221,1) 0%, rgba(115,162,235,1) 100%);" class="btn btn-primary mb-4" href="#">Registrar Usuario</a>
                        <div class="card row">
                            <div class="card-body col-md-12">
                                <div class="">
                                    <table id="table-usuarios" class="display " style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>DNI</th>
                                                <th>USUARIO</th>
                                                <th>EMAIL</th>
                                                <th>ROL</th>
                                                <th>ESTADO</th>
                                                <th>OPCIONES</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="(item, index) in data" :key="index">
                                                <td>{{item.dni}}</td>
                                                <td>{{item.name}}</td>
                                                <td>{{item.email}}</td>
                                                <td>{{item.rol}}</td>
                                                <td>
                                                    <span v-if="item.estado==1" class="tag tag-success">Habilitado</span>
                                                    <span v-else class="tag tag-danger">Deshabilitado</span>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-icon btn-sm d-none" title="View"><i class="fa fa-eye"></i></button>
                                                    <button type="button" class="btn btn-icon btn-sm" title="Editar" @click="mostrar_actualizar(item)"><i class="fa fa-edit"></i></button>
                                                    <button type="button" class="btn btn-icon btn-sm js-sweetalert" title="Eliminar" data-type="confirm" @click="eliminar_usuario(item.id)"><i class="fa fa-trash-o text-danger"></i></button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="Staff-grid">
                        <div class="row">
                            <div class="col-xl-3 col-lg-4 col-md-6" v-for="(item, index) in data" :key="index">
                                <div class="card" v-if="item.estado==1" style="height: 350px;">
                                    <div class="card-body text-center ribbon">
                                        <div class="ribbon-box green" data-toggle="tooltip" title="Habilitado"></div>
                                        <img class="card-profile-img" src="https://cdn-icons-png.flaticon.com/512/149/149071.png" alt="">
                                        <h5 class="mb-0">{{item.nombres}} <br> {{item.apellidos}}</h5>
                                        <div class="text-muted mt-3">Email</div>
                                        <p class="mb-4 ">{{item.email}}</p>
                                        <div class="text-muted mt-3">Rol</div>
                                        <p class="mb-4 ">{{item.rol}}</p>
                                    </div>
                                </div>
                                 <div class="card" v-else style="height: 350px;">
                                    <div class="card-body text-center ribbon">
                                        <div class="ribbon-box orange" data-toggle="tooltip" title="Deshabilitado"></div>
                                        <img class="card-profile-img" src="https://cdn-icons-png.flaticon.com/512/149/149071.png" alt="">
                                        <h5 class="mb-0">{{item.nombres}} <br> {{item.apellidos}}</h5>
                                        <div class="text-muted mt-3">Email</div>
                                        <p class="mb-4 ">{{item.email}}</p>
                                        <div class="text-muted mt-3">Rol</div>
                                        <p class="mb-4 ">{{item.rol}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="Staff-profile">
                        <div class="row">
                            <div class="col-xl-4 col-md-12">
                                <div class="card">
                                    <div class="card-body w_user">
                                        <div class="user_avtar">
                                            <img class="rounded-circle" src="assets/images/sm/avatar1.jpg" alt="">
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
												<div>Female</div>
											</li>
											<li class="list-group-item">
												<b>Operation Done </b>
												<div>30+</div>
											</li>
											<li class="list-group-item">
												<b>Degree </b>
												<div>M.Com.</div>
                                            </li>
                                            <li class="list-group-item">
												<b>Designation</b>
												<div>Jr. Clerk</div>
											</li>
                                            <li class="list-group-item">
                                                <div class="clearfix">
                                                    <div class="float-left"><strong>Telly</strong></div>
                                                    <div class="float-right"><small class="text-muted">35%</small></div>
                                                </div>
                                                <div class="progress progress-xxs">
                                                    <div class="progress-bar bg-azure" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="clearfix">
                                                    <div class="float-left"><strong>Account</strong></div>
                                                    <div class="float-right"><small class="text-muted">72%</small></div>
                                                </div>
                                                <div class="progress progress-xxs">
                                                    <div class="progress-bar bg-red" role="progressbar" style="width: 72%" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="clearfix">
                                                    <div class="float-left"><strong>MS Office</strong></div>
                                                    <div class="float-right"><small class="text-muted">60%</small></div>
                                                </div>
                                                <div class="progress progress-xxs">
                                                    <div class="progress-bar bg-blue" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
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
                    <div class="tab-pane" id="Staff-add">
                        <div class="row clearfix">
                            <form class="row" @submit.prevent="agregar_usuario">
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
                                                <div class="col-lg-4 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label>DNI <span class="text-danger">*</span></label>

                                                        <div class="input-group mb-3">
                                                            <input type="number" v-model="persona.dni" class="form-control" minlength="8" maxlength="8" required >
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
                                                <div class="col-lg-4 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Nombres <span class="text-danger">*</span></label>
                                                        <input type="text" v-model="persona.nombres" class="form-control" required disabled>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Apellidos <span class="text-danger">*</span></label>
                                                        <input type="text" v-model="persona.apellidos" class="form-control" required disabled>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-12">
                                                    <label>Sexo <span class="text-danger">*</span></label>
                                                    <select v-model="persona.sexo" class="form-control show-tick" required>
                                                        <option value="" disabled>-- Selecciona --</option>
                                                        <option value="M">Masculino</option>
                                                        <option value="F">Femenino</option>
                                                    </select>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Fecha de Nacimiento </label>
                                                        <input type="date" v-model="persona.fecha_nacimiento" class="form-control" >
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-12">
                                                    <label>Estado Civil </label>
                                                    <select v-model="persona.estado_civil" class="form-control show-tick" >
                                                        <option value="0" disabled>-- Selecciona --</option>
                                                        <option value="S">Soltero</option>
                                                        <option value="C">Casado</option>
                                                        <option value="D">Divorciado</option>
                                                        <option value="V">Viudo</option>
                                                    </select>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label>País <span class="text-danger">*</span></label>
                                                        <input type="text" v-model="persona.pais" class="form-control" required disabled>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-12">
                                                    <label>Departamento <span class="text-danger">*</span></label>
                                                    <select v-model="persona.departamento" class="form-control show-tick" required @change="listar_provincias()">
                                                        <option value="0" selected disabled>-- Selecciona --</option>
                                                         <option v-for="d in departamentos" :key="d.id" v-bind:value="d.idDepa">
                                                            {{ d.departamento }}
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-12">
                                                    <label>Provincia <span class="text-danger">*</span></label>
                                                    <select v-model="persona.provincia" class="form-control show-tick" required @change="listar_distritos()">
                                                        <option value="0" selected disabled>-- Selecciona --</option>
                                                         <option v-for="p in provincias" :key="p.id" v-bind:value="p.idProv">
                                                            {{ p.provincia }}
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-12">
                                                    <label>Distrito <span class="text-danger">*</span></label>
                                                    <select v-model="persona.distrito" class="form-control show-tick" required>
                                                        <option value="0" selected disabled>-- Selecciona --</option>
                                                         <option v-for="d in distritos" :key="d.id" v-bind:value="d.idDist">
                                                            {{ d.distrito }}
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Dirección </label>
                                                        <input type="text" v-model="persona.direccion" class="form-control" >
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Celular</label>
                                                        <input type="number" v-model="persona.celular" class="form-control" minlength="9" maxlength="9">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Información de la Cuenta</h3>
                                            <div class="card-options ">
                                                <a href="#" class="card-options-collapse d-none" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                                                <a href="#" class="card-options-remove d-none" data-toggle="card-remove"><i class="fe fe-x"></i></a>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row clearfix">
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Nombre de Usuario <span class="text-danger">*</span></label>
                                                        <input id="usuario" name="usuario" type="text"  v-model="usuario.name"  class="form-control" aria-invalid="true" autofocus required>
                                                    </div>
                                                </div>
                                                 <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <label>Rol <span class="text-danger">*</span></label>
                                                    <select  v-model="usuario.id_rol"  class="form-control show-tick" required>
                                                        <option value="0" selected disabled>-- Selecciona --</option>
                                                         <option v-for="r in roles" :key="r.id" v-bind:value="r.rol_id">
                                                            {{ r.rol_descripcion }}
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Correo Electrónico <span class="text-danger">*</span></label>
                                                        <input id="email" name="email" type="email"  v-model="usuario.email"  class="form-control" aria-invalid="true" autofocus required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Contraseña <span class="text-danger">*</span></label>
                                                        <input id="password" name="password" type="password"  v-model="usuario.password"  class="form-control-merge form-control" aria-invalid="true" autocomplete="current-password" required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <label>Estado <span class="text-danger">*</span></label>
                                                    <select v-model="usuario.estado" class="form-control show-tick" required>
                                                        <option value="" disabled>-- Selecciona --</option>
                                                        <option value="1">Habilitado</option>
                                                        <option value="0">Deshabilitado</option>
                                                    </select>
                                                </div>
                                                <div class="col-lg-12 col-md-6 col-sm-12 mt-3 d-none">
                                                    <span class="text-danger">* Campos requeridos</span>
                                                </div>
                                                <div class="col-sm-12 text-right mt-4">
                                                    <button v-if="!loading" type="submit" class="btn btn-primary">Registrar</button>
                                                    <button v-else disabled type="button" class="btn btn-primary">Procesando...</button>
                                                    <!-- <button type="submit" class="btn btn-primary">Registrar</button> -->
                                                    <button type="button" class="btn btn-outline-secondary" @click="cancelar()">Cancelar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card d-none">
                                        <div class="card-header">
                                            <h3 class="card-title">Account Information</h3>
                                            <div class="card-options ">
                                                <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                                                <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label>Facebook</label>
                                                <input type="text" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Twitter</label>
                                                <input type="text" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>LinkedIN</label>
                                                <input type="text" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Behance</label>
                                                <input type="text" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>dribbble</label>
                                                <input type="text" class="form-control">
                                            </div>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                            <button type="submit" class="btn btn-outline-secondary">Cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                     <div class="tab-pane" id="Staff-update">
                        <div class="row clearfix">
                            <form class="row" @submit.prevent="actualizar_usuario">
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
                                                <div class="col-lg-4 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label>DNI <span class="text-danger">*</span></label>

                                                        <div class="input-group mb-3">
                                                            <input type="number" v-model="update_data.dni" class="form-control" minlength="8" maxlength="8" required disabled>
                                                            <div class="input-group-append d-none">
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
                                                <div class="col-lg-4 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Nombres <span class="text-danger">*</span></label>
                                                        <input type="text" v-model="update_data.nombres" class="form-control" required disabled>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Apellidos <span class="text-danger">*</span></label>
                                                        <input type="text" v-model="update_data.apellidos" class="form-control" required disabled>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-12">
                                                    <label>Sexo <span class="text-danger">*</span></label>
                                                    <select v-model="update_data.sexo" class="form-control show-tick" required disabled>
                                                        <option value="" disabled>-- Selecciona --</option>
                                                        <option value="M">Masculino</option>
                                                        <option value="F">Femenino</option>
                                                    </select>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Fecha de Nacimiento </label>
                                                        <input type="date" v-model="update_data.fecha_nacimiento" class="form-control" >
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-12">
                                                    <label>Estado Civil </label>
                                                    <select v-model="update_data.estado_civil" class="form-control show-tick" >
                                                        <option value="" disabled>-- Selecciona --</option>
                                                        <option value="S">Soltero</option>
                                                        <option value="C">Casado</option>
                                                        <option value="D">Divorciado</option>
                                                        <option value="V">Viudo</option>
                                                    </select>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label>País <span class="text-danger">*</span></label>
                                                        <input type="text" v-model="update_data.pais" class="form-control" required disabled>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-12">
                                                    <label>Departamento <span class="text-danger">*</span></label>
                                                    <select v-model="update_data.departamento" class="form-control show-tick" required @change="listar_provincias2()">
                                                        <option value="0" selected disabled>-- Selecciona --</option>
                                                         <option v-for="d in departamentos" :key="d.id" v-bind:value="d.idDepa">
                                                            {{ d.departamento }}
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-12">
                                                    <label>Provincia <span class="text-danger">*</span></label>
                                                    <select v-model="update_data.provincia" class="form-control show-tick" required @change="listar_distritos2()">
                                                        <option value="0" selected disabled>-- Selecciona --</option>
                                                         <option v-for="p in provincias" :key="p.id" v-bind:value="p.idProv">
                                                            {{ p.provincia }}
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-12">
                                                    <label>Distrito <span class="text-danger">*</span></label>
                                                    <select v-model="update_data.distrito" class="form-control show-tick" required>
                                                        <option value="0" selected disabled>-- Selecciona --</option>
                                                         <option v-for="d in distritos" :key="d.id" v-bind:value="d.idDist">
                                                            {{ d.distrito }}
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Dirección </label>
                                                        <input type="text" v-model="update_data.direccion" class="form-control" >
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Celular</label>
                                                        <input type="number" v-model="update_data.celular" class="form-control" minlength="9" maxlength="9">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Información de la Cuenta</h3>
                                            <div class="card-options ">
                                                <a href="#" class="card-options-collapse d-none" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                                                <a href="#" class="card-options-remove d-none" data-toggle="card-remove"><i class="fe fe-x"></i></a>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row clearfix">
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Nombre de Usuario <span class="text-danger">*</span></label>
                                                        <input id="usuario" name="usuario" type="text"  v-model="update_data.name"  class="form-control" aria-invalid="true" autofocus required>
                                                    </div>
                                                </div>
                                                 <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <label>Rol <span class="text-danger">*</span></label>
                                                    <select  v-model="update_data.id_rol"  class="form-control show-tick" required>
                                                        <option value="0" selected disabled>-- Selecciona --</option>
                                                         <option v-for="r in roles" :key="r.id" v-bind:value="r.rol_id">
                                                            {{ r.rol_descripcion }}
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Correo Electrónico <span class="text-danger">*</span></label>
                                                        <input id="email" name="email" type="email"  v-model="update_data.email"  class="form-control" aria-invalid="true" autofocus required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Contraseña</label>
                                                        <input id="password" name="password" type="password"  v-model="update_data.password"  class="form-control-merge form-control" aria-invalid="true" autocomplete="current-password">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <label>Estado <span class="text-danger">*</span></label>
                                                    <select v-model="update_data.estado" class="form-control show-tick" required>
                                                        <option value="" disabled>-- Selecciona --</option>
                                                        <option value="1">Habilitado</option>
                                                        <option value="0">Deshabilitado</option>
                                                    </select>
                                                </div>
                                                <div class="col-lg-12 col-md-6 col-sm-12 mt-3 d-none">
                                                    <span class="text-danger">* Campos requeridos</span>
                                                </div>
                                                <div class="col-sm-12 text-right mt-4">
                                                    <button v-if="!loading" type="submit" class="btn btn-primary">Actualizar</button>
                                                    <button v-else disabled type="button" class="btn btn-primary">Procesando...</button>
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
<style>
    .follow_recargar{
        animation: girar;
        animation-duration: 2s;
        animation-timing-function:ease-out;
    }

    @keyframes girar {
        from {transform: rotate(0deg);}
        to {transform: rotate(360deg);}
    }
</style>
<script>
import swal from 'sweetalert';
let user = document.head.querySelector('meta[name="user"]');
export default {
    data() {
        return{
            roles: {},
            departamentos: {},
            provincias: {},
            distritos: {},
            data: {},
            usuario: {
                name: '',
                email: '',
                id_rol: '0',
                password: '',
                estado: "",
            },
            persona: {
                per_id: '',
                nombres: '',
                apellidos: '',
                dni: '',
                sexo: '',
                fecha_nacimiento: '',
                estado_civil: '',
                celular: "",
                pais: "PERÚ",
                departamento: "0",
                provincia: "0",
                distrito: "0",
                direccion: ""
            },
            update_data: {
                name: '',
                email: '',
                id_rol: '0',
                password: '',
                estado: "",
                nombres: '',
                apellidos: '',
                dni: '',
                sexo: '',
                fecha_nacimiento: '',
                estado_civil: '',
                celular: "",
                pais: "",
                departamento: "0",
                provincia: "0",
                distrito: "0",
                direccion: "",
                id_user: "",
                per_id: ""
            },
            loading: false,
            loadingDni: false,
            buscando: false,
        }
    },
    mounted(){
        this.listar_roles();
        this.listar_usuarios();
        this.listar_departamentos();
    },
    computed: {
        user(){
            return JSON.parse(user.content);
        }
    },
    methods: {
        async agregar_usuario(){
            this.loading = true;
            axios.post("/api/agregar-usuario",{
                params: {
                    usuario: this.usuario,
                    persona: this.persona,
                }
            })
            .then(response=>{
                setTimeout(() => {
                    this.loading = false;
                    swal({
                        title: "Usuario Registrado !!",
                        icon: "success",
                    }).then((willConfirm) => {
                        this.limpiar_campos();
                        this.listar_usuarios()
                        this.cancelar();
                    });
                }, 1000);
            })
            .catch(error=>{
                console.log(error)
            })

        },
        async eliminar_usuario(usuario){
            swal({
                title: "Estas seguro de eliminar este usuario?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    axios.post("/api/eliminar-usuario",{
                        params: {
                            id_usuario: usuario
                            /* id_persona: persona, */
                        }
                    })
                    .then(response=>{
                        setTimeout(() => {
                            swal({
                                title: "Usuario Eliminado !!",
                                icon: "success",
                            }).then((willConfirm) => {
                                this.listar_usuarios()
                            });
                        }, 1000);
                    })
                    .catch(error=>{
                        console.log(error)
                    })
                }
            });
        },
        async actualizar_usuario(){
            this.loading = true;
            axios.post("/api/actualizar-usuario",{
                params: {
                    data: this.update_data,
                }
            })
            .then(response=>{
                setTimeout(() => {
                    this.loading = false;
                    swal({
                        title: "Usuario Actualizado !!",
                        icon: "success",
                    }).then((willConfirm) => {
                        this.limpiar_campos2();
                        this.listar_usuarios()
                        this.cancelar2();
                    });
                }, 1000);
            })
            .catch(error=>{
                console.log(error)
            })
        },
        async listar_roles() {
            axios.get("/api/listar-rol")
            .then(response=>{
                this.roles = response.data
            })
            .catch(error=>{
                console.log(error)
            })
        },
        async listar_usuarios() {
            this.buscando = true;
            axios.get("/api/listar-usuarios")
            .then(response=>{
                $('#table-usuarios').DataTable().destroy();
                this.data = response.data
                this.initDtt();
                setTimeout(() => {
                    this.buscando = false;
                }, 500);
            })
            .catch(error=>{
                console.log(error)
            })
        },
        async buscando_dni() {
            this.loadingDni = true;
            axios.post("/api/buscar-dni",{
                params: {
                    dni: this.persona.dni
                }
            })
            .then(response=>{
                setTimeout(() => {
                    this.loadingDni = false;
                    if(response.data.evaluar == 0){
                        this.persona.nombres = response.data.nombres;
                        this.persona.apellidos = response.data.apellidos;
                        swal({
                            title: "Datos Encontrados !!",
                            icon: "success",
                        });
                    }else if(response.data.evaluar == 1){
                        this.listar_prov_dist(response.data.per_departamento,response.data.per_provincia);

                        this.persona.nombres =  response.data.per_nombres,
                        this.persona.apellidos =  response.data.per_apellidos,
                        this.persona.dni =  response.data.per_dni,
                        this.persona.sexo =  response.data.per_sexo,
                        this.persona.fecha_nacimiento =  response.data.per_fecha_nacimiento,
                        this.persona.estado_civil =  response.data.per_estado_civil,
                        this.persona.celular =  response.data.per_celular,
                        this.persona.pais =  response.data.per_pais,
                        this.persona.departamento =  response.data.per_departamento,
                        this.persona.provincia =  response.data.per_provincia,
                        this.persona.distrito =  response.data.per_distrito,
                        this.persona.direccion =  response.data.per_direccion,
                        this.persona.per_id =  response.data.per_id,
                        this.usuario.email =  response.data.per_email,
                        this.usuario.id_rol =  response.data.id_rol

                        swal({
                            title: "Datos Encontrados !!",
                            icon: "success",
                        });
                    }else{
                        swal({
                            title: "Datos no encontrados !!",
                            icon: "error",
                        });
                    }
                }, 500);
            })
            .catch(error=>{
                console.log(error)
            })
        },
        async listar_departamentos() {
            axios.get("/api/listar-departamentos")
            .then(response=>{
                this.departamentos = response.data
            })
            .catch(error=>{
                console.log(error)
            })
        },
        async listar_provincias() {
            axios.post("/api/listar-provincias",{
                params: {
                    departamento: this.persona.departamento
                }
            })
            .then(response=>{
                this.provincias = response.data
            })
            .catch(error=>{
                console.log(error)
            })
        },
        async listar_distritos() {
            axios.post("/api/listar-distritos",{
                params: {
                    provincia: this.persona.provincia
                }
            })
            .then(response=>{
                this.distritos = response.data
            })
            .catch(error=>{
                console.log(error)
            })
        },
        async listar_provincias2() {
            axios.post("/api/listar-provincias",{
                params: {
                    departamento: this.update_data.departamento
                }
            })
            .then(response=>{
                this.provincias = response.data
                this.update_data.provincia = "0"
            })
            .catch(error=>{
                console.log(error)
            })
        },
        async listar_distritos2() {
            axios.post("/api/listar-distritos",{
                params: {
                    provincia: this.update_data.provincia
                }
            })
            .then(response=>{
                this.distritos = response.data
                this.update_data.distrito = "0"
            })
            .catch(error=>{
                console.log(error)
            })
        },
        async listar_prov_dist(depa,prov) {
            axios.post("/api/listar-provincias",{
                params: {
                    departamento: depa
                }
            })
            .then(response=>{
                this.provincias = response.data
            })
            .catch(error=>{
                console.log(error)
            })

            axios.post("/api/listar-distritos",{
                params: {
                    provincia: prov
                }
            })
            .then(response=>{
                this.distritos = response.data
            })
            .catch(error=>{
                console.log(error)
            })
        },
        async mostrar_crear(){
            const div = document.getElementById("Staff-all").classList;
            const link = document.getElementById("link-all").classList;
            for (let i = 0; i < div.length; i++) {
                if (div[i] == "active") {
                    div.remove("active");
                    link.remove("active");
                }
                if (div[i] == "show") {
                    div.remove("show");
                }
            }
            const div2 = document.getElementById("Staff-add").classList;
            const link2 = document.getElementById("link-add").classList;
            div2.add("active");
            div2.add("show");
            link2.add("active");
            const opcion_li = document.getElementById("li-add").classList;
            opcion_li.remove("d-none");
        },
        async mostrar_actualizar(item){
            const div = document.getElementById("Staff-all").classList;
            const link = document.getElementById("link-all").classList;
            for (let i = 0; i < div.length; i++) {
                if (div[i] == "active") {
                    div.remove("active");
                    link.remove("active");
                }
                if (div[i] == "show") {
                    div.remove("show");
                }
            }
            const div2 = document.getElementById("Staff-update").classList;
            const link2 = document.getElementById("link-update").classList;
            div2.add("active");
            div2.add("show");
            link2.add("active");
            const opcion_li = document.getElementById("li-update").classList;
            opcion_li.remove("d-none");


            this.listar_prov_dist(item.departamento,item.provincia);

            this.update_data.name =  item.name,
            this.update_data.email = item.email,
            this.update_data.id_rol =  item.rol_id,
            this.update_data.password =  '',
            this.update_data.estado =  item.estado,
            this.update_data.nombres =  item.nombres,
            this.update_data.apellidos =  item.apellidos,
            this.update_data.dni =  item.dni,
            this.update_data.sexo =  item.sexo,
            this.update_data.fecha_nacimiento =  item.fecha_nacimiento,
            this.update_data.estado_civil =  item.estado_civil,
            this.update_data.celular =  item.celular,
            this.update_data.pais =  item.pais,
            this.update_data.departamento =  item.departamento,
            this.update_data.provincia =  item.provincia,
            this.update_data.distrito =  item.distrito,
            this.update_data.direccion =  item.direccion,
            this.update_data.id_user =  item.id,
            this.update_data.per_id =  item.id_persona
        },
        async cancelar(){
            const div = document.getElementById("Staff-add").classList;
            const link = document.getElementById("link-add").classList;
            for (let i = 0; i < div.length; i++) {
                if (div[i] == "active") {
                    div.remove("active");
                    link.remove("active");
                }
                if (div[i] == "show") {
                    div.remove("show");
                }
            }
            const div2 = document.getElementById("Staff-all").classList;
            const link2 = document.getElementById("link-all").classList;
            div2.add("active");
            div2.add("show");
            link2.add("active");
            this.limpiar_campos();
            const opcion_li = document.getElementById("li-add").classList;
            opcion_li.add("d-none");
            this.loading = false;
        },
        async cancelar2(){
            const div = document.getElementById("Staff-update").classList;
            const link = document.getElementById("link-update").classList;
            for (let i = 0; i < div.length; i++) {
                if (div[i] == "active") {
                    div.remove("active");
                    link.remove("active");
                }
                if (div[i] == "show") {
                    div.remove("show");
                }
            }
            const div2 = document.getElementById("Staff-all").classList;
            const link2 = document.getElementById("link-all").classList;
            div2.add("active");
            div2.add("show");
            link2.add("active");
            this.limpiar_campos2();
            const opcion_li = document.getElementById("li-update").classList;
            opcion_li.add("d-none");
            this.loading = false;
        },
        async limpiar_campos() {
            this.usuario.name = "",
            this.usuario.email = "",
            this.usuario.id_rol = "0",
            this.usuario.password = "",
            this.usuario.estado = "",
            this.persona.nombres = "",
            this.persona.apellidos = "",
            this.persona.dni = "",
            this.persona.sexo = "",
            this.persona.fecha_nacimiento = "",
            this.persona.estado_civil = "",
            this.persona.celular = "",
            this.persona.pais = "PERÚ",
            this.persona.departamento = "",
            this.persona.provincia = "",
            this.persona.distrito = "",
            this.persona.direccion = ""
        },
        async limpiar_campos2() {
            this.update_data.name = "",
            this.update_data.email = "",
            this.update_data.id_rol = "0",
            this.update_data.password = "",
            this.update_data.estado = "",
            this.update_data.nombres = "",
            this.update_data.apellidos = "",
            this.update_data.dni = "",
            this.update_data.sexo = "",
            this.update_data.fecha_nacimiento = "",
            this.update_data.estado_civil = "",
            this.update_data.celular = "",
            this.update_data.pais = "PERÚ",
            this.update_data.departamento = "0",
            this.update_data.provincia = "0",
            this.update_data.distrito = "0",
            this.update_data.direccion = "",
            this.update_data.id_user = "",
            this.update_data.per_id = ""
        },
        initDtt() {
            $(document).ready(() => {
                $('#table-usuarios').DataTable({
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
                        { "searchable": false, "targets": [5] }
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
        }
    }
}
</script>
