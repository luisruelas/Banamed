<?php

use Illuminate\Database\Seeder;

class DBinfoseed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dbinfo')->insert(['name' => 'version', 'value' => 00.02]);
        //creando escuelas aprobadas
        $contschools=0;
        $contsubjects=0;
        $conttopics=0;
        for ($d = 0; $d <= 3; $d++) {
            \App\School::create(['name' => 'School' . ($d+1),
                'added_at_version' => 1,
                'updated_at_version' => 1]);
            for ($b = 0; $b <= 2; $b++) {
                \App\Subject::create(['name' => 'Subject' . ($b+1) . 'FromSchool' . ($d+1),
                    'school_id' => $contschools+1,
                    'added_at_version' => 1,
                    'updated_at_version' => 1]);

                for ($c = 0; $c <= 1; $c++) {
                    \App\Topic::create(['name' => 'topic' . ($c+1) . 'FromSubject' . ($b+1) . 'FromSchool' . ($d+1),
                        'subject_id' =>$contsubjects+1,
                        'added_at_version' => 1,
                        'updated_at_version' => 1]);

                    for ($a = 0; $a <= 21; $a++) {
                        \App\Question::create([
                            'name' => 'question' . ($a+1) . 'FromTopic' . ($c+1) . 'FromSubject' . ($b+1) . 'FromSchool' . ($d+1),
                            'topic_id' => $conttopics+1,
                            'options' => "a;&b;&c;&d",
                            'added_at_version' => \App\DBinfo::getVersion(),
                            'updated_at_version' => 1]);
                    }
                    $conttopics+=1;
                }
                $contsubjects+=1;
            }
            $contschools+=1;
        }

    }
}
