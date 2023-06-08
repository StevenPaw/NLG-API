<?php

namespace App\Highscore {

use App\Games\Game;

    use SilverStripe\ORM\ArrayList;

    use PageController;

    /**
 * Class \PageController
 *
 * @property \App\Highscore\AllHighscorePage dataRecord
 * @method \App\Highscore\AllHighscorePage data()
 * @mixin \App\Highscore\AllHighscorePage
 */
    class AllHighscorePageController extends PageController
    {
        private static $allowed_actions = [
        ];

        public function getGames()
        {
            $games = Game::get();

            return $games;
        }
    }
}
