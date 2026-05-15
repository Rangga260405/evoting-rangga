<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
    public function update($status)
    {
        // cari setting pertama
        $setting = Setting::first();

        // kalau belum ada setting
        if (!$setting) {

            $setting = Setting::create([
                'voting_status' => $status
            ]);

        } else {

            $setting->update([
                'voting_status' => $status
            ]);

        }

        return back()->with(
            'success',
            'Status voting berhasil diubah.'
        );
    }
}