<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Response;


class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * @OA\Info(
     *      version="1.0.0",
     *      title="Backend-Screening-NusantaraInfrastructure"
     * )
     * @OAS\SecurityScheme(
     *     securityScheme="bearerAuth",
     *     type="http",
     *     scheme="bearer",
     *     bearerFormat="JWT"
     * )
     *
     * @OA\Tag(
     *     name="Authentication",
     *     description="API Endpoints Group of Authentication"
     * )
     * @OA\Tag(
     *     name="User",
     *     description="API Endpoints Group of Users"
     * )
     *
     * @OA\Schema(
     *     schema="SuccessResult",
     *     title="Schemas for success response",
     * 	   @OA\Property(
     * 		   property="success",
     * 		   type="boolean"
     * 	   ),
     * 	   @OA\Property(
     * 		   property="message",
     * 		   type="string"
     * 	   ),
     * 	   @OA\Property(
     * 		   property="data",
     * 		   type="object"
     * 	   ),
     * )
     * @OA\Schema(
     *     schema="FailedResult",
     *     title="Schemas for failed response",
     * 	   @OA\Property(
     * 		   property="success",
     * 		   type="boolean"
     * 	   ),
     * 	   @OA\Property(
     * 		   property="message",
     * 		   type="string"
     * 	   ),
     * 	   @OA\Property(
     * 		   property="error_code",
     * 		   type="integer"
     * 	   ),
     * 	   @OA\Property(
     * 		   property="data",
     * 		   type="object"
     * 	   ),
     * )
     *
     */
     
    // API Success response
    public function successResponse(string $message, array $resource = [])
    {
        return response()->json([
            'success' => true,
            'message' => $message,
            'data' => $resource
        ]);
    }
    // API Failed response
    public function failedResponse(string $message, $code = Response::HTTP_INTERNAL_SERVER_ERROR, array $data = [])
    {
        $code = ($code != 0) ? $code : Response::HTTP_INTERNAL_SERVER_ERROR;
        return response()->json([
            'success' => false,
            'message' => $message,
            'error_code' => $code,
            'data' => (object) $data
        ], $code);
    }
}
