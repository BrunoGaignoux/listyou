@extends('layouts.app')

@section('content')


{{-- @can('listar_usuario') --}}


<section  class="content" id="contenido_principal">

	@include('flash::message')

<div class="box box-primary box-gris">

     <div class="box-header">
         <div class="col col-md-4">
         <form   action="{{ url('buscar_usuario') }}"  method="post"  >
				<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> 
				<div class="input-group input-group-sm">
					<input type="text" class="form-control" id="dato_buscado" name="dato_buscado" required>
					<span class="input-group-btn">
					<input type="submit" class="btn btn-primary" value="Buscar" >
					</span>

				</div>
						
        </form>
        </div>
        <div class="col col-md-8">
			<div class="margin" id="botones_control">
	              <a href="{{ url("/form_novo_usuario") }}" class="btn btn-primary pull-right" ><i class="glyphicon glyphicon-pencil"></i> Adicionar novo</a>
			</div>
		</div>
    </div>

<div class="box-body box-white">

    <div class="table-responsive" >

	    <table  class="table table-hover table-striped" cellspacing="0" width="100%">
				<thead>
						<tr>    <th>Código</th>
								<th>Função</th>
								<th>Nome</th>
								<th>Email</th>
							    <th>Ação</th>
						</tr>
				</thead>
	    <tbody>

	    @foreach($usuarios as $usuario)
		<tr role="row" class="odd">
			<td>{{ $usuario->id }}</td>
			<td><span class="label label-default">
             
             @foreach($usuario->getRoles() as $roles)
			 {{  $roles.","  }}
             @endforeach
           
             -</span>
			</td>
			<td class="mailbox-messages mailbox-name"><a href="javascript:void(0);"  style="display:block"><i class="fa fa-user"></i>&nbsp;&nbsp;{{ $usuario->name  }}</a></td>
			<td>{{ $usuario->email }}</td>
			<td>
			
			<form action="{!! url('/apagar_usuario') !!}" method="POST">
			 {{ csrf_field() }}
            <div class='btn-group'>
            	<input type="hidden" name="id_usuario" value="{{ $usuario->id }}">
				<a href="{{ url('/form_editar_usuario/'.$usuario->id) }}"  class="btn btn-default btn-xs"><i class="fa fa-fw fa-edit"></i></a>
				{!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Você tem certeza?')"]) !!}
                </div>
            </form>
			</td>
		</tr>
	    @endforeach



		</tbody>
		</table>

	</div>
</div>




{{ $usuarios->links() }}

@if(count($usuarios)==0)


<div class="box box-primary col-xs-12">

<div class='aprobado' style="margin-top:70px; text-align: center">
 
<label style='color:#177F6B'>
              ... Não há resultados para sua busca ...
</label> 

</div>

 </div> 


@endif

</div></section>

{{-- 
@else
<div class="alert alert-danger">
            <strong>Oops! Você não tem permissão para acessar essa página. Consulte o administrador do sistema.</strong><br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>

@endcan --}}

@endsection