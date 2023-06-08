<div class="allhighscores">
    <% loop $Games %>
        <div class="highscorepage all">
            <div class="background_image">
                <img src="$BackgroundImage.FocusFill(1080,1920).Url"/>
            </div>
            <h1>$Title</h1>

            <div class="section_content">

                <div class="highscore_list">
                    <% if $TotalHighScore.Count > 0 %>
                        <div class="highscore hourly">
                            <h2 class="highscore_title">Letzte Stunde</h2>
                            <div class="inner_list">
                                <% loop $HourlyHighScore.Limit(5) %>
                                    <div class="highscore_entry">
                                        <h3 class="highscore_entry_pos">Platz $Pos</h3>
                                        <div class="highscore_entry_user" data-behaviour="character">
                                            <div class="user_part">$User.SelectedBackDeco.Image</div>
                                            <div class="user_part">$User.SelectedSkinColor.Image</div>
                                            <div class="user_part">
                                                <div class="eyes">$User.SelectedEyes.Image</div>
                                            </div>
                                            <div class="user_part">$User.SelectedMouth.Image</div>
                                            <div class="user_part">$User.SelectedHair.Image</div>
                                            <div class="user_part">$User.SelectedBottom.Image</div>
                                            <div class="user_part">$User.SelectedTop.Image</div>
                                            <div class="user_part">$User.SelectedHat.Image</div>
                                        </div>
                                        <h4 class="highscore_entry_name">$User.Nickname</h4>
                                        <h4 class="highscore_entry_score">$Points Punkte</h4>
                                        <h4 class="highscore_entry_date">$CreatedFormatted</h4>
                                    </div>
                                <% end_loop %>
                            </div>
                        </div>

                        <div class="highscore daily">
                            <h2 class="highscore_title">Tag</h2>
                            <div class="inner_list">
                                <% loop $DailyHighScore.Limit(1) %>
                                    <div class="highscore_entry">
                                        <h3 class="highscore_entry_pos">Platz $Pos</h3>
                                        <div class="highscore_entry_user" data-behaviour="character">
                                            <div class="user_part">$User.SelectedBackDeco.Image</div>
                                            <div class="user_part">$User.SelectedSkinColor.Image</div>
                                            <div class="user_part">
                                                <div class="eyes">$User.SelectedEyes.Image</div>
                                            </div>
                                            <div class="user_part">$User.SelectedMouth.Image</div>
                                            <div class="user_part">$User.SelectedHair.Image</div>
                                            <div class="user_part">$User.SelectedBottom.Image</div>
                                            <div class="user_part">$User.SelectedTop.Image</div>
                                            <div class="user_part">$User.SelectedHat.Image</div>
                                        </div>
                                        <h4 class="highscore_entry_name">$User.Nickname</h4>
                                        <h4 class="highscore_entry_score">$Points Punkte</h4>
                                        <h4 class="highscore_entry_date">$CreatedFormatted</h4>
                                    </div>
                                <% end_loop %>
                            </div>
                        </div>

                        <div class="highscore monthly">
                            <h2 class="highscore_title">Monat</h2>
                            <div class="inner_list">
                                <% loop $MonthlyHighScore.Limit(1) %>
                                    <div class="highscore_entry">
                                        <h3 class="highscore_entry_pos">Platz $Pos</h3>
                                        <div class="highscore_entry_user" data-behaviour="character">
                                            <div class="user_part">$User.SelectedBackDeco.Image</div>
                                            <div class="user_part">$User.SelectedSkinColor.Image</div>
                                            <div class="user_part">
                                                <div class="eyes">$User.SelectedEyes.Image</div>
                                            </div>
                                            <div class="user_part">$User.SelectedMouth.Image</div>
                                            <div class="user_part">$User.SelectedHair.Image</div>
                                            <div class="user_part">$User.SelectedBottom.Image</div>
                                            <div class="user_part">$User.SelectedTop.Image</div>
                                            <div class="user_part">$User.SelectedHat.Image</div>
                                        </div>
                                        <h4 class="highscore_entry_name">$User.Nickname</h4>
                                        <h4 class="highscore_entry_score">$Points Punkte</h4>
                                        <h4 class="highscore_entry_date">$CreatedFormatted</h4>
                                    </div>
                                <% end_loop %>
                            </div>
                        </div>

                        <div class="highscore total">
                            <h2 class="highscore_title">All Time</h2>
                            <div class="inner_list">
                                <% loop $TotalHighScore.Limit(1) %>
                                    <div class="highscore_entry">
                                        <h3 class="highscore_entry_pos">Platz $Pos</h3>
                                        <div class="highscore_entry_user" data-behaviour="character">
                                            <div class="user_part">$User.SelectedBackDeco.Image</div>
                                            <div class="user_part">$User.SelectedSkinColor.Image</div>
                                            <div class="user_part">
                                                <div class="eyes">$User.SelectedEyes.Image</div>
                                            </div>
                                            <div class="user_part">$User.SelectedMouth.Image</div>
                                            <div class="user_part">$User.SelectedHair.Image</div>
                                            <div class="user_part">$User.SelectedBottom.Image</div>
                                            <div class="user_part">$User.SelectedTop.Image</div>
                                            <div class="user_part">$User.SelectedHat.Image</div>
                                        </div>
                                        <h4 class="highscore_entry_name">$User.Nickname</h4>
                                        <h4 class="highscore_entry_score">$Points Punkte</h4>
                                        <h4 class="highscore_entry_date">$CreatedFormatted</h4>
                                    </div>
                                <% end_loop %>
                            </div>
                        </div>
                    <% else %>
                        <p class="noentry">Bisher gibt es in diesem Spiel noch keinen Highscore.</p>
                    <% end_if %>
                </div>
            </div>
        </div>
    <% end_loop %>
</div>
<meta http-equiv="refresh" content="20">
