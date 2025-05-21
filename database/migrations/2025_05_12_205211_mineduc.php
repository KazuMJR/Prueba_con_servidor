<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('escuela', function (Blueprint $table) {
            $table->id('id_escuela');
            $table->string('nombre_escuela', 60);
            $table->string('direccion', 60);
            $table->string('codigo_establecimiento', 6);
            $table->string('zona', 2);
        });

        Schema::create('inscripcion', function (Blueprint $table) {
            $table->string('codigo', 15)->primary();
            $table->date('fecha');
        });

        Schema::create('alumno', function (Blueprint $table) {
            $table->string('cui', 15)->primary();
            $table->string('nombre_alumno', 60);
            $table->integer('edad');
            $table->string('sexo', 1);
           });

        Schema::create('catedratico', function (Blueprint $table) {
            $table->string('cui', 15)->primary();
            $table->string('nombre_catedratico', 60);
            $table->integer('edad');
            $table->string('sexo', 1);
        });

        Schema::create('grado', function (Blueprint $table) {
            $table->id('id_grado');
            $table->string('nombre_grado', 50);
            $table->string('nivel_educativo', 15);
        });

        Schema::create('seccion', function (Blueprint $table) {
            $table->id('id_seccion');
            $table->char('letra', 1);
        });

        Schema::create('curso', function (Blueprint $table) {
            $table->id('id_curso');
            $table->string('nombre_curso', 50);
        });

        Schema::create('programa_curso', function (Blueprint $table) {
            $table->id('id_programa');
            $table->unsignedBigInteger('grado_id_grado');
            $table->unsignedBigInteger('curso_id_curso');
            $table->foreign('grado_id_grado')->references('id_grado')->on('grado')->onDelete('cascade');
            $table->foreign('curso_id_curso')->references('id_curso')->on('curso')->onDelete('cascade');
        });

        Schema::create('actividades_clase', function (Blueprint $table) {
            $table->id('id_actividad');
            $table->text('descripcion');
        });

        Schema::create('tutelares', function (Blueprint $table) {
            $table->id(); // Nuevo campo PK autoincremental
            $table->string('cui_alumno', 15);
            $table->string('cui_tutor', 15);
            $table->string('nombre_tutor', 60);
            $table->string('telefono', 15)->nullable();
            $table->timestamps();

            $table->unique(['cui_alumno', 'cui_tutor']); // índice único para evitar duplicados
            $table->foreign('cui_alumno')->references('cui')->on('alumno')->onDelete('cascade');
        });


        Schema::create('horario_clase', function (Blueprint $table) {
            $table->id('id_horario');
            $table->time('hora_inicio');
            $table->time('hora_fin');
            $table->string('dia', 10);
            $table->string('aula', 15);
        });

        Schema::create('calendario_examen', function (Blueprint $table) {
            $table->id('id_examen');
            $table->date('fecha');
            $table->text('descripcion');
        });

        Schema::create('asignacion', function (Blueprint $table) {
            $table->id('id_asignacion');
            $table->string('inscripcion_codigo', 15);
            $table->unsignedBigInteger('escuela_id_escuela');
            $table->unsignedBigInteger('seccion_id_seccion');
            $table->unsignedBigInteger('grado_id_grado');
            $table->string('catedratico_cui', 15);
            $table->unsignedBigInteger('curso_id_curso');

            $table->foreign('inscripcion_codigo')->references('codigo')->on('inscripcion')->onDelete('cascade');
            $table->foreign('escuela_id_escuela')->references('id_escuela')->on('escuela')->onDelete('cascade');
            $table->foreign('seccion_id_seccion')->references('id_seccion')->on('seccion')->onDelete('cascade');
            $table->foreign('grado_id_grado')->references('id_grado')->on('grado')->onDelete('cascade');
            $table->foreign('catedratico_cui')->references('cui')->on('catedratico')->onDelete('cascade');
            $table->foreign('curso_id_curso')->references('id_curso')->on('curso')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('asignacion');
        Schema::dropIfExists('calendario_examen');
        Schema::dropIfExists('horario_clase');
        Schema::dropIfExists('tutelares');
        Schema::dropIfExists('actividades_clase');
        Schema::dropIfExists('programa_curso');
        Schema::dropIfExists('curso');
        Schema::dropIfExists('seccion');
        Schema::dropIfExists('grado');
        Schema::dropIfExists('catedratico');
        Schema::dropIfExists('alumno');
        Schema::dropIfExists('inscripcion');
        Schema::dropIfExists('escuela');
    }
};
