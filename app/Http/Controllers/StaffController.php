<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staff;

class StaffController extends Controller
{
    public function showStaff($section = 'staff') {
        $staff = Staff::all();
        return view('admin.staff', compact('staff', 'section'));
    }
    
    public function createForm() {
        return view('admin.partials.staff-create');
    }
    
    // создание записи сотрудника
    public function store(Request $request) {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'number' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'bday' => 'required|date',
            'color' => 'required|string'
        ]);
        
        Staff::create($request->all());
  
        return redirect()->route('staff', ['section' => 'staff'])->with('success', 'Сотрудник успешно добавлен');
    }
    
    public function edit($id) {
        $employee = Staff::findOrFail($id);
        return view('admin.partials.staff-edit', compact('employee'));
    }
    
    // обновление записи сотрудника
    public function update(Request $request, $id) {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'number' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'bday' => 'required|date',
            'color' => 'required|string'
        ]);
        
        $employee = Staff::findOrFail($id);
        $employee->update($request->all());
        
        return redirect()->route('staff', ['section' => 'staff'])->with('success', 'Сотрудник успешно обновлен');
    }
    
    // удаление записи сотрудника
    public function destroy($id) {
        $employee = Staff::findOrFail($id);
        
        // Удаляем связанные записи в расписании
        \DB::table('schedule')->where('id_staff', $id)->delete();
        
        $employee->delete();
        
        return redirect()->route('staff', ['section' => 'staff'])
            ->with('success', 'Сотрудник успешно удален!');
    }

}