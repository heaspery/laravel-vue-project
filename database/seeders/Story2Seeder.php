<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Story;
use App\Models\Chapter;
use App\Models\Choice;

class Story2Seeder extends Seeder
{
    public function run(): void
    {
        $story = Story::create([
            'title' => 'Les Portes du Temps',
            'description' => 'Une quête à travers les âges pour empêcher l’effondrement du temps lui-même.',
            'cover_image' => 'cover_portes.jpg',
            'author' => 'Mathilde Ançay'
        ]);

        $chapter1 = Chapter::create([
            'title' => 'L’éveil de Kael',
            'content' => 'Kael se réveille dans une bibliothèque millénaire. Un sablier brisé pulse d’une étrange énergie.',
            'story_id' => $story->id,
            'image' => 'kael_bibliotheque.jpg'
        ]);

        $chapter2a = Chapter::create([
            'title' => 'La faille temporelle',
            'content' => 'Le sablier l’attire vers une fissure dans l’air. Il plonge et tombe dans une forêt figée.',
            'story_id' => $story->id,
            'image' => 'faille.jpg'
        ]);

        $chapter2a_alt = Chapter::create([
            'title' => 'L’antichambre oubliée',
            'content' => 'Il cherche une autre sortie, mais se retrouve enfermé dans une pièce suspendue dans le vide.',
            'story_id' => $story->id,
            'image' => 'antichambre.jpg'
        ]);

        $chapter3a = Chapter::create([
            'title' => 'Le cœur du Nexus',
            'content' => 'Au centre de la forêt, une structure flottante pulse d’énergie bleutée.',
            'story_id' => $story->id,
            'image' => 'nexus.jpg'
        ]);

        $chapter3a_alt = Chapter::create([
            'title' => 'Les échos du futur',
            'content' => 'Des voix venues d’autres époques guident Kael dans un dédale irréel.',
            'story_id' => $story->id,
            'image' => 'echos.jpg'
        ]);

        $chapter4a = Chapter::create([
            'title' => 'Le gardien du temps',
            'content' => 'Un colosse de lumière bloque le passage. Kael doit résoudre son énigme.',
            'story_id' => $story->id,
            'image' => 'gardien.jpg'
        ]);

        $chapter4a_alt = Chapter::create([
            'title' => 'La boucle infinie',
            'content' => 'Kael comprend qu’il revit la même minute encore et encore.',
            'story_id' => $story->id,
            'image' => 'boucle.jpg'
        ]);

        $endingGood = Chapter::create([
            'title' => 'Le Temps restauré',
            'content' => 'Kael assemble les fragments temporels. Le flux du temps reprend, harmonieux.',
            'story_id' => $story->id,
            'image' => 'temps_repare.jpg'
        ]);

        $endingBadAlt = Chapter::create([
            'title' => 'Effacé de l’histoire',
            'content' => 'Kael fait un faux pas. Il est effacé du tissu même du temps.',
            'story_id' => $story->id,
            'image' => 'efface.jpg'
        ]);

        $chapter2b = Chapter::create([
            'title' => 'Le maître des sabliers',
            'content' => 'Une silhouette encapuchonnée parle d’une clé temporelle perdue.',
            'story_id' => $story->id,
            'image' => 'maitre.jpg'
        ]);

        $chapter2b_alt = Chapter::create([
            'title' => 'L’atelier figé',
            'content' => 'Des instruments brisés reposent dans le silence absolu. Un carnet attire l’œil.',
            'story_id' => $story->id,
            'image' => 'atelier.jpg'
        ]);

        $chapter3b = Chapter::create([
            'title' => 'Le parchemin scellé',
            'content' => 'Le carnet renferme un schéma menant à une horloge antique.',
            'story_id' => $story->id,
            'image' => 'parchemin.jpg'
        ]);

        $chapter3b_alt = Chapter::create([
            'title' => 'La Tour de Verre',
            'content' => 'Kael gravit une tour lumineuse, chaque étage une époque différente.',
            'story_id' => $story->id,
            'image' => 'tour.jpg'
        ]);

        $chapter4b = Chapter::create([
            'title' => 'L’accord secret',
            'content' => 'Il conclut un pacte avec un esprit ancien pour sauvegarder le présent.',
            'story_id' => $story->id,
            'image' => 'accord.jpg'
        ]);

        $chapter4b_alt = Chapter::create([
            'title' => 'Le sablier noir',
            'content' => 'Un artefact maudit pourrait réinitialiser la trame temporelle.',
            'story_id' => $story->id,
            'image' => 'sablier_noir.jpg'
        ]);

        $endingNeutral = Chapter::create([
            'title' => 'Le retour sans réponse',
            'content' => 'Kael revient au point de départ, sans savoir s’il a vraiment changé quelque chose.',
            'story_id' => $story->id,
            'image' => 'retour.jpg'
        ]);

        $chapter2c = Chapter::create([
            'title' => 'Manipulation temporelle',
            'content' => 'Kael tente d’interagir avec le sablier mais déclenche une onde instable.',
            'story_id' => $story->id,
            'image' => 'manipulation.jpg'
        ]);

        $chapter2c_alt = Chapter::create([
            'title' => 'L’alternative risquée',
            'content' => 'Il lance un sort interdit, provoquant une distorsion locale.',
            'story_id' => $story->id,
            'image' => 'distorsion.jpg'
        ]);

        $chapter3c = Chapter::create([
            'title' => 'Chute temporelle',
            'content' => 'Il est happé dans un vortex qui traverse les siècles.',
            'story_id' => $story->id,
            'image' => 'vortex.jpg'
        ]);

        $chapter3c_alt = Chapter::create([
            'title' => 'Planqué dans le passé',
            'content' => 'Il se cache dans une époque médiévale en attendant une solution.',
            'story_id' => $story->id,
            'image' => 'cache_passe.jpg'
        ]);

        $chapter4c = Chapter::create([
            'title' => 'Prisonnier du flux',
            'content' => 'Les gardiens du temps l’enferment dans une cage d’horlogerie.',
            'story_id' => $story->id,
            'image' => 'prison_temps.jpg'
        ]);

        $chapter4c_alt = Chapter::create([
            'title' => 'La fissure de secours',
            'content' => 'Une ancienne trappe temporelle s’ouvre sous ses pieds.',
            'story_id' => $story->id,
            'image' => 'fissure.jpg'
        ]);

        $endingBad = Chapter::create([
            'title' => 'Condamné au labyrinthe',
            'content' => 'Kael erre sans fin dans une boucle temporelle, incapable d’en sortir.',
            'story_id' => $story->id,
            'image' => 'labyrinthe.jpg'
        ]);

        // Choix – correspondances exactes
        Choice::create(['content' => 'Entrer dans la faille temporelle', 'chapter_id' => $chapter1->id, 'next_chapter_id' => $chapter2a->id]);
        Choice::create(['content' => 'Parler au maître des sabliers', 'chapter_id' => $chapter1->id, 'next_chapter_id' => $chapter2b->id]);
        Choice::create(['content' => 'Tenter de manipuler le sablier', 'chapter_id' => $chapter1->id, 'next_chapter_id' => $chapter2c->id]);

        Choice::create(['content' => 'Explorer le Nexus', 'chapter_id' => $chapter2a->id, 'next_chapter_id' => $chapter3a->id]);
        Choice::create(['content' => 'Chercher une autre issue', 'chapter_id' => $chapter2a->id, 'next_chapter_id' => $chapter2a_alt->id]);

        Choice::create(['content' => 'Affronter le gardien', 'chapter_id' => $chapter3a->id, 'next_chapter_id' => $chapter4a->id]);
        Choice::create(['content' => 'Suivre une vibration temporelle secondaire', 'chapter_id' => $chapter3a->id, 'next_chapter_id' => $chapter4a_alt->id]);

        Choice::create(['content' => 'Résoudre l’énigme', 'chapter_id' => $chapter4a->id, 'next_chapter_id' => $endingGood->id]);
        Choice::create(['content' => 'Quitter le Nexus sans rien toucher', 'chapter_id' => $chapter4a->id, 'next_chapter_id' => $endingNeutral->id]);

        Choice::create(['content' => 'Suivre les voix', 'chapter_id' => $chapter4a_alt->id, 'next_chapter_id' => $endingBadAlt->id]);
        Choice::create(['content' => 'Fuir la boucle', 'chapter_id' => $chapter4a_alt->id, 'next_chapter_id' => $endingBad->id]);

        Choice::create(['content' => 'Étudier le carnet', 'chapter_id' => $chapter2b->id, 'next_chapter_id' => $chapter3b->id]);
        Choice::create(['content' => 'Explorer l’atelier', 'chapter_id' => $chapter2b->id, 'next_chapter_id' => $chapter2b_alt->id]);

        Choice::create(['content' => 'Suivre le schéma vers l’horloge', 'chapter_id' => $chapter3b->id, 'next_chapter_id' => $chapter4b->id]);
        Choice::create(['content' => 'Gravir la Tour de Verre', 'chapter_id' => $chapter3b->id, 'next_chapter_id' => $chapter3b_alt->id]);

        Choice::create(['content' => 'Sceller le pacte', 'chapter_id' => $chapter4b->id, 'next_chapter_id' => $endingNeutral->id]);
        Choice::create(['content' => 'Explorer la zone autour de l’horloge', 'chapter_id' => $chapter4b->id, 'next_chapter_id' => $chapter4b_alt->id]);

        Choice::create(['content' => 'Activer le sablier noir', 'chapter_id' => $chapter4b_alt->id, 'next_chapter_id' => $endingGood->id]);
        Choice::create(['content' => 'Le laisser intact et repartir', 'chapter_id' => $chapter4b_alt->id, 'next_chapter_id' => $endingNeutral->id]);

        Choice::create(['content' => 'Se jeter dans le vortex', 'chapter_id' => $chapter2c->id, 'next_chapter_id' => $chapter3c->id]);
        Choice::create(['content' => 'Lancer le sort interdit', 'chapter_id' => $chapter2c->id, 'next_chapter_id' => $chapter2c_alt->id]);

        Choice::create(['content' => 'Chercher un abri', 'chapter_id' => $chapter3c->id, 'next_chapter_id' => $chapter4c->id]);
        Choice::create(['content' => 'Se camoufler dans une époque ancienne', 'chapter_id' => $chapter3c->id, 'next_chapter_id' => $chapter3c_alt->id]);

        Choice::create(['content' => 'Rester immobile', 'chapter_id' => $chapter4c->id, 'next_chapter_id' => $endingBad->id]);
        Choice::create(['content' => 'Sauter dans la fissure', 'chapter_id' => $chapter4c->id, 'next_chapter_id' => $chapter4c_alt->id]);

        Choice::create(['content' => 'Suivre le passage secret', 'chapter_id' => $chapter4c_alt->id, 'next_chapter_id' => $endingGood->id]);
        Choice::create(['content' => 'Revenir sur ses pas', 'chapter_id' => $chapter4c_alt->id, 'next_chapter_id' => $endingBad->id]);
    }
}
