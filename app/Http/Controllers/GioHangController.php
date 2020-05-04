<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\giohang as GiohangResources;
use App\giohang;

class GioHangController extends Controller
{
    /**
	 * @SWG\Post(
	 *   path="/api/giohang",
	 *   summary="Create giohang",
	 *   operationId="giohang_POST",
	 *   tags={"Giỏ Hàng"},
	 *   security={
	 *       {"ApiKeyAuth": {}}
	 *   },
	 *   @SWG\Parameter(
	 *       name="kh_id",
	 *       in="formData",
	 *       required=true,
	 *       type="string"
	 *   ),
     *   @SWG\Parameter(
	 *       name="gh_id",
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
		$giohang = new giohang();
        $giohang->kh_id = $request->kh_id;
        $giohang->gh_id = $request->gh_id;
		$giohang->save();
		return response()->json("Add Card Successed");
	}
	/**
	 * @SWG\Delete(
	 *   path="/api/giohang/{gh_id}",
	 *   summary="Delete giohang by gh_id...",
	 *   operationId="GIOHANG_DELETE",
	 *   tags={"Giỏ Hàng"},
	 *   security={
	 *       {"ApiKeyAuth": {}}
	 *   },
	 *      @SWG\Parameter(
	 *          name="gh_id",
	 *          in="path",
	 *          required=true,
	 * 			description="input gh_id",
	 *          type="integer"
	 *      ),
	 *   @SWG\Response(response=200, description="Successful Operation"),
	 *   @SWG\Response(response=406, description="Not Acceptable"),
	 *   @SWG\Response(response=500, description="Internal Server Error")
	 * )
	 *
	 */
	public function destroy($gh_id) {
		$destroy = giohang::findOrFail($gh_id);
		if($destroy){
			$destroy->delete();
			return response()->json("DELETED", 201);
		}
		return response()->json("NOT FOUND", 404);
	}
	/**
	 * @SWG\Delete(
	 *   path="/api/giohang/{kh_id}",
	 *   summary="Delete giohang by kh_id...",
	 *   operationId="GIOHANG_KHACHANG_DELETE",
	 *   tags={"Giỏ Hàng"},
	 *   security={
	 *       {"ApiKeyAuth": {}}
	 *   },
	 *      @SWG\Parameter(
	 *          name="kh_id",
	 *          in="path",
	 *          required=true,
	 * 			description="input kh_id",
	 *          type="integer"
	 *      ),
	 *   @SWG\Response(response=200, description="Successful Operation"),
	 *   @SWG\Response(response=406, description="Not Acceptable"),
	 *   @SWG\Response(response=500, description="Internal Server Error")
	 * )
	 *
	 */
	public function destroyKH($kh_id) {
		$destroy = giohang::where('kh_id','=',$kh_id);
		if($destroy){
			$destroy->delete();
			return response()->json("DELETED", 201);
		}
		return response()->json("NOT FOUND", 404);
	}
	/**
	 * @SWG\Get(
	 *   path="/api/giohang/khachhang/{kh_id}",
	 *   summary="Get giohang by kh_id..",
	 *   operationId="giohang_SHOW_KH",
	 *   tags={"Giỏ Hàng"},
	 *   security={
	 *       {"ApiKeyAuth": {}}
	 *   },
	 *   @SWG\Parameter(
	 *      name="kh_id",
	 * 		description="input kh_id..",
	 *      in="path",
	 *      required=true,
	 *      type="integer"
	 *   ),
	 *   @SWG\Response(response=200, description="Successful Operation"),
	 *   @SWG\Response(response=406, description="Not Acceptable"),
	 *   @SWG\Response(response=500, description="Internal Server Error")
	 * )
	 *
	 */
	public function showKH($kh_id) {
		$data = giohang::with('khachhang')
		->where('kh_id', $kh_id)
		->first();
		return new GiohangResources($data);
	}
	/**
	 * @SWG\Get(
	 *   path="/api/giohang/{gh_id}",
	 *   summary="Get giohang by gh_id..",
	 *   operationId="giohang_SHOW",
	 *   tags={"Giỏ Hàng"},
	 *   security={
	 *       {"ApiKeyAuth": {}}
	 *   },
	 *   @SWG\Parameter(
	 *      name="gh_id",
	 * 		description="input gh_id..",
	 *      in="path",
	 *      required=true,
	 *      type="integer"
	 *   ),
	 *   @SWG\Response(response=200, description="Successful Operation"),
	 *   @SWG\Response(response=406, description="Not Acceptable"),
	 *   @SWG\Response(response=500, description="Internal Server Error")
	 * )
	 *
	 */
	public function show($gh_id) {
		$data = giohang::findOrFail($gh_id);
		return new GiohangResources($data);
	}
}
