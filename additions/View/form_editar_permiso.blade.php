@extends ('layouts.app')
@section('content')
<section class="content" >
@include('flash::message')
<div class="col-md-12">

    <div class="box box-primary  box-gris">
 
            <div class="box-header with-border my-box-header">
                <h3 class="box-title"><strong>Alterar dados de {{ $permiso->name }}</strong></h3>
            </div><!-- /.box-header -->
               
            <hr style="border-color:white;" />
 
            <div class="box-body">
              
            <form   action="{{ url('editar_permiso') }}"  method="post" id="f_editar_permiso" class="formentrada"  >
				<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> 
				<input type="hidden" name="id_permiso" value="{{ $permiso->id }}"> 
                
                <div class="col-md-12">	  
	                <div class="form-group">
							<label class="col-sm-2" for="apellido">Nome *</label>
	                    <div class="col-sm-10" >
							<input type="text" class="form-control" id="permiso_nombre" name="permiso_nombre" value="{{ $permiso->name }}" required >
	                    </div>
					</div><!-- /.form-group -->

			    </div><!-- /.col -->

			      <div class="col-md-12">	  
	                <div class="form-group">
							<label class="col-sm-2" for="apellido">Sigla *</label>
	                    <div class="col-sm-10" >
							<input type="text" class="form-control" id="permiso_slug" name="permiso_slug" value="{{ $permiso->slug }}" required >
	                    </div>
					</div><!-- /.form-group -->

			    </div><!-- /.col -->

			      <div class="col-md-12">	  
	                <div class="form-group">
							<label class="col-sm-2" for="apellido">Descrição *</label>
	                    <div class="col-sm-10" >
							<input type="text" class="form-control" id="permiso_descripcion" name="permiso_descripcion" value="{{ $permiso->descripcion }}" required >
	                    </div>
					</div><!-- /.form-group -->

			    </div><!-- /.col -->


                <div class="box-footer col-xs-12 box-gris ">
                        <button type="submit" class="btn btn-primary">Atualizar Dados</button>
                </div>
            </form>
                    
            </div>
                    
    </div>
                       
</div>

<a href="{!! url('/form_novo_permiso') !!}" class="btn btn-default"><i class="glyphicon glyphicon-chevron-left"></i> Voltar</a>

</section>
@endsection