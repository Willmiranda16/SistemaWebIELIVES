<template>
    <div >
       <div class="section-body">
            <div class="container-fluid">
                <div class="d-flex justify-content-between align-items-center ">
                    <div class="header-action">
                        <h1 class="page-title">Personal Académico</h1>
                        <ol class="breadcrumb page-breadcrumb d-none">
                            <li class="breadcrumb-item"><a href="#">Ericsson</a></li>
                            <li class="breadcrumb-item active" aria-current="page">personal</li>
                        </ol>
                    </div>
                    <ul class="nav nav-tabs page-header-tab">
                        <li id="li-all" class="nav-item"><a id="link-all" class="nav-link active" data-toggle="tab" href="#personal-all">Ver Lista</a></li>
                        <li id="li-grid" class="nav-item d-none"><a id="link-grid" class="nav-link" data-toggle="tab" href="#personal-grill">Ver Cuadricula</a></li>
                        <li id="li-add" class="nav-item d-none"><a id="link-add" class="nav-link" data-toggle="tab" href="#personal-add">Registrar Personal</a></li>
                        <li id="li-update" class="nav-item d-none"><a id="link-update" class="nav-link" data-toggle="tab" href="#personal-update">Actualizar Personal</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="section-body mt-4">
            <div class="container-fluid">
                <div class="tab-content">
                    <div class="tab-pane active" id="personal-all">
                        <a @click="mostrar_crear()" style="background: rgb(0,147,221);background: linear-gradient(180deg, rgba(0,147,221,1) 0%, rgba(115,162,235,1) 100%);" class="btn btn-primary mb-4" href="#">Registrar Personal</a>
                        <div class="card row">
                            <div class="card-body col-md-12">
                                <div class="">
                                    <table id="table-personal" class="display " style="width:100%">
                                        <thead>
                                            <tr>
                                                <th class="d-none">#</th>
                                                <th>NOMBRES</th>
                                                <th>TURNO</th>
                                                <th>NIVEL</th>
                                                <th>ESPECIALIDAD</th>
                                                <th>ROL</th>
                                                <th>TUTOR</th>
                                                <th>OPCIONES</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="(item, index) in data" :key="index">
                                                <td class="d-none">{{item.pa_id}}</td>
                                                <td>{{item.nombres}} {{item.apellidos}}</td>
                                                <td>{{item.pa_turno}}</td>
                                                <td>{{item.nivel}}</td>
                                                <td>{{item.pa_especialidad}}</td>
                                                <td>{{item.rol}}</td>
                                                <td>
                                                    <span v-if="item.pa_is_tutor==1" class="tag tag-success">SI</span>
                                                    <span v-else class="tag tag-danger">NO</span>
                                                </td>
                                                <td>
                                                <button type="button" class="btn btn-icon btn-sm" title="Editar" @click="mostrar_actualizar(item)"><i class="fa fa-edit text-warning"></i></button>
                                                <button type="button" class="btn btn-icon btn-sm js-sweetalert" title="Eliminar" data-type="confirm" @click="eliminar_personal(item.pa_id)"><i class="fa fa-trash-o text-danger"></i></button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="tab-pane" id="personal-grid">
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
                    </div> -->
                    <div class="tab-pane" id="personal-add">
                        <div class="row clearfix">
                            <form class="row" @submit.prevent="agregar_personal">
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
                                                        <option value="0" disabled>-- Selecciona --</option>
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
                                                <div class="col-lg-3 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label>País <span class="text-danger">*</span></label>
                                                        <input type="text" v-model="persona.pais" class="form-control" required disabled>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-6 col-sm-12">
                                                    <label>Departamento <span class="text-danger">*</span></label>
                                                    <select v-model="persona.departamento" class="form-control show-tick" required @change="listar_provincias()">
                                                        <option value="0" selected disabled>-- Selecciona --</option>
                                                         <option v-for="d in departamentos" :key="d.id" v-bind:value="d.idDepa">
                                                            {{ d.departamento }}
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="col-lg-3 col-md-6 col-sm-12">
                                                    <label>Provincia <span class="text-danger">*</span></label>
                                                    <select v-model="persona.provincia" class="form-control show-tick" required @change="listar_distritos()">
                                                        <option value="0" selected disabled>-- Selecciona --</option>
                                                         <option v-for="p in provincias" :key="p.id" v-bind:value="p.idProv">
                                                            {{ p.provincia }}
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="col-lg-3 col-md-6 col-sm-12">
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
                                                <div class="col-lg-4 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Correo </label>
                                                        <input type="email" v-model="persona.email" class="form-control" >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Información Académica</h3>
                                            <div class="card-options ">
                                                <a href="#" class="card-options-collapse d-none" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                                                <a href="#" class="card-options-remove d-none" data-toggle="card-remove"><i class="fe fe-x"></i></a>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row clearfix">
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <label>Nivel <span class="text-danger">*</span></label>
                                                    <select  v-model="personalAcademico.niv_id"  class="form-control show-tick" required>
                                                        <option value="0" selected disabled>-- Selecciona --</option>
                                                         <option v-for="r in niveles" :key="r.id" v-bind:value="r.niv_id">
                                                            {{ r.niv_descripcion }}
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Turno <span class="text-danger">*</span></label>
                                                        <input id="usuario" name="usuario" type="text"  v-model="personalAcademico.turno"  class="form-control" aria-invalid="true" autofocus required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <label>Rol <span class="text-danger">*</span></label>
                                                    <select  v-model="personalAcademico.rol_id"  class="form-control show-tick" required>
                                                        <option value="0" selected disabled>-- Selecciona --</option>
                                                         <option v-for="r in roles" :key="r.id" v-bind:value="r.rol_id">
                                                            {{ r.rol_descripcion }}
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Condición Laboral <span class="text-danger">*</span></label>
                                                        <input id="text" name="text" type="text"  v-model="personalAcademico.condicion_laboral"  class="form-control" aria-invalid="true" autofocus required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Especialidad <span class="text-danger">*</span></label>
                                                        <input id="text" name="text" type="text"  v-model="personalAcademico.especialidad"  class="form-control" aria-invalid="true" autofocus required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <label>Tutor <span class="text-danger">*</span></label>
                                                    <select v-model="personalAcademico.is_tutor" class="form-control show-tick" required>
                                                        <option value="0" disabled>-- Selecciona --</option>
                                                        <option value="1">SI</option>
                                                        <option value="2">NO</option>
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
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="tab-pane" id="personal-update">
                        <div class="row clearfix">
                            <form class="row" @submit.prevent="actualizar_personal">
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
                                                            <input type="number" v-model="personal_update.dni" class="form-control" minlength="8" maxlength="8" required disabled>
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
                                                        <input type="text" v-model="personal_update.nombres" class="form-control" required disabled>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Apellidos <span class="text-danger">*</span></label>
                                                        <input type="text" v-model="personal_update.apellidos" class="form-control" required disabled>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-12">
                                                    <label>Sexo <span class="text-danger">*</span></label>
                                                    <select v-model="personal_update.sexo" class="form-control show-tick" required disabled>
                                                        <option value="0" disabled>-- Selecciona --</option>
                                                        <option value="M">Masculino</option>
                                                        <option value="F">Femenino</option>
                                                    </select>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Fecha de Nacimiento </label>
                                                        <input type="date" v-model="personal_update.fecha_nacimiento" class="form-control" >
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-12">
                                                    <label>Estado Civil </label>
                                                    <select v-model="personal_update.estado_civil" class="form-control show-tick" >
                                                        <option value="0" disabled>-- Selecciona --</option>
                                                        <option value="S">Soltero</option>
                                                        <option value="C">Casado</option>
                                                        <option value="D">Divorciado</option>
                                                        <option value="V">Viudo</option>
                                                    </select>
                                                </div>
                                                <div class="col-lg-3 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label>País <span class="text-danger">*</span></label>
                                                        <input type="text" v-model="personal_update.pais" class="form-control" required disabled>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-6 col-sm-12">
                                                    <label>Departamento <span class="text-danger">*</span></label>
                                                    <select v-model="personal_update.departamento" class="form-control show-tick" required @change="listar_provincias()">
                                                        <option value="0" selected disabled>-- Selecciona --</option>
                                                         <option v-for="d in departamentos" :key="d.id" v-bind:value="d.idDepa">
                                                            {{ d.departamento }}
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="col-lg-3 col-md-6 col-sm-12">
                                                    <label>Provincia <span class="text-danger">*</span></label>
                                                    <select v-model="personal_update.provincia" class="form-control show-tick" required @change="listar_distritos()">
                                                        <option value="0" selected disabled>-- Selecciona --</option>
                                                         <option v-for="p in provincias" :key="p.id" v-bind:value="p.idProv">
                                                            {{ p.provincia }}
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="col-lg-3 col-md-6 col-sm-12">
                                                    <label>Distrito <span class="text-danger">*</span></label>
                                                    <select v-model="personal_update.distrito" class="form-control show-tick" required>
                                                        <option value="0" selected disabled>-- Selecciona --</option>
                                                         <option v-for="d in distritos" :key="d.id" v-bind:value="d.idDist">
                                                            {{ d.distrito }}
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Dirección </label>
                                                        <input type="text" v-model="personal_update.direccion" class="form-control" >
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Celular</label>
                                                        <input type="number" v-model="personal_update.celular" class="form-control" minlength="9" maxlength="9">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Correo </label>
                                                        <input type="email" v-model="personal_update.email" class="form-control" >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Información Académica</h3>
                                            <div class="card-options ">
                                                <a href="#" class="card-options-collapse d-none" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                                                <a href="#" class="card-options-remove d-none" data-toggle="card-remove"><i class="fe fe-x"></i></a>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row clearfix">
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <label>Nivel <span class="text-danger">*</span></label>
                                                    <select  v-model="personal_update.niv_id"  class="form-control show-tick" required>
                                                        <option value="0" selected disabled>-- Selecciona --</option>
                                                         <option v-for="r in niveles" :key="r.id" v-bind:value="r.niv_id">
                                                            {{ r.niv_descripcion }}
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Turno <span class="text-danger">*</span></label>
                                                        <input id="usuario" name="usuario" type="text"  v-model="personal_update.turno"  class="form-control" aria-invalid="true" autofocus required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <label>Rol <span class="text-danger">*</span></label>
                                                    <select  v-model="personal_update.rol_id"  class="form-control show-tick" required>
                                                        <option value="0" selected disabled>-- Selecciona --</option>
                                                         <option v-for="r in roles" :key="r.id" v-bind:value="r.rol_id">
                                                            {{ r.rol_descripcion }}
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Condición Laboral <span class="text-danger">*</span></label>
                                                        <input id="text" name="text" type="text"  v-model="personal_update.condicion_laboral"  class="form-control" aria-invalid="true" autofocus required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Especialidad <span class="text-danger">*</span></label>
                                                        <input id="text" name="text" type="text"  v-model="personal_update.especialidad"  class="form-control" aria-invalid="true" autofocus required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <label>Tutor <span class="text-danger">*</span></label>
                                                    <select v-model="personal_update.is_tutor" class="form-control show-tick" required>
                                                        <option value="0" disabled>-- Selecciona --</option>
                                                        <option value="1">SI</option>
                                                        <option value="2">NO</option>
                                                    </select>
                                                </div>
                                                <div class="col-lg-12 col-md-6 col-sm-12 mt-3 d-none">
                                                    <span class="text-danger">* Campos requeridos</span>
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
            roles: {},
            niveles: {},
            departamentos: {},
            provincias: {},
            distritos: {},
            grados: {},
            data: {},
            personalAcademico: {
                turno: '',
                condicion_laboral: '',
                niv_id: '0',
                especialidad: '',
                rol_id: '0',
                is_tutor: '0',
            },
            persona: {
                per_id: '',
                nombres: '',
                apellidos: '',
                dni: '',
                sexo: '0',
                fecha_nacimiento: '',
                estado_civil: '0',
                celular: "",
                email: "",
                pais: "PERÚ",
                departamento: "0",
                provincia: "0",
                distrito: "0",
                direccion: ""
            },
            personal_update: {
                id_personal: '',
                turno: '',
                condicion_laboral: '',
                niv_id: '0',
                especialidad: '',
                rol_id: '0',
                is_tutor: '0',

                per_id: '',
                nombres: '',
                apellidos: '',
                dni: '',
                sexo: '0',
                fecha_nacimiento: '',
                estado_civil: '0',
                celular: "",
                email: "",
                pais: "PERÚ",
                departamento: "0",
                provincia: "0",
                distrito: "0",
                direccion: ""
            },
            loading: false,
            loadingDni: false,
            buscando: false,
        }
    },
    mounted(){
        this.listar_personal();
        this.listar_roles();
        this.listar_niveles();
        this.listar_departamentos();
    },
    computed: {
        user(){
            return JSON.parse(user.content);
        }
    },
    methods: {
        async agregar_personal(){
            this.loading = true;
            axios.post("/api/agregar-personal",{
                params: {
                    personalAcademico: this.personalAcademico,
                    persona: this.persona
                }
            })
            .then(response=>{
                setTimeout(() => {
                    this.loading = false;
                    swal({
                        title: "Personal Registrado !!",
                        icon: "success",
                    }).then((willConfirm) => {
                        this.limpiar_campos();
                        this.listar_personal()
                        this.cancelar();
                    });
                }, 1000);
            })
            .catch(error=>{
                console.log(error)
            })

        },
        async eliminar_personal(id){
            swal({
                title: "Estas seguro de eliminar este personal?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    axios.post("/api/eliminar-personal",{
                        params: {
                            id_personal: id
                        }
                    })
                    .then(response=>{
                        setTimeout(() => {
                            swal({
                                title: "Personal Eliminado !!",
                                icon: "success",
                            }).then((willConfirm) => {
                                this.listar_personal()
                            });
                        }, 1000);
                    })
                    .catch(error=>{
                        console.log(error)
                    })
                }
            });
        },
        async actualizar_personal(){
            this.loading = true;
            axios.post("/api/actualizar-personal",{
                params: {
                    data: this.personal_update,
                }
            })
            .then(response=>{
                setTimeout(() => {
                    this.loading = false;
                    swal({
                        title: "Personal Actualizado !!",
                        icon: "success",
                    }).then((willConfirm) => {
                        this.limpiar_campos2();
                        this.listar_personal()
                        this.cancelar2();
                    });
                }, 1000);
            })
            .catch(error=>{
                console.log(error)
            })
        },
        async listar_personal() {
            this.buscando = true;
            axios.get("/api/listar-personal-all")
            .then(response=>{
                $('#table-personal').DataTable().destroy();
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
                        this.persona.email =  response.data.per_email,
                        this.persona.pais =  response.data.per_pais,
                        this.persona.departamento =  response.data.per_departamento,
                        this.persona.provincia =  response.data.per_provincia,
                        this.persona.distrito =  response.data.per_distrito,
                        this.persona.direccion =  response.data.per_direccion,
                        this.persona.per_id =  response.data.per_id

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
        async listar_roles() {
            axios.get("/api/listar-rol")
            .then(response=>{
                this.roles = response.data
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
            const div = document.getElementById("personal-all").classList;
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
            const div2 = document.getElementById("personal-add").classList;
            const link2 = document.getElementById("link-add").classList;
            div2.add("active");
            div2.add("show");
            link2.add("active");
            const opcion_li = document.getElementById("li-add").classList;
            opcion_li.remove("d-none");
        },
        async mostrar_actualizar(item){
            const div = document.getElementById("personal-all").classList;
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
            const div2 = document.getElementById("personal-update").classList;
            const link2 = document.getElementById("link-update").classList;
            div2.add("active");
            div2.add("show");
            link2.add("active");
            const opcion_li = document.getElementById("li-update").classList;
            opcion_li.remove("d-none");

            this.listar_prov_dist(item.departamento,item.provincia);

            this.personal_update.id_personal = item.pa_id,
            this.personal_update.turno = item.pa_turno,
            this.personal_update.condicion_laboral = item.pa_condicion_laboral,
            this.personal_update.niv_id = item.niv_id,
            this.personal_update.especialidad = item.pa_especialidad,
            this.personal_update.rol_id = item.rol_id,
            this.personal_update.is_tutor = item.pa_is_tutor,

            this.personal_update.per_id = item.per_id,
            this.personal_update.nombres = item.nombres,
            this.personal_update.apellidos = item.apellidos,
            this.personal_update.dni = item.dni,
            this.personal_update.sexo = item.sexo,
            this.personal_update.email = item.email,
            this.personal_update.fecha_nacimiento = item.fecha_nacimiento,
            this.personal_update.estado_civil = item.estado_civil,
            this.personal_update.celular = item.celular,
            this.personal_update.pais = item.pais,
            this.personal_update.departamento = item.departamento,
            this.personal_update.provincia = item.provincia,
            this.personal_update.distrito = item.distrito,
            this.personal_update.direccion = item.direccion
        },
        async cancelar(){
            const div = document.getElementById("personal-add").classList;
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
            const div2 = document.getElementById("personal-all").classList;
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
            const div = document.getElementById("personal-update").classList;
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
            const div2 = document.getElementById("personal-all").classList;
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
            this.personalAcademico.turno = '',
            this.personalAcademico.condicion_laboral = '',
            this.personalAcademico.niv_id = '0',
            this.personalAcademico.especialidad = '',
            this.personalAcademico.rol_id = '0',
            this.personalAcademico.is_tutor = '0',

            this.persona.per_id = '',
            this.persona.nombres = '',
            this.persona.apellidos = '',
            this.persona.dni = '',
            this.persona.sexo = '0',
            this.persona.fecha_nacimiento = '',
            this.persona.estado_civil = '0',
            this.persona.celular = "",
            this.persona.email = "",
            this.persona.pais = "PERÚ",
            this.persona.departamento = "0",
            this.persona.provincia = "0",
            this.persona.distrito = "0",
            this.persona.direccion = ""
        },
        async limpiar_campos2() {
            this.personal_update.id_personal = '',
            this.personal_update.turno = '',
            this.personal_update.condicion_laboral = '',
            this.personal_update.niv_id = '0',
            this.personal_update.especialidad = '',
            this.personal_update.rol_id = '0',
            this.personal_update.is_tutor = '0',

            this.personal_update.per_id = '',
            this.personal_update.nombres = '',
            this.personal_update.apellidos = '',
            this.personal_update.dni = '',
            this.personal_update.sexo = '0',
            this.personal_update.fecha_nacimiento = '',
            this.personal_update.estado_civil = '0',
            this.personal_update.celular = "",
            this.personal_update.pais = "PERÚ",
            this.personal_update.departamento = "0",
            this.personal_update.provincia = "0",
            this.personal_update.distrito = "0",
            this.personal_update.direccion = ""
        },
        initDtt() {
            $(document).ready(() => {
                $('#table-personal').DataTable({
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
                    { "searchable": false, "targets": [6] }
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
