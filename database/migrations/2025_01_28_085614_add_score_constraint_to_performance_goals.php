<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class AddScoreConstraintToPerformanceGoals extends Migration
{
    public function up()
    {
        DB::unprepared('
            CREATE TRIGGER check_score_valid_insert
            BEFORE INSERT ON performance_goals
            FOR EACH ROW
            BEGIN
                DECLARE maxScore INT DEFAULT 0;

                SELECT COALESCE(max_score, 0) INTO maxScore
                FROM aspect_items
                WHERE id = NEW.aspect_item
                LIMIT 1;

                IF NEW.score < 0 OR NEW.score > maxScore THEN
                    SIGNAL SQLSTATE "45000"
                    SET MESSAGE_TEXT = "Invalid score: must be between 0 and max_score of the related aspect_item.";
                END IF;
            END;
        ');
        DB::unprepared('
            CREATE TRIGGER check_score_valid_update
            BEFORE UPDATE ON performance_goals
            FOR EACH ROW
            BEGIN
                DECLARE maxScore INT DEFAULT 0;

                -- max_score lekérdezése
                SELECT COALESCE(max_score, 0) INTO maxScore
                FROM aspect_items
                WHERE id = NEW.aspect_item
                LIMIT 1;

                -- Validáció
                IF NEW.score < 0 OR NEW.score > maxScore THEN
                    SIGNAL SQLSTATE "45000"
                    SET MESSAGE_TEXT = "Invalid score: must be between 0 and max_score of the related aspect_item.";
                END IF;
            END;
        ');
    }

    public function down()
    {
        DB::unprepared('DROP TRIGGER IF EXISTS check_score_valid_insert;');
        DB::unprepared('DROP TRIGGER IF EXISTS check_score_valid_update;');
    }
}
