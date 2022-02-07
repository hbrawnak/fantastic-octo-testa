<?php

namespace App\Http\Controllers;

use App\Http\Requests\LabelRequest;
use App\Models\Label;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LabelController extends Controller
{
    public function store(LabelRequest $request)
    {
        $label = Label::create($request->validated());
        return response($label, Response::HTTP_CREATED);
    }
}
