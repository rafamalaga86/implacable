<?php

use Illuminate\Database\Seeder;
use App\Session;

class SessionSeeder extends Seeder
{
    /**
     * @var data
     */
    protected $data = [
            [1, 1, '2020-08-15', 3, 10, 1, null],
            [1, 2, '2020-08-15', 3, 8, null, 5],
            [1, 3, '2020-08-15', 3, 8, null, 5],
            [1, 4, '2020-08-15', 3, 6, null, 5],
            [1, 5, '2020-08-15', 3, 6, null, 5],
            [1, 6, '2020-08-15', 3, 6, null, 5],
            [1, 7, '2020-08-15', 3, 6, null, 5],
            [1, 8, '2020-08-15', 3, 6, null, 5],
            [1, 9, '2020-08-15', 3, 6, null, 5],
            [1, 10, '2020-08-15', 3, 6, null, 5],
            [1, 1, '2020-08-19', 3, 8, 1, null],
            [1, 2, '2020-08-19', 3, 8, null, 6],
            [1, 3, '2020-08-19', 3, 8, null, 6],
            [1, 4, '2020-08-19', 3, 8, null, 6],
            [1, 5, '2020-08-19', 3, 8, null, 6],
            [1, 6, '2020-08-19', 3, 8, null, 6],
            [1, 7, '2020-08-19', 3, 8, null, 6],
            [1, 1, '2020-08-22', 3, 10, 2, null],
            [1, 2, '2020-08-22', 3, 10, null, 7],
            [1, 3, '2020-08-22', 3, 10, null, 7],
            [1, 4, '2020-08-22', 3, 10, null, 7],
            [1, 5, '2020-08-22', 3, 10, null, 7],
            [1, 6, '2020-08-22', 3, 10, null, 7],
            [1, 7, '2020-08-22', 3, 8, null, 7],
            [1, 8, '2020-08-22', 3, 8, null, 7],
            [1, 9, '2020-08-22', 3, 8, null, 7],
            [1, 10, '2020-08-22', 3, 8, null, 7],
            [1, 1, '2020-08-26', 3, 12, 3, null],
            [1, 2, '2020-08-26', 3, 12, null, 8],
            [1, 3, '2020-08-26', 3, 12, null, 8],
            [1, 1, '2020-09-01', 3, 12, 3, null],
            [1, 2, '2020-09-01', 3, 12, null, 8],
            [1, 3, '2020-09-01', 3, 12, null, 8],
            [1, 10, '2020-09-01', 3, 10, null, 8],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->data as $row) {
            Session::create([
                'user_id'      => $row[0],
                'exercise_id'  => $row[1],
                'date'         => $row[2],
                'sets'         => $row[3],
                'reps'         => $row[4],
                'level'        => $row[5],
                'weight'       => $row[6],
            ]);
        }
    }
}
