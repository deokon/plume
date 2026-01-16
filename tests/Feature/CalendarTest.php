<?php

use Illuminate\Support\Facades\Blade;

test('calendar renders correctly', function () {
    $view = Blade::render('<x-plume::calendar value="2023-10-15" />');
    
    expect($view)
        ->toContain('x-data')
        ->toContain('monthNames')
        ->toContain('calendarDays')
        ->toContain('2023-10-15');
});
