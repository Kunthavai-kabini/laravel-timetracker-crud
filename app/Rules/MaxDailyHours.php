<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use App\Models\Timelog;
use Carbon\Carbon;

class MaxDailyHours implements Rule
{
    protected string $date;
    protected Carbon $start;
    protected Carbon $end;
    protected  ?int $task_id;

    public function __construct($date, $start_time, $end_time,?int $task_id)
    { 
        $this->date = $date;
        $this->start = Carbon::createFromFormat('H:i', $start_time);
        $this->end   = Carbon::createFromFormat('H:i', $end_time);
        if ($this->end->lessThanOrEqualTo($this->start)) {
            $this->end->addDay();
        }
        $this->task_id=$task_id;
    }

    public function passes($attribute, $value): bool
    {
        $newSeconds = $this->end->diffInSeconds($this->start);

        $query = Timelog::where('user_id', Auth::id())
            ->where('date', $this->date);
            if ($this->task_id) {
                $query->where('id', '!=', $this->task_id); // Exclude current record
            }    
            //$debugQuery = clone $query;
           // dd($query->toSql(), $query->getBindings());
            $existingSeconds = $query
            ->sum(\DB::raw('TIME_TO_SEC(TIMEDIFF(end_time, start_time))'));
            //dd($existingSeconds); 
        //echo "exist".$existingSeconds;
        //echo "new".$newSeconds;die;
        return ($existingSeconds + $newSeconds) <= 10 * 3600;
    }

    public function message(): string
    {
        return 'You can log a maximum of 10 hours per date.';
    }
}
