@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card rounded shadow-sm bg-dark text-white p-3 mb-3 mt-5">
               <h4><i class="bi bi-box-seam"></i> <strong>Bienvenido al Depósito {{ Auth::user()->name }} <i class="bi bi-check text-success"></i></strong></h4>
            </div>


            <div class="card rounded shadow-sm bg-dark text-white">
                <div class="card-body">
                    <strong><label for="id" class="mb-2"><i class="bi bi-search"></i> Armar Jumper</label></strong>
                    <div class="form-group row mb-5">
                        <div class="col-6">
                            <input type="text" min="1" maxlength="10" name="" id="t_id" class="form-control border border-dark text-white" style="background: #181818;" placeholder="Ingrese la Transacción Id"  value="" size="15"/>
                        </div>
                        <div class="col-6">
                            <input type="text" min="1" name="" class="form-control border border-dark text-white" style="background: #181818;" placeholder="Ingrese el Nombre del Panel..."  value="" size="15" onkeyup="buscar(this.value);"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="resultado text-white">
                            
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <div class="from-group"> 
                            <span class="btn text-danger" data-bs-toggle="modal" data-bs-target="#create"><strong><i class="bi bi-plus-circle-fill"></i> Agregar Jumper</strong></span>   
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('modal-create')
</div>

@push('script')
    <!-- toastr -->
    <script src="/dist/toastr/toastr.min.js"></script>
    <!-- sweetalert2 -->
    <script src="/dist/node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
    <!-- ScrollReveal-->
    <script src="https://unpkg.com/scrollreveal"></script>
    <!-- Clipboard-->
    <script src="/dist/clipboard/clipboard.min.js"></script>
    <script>
        ScrollReveal().reveal('.container', { delay: 250 });
    </script>
    <script>
        function buscar(id) {
            $.ajax({
                type: "get",
                url: "/buscar",
                data: "q="+id,
                dataType: "JSON",
                delay: 500,
                beforeSend: function(){
                    //imagen de carga
                    $(".resultado").html('<div class="text-center"><div class="spinner-border text-light" role="status"></div></div>');
                },
                success: function(data){
                    if (data=="") {
                        $(".resultado").empty();
                        $(".resultado").html('<div class="alert alert-danger alert-dismissible fade show col-8 d-flex justify-content-center text-center" role="alert" id="myAlertError"><i class="bi bi-exclamation-triangle-fill"></i> Error! El Panel no Tiene un APIK Asignado.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                    } else {
                        var clipboard = new ClipboardJS('#copiar');
                        clipboard.on('success', function(e) {
                            document.getElementById("copiar").html='<i class="bi bi-check"></i>';
                            document.getElementById("copiar").innerHTML='¡COPIADO!';
                            document.getElementById("copiar").style.backgroundColor = "#157344";
                            window.setTimeout(function() {
                                document.getElementById("copiar").innerHTML='Copiar';
                                document.getElementById("copiar").style.backgroundColor = "";
                            }, 1500);
                        });
                        var link = 'https://pod.prodegemr.com/prodegemr/unsigned-transaction-completion?apik=';
                        var transaction ='&transaction_id=';
                        var id = $("#t_id").val();
                        var completion = '&completion_type=1';
                        console.log(data[0].link);
                        $(".resultado").empty();
                        $(".resultado").html('<div class="text-center"><h5><strong>Jumper :</strong> '+data[0].nombre+'</h5><div class="form-group mb-3"><input class="form-control border border-0 text-white" style="background: #181818;" id="foo" value="'+link+data[0].link+transaction+id+completion+'"/><button class="btn mt-3 btn-success" id="copiar" data-clipboard-target="#foo"><i class="bi bi-clipboard"></i> Copiar</button></div></div>');
                    }
                    

                },
            });
        }
    </script>
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 2000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        });
        //Alerts Errors
        @if ($errors->any())
            @foreach ($errors->all() as $error)
            $(function() {
                toastr.error('{{$error}}') 
            });  
            @endforeach
        @endif
        $("#add").click(function() {
            $.ajax({
            type: 'POST',
            url: 'add',
            data: {
                '_token': $('input[name=_token]').val(),
                'panel': $('#panel').val(),
                'apik': $('#link').val()
            },
            dataType: "JSON",
            success: function(data) {

                Swal.fire({
                    title: 'Jumper Guardado con Exito',
                    icon: 'success',
                    confirmButtonText: 'Cerrar'
                });
                    $('#panel').val('');
                    $('#link').val('');
                    $("#create").modal("hide");
            },        
            error: function(data){
                var errors = $.parseJSON(data.responseText);
                console.log(errors.errors);
                if (errors.errors.panel!=0) {
                    toastr.error(errors.errors.panel);
                }
                if (errors.errors.apik!=0) {
                    toastr.error(errors.errors.apik);
                }
                console.clear();
                $("#create").modal("show");
            }
            
            });
        
        });
    </script>
@endpush
@endsection
