<?php

namespace App\Http\Controllers\doctor;

use App\Http\Controllers\Controller;
use App\Models\ChatLog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ChatController extends Controller
{
    public function showChat($id = null)
    {
        try {
            $patientWithDoctorChat = array();
            foreach (Auth::user()->sendedMessages as $message) {
                array_push($patientWithDoctorChat, $message->receiver_id);
            }
            foreach (Auth::user()->recivedMessages as $message) {
                array_push($patientWithDoctorChat, $message->sender_id);
            }
            $patientWithDoctorChat = array_unique($patientWithDoctorChat);
            $doctorChat = array();
            foreach ($patientWithDoctorChat as $doctorId) {
                $doctor = User::query()->find($doctorId);
                $messages = ChatLog::query()
                    ->where([['sender_id', '=', $doctor->id], ['receiver_id', '=', Auth::id()]])
                    ->orWhere([['sender_id', '=', Auth::id()], ['receiver_id', '=', $doctor->id]])
                    ->orderByDesc('created_at')->first();
                $data = array('doctor_id' => $doctor->id, 'name' => $doctor->name, 'avatar' => $doctor->profile_photo_path, 'last_message' => $messages->message, 'created_at' => $messages->created_at->diffForHumans());


                array_push($doctorChat, (object) $data);
            }
            $doctors =  User::query()->userType('user')->orderByDesc('created_at')->get();
            $chat = null;
            $chatWith = null;

            if ($id) {
                $chatWith = User::query()->find($id);

                $chat =
                    ChatLog::query()
                    ->where([['sender_id', '=', $id], ['receiver_id', '=', Auth::id()]])
                    ->orWhere([['sender_id', '=', Auth::id()], ['receiver_id', '=', $id]])
                    ->orderBy('created_at')->get();
            }
            return view('doctor.chat.app', compact('doctorChat', 'doctors', 'chat', 'chatWith'));
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }
    public function sendMessage(Request $request)
    {
        try {
            DB::beginTransaction();
            $data = $request->all();

            $message = ChatLog::query()->create($data);
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
