<?php

namespace App\Http\Controllers;

use App\Contracts\Repositories\RequestRepositoryContract;
use App\Contracts\Services\KiuCompanyServiceContract;
use Illuminate\Http\Request;

class RequestsController extends Controller
{
    protected $requestRepository;
    protected $companyService;

    public function __construct(RequestRepositoryContract $requestRepository, KiuCompanyServiceContract $companyService)
    {
        $this->requestRepository = $requestRepository;
        $this->companyService = $companyService;
    }

    public function index()
    {
        return $this->requestRepository->findAll();
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'company_id' => 'required|uuid',
        ]);

        $company_id = $request->input('company_id');

        [
            'roles' => $roles,
            'company_user_id' => $company_user_id,
        ] = $this->companyService->getCompanyUser($company_id);

        // TODO: Check permission of this company users


        return $this->requestRepository->create([
            'company_id' => $company_id,
            'company_user_id' => $company_user_id,
            'user_id' => $request->user()->id,
        ]);
    }

}
