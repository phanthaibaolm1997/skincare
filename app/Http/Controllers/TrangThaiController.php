<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\trangthai as TrangThaiResources;
use DB;
use App\trangthai;

class TrangThaiController extends Controller
{
    /**
	 * @SWG\Post(
	 *   path="/api/trangthai",
	 *   summary="Create trangthai",
	 *   operationId="trangthai_POST",
	 *   tags={"TrangThai"},
	 *   security={
	 *       {"ApiKeyAuth": {}}
	 *   },
	 *   @SWG\Parameter(
	 *       name="trangthai_ten",
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
		$create = new trangthai();
        $create->trangthai_ten = $request->trangthai_ten;
		$create->save();
		return response()->json("Create Successed");
	}
	/**
	 * @SWG\Get(
	 *   path="/api/trangthai",
	 *   summary="Get all trangthai..",
	 *   operationId="trangthai_GET",
	 *   tags={"TrangThai"},
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
		$data = trangthai::paginate();
		return TrangThaiResources::collection($data);
	}
	/**
	 * @SWG\Delete(
	 *   path="/api/trangthai/{id}",
	 *   summary="Delete trangthai...",
	 *   operationId="trangthai_DELETE",
	 *   tags={"TrangThai"},
	 *   security={
	 *       {"ApiKeyAuth": {}}
	 *   },
	 *      @SWG\Parameter(
	 *          name="id",
	 *          in="path",
	 *          required=true,
	 * 			description="input trangthai_id",
	 *          type="integer"
	 *      ),
	 *   @SWG\Response(response=200, description="Successful Operation"),
	 *   @SWG\Response(response=406, description="Not Acceptable"),
	 *   @SWG\Response(response=500, description="Internal Server Error")
	 * )
	 *
	 */
	public function destroy($id) {
		$destroy = trangthai::find($id);
		if($destroy){
			$destroy->delete();
			return response()->json("DELETED", 201);
		}
		return response()->json("NOT FOUND", 404);
	}
	/**
	 * @SWG\Get(
	 *   path="/api/trangthai/{id}",
	 *   summary="Get trangthai by ID..",
	 *   operationId="trangthai_SHOW",
	 *   tags={"TrangThai"},
	 *   security={
	 *       {"ApiKeyAuth": {}}
	 *   },
	 *      @SWG\Parameter(
	 *          name="id",
	 * 			description="input id_trangthai..",
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
		$data = trangthai::findOrFail($id);
		return new TrangThaiResources($data);
	}

	 /**
	  * @SWG\Patch(
	  *   path="/api/trangthai/{id}",
	  *   summary="Update trangthai",
	  *   operationId="trangthai_PATCH",
	  *   tags={"TrangThai"},
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
	  *       name="trangthai_ten",
	  *       in="formData",
	  *       required=true,
	  *       type="string"
	  *   ),
	  *   @SWG\Response(response=200, description="successful operation"),
	  *   @SWG\Response(response=406, description="not acceptable"),
	  *   @SWG\Response(response=500, description="internal server error")
	  * )
	  *
	  */

     public function update(Request $request, $id)
     {
		$update = trangthai::findOrFail($id);
		if($update){
            $update->update($request->all());
            $update->save();
        	return response()->json("OK", 200);
		}
    	return response()->json("NOT FOUND", 404);
     }
}
