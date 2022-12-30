<div>
    @livewire("sup.nav")
    <div class="row mx-0">
        <div class="col-md-1"></div>
        <div wire:ignore class="col-md-10">
            <table  class="table table-striped table-bordered " id="table-componentes">
                <thead>
                    <tr>
                        <th>Vista</th>
                        <th>Componente</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($vistas as $vista)
                    <tr>
                        <td>
                            v: <a wire:click="getCodeView('{{$vista}}')" class="triggered" href="#" data-bs-toggle="modal" data-bs-target="#modalSource">{{$vista}}</a>
                        </td>
                        <td>
                            c: <a wire:click="getCodeComponent('{{$vista}}')" class="triggered" href="#" data-bs-toggle="modal" data-bs-target="#modalSource">{{$vista}}</a>
                        </td>
                        <td><span class="badge bg-success">OK</span></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-md-1"></div>
    </div>
    <div wire:ignore.self class="modal fade" id="modalSource" tabindex="-1" aria-labelledby="modalSourceLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modalSourceLabel">{{$nombre}}</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <pre id="codigo" style="display: none;">{{$codigo}}</pre>
                <div wire:ignore id="code" style="height: 50vh;"></div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
          </div>
        </div>
      </div>
    <script>
        var editor = ace.edit("code");
        editor.setTheme("ace/theme/chrome");
        //editor readonly
        editor.setReadOnly(true);
        editor.getSession().setMode("ace/mode/php");
        editor.setOption("wrap", true);
        $(".triggered").click(function(e){
            //Swal.fire cargando
            Swal.fire({
                title: 'Cargando...',
                allowOutsideClick: false,
                allowEscapeKey: false,
                allowEnterKey: false,
                onOpen: () => {
                    Swal.showLoading()
                }
            });
            //wait 0.5 seconds
            setTimeout(function(){
                //get innet html from #code
                var codigo = $("#codigo").html();
                //replace &lt; with <
                codigo = codigo.replace(/&lt;/g, "<");
                //replace &gt; with >
                codigo = codigo.replace(/&gt;/g, ">");
                // -1 para desmarcar todo
                editor.setValue(codigo,-1);
                Swal.close();
            }, 500);
        });
        $('#table-componentes').DataTable({
            "ordering": true,
            "pageLength" : 10,
            "order": [[1 , "desc"]],
            "lengthMenu": [[5,10, 25, 50, -1], [5,10, 25, 50, "Todos"]],
            language: {
                "decimal": "",
                "emptyTable": "No hay resultados",
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
            }
        });
    </script>
</div>
