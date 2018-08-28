<?php /** @noinspection PhpUndefinedMethodInspection */

namespace App;

use Illuminate\Database\Eloquent\Model;

class Convert extends Model
{
    //
    public $converted;
    public $integer;
    protected $fillable = ['integer', 'converted'];

    public static function topConverted()
    {
        return static::selectRaw('converted,integer, count(converted) times')
            ->groupBy('converted')
            ->orderByRaw('times desc')
            ->limit(10)
            ->get();

    }
}
