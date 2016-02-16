-- Database: `fb`

CREATE TABLE IF NOT EXISTS  `users` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `oauth_provider` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    `oauth_uid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    `fname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    `lname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    `emailid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    `gender` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
    `mobile` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
    `mokshaid` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;