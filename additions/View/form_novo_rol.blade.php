@extends ('layouts.app')
@section('content')
<section class="content" >
@include('flash::message')
<div class="col-md-12">

    <div class="box box-primary  box-gris">
 
            <div class="box-header with-border my-box-header">
                <h3 class="box-title"><strong>Novo Tipo de Usuário</strong></h3>
            </div><!-- /.box-header -->
               
            <hr style="border-color:white;" />
 
            <div class="box-body">
              
            <form   action="{{ url('criar_rol') }}"  method="post" id="f_crear_rol" class="formentrada"  >
				<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> 
                
                <div class="col-md-12">	  
	                <div class="form-group">
							<label class="col-sm-2" for="apellido">Nome *</label>
	                    <div class="col-sm-10" >
							<input type="text" class="form-control" id="rol_nombre" name="rol_nombre" " required >
	                    </div>
					</div><!-- /.form-group -->

			    </div><!-- /.col -->

			      <div class="col-md-12">	  
	                <div class="form-group">
							<label class="col-sm-2" for="apellido">Sigla *</label>
	                    <div class="col-sm-10" >
							<input type="text" class="form-control" id="rol_slug" name="rol_slug" " required >
	                    </div>
					</div><!-- /.form-group -->

			    </div><!-- /.col -->

			      <div class="col-md-12">	  
	                <div class="form-group">
							<label class="col-sm-2" for="apellido">Descrição *</label>
	                    <div class="col-sm-10" >
							<input type="text" class="form-control" id="rol_descripcion" name="rol_descripcion" " required >
	                    </div>
					</div><!-- /.form-group -->

			    </div><!-- /.col -->


                <div class="box-footer col-xs-12 box-gris ">
                        <button type="submit" class="btn btn-primary">Criar Novo Tipo de Usuário</button>
                </div>
            </form>
                    
            </div>
                    
    </div>
                       
</div>


<div class="col-md-12">

    <div class="table-responsive" >

	    <table  class="table table-hover table-striped" cellspacing="0" width="100%">
				<thead>
						<tr>    <th>Código</th>
								<th>Nome</th>
								<th>Sigla</th>
								<th>Descrição</th>
							    <th>Ação</th>
						</tr>
				</thead>
	    <tbody>

	    @foreach($roles as $rol)
		<tr role="row" class="odd" id="filaR_{{  $rol->id }}">
			<td>{{ $rol->id }}</td>
			<td><span class="label label-default">{{ $rol->name or "Ninguno" }}</span></td>
			<td class="mailbox-messages mailbox-name"><a href="javascript:void(0);" style="display:block"><i class="fa fa-user"></i>&nbsp;&nbsp;{{ $rol->slug  }}</a></td>
			<td>{{ $rol->description }}</td>
			<td>
			<a href="{!! url('/form_editar_rol/'.$rol->id) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
			<a href="{!! url('excluir_rol/'.$rol->id) !!}" class='btn btn-danger btn-xs'><i class="glyphicon glyphicon-trash"></i></a>
			</td>
		</tr>
	    @endforeach



		</tbody>
		</table>

	</div>
</div>
<a href="{!! url('/listar_usuarios') !!}" class="btn btn-default"><i class="glyphicon glyphicon-chevron-left"></i> Voltar</a>

</section>
@endsection