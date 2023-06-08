<?php

namespace App\Highscore {

    use SilverStripe\ORM\ArrayList;

    use PageController;

    /**
 * Class \PageController
 *
 * @property \App\Highscore\HighscorePage dataRecord
 * @method \App\Highscore\HighscorePage data()
 * @mixin \App\Highscore\HighscorePage
 */
    class HighscorePageController extends PageController
    {
        private static $allowed_actions = [
        ];

        public function getTotalHighScore()
        {
            $game = $this->Game();
            $highscores = $game->Highscores();

            $highscores = $highscores->sort("Points", "DESC");

            return $highscores;
        }

        public function getHourlyHighScore()
        {
            $game = $this->Game();
            $hourlyhighscore = $game->Highscores();

            if ($hourlyhighscore->count() <= 0) {
                return new ArrayList();
            }
            $hourlyhighscore = $hourlyhighscore->filter([
                "Created:GreaterThan" => date("Y-m-d H:i:s", strtotime("-1 hour")),
            ]);

            if ($hourlyhighscore->count() <= 0) {
                return new ArrayList();
            }
            $hourlyhighscore = $hourlyhighscore->sort("Points", "ASC");

            //Probably not the best way to get unique Players, but it works
            $unique_list = $hourlyhighscore->map("UserID", "ID")->values();

            $hourlyhighscore = $hourlyhighscore->filter([
                "ID" => $unique_list,
            ]);
            $hourlyhighscore = $hourlyhighscore->sort("Points", "DESC");

            return $hourlyhighscore;
        }

        public function getDailyHighScore()
        {
            $game = $this->Game();
            $dailyhighscore = $game->Highscores();

            $dailyhighscore = $dailyhighscore->filter([
                "Created:GreaterThan" => date("Y-m-d H:i:s", strtotime("-1 day")),
            ]);

            $dailyhighscore = $dailyhighscore->sort("Points", "DESC");

            return $dailyhighscore;
        }

        public function getMonthlyHighScore()
        {
            $game = $this->Game();
            $monthlyhighscore = $game->Highscores();

            $monthlyhighscore = $monthlyhighscore->filter([
                "Created:GreaterThan" => date("Y-m-d H:i:s", strtotime("-1 month")),
            ]);

            $monthlyhighscore = $monthlyhighscore->sort("Points", "DESC");

            return $monthlyhighscore;
        }
    }
}
