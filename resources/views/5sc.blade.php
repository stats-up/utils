<html lang="es">

    <head>
        <title>TEMPLATE</title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--BT-->
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
        <!--JQUERY-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <!--FONT AWESOME-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="https://kit.fontawesome.com/08d8c66f7b.js" crossorigin="anonymous"></script>
        <!--RESPONSIVE-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--BTTABLEJS-->
        <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.19.1/dist/bootstrap-table.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.19.1/extensions/filter-control/bootstrap-table-filter-control.min.css" integrity="sha512-Bp809hjtqoA7trnUdQG7vMngkhISMbjQ6kGiCqeCKh4WgLm7GZbQLjCNWWZmeglwp4wc3qpBzBvKNkmpuxRfxw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="https://unpkg.com/bootstrap-table@1.19.1/dist/bootstrap-table.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.19.1/locale/bootstrap-table-es-CL.min.js" integrity="sha512-jDd9P0e5OEX/nDZqoA1F77CKfNFVK06vpW+8u9q88VUyGrMVyvuXxJZMOY+KxaPEI4VRCaTf0zGGRwcZKaKktg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.19.1/extensions/filter-control/bootstrap-table-filter-control.min.js" integrity="sha512-1XwCY4irhpEOFbBka9u+5rDvvDAeJ2/E+4y3pwzHT/L04hHkwJfIF3IhV76fXUqCutcl6xRwzkTJcFLaYzC8Gg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://unpkg.com/bootstrap-table@1.19.1/dist/extensions/export/bootstrap-table-export.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/tableexport.jquery.plugin@1.10.21/libs/jsPDF/jspdf.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/tableexport.jquery.plugin@1.10.21/libs/jsPDF-AutoTable/jspdf.plugin.autotable.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/tableexport.jquery.plugin@1.10.21/tableExport.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
        <!--DATATABLES-->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.11.4/b-2.2.2/b-html5-2.2.2/fh-3.2.1/r-2.2.9/datatables.min.css">
        <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.11.4/b-2.2.2/b-html5-2.2.2/fh-3.2.1/r-2.2.9/datatables.min.js"></script>
        <!--CHART JS-->
        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
        <!-- sweet alert -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
        <style>
            * {
                font-size: 0.9rem;
                color: snow;
            }

            .bg-sidebar {
                background-color: #1a1a1a;
            }

            .bg-content {
                background-color: #2a2a2a;
            }

            hr {
                color: gray;
            }

            .text-5sc {
                color: #FAB529;
            }

            .nav-link {
                color: white;
            }

            .nav-link:hover {
                color: #ffc95d;
            }

            .active {
                color: #ffc95d;
            }

            .btn-5sc {
                background-color: #FAB529;
                color: black;
            }

            .btn-5sc:hover {
                background-color: #ffc95d;
                color: black;
            }
        </style>
    </head>

    <body>
        <div class="row mx-0">
            <div class="col-2 bg-sidebar border-end border-white border-opacity-25" style="height: 100vh;">
                <div class="text-center">
                    <h2 class="mt-2"><span class="text-5sc" style="font-size: 2rem;">5</span>S Consultores</h2>
                </div>
                <hr>
                <div style="height: 85vh">
                    <div class="px-3">
                        <button class="btn btn-5sc w-100" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                            Evaluación Psicolaboral
                            <span>
                                <i class="bi bi-chevron-down text-dark"></i>
                            </span>
                        </button>
                    </div>
                    <div class="collapse show" id="collapseExample">
                        <nav class="nav flex-column" style="font-size: 1.1rem;">
                            <a class="nav-link active" aria-current="page">Mantoverde <i class="fas fa-caret-right text-5sc"></i></a>
                            <a class="nav-link" href="#">Otra Minera</a>
                        </nav>
                    </div>
                </div>
                <div class="">
                    <hr>
                    <button class="btn btn-outline-danger w-100 " type="button">
                        Salir
                    </button>
                </div>
            </div>
            <div class="col-10 bg-content" style="height: 100vh;">
                <table class="table table-dark table-hover mt-3 table-sm">
                    <thead>
                        <tr>
                            <th scope="col">Cargo</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Telefono</th>
                            <th scope="col">Email</th>
                            <th scope="col">Observaciones</th>
                            <th scope="col">Referencias</th>
                            <th scope="col">Validación de titulos</th>
                            <th scope="col">Documentos</th>
                            <th scope="col">Fecha de ingreso</th>
                            <th scope="col">Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Operador</td>
                            <td>Persona Ejemplo 1</td>
                            <td>+12345678901</td>
                            <td>correoejemplo1@correo.com</td>
                            <td>
                                <button class="btn btn-outline-warning btn-sm" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Con Observaciones" style="font-size: 0.7rem;">
                                    Editar observaciones
                                </button>
                            </td>
                            <td>
                                <button class="btn btn-outline-secondary btn-sm  ms-3" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ver Referencias" style="font-size: 0.7rem;">
                                    0/3
                                </button>
                            </td>
                            <td>
                                <button class="btn btn-outline-secondary btn-sm  ms-1" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Titulos Validados" style="font-size: 0.7rem;">
                                    0/1
                                </button>
                            </td>
                            <td>
                                <button class="btn btn-outline-primary btn-sm ms-4">
                                    <i class="bi bi-folder2-open" style="font-size: 1rem;"></i>
                                </button>
                            </td>
                            <td>21/04/2023</td>
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-primary btn-sm ms-1 dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" style="font-size: 0.7rem;">
                                        Acción
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-dark">
                                        <li><a class="dropdown-item text-light" href="#">Apto</a></li>
                                        <li><a class="dropdown-item text-light" href="#">No Apto</a></li>
                                        <li><a class="dropdown-item text-light" href="#">Candidato desiste</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li><a class="dropdown-item " href="#"><b class="text-danger">EMPRESA ANULA SOLICITUD</b></a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Operador</td>
                            <td>Persona Ejemplo 2</td>
                            <td>+12345678902</td>
                            <td>correoejemplo2@correo.com</td>
                            <td>
                                <button class="btn btn-outline-secondary btn-sm" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Sin Observaciones" style="font-size: 0.7rem;">
                                    Editar observaciones
                                </button>
                            </td>
                            <td>
                                <button class="btn btn-info btn-sm  ms-3" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ver Referencias" style="font-size: 0.7rem;">
                                    2/3
                                </button>
                            </td>
                            <td>
                                <button class="btn btn-outline-secondary btn-sm  ms-1" data-bs-toggle="tooltip" data-bs-placement="bottom" title="En espera..." style="font-size: 0.7rem;">
                                    0/1
                                </button>
                            </td>
                            <td>
                                <button class="btn btn-outline-primary btn-sm ms-4" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ver Documentos" >
                                    <i class="bi bi-folder2-open" style="font-size: 1rem;"></i>
                                </button>
                            </td>
                            <td>20/04/2023</td>
                            <td>
                                <div class="mt-1 ms-1">
                                    En curso
                                    <div class="spinner-grow text-success" role="status" style="height: 12px; width: 12px;">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Operador</td>
                            <td>Persona Ejemplo 3</td>
                            <td>+12345678903</td>
                            <td>correoejemplo3@correo.com</td>
                            <td>
                                <button class="btn btn-outline-secondary btn-sm" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Sin Observaciones" style="font-size: 0.7rem;">
                                    Editar observaciones
                                </button>
                            </td>
                            <td>
                                <button class="btn btn-success btn-sm  ms-3" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ver Referencias" style="font-size: 0.7rem;">
                                    3/3
                                </button>
                            </td>
                            <td>
                                <button class="btn btn-success btn-sm  ms-1" data-bs-toggle="tooltip" data-bs-placement="bottom" title="En espera..." style="font-size: 0.7rem;">
                                    1/1
                                </button>
                            </td>
                            <td>
                                <button class="btn btn-outline-primary btn-sm ms-4" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ver Documentos" >
                                    <i class="bi bi-folder2-open" style="font-size: 1rem;"></i>
                                </button>
                            </td>
                            <td>01/01/2023</td>
                            <td>
                                <span class="badge text-bg-success ms-1 mt-1">Completado</span>
                            </td>
                        </tr>
                        <tr>
                            <td>Operador</td>
                            <td>Persona Ejemplo 4</td>
                            <td>+12345678904</td>
                            <td>correoejemplo4@correo.com</td>
                            <td>
                                <button class="btn btn-outline-secondary btn-sm" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Sin Observaciones" style="font-size: 0.7rem;">
                                    Editar observaciones
                                </button>
                            </td>
                            <td>
                                <button class="btn btn-success btn-sm  ms-3" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ver Referencias" style="font-size: 0.7rem;">
                                    2/2
                                </button>
                            </td>
                            <td>
                                <button class="btn btn-success btn-sm  ms-1" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Titulos Validados" style="font-size: 0.7rem;">
                                    2/2
                                </button>
                            </td>
                            <td>
                                <button class="btn btn-outline-primary btn-sm ms-4" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ver Documentos" >
                                    <i class="bi bi-folder2-open" style="font-size: 1rem;"></i>
                                </button>
                            </td>
                            <td>01/01/2023</td>
                            <td>
                                <span class="badge text-bg-success ms-1 mt-1">Completado</span>
                            </td>
                        </tr>
                        <tr>
                            <td>Operador</td>
                            <td>Persona Ejemplo 5</td>
                            <td>+12345678905</td>
                            <td>correoejemplo5@correo.com</td>
                            <td>
                                <button class="btn btn-outline-secondary btn-sm" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Sin Observaciones" style="font-size: 0.7rem;">
                                    Editar observaciones
                                </button>
                            </td>
                            <td>
                                <button class="btn btn-outline-secondary btn-sm  ms-3" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ver Referencias" style="font-size: 0.7rem;">
                                    0/3
                                </button>
                            </td>
                            <td>
                                <button class="btn btn-outline-secondary btn-sm  ms-1" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Titulos Validados" style="font-size: 0.7rem;">
                                    0/1
                                </button>
                            </td>
                            <td>
                                <button class="btn btn-outline-primary btn-sm ms-4" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ver Documentos" >
                                    <i class="bi bi-folder2-open" style="font-size: 1rem;"></i>
                                </button>
                            </td>
                            <td>01/01/2023</td>
                            <td>
                                <span class="badge text-bg-danger ms-1 mt-1" style="width: 68px">No Apto</span>
                            </td>
                        </tr>
                        <tr>
                            <td>Operador</td>
                            <td>Persona Ejemplo 6</td>
                            <td>+12345678906</td>
                            <td>correoejemplo6@correo.com</td>
                            <td>
                                <button class="btn btn-outline-secondary btn-sm" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Sin Observaciones" style="font-size: 0.7rem;">
                                    Editar observaciones
                                </button>
                            </td>
                            <td>
                                <button class="btn btn-success btn-sm  ms-3" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ver Referencias" style="font-size: 0.7rem;">
                                    3/3
                                </button>
                            </td>
                            <td>
                                <button class="btn btn-outline-danger btn-sm  ms-1" data-bs-toggle="tooltip" data-bs-placement="bottom" title="uno o más titulos no está(n) validado" style="font-size: 0.7rem;">
                                    2/2
                                </button>
                            </td>
                            <td>
                                <button class="btn btn-outline-primary btn-sm ms-4" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ver Documentos" >
                                    <i class="bi bi-folder2-open" style="font-size: 1rem;"></i>
                                </button>
                            </td>
                            <td>01/01/2023</td>
                            <td>
                                <span class="badge text-bg-success ms-1 mt-1">Completado</span>
                            </td>
                        </tr>
                        <tr>
                            <td>Operador</td>
                            <td>Persona Ejemplo 3</td>
                            <td>+12345678903</td>
                            <td>correoejemplo3@correo.com</td>
                            <td>
                                <button class="btn btn-outline-secondary btn-sm" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Sin Observaciones" style="font-size: 0.7rem;">
                                    Editar observaciones
                                </button>
                            </td>
                            <td>
                                <button class="btn btn-success btn-sm  ms-3" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ver Referencias" style="font-size: 0.7rem;">
                                    3/3
                                </button>
                            </td>
                            <td>
                                <button class="btn btn-success btn-sm  ms-1" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Titulos Validados" style="font-size: 0.7rem;">
                                    2/2
                                </button>
                            </td>
                            <td>
                                <button class="btn btn-outline-primary btn-sm ms-4" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ver Documentos" >
                                    <i class="bi bi-folder2-open" style="font-size: 1rem;"></i>
                                </button>
                            </td>
                            <td>01/01/2023</td>
                            <td>
                                <span class="badge text-bg-success ms-1 mt-1">Completado</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            });
            const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
            const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
            window.addEventListener('swalLoading', event =>{
                Swal.fire({
                    title: 'Cargando...',
                    text: 'Espere un momento',
                    showConfirmButton: false,
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    allowEnterKey: false,
                    onBeforeOpen: () => {
                        Swal.showLoading()
                    }
                });
            });
            window.addEventListener('swalClose', event =>{
                Swal.close();
            });
        </script>
    </body>

</html>