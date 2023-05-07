<?php

namespace App\Elements;

use App\Games\Game;
use SilverStripe\Forms\DropdownField;
use DNADesign\Elemental\Models\BaseElement;
use SilverStripe\ORM\ArrayList;

/**
 * Class \App\Elements\TextImageElement
 *
 * @property string $Text
 * @property string $Type
 * @property int $GameID
 * @method \App\Games\Game Game()
 */
class HighscoreElement extends BaseElement
{

    private static $db = [
        "Text" => "HTMLText",
    ];

    private static $has_one = [
        "Game" => Game::class,
    ];

    private static $field_labels = [
    ];

    private static $table_name = 'HighscoreElement';
    private static $icon = 'font-icon-block-promo-3';

    public function getType()
    {
        return "HighScore";
    }

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        return $fields;
    }

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

        $hourlyhighscore = $hourlyhighscore->filter([
            "Created:GreaterThan" => date("Y-m-d H:i:s", strtotime("-1 hour")),
        ]);

        $hourlyhighscore = $hourlyhighscore->sort("Points", "DESC");

        //Get unique ids from $hourlyhighscore
        //$uniqueIds = $hourlyhighscore->columnUnique("UserID");

        //return $uniqueIds;
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
