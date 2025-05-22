<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\Staff;
use Carbon\Carbon;
use Illuminate\Support\Str;

class ScheduleController extends Controller
{
    public function show($section = 'schedule', $month = null)
    {
        Carbon::setLocale('RU');
        $currentDate = $month ? Carbon::parse($month) : Carbon::now();
        $nextMonth = $currentDate->copy()->addMonth();
        
        $staff = Staff::all();
        $daysInMonth = $currentDate->daysInMonth;
        $nextDaysInMonth = $nextMonth->daysInMonth;
        
        // Проверяем существование расписания для текущего месяца
        $hasSchedule = Schedule::whereYear('date', $currentDate->year)
            ->whereMonth('date', $currentDate->month)
            ->exists();

        $availableMonths = Schedule::selectRaw('YEAR(date) as year, MONTH(date) as month')
        ->groupBy('year', 'month')
        ->orderBy('year', 'asc')
        ->orderBy('month', 'asc')
        ->get()
        ->map(function($item) {
            $date = Carbon::create($item->year, $item->month, 1);
            return [
                'value' => $date->format('Y-m'),
                'label' => Str::ucfirst($date->translatedFormat('F Y')) // Используем Str::ucfirst()
            ];
        });
        
        // Получаем расписание для текущего месяца
        $schedules = Schedule::whereYear('date', $currentDate->year)
            ->whereMonth('date', $currentDate->month)
            ->get()
            ->groupBy(['id_staff', function($item) {
                return Carbon::parse($item->date)->format('d');
            }]);
        
        // Получаем расписание для следующего месяца (если есть)
        $nextSchedules = Schedule::whereYear('date', $nextMonth->year)
            ->whereMonth('date', $nextMonth->month)
            ->get()
            ->groupBy(['id_staff', function($item) {
                return Carbon::parse($item->date)->format('d');
            }]);
        
        // Проверяем доступность следующих/предыдущих месяцев
        $prevMonth = $this->getAvailableMonth($currentDate, 'prev');
        $nextAvailableMonth = $this->getAvailableMonth($currentDate, 'next');
        
        return view('admin.schedule', [
            'section' => $section,
            'currentDate' => $currentDate,
            'nextMonth' => $nextMonth,
            'staff' => $staff,
            'daysInMonth' => $daysInMonth,
            'nextDaysInMonth' => $nextDaysInMonth,
            'schedules' => $schedules,
            'nextSchedules' => $nextSchedules,
            'hasSchedule' => $hasSchedule,
            'prevMonth' => $prevMonth,
            'nextAvailableMonth' => $nextAvailableMonth,
            'canEdit' => $this->canEditMonth($currentDate),
            'hasNextSchedule' => $nextSchedules->isNotEmpty(),
            'currentMonthName' => Str::ucfirst($currentDate->translatedFormat('F Y')), // Добавлено
            'availableMonths' => $availableMonths,
            'nextMonthName' => Str::ucfirst($nextMonth->translatedFormat('F Y')) // Добавлено
        ]);
    }

    private function getAvailableMonth($currentDate, $direction)
    {
        $date = $currentDate->copy();
        $direction == 'next' ? $date->addMonth() : $date->subMonth();
        
        return Schedule::whereYear('date', $date->year)
            ->whereMonth('date', $date->month)
            ->exists() ? $date->format('Y-m') : null;
    }

    private function canEditMonth($date)
    {
        $now = Carbon::now();
        return $date->greaterThanOrEqualTo($now->startOfMonth());
    }
    // создание и обновление расписания смен
    // public function update(Request $request)
    // {
    //     $date = Carbon::parse($request->date);
    //     if (!$this->canEditMonth($date)) {
    //         return response()->json(['error' => 'Редактирование доступно только для текущего и будущих месяцев'], 403);
    //     }
    //     // Обновление или создание записи
    //     Schedule::updateOrCreate(
    //         ['id_staff' => $request->staff_id, 'date' => $request->date],
    //         ['shift' => $request->shift != 'none' ? $request->shift : null]
    //     );
    //     if ($request->shift == 'none') {
    //         Schedule::where('id_staff', $request->staff_id)
    //             ->where('date', $request->date)
    //             ->delete();
    //     }
    //     return response()->json(['success' => true]);
    // }

    // создание и редактирование расписания смен
    public function store(Request $request)
    {
        $validated = $request->validate([
            'month' => 'required|date_format:Y-m',
            'schedule' => 'required|array'
        ]);
        $month = Carbon::parse($validated['month']);
        // Удаляем старое расписание на этот месяц
        Schedule::whereYear('date', $month->year)
               ->whereMonth('date', $month->month)
               ->delete();
        // Сохраняем новое расписание
        foreach ($validated['schedule'] as $staffId => $days) {
            foreach ($days as $date => $shift) {
                if ($shift !== 'none') {
                    Schedule::create([
                        'id_staff' => $staffId,
                        'date' => $date,
                        'shift' => $shift
                    ]);
                }
            }
        }
        return redirect()->route('schedule', ['section' => 'schedule', 'month' => $month->format('Y-m')])
                       ->with('success', 'Расписание успешно сохранено');
    }
}
