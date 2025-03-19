<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Ifixit;
use App\Models\Guide;

class ImportGuidesFromIfixit extends Command
{
    /**
     * El nombre y la firma del comando de consola.
     */
    protected $signature = 'import:guides';

    /**
     * Descripción del comando.
     */
    protected $description = 'Importar guías de la tabla ifixits a guides';

    /**
     * Ejecutar el comando.
     */
    public function handle()
    {
        $ifixitGuides = Ifixit::all();

        foreach ($ifixitGuides as $guide) {
            Guide::updateOrInsert(
                ['guide_id' => $guide->guide_id],
                [
                    'title' => $guide->title,
                    'category' => $guide->category,
                    'subject' => $guide->subject,
                    'summary' => $guide->summary,
                    'introduction_raw' => '',
                    'introduction_rendered' => '',
                    'conclusion_raw' => '',
                    'conclusion_rendered' => '',
                    'difficulty' => $guide->difficulty,
                    'time_required_min' => null,
                    'time_required_max' => $guide->time_required_max,
                    'public' => $guide->public,
                    'locale' => $guide->locale,
                    'type' => $guide->type,
                    'url' => $guide->url,
                    'documents' => json_encode([]),
                    'flags' => $guide->flags,
                    'image' => $guide->image,
                    'prerequisites' => json_encode([]),
                    'steps' => json_encode([]),
                    'tools' => json_encode([]),
                    'author_id' => $guide->user_id,
                    'author_username' => $guide->username,
                    'author_image' => json_encode([]),
                    'created_date' => now(),
                    'published_date' => null,
                    'modified_date' => $guide->modified_date,
                    'prereq_modified_date' => $guide->prereq_modified_date,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }

        $this->info('Guías importadas correctamente de ifixits a guides.');
    }
}