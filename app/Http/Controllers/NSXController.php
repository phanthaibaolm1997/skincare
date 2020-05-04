<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\nhasanxuat as NSXResources;
use App\nhasanxuat;

class NSXController extends Controller
{
    /**
	 * @SWG\Post(
	 *   path="/api/nsx",
	 *   summary="Create khachhang",
	 *   operationId="nsx_POST",
	 *   tags={"NSX"},
	 *   security={
	 *       {"ApiKeyAuth": {}}
	 *   },
	 *   @SWG\Parameter(
	 *       name="nsx_ten",
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
		$nsx = new nhasanxuat();
        $nsx->nsx_ten = $request->nsx_ten;
        $nsx->qg_id = $request->qg_id;
		$nsx->save();
		return response()->json("Create Successed");
	}
	/**
	 * @SWG\Get(
	 *   path="/api/nsx",
	 *   summary="Get all nsx..",
	 *   operationId="nsx_GET",
	 *   tags={"NSX"},
	 *   security={
	 *       {"ApiKeyAuth": {}}
	 *   },
	 * 	 @SWG\Parameter(
	 *       name="nsx_ten",
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
		$data = nhasanxuat::filter($param);
		return NSXResources::collection($data->get());
	}
	/**
	 * @SWG\Delete(
	 *   path="/api/nsx/{id}",
	 *   summary="Delete nsx...",
	 *   operationId="nsx_DELETE",
	 *   tags={"NSX"},
	 *   security={
	 *       {"ApiKeyAuth": {}}
	 *   },
	 *      @SWG\Parameter(
	 *          name="id",
	 *          in="path",
	 *          required=true,
	 * 			description="input nsx_id",
	 *          type="integer"
	 *      ),
	 *   @SWG\Response(response=200, description="Successful Operation"),
	 *   @SWG\Response(response=406, description="Not Acceptable"),
	 *   @SWG\Response(response=500, description="Internal Server Error")
	 * )
	 *
	 */
	public function destroy($id) {
		$destroy = nhasanxuat::find($id);
		if($destroy){
			$destroy->delete();
			return response()->json("DELETED", 201);
		}
		return response()->json("NOT FOUND", 404);
	}
	/**
	 * @SWG\Get(
	 *   path="/api/nsx/{id}",
	 *   summary="Get nsx by ID..",
	 *   operationId="nsx_SHOW",
	 *   tags={"NSX"},
	 *   security={
	 *       {"ApiKeyAuth": {}}
	 *   },
	 *      @SWG\Parameter(
	 *          name="id",
	 * 			description="input id_nsx..",
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
		$data = nhasanxuat::findOrFail($id);
		return new NSXResources($data);
	}

	 /**
	  * @SWG\Patch(
	  *   path="/api/nsx/{id}",
	  *   summary="Update nsx",
	  *   operationId="nsx_PATCH",
	  *   tags={"NSX"},
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
	  *       name="nsx_ten",
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
		$update = nhasanxuat::findOrFail($id);
		if($update){
            $update->update($request->all());
            $update->save();
        	return response()->json("Updated!", 200);
		}
    	return response()->json("NOT FOUND", 404);
     }
}
