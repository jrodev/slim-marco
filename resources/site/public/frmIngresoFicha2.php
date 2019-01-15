<!DOCTYPE html>
<html lang="es" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title></title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
        <style>
            #thisContainer .card-body {
                padding: 0.75rem;
            }

            #thisContainer > .row > div{
                padding-right: 5px;
                padding-left: 5px;
                margin-bottom: 10px;
            }

            .table-wrapper {
        		width: 700px;
        		margin: 30px auto;
                background: #fff;
                padding: 20px;
                box-shadow: 0 1px 1px rgba(0,0,0,.05);
            }
            .table-title {
                padding-bottom: 10px;
                margin: 0 0 10px;
            }
            .table-title h2 {
                margin: 6px 0 0;
                font-size: 22px;
            }
            .table-title .add-new {
                float: right;
        		height: 30px;
        		font-weight: bold;
        		font-size: 12px;
        		text-shadow: none;
        		min-width: 100px;
        		border-radius: 50px;
        		line-height: 13px;
            }
        	.table-title .add-new i {
        		margin-right: 4px;
        	}
            table.table {
                table-layout: fixed;
            }
            table.table tr th, table.table tr td {
                border-color: #e9e9e9;
            }
            table.table th i {
                font-size: 13px;
                margin: 0 5px;
                cursor: pointer;
            }
            table.table th:last-child {
                width: 100px;
            }
            table.table td a {
        		cursor: pointer;
                display: inline-block;
                margin: 0 5px;
        		min-width: 24px;
            }
        	table.table td a.add {
                color: #27C46B;
            }
            table.table td a.edit {
                color: #FFC107;
            }
            table.table td a.delete {
                color: #E34724;
            }
            table.table td i {
                font-size: 19px;
            }
        	table.table td a.add i {
                font-size: 24px;
            	margin-right: -1px;
                position: relative;
                top: 3px;
            }
            table.table .form-control {
                height: 32px;
                line-height: 32px;
                box-shadow: none;
                border-radius: 2px;
            }
        	table.table .form-control.error {
        		border-color: #f50000;
        	}
        	table.table td .add {
        		display: none;
        	}
        </style>
    </head>
    <body>

        <div class="container">
          <div class="row">
            <div class="col-sm">
              1/3
            </div>
            <div class="col-sm">
              1/3
            </div>
            <div class="col-sm">
              1/3
            </div>
          </div>
          <div class="row">
              <div class="col">
                  <form>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="inputEmail4">Email</label>
                        <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="inputPassword4">Password</label>
                        <input type="password" class="form-control" id="inputPassword4" placeholder="Password">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputAddress">Address</label>
                      <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
                    </div>
                    <div class="form-group">
                      <label for="inputAddress2">Address 2</label>
                      <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="inputCity">City</label>
                        <input type="text" class="form-control" id="inputCity">
                      </div>
                      <div class="form-group col-md-4">
                        <label for="inputState">State</label>
                        <select id="inputState" class="form-control">
                          <option selected>Choose...</option>
                          <option>...</option>
                        </select>
                      </div>
                      <div class="form-group col-md-2">
                        <label for="inputZip">Zip</label>
                        <input type="text" class="form-control" id="inputZip">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="gridCheck">
                        <label class="form-check-label" for="gridCheck">
                          Check me out
                        </label>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Sign in</button>
                  </form>
              </div>
          </div>
        </div>

        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>Employee <b>Details</b></h2></div>
                    <div class="col-sm-4">
                        <button type="button" class="btn btn-info add-new"><i class="fa fa-plus"></i> Add New</button>
                    </div>
                </div>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr><th>Especialidad</th><th>Cantidad</th><th>Actions</th></tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Administration</td>
                        <td>11</td>
                        <td>
							<a class="add" title="Add" data-toggle="tooltip"><i class="material-icons">&#xE03B;</i></a>
                            <a class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                            <a class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>Customer Service</td>
                        <td>13</td>
                        <td>
							<a class="add" title="Add" data-toggle="tooltip"><i class="material-icons">&#xE03B;</i></a>
                            <a class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                            <a class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                        </td>
                    </tr>
                    <tr class="d-none">
                        <td><select class="form-control"><option>Elegir Especialidad</option></select></td>
                        <td><input type="number" class="form-control" /></td>
                        <td>
							<a class="add" title="Add" data-toggle="tooltip"><i class="material-icons">&#xE03B;</i></a>
                            <a class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                            <a class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>


        <form>
            <div  id="thisContainer" class="container">
              <div class="row">
                  <div class="col-xl-3 col-md-6">
                      <div class="card">
                        <div class="card-body">
                          <h6 class="card-title">DATOS GENERALES</h6>
                          <div class="form-row">
                            <div class="form-group col-md-12">
                              <label class="d-none" for="codigo">Codigo</label>
                              <input type="text" class="form-control" id="codigo" name="codigo" placeholder="Ingrese codigo" />
                            </div>
                            <div class="form-group col-md-12">
                              <label class="d-none" for="inputPassword4">Nombre Establecimiento</label>
                              <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre Establecimiento" />
                            </div>
                            <div class="form-group col-md-12">
                              <label class="d-none" for="direccion">Direccion</label>
                              <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Direccion" />
                            </div>
                            <div class="form-group col-md-12">
                              <label class="d-none" for="periodo">Periodo</label>
                              <input type="text" class="form-control" id="periodo" name="periodo" placeholder="Periodo" />
                            </div>
                            <div class="form-group col-md-12 mb-0">
                              <label class="d-none" for="periodo">Categoria</label>
                              <select class="form-control" id="periodo" placeholder="Periodo">
                                  <option>Categoria ...</option>
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>
                  </div>

                  <div class="col-xl-3 col-md-6">
                      <div class="card">
                        <!--img class="card-img-top img-thumbnail" src="..." alt="Card image cap"-->
                        <div class="card-body">
                          <h6 class="card-title">UBICACIÓN</h6>
                          <div class="form-row">
                            <div class="form-group col-md-12">
                              <label class="d-none" for="codigo">Region</label>
                              <select class="form-control" id="region_id" name="region_id" placeholder="Region">
                                  <option>Region ...</option>
                                  <option value="Costa">Costa</option>
                                  <option value="Costa">Sierra</option>
                                  <option value="Costa">Selva</option>
                              </select>
                            </div>
                            <div class="form-group col-md-12">
                                <label class="d-none" for="codigo">Departamento</label>
                                <select class="form-control" id="departamento_id" name="departamento_id" placeholder="Departamento">
                                    <option>Departamento ...</option>
                                </select>
                            </div>
                            <div class="form-group col-md-12">
                                <label class="d-none" for="codigo">Provincia</label>
                                <select class="form-control" id="provincia_id" name="provincia_id" placeholder="Provincia">
                                    <option>Provincia ...</option>
                                </select>
                            </div>
                            <div class="form-group col-md-12 mb-0">
                              <label class="d-none" for="periodo">Distrito</label>
                              <select class="form-control" id="distrito_id" name="distrito_id" placeholder="Distrito">
                                  <option>Distrito ...</option>
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>
                  </div>

                  <div class="col-xl-3 col-md-6">
                      <div class="card">
                        <!--img class="card-img-top img-thumbnail" src="..." alt="Card image cap"-->
                        <div class="card-body">
                          <h6 class="card-title">RED</h6>
                          <div class="form-row">
                            <div class="form-group col-md-12">
                              <label class="d-none" for="codigo">Diris / Diresa</label>
                              <input type="text" class="form-control" id="red_dirisdiresa" name="red_dirisdiresa" placeholder="Diris / Diresa" />
                            </div>
                            <div class="form-group col-md-12">
                              <label class="d-none" for="inputPassword4">Red</label>
                              <input type="text" class="form-control" id="red_red" name="red_red" placeholder="Nombre Establecimiento" />
                            </div>
                            <div class="form-group col-md-12">
                              <label class="d-none" for="direccion">Microred</label>
                              <input type="text" class="form-control" id="red_microred" name="red_microred" placeholder="Direccion" />
                            </div>
                            <div class="form-group col-md-12">
                              <label class="d-none" for="periodo">Institución</label>
                              <input type="text" class="form-control" id="red_institucion" name="red_institucion" placeholder="Periodo" />
                            </div>
                            <div class="form-group col-md-12 mb-0">
                              <label class="d-none" for="periodo">Área Geográfica</label>
                              <select class="form-control" id="red_areageografica" name="red_areageografica" placeholder="Área Geográfica">
                                  <option>Área Geográfica ...</option>
                                  <option value="Rural">Rural</option>
                                  <option value="Urbana">Urbana</option>
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>
                  </div>

                  <div class="col-xl-3 col-md-6">
                      <div class="card">
                        <!--img class="card-img-top img-thumbnail" src="..." alt="Card image cap"-->
                        <div class="card-body">
                          <h6 class="card-title">INFORMACIÓN GENERAL DEL ESTABLECIMIENTO</h6>
                          <div class="form-row">
                            <div class="form-group col-md-12">
                              <label class="d-none" for="codigo">Año puesta en marcha</label>
                              <input type="text" class="form-control" id="gral_aniomarcha" name="gral_aniomarcha" placeholder="Año puesta en marcha" />
                            </div>
                            <div class="form-group col-md-12">
                              <label class="d-none" for="gral_nrocamas">N° de camas (Internamiento/Hospitalización)</label>
                              <input type="text" class="form-control" id="gral_nrocamas" name="gral_nrocamas" placeholder="N° de camas" />
                            </div>
                            <div class="form-group col-md-12">
                              <label class="d-none" for="gral_poblacbenefic">Población Beneficiaria</label>
                              <input type="text" class="form-control" id="gral_poblacbenefic" name="gral_poblacbenefic" placeholder="Población Beneficiaria" />
                            </div>
                            <div class="form-group col-md-12">
                              <label class="d-none" for="gral_inversionInfra">Inversión en Infraestructura</label>
                              <input type="text" class="form-control" id="gral_inversionInfra" name="gral_inversionInfra" placeholder="Inversión en Infraestructura" />
                            </div>
                            <div class="form-group col-md-12 mb-0">
                              <label class="d-none" for="gral_inversionequip">Inversión en Equipamiento</label>
                              <input type="text" class="form-control" id="gral_inversionequip" name="gral_inversionequip" placeholder="Inversión en Equipamiento" />
                            </div>
                          </div>
                        </div>
                      </div>
                  </div>
              </div>

              <div class="row">
                  <div class="col">
                      <div class="card">
                        <!--img class="card-img-top img-thumbnail" src="..." alt="Card image cap"-->
                        <div class="card-body">
                          <h6 class="card-title">GEOLOCALIZACIÓN</h6>
                          <div class="form-row">
                            <div class="form-group col-xl-3 col-md-6">
                              <label class="d-none" for="geo_terrenopropio">El terreno es propio</label>
                              <input title="" type="text" class="form-control" id="geo_terrenopropio" name="geo_terrenopropio" placeholder="Ingrese codigo" />
                            </div>
                            <div class="form-group col-xl-3 col-md-6">
                              <label class="d-none" for="geo_terrenosanea">El terreno cuenta con saneamiento físico legal</label>
                              <input type="text" class="form-control" id="geo_terrenosanea" name="geo_terrenosanea" placeholder="El terreno cuenta con saneamiento físico legal" />
                            </div>
                            <div class="form-group col-xl-3 col-md-6">
                              <label class="d-none" for="geo_areaterreno">Área del terreno (m2)</label>
                              <input type="text" class="form-control" id="geo_areaterreno" name="geo_areaterreno" placeholder="Área del terreno (m2)" />
                            </div>
                            <div class="form-group col-xl-3 col-md-6">
                              <label class="d-none" for="geo_areaconstruida">Área construída (m2)</label>
                              <input type="text" class="form-control" id="geo_areaconstruida" name="geo_areaconstruida" placeholder="Área construída (m2)" />
                            </div>
                            <div class="form-group col-xl-3 col-md-6">
                              <label class="d-none" for="geo_arealibre">Área libre (m2)</label>
                              <input type="text" class="form-control" id="geo_arealibre" name="geo_arealibre" placeholder="Área libre (m2)" />
                            </div>
                            <div class="form-group col-xl-3 col-md-6">
                              <label class="d-none" for="geo_superfterreno">Superficie del terreno</label>
                              <select class="form-control" id="geo_superfterreno" name="geo_superfterreno" placeholder="Superficie del terreno" title="Superficie del terreno">
                                  <option>Superficie del terreno ...</option>
                                  <option value="Plana">Plana</option>
                                  <option value="Inclinada">Inclinada</option>
                              </select>
                            </div>
                            <div class="form-group col-xl-3 col-md-6">
                              <label class="d-none" for="geo_nropisosestabl">Número de pisos del establecimiento</label>
                              <input type="text" class="form-control" id="geo_nropisosestabl" name="geo_nropisosestabl" placeholder="Número de pisos del establecimiento" />
                            </div>

                            <div class="form-group col-xl-3 col-md-6">
                              <label class="d-none" for="geo_latitud">Latitud (Grados Sexagesimales)</label>
                              <input type="text" class="form-control" id="geo_latitud" name="geo_latitud" placeholder="Latitud (Grados Sexagesimales)" />
                            </div>
                            <div class="form-group col-xl-3 col-md-6">
                              <label class="d-none" for="geo_longitud">Longitud (Grados Sexagesimales)</label>
                              <input type="text" class="form-control" id="geo_longitud" name="geo_longitud" placeholder="Longitud (Grados Sexagesimales)" />
                            </div>
                            <div class="form-group col-xl-3 col-md-6">
                              <label class="d-none" for="geo_altura">Altura (m.s.n.m.)</label>
                              <input type="text" class="form-control" id="geo_altura" name="geo_altura" placeholder="Altura (m.s.n.m.)" />
                            </div>
                            <div class="form-group col-xl-3 col-md-6">
                              <label class="d-none" for="geo_poblacRegion">Población actual de la Región (en miles)</label>
                              <input type="text" class="form-control" id="geo_poblacRegion" name="geo_poblacRegion" placeholder="Población actual de la Región (en miles)" />
                            </div>
                            <div class="form-group col-xl-3 col-md-6">
                              <label class="d-none" for="geo_poblacDistrito">Población actual del Distrito (en cientos)</label>
                              <input type="text" class="form-control" id="geo_poblacDistrito" name="geo_poblacDistrito" placeholder="Población actual del Distrito (en cientos)" />
                            </div>
                            <div class="form-group col-xl-3 col-md-6">
                              <label class="d-none" for="geo_areadistrito">Área del Distrito (Km2)</label>
                              <input type="text" class="form-control" id="geo_areadistrito" name="geo_areadistrito" placeholder="Área del Distrito (Km2)" />
                            </div>
                            <div class="form-group col-xl-3 col-md-6">
                              <label class="d-none" for="geo_poblacdensidad">Densidad poblacional (Hab/Km2)</label>
                              <input type="text" class="form-control" id="geo_poblacdensidad" name="geo_poblacdensidad" placeholder="Densidad poblacional (Hab/Km2)" />
                            </div>
                            <div class="form-group col-xl-3 col-md-6">
                              <label class="d-none" for="geo_accesibilidad">Accesibilidad</label>
                              <input type="text" class="form-control" id="geo_accesibilidad" name="geo_accesibilidad" placeholder="Accesibilidad" />
                            </div>
                            <div class="form-group col-xl-3 col-md-6">
                              <label class="d-none" for="geo_tipocamino">Tipo de camino</label>
                              <input type="text" class="form-control" id="geo_tipocamino" name="geo_tipocamino" placeholder="Tipo de camino" />
                            </div>

                          </div>
                        </div>
                      </div>
                  </div>
              </div>

              <div class="row">

                  <div class="card-columns">
                    <div class="card">
                      <!--img class="card-img-top img-thumbnail" src="..." alt="Card image cap"-->
                      <div class="card-body">
                        <h5 class="card-title">DATOS GENERALES</h5>
                        <div class="form-row">
                          <div class="form-group col-md-12">
                            <label for="codigo">Codigo</label>
                            <input type="text" class="form-control" id="codigo" placeholder="Ingrese codigo" />
                          </div>
                          <div class="form-group col-md-12">
                            <label for="inputPassword4">Nombre Establecimiento</label>
                            <input type="text" class="form-control" id="nombre" placeholder="Ingrese codigo">
                          </div>
                          <div class="form-group col-md-12">
                            <label for="direccion">Direccion</label>
                            <input type="text" class="form-control" id="direccion" placeholder="Ingrese direccion">
                          </div>
                          <div class="form-group col-md-12">
                            <label for="periodo">Periodo</label>
                            <input type="text" class="form-control" id="periodo" placeholder="Ingrese periodo">
                          </div>
                        </div>

                      </div>
                    </div>

                    <div class="card w-100">
                      <h5 class="card-header">Featured</h5>
                      <div class="card-body">
                        <h5 class="card-title">Special title treatment</h5>
                        <p class="card-text">It's a broader card with text below as a natural lead-in to extra content. This content is a little longer.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                      </div>
                    </div>

                    <div class="card p-3">
                      <blockquote class="blockquote mb-0 card-body">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                        <footer class="blockquote-footer">
                          <small class="text-muted">
                            Someone famous in <cite title="Source Title">Source Title</cite>
                          </small>
                        </footer>
                      </blockquote>
                    </div>
                    <div class="card">
                      <img class="card-img-top img-thumbnail" src="" alt="Card image cap">
                      <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                      </div>
                    </div>
                    <div class="card bg-primary text-white text-center p-3">
                      <blockquote class="blockquote mb-0">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat.</p>
                        <footer class="blockquote-footer">
                          <small>
                            Someone famous in <cite title="Source Title">Source Title</cite>
                          </small>
                        </footer>
                      </blockquote>
                    </div>
                    <div class="card text-center">
                      <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                      </div>
                    </div>
                    <div class="card">
                      <img class="card-img img-thumbnail" src="..." alt="Card image">
                    </div>
                    <div class="card p-3 text-right">
                      <blockquote class="blockquote mb-0">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                        <footer class="blockquote-footer">
                          <small class="text-muted">
                            Someone famous in <cite title="Source Title">Source Title</cite>
                          </small>
                        </footer>
                      </blockquote>
                    </div>
                    <div class="card">
                      <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">It's a broader card with text below as a natural lead-in to extra content. This content is a little longer.This card has even longer content than the first to show that equal height action.</p>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                      </div>
                    </div>
                  </div>

              </div>
        </div>
        </form>

        <style>
            /* CSS used here will be applied after bootstrap.css */
            /*
            .card-columns {
                -webkit-column-count: 1;
                -moz-column-count: 1;
                column-count: 1;
            }*/

            /*
            Small devices (landscape phones, 34em and up ( 544px ))
            */
            @media (min-width: 34em) {
                .card-columns {
                    -webkit-column-count: 2;
                    -moz-column-count: 2;
                    column-count: 2;
                }

            }

          /*
          Medium devices (tablets, 48em and up (768px))
          */
            @media (min-width: 48em) {
                .card-columns {
                    -webkit-column-count: 2;
                    -moz-column-count: 2;
                    column-count: 2;
                }

            }

          /*
          Large devices (desktops, 62em and up(992px) )
          */
            @media (min-width: 62em) {
                .card-columns {
                    -webkit-column-count: 3;
                    -moz-column-count: 3;
                    column-count: 3;
                }

            }

          /*
          Extra large devices (large desktops, 75em and up (1200px))
          */
            @media (min-width: 75em ) {
                .card-columns {
                    -webkit-column-count: 3;
                    -moz-column-count: 3;
                    column-count: 3;
                }
            }
        </style>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
        <script type="text/javascript">
            $(document).ready( function () {

            	$('[data-toggle="tooltip"]').tooltip();

            	var actions = $("table td:last-child").html();

                // Row Template
                var $rowTpl = $("table tbody tr:last-child");
                $rowTpl.find('select').on("change", function(){
                    console.log( $(this).parent() );
                });

                var fillData = function ($row) {
                    var $sel = $row.find("select");
                    var $inp = $row.find("input");
                    $sel.val();
                };

            	// Append table with add row form on add new button click
                $(".add-new").click( function () {
            		$(this).attr("disabled", "disabled");
            		var index = $("table tbody tr:last-child").index()-1;
                    var row = $rowTpl.clone(true);
                	$("table").append(row);
            		$("table tbody tr").eq(index + 1).find(".add, .edit").toggle();
                    $('[data-toggle="tooltip"]').tooltip();
                });
            	// Add row on add button click
            	$(document).on("click", ".add", function(){
            		var empty = false;
            		var input = $(this).parents("tr").find('input[type="text"]');
                    input.each(function(){
            			if(!$(this).val()){
            				$(this).addClass("error");
            				empty = true;
            			} else{
                            $(this).removeClass("error");
                        }
            		});
            		$(this).parents("tr").find(".error").first().focus();
            		if(!empty){
            			input.each(function(){
            				$(this).parent("td").html($(this).val());
            			});
            			$(this).parents("tr").find(".add, .edit").toggle();
            			$(".add-new").removeAttr("disabled");
            		}
                });
            	// Edit row on edit button click
            	$(document).on("click", ".edit", function(){
                    $(this).parents("tr").find("td:not(:last-child)").each(function(){
            			$(this).html('<input type="text" class="form-control" value="' + $(this).text() + '">');
            		});
            		$(this).parents("tr").find(".add, .edit").toggle();
            		$(".add-new").attr("disabled", "disabled");
                });
            	// Delete row on delete button click
            	$(document).on("click", ".delete", function(){
                    $(this).parents("tr").remove();
            		$(".add-new").removeAttr("disabled");
                });
            });
        </script>
    </body>
</html>
