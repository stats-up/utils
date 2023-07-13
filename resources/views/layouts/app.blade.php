<html lang="es">
    <head>
        <title>{{getenv("APP_NAME")}}</title>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--BT-->
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <!-- JavaScript Bundle with Popper -->
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
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
        <!-- ACE EDITOR -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.23.4/ace.js" integrity="sha512-W2EhLZb9bxEATRhug+NU1OHCaM0hovRJbR7BvUNEytEWYJKxZiL4fGz3tiPpid0nycdwW7EnGlSonxvrs+EU6g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.23.4/ace.min.js" integrity="sha512-j/s6QJ8uW2gD8owi6Mw45E2k8w9TwRojEesI02CWZFGxVcQPGfdIwFzKHRONoCYwLMgDdOXORArWjl2oFWFc5Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        @livewireStyles
        @livewireScripts
    </head>
    <body>
        {{$slot}}
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