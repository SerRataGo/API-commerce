<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PaymentPlatForm;
use App\Models\Currency;

class PaymentController extends Controller
{
    public function pay(Request $request)
    {
        $rules = [
            'value' => ['required', 'numeric', 'min:5'],
            'currency' => ['required', 'exists:currencies,iso'],
            'payment_platform' => ['required', 'exists:payment_plat_forms,id'],
        ];

        $request->validate($rules);

        // $paymentPlatform = $this->paymentPlatformResolver
        //     ->resolveService($request->payment_platform);

        // session()->put('paymentPlatformId', $request->payment_platform);

        // if ($request->user()->hasActiveSubscription()) {
        //     $request->value = round($request->value * 0.9, 2);
        // }

        // return $paymentPlatform->handlePayment($request);
        return $request->all() ;
    }
    public function approval()
    {
        if (session()->has('paymentPlatformId')) {
            $paymentPlatform = $this->paymentPlatformResolver
                ->resolveService(session()->get('paymentPlatformId'));

            return $paymentPlatform->handleApproval();
        }

        return redirect()
            ->route('home')
            ->withErrors('We cannot retrieve your payment platform. Try again, please.');
    }

    public function cancelled()
    {
        return "Canceelled Successfully";
    }

}
