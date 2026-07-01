<?php

namespace App\Http\Controllers;

use App\Http\Requests\Company\StoreRequest;
use App\Http\Requests\Company\UpdateRequest;
use App\Models\Company;
use App\Services\Company\Service;

class CompanyController extends Controller
{
    public function __construct(
        private Service $service
    ) {}

    public function index()
    {
        $companies = auth()->user()
            ->companies()
            ->latest()
            ->paginate(10);

        return view('companies.index', compact('companies'));
    }

    public function create()
    {
        $this->authorize('create', Company::class);

        return view('companies.create');
    }

    public function store(StoreRequest $request)
    {
        $this->authorize('create', Company::class);

        $this->service->store(
            $request->validated()
        );

        return redirect()
            ->route('employer.companies.index')
            ->with('success', 'Компания успешно создана');
    }

    public function show(Company $company)
    {
        $company->load('vacancies');

        return view('companies.show', compact('company'));
    }

    public function edit(Company $company)
    {
        $this->authorize('update', $company);

        return view('companies.edit', compact('company'));
    }

    public function update(UpdateRequest $request, Company $company)
    {
        $this->authorize('update', $company);

        $this->service->update(
            $company,
            $request->validated()
        );

        return redirect()
            ->route('employer.companies.index')
            ->with('success', 'Компания успешно обновлена');
    }

    public function destroy(Company $company)
    {
        $this->authorize('delete', $company);

        $company->delete();

        return redirect()
            ->route('employer.companies.index')
            ->with('success', 'Компания успешно удалена');
    }
}
