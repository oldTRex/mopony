<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{
    protected $status = true;
    protected $data = null;
    protected $messages = [];

    /**
     * @param int $status_code
     * @param array $headers
     * @return JsonResponse| Response
     */
    protected function returnApiRespond($status_code = 200, $headers = [])
    {
        return response()->json([
            'status' => $this->status,
            'data' => $this->data,
            'messages' => $this->messages
        ], $status_code, $headers);
    }

    /**
     * @param array $inputs
     * @param array $rules
     * @return boolean
     */
    protected function validateInputs(array $inputs, array $rules)
    {
        $validator = Validator::make($inputs, $rules);

        # If there are some validations error, return them as messages
        if ($validator->fails()) {
            $this->messages = $validator->getMessageBag()->toArray();
            $this->status = false;
            return false;
        }
        return true;
    }

}
