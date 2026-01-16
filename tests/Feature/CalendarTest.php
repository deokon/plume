<?php

use Illuminate\Support\Facades\Blade;

test('calendar renders correctly', function () {
    $view = Blade::render('<x-plume::calendar value="2023-10-15" />');
    
    expect($view)
        ->toContain('x-data="calendar(')
        ->toContain("2023-10-15")
        ->toContain('x-text="monthName"')
        ->toContain('x-text="year"')
        ->toContain('x-for="(dayObj, index) in calendarDays"');
});
