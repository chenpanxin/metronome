<?php namespace Metronome\Utils;

use Carbon\Carbon;
use Lang;

class DateTime {

    protected $datetime;

    public function __construct(Carbon $datetime)
    {
        $this->datetime = $datetime;

        return $this->pretty();
    }

    public function pretty()
    {
        $year = Carbon::now()->year;

        $postfix = $this->datetime->year == $year ? '' : ', '.$year;

        $month = Lang::get('locale.'.strtolower($this->datetime->format('F')));

        return join('', [$month, ' ', $this->datetime->day, $postfix]);
    }
}
