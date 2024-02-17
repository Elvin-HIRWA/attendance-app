<?php

namespace App\Http\Controllers;

use App\Models\AttendanceRecord;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function checkIn(Request $request)
    {
        $employeeID = $request->input('employeeID');

        // Check if employee already checked in for the day
        $existingAttendance = AttendanceRecord::where('employeeID', $employeeID)
            ->whereDate('check_in_time', Carbon::today())
            ->first();

        if ($existingAttendance) {
            return response()->json(['message' => 'Already checked in for today'], 422);
        }

        AttendanceRecord::create([
            'employeeID' => $employeeID,
            'check_in_time' => Carbon::now()
        ]);

        return response()->json(['message' => 'Checked in successfully']);
    }


    public function checkOut(Request $request)
    {
        $employeeID = $request->input('employeeID');

        // Find the latest attendance record for the employee
        $attendance = AttendanceRecord::where('employeeID', $employeeID)
            ->whereDate('check_in_time', Carbon::today())
            ->latest()
            ->first();

        if (is_null($attendance)) {
            return response()->json(['message' => 'No check-in record found for today'], 422);
        }

        // Check if already checked out
        if ($attendance->check_out_time) {
            return response()->json(['message' => 'Already checked out for today'], 422);
        }

        $attendance->check_out_time = Carbon::now();
        $attendance->save();

        return response()->json(['message' => 'Checked out successfully']);
    }
}
