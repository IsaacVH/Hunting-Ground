<?php

namespace App\Http\Controllers\Api;

use App\User;
use App\Hunt;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Common\ServiceResult;
use App\Http\Controllers\Helpers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class HuntApiController extends Controller
{

	/**
	 * Delete a Hunt.
	 *
	 * @return Reponse
	 */
	public function delete(Hunt $hunt)
	{
        $errorList = [];
        //try {
            Hunt::delete($hunt->id);
        //} catch (Illuminate/Database/QueryException $e) {
            //array_push($errorList, ["message" => $e->getMessage(), "description" => "Error on deleting Hunt with Id: $id"]);
        //}

        $result = new ServiceResult(null, $errorList);
        return response()->json($result->ToArray());
	}

    /**
     * Get a hunt by Id.
     *
     * @return Response
     */
    public function get(Hunt $hunt)
    {
        $result = new ServiceResult($hunt);
    	return response()->json($result->ToArray());
    }

    /**
     * Get a list of Hunts.
     *
     * @return Response
     */
    public function gets(array $filters, array $sorts, int $pageSize, int $pageIndex)
  	{
  		$hunts = Hunt::all();
  		$errorList = [];
  		AddQueryFilters($hunts, $filters, $errorList);
		AddQuerySorts($hunts, $sorts, $errorList);

        $result = new ServiceResult($hunt, $errorList);
        return response()->json($result->ToArray());
    }

    /**
     * Update a Hunt.
     *
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $hunt = Hunt::find($id);

    	$hunt->name = $resquest->has('name') ? $request->input('name') : $hunt->name;
        $hunt->start_date = $request->has('start_date') ? $request->input('start_date') : $hunt->end_date;
        $hunt->end_date = $request->has('end_date') ? $request->input('end_date') : $hunt->end_date;
    	$hunt->save();

    	$result = new ServiceResult($hunt, $errorList);
    	return response()->json($result->ToArray());
    }

    /**
     * Create a new Hunt
     *
     * @return Response
     */
    public function create(Request $request)
    {
        $errorList = [];
        $newHunt = [
            'name' => $request->has('name') ? $request->input('name') : null,
            'creator' => Auth::user()->id,
            'start_date' => $request->has('start_date') ? $request->input('start_date') : null,
            'end_date' => $request->has('end_date') ? $request->input('end_date') : null,
        ];
        $hunt = null;

    	//try {
    		$hunt = Hunt::create($newHunt);
    	//} catch (Illuminate\Database\QueryException $e) {
            //array_push($errorList, ['message' => $e->getMessage(), 'description' => 'Error caught when creating Hunt']);
    	//}

        $result = new ServiceResult($hunt, $errorList);
    	return resonse()->json($result->ToArray());
    }
}


