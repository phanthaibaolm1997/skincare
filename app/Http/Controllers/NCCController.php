<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\nhacungcap as NCCResources;
use App\nhacungcap;

class NCCController extends Controller
{
    /**
	 * @SWG\Post(
	 *   path="/api/ncc",
	 *   summary="Create ncc",
	 *   operationId="ncc_POST",
	 *   tags={"NCC"},
	 *   security={
	 *       {"ApiKeyAuth": {}}
	 *   },
	 *   @SWG\Parameter(
	 *       name="ncc_ten",
	 *       in="formData",
	 *       required=true,
	 *       type="string"
	 *   ),
     *   @SWG\Parameter(
	 *       name="qg_id",
	 *       in="formData",
	 *       required=true,
	 *       type="integer"
	 *   ),
	 *   @SWG\Response(response=200, description="Successful Operation"),
	 *   @SWG\Response(response=406, description="Not Acceptable"),
	 *   @SWG\Response(response=500, description="Internal Server Error")
	 * )
	 *
	 */
	public function create(Request $request) {
		$ncc = new nhacungcap();
        $ncc->ncc_ten = $request->ncc_ten;
        $ncc->qg_id = $request->qg_id;
		$ncc->save();
		return response()->json("Create Successed");
	}
	/**
	 * @SWG\Get(
	 *   path="/api/ncc",
	 *   summary="Get all ncc..",
	 *   operationId="ncc_GET",
	 *   tags={"NCC"},
	 *   security={
	 *       {"ApiKeyAuth": {}}
	 *   },
	 *	  @SWG\Parameter(
	 *       name="ncc_ten",
	 *       in="query",
	 *       description="Filter name",
	 *       type="string"
	 *   ),
     *   @SWG\Parameter(
	 *       name="qg_id",
	 *       in="query",
	 *       description="Filter nation",
	 *       type="integer"
	 *   ),
	 *   @SWG\Response(response=200, description="Successful Operation"),
	 *   @SWG\Response(response=406, description="Not Acceptable"),
	 *   @SWG\Response(response=500, description="Internal Server Error")
	 * )
	 *
	 */
	public function index(Request $request) {
		$param = $request->all();
		$data = nhacungcap::filter($param);
		return NCCResources::collection($data->get());
	}
	/**
	 * @SWG\Delete(
	 *   path="/api/ncc/{id}",
	 *   summary="Delete ncc...",
	 *   operationId="ncc_DELETE",
	 *   tags={"NCC"},
	 *   security={
	 *       {"ApiKeyAuth": {}}
	 *   },
	 *      @SWG\Parameter(
	 *          name="id",
	 *          in="path",
	 *          required=true,
	 * 			description="input ncc_id",
	 *          type="integer"
	 *      ),
	 *   @SWG\Response(response=200, description="Successful Operation"),
	 *   @SWG\Response(response=406, description="Not Acceptable"),
	 *   @SWG\Response(response=500, description="Internal Server Error")
	 * )
	 *
	 */
	public function destroy($id) {
		$destroy = nhacungcap::find($id);
		if($destroy){
			$destroy->delete();
			return response()->json("DELETED", 201);
		}
		return response()->json("NOT FOUND", 404);
	}
	/**
	 * @SWG\Get(
	 *   path="/api/ncc/{id}",
	 *   summary="Get ncc by ID..",
	 *   operationId="ncc_SHOW",
	 *   tags={"NCC"},
	 *   security={
	 *       {"ApiKeyAuth": {}}
	 *   },
	 *      @SWG\Parameter(
	 *          name="id",
	 * 			description="input id_ncc..",
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
		$data = nhacungcap::findOrFail($id);
		return new NCCResources($data);
	}
	 /**
	  * @SWG\Patch(
	  *   path="/api/ncc/{id}",
	  *   summary="Update ncc",
	  *   operationId="ncc_PATCH",
	  *   tags={"NCC"},
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
	  *       name="ncc_ten",
	  *       in="formData",
	  *       type="string"
      *   ),
      *   @SWG\Parameter(
	  *       name="qg_id",
	  *       in="formData",
	  *       type="integer"
	  *   ),
	  *   @SWG\Response(response=200, description="successful operation"),
	  *   @SWG\Response(response=406, description="not acceptable"),
	  *   @SWG\Response(response=500, description="internal server error")
	  * )
	  *
	  */

     public function update(Request $request,$id)
     {
		$update = nhacungcap::findOrFail($id);
		if($update){
            $update->update($request->all());
            $update->save();
        	return response()->json("Updated!", 200);
		}
    	return response()->json("NOT FOUND", 404);
     }
}
