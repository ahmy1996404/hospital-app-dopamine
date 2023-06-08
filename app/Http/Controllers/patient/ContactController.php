<?php

namespace App\Http\Controllers\patient;

use App\Http\Controllers\Controller;
use App\Http\Requests\patient\ContactUsMessageRequest;
use App\Models\ContactUsMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    public function showContact()
    {
 
        return view('patient.contact');
    }
    public function storeMessage(ContactUsMessageRequest $request)
    {
        try {
            DB::beginTransaction();
            $data = $request->all();
            $message = ContactUsMessage::query()->create($data);
            if ($message) {
                DB::commit();
                return redirect()->back()->with('success', __('message.Done Save Data Successfully'));
            }
            return redirect()->back()->with('warning', __('message.Some failed errors'));
        } catch (\Exception $exception) {
            DB::rollBack();
            dd($exception->getMessage());
            return redirect()->back()->with('error', $exception->getMessage())
                ->withInput($request->all());
        }
    }
}
