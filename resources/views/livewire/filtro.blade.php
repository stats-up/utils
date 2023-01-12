<div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <hr>
                <div class="input-group">
                    <input wire:mode="file" type="file" class="form-control" id="archivoXlsx" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                </div>
                <div class="text-danger" wire:loading wire:target="file">Uploading...</div>
            </div>
            <div class="col-md-12 mt-5" >
                <!--DATA TABLE-->
                <div  class="table-responsive table-responsive-data2">
                    <table id="table" class="table table-data2" style="font-size: 0.9rem;">
                        <thead>
                            <tr style="font-size: 0.8rem;">
                                <th>Documento de ventas</th>
                                <th>N° Pedido Cliente</th>
                                <th>Pos Ped Cliente</th>
                                <th>Pos SAP</th>
                                <th>Material</th>
                                <th>Texto breve material</th>
                                <th>Cantidad de pedido</th>
                                <th>Q. Pdte Pedido de Venta</th>
                                <th>Libre utilización</th>
                                <th>Cliente Solicitante</th>
                                <th>1ª Fecha</th>
                                <th>FeFinOF</th>
                                <th>Diff</th>
                                <th>Fecha de entrega Pedido Compras</th>
                                <th>Diff</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datos as $dato)
                                @php
                                    $intervalFeFinOF = null;
                                    $intervalFechaEntrega = null;
                                    if($dato['1ª Fecha'] != null){
                                        if($dato['FeFinOF'] != null){
                                            $intervalFeFinOF = (new DateTimeImmutable($dato['FeFinOF']->format('Y-m-d')))->diff(new DateTimeImmutable($dato['1ª Fecha']->format('Y-m-d')))->format('%R%a');
                                        }
                                        if($dato['Fecha de entrega Pedido Compras'] != null){
                                            $intervalFechaEntrega = (new DateTimeImmutable($dato['Fecha de entrega Pedido Compras']->format('Y-m-d')))->diff(new DateTimeImmutable($dato['1ª Fecha']->format('Y-m-d')))->format('%R%a');
                                        }
                                    }
                                @endphp
                                <tr>
                                    <td>{{$dato['Documento de ventas']}}</td>
                                    <td>{{$dato['N° Pedido Cliente']}}</td>
                                    <td>{{$dato['Pos Ped Cliente']}}</td>
                                    <td>{{$dato['Posición pedido de Venta']}}</td>
                                    <td>{{$dato['Material']}}</td>
                                    <td>{{$dato['Texto breve material']}}</td>
                                    <td>{{$dato['Cantidad de pedido']}}</td>
                                    <td>{{$dato['Q. Pdte Pedido de Venta']}}</td>
                                    <td>{{$dato['Libre utilización']}}</td>
                                    <td>{{$dato['Cliente Solicitante']}}</td>
                                    <td data-order="{{$dato['1ª Fecha']->format('Y-m-d')}}" style="white-space: nowrap;">
                                        @if($dato['1ª Fecha'] != null)
                                            {{$dato['1ª Fecha']->format('d-m-Y')}}
                                        @endif
                                    </td>
                                    <td data-order="{{$dato['FeFinOF'] != null ? $dato['FeFinOF']->format('Y-m-d') : ""}}" class="text-center" style="white-space: nowrap;">
                                        @if($dato['FeFinOF'] != null)
                                            <span>
                                                {{$dato['FeFinOF']->format('d-m-Y')}}
                                            </span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($intervalFeFinOF != null)
                                            @if ($intervalFeFinOF > 0)
                                                <span class="badge bg-success">
                                                    {{$intervalFeFinOF}}
                                                </span>
                                            @elseif($intervalFeFinOF >= -3)
                                                <span class="badge bg-warning">
                                                    {{$intervalFeFinOF}}
                                                </span>
                                            @else
                                                <span class="badge bg-danger">
                                                    {{$intervalFeFinOF}}
                                                </span>
                                            @endif
                                        @endif
                                    </td>
                                    <td data-order="{{$dato['Fecha de entrega Pedido Compras'] != null ? $dato['Fecha de entrega Pedido Compras']->format('Y-m-d') : ""}}" class="text-center" style="white-space: nowrap;">
                                        @if($dato['Fecha de entrega Pedido Compras'] != null)
                                            <span>
                                                {{$dato['Fecha de entrega Pedido Compras'] != null ? $dato['Fecha de entrega Pedido Compras']->format('d-m-Y') : ""}}
                                            </span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($intervalFechaEntrega != null)
                                            @if ($intervalFechaEntrega > 0)
                                                <span class="badge bg-success">
                                                    {{$intervalFechaEntrega}}
                                                </span>
                                            @elseif($intervalFechaEntrega >= -3)
                                                <span class="badge bg-warning">
                                                    {{$intervalFechaEntrega}}
                                                </span>
                                            @else
                                                <span class="badge bg-danger">
                                                    {{$intervalFechaEntrega}}
                                                </span>
                                            @endif
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        window.addEventListener('datatable', function(){
            $('#table').DataTable({
                dom: 'Blfrtip',
                lengthMenu: [
                    [ 10, 25, 50, -1 ],
                    [ '10', '25', '50', 'Todas las' ]
                ],
                buttons: {
                    buttons: [
                        {
                            extend: 'excel', 
                            className: 'bg-primary mb-2', 
                            text: "Descargar Excel (xlsx)",
                            exportOptions: {
                                columns: [0,1,2,3,4,5,6,7,8,9,10,12]
                            }
                        }
                    ]
                },
                order: [2, "desc" ],
                language: {
                    "decimal": "",
                    "emptyTable": "No hay información",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Filas",
                    "infoEmpty": "Mostrando 0 to 0 of 0 Filas",
                    "infoFiltered": "(Filtrado de MAX total Filas)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "Mostrar _MENU_ Filas",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "search": "Buscar:",
                    "zeroRecords": "Sin resultados encontrados",
                    "paginate": {
                        "first": "Primero",
                        "last": "Ultimo",
                        "next": "Siguiente",
                        "previous": "Anterior"
                        }
                },
            });
        });
        $('#archivoXlsx').change(function(e){
            let file = document.querySelector('input[type="file"]').files[0]
            @this.upload('file', file, (uploadedFilename) => {
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
                @this.load()
            }, () => {
                //Toast notification
                Toast.fire({
                    icon: 'error',
                    title: 'Error al cargar el archivo'
                })
            }, (event) => {
                // Progress callback.
                // event.detail.progress contains a number between 1 and 100 as the upload progresses.
            })
        });
    </script>
</div>