<?php

declare(strict_types=1);

use PhpParser\ParserFactory;
use Snicco\PhpScoperExcludes\Option;

$project = getenv( 'IOHNA_PROJECT' );

// for error: PHP Fatal error:  Allowed memory size of...
ini_set( "memory_limit", "500M" );

switch ( $project ) {
	case 'WP':
		$iohna_config = [
			'OUTPUT_DIR' => __DIR__.'/generated/WP',
			'FILES' => [
				__DIR__.'/vendor/php-stubs/wordpress-stubs/wordpress-stubs.php',
				__DIR__.'/vendor/php-stubs/wordpress-globals/wordpress-globals.php'
			],
		];
		break;
	case 'WC':
		$iohna_config = [
			'OUTPUT_DIR' => __DIR__.'/generated/WC',
			// pass files as command arguments
			'FILES' => [
				__DIR__.'/vendor/php-stubs/woocommerce-stubs/woocommerce-packages-stubs.php',
				__DIR__.'/vendor/php-stubs/woocommerce-stubs/woocommerce-stubs.php',
			],
		];
		break;
	default:
		break;
}

return [
	Option::EMULATE_PHP_VERSION => Option::PHP_8_0,
	// use the current working directory
	Option::OUTPUT_DIR => $iohna_config['OUTPUT_DIR'],
	// pass files as command arguments
	Option::FILES      => $iohna_config['FILES'],
	Option::PREFER_PHP_VERSION => ParserFactory::PREFER_PHP7,
];