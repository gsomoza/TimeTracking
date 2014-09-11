INSERT INTO `oauth_clients` (`client_id`, `client_secret`, `redirect_uri`, `grant_types`, `scope`) VALUES ('timetrackerWssEuXCP', '', '/oauth/receivecode', 'password', 'default');
INSERT INTO `oauth_users` (`username`, `password`, `first_name`, `last_name`) VALUES ('admin', '$2y$10$yNjWeQP.95gYtc5GH.95puUGTYbLbfqYtfHnStBajUAVkundthiKC', 'Gabriel', 'Somoza'); # password=pentium
INSERT INTO `oauth_scopes` (`id`, `client_id`, `scope`, `type`, `is_default`) VALUES ('default', 'timetrackerWssEuXCP', 'default', 'default', 1);
