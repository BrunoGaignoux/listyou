@extends ('layouts.app')
@section('content')
<section class="content" >
@include('flash::message')
 <div class="col-md-12">

  <div class="box box-primary  box-gris">
 
    <div class="box-header with-border my-box-header">
      <h3 class="box-title"><strong>Novo Usuario</strong></h3>
    </div><!-- /.box-header -->
      <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
      <hr style="border-color:white;" />
 
    <div class="box-body">
              
      <form   action="{{ url('criar_usuario') }}"  method="post" id="f_crear_usuario" class="formentrada" >
				<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> 

          <div class="col-md-6">
                  <div class="form-group">
                    <label class="col-sm-2" for="nombre">Nome*</label>
                    <div class="col-sm-10" >
                      <input type="text" class="form-control" id="nome" name="nome"  required   >
                       </div>
                  </div><!-- /.form-group -->

           

          </div><!-- /.col -->

                
        <div class="col-md-6">
                  <div class="form-group">
									  <label class="col-sm-2" for="sobrenome">Sobrenome*</label>
                    <div class="col-sm-10" >
										<input type="text" class="form-control" id="sobrenome" name="sobrenome" " required >
                    </div>
									</div><!-- /.form-group -->

				</div><!-- /.col -->

        <div class="col-md-6">
                    <div class="form-group">
                      <label class="col-sm-2" for="telefone">Telefone*</label>
                       
                       <div class="col-sm-10" >
                        <input type="text" class="form-control" id="telefone" name="telefone" required >
                       </div>

                      </div><!-- /.form-group -->

        </div><!-- /.col -->

        
        <div class="box-header with-border my-box-header col-md-12" style="margin-bottom:15px;margin-top: 15px;">
                    <h3 class="box-title">Dados de Acesso</h3>
        </div>
       

                <div class="col-md-6">
                  <div class="form-group">
                    <label class="col-sm-2" for="email">Email*</label>
                    <div class="col-sm-10" >
                    <input type="email" class="form-control" id="email" name="email"  required >
                    </div>

                    </div><!-- /.form-group -->

                  </div><!-- /.col -->

                  <div class="col-md-6">
                  <div class="form-group">
                    <label class="col-sm-2" for="email">Senha*</label>
                    <div class="col-sm-10" >
                    <input type="password" class="form-control" id="password" name="password"  required >
                    </div>

                    </div><!-- /.form-group -->

                  </div><!-- /.col -->


            



                    <div class="box-footer col-xs-12 box-gris ">
                                        <button type="submit" class="btn btn-primary">Criar Novo Usuario</button>
                    </div>


                   </form>
                    
                    </div>
                    
                    </div>
                       <a href="{!! url('/listar_usuarios') !!}" class="btn btn-default"><i class="glyphicon glyphicon-chevron-left"></i> Voltar</a>
                    </div>
</section>
@endsection