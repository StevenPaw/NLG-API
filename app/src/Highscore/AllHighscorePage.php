<?php

namespace App\Highscore {

    use SilverStripe\Forms\DropdownField;
    use App\Games\Game;
    use BlankPage;

    /**
 * Class \Page
 *
 */
    class AllHighscorePage extends BlankPage
    {
        private static $db = [
        ];

        private static $has_one = [
        ];

        private static $table_name = "App_Highscore_AllHighscorePage";

        public function getCMSFields()
        {
            $fields = parent::getCMSFields();
            return $fields;
        }
    }
}
