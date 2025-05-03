<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Story;
use App\Models\Chapter;
use App\Models\Choice;

class Story1Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $story = Story::create([
            'title' => 'Le Trésor des Abîmes',
            'description' => 'Une aventure périlleuse dans un monde de pirates et de mystères.',
            'cover_image' => 'cover_tresor.jpg',
            'author' => 'Mathilde Ançay'
        ]);

        $chapter1 = Chapter::create([
            'title' => 'La mystérieuse Aliya arrive',
            'content' => 'Aliya entre silencieusement. Sa boussole magique s’agite lorsqu’elle s’approche du comptoir.',
            'story_id' => $story->id,
            'image' => 'aliya_taverne.jpg'
        ]);

        $chapter2a = Chapter::create([
            'title' => 'La forêt maudite',
            'content' => 'La boussole indique un chemin sinueux à travers les arbres noirs de la forêt maudite.',
            'story_id' => $story->id,
            'image' => 'foret.jpg'
        ]);

        $chapter2a_alt = Chapter::create([
            'title' => 'Les brumes trompeuses',
            'content' => 'Aliya tente de contourner la forêt mais se perd dans une brume épaisse et ensorcelée.',
            'story_id' => $story->id,
            'image' => 'brume.jpg'
        ]);

        $chapter3a = Chapter::create([
            'title' => 'Les ruines englouties',
            'content' => 'Sous les fougères, une pierre sculptée marque l’entrée d’un sanctuaire submergé.',
            'story_id' => $story->id,
            'image' => 'ruines.jpg'
        ]);

        $chapter3a_alt = Chapter::create([
            'title' => 'Le cercle des âmes',
            'content' => 'Dans la brume, Aliya trouve un ancien cercle de pierres. Des voix murmurent des avertissements.',
            'story_id' => $story->id,
            'image' => 'cercle.jpg'
        ]);

        $chapter4a = Chapter::create([
            'title' => 'L’inscription oubliée',
            'content' => 'Les runes anciennes brillent sous la lumière lunaire. Aliya les déchiffre avec soin.',
            'story_id' => $story->id,
            'image' => 'runes.jpg'
        ]);

        $chapter4a_alt = Chapter::create([
            'title' => 'Apparition spectrale',
            'content' => 'Une silhouette spectrale surgit, désignant une direction avec insistance.',
            'story_id' => $story->id,
            'image' => 'spectre.jpg'
        ]);

        $endingGood = Chapter::create([
            'title' => 'Le trésor trouvé',
            'content' => 'Après maintes péripéties, vous ouvrez le coffre scintillant rempli d’or et de reliques anciennes.',
            'story_id' => $story->id,
            'image' => 'tresor.jpg'
        ]);

        $endingBadAlt = Chapter::create([
            'title' => 'Captive du néant',
            'content' => 'Aliya est happée par une illusion mystique et disparaît sans laisser de trace.',
            'story_id' => $story->id,
            'image' => 'neant.jpg'
        ]);

        $chapter2b = Chapter::create([
            'title' => 'L’aubergiste méfiant',
            'content' => 'Il parle d’un ancien capitaine fou, et évoque une carte cachée sous le comptoir.',
            'story_id' => $story->id,
            'image' => 'aubergiste.jpg'
        ]);

        $chapter2b_alt = Chapter::create([
            'title' => 'La légende du capitaine fou',
            'content' => 'L’aubergiste murmure une vieille histoire qui mène à un repaire oublié.',
            'story_id' => $story->id,
            'image' => 'capitaine.jpg'
        ]);

        $chapter3b = Chapter::create([
            'title' => 'La carte oubliée',
            'content' => 'Elle indique un itinéraire sûr vers un port abandonné. Mais pas de trésor à l’horizon.',
            'story_id' => $story->id,
            'image' => 'carte.jpg'
        ]);

        $chapter3b_alt = Chapter::create([
            'title' => 'L’île cachée',
            'content' => 'Une route secrète mène à une île voilée par la brume, presque irréelle.',
            'story_id' => $story->id,
            'image' => 'ile.jpg'
        ]);

        $chapter4b = Chapter::create([
            'title' => 'Cap vers l’inconnu',
            'content' => 'Aliya embarque sur un navire marchand. Le mystère reste entier, mais elle est saine et sauve.',
            'story_id' => $story->id,
            'image' => 'navire.jpg'
        ]);

        $chapter4b_alt = Chapter::create([
            'title' => 'Le sanctuaire caché',
            'content' => 'Sur l’île, elle découvre un sanctuaire mystérieux, mais sans trace de trésor.',
            'story_id' => $story->id,
            'image' => 'sanctuaire.jpg'
        ]);

        $endingNeutral = Chapter::create([
            'title' => 'Retour au port',
            'content' => 'Le trésor vous échappe, mais vous rentrez vivant·e, l’esprit empli de récits à conter.',
            'story_id' => $story->id,
            'image' => 'port.jpg'
        ]);

        $chapter2c = Chapter::create([
            'title' => 'Le vol de la carte',
            'content' => 'Aliya glisse la main sous le comptoir, mais l’aubergiste l’a vue.',
            'story_id' => $story->id,
            'image' => 'vol.jpg'
        ]);

        $chapter2c_alt = Chapter::create([
            'title' => 'La diversion',
            'content' => 'Aliya renverse un pichet pour attirer l’attention ailleurs.',
            'story_id' => $story->id,
            'image' => 'diversion.jpg'
        ]);

        $chapter3c = Chapter::create([
            'title' => 'La fuite',
            'content' => 'Elle court dans la ruelle, des pas résonnent derrière elle.',
            'story_id' => $story->id,
            'image' => 'ruelle.jpg'
        ]);

        $chapter3c_alt = Chapter::create([
            'title' => 'Cachée derrière les tonneaux',
            'content' => 'Aliya retient son souffle, tapie dans l’ombre, les gardes passent sans la voir.',
            'story_id' => $story->id,
            'image' => 'cachette.jpg'
        ]);

        $chapter4c = Chapter::create([
            'title' => 'Le piège',
            'content' => 'Elle se cache dans un tonneau. Trop tard. Les gardes referment le couvercle.',
            'story_id' => $story->id,
            'image' => 'tonneau.jpg'
        ]);

        $chapter4c_alt = Chapter::create([
            'title' => 'La ruelle dérobée',
            'content' => 'Un vieux marin ouvre une trappe vers un tunnel secret.',
            'story_id' => $story->id,
            'image' => 'trappe.jpg'
        ]);

        $endingBad = Chapter::create([
            'title' => 'Capturée par les gardes',
            'content' => 'Aliya est conduite en prison. Son destin reste incertain.',
            'story_id' => $story->id,
            'image' => 'prison.jpg'
        ]);

        // LIENS – tous les chapitres auront au moins 2 choix (ajouts ci-dessous)
        // Choix du chapitre 1
        Choice::create(['content' => 'Suivre la boussole vers la forêt maudite', 'chapter_id' => $chapter1->id, 'next_chapter_id' => $chapter2a->id]);
        Choice::create(['content' => 'Parler à l’aubergiste', 'chapter_id' => $chapter1->id, 'next_chapter_id' => $chapter2b->id]);
        Choice::create(['content' => 'Voler discrètement la carte', 'chapter_id' => $chapter1->id, 'next_chapter_id' => $chapter2c->id]);

        // Chemin 1
        Choice::create(['content' => 'Explorer les ruines', 'chapter_id' => $chapter2a->id, 'next_chapter_id' => $chapter3a->id]);
        Choice::create(['content' => 'Contourner la forêt maudite', 'chapter_id' => $chapter2a->id, 'next_chapter_id' => $chapter2a_alt->id]);

        Choice::create(['content' => 'Déchiffrer les inscriptions', 'chapter_id' => $chapter3a->id, 'next_chapter_id' => $chapter4a->id]);
        Choice::create(['content' => 'Suivre un tunnel secondaire', 'chapter_id' => $chapter3a->id, 'next_chapter_id' => $chapter4a_alt->id]);

        Choice::create(['content' => 'Ouvrir le coffre antique', 'chapter_id' => $chapter4a->id, 'next_chapter_id' => $endingGood->id]);
        Choice::create(['content' => 'Tracer une carte des lieux et repartir', 'chapter_id' => $chapter4a->id, 'next_chapter_id' => $endingNeutral->id]);

        Choice::create(['content' => 'S’approcher de la voix', 'chapter_id' => $chapter4a_alt->id, 'next_chapter_id' => $endingBadAlt->id]);
        Choice::create(['content' => 'Fuir le spectre', 'chapter_id' => $chapter4a_alt->id, 'next_chapter_id' => $endingBad->id]);

        // Chemin 2
        Choice::create(['content' => 'Examiner la vieille carte', 'chapter_id' => $chapter2b->id, 'next_chapter_id' => $chapter3b->id]);
        Choice::create(['content' => 'Ignorer la carte et questionner l’aubergiste', 'chapter_id' => $chapter2b->id, 'next_chapter_id' => $chapter2b_alt->id]);

        Choice::create(['content' => 'Embarquer vers le port', 'chapter_id' => $chapter3b->id, 'next_chapter_id' => $chapter4b->id]);
        Choice::create(['content' => 'Suivre une autre route indiquée sur la carte', 'chapter_id' => $chapter3b->id, 'next_chapter_id' => $chapter3b_alt->id]);

        Choice::create(['content' => 'Terminer le voyage', 'chapter_id' => $chapter4b->id, 'next_chapter_id' => $endingNeutral->id]);
        Choice::create(['content' => 'Explorer les alentours du port', 'chapter_id' => $chapter4b->id, 'next_chapter_id' => $chapter4b_alt->id]);

        Choice::create(['content' => 'Prier devant le sanctuaire', 'chapter_id' => $chapter4b_alt->id, 'next_chapter_id' => $endingGood->id]);
        Choice::create(['content' => 'Quitter l’île sans explorer', 'chapter_id' => $chapter4b_alt->id, 'next_chapter_id' => $endingNeutral->id]);

        // Chemin 3
        Choice::create(['content' => 'Fuir dans la ruelle', 'chapter_id' => $chapter2c->id, 'next_chapter_id' => $chapter3c->id]);
        Choice::create(['content' => 'Créer une diversion', 'chapter_id' => $chapter2c->id, 'next_chapter_id' => $chapter2c_alt->id]);

        Choice::create(['content' => 'Se cacher dans un tonneau', 'chapter_id' => $chapter3c->id, 'next_chapter_id' => $chapter4c->id]);
        Choice::create(['content' => 'Grimper sur les toits', 'chapter_id' => $chapter3c->id, 'next_chapter_id' => $chapter3c_alt->id]);

        Choice::create(['content' => 'Tenter de retenir sa respiration', 'chapter_id' => $chapter4c->id, 'next_chapter_id' => $endingBad->id]);
        Choice::create(['content' => 'S’échapper par la trappe', 'chapter_id' => $chapter4c->id, 'next_chapter_id' => $chapter4c_alt->id]);

        Choice::create(['content' => 'Suivre le vieux marin', 'chapter_id' => $chapter4c_alt->id, 'next_chapter_id' => $endingGood->id]);
        Choice::create(['content' => 'Refuser son aide', 'chapter_id' => $chapter4c_alt->id, 'next_chapter_id' => $endingBad->id]);
    }
}
