<?php

namespace App\Http\Controllers;

use App\Exports\CrudsExport;
use App\Http\Repositories\CrudRepository;
use App\Http\Requests\CrudsRequest;
use App\Imports\CrudsImport;
use App\Models\Crud;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;

class CrudController extends Controller
{

    protected $repository;

    public function __construct()
    {
        $this->repository = new CrudRepository(new Crud());
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $users = Crud::all();
        return view('file', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CrudsRequest $crudRequest
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function store(CrudsRequest $crudRequest)
    {
        DB::beginTransaction();
        try {
            $this->repository->create($crudRequest->all());
            DB::commit();
            return Excel::download(new CrudsExport(), 'users.xlsx');
        } catch (Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
        }

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    public function importFile(Request $request)
    {
        DB::beginTransaction();
        try {
            $cruds = Excel::toCollection(new CrudsImport(), $request->file('import_file'));
            foreach ($cruds[0] as $crud) {
                Crud::where('id', $crud[0])->update([
                    'name' => $crud[1],
                    'gender' => $crud[2],
                    'phone' => $crud[3],
                    'email' => $crud[4],
                    'address' => $crud[5],
                    'nation' => $crud[6],
                    'dob' => $crud[7],
                    'ed_bg' => $crud[8],
                    'contact_mode' => $crud[9],
                ]);
            }
            DB::commit();
            return back();
        } catch (Exception $exception) {
            DB::rollBack();
            Log::error($exception->getMessage());
        }
    }
}
