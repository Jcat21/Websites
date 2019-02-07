/* Football Database */
CREATE OR REPLACE VIEW `football_schedule` AS 
	SELECT day.day_of_week AS day, game.date_of_year AS date, hometeam.team_name AS home, awayteam.team_name AS away, venue.venue_name AS venue
	FROM `game` 
		INNER JOIN day
			ON game.day_id = day.id
		INNER JOIN team AS hometeam
			ON game.home_team_id = hometeam.id
		INNER JOIN team AS awayteam
			ON game.away_team_id = awayteam.id
		INNER JOIN venue
			ON game.venue_id = venue.id
	ORDER BY game.date_of_year ASC;

INSERT INTO `venue` (id, venue_name) 
	VALUES (10, 'Folsom Field');
INSERT INTO `game` (id, day_id, date_of_year, home_team_id, away_team_id, venue_id)
    VALUES (20, 1, '2017-11-18', 10, 4, 10);
INSERT INTO `game` (id, day_id, date_of_year, home_team_id, away_team_id, venue_id)
	VALUES (21, 1, '2017-11-18', 7, 8, 8);

UPDATE `game` SET date_of_year = '2017-11-11', away_team_id = 1 
	WHERE date_of_year = '2017-11-18' AND home_team_id = 10 AND away_team_id = 4;

DELETE FROM `game` 
	WHERE date_of_year = '2017-11-18' AND home_team_id = 7 AND away_team_id = 8;

SELECT venue.id AS venue_id, venue.venue_name AS venue, COUNT(*) AS game_count 
	FROM `venue` 
		INNER JOIN game
			ON game.venue_id = venue.id
	GROUP BY venue.id;







/* DVD Database */
CREATE OR REPLACE VIEW `dramas` AS 
	SELECT dvd_title_id, title, release_date, award, formats.format, genres.genre, labels.label, ratings.rating, sounds.sound
	FROM `dvd_titles` 
		INNER JOIN formats
			ON dvd_titles.format_id = formats.format_id
		INNER JOIN genres
			ON dvd_titles.genre_id = genres.genre_id
		INNER JOIN labels
			ON dvd_titles.label_id = labels.label_id
		INNER JOIN ratings
			ON dvd_titles.rating_id = ratings.rating_id
		INNER JOIN sounds
			ON dvd_titles.sound_id = sounds.sound_id
	WHERE genres.genre LIKE 'Drama' AND dvd_titles.release_date IS NOT NULL;

INSERT INTO `dvd_titles` (dvd_title_id, title, release_date, award, label_id, sound_id, genre_id, rating_id, format_id)
    VALUES (8225, 'The Godfather', '1972-03-24', '45th Academy Award for Best Picture', 92, 4, 9, 7, 2);

UPDATE `dvd_titles` SET label_id = 24, genre_id = 7, format_id = 4
	WHERE dvd_title_id = 5131 AND title LIKE '%Zero Effect%';

DELETE FROM `dvd_titles`
	WHERE dvd_title_id = 5932 AND title LIKE '%Major League 3:Back To The Minors%';

SELECT MAX(LENGTH(title)) AS longest_title, MIN(LENGTH(title)) AS shortest_title FROM dvd_titles;

SELECT genres.genre_id, genres.genre, COUNT(*) AS dvd_count 
	FROM `genres` 
		INNER JOIN dvd_titles
			ON dvd_titles.genre_id = genres.genre_id
	GROUP BY genres.genre_id;




