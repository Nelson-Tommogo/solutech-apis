<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrganizationRequest;
use App\Models\Organization;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class OrganizationController extends Controller
{
    public function store(StoreOrganizationRequest $request)
    {
        $organization = Organization::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name)
        ]);

        return response()->json($organization, 201);
    }
}