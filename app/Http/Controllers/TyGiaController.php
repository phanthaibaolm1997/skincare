<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\tygia as TyGiaResources;
use DB;
use App\tygia;

class TyGiaController extends Controller
{
    /**
	 * @SWG\Post(
	 *   path="/api/tygia",
	 *   summary="Create khachhang",
	 *   operationId="TYGIA_POST",
	 *   tags={"TyGia"},
	 *   security={
	 *       {"ApiKeyAuth": {}}
	 *   },
	 *   @SWG\Parameter(
	 *       name="tygia_tendvtt",
	 *       in="formData",
	 *       required=true,
	 *       type="string"
	 *   ),
     *  @SWG\Parameter(
	 *       name="tygia_ngaybd",
	 *       in="formData",
	 *       required=true,
	 *       type="string"
	 *   ),
     *  @SWG\Parameter(
	 *       name="tygia_quydoi",
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
		$create = new tygia();
        $create->tygia_tendvtt = $request->tygia_tendvtt;
        $create->tygia_ngaybd = $request->tygia_ngaybd;
        $create->tygia_quydoi = $request->tygia_quydoi;
		$create->save();
		return response()->json("Create Successed");
	}
	/**
	 * @SWG\Get(
	 *   path="/api/tygia",
	 *   summary="Get all tygia..",
	 *   operationId="tygia_GET",
	 *   tags={"TyGia"},
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
		$data = tygia::paginate();
		return TyGiaResources::collection($data);
	}
	/**
	 * @SWG\Delete(
	 *   path="/api/tygia/{id}",
	 *   summary="Delete tygia...",
	 *   operationId="tygia_DELETE",
	 *   tags={"TyGia"},
	 *   security={
	 *       {"ApiKeyAuth": {}}
	 *   },
	 *      @SWG\Parameter(
	 *          name="id",
	 *          in="path",
	 *          required=true,
	 * 			description="input tygia_id",
	 *          type="integer"
	 *      ),
	 *   @SWG\Response(response=200, description="Successful Operation"),
	 *   @SWG\Response(response=406, description="Not Acceptable"),
	 *   @SWG\Response(response=500, description="Internal Server Error")
	 * )
	 *
	 */
	public function destroy($id) {
		$destroy = tygia::find($id);
		if($destroy){
			$destroy->delete();
			return response()->json("DELETED", 201);
		}
		return response()->json("NOT FOUND", 404);
	}
	/**
	 * @SWG\Get(
	 *   path="/api/tygia/{id}",
	 *   summary="Get tygia by ID..",
	 *   operationId="tygia_SHOW",
	 *   tags={"TyGia"},
	 *   security={
	 *       {"ApiKeyAuth": {}}
	 *   },
	 *      @SWG\Parameter(
	 *          name="id",
	 * 			description="input id_tygia..",
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
		$data = tygia::findOrFail($id);
		return new TyGiaResources($data);
	}

	 /**
	  * @SWG\Patch(
	  *   path="/api/tygia/{id}",
	  *   summary="Update tygia",
	  *   operationId="tygia_PATCH",
	  *   tags={"TyGia"},
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
	  *       name="tygia_tendvtt",
	  *       in="formData",
	  *       required=true,
	  *       type="string"
	  *   ),
      *  @SWG\Parameter(
	  *       name="tygia_ngaybd",
	  *       in="formData",
	  *       required=true,
	  *       type="string"
	  *   ),
      *  @SWG\Parameter(
	  *       name="tygia_quydoi",
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
		$update = tygia::findOrFail($id);
		if($update){
            $update->update($request->all());
            $update->save();
        	return response()->json("OK", 200);
		}
    	return response()->json("NOT FOUND", 404);
     }
}
