<?php

namespace RecHum\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

abstract class Request extends FormRequest
{
    public function updateProfile(Request $request)
    {
        if ($request->user()) {
            // $request->user() returns an instance of the authenticated user...
        }
    }
}
