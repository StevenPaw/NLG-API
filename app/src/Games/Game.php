<?php

namespace App\Games;

use App\Games\HighScore;
use SilverStripe\Assets\Image;
use SilverStripe\ORM\ArrayList;
use SilverStripe\ORM\DataObject;
use SilverStripe\Security\Permission;

/**
 * Class \App\Database\Experience
 *
 * @property string $Title
 * @property string $Description
 * @property int $BackgroundImageID
 * @method \SilverStripe\Assets\Image BackgroundImage()
 * @method \SilverStripe\ORM\DataList|\App\Games\HighScore[] Highscores()
 */
class Game extends DataObject
{
    private static $db = [
        "Title" => "Varchar(255)",
        "Description" => "Text",
    ];

    private static $has_one = [
        "BackgroundImage" => Image::class
    ];

    private static $owns = [
        "BackgroundImage"
    ];

    private static $has_many = [
        "Highscores" => HighScore::class,
    ];

    private static $summary_fields = [
    ];

    private static $field_labels = [
    ];

    private static $default_sort = "ID ASC";

    private static $table_name = "Game";

    private static $singular_name = "Game";
    private static $plural_name = "Games";

    private static $url_segment = "games";

    public function onBeforeWrite()
    {
        parent::onBeforeWrite();
    }

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        return $fields;
    }

    public function canView($member = null)
    {
        return true;
    }

    public function canEdit($member = null)
    {
        return Permission::check('CMS_ACCESS_NewsAdmin', 'any', $member);
    }

    public function canDelete($member = null)
    {
        return Permission::check('CMS_ACCESS_NewsAdmin', 'any', $member);
    }

    public function canCreate($member = null, $context = [])
    {
        return Permission::check('CMS_ACCESS_NewsAdmin', 'any', $member);
    }

    public function getTotalHighScore()
    {
        $highscores = $this->Highscores();

        $highscores = $highscores->sort("Points", "DESC");

        return $highscores;
    }

    public function getHourlyHighScore()
    {
        $hourlyhighscore = $this->Highscores();

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
        $dailyhighscore = $this->Highscores();

        $dailyhighscore = $dailyhighscore->filter([
            "Created:GreaterThan" => date("Y-m-d H:i:s", strtotime("-1 day")),
        ]);

        $dailyhighscore = $dailyhighscore->sort("Points", "DESC");

        return $dailyhighscore;
    }

    public function getMonthlyHighScore()
    {
        $monthlyhighscore = $this->Highscores();

        $monthlyhighscore = $monthlyhighscore->filter([
            "Created:GreaterThan" => date("Y-m-d H:i:s", strtotime("-1 month")),
        ]);

        $monthlyhighscore = $monthlyhighscore->sort("Points", "DESC");

        return $monthlyhighscore;
    }
}
