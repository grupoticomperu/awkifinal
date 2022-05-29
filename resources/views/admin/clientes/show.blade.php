@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Cliente</h1>
@stop

@section('content')

<div class="row">

    <div class="col-md-3">

        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Datos del Cliente</h3>
            </div>

            <!-- /.card-header -->
            <div class="card-body">

                <div class="form-group {{ $errors->has('nombres') ? 'text-danger' : '' }}">
                    <label>Nombres y Apellidos</label>
                    <input name="nombres" value="{{ old('nombres', $cliente->nombres) }}" type="text"
                        class="form-control" placeholder="ingrese aquí el nombre y apellido del cliente">
                    <!-- el segundo parametro del old sirve para pintar en caso este vacio -->
                    <!-- <div class="poner la clase para sombrear solo el mensaje">-->
                    {!! $errors->first('nombres', '<span class="help-block">:message</span>') !!}
                    <!-- </div>-->
                    <!-- le ponemos !! a cambio del { y del }-->
                </div>

                <div class="form-group {{ $errors->has('dni') ? 'text-danger' : '' }}">
                    <label>DNI</label>
                    <input name="dni" value="{{ old('dni', $cliente->dni) }}" type="text" class="form-control"
                        placeholder="ingrese DNI del cliente">

                    {!! $errors->first('dni', '<span class="help-block">:message</span>') !!}

                </div>

                <!-- tienda es user -->
                <div class="form-group {{ $errors->has('user_id') ? 'text-danger' : '' }}">
                    <label>Tiendas</label>
                    <select name="user_id" class="form-control select2">
                        <option value="">Selecciona una tienda</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}"
                                {{ old('user_id', $cliente->user_id) == $user->id ? 'selected' : '' }}>
                                {{ $user->name }}</option>
                        @endforeach
                    </select>
                    {!! $errors->first('user_id', '<span class="help-block">:message</span>') !!}
                </div>

                <div class="form-group {{ $errors->has('zona') ? 'text-danger' : '' }}">
                    <label>Zona</label>
                    <input name="zona" value="{{ old('zona', $cliente->zona) }}" type="text" class="form-control"
                        placeholder="ingrese zona del cliente">

                    {!! $errors->first('zona', '<span class="help-block">:message</span>') !!}

                </div>

                <div class="form-group {{ $errors->has('tipodocumento') ? 'text-danger' : '' }}">
                    <label>Tipo Documento</label>
                    <input name="tipodocumento" value="{{ old('tipodocumento', $cliente->tipodocumento) }}" type="text" class="form-control"
                        placeholder="ingrese tipo documento del cliente">

                    {!! $errors->first('tipodocumento', '<span class="help-block">:message</span>') !!}

                </div>

            



                <div class="form-group {{ $errors->has('numdocumento') ? 'text-danger' : '' }}">
                    <label>Número Documento</label>
                    <input name="numdocumento" value="{{ old('numdocumento', $cliente->numdocumento) }}" type="text"
                        class="form-control" placeholder="ingrese aquí el numero de documento">
             
                    {!! $errors->first('numdocumento', '<span class="help-block">:message</span>') !!}
               
                </div>


                <div class="form-group">
                    <label>Fecha de Venta:</label>

                    <div class="input-group date">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-calendar-alt"></i>
                            </span>
                        </div>
                        <input name="fechadeventa" value="{{ old('fechadeventa', $cliente->fechadeventa) }}"
                            type="text" class="form-control pull-right" id="datepicker">
                    </div>
                    <!-- /.input group -->
                </div>


                <div class="form-group">
                    <label>Fecha de Recepción:</label>

                    <div class="input-group date">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-calendar-alt"></i>
                            </span>
                        </div>
                        <input name="fechaderecepcion"
                            value="{{ old('fechaderecepcion', $cliente->fechaderecepcion) }}" type="text"
                            class="form-control pull-right" id="datepicker2">
                    </div>
                    <!-- /.input group -->
                </div>

                <div class="form-group {{ $errors->has('estadocivil') ? 'text-danger' : '' }}">
                    <label>Estado Civil</label>
                    <input name="estadocivil" value="{{ old('estadocivil', $cliente->estadocivil) }}" type="text"
                        class="form-control" placeholder="ingrese aquí el estado civil">
             
                    {!! $errors->first('estadocivil', '<span class="help-block">:message</span>') !!}
               
                </div>                   

                <div class="form-group {{ $errors->has('pagoadministrativo') ? 'text-danger' : '' }}">
                    <label>Pago Administrativo</label>
                    <input name="pagoadministrativo" value="{{ old('pagoadministrativo', $cliente->pagoadministrativo) }}" type="text"
                        class="form-control" placeholder="ingrese aquí el pago administrativo">
             
                    {!! $errors->first('pagoadministrativo', '<span class="help-block">:message</span>') !!}
               
                </div>   

                <div class="form-group {{ $errors->has('tipoventa') ? 'text-danger' : '' }}">
                    <label>Tipo Venta</label>
                    <input name="tipoventa" value="{{ old('tipoventa', $cliente->tipoventa) }}" type="text"
                        class="form-control" placeholder="ingrese aquí el Tipo de venta">
             
                    {!! $errors->first('tipoventa', '<span class="help-block">:message</span>') !!}
               
                </div>                          

                <div class="form-group {{ $errors->has('montodelacompra') ? 'text-danger' : '' }}">
                    <label>Monto de la compra</label>
                    <input name="montodelacompra" value="{{ old('montodelacompra', $cliente->montodelacompra) }}"
                        type="text" class="form-control" placeholder="ingrese monto de la compra">
                    {!! $errors->first('montodelacompra', '<span class="help-block">:message</span>') !!}
                </div>




            </div>


        </div>

    </div>



    <div class="col-md-3">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Datos del Vehículo</h3>
            </div>
            <div class="card-body">



                <div class="form-group {{ $errors->has('marca') ? 'text-danger' : '' }}">
                    <label>Marca</label>
                    <input name="marca" value="{{ old('marca', $cliente->marca) }}" type="text"
                        class="form-control" placeholder="ingrese marca">

                    {!! $errors->first('marca', '<span class="help-block">:message</span>') !!}

                </div>


                <div class="form-group {{ $errors->has('modelo') ? 'text-danger' : '' }}">
                    <label>Modelo</label>
                    <input name="modelo" value="{{ old('modelo', $cliente->modelo) }}" type="text"
                        class="form-control" placeholder="ingrese modelo">
                    {!! $errors->first('modelo', '<span class="help-block">:message</span>') !!}
                </div>

                <div class="form-group {{ $errors->has('chasis') ? 'text-danger' : '' }}">
                    <label>Chasis</label>
                    <input name="chasis" value="{{ old('chasis', $cliente->chasis) }}" type="text"
                        class="form-control" placeholder="ingrese chasis">
                    {!! $errors->first('chasis', '<span class="help-block">:message</span>') !!}
                </div>

                <div class="form-group {{ $errors->has('motor') ? 'text-danger' : '' }}">
                    <label>Motor</label>
                    <input name="motor" value="{{ old('motor', $cliente->motor) }}" type="text"
                        class="form-control" placeholder="ingrese motor">
                    {!! $errors->first('motor', '<span class="help-block">:message</span>') !!}
                </div>


                <div class="form-group {{ $errors->has('color') ? 'text-danger' : '' }}">
                    <label>Color</label>
                    <input name="color" value="{{ old('color', $cliente->color) }}" type="text"
                        class="form-control" placeholder="ingrese color">
                    {!! $errors->first('color', '<span class="help-block">:message</span>') !!}
                </div>

                <div class="form-group {{ $errors->has('anio') ? 'text-danger' : '' }}">
                    <label>Año</label>
                    <input name="anio" value="{{ old('anio', $cliente->anio) }}" type="text"
                        class="form-control" placeholder="ingrese año">
                    {!! $errors->first('anio', '<span class="help-block">:message</span>') !!}
                </div>

                <div class="form-group {{ $errors->has('categoria') ? 'text-danger' : '' }}">
                    <label>Categoria</label>
                    <input name="categoria" value="{{ old('categoria', $cliente->categoria) }}" type="text"
                        class="form-control" placeholder="ingrese categoria">
                    {!! $errors->first('categoria', '<span class="help-block">:message</span>') !!}
                </div>

                <div class="form-group {{ $errors->has('dua') ? 'text-danger' : '' }}">
                    <label>Dua</label>
                    <input name="dua" value="{{ old('dua', $cliente->dua) }}" type="text" class="form-control"
                        placeholder="ingrese dua">
                    {!! $errors->first('dua', '<span class="help-block">:message</span>') !!}
                </div>


                <div class="form-group {{ $errors->has('item') ? 'text-danger' : '' }}">
                    <label>Item</label>
                    <input name="item" value="{{ old('item', $cliente->item) }}" type="text"
                        class="form-control" placeholder="ingrese item">
                    {!! $errors->first('item', '<span class="help-block">:message</span>') !!}
                </div>

                <div class="form-group {{ $errors->has('certificado') ? 'text-danger' : '' }}">
                    <label>Certificado</label>
                    <input name="certificado" value="{{ old('certificado', $cliente->certificado) }}" type="text"
                        class="form-control" placeholder="ingrese certificado">
                    {!! $errors->first('certificado', '<span class="help-block">:message</span>') !!}
                </div>

                <!-- pdf certificado -->
                <div class="image-wrapper">
                    @isset($cliente->pdfcertificado)
                        <a href="{{ Storage::url($cliente->pdfcertificado) }}" target="_blank"><img
                                src="{{ asset('img/logopdf.jpg') }}"></a>
                    @else
                        <a href="#">No hay Certificado</a>
                    @endif

                </div>

                <div>
                    <div class="form-group">
                            {!! Form::label('pdfcertificado', 'Certificado') !!}
                            {!! Form::file('pdfcertificado', ['class' => 'form-control-file', 'accept' => 'pdf/*']) !!}

                            @error('pdfcertificado')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                    </div>


                </div>

                <!-- pdf certificado -->

               



            </div>


        </div>
    </div>


    <div class="col-md-3">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Datos de SUNARP</h3>
            </div>
            <div class="card-body">



                <div class="form-group {{ $errors->has('oficinaregistral') ? 'text-danger' : '' }}">
                    <label>Ingrese oficina registral</label>
                    <input name="oficinaregistral"
                        value="{{ old('oficinaregistral', $cliente->oficinaregistral) }}" type="text"
                        class="form-control" placeholder="ingrese oficina registral">

                    {!! $errors->first('oficinaregistral', '<span class="help-block">:message</span>') !!}

                </div>


                <div class="form-group">
                    <label>fecha de ingreso</label>

                    <div class="input-group date">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-calendar-alt"></i>
                            </span>
                        </div>
                        <input name="fechadeingreso"
                            value="{{ old('fecha de ingreso', $cliente->fechadeingreso) }}"
                            type="text" class="form-control pull-right" id="datepickerfili">
                    </div>
                    <!-- /.input group -->
                </div>


                <div class="form-group {{ $errors->has('titulo') ? 'text-danger' : '' }}">
                    <label>Título</label>
                    <input name="titulo"
                        value="{{ old('titulo', $cliente->titulo) }}" type="text"
                        class="form-control" placeholder="ingrese Título">

                    {!! $errors->first('titulo', '<span class="help-block">:message</span>') !!}

                </div>

                <div class="form-group {{ $errors->has('codigodeverificacion') ? 'text-danger' : '' }}">
                    <label>Código de verificación</label>
                    <input name="codigodeverificacion"
                        value="{{ old('codigodeverificacion', $cliente->codigodeverificacion) }}" type="text"
                        class="form-control" placeholder="ingrese Código de Verificación">

                    {!! $errors->first('codigodeverificacion', '<span class="help-block">:message</span>') !!}

                </div>


            {{--  <div class="form-group {{ $errors->has('recibo') ? 'text-danger' : '' }}">
                    <label>Recibo</label>
                    <input name="recibo"
                        value="{{ old('recibo', $cliente->recibo) }}" type="text"
                        class="form-control" placeholder="ingrese Recibo">

                    {!! $errors->first('recibo', '<span class="help-block">:message</span>') !!}

                </div>   
                
                <div class="form-group {{ $errors->has('importe') ? 'text-danger' : '' }}">
                    <label>Importe</label>
                    <input name="importe" value="{{ old('importe', $cliente->importe) }}"
                        type="text" class="form-control" placeholder="ingrese el Importe">
                    {!! $errors->first('importe', '<span class="help-block">:message</span>') !!}
                </div> --}}


                <div class="form-group {{ $errors->has('statussunarp') ? 'text-danger' : '' }}">
                    <label>Status SUNARP</label>
                    <input name="statussunarp"
                        value="{{ old('statussunarp', $cliente->statussunarp) }}" type="text"
                        class="form-control" placeholder="ingrese status SUNARP">

                    {!! $errors->first('statussunarp', '<span class="help-block">:message</span>') !!}

                </div> 

                <!-- pdf Observacion -->
                <div class="image-wrapper">
                        @isset($cliente->pdfobservacion)
                            <a href="{{ Storage::url($cliente->pdfobservacion) }}"><img
                                    src="{{ asset('img/logopdf.jpg') }}"></a>
                        @else
                            <a href="#">No hay Observación</a>
                        @endif

                </div>

                <div>
                    <div class="form-group">
                        {!! Form::label('pdfobservacion', 'desacargar Observación') !!}

                        {!! Form::file('pdfobservacion', ['class' => 'form-control-file', 'accept' => 'pdf/*']) !!}


                        @error('file2')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                    </div>
                </div>

                <!-- pdf observacion-->



                <div class="form-group">
                    <label>Fecha de Observación:</label>

                    <div class="input-group date">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-calendar-alt"></i>
                            </span>
                        </div>
                        <input name="fechadeobservacion"
                            value="{{ old('fechadeobservacion', $cliente->fechadeobservacion) }}" type="text"
                            class="form-control pull-right" id="datepickerfobs">
                    </div>
                    <!-- /.input group -->
                </div>




                              
            </div>
        </div>

    </div>


    <div class="col-md-3">

        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Datos de la Entrega</h3>
            </div>

            <!-- /.card-header -->
            <div class="card-body">
              
                <!-- pdf tarjeta de propiedad -->                     
                <div class="image-wrapper">
                    @isset($cliente->pdftarjetadepropiedad)
                        <a href="{{ Storage::url($cliente->pdftarjetadepropiedad) }}"><img src="{{ asset('img/logopdf.jpg') }}"></a>
                    @else
                        <a href="#">No hay tarjeta de propiedad</a>
                    @endif
                </div>
                                
                <div>
                    <div class="form-group">
                        {!! Form::label('pdftarjetadepropiedad', 'PDF tarjeta de propiedad') !!}

                        {!! Form::file('pdftarjetadepropiedad', ['class' => 'form-control-file', 'accept' => 'pdf/*']) !!}


                        @error('pdftarjetadepropiedad')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                    </div>


                </div>
                            
                <!-- pdf tarjetadepropeidad -->




                <!-- pdf cargo de envio -->                      
                <div class="image-wrapper">
                    @isset($cliente->pdfcargodeenvio)
                        <a href="{{ Storage::url($cliente->pdfcargodeenvio) }}"><img src="{{ asset('img/logopdf.jpg') }}"></a>
                            @else
                                <a href="#">No hay cargo de envío</a>
                            @endif
                </div>
                                
                <div>
                    <div class="form-group">
                        {!! Form::label('pdfcargodeenvio', 'Cargo de Envío') !!}

                        {!! Form::file('pdfcargodeenvio', ['class' => 'form-control-file', 'accept' => 'pdf/*']) !!}


                            @error('pdfcargodeenvio')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                    </div>
                </div>
                <!-- pdf cargo de envio -->



                <div class="form-group {{ $errors->has('numerodeplaca') ? 'text-danger' : '' }}">
                    <label>Numero de placa</label>
                    <input name="numerodeplaca" value="{{ old('numerodeplaca', $cliente->numerodeplaca) }}" type="text"
                        class="form-control" placeholder="ingrese número de placa">

                    {!! $errors->first('numerodeplaca', '<span class="help-block">:message</span>') !!}

                </div>


                <div class="form-group">
                    <label>fecha de envio </label>

                    <div class="input-group date">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-calendar-alt"></i>
                            </span>
                        </div>
                        <input name="fechadeenvio"
                            value="{{ old('fechadeenvio', $cliente->fechadeenvio) }}"
                            type="text" class="form-control pull-right" id="datepickerfep">
                    </div>
                    <!-- /.input group -->
                </div>







                <div class="form-group {{ $errors->has('guiaderemision') ? 'text-danger' : '' }}">
                    <label>Guia de Remision</label>
                    <input name="guiaderemision" value="{{ old('guiaderemision', $cliente->guiaderemision) }}" type="text"
                        class="form-control" placeholder="ingrese guia de remisión">

                    {!! $errors->first('guiaderemision', '<span class="help-block">:message</span>') !!}

                </div>



                
                <div class="form-group {{ $errors->has('statusfinal') ? 'text-danger' : '' }}">
                    <label>Status final</label>
                    <input name="statusfinal" value="{{ old('statusfinal', $cliente->statusfinal) }}" type="text"
                        class="form-control" placeholder="Status final">

                    {!! $errors->first('statusfinal', '<span class="help-block">:message</span>') !!}

                </div>












            </div>


        </div>

    </div>
    



</div>


<div class="row">
    <div class="col-md-12">
      
            <label>Contenido de la observación</label>
            <textarea rows="15" name="observacion" id="observacion" class="form-control">
                {!! $cliente->observacion !!}
            </textarea>
           


    </div>
</div>
@stop

@section('js')
            <script src="https://cdn.ckeditor.com/ckeditor5/32.0.0/classic/ckeditor.js"></script>
    



      
            <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
     


         




            <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.js"></script>  -->


            <script>
                ClassicEditor
                    .create(document.querySelector('#observacion'))
                    .catch(error => {
                        console.error(error);
                    });
            </script>




        @stop