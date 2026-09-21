CREATE DATABASE management;
USE management;


CREATE TABLE tuanti (
    group_id      INT NOT NULL AUTO_INCREMENT,
    group_name    VARCHAR(100) NOT NULL,
    agency        VARCHAR(100) NOT NULL,
    fandom_name   VARCHAR(100),
    PRIMARY KEY (group_id)
);

CREATE TABLE Idols (
    idol_id       INT NOT NULL AUTO_INCREMENT,
    stage_name    VARCHAR(100) NOT NULL,
    real_name     VARCHAR(100) NOT NULL,
    nationality   VARCHAR(50) NOT NULL,
    debut_year    INT NOT NULL,
    group_id      INT,
    PRIMARY KEY (idol_id),
    FOREIGN KEY (group_id) REFERENCES tuanti(group_id)
);

CREATE TABLE Albums (
    album_id      INT NOT NULL AUTO_INCREMENT,
    title         VARCHAR(150) NOT NULL,
    release_date  DATE NOT NULL,
    genre         VARCHAR(50),
    group_id      INT NOT NULL,
    PRIMARY KEY (album_id),
    FOREIGN KEY (group_id) REFERENCES tuanti(group_id)
);

CREATE TABLE Schedules (
    schedule_id   INT NOT NULL AUTO_INCREMENT,
    event_type    VARCHAR(50) NOT NULL,
    event_date    DATE NOT NULL,
    location      VARCHAR(100) NOT NULL,
    group_id      INT NOT NULL,
    PRIMARY KEY (schedule_id),
    FOREIGN KEY (group_id) REFERENCES tuanti(group_id)
);

show tables;
INSERT INTO tuanti ( group_name, agency, fandom_name) VALUES
('Stellar Wave', 'Nova Entertainment', 'WaveRiders'),
('Crimson Peak', 'RedStar Entertainment', 'Peakers'),
('Lunar Bloom', 'Moonlight Entertainment', 'Bloomies'),
('No Album Group', 'Test Agency', 'Testies');



INSERT INTO Idols (stage_name, real_name, nationality, debut_year, group_id) VALUES
('Haru',   'Kim Ha-eun',      'South Korean', 2019, 1),
('Yuki',   'Sato Yuki',       'Japanese',     2019, 1),
('Minjae', 'Lee Min-jae',     'South Korean', 2019, 1),
('Dara',   'Park Da-ra',      'South Korean', 2020, 2),
('Nari',   'Choi Na-ri',      'South Korean', 2020, 2),
('Sena',   'Tanaka Sena',     'Japanese',     2020, 2),
('Woojin', 'Han Woo-jin',     'South Korean', 2021, 3),
('Lily',   'Nguyen Linh-Chi', 'Vietnamese',   2021, 3);

INSERT INTO Albums (title, release_date, genre, group_id) VALUES
('Wave Zero',        '2019-06-10', 'Dance-Pop',   1),
('Tidal',             '2021-03-15', 'R&B',         1),
('Ascend',            '2020-08-05', 'Hip-Hop',     2),
('Crimson Hour',      '2022-11-20', 'Pop-Rock',    2),
('Bloom in the Dark', '2022-05-01', 'Ballad',      3);


INSERT INTO Schedules (event_type, event_date, location, group_id) VALUES
('Concert',       '2024-11-02', 'Seoul, South Korea',    1),
('Fan Meeting',   '2024-12-14', 'Tokyo, Japan',          1),
('Variety Show',  '2025-01-20', 'Seoul, South Korea',    2),
('Concert',       '2025-02-08', 'Busan, South Korea',    2),
('Fan Meeting',   '2025-03-01', 'Hanoi, Vietnam',        3),
('Award Show',    '2025-04-12', 'Seoul, South Korea',    3);



select *from tuanti;
select *from Idols;
select *from Albums;
select *from Schedules;


USE management;

1)List all idols and the Group Name they belong to (include idols not in any group)


SELECT i.stage_name, i.real_name, g.group_name
FROM Idols i
LEFT JOIN tuanti g ON i.group_id = g.group_id;

2) List all groups and the total number of idols in each group


SELECT g.group_name, COUNT(i.idol_id) AS total_idols
FROM tuanti g
LEFT JOIN Idols i ON g.group_id = i.group_id
GROUP BY g.group_id, g.group_name;

USE management;
3) List all groups and total albums released (0 if none)

SELECT g.group_name, COUNT(a.album_id) AS total_albums
FROM tuanti g
LEFT JOIN Albums a ON g.group_id = a.group_id
GROUP BY g.group_id, g.group_name;

 4)Albums released after 2020, with the Group Name
 
SELECT a.title, a.release_date, g.group_name
FROM Albums a
LEFT JOIN tuanti g ON a.group_id = g.group_id
WHERE a.release_date > '2020-12-31';


5) Each group with their most recent schedule event (include groups with no schedules)

SELECT g.group_name, MAX(s.event_date) AS latest_event_date
FROM tuanti g
LEFT JOIN Schedules s ON g.group_id = s.group_id
GROUP BY g.group_id, g.group_name;


 6)Groups with more than 2 idols
 
SELECT g.group_name, COUNT(i.idol_id) AS idol_count
FROM tuanti g
LEFT JOIN Idols i ON g.group_id = i.group_id
GROUP BY g.group_id, g.group_name
HAVING COUNT(i.idol_id) > 2;


7）All 'concert' schedules, with the Group Name hosting each
SELECT s.schedule_id, s.event_type, s.event_date, s.location, g.group_name
FROM Schedules s
LEFT JOIN tuanti g ON s.group_id = g.group_id
WHERE s.event_type = 'concert';


8） The group that has released the most albums
SELECT g.group_name, COUNT(a.album_id) AS album_count
FROM tuanti g
LEFT JOIN Albums a ON g.group_id = a.group_id
GROUP BY g.group_id, g.group_name
ORDER BY album_count DESC
LIMIT 1;


