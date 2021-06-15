<?php

namespace App\Http\Controllers;

use App\Exports\CrudsExport;
use App\Http\Repositories\CrudRepository;
use App\Http\Requests\CrudsRequest;
use App\Models\Crud;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

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
     * @return Application|Factory|View
     */
    public function index()
    {
        $users = $this->repository->getAll();
        return view('file', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CrudsRequest $crudRequest
     * @return RedirectResponse|BinaryFileResponse
     */
    public function store(CrudsRequest $crudRequest)
    {
        DB::beginTransaction();
        try {
            $this->repository->create($crudRequest->all());
            DB::commit();
            return back()->with('success', 'Data Added Successfully');
        } catch (Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return back()->with('failed', 'Data Cannot Added Successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View
     */
    public function show($id)
    {
        $user = $this->repository->getById($id);
        return view('detail', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $users = $this->repository->getAll();
        return view('lists', compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $user = $this->repository->getById($id);
        return view('welcome', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CrudsRequest $crudRequest
     * @param int $id
     * @return RedirectResponse
     */
    public function update(CrudsRequest $crudRequest, $id)
    {
        DB::beginTransaction();
        try {
            $data = $this->repository->getById($id);
            $inputs = $crudRequest->all();
            $data->update($inputs);
            DB::commit();
            return back()->with('success', 'Data Updated Successfully');
        } catch (Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return back()->with('failed', 'Data Cannot Be Updated');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $data = $this->repository->getById($id);
            $data->delete();
            DB::commit();
            return back()->with('success', 'Data Deleted Successfully');
        } catch (Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return back()->with('failed', 'Data Cannot Deleted Successfully');
        }
    }

    public function importFile(Request $request)
    {
        DB::beginTransaction();
        try {
            $this->repository->fileImportProcess($request);
            DB::commit();
            return back()->with('success', 'Data From CVS file Uploaded');
        } catch (Exception $exception) {
            DB::rollBack();
            Log::error($exception->getMessage());
            return back()->with('failed', 'Data From CVS file Cannot Uploaded');
        }
    }

    public function download()
    {
        return Excel::download(new CrudsExport(), 'users.xlsx');
    }
}
