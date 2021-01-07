"CREATE TABLE `events` (
  `event_Name` varchar(255) NOT NULL,
  `event_sTime` date NOT NULL,
  `event_Location` varchar(255) NOT NULL,
  `event_id` int(2) NOT NULL
)
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_Name`),
  ADD UNIQUE KEY `event_id` (`event_id`);


CREATE TABLE `users` (
  `id` int(2) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
)

ALTER TABLE `users`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `id` (`id`);

CREATE TABLE `goals` (
  `goal_id` int(2) NOT NULL,
  `goal_description` varchar(255) NOT NULL,
  `goal_date` date DEFAULT NULL,
  `goal_complete` tinyint(1) NOT NULL DEFAULT '0'
)

ALTER TABLE `goals`
  ADD PRIMARY KEY (`goal_id`);

CREATE TABLE `eventUsers` (
  `event_Name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL
)

ALTER TABLE `eventUsers`
  ADD PRIMARY KEY (`event_Name`,`username`);
"