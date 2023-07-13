<div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 my-3">
                <h1>Generador de API JSON</h1>
            </div>
            <div class="col-md-6">
                <div>
                    Tipo de petición
                    <select wire:model="tipo_peticion" class="form-select" aria-label="Default select example" disabled>
                        <option value="GET">GET</option>
                        <option value="POST" selected>POST</option>
                    </select>
                </div>
                <div>
                    Token
                    <input type="text" class="form-control" wire:model="token" placeholder="Opcional">
                </div>
                <div class="mt-2 text-center">
                    <button id="generar" class="btn btn-primary">Generar</button>
                </div>
            </div>
            <div class="col-md-6">
                <div>
                    Respuesta JSON
                    <div wire:ignore id="editor" style="height: 300px;">{
    "example_value" : "123" 
}</div>
                    <script wire:ignore>
                        var editor = ace.edit("editor");
                        editor.setTheme("ace/theme/github");
                        editor.session.setMode("ace/mode/json");
                        $("#generar").click(function(){
                            var json = editor.getValue().replace(/\n/g, "").replace(/\t/g, "").replace(/\r/g, "").replace(/ /g, "");
                            @this.generar(json);
                        });
                    </script>
                </div>
            </div>
            <div class="col-md-12">
                <h3>
                    {{$url}}
                </h3>
            </div>
        </div>
    </div>
</div>
