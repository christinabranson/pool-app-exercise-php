# Pool App Exercise

## Requirements

* Player Create, Read, Update, Delete (CRUD)
* Game management
    * Select players
    * Choose winner
* Leaderboard of players with the most wins
* Should be usable on a variety of device sizes (aka Responsive)

## Database

### players

| Column | Properties | Description |
| ---- | ---- | ---- |
| player_id | increments | ID of player |
| name | string | Name of player |
| timestamps |--| Created and modified |

### games

| Column | Properties | Description |
| ---- | ---- | ---- |
| game_id | increments | ID of game |
| player_1_id | integer | ID of player 1 |
| player_2_id | integer | ID of player 2 |
| winner_id | integer | ID of winning player |
| timestamps |--| Created and modified |

## Routes

### Leaderboard

| URL | Method | Description | Code |
| ---- | ---- | ---- | ---- |
| / | get | Get main page | `Route::get('/', 'PlayerController@leaderboard');` |
| /leaderboard | get | Get leaderboard page | `Route::get('/leaderboard', 'PlayerController@leaderboard');` |

### Game Management

| URL | Method | Description | Code |
| ---- | ---- | ---- | ---- |
| /game/new | get | Get page to create a new game | `Route::get('/game/new', 'GameController@newGamePage');` |
| /game/new | post | New game action | `Route::post('/game/new', 'GameController@newGame');` |
| /game/edit/{game_id} | get | Get page to edit a game | `Route::get('/game/edit/{game_id}', 'GameController@editGamePage');` |
| /game/edit/{game_id} | post |  Edit a game action | `Route::post('/game/edit/{game_id}', 'GameController@editGame');` |
| /game/winner/{game_id} | get | Get page to pick game winner | `Route::get('/game/winner/{game_id}', 'GameController@winnerGamePage');` |
| /game/winner/{game_id} | post | Select game winner action | `Route::post('/game/winner/{game_id}', 'GameController@winnerGame');` |
| /game/get/{game_id} | get | Get game information | `Route::get('/game/get/{game_id}', 'GameController@getGame');` |
| /game/list | get | Get list of all games | `Route::get('/game/list', 'GameController@listGames');` |
| /game/delete/{game_id} | delete | Delete game | `Route::delete('/game/delete/{game_id}', 'GameController@deleteGame');` |

### Player Management

| URL | Method | Description | Code |
| ---- | ---- | ---- | ---- |
| /player/new | get | Get page to create a new player | `Route::get('/player/new', 'PlayerController@newPlayerPage);` |
| /player/new | post | Create new player action | `Route::post('/player/new', 'PlayerController@newPlayer);` |
| /player/edit/{player_id} | get | Get page to edit a player | `Route::get('/player/edit/{player_id}', 'PlayerController@editPlayerPage);` |
| /player/edit/{player_id | post | Edit player action | `Route::post('/player/edit/{player_id}', 'PlayerController@editPlayer);` |
| /player/get/{player_id} | get | Get player information | `Route::get('/player/get/{player_id}', 'PlayerController@getPlayer');` |
| /player/delete/{player_id} | get | Get page to delete a player | `Route::get('/player/delete/{player_id}', 'PlayerController@deletePlayerPage');` |
| /player/delete/{player_id} | delete | Delete player | `Route::delete('/player/delete/{player_id}', 'PlayerController@deletePlayer');` |
| /player/admin | get | Admin panel to manage players | `Route::get('/player/admin', 'PlayerController@admin');` |