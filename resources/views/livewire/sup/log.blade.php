<div>
    @livewire("sup.nav")
    <div wire:ignore>
        <div class="row" style="height: 90%">
            <div class="col-md-10">
                <div wire:ignore id="log" style="height: 90%"></div>
            </div>
            <div class="col-md-2">
                <button wire:click="deleteLog" class="btn btn-danger btn-block w-100" style="margin-top: 10px;">
                    <i class="fas fa-trash-alt"></i>
                    Eliminar Log
                </button>
            </div>
        </div>
    </div>
    <script wire:ignore>
        var editor = ace.edit("log");
        editor.setTheme("ace/theme/chrome");
        editor.getSession().setMode("ace/mode/pascal");
        editor.setOption("wrap", true);
    </script>
    <script wire:poll="actualizar_log()">
        window.addEventListener('actualizarLog', event => {
            editor.setValue(event.detail.log);
            var row = editor.session.getLength() - 1;
            var column = editor.session.getLine(row).length;
            editor.gotoLine(row + 1, column);
        });
    </script>
</div>