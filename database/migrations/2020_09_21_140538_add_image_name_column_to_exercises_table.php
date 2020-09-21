<?php

use App\Exercise;
use App\Session;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddImageNameColumnToExercisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('exercises', function (Blueprint $table) {
            $table->string('image_name')->nullable()->after('image_url');
        });

        $exercises = Exercise::all();

        foreach ($exercises as $exercise) {
            $tmp = preg_replace('/\?[^?]*$/', '', $exercise->image_url);
            $tmp = explode('.', $tmp);
            $extension = end($tmp);
            $file_name = str_slug($exercise->name) . '.' . $extension;
            $successful_upload = Storage::put($file_name, file_get_contents($exercise->image_url));

            if (!$successful_upload) {
                return abort(500, 'There was a problem with the image upload to FTP server');
            }

            if ($exercise->image_name !== $file_name) {
                $exercise->image_name = $file_name;
                $exercise->save();
            }
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('exercises', function (Blueprint $table) {
            $table->dropColumn('image_name');
        });
    }
}
