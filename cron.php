<?php

$blacklists = [
    __DIR__ . "/custom/custom_blacklist.txt",
    "https://adaway.org/hosts.txt",
    "https://raw.githubusercontent.com/StevenBlack/hosts/master/hosts",
    "https://raw.githubusercontent.com/Perflyst/PiHoleBlocklist/master/android-tracking.txt",
    "https://raw.githubusercontent.com/Perflyst/PiHoleBlocklist/master/SmartTV.txt",
    "https://raw.githubusercontent.com/ftpmorph/ftprivacy/master/blocklists/xiaomi-ads-tracking.txt",
    "https://raw.githubusercontent.com/AdguardTeam/FiltersRegistry/master/filters/filter_15_DnsFilter/filter.txt",
    "https://raw.githubusercontent.com/jerryn70/GoodbyeAds/master/Hosts/GoodbyeAds.txt",
    "https://raw.githubusercontent.com/anudeepND/blacklist/master/adservers.txt",
    "https://v.firebog.net/hosts/Easyprivacy.txt",
    "https://raw.githubusercontent.com/shreyasminocha/shady-hosts/main/hosts",
    "https://v.firebog.net/hosts/static/w3kbl.txt"
];

$whitelist = [
	__DIR__ . "/custom/custom_whitelist.txt",
	"https://raw.githubusercontent.com/anudeepND/whitelist/master/domains/whitelist.txt"
];

// Ignoring SSL errors because one of my lists had an expired Cert.
$ignoreSSL = [
    "ssl" => [
        "verify_peer" => false,
        "verify_peer_name" => false,
    ]
]; 

$fileHeader = "# Last modified at " . date("Y-m-d h:i:s") . PHP_EOL . PHP_EOL;

$blacklistContent = null;
foreach ($blacklists as $blacklistUrl) {
    $blacklistContent .= file_get_contents($blacklistUrl, false, stream_context_create($ignoreSSL)) . PHP_EOL;
}

$blacklistFile = fopen(__DIR__ . '/hostfiles/blacklist.txt', 'w+');
fwrite($blacklistFile, $fileHeader . $blacklistContent);

$whitelistContent = null;
foreach ($whitelist as $whitelistUrl) {
    $whitelistContent .= file_get_contents($whitelistUrl, false, stream_context_create($ignoreSSL)) . PHP_EOL;
}

$whitelistFile = fopen(__DIR__ . '/hostfiles/whitelist.txt', 'w+');
fwrite($whitelistFile, $fileHeader . $whitelistContent);

?>