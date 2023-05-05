<?php

namespace App\Elements;

use App\Games\Game;
use SilverStripe\Forms\DropdownField;
use DNADesign\Elemental\Models\BaseElement;

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
        "Type" => "Varchar(255)",
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
        $fields->replaceField('Type', new DropdownField('Type', 'Typ', [
            "TotalHighscore" => "TotalHighscore",
            "DailyHighscore" => "DailyHighscore",
            "YearlyHighscore" => "YearlyHighscore",
            "MonthlyHighscore" => "MonthlyHighscore",
            "HourlyHighscore" => "HourlyHighscore",
        ]));
        return $fields;
    }

    public function getHighScores()
    {
        $type = $this->Type;
        $game = $this->Game();
        $highscores = $game->Highscores();
        if ($type == "HourlyHighscore") {
            $highscores = $highscores->filter([
                "Created:GreaterThan" => date("Y-m-d H:i:s", strtotime("-1 hour")),
            ]);
        } else if ($type == "MonthlyHighscore") {
            $highscores = $highscores->filter([
                "Created:GreaterThan" => date("Y-m-d H:i:s", strtotime("-1 month")),
            ]);
        } else if ($type == "YearlyHighscore") {
            $highscores = $highscores->filter([
                "Created:GreaterThan" => date("Y-m-d H:i:s", strtotime("-1 year")),
            ]);
        } else if ($type == "DailyHighscore") {
            $highscores = $highscores->filter([
                "Created:GreaterThan" => date("Y-m-d H:i:s", strtotime("-1 day")),
            ]);
        } else if ($type == "TotalHighscore") {
            $highscores = $highscores;
        }

        $highscores = $highscores->sort("Points", "DESC")->limit(3);

        return $highscores;
    }
}
