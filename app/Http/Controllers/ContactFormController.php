<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ContactFormController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'name'      => 'required',
            'number'    => 'required|numeric',
            'email'     => 'required|email',
            'category'  => 'required',
            'message'   => 'required',
        ]);

        // if ($request->has('email')) {
        //     $request->validate([
        //         'email' => 'required|email'
        //     ]);
        // } else if ($request->has('number')) {
        //     $request->validate([
        //         'number' => 'required|numeric'
        //     ]);
        // }


        $data = [
            'name'          => $request->name,
            'number'        => $request->number ?  $request->country_code . $request->number : null,
            'email'         => $request->email,
            'category'      => $request->category,
            'description'   => $request->message,
            'type'          => 'web-support',
        ];

        try {
            $url = app('domainName') . '/api/customer/store';

            $response = Http::asForm()->post($url, $data);

            if ($response->successful()) {
                return redirect()->route('thanks')->with([
                    'name' => $request->name
                ]);
            } else {
                if (!$response->successful()) {
                    return back()->with('error', 'Message sent faild, try again laters');
                }
            }
        } catch (\Exception $e) {
            return back()->with('error', 'Server error');
        }
    }
}
