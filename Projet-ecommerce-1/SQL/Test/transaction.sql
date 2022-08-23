CREATE TABLE `transactions` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`txn_id` varchar(255) NOT NULL,
	`payment_amount` decimal(7,2) NOT NULL,
	`payment_status` varchar(30) NOT NULL,
	`item_id` varchar(255) NOT NULL,
	`item_quantity` varchar(255) NOT NULL,
	`item_mc_gross` varchar(255) NOT NULL,
	`created` datetime NOT NULL,
	`payer_email` varchar(255) NOT NULL,
	`first_name` varchar(100) NOT NULL,
	`last_name` varchar(100) NOT NULL DEFAULT '',
	`address_street` varchar(255) NOT NULL,
	`address_city` varchar(255) NOT NULL,
	`address_state` varchar(255) NOT NULL,
	`address_zip` varchar(255) NOT NULL,
	`address_country` varchar(255) NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `transactions` ADD UNIQUE KEY `txn_id` (`txn_id`);