<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUsuarioRequest;
use App\Http\Requests\UpdateUsuarioRequest;
use App\Repositories\UsuarioRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class UsuarioController extends AppBaseController
{
    /** @var  UsuarioRepository */
    private $usuarioRepository;

    public function __construct(UsuarioRepository $usuarioRepo)
    {
        $this->usuarioRepository = $usuarioRepo;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the Usuario.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->usuarioRepository->pushCriteria(new RequestCriteria($request));
        $usuarios = $this->usuarioRepository->paginate(20);

        return view('usuarios.index')
            ->with('usuarios', $usuarios);
    }

    /**
     * Show the form for creating a new Usuario.
     *
     * @return Response
     */
    public function create()
    {
        return view('usuarios.create');
    }

    /**
     * Store a newly created Usuario in storage.
     *
     * @param CreateUsuarioRequest $request
     *
     * @return Response
     */
    public function store(CreateUsuarioRequest $request)
    {
        $input = $request->all();

        $usuario = $this->usuarioRepository->create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => bcrypt($input['password']),

        ]);

        Flash::success('Usuario saved successfully.');

        return redirect(route('usuarios.index'));
    }

    /**
     * Display the specified Usuario.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $usuario = $this->usuarioRepository->findWithoutFail($id);

        if (empty($usuario)) {
            Flash::error('Usuario not found');

            return redirect(route('usuarios.index'));
        }

        return view('usuarios.show')->with('usuario', $usuario);
    }

    /**
     * Show the form for editing the specified Usuario.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $usuario = $this->usuarioRepository->findWithoutFail($id);

        if (empty($usuario)) {
            Flash::error('Usuario not found');

            return redirect(route('usuarios.index'));
        }

        return view('usuarios.edit')->with('usuario', $usuario);
    }

    /**
     * Update the specified Usuario in storage.
     *
     * @param  int              $id
     * @param UpdateUsuarioRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUsuarioRequest $request)
    {
        $usuario = $this->usuarioRepository->findWithoutFail($id);

        if (empty($usuario)) {
            Flash::error('Usuario not found');

            return redirect(route('usuarios.index'));
        }

        $usuario = $this->usuarioRepository->update($request->all(), $id);

        Flash::success('Usuario updated successfully.');

        return redirect(route('usuarios.index'));
    }

    /**
     * Remove the specified Usuario from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $usuario = $this->usuarioRepository->findWithoutFail($id);

        if (empty($usuario)) {
            Flash::error('Usuario not found');

            return redirect(route('usuarios.index'));
        }

        $this->usuarioRepository->delete($id);

        Flash::success('Usuario deleted successfully.');

        return redirect(route('usuarios.index'));
    }
}
