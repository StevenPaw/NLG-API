<?php

namespace App\Highscore {

    use SilverStripe\Forms\DropdownField;
    use App\Games\Game;
    use BlankPage;

    /**
 * Class \Page
 *
 * @property int $GameID
 * @method \App\Games\Game Game()
 */
    class HighscorePage extends BlankPage
    {
        private static $db = [
        ];

        private static $has_one = [
            "Game" => Game::class,
        ];

        private static $table_name = "App_Highscore_HighscorePage";

        public function getCMSFields()
        {
            $fields = parent::getCMSFields();
            $fields->addFieldToTab("Root.Main", DropdownField::create("GameID", "Game", Game::get()->map("ID", "Title")));
            return $fields;
        }
    }
}
