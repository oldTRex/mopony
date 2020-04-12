<?php

namespace App\Http\Controllers\Api\v1;

use App\Coupon;

use App\Http\Controllers\API\ApiController;
use App\Http\Resources\CouponResource;
use Illuminate\Http\Request;

class CouponController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data = Coupon::all();
        return $this->returnApiRespond(200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($this->validateInputs($request->all(), [
            'title' => 'required|unique:coupons',
            'code' => 'unique:coupons',
        ])) {
            Coupon::create($request->all());
            return $this->returnApiRespond(200);
        } else    return $this->returnApiRespond(405);

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Coupon $coupon
     * @return \Illuminate\Http\Response
     */
    public function show(Coupon $coupon)
    {
        $this->data = new CouponResource($coupon);
        return $this->returnApiRespond(405);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Coupon $coupon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Coupon $coupon)
    {
        if ($this->validateInputs($request->all(), [
            'title' => 'required',
            'code' => 'unique:coupons',
        ])) {
            $coupon->update($request->all());
            return $this->returnApiRespond(200);
        } else    return $this->returnApiRespond(405);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Coupon $coupon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coupon $coupon)
    {
        $coupon->delete();
        return $this->returnApiRespond(200);
    }
}
