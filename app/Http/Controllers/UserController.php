<?php

namespace App\Http\Controllers;

use App\Enums\ActionEnum;
use App\Enums\ModelEnum;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected UserService $service;

    public function __construct(UserService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $records = $this->service->all();

        return UserResource::collection($records);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $record = $this->service->store($request->validated());

        return new UserResource($record);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, string $id)
    {
        $record = $this->service->getById($id);

        return new UserResource($record);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, string $id)
    {
        $record = $this->service->update($id, $request->validated());

        return new UserResource($record);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->service->destroy($id);

        return response()->noContent();
    }

    /**
     * Restore the specified resource from storage.
     */
    public function restore(string $id)
    {
        $record = $this->service->restore($id);

        return new UserResource($record);
    }

    public function syncRoles(Request $request, string $id)
    {
        $request->validate([
            'roles' => [
                'nullable',
                function ($attribute, $value, $fail) {
                    if (! is_array($value) and ! is_numeric($value) ) {
                        $fail(__('validation.array',['attribute'=>$attribute]) .'. '. __('validation.numeric',['attribute'=>$attribute]));
                    }
                },
            ],
        ]);

        $record = $this->service->getById($id);

        $record->syncRoles($request->get('roles'));

        $record->load(['permissions']);

        return new UserResource($record);
    }

    public function syncPermissions(Request $request, string $id)
    {
        $request->validate([
            'permissions' => [
                'nullable',
                function ($attribute, $value, $fail) {
                    if (! is_array($value) and ! is_numeric($value) ) {
                        $fail(__('validation.array',['attribute'=>$attribute]) .'. '. __('validation.numeric',['attribute'=>$attribute]));
                    }
                },
            ],
        ]);

        $record = $this->service->getById($id);

        $record->syncPermissions($request->get('permissions'));

        $record->load(['permissions']);

        return new UserResource($record);
    }
}
