<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\pttt as PTTTResources;
use App\pttt;

class PTTTController extends Controller
{
    /**
	 * @SWG\Post(
	 *   path="/api/pttt",
	 *   summary="Create khachhang",
	 *   operationId="PTTT_POST",
	 *   tags={"PTTT"},
	 *   security={
	 *       {"ApiKeyAuth": {}}
	 *   },
	 *   @SWG\Parameter(
	 *       name="pttt_ten",
	 *       in="formData",
	 *       required=true,
	 *       type="string"
	 *   ),
	 *   @SWG\Response(response=200, description="Successful Operation"),
	 *   @SWG\Response(response=406, description="Not Acceptable"),
	 *   @SWG\Response(response=500, description="Internal Server Error")
	 * )
	 *
	 */
	public function create(Request $request) {
		$pttt = new pttt();
		$pttt->pttt_ten = $request->pttt_ten;;
		$pttt->save();
		return response()->json("Create Successed");
	}
	/**
	 * @SWG\Get(
	 *   path="/api/pttt",
	 *   summary="Get all pttt..",
	 *   operationId="PTTT_GET",
	 *   tags={"PTTT"},
	 *   security={
	 *       {"ApiKeyAuth": {}}
	 *   },
	 *   @SWG\Response(response=200, description="Successful Operation"),
	 *   @SWG\Response(response=406, description="Not Acceptable"),
	 *   @SWG\Response(response=500, description="Internal Server Error")
	 * )
	 *
	 */
	public function index() {
		$data = pttt::paginate();
		return PTTTResources::collection($data);
	}
	/**
	 * @SWG\Delete(
	 *   path="/api/pttt/{id}",
	 *   summary="Delete pttt...",
	 *   operationId="PTTT_DELETE",
	 *   tags={"PTTT"},
	 *   security={
	 *       {"ApiKeyAuth": {}}
	 *   },
	 *      @SWG\Parameter(
	 *          name="id",
	 *          in="path",
	 *          required=true,
	 * 			description="input pttt_id",
	 *          type="integer"
	 *      ),
	 *   @SWG\Response(response=200, description="Successful Operation"),
	 *   @SWG\Response(response=406, description="Not Acceptable"),
	 *   @SWG\Response(response=500, description="Internal Server Error")
	 * )
	 *
	 */
	public function destroy($id) {
		$destroy = pttt::find($id);
		if($destroy){
			$destroy->delete();
			return response()->json("DELETED", 201);
		}
		return response()->json("NOT FOUND", 404);
	}
	/**
	 * @SWG\Get(
	 *   path="/api/pttt/{id}",
	 *   summary="Get pttt by ID..",
	 *   operationId="PTTT_SHOW",
	 *   tags={"PTTT"},
	 *   security={
	 *       {"ApiKeyAuth": {}}
	 *   },
	 *      @SWG\Parameter(
	 *          name="id",
	 * 			description="input id_pttt..",
	 *          in="path",
	 *          required=true,
	 *          type="integer"
	 *      ),
	 *   @SWG\Response(response=200, description="Successful Operation"),
	 *   @SWG\Response(response=406, description="Not Acceptable"),
	 *   @SWG\Response(response=500, description="Internal Server Error")
	 * )
	 *
	 */
	public function show($id) {
		$data = pttt::findOrFail($id);
		return new PTTTResources($data);
	}

	 /**
	  * @SWG\Patch(
	  *   path="/api/pttt/{id}",
	  *   summary="Update pttt",
	  *   operationId="PTTT_PATCH",
	  *   tags={"PTTT"},
	  *   security={
	  *       {"ApiKeyAuth": {}}
	  *   },
	  *   @SWG\Parameter(
	  *       name="id",
	  *       in="path",
	  *		  required=true,
	  *       type="integer"
	  *   ),
	  *   @SWG\Parameter(
	  *       name="pttt_ten",
	  *       in="formData",
	  *       type="string"
	  *   ),
	  *   @SWG\Response(response=200, description="successful operation"),
	  *   @SWG\Response(response=406, description="not acceptable"),
	  *   @SWG\Response(response=500, description="internal server error")
	  * )
	  *
	  */

     public function update(Request $request,$id)
     {
		$update = pttt::findOrFail($id);
		if($update){
            $update->update($request->all());
            $update->save();
        	return response()->json("Updated!", 200);
		}
    	return response()->json("NOT FOUND", 404);
     }
}
